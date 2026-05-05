<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Aktivitas Terbaru -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold mb-4">Aktivitas Terbaru</h2>
        <div class="space-y-3" id="aktivitasContainer"></div>
    </div>

    <!-- Jadwal Hari Ini -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold mb-4">Jadwal Hari Ini</h2>
        <div class="space-y-3" id="jadwalHariIniContainer"></div>
        <div class="mt-4">
            <a href="javascript:void(0)" onclick="alert('Lihat semua jadwal')" class="text-blue-500 hover:text-blue-600 text-sm">Lihat semua jadwal →</a>
        </div>
    </div>
</div>

<script>
    const aktivitasAdmin = [
        { judul: 'Pasien baru mendaftar', detail: 'Ahmad Sudrajat', waktu: '5 menit lalu' },
        { judul: 'Janji temu baru', detail: 'Dengan dr. Andi Wijaya', waktu: '1 jam lalu' },
        { judul: 'Dokter baru mendaftar', detail: 'dr. Budi Santoso', waktu: '2 jam lalu' }
    ];
    
    const jadwalHariIniAdmin = [
        { dokter: 'dr. Andi Wijaya', pasien: 'Ahmad Sudrajat', jam: '10:00' },
        { dokter: 'dr. Siti Rahma', pasien: 'Siti Aminah', jam: '11:00' },
        { dokter: 'dr. Andi Wijaya', pasien: 'Budi Santoso', jam: '14:00' }
    ];
    
    function renderAktivitasAdmin() {
        let html = '';
        for (const item of aktivitasAdmin) {
            html += `
                <div class="flex items-center justify-between border-b pb-3">
                    <div>
                        <p class="font-semibold">${item.judul}</p>
                        <p class="text-sm text-gray-500">${item.detail}</p>
                    </div>
                    <span class="text-sm text-gray-400">${item.waktu}</span>
                </div>
            `;
        }
        document.getElementById('aktivitasContainer').innerHTML = html;
    }
    
    function renderJadwalHariIniAdmin() {
        let html = '';
        for (const item of jadwalHariIniAdmin) {
            html += `
                <div class="flex items-center justify-between border-b pb-3">
                    <div>
                        <p class="font-semibold">${item.dokter}</p>
                        <p class="text-sm text-gray-500">Pasien: ${item.pasien}</p>
                    </div>
                    <span class="text-sm text-blue-600">${item.jam}</span>
                </div>
            `;
        }
        document.getElementById('jadwalHariIniContainer').innerHTML = html;
    }
    
    renderAktivitasAdmin();
    renderJadwalHariIniAdmin();
</script>