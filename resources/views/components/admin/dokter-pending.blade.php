<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-bold text-gray-800">
            <i class="fas fa-clock text-orange-500 mr-2"></i>
            Dokter Menunggu Verifikasi
        </h2>
        <a href="javascript:void(0)" onclick="alert('Lihat semua dokter')" class="text-blue-500 hover:text-blue-600 text-sm">Lihat semua →</a>
    </div>
    
    <div class="space-y-3" id="pendingDokterContainer"></div>
</div>

<script>
    const pendingDokterAdmin = [
        { nama: 'dr. Budi Santoso', spesialis: 'Spesialis Umum', email: 'budi@dokter.com' },
        { nama: 'dr. Maya Sari', spesialis: 'Spesialis Mata', email: 'maya@dokter.com' }
    ];
    
    function renderPendingDokterAdmin() {
        let html = '';
        for (const dokter of pendingDokterAdmin) {
            html += `
                <div class="flex items-center justify-between border rounded-lg p-4 bg-yellow-50">
                    <div>
                        <p class="font-semibold text-gray-800">${dokter.nama}</p>
                        <p class="text-sm text-gray-600">${dokter.spesialis} | ${dokter.email}</p>
                    </div>
                    <div class="flex space-x-2">
                        <button onclick="verifikasiDokterAdmin('${dokter.nama}')" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-lg text-sm">
                            <i class="fas fa-check mr-1"></i> Verifikasi
                        </button>
                        <button onclick="tolakDokterAdmin('${dokter.nama}')" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm">
                            <i class="fas fa-times mr-1"></i> Tolak
                        </button>
                    </div>
                </div>
            `;
        }
        document.getElementById('pendingDokterContainer').innerHTML = html;
    }
    
    function verifikasiDokterAdmin(nama) {
        if (confirm(`Verifikasi dokter ${nama}?`)) {
            alert(`✅ Dokter ${nama} berhasil diverifikasi`);
            location.reload();
        }
    }
    
    function tolakDokterAdmin(nama) {
        if (confirm(`Tolak verifikasi dokter ${nama}?`)) {
            alert(`❌ Dokter ${nama} ditolak`);
            location.reload();
        }
    }
    
    renderPendingDokterAdmin();
</script>