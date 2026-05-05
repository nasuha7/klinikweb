<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function create()
    {
        return view('pages.pasien.reservasi');
    }
    
    public function store(Request $request)
    {
        return redirect()->route('pasien.reservasi.success')->with('success', 'Reservasi berhasil dibuat');
    }
    
    public function success()
    {
        return view('pages.pasien.reservasi-success');
    }
    
    public function batal($id)
    {
        return redirect()->route('pasien.riwayat')->with('success', 'Reservasi berhasil dibatalkan');
    }
    
    public function riwayat()
    {
        return view('pages.pasien.riwayat-reservasi'); // ← ubah ini
    }
    
    public function detailRiwayat($id)
    {
        return view('pages.pasien.riwayat-detail');
    }
}