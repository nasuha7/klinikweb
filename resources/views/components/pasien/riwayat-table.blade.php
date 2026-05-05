<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-5 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                    <th class="px-5 py-3 text-left text-sm font-semibold text-gray-600">Tanggal</th>
                    <th class="px-5 py-3 text-left text-sm font-semibold text-gray-600">Dokter</th>
                    <th class="px-5 py-3 text-left text-sm font-semibold text-gray-600">Jam</th>
                    <th class="px-5 py-3 text-left text-sm font-semibold text-gray-600">Keluhan</th>
                    <th class="px-5 py-3 text-left text-sm font-semibold text-gray-600">Status</th>
                    <th class="px-5 py-3 text-left text-sm font-semibold text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody id="riwayatTableBody" class="divide-y"></tbody>
        </table>
    </div>
    <div id="noData" class="text-center py-8 text-gray-500 hidden">
        <i class="fas fa-inbox text-4xl mb-2 block"></i>
        <p>Belum ada riwayat reservasi</p>
    </div>
</div>

<script>
    function getStatusBadge(status) {
        const statusMap = {
            'menunggu': 'bg-yellow-100 text-yellow-800',
            'dikonfirmasi': 'bg-blue-100 text-blue-800',
            'selesai': 'bg-green-100 text-green-800',
            'batal': 'bg-red-100 text-red-800'
        };
        const iconMap = {
            'menunggu': 'fa-clock',
            'dikonfirmasi': 'fa-check-circle',
            'selesai': 'fa-check-double',
            'batal': 'fa-times-circle'
        };
        return `<span class="${statusMap[status]} px-2 py-1 rounded-full text-xs"><i class="fas ${iconMap[status]} mr-1"></i>${status}</span>`;
    }
    
    function renderRiwayat() {
        const riwayat = JSON.parse(localStorage.getItem('riwayatReservasi') || '[]');
        const tbody = document.getElementById('riwayatTableBody');
        const noData = document.getElementById('noData');
        
        if (riwayat.length === 0) {
            tbody.innerHTML = '';
            noData.classList.remove('hidden');
            return;
        }
        
        noData.classList.add('hidden');
        let html = '';
        
        riwayat.forEach((item, index) => {
            html += `
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-3 text-sm">${index + 1}</td>
                    <td class="px-5 py-3 text-sm">${item.tanggal}</td>
                    <td class="px-5 py-3 text-sm font-medium">${item.dokter}</td>
                    <td class="px-5 py-3 text-sm">${item.jam}</td>
                    <td class="px-5 py-3 text-sm max-w-[200px] truncate">${item.keluhan}</td>
                    <td class="px-5 py-3">${getStatusBadge(item.status)}</td>
                    <td class="px-5 py-3">
                        <button onclick="batalReservasi(${item.id})" class="text-red-500 hover:text-red-700">
                            <i class="fas fa-times-circle"></i> Batal
                        </button>
                    </td>
                </tr>
            `;
        });
        
        tbody.innerHTML = html;
    }
    
    function batalReservasi(id) {
        if (confirm('Batalkan janji temu ini?')) {
            let riwayat = JSON.parse(localStorage.getItem('riwayatReservasi') || '[]');
            riwayat = riwayat.filter(item => item.id !== id);
            localStorage.setItem('riwayatReservasi', JSON.stringify(riwayat));
            renderRiwayat();
            alert('✅ Janji temu berhasil dibatalkan');
        }
    }
    
    renderRiwayat();
</script>