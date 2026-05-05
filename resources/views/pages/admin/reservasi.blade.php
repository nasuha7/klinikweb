@extends('layouts.admin')

@section('title', 'Kelola Reservasi')
@section('page-title', 'Kelola Reservasi')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-4 flex-wrap gap-2">
        <h2 class="text-xl font-bold text-gray-800">Daftar Reservasi</h2>
        <div class="flex space-x-2">
            <select id="filterStatus" onchange="filterReservasi()" class="px-3 py-2 border rounded-lg text-sm">
                <option value="semua">Semua Status</option>
                <option value="menunggu">Menunggu</option>
                <option value="terjadwal">Terjadwal</option>
                <option value="selesai">Selesai</option>
                <option value="batal">Batal</option>
            </select>
            <button onclick="tambahReservasi()" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-plus mr-2"></i> Tambah Reservasi
            </button>
            <button onclick="location.reload()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-sync-alt mr-2"></i> Refresh
            </button>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full min-w-[800px]">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Pasien</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Dokter</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Tanggal</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Jam</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Keluhan</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Status</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody id="reservasiTableBody"></tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="flex justify-between items-center mt-4 pt-4 border-t">
        <div class="text-sm text-gray-500" id="paginationInfo"></div>
        <div class="flex space-x-2" id="paginationButtons"></div>
    </div>
</div>

<!-- Modal Detail Reservasi -->
<div id="modalDetail" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-800">Detail Reservasi</h3>
            <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        
        <div class="space-y-3" id="modalContent"></div>
        
        <div class="mt-6 flex justify-end space-x-2">
            <button onclick="closeModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Tutup</button>
            <button id="modalEditBtn" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-edit mr-1"></i> Edit
            </button>
        </div>
    </div>
</div>

<!-- Modal Form Reservasi -->
<div id="modalForm" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-800" id="formTitle">Tambah Reservasi</h3>
            <button onclick="closeForm()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        
        <div class="space-y-3">
            <div>
                <label class="block text-sm font-medium mb-1">Pasien</label>
                <select id="formPasien" class="w-full px-3 py-2 border rounded-lg">
                    <option value="">Pilih Pasien</option>
                    <option value="Ahmad Sudrajat">Ahmad Sudrajat</option>
                    <option value="Siti Aminah">Siti Aminah</option>
                    <option value="Budi Santoso">Budi Santoso</option>
                    <option value="Rina Wati">Rina Wati</option>
                    <option value="Dedi Firmansyah">Dedi Firmansyah</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Dokter</label>
                <select id="formDokter" class="w-full px-3 py-2 border rounded-lg">
                    <option value="">Pilih Dokter</option>
                    <option value="dr. Andi Wijaya, Sp.PD">dr. Andi Wijaya, Sp.PD</option>
                    <option value="dr. Siti Rahma, Sp.A">dr. Siti Rahma, Sp.A</option>
                    <option value="dr. Budi Santoso">dr. Budi Santoso</option>
                    <option value="dr. Maya Sari">dr. Maya Sari</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Tanggal</label>
                <input type="date" id="formTanggal" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Jam</label>
                <input type="time" id="formJam" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Keluhan</label>
                <textarea id="formKeluhan" rows="3" class="w-full px-3 py-2 border rounded-lg"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Status</label>
                <select id="formStatus" class="w-full px-3 py-2 border rounded-lg">
                    <option value="menunggu">Menunggu</option>
                    <option value="terjadwal">Terjadwal</option>
                    <option value="selesai">Selesai</option>
                    <option value="batal">Batal</option>
                </select>
            </div>
        </div>
        
        <div class="mt-6 flex justify-end space-x-2">
            <button onclick="closeForm()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Batal</button>
            <button onclick="simpanReservasi()" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-save mr-1"></i> Simpan
            </button>
        </div>
    </div>
</div>

<script>
    // Data reservasi
    let reservasiData = [
        { id: 1, pasien: 'Ahmad Sudrajat', dokter: 'dr. Andi Wijaya, Sp.PD', tanggal: '2024-05-20', jam: '10:00', keluhan: 'Demam dan batuk selama 3 hari', status: 'menunggu' },
        { id: 2, pasien: 'Siti Aminah', dokter: 'dr. Siti Rahma, Sp.A', tanggal: '2024-05-20', jam: '11:00', keluhan: 'Sakit kepala sebelah kanan', status: 'terjadwal' },
        { id: 3, pasien: 'Budi Santoso', dokter: 'dr. Andi Wijaya, Sp.PD', tanggal: '2024-05-21', jam: '09:00', keluhan: 'Nyeri ulu hati setelah makan', status: 'selesai' },
        { id: 4, pasien: 'Rina Wati', dokter: 'dr. Budi Santoso', tanggal: '2024-05-21', jam: '14:00', keluhan: 'Alergi kulit disertai gatal', status: 'batal' },
        { id: 5, pasien: 'Dedi Firmansyah', dokter: 'dr. Siti Rahma, Sp.A', tanggal: '2024-05-22', jam: '13:00', keluhan: 'Demam tinggi 39°C', status: 'menunggu' }
    ];
    
    let currentId = null;
    let currentPage = 1;
    const itemsPerPage = 5;
    
    function getStatusBadge(status) {
        const statusMap = {
            'menunggu': 'bg-yellow-100 text-yellow-800',
            'terjadwal': 'bg-blue-100 text-blue-800',
            'selesai': 'bg-green-100 text-green-800',
            'batal': 'bg-red-100 text-red-800'
        };
        const iconMap = {
            'menunggu': 'fa-clock',
            'terjadwal': 'fa-check-circle',
            'selesai': 'fa-check-double',
            'batal': 'fa-times-circle'
        };
        return `<span class="${statusMap[status]} px-2 py-1 rounded-full text-xs"><i class="fas ${iconMap[status]} mr-1"></i>${status}</span>`;
    }
    
    function formatTanggal(tanggal) {
        const tgl = new Date(tanggal);
        return tgl.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
    }
    
    function renderReservasi() {
        const filterStatus = document.getElementById('filterStatus').value;
        let filteredData = reservasiData;
        
        if (filterStatus !== 'semua') {
            filteredData = reservasiData.filter(r => r.status === filterStatus);
        }
        
        const start = (currentPage - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const paginatedData = filteredData.slice(start, end);
        const totalPages = Math.ceil(filteredData.length / itemsPerPage);
        
        let html = '';
        let no = start + 1;
        
        for (const r of paginatedData) {
            html += `
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3 text-sm">${no++}</td>
                    <td class="px-4 py-3 text-sm font-medium">${r.pasien}</td>
                    <td class="px-4 py-3 text-sm">${r.dokter}</td>
                    <td class="px-4 py-3 text-sm">${formatTanggal(r.tanggal)}</td>
                    <td class="px-4 py-3 text-sm">${r.jam}</td>
                    <td class="px-4 py-3 text-sm max-w-[200px] truncate">${r.keluhan}</td>
                    <td class="px-4 py-3">${getStatusBadge(r.status)}</td>
                    <td class="px-4 py-3 text-center">
                        <button onclick="lihatDetail(${r.id})" class="text-green-500 hover:text-green-700 mr-2" title="Detail">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button onclick="editReservasi(${r.id})" class="text-blue-500 hover:text-blue-700 mr-2" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="hapusReservasi(${r.id})" class="text-red-500 hover:text-red-700" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
        }
        
        if (paginatedData.length === 0) {
            html = `
                <tr>
                    <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                        <i class="fas fa-inbox text-4xl mb-2 block"></i>
                        Tidak ada data reservasi
                    </td>
                </tr>
            `;
        }
        
        document.getElementById('reservasiTableBody').innerHTML = html;
        
        // Pagination info
        document.getElementById('paginationInfo').innerHTML = `Menampilkan ${start + 1} - ${Math.min(end, filteredData.length)} dari ${filteredData.length} data`;
        
        // Pagination buttons
        let paginationHtml = '';
        for (let i = 1; i <= totalPages; i++) {
            paginationHtml += `
                <button onclick="goToPage(${i})" class="px-3 py-1 rounded ${currentPage === i ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'}">
                    ${i}
                </button>
            `;
        }
        document.getElementById('paginationButtons').innerHTML = paginationHtml;
    }
    
    function goToPage(page) {
        currentPage = page;
        renderReservasi();
    }
    
    function filterReservasi() {
        currentPage = 1;
        renderReservasi();
    }
    
    function lihatDetail(id) {
        const reservasi = reservasiData.find(r => r.id === id);
        if (reservasi) {
            currentId = id;
            const modalContent = `
                <div class="border-b pb-2">
                    <p class="text-sm text-gray-500">Pasien</p>
                    <p class="font-semibold text-gray-800">${reservasi.pasien}</p>
                </div>
                <div class="border-b pb-2">
                    <p class="text-sm text-gray-500">Dokter</p>
                    <p class="font-semibold text-gray-800">${reservasi.dokter}</p>
                </div>
                <div class="border-b pb-2">
                    <p class="text-sm text-gray-500">Tanggal & Jam</p>
                    <p class="font-semibold text-gray-800">${formatTanggal(reservasi.tanggal)} - ${reservasi.jam}</p>
                </div>
                <div class="border-b pb-2">
                    <p class="text-sm text-gray-500">Keluhan</p>
                    <p class="font-semibold text-gray-800">${reservasi.keluhan}</p>
                </div>
                <div class="border-b pb-2">
                    <p class="text-sm text-gray-500">Status</p>
                    <p class="font-semibold text-gray-800">${getStatusBadge(reservasi.status)}</p>
                </div>
            `;
            document.getElementById('modalContent').innerHTML = modalContent;
            document.getElementById('modalEditBtn').onclick = () => {
                closeModal();
                editReservasi(id);
            };
            document.getElementById('modalDetail').classList.remove('hidden');
        }
    }
    
    function tambahReservasi() {
        currentId = null;
        document.getElementById('formTitle').innerText = 'Tambah Reservasi';
        document.getElementById('formPasien').value = '';
        document.getElementById('formDokter').value = '';
        document.getElementById('formTanggal').value = '';
        document.getElementById('formJam').value = '';
        document.getElementById('formKeluhan').value = '';
        document.getElementById('formStatus').value = 'menunggu';
        document.getElementById('modalForm').classList.remove('hidden');
    }
    
    function editReservasi(id) {
        const reservasi = reservasiData.find(r => r.id === id);
        if (reservasi) {
            currentId = id;
            document.getElementById('formTitle').innerText = 'Edit Reservasi';
            document.getElementById('formPasien').value = reservasi.pasien;
            document.getElementById('formDokter').value = reservasi.dokter;
            document.getElementById('formTanggal').value = reservasi.tanggal;
            document.getElementById('formJam').value = reservasi.jam;
            document.getElementById('formKeluhan').value = reservasi.keluhan;
            document.getElementById('formStatus').value = reservasi.status;
            document.getElementById('modalForm').classList.remove('hidden');
        }
    }
    
    function simpanReservasi() {
        const pasien = document.getElementById('formPasien').value;
        const dokter = document.getElementById('formDokter').value;
        const tanggal = document.getElementById('formTanggal').value;
        const jam = document.getElementById('formJam').value;
        const keluhan = document.getElementById('formKeluhan').value;
        const status = document.getElementById('formStatus').value;
        
        if (!pasien || !dokter || !tanggal || !jam) {
            alert('Harap isi semua field yang diperlukan!');
            return;
        }
        
        if (currentId === null) {
            // Tambah baru
            const newId = Math.max(...reservasiData.map(r => r.id)) + 1;
            reservasiData.push({
                id: newId,
                pasien: pasien,
                dokter: dokter,
                tanggal: tanggal,
                jam: jam,
                keluhan: keluhan,
                status: status
            });
            alert('✅ Reservasi berhasil ditambahkan!');
        } else {
            // Update
            const index = reservasiData.findIndex(r => r.id === currentId);
            if (index !== -1) {
                reservasiData[index] = {
                    ...reservasiData[index],
                    pasien: pasien,
                    dokter: dokter,
                    tanggal: tanggal,
                    jam: jam,
                    keluhan: keluhan,
                    status: status
                };
                alert('✅ Reservasi berhasil diupdate!');
            }
        }
        
        closeForm();
        renderReservasi();
    }
    
    function hapusReservasi(id) {
        if (confirm('Apakah Anda yakin ingin menghapus reservasi ini?')) {
            reservasiData = reservasiData.filter(r => r.id !== id);
            renderReservasi();
            alert('✅ Reservasi berhasil dihapus!');
        }
    }
    
    function closeModal() {
        document.getElementById('modalDetail').classList.add('hidden');
        currentId = null;
    }
    
    function closeForm() {
        document.getElementById('modalForm').classList.add('hidden');
        currentId = null;
    }
    
    // Inisialisasi
    renderReservasi();
</script>
@endsection