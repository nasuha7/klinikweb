@extends('layouts.pasien')

@section('title', 'Dashboard Pasien')

@section('content')
<div class="container mx-auto px-4 py-8">
    
    <x-pasien.welcome-card />
    <x-pasien.stats-card />
    <x-pasien.menu-card />
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <x-pasien.janji-temu-card />
        <x-pasien.rekomendasi-dokter />
    </div>
    
    <x-pasien.tips-card />
    <x-pasien.riwayat-card />
</div>
@endsection