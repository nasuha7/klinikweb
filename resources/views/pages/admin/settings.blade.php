@extends('layouts.admin')

@section('title', 'Pengaturan')
@section('page-title', 'Pengaturan Sistem')

@section('content')
<div class="grid grid-cols-1 gap-6">
    <!-- Pengaturan Umum -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold mb-4">Pengaturan Umum</h2>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium mb-1">Nama Klinik</label>
                <input type="text" value="Klinik Digital Sehat" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Alamat Klinik</label>
                <input type="text" value="Jl. Kesehatan No. 123, Jakarta" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Telepon Klinik</label>
                <input type="text" value="(021) 1234-5678" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email Klinik</label>
                <input type="email" value="info@klinikdigital.com" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <button onclick="alert('Pengaturan disimpan')" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-save mr-2"></i> Simpan Pengaturan
            </button>
        </div>
    </div>
    
    <!-- Pengaturan Jam Operasional -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold mb-4">Jam Operasional</h2>
        <div class="space-y-3">
            <div class="flex items-center justify-between">
                <span class="font-semibold">Senin - Jumat</span>
                <span>09:00 - 17:00</span>
                <button onclick="alert('Edit jam operasional')" class="text-blue-500"><i class="fas fa-edit"></i> Edit</button>
            </div>
            <div class="flex items-center justify-between">
                <span class="font-semibold">Sabtu</span>
                <span>09:00 - 14:00</span>
                <button onclick="alert('Edit jam operasional')" class="text-blue-500"><i class="fas fa-edit"></i> Edit</button>
            </div>
            <div class="flex items-center justify-between">
                <span class="font-semibold">Minggu</span>
                <span>Tutup</span>
                <button onclick="alert('Edit jam operasional')" class="text-blue-500"><i class="fas fa-edit"></i> Edit</button>
            </div>
        </div>
    </div>
    
    <!-- Pengaturan Notifikasi -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold mb-4">Pengaturan Notifikasi</h2>
        <div class="space-y-3">
            <label class="flex items-center">
                <input type="checkbox" class="form-checkbox" checked>
                <span class="ml-2">Notifikasi email untuk reservasi baru</span>
            </label>
            <label class="flex items-center">
                <input type="checkbox" class="form-checkbox" checked>
                <span class="ml-2">Notifikasi untuk dokter baru mendaftar</span>
            </label>
            <label class="flex items-center">
                <input type="checkbox" class="form-checkbox">
                <span class="ml-2">Notifikasi untuk jadwal yang dikonfirmasi</span>
            </label>
        </div>
        <button onclick="alert('Pengaturan notifikasi disimpan')" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
            <i class="fas fa-save mr-2"></i> Simpan Notifikasi
        </button>
    </div>
</div>
@endsection