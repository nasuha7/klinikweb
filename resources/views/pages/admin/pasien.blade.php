@extends('layouts.admin')

@section('title', 'Kelola Pasien')
@section('page-title', 'Kelola Pasien')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-800">Daftar Pasien</h2>
        <button onclick="alert('Tambah pasien baru')" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
            <i class="fas fa-plus mr-2"></i> Tambah Pasien
        </button>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Telepon</th>
                    <th class="px-4 py-2 text-left">Tanggal Daftar</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody id="pasienTableBody"></tbody>
        </table>
    </div>
</div>

<script>
    const pasienData = [
        { id: 1, nama: 'Ahmad Sudrajat', email: 'ahmad@gmail.com', telepon: '081234567001', tanggal_daftar: '2024-01-15' },
        { id: 2, nama: 'Siti Aminah', email: 'siti@gmail.com', telepon: '081234567002', tanggal_daftar: '2024-01-20' },
        { id: 3, nama: 'Budi Santoso', email: 'budi@gmail.com', telepon: '081234567003', tanggal_daftar: '2024-02-10' },
        { id: 4, nama: 'Rina Wati', email: 'rina@gmail.com', telepon: '081234567004', tanggal_daftar: '2024-03-05' },
        { id: 5, nama: 'Dedi Firmansyah', email: 'dedi@gmail.com', telepon: '081234567005', tanggal_daftar: '2024-03-15' }
    ];
    
    function renderPasien() {
        let html = '';
        for (const p of pasienData) {
            html += `
                <tr class="border-b">
                    <td class="px-4 py-2">${p.nama}</td>
                    <td class="px-4 py-2">${p.email}</td>
                    <td class="px-4 py-2">${p.telepon}</td>
                    <td class="px-4 py-2">${p.tanggal_daftar}</td>
                    <td class="px-4 py-2">
                        <button onclick="editPasien(${p.id})" class="text-blue-500 hover:text-blue-700 mr-2"><i class="fas fa-edit"></i></button>
                        <button onclick="hapusPasien(${p.id})" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            `;
        }
        document.getElementById('pasienTableBody').innerHTML = html;
    }
    
    function editPasien(id) {
        alert('Edit pasien dengan ID: ' + id);
    }
    
    function hapusPasien(id) {
        if (confirm('Hapus pasien ini?')) {
            alert('Pasien berhasil dihapus');
        }
    }
    
    renderPasien();
</script>
@endsection