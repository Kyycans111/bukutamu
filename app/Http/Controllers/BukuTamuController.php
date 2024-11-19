<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuTamu;
class BukuTamuController extends Controller
{
    // Menampilkan daftar Buku Tamu
    public function index()
    {
        $bukutamus = BukuTamu::all();
        return view('bukutamu.index', compact('bukutamus'));
    }

    // Menampilkan form untuk menambah Buku Tamu
    public function create()
    {
        return view('bukutamu.create');
    }

    // Menyimpan Buku Tamu baru
    public function store(Request $request)
    {
        BukuTamu::create([
            'nama' => $request->nama,
            'keperluan' => $request->keperluan,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'tanggal' => $request->tanggal,
        ]);
        return redirect('/bukutamu');
    } 

    // Menampilkan form untuk mengedit Buku Tamu
    public function edit($id)
    {
        $bukutamu = BukuTamu::findOrFail($id);
        return view('bukutamu.edit', compact('bukutamu'));
    }

    // Mengupdate Buku Tamu
    public function update(Request $request, $id)
    {
        $bukutamu = BukuTamu::findOrFail($id);
        $bukutamu->update([
            'nama' => $request->nama,
            'keperluan' => $request->keperluan,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'tanggal' => $request->tanggal,
        ]);
        return redirect('/bukutamu');
    }

    // Menghapus Buku Tamu
    public function destroy($id)
    {
        $bukutamu = BukuTamu::findOrFail($id);
        $bukutamu->delete();
        return redirect('/bukutamu');
    }
}
 