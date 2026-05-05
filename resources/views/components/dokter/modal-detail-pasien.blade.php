<div id="modalDetailPasien" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-800">Detail Pasien</h3>
            <button onclick="closeModalDetailPasien()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        
        <div class="space-y-3">
            <div class="border-b pb-2"><p class="text-sm text-gray-500">Nama Lengkap</p><p id="detailNama" class="font-semibold text-gray-800">-</p></div>
            <div class="border-b pb-2"><p class="text-sm text-gray-500">Usia</p><p id="detailUsia" class="font-semibold text-gray-800">-</p></div>
            <div class="border-b pb-2"><p class="text-sm text-gray-500">Keluhan</p><p id="detailKeluhan" class="font-semibold text-gray-800">-</p></div>
            <div class="border-b pb-2"><p class="text-sm text-gray-500">Tanggal Konsultasi</p><p id="detailTanggal" class="font-semibold text-gray-800">-</p></div>
            <div class="border-b pb-2"><p class="text-sm text-gray-500">Jam Konsultasi</p><p id="detailJam" class="font-semibold text-gray-800">-</p></div>
            <div class="border-b pb-2"><p class="text-sm text-gray-500">No. Antrian</p><p id="detailAntrian" class="font-semibold text-gray-800">-</p></div>
        </div>
        
        <div class="mt-6 flex justify-end">
            <button onclick="closeModalDetailPasien()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Tutup</button>
        </div>
    </div>
</div>

<script>
    let currentDetailId = null;
    
    window.openDetailPasienModal = function(pasien) {
        currentDetailId = pasien.id;
        document.getElementById('detailNama').innerText = pasien.nama;
        document.getElementById('detailUsia').innerText = pasien.usia + ' tahun';
        document.getElementById('detailKeluhan').innerText = pasien.keluhan;
        document.getElementById('detailTanggal').innerText = pasien.tanggal;
        document.getElementById('detailJam').innerText = pasien.jam;
        document.getElementById('detailAntrian').innerText = '#' + pasien.no_antrian;
        document.getElementById('modalDetailPasien').classList.remove('hidden');
    };
    
    function closeModalDetailPasien() {
        document.getElementById('modalDetailPasien').classList.add('hidden');
        currentDetailId = null;
    }
</script>