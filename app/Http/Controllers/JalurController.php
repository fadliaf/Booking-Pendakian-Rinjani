<?php

namespace App\Http\Controllers;

use App\Models\Jalur;
use Illuminate\Http\Request;

class JalurController extends Controller
{
    public function index()
    {
        $jalurs = Jalur::all(); // Ambil semua data jalur
        return view('admin.jalur.index', compact('jalurs')); // Kirim ke view jalur.index
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
        return view('admin.jalur.show', compact('jalur'));
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
