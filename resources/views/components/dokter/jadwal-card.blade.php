<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-bold text-gray-800">Jadwal Praktik</h2>
        <i class="fas fa-calendar-alt text-3xl text-blue-500"></i>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left">Hari</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Jam</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody id="jadwalTableBody"></tbody>
        </table>
    </div>
</div>

<script>
    const jadwalDokter = {
        senin: { aktif: true, jam_mulai: '09:00', jam_selesai: '17:00' },
        selasa: { aktif: true, jam_mulai: '09:00', jam_selesai: '17:00' },
        rabu: { aktif: true, jam_mulai: '09:00', jam_selesai: '17:00' },
        kamis: { aktif: true, jam_mulai: '09:00', jam_selesai: '17:00' },
        jumat: { aktif: true, jam_mulai: '09:00', jam_selesai: '16:00' },
        sabtu: { aktif: false, jam_mulai: '', jam_selesai: '' },
        minggu: { aktif: false, jam_mulai: '', jam_selesai: '' }
    };
    
    const hariIndo = { senin:'Senin', selasa:'Selasa', rabu:'Rabu', kamis:'Kamis', jumat:'Jumat', sabtu:'Sabtu', minggu:'Minggu' };
    
    function renderJadwalDokter() {
        let html = '';
        for (const [key, val] of Object.entries(jadwalDokter)) {
            html += `
                <tr class="border-b">
                    <td class="px-4 py-2 font-semibold">${hariIndo[key]}</td>
                    <td class="px-4 py-2">
                        ${val.aktif ? '<span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Aktif</span>' : '<span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">Libur</span>'}
                    </td>
                    <td class="px-4 py-2">${val.aktif ? `${val.jam_mulai} - ${val.jam_selesai}` : '-'}</td>
                    <td class="px-4 py-2">
                        <button onclick="editJadwalDokter('${key}')" class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                    </td>
                </tr>
            `;
        }
        document.getElementById('jadwalTableBody').innerHTML = html;
    }
    
    window.editJadwalDokter = function(hari) {
        const data = jadwalDokter[hari];
        if (window.openEditJadwalModal) {
            window.openEditJadwalModal(hari, data.aktif, data.jam_mulai, data.jam_selesai);
        }
    };
    
    renderJadwalDokter();
</script>