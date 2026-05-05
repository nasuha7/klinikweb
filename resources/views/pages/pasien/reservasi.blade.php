@extends('layouts.pasien')

@section('title', 'Buat Janji Temu')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Buat Janji Temu</h1>
            <p class="text-gray-500">Isi form berikut untuk membuat janji konsultasi dengan dokter</p>
        </div>

        <x-pasien.form-reservasi />
        
        <!-- Informasi -->
        <div class="mt-6 bg-blue-50 rounded-lg p-4">
            <h3 class="font-semibold text-blue-800 mb-2 flex items-center">
                <i class="fas fa-info-circle mr-2"></i> Informasi Penting
            </h3>
            <ul class="text-sm text-blue-700 space-y-1">
                <li><i class="fas fa-check-circle mr-2"></i> Konsultasi dilakukan secara online via video call</li>
                <li><i class="fas fa-check-circle mr-2"></i> Pastikan nomor telepon dan email aktif</li>
                <li><i class="fas fa-check-circle mr-2"></i> Konfirmasi janji akan dikirim via WhatsApp/Email</li>
                <li><i class="fas fa-check-circle mr-2"></i> Batalkan janji maksimal H-1 sebelum jadwal</li>
            </ul>
        </div>
    </div>
</div>
@endsection