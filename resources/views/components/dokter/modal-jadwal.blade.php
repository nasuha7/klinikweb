<div id="modalJadwal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold">Edit Jadwal</h3>
            <button onclick="closeModalJadwal()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div>
            <input type="hidden" id="edit_hari">
            
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" id="edit_aktif_checkbox" class="form-checkbox" onchange="toggleJamFields()">
                    <span class="ml-2">Aktif</span>
                </label>
            </div>
            
            <div id="jamFields" class="space-y-3">
                <div>
                    <label class="block text-sm font-medium mb-1">Jam Mulai</label>
                    <input type="time" id="edit_jam_mulai" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Jam Selesai</label>
                    <input type="time" id="edit_jam_selesai" class="w-full px-3 py-2 border rounded-lg">
                </div>
            </div>
            
            <div class="mt-4 flex justify-end space-x-2">
                <button onclick="closeModalJadwal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Batal</button>
                <button onclick="simpanJadwal()" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    let currentEditHari = null;
    
    window.openEditJadwalModal = function(hari, aktif, jamMulai, jamSelesai) {
        currentEditHari = hari;
        document.getElementById('edit_aktif_checkbox').checked = aktif;
        document.getElementById('edit_jam_mulai').value = jamMulai;
        document.getElementById('edit_jam_selesai').value = jamSelesai;
        toggleJamFields();
        document.getElementById('modalJadwal').classList.remove('hidden');
    };
    
    function toggleJamFields() {
        const isChecked = document.getElementById('edit_aktif_checkbox').checked;
        document.getElementById('jamFields').style.display = isChecked ? 'block' : 'none';
    }
    
    function simpanJadwal() {
        const aktif = document.getElementById('edit_aktif_checkbox').checked;
        const jamMulai = document.getElementById('edit_jam_mulai').value;
        const jamSelesai = document.getElementById('edit_jam_selesai').value;
        
        if (window.jadwalData && currentEditHari) {
            window.jadwalData[currentEditHari] = { aktif: aktif, jam_mulai: jamMulai, jam_selesai: jamSelesai };
            if (window.renderJadwal) window.renderJadwal();
        }
        
        closeModalJadwal();
        alert('Jadwal berhasil diupdate');
    }
    
    function closeModalJadwal() {
        document.getElementById('modalJadwal').classList.add('hidden');
        currentEditHari = null;
    }
</script>