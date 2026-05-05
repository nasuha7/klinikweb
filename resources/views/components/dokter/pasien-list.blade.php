<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-bold text-gray-800">Daftar Pasien Yang Akan Konsultasi</h2>
        <div class="flex space-x-2">
            <button onclick="filterPasien()" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded-lg text-sm">
                <i class="fas fa-filter mr-1"></i> Filter
            </button>
            <button onclick="refreshData()" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded-lg text-sm">
                <i class="fas fa-sync-alt mr-1"></i> Refresh
            </button>
        </div>
    </div>
    
    <div class="space-y-4" id="daftarPasien"></div>
</div>

<script>
    const pasienData = {
        1: { id: 1, nama: 'Ahmad Sudrajat', usia: 35, keluhan: 'Demam dan batuk selama 3 hari', tanggal: '20 Mei 2024', jam: '10:00', status: 'menunggu', no_antrian: 1 },
        2: { id: 2, nama: 'Siti Aminah', usia: 28, keluhan: 'Sakit kepala sebelah kanan', tanggal: '20 Mei 2024', jam: '11:00', status: 'menunggu', no_antrian: 2 },
        3: { id: 3, nama: 'Budi Santoso', usia: 42, keluhan: 'Nyeri ulu hati', tanggal: '20 Mei 2024', jam: '13:00', status: 'terjadwal', no_antrian: 3 },
        4: { id: 4, nama: 'Rina Wati', usia: 25, keluhan: 'Alergi kulit', tanggal: '21 Mei 2024', jam: '09:00', status: 'menunggu', no_antrian: 1 }
    };
    
    function renderPasien() {
        let html = '';
        for (const [id, p] of Object.entries(pasienData)) {
            const statusClass = p.status === 'menunggu' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800';
            const statusIcon = p.status === 'menunggu' ? 'fa-clock' : 'fa-check';
            const statusText = p.status === 'menunggu' ? 'Menunggu' : 'Terjadwal';
            
            html += `
                <div class="border rounded-lg p-4 hover:shadow-lg transition-shadow pasien-card" data-status="${p.status}">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center mb-2">
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full mr-2">Antrian #${p.no_antrian}</span>
                                <span class="text-sm text-gray-500">${p.tanggal} - ${p.jam}</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">${p.nama}</h3>
                            <p class="text-sm text-gray-600">Usia: ${p.usia} tahun</p>
                            <div class="mt-2"><p class="text-sm text-gray-700"><strong>Keluhan:</strong> ${p.keluhan}</p></div>
                            <div class="mt-3"><span class="${statusClass} px-2 py-1 rounded-full text-xs"><i class="fas ${statusIcon} mr-1"></i> ${statusText}</span></div>
                        </div>
                        <div class="flex flex-col space-y-2">
                            ${p.status === 'menunggu' ? `
                                <button onclick="mulaiKonsultasi(${p.id})" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg w-full">
                                    <i class="fas fa-play mr-1"></i> Mulai Konsultasi
                                </button>
                            ` : ''}
                            <button onclick="lihatDetail(${p.id})" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                                <i class="fas fa-eye mr-1"></i> Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            `;
        }
        document.getElementById('daftarPasien').innerHTML = html;
    }
    
    function mulaiKonsultasi(id) {
        if (confirm('Mulai konsultasi dengan ' + pasienData[id].nama + '?')) {
            pasienData[id].status = 'terjadwal';
            renderPasien();
            alert('Konsultasi dimulai dengan ' + pasienData[id].nama);
        }
    }
    
    function lihatDetail(id) {
        const p = pasienData[id];
        if (p) {
            window.openDetailPasienModal(p);
        }
    }
    
    let filterStatus = 'semua';
    function filterPasien() {
        const cards = document.querySelectorAll('.pasien-card');
        if (filterStatus === 'semua') {
            filterStatus = 'menunggu';
            cards.forEach(card => card.style.display = card.getAttribute('data-status') === 'menunggu' ? 'block' : 'none');
        } else if (filterStatus === 'menunggu') {
            filterStatus = 'terjadwal';
            cards.forEach(card => card.style.display = card.getAttribute('data-status') === 'terjadwal' ? 'block' : 'none');
        } else {
            filterStatus = 'semua';
            cards.forEach(card => card.style.display = 'block');
        }
    }
    
    function refreshData() { renderPasien(); }
    
    renderPasien();
</script>