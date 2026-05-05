@extends('layouts.pasien')

@section('title', 'Riwayat Reservasi')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Riwayat Reservasi</h1>
        <p class="text-gray-500">Daftar semua janji temu yang telah Anda buat</p>
    </div>
    
    <x-pasien.riwayat-table />
    
    <div class="mt-6 text-center">
        <a href="{{ route('pasien.reservasi.create') }}" class="inline-flex items-center text-blue-500 hover:text-blue-600">
            <i class="fas fa-plus-circle mr-2"></i> Buat Janji Baru
        </a>
    </div>
</div>
@endsection