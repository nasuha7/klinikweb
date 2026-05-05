<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // ==================== DASHBOARD ====================
    public function index()
    {
        return view('pages.admin.dashboard');
    }
    
    // ==================== MANAJEMEN DOKTER ====================
    public function dokterIndex()
    {
        return view('pages.admin.dokter');
    }
    
    public function dokterCreate()
    {
        return view('pages.admin.dokter-form');
    }
    
    public function dokterStore(Request $request)
    {
        return redirect()->route('admin.dokter.index')->with('success', 'Dokter berhasil ditambahkan');
    }
    
    public function dokterEdit($id)
    {
        return view('pages.admin.dokter-form', compact('id'));
    }
    
    public function dokterUpdate(Request $request, $id)
    {
        return redirect()->route('admin.dokter.index')->with('success', 'Dokter berhasil diupdate');
    }
    
    public function dokterDelete($id)
    {
        return redirect()->route('admin.dokter.index')->with('success', 'Dokter berhasil dihapus');
    }
    
    public function dokterVerify($id)
    {
        return redirect()->route('admin.dokter.index')->with('success', 'Dokter berhasil diverifikasi');
    }
    
    public function dokterReject($id)
    {
        return redirect()->route('admin.dokter.index')->with('warning', 'Dokter ditolak');
    }
    
    // ==================== MANAJEMEN PASIEN ====================
    public function pasienIndex()
    {
        return view('pages.admin.pasien');
    }
    
    public function pasienCreate()
    {
        return view('pages.admin.pasien-form');
    }
    
    public function pasienStore(Request $request)
    {
        return redirect()->route('admin.pasien.index')->with('success', 'Pasien berhasil ditambahkan');
    }
    
    public function pasienEdit($id)
    {
        return view('pages.admin.pasien-form', compact('id'));
    }
    
    public function pasienUpdate(Request $request, $id)
    {
        return redirect()->route('admin.pasien.index')->with('success', 'Pasien berhasil diupdate');
    }
    
    public function pasienDelete($id)
    {
        return redirect()->route('admin.pasien.index')->with('success', 'Pasien berhasil dihapus');
    }
    
    // ==================== MANAJEMEN JADWAL ====================
    public function jadwalIndex()
    {
        return view('pages.admin.jadwal');
    }
    
    public function jadwalUpdateStatus(Request $request, $id)
    {
        return redirect()->route('admin.jadwal.index')->with('success', 'Status jadwal berhasil diupdate');
    }
    
    // ==================== MANAJEMEN RESERVASI ====================
    public function reservasiIndex()
    {
        return view('pages.admin.reservasi');
    }
    
    public function reservasiDetail($id)
    {
        return view('pages.admin.reservasi-detail', compact('id'));
    }
    
    public function reservasiUpdateStatus(Request $request, $id)
    {
        return redirect()->route('admin.reservasi.index')->with('success', 'Status reservasi berhasil diupdate');
    }
    
    public function reservasiDelete($id)
    {
        return redirect()->route('admin.reservasi.index')->with('success', 'Reservasi berhasil dihapus');
    }
    
    // ==================== PROFILE ADMIN ====================
    public function profileIndex()
    {
        return view('pages.admin.profile');
    }
    
    public function profileUpdate(Request $request)
    {
        return redirect()->route('admin.profile')->with('success', 'Profile berhasil diupdate');
    }
    
    // ==================== PENGATURAN ====================
    public function settingsIndex()
    {
        return view('pages.admin.settings');
    }
    
    public function settingsUpdate(Request $request)
    {
        return redirect()->route('admin.settings')->with('success', 'Pengaturan berhasil disimpan');
    }
}