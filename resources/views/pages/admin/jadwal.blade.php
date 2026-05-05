@extends('layouts.admin')

@section('title', 'Kelola Jadwal')
@section('page-title', 'Kelola Jadwal')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-800">Daftar Jadwal Konsultasi</h2>
        <button onclick="alert('Tambah jadwal baru')" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
            <i class="fas fa-plus mr-2"></i> Tambah Jadwal
        </button>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left">Pasien</th>
                    <th class="px-4 py-2 text-left">Dokter</th>
                    <th class="px-4 py-2 text-left">Tanggal</th>
                    <th class="px-4 py-2 text-left">Jam</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody id="jadwalTableBody"></tbody>
        </table>
    </div>
</div>

<script>
    const jadwalData = [
        { id: 1, pasien: 'Ahmad Sudrajat', dokter: 'dr. Andi Wijaya, Sp.PD', tanggal: '2024-05-20', jam: '10:00', status: 'menunggu' },
        { id: 2, pasien: 'Siti Aminah', dokter: 'dr. Siti Rahma, Sp.A', tanggal: '2024-05-20', jam: '11:00', status: 'menunggu' },
        { id: 3, pasien: 'Budi Santoso', dokter: 'dr. Andi Wijaya, Sp.PD', tanggal: '2024-05-21', jam: '09:00', status: 'terjadwal' },
        { id: 4, pasien: 'Rina Wati', dokter: 'dr. Budi Santoso', tanggal: '2024-05-22', jam: '14:00', status: 'pending' },
        { id: 5, pasien: 'Dedi Firmansyah', dokter: 'dr. Siti Rahma, Sp.A', tanggal: '2024-05-22', jam: '15:00', status: 'selesai' }
    ];
    
    function getStatusBadge(status) {
        const statusMap = {
            'menunggu': 'bg-yellow-100 text-yellow-800',
            'terjadwal': 'bg-blue-100 text-blue-800',
            'pending': 'bg-orange-100 text-orange-800',
            'selesai': 'bg-green-100 text-green-800'
        };
        return `<span class="${statusMap[status]} px-2 py-1 rounded-full text-xs">${status}</span>`;
    }
    
    function renderJadwal() {
        let html = '';
        for (const j of jadwalData) {
            html += `
                <tr class="border-b">
                    <td class="px-4 py-2">${j.pasien}</td>
                    <td class="px-4 py-2">${j.dokter}</td>
                    <td class="px-4 py-2">${j.tanggal}</td>
                    <td class="px-4 py-2">${j.jam}</td>
                    <td class="px-4 py-2">${getStatusBadge(j.status)}</td>
                    <td class="px-4 py-2">
                        <button onclick="editJadwal(${j.id})" class="text-blue-500 hover:text-blue-700 mr-2"><i class="fas fa-edit"></i></button>
                        <button onclick="hapusJadwal(${j.id})" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            `;
        }
        document.getElementById('jadwalTableBody').innerHTML = html;
    }
    
    function editJadwal(id) {
        alert('Edit jadwal dengan ID: ' + id);
    }
    
    function hapusJadwal(id) {
        if (confirm('Hapus jadwal ini?')) {
            alert('Jadwal berhasil dihapus');
        }
    }
    
    renderJadwal();
</script>
@endsection