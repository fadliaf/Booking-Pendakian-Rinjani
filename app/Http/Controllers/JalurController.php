<?php

namespace App\Http\Controllers;

use App\Models\Jalur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JalurController extends Controller
{
    public function index()
    {
        $jalurs = Jalur::all(); // Ambil semua data jalur
        if (Auth::check()) {
            if ($user = Auth::user()->role === 'Admin') {
                // Arahkan ke tampilan untuk admin
                return view('admin.jalur.show', compact('jalur'));
            } elseif ($user = Auth::user()->role === 'User') {
                return view('user.jalur', compact('jalurs'));
            }
        }
    }

    public function create()
    {
        return view('admin.jalur.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jalur' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jumlah_kuota' => 'required|integer|min:1',
            'alamat' => 'required|string|max:255',
        ]);

        Jalur::create([
            'nama_jalur' => $request->nama_jalur,
            'tanggal' => $request->tanggal,
            'jumlah_kuota' => $request->jumlah_kuota,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.jalur')->with('success', 'Jalur berhasil ditambahkan.');
    }

    public function show($id)
    {
        $jalur = Jalur::findOrFail($id);

        // Periksa jenis pengguna berdasarkan role
        if (Auth::check()) {
            if ($user = Auth::user()->role === 'Admin') {
                // Arahkan ke tampilan untuk admin
                return view('admin.jalur.show', compact('jalur'));
            } elseif ($user = Auth::user()->role === 'User') {
                return view('user.jalur', [
                    'jalur' => $jalur,
                    'title' => $jalur->name, // Pastikan ada kolom 'name' atau 'nama' di tabel 'jalur'
                ]);
            }
        }

        // Jika pengguna tidak terautentikasi atau tidak memiliki peran yang sesuai
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }


    public function destroy(Jalur $jalur)
    {
        $jalur->delete();
        return redirect()->route('admin.jalur')->with('success', 'Jalur berhasil dihapus.');
    }

    public function edit(Jalur $jalur)
    {
        return view('admin.jalur.edit', compact('jalur'));
    }

    public function update(Request $request, Jalur $jalur)
    {
        $request->validate([
            'nama_jalur' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jumlah_kuota' => 'required|integer|min:1',
            'alamat' => 'required|string|max:255',
        ]);

        $jalur->update($request->all());

        return redirect()->route('admin.jalur')->with('success', 'Jalur berhasil diperbarui.');
    }
}