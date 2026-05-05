<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-bold text-gray-800">Status Praktik</h2>
        <i class="fas fa-user-md text-3xl text-blue-500"></i>
    </div>
    
    <div class="space-y-4">
        <div class="flex items-center space-x-4">
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="status" value="aktif" class="status-radio" checked>
                <span class="ml-2 text-green-700 font-semibold">Aktif</span>
            </label>
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="status" value="tidak_aktif" class="status-radio">
                <span class="ml-2 text-red-700 font-semibold">Tidak Aktif</span>
            </label>
        </div>
        
        <div class="flex items-center space-x-2">
            <div class="flex-1">
                <span id="statusBadge" class="inline-flex items-center bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                    <i class="fas fa-circle text-xs mr-1"></i> Sedang Aktif
                </span>
            </div>
            <button onclick="updateStatus()" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-save mr-2"></i>Update Status
            </button>
        </div>
    </div>
</div>

<script>
    function updateStatus() {
        const selected = document.querySelector('input[name="status"]:checked').value;
        const badge = document.getElementById('statusBadge');
        
        if (selected === 'aktif') {
            badge.innerHTML = '<i class="fas fa-circle text-xs mr-1"></i> Sedang Aktif';
            badge.className = 'inline-flex items-center bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm';
            alert('Status berhasil diubah menjadi AKTIF');
        } else {
            badge.innerHTML = '<i class="fas fa-circle text-xs mr-1"></i> Sedang Tidak Aktif';
            badge.className = 'inline-flex items-center bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm';
            alert('Status berhasil diubah menjadi TIDAK AKTIF');
        }
    }
</script>