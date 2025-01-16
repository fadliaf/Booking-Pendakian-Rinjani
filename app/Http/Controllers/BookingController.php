<?php

namespace App\Http\Controllers;

use App\Models\Jalur;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create()
    {
        $jalurs = Jalur::all();
        return view('user.booking', compact('jalurs'));
    }

    // Memproses pembaruan booking
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_jalur' => 'required|exists:jalurs,id',
            'tanggal_naik' => 'required|date',
            'tanggal_turun' => 'required|date',
            'jumlah_pendaki' => 'required|integer|min:1',
        ]);

        // Ambil data jalur yang akan dibooking
        $jalurs = Jalur::findOrFail($validatedData['id_jalur']);

        // Periksa apakah kuota tersedia
        if ($jalurs->jumlah_kuota < $validatedData['jumlah_pendaki']) {
            return back()->withErrors(['jumlah_pendaki' => 'Kuota tidak cukup untuk jumlah pendaki yang dipilih.']);
        }

        // Hitung total berdasarkan harga dan jumlah pendaki
        $harga = 20000; // Harga default
        $total = $harga * $validatedData['jumlah_pendaki'];

        // Buat booking baru
        $booking = new Booking();
        $booking->id_user = Auth::id(); // Menyimpan ID user yang sedang login
        $booking->id_jalur = $validatedData['id_jalur'];
        $booking->harga = $harga; // Simpan harga default
        $booking->tanggal_naik = $validatedData['tanggal_naik'];
        $booking->tanggal_turun = $validatedData['tanggal_turun'];
        $booking->status = 'pending'; // Set status default menjadi 'pending'
        $booking->jumlah_pendaki = $validatedData['jumlah_pendaki'];
        $booking->total = $total; // Menyimpan total
        $booking->save();

        // Kurangi kuota jalur sesuai dengan jumlah pendaki
        $jalurs->jumlah_kuota -= $validatedData['jumlah_pendaki'];
        $jalurs->save();

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Booking berhasil dibuat!');
    }

    public function show()
    {
        // Ambil semua data booking untuk pengguna yang sedang login
        $bookings = Booking::where('id_user', Auth::id())->get();

        // Tampilkan view dengan data booking
        return view('user.booking-show', compact('bookings'));
    }

    public function index()
    {
        $bookings = Booking::all(); // Ambil semua data jalur
        return view('admin.booking.index', compact('bookings')); // Kirim ke view jalur.index
    }

    public function detail($id)
    {
        // Cari booking berdasarkan ID
        $booking = Booking::with(['user', 'jalur'])->findOrFail($id);

        // Kirim data ke view
        return view('admin.booking.show', compact('booking'));
    }

    public function update($id, $status)
    {
        $booking = Booking::findOrFail($id);

        if (!in_array($status, ['Konfirmasi', 'Tolak'])) {
            return redirect()->back()->withErrors(['status' => 'Status tidak valid.']);
        }

        $booking->status = $status;
        $booking->save();

        return redirect()->route('admin.booking.detail', $id)
            ->with('success', 'Status booking berhasil diperbarui menjadi ' . ucfirst($status) . '.');
    }
}
