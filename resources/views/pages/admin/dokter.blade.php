@extends('layouts.admin')

@section('title', 'Kelola Dokter')
@section('page-title', 'Kelola Dokter')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-800">Daftar Dokter</h2>
        <button onclick="alert('Tambah dokter baru')" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
            <i class="fas fa-plus mr-2"></i> Tambah Dokter
        </button>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">Spesialis</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Telepon</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody id="dokterTableBody"></tbody>
        </table>
    </div>
</div>

<script>
    const dokterData = [
        { id: 1, nama: 'dr. Andi Wijaya, Sp.PD', spesialis: 'Penyakit Dalam', email: 'andi@dokter.com', telepon: '081234567890', status: 'approved' },
        { id: 2, nama: 'dr. Siti Rahma, Sp.A', spesialis: 'Anak', email: 'siti@dokter.com', telepon: '081234567891', status: 'approved' },
        { id: 3, nama: 'dr. Budi Santoso', spesialis: 'Umum', email: 'budi@dokter.com', telepon: '081234567892', status: 'pending' },
        { id: 4, nama: 'dr. Maya Sari', spesialis: 'Mata', email: 'maya@dokter.com', telepon: '081234567893', status: 'pending' },
        { id: 5, nama: 'dr. Rizki Fadillah', spesialis: 'Kulit', email: 'rizki@dokter.com', telepon: '081234567894', status: 'approved' }
    ];
    
    function renderDokter() {
        let html = '';
        for (const d of dokterData) {
            const statusBadge = d.status === 'approved' 
                ? '<span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Approved</span>'
                : '<span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">Pending</span>';
            
            html += `
                <tr class="border-b">
                    <td class="px-4 py-2">${d.nama}</td>
                    <td class="px-4 py-2">${d.spesialis}</td>
                    <td class="px-4 py-2">${d.email}</td>
                    <td class="px-4 py-2">${d.telepon}</td>
                    <td class="px-4 py-2">${statusBadge}</td>
                    <td class="px-4 py-2">
                        <button onclick="editDokter(${d.id})" class="text-blue-500 hover:text-blue-700 mr-2"><i class="fas fa-edit"></i></button>
                        <button onclick="hapusDokter(${d.id})" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            `;
        }
        document.getElementById('dokterTableBody').innerHTML = html;
    }
    
    function editDokter(id) {
        alert('Edit dokter dengan ID: ' + id);
    }
    
    function hapusDokter(id) {
        if (confirm('Hapus dokter ini?')) {
            alert('Dokter berhasil dihapus');
        }
    }
    
    renderDokter();
</script>
@endsection