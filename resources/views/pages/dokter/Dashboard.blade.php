@extends('layouts.dokter')

@section('title', 'Dashboard Dokter')

@section('content')
<div class="space-y-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <x-dokter.status-card />
        <x-dokter.jadwal-card />
    </div>
    
    <x-dokter.pasien-list />
</div>

<x-dokter.modal-jadwal />
<x-dokter.modal-detail-pasien />
@endsection