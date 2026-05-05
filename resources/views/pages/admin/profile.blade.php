@extends('layouts.admin')

@section('title', 'Profile Admin')
@section('page-title', 'Profile Admin')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Profile Info -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <div class="w-32 h-32 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-user-shield text-5xl text-blue-500"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800">Admin Utama</h3>
            <p class="text-gray-500 text-sm">Super Administrator</p>
            <div class="mt-4">
                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                    <i class="fas fa-circle text-xs mr-1"></i> Aktif
                </span>
            </div>
            <button onclick="alert('Edit profile')" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg w-full">
                <i class="fas fa-edit mr-2"></i> Edit Profile
            </button>
        </div>
    </div>
    
    <!-- Profile Details -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold mb-4">Informasi Profile</h2>
            <div class="space-y-3">
                <div class="border-b pb-2">
                    <p class="text-sm text-gray-500">Nama Lengkap</p>
                    <p class="font-semibold text-gray-800">Admin Klinik Digital</p>
                </div>
                <div class="border-b pb-2">
                    <p class="text-sm text-gray-500">Email</p>
                    <p class="font-semibold text-gray-800">admin@klinikdigital.com</p>
                </div>
                <div class="border-b pb-2">
                    <p class="text-sm text-gray-500">Telepon</p>
                    <p class="font-semibold text-gray-800">0812-3456-7890</p>
                </div>
                <div class="border-b pb-2">
                    <p class="text-sm text-gray-500">Bergabung Sejak</p>
                    <p class="font-semibold text-gray-800">1 Januari 2024</p>
                </div>
                <div class="border-b pb-2">
                    <p class="text-sm text-gray-500">Role</p>
                    <p class="font-semibold text-gray-800">Super Administrator</p>
                </div>
            </div>
            
            <div class="mt-6">
                <button onclick="alert('Ganti password')" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">
                    <i class="fas fa-key mr-2"></i> Ganti Password
                </button>
            </div>
        </div>
    </div>
</div>
@endsection