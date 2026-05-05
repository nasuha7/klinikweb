@extends('layouts.pasien')

@section('title', 'Reservasi Berhasil')

@section('content')
<div class="container mx-auto px-4 py-16">
    <div class="max-w-md mx-auto text-center">
        <div class="bg-green-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-check-circle text-5xl text-green-500"></i>
        </div>
        
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Reservasi Berhasil!</h1>
        <p class="text-gray-500 mb-6">Janji temu Anda telah berhasil dibuat.</p>
        
        <div class="bg-blue-50 rounded-lg p-4 mb-6 text-left">
            <h3 class="font-semibold text-blue-800 mb-2">Informasi Penting:</h3>
            <ul class="text-sm text-blue-700 space-y-1">
                <li><i class="fas fa-clock mr-2"></i> Silakan datang 15 menit sebelum jadwal</li>
                <li><i class="fas fa-phone mr-2"></i> Bawa kartu identitas</li>
                <li><i class="fas fa-file-medical mr-2"></i> Bawa hasil pemeriksaan sebelumnya (jika ada)</li>
            </ul>
        </div>
        
        <div class="flex flex-col gap-3">
            <a href="{{ route('pasien.dashboard') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg transition">
                <i class="fas fa-home mr-2"></i> Kembali ke Dashboard
            </a>
            <a href="{{ route('pasien.riwayat') }}" class="border border-blue-500 text-blue-500 hover:bg-blue-50 py-2 rounded-lg transition">
                <i class="fas fa-history mr-2"></i> Lihat Riwayat
            </a>
        </div>
    </div>
</div>
@endsection