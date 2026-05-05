<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPasienController extends Controller
{
    public function index()
    {
        return view('pages.pasien.dashboard');
    }
    
    public function profile()
    {
        return view('pages.pasien.profile');
    }
    
    public function updateProfile(Request $request)
    {
        return redirect()->back()->with('success', 'Profile berhasil diupdate');
    }
    
    public function rekamMedis()
    {
        return view('pages.pasien.rekam-medis');
    }
    
    public function detailRekamMedis($id)
    {
        return view('pages.pasien.rekam-medis-detail');
    }
}