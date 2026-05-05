<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-5 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                    <th class="px-5 py-3 text-left text-sm font-semibold text-gray-600">Tanggal</th>
                    <th class="px-5 py-3 text-left text-sm font-semibold text-gray-600">Dokter</th>
                    <th class="px-5 py-3 text-left text-sm font-semibold text-gray-600">Diagnosa</th>
                    <th class="px-5 py-3 text-left text-sm font-semibold text-gray-600">Tindakan</th>
                    <th class="px-5 py-3 text-left text-sm font-semibold text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody id="rekamMedisTableBody" class="divide-y"></tbody>
        </table>
    </div>
    <div id="noDataRekam" class="text-center py-8 text-gray-500 hidden">
        <i class="fas fa-folder-open text-4xl mb-2 block"></i>
        <p>Belum ada rekam medis</p>
    </div>
</div>

<script>
    const rekamMedisData = [
        { id: 1, tanggal: '10 Mei 2024', dokter: 'dr. Andi Wijaya, Sp.PD', diagnosa: 'Demam dan batuk akut', tindakan: 'Diberikan obat penurun panas dan antibiotik', resep: 'Paracetamol, Amoxicillin' },
        { id: 2, tanggal: '25 April 2024', dokter: 'dr. Siti Rahma, Sp.A', diagnosa: 'Alergi makanan', tindakan: 'Diberikan obat antihistamin', resep: 'Cetirizine' }
    ];
    
    function renderRekamMedis() {
        const tbody = document.getElementById('rekamMedisTableBody');
        const noData = document.getElementById('noDataRekam');
        
        if (rekamMedisData.length === 0) {
            tbody.innerHTML = '';
            noData.classList.remove('hidden');
            return;
        }
        
        noData.classList.add('hidden');
        let html = '';
        
        rekamMedisData.forEach((item, index) => {
            html += `
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-3 text-sm">${index + 1}</td>
                    <td class="px-5 py-3 text-sm">${item.tanggal}</td>
                    <td class="px-5 py-3 text-sm font-medium">${item.dokter}</td>
                    <td class="px-5 py-3 text-sm">${item.diagnosa}</td>
                    <td class="px-5 py-3 text-sm">${item.tindakan}</td>
                    <td class="px-5 py-3">
                        <button onclick="detailRekamMedis(${item.id})" class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                    </td>
                </tr>
            `;
        });
        
        tbody.innerHTML = html;
    }
    
    function detailRekamMedis(id) {
        const data = rekamMedisData.find(item => item.id === id);
        if (data) {
            alert(`📋 REKAM MEDIS\n\nTanggal: ${data.tanggal}\nDokter: ${data.dokter}\nDiagnosa: ${data.diagnosa}\nTindakan: ${data.tindakan}\nResep: ${data.resep}`);
        }
    }
    
    renderRekamMedis();
</script>