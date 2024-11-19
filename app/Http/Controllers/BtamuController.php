<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Btamu; 
use Carbon\Carbon; // Model Btamu

class BtamuController extends Controller
{
    // Menampilkan daftar Buku Tamu
    public function index()
    {
        // Ambil semua data Buku Tamu
        $btamus = Btamu::all();  // Menambahkan pengambilan data Buku Tamu

        // Statistik pengunjung berdasarkan tanggal
        $todayVisitors = Btamu::whereDate('tanggal', Carbon::today())->count();
        $yesterdayVisitors = Btamu::whereDate('tanggal', Carbon::yesterday())->count();
        $monthVisitors = Btamu::whereMonth('tanggal', Carbon::now()->month)->count();
        $totalVisitors = Btamu::count();
    
        // Kirim data Buku Tamu dan statistik pengunjung ke view
        return view('btamu.index', compact('btamus', 'todayVisitors', 'yesterdayVisitors', 'monthVisitors', 'totalVisitors'));
    }

    // Menampilkan form untuk menambah Buku Tamu
    public function create()
    {
        return view('btamu.create');  // Menampilkan form untuk menambah Buku Tamu
    }

    // Menyimpan Buku Tamu baru
    public function store(Request $request)
    {
        Btamu::create($request->all());  // Menyimpan data ke database
        return redirect()->route('btamu.index');  // Redirect ke halaman daftar Buku Tamu
    }
}

