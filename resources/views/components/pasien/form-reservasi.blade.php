<div class="bg-white rounded-xl shadow-md p-6">
    <form id="reservasiForm">
        <div class="space-y-4">
            <!-- Pilih Dokter -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Dokter *</label>
                <select id="dokter" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">-- Pilih Dokter --</option>
                    <option value="1">dr. Andi Wijaya, Sp.PD - Penyakit Dalam</option>
                    <option value="2">dr. Siti Rahma, Sp.A - Spesialis Anak</option>
                    <option value="3">dr. Budi Santoso, Sp.JP - Spesialis Jantung</option>
                    <option value="4">dr. Maya Sari, Sp.M - Spesialis Mata</option>
                    <option value="5">dr. Rizki Fadillah, Sp.KK - Spesialis Kulit</option>
                    <option value="6">dr. Lina Herawati, Sp.OG - Spesialis Kandungan</option>
                </select>
            </div>

            <!-- Tanggal Konsultasi -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Konsultasi *</label>
                <input type="date" id="tanggal" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Jam Konsultasi -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jam Konsultasi *</label>
                <select id="jam" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">-- Pilih Jam --</option>
                    <option value="08:00">08:00 - 09:00</option>
                    <option value="09:00">09:00 - 10:00</option>
                    <option value="10:00">10:00 - 11:00</option>
                    <option value="11:00">11:00 - 12:00</option>
                    <option value="13:00">13:00 - 14:00</option>
                    <option value="14:00">14:00 - 15:00</option>
                    <option value="15:00">15:00 - 16:00</option>
                    <option value="16:00">16:00 - 17:00</option>
                </select>
            </div>

            <!-- Keluhan -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Keluhan *</label>
                <textarea id="keluhan" rows="4" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Jelaskan keluhan Anda..." required></textarea>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-lg font-semibold transition">
                <i class="fas fa-calendar-check mr-2"></i> Buat Janji Temu
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('reservasiForm')?.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const dokter = document.getElementById('dokter').value;
        const tanggal = document.getElementById('tanggal').value;
        const jam = document.getElementById('jam').value;
        const keluhan = document.getElementById('keluhan').value;
        
        if (!dokter || !tanggal || !jam || !keluhan) {
            alert('Harap isi semua field!');
            return;
        }
        
        // Simpan ke localStorage
        const reservasiBaru = {
            id: Date.now(),
            dokter: document.getElementById('dokter').options[document.getElementById('dokter').selectedIndex]?.text,
            tanggal: tanggal,
            jam: jam,
            keluhan: keluhan,
            status: 'menunggu',
            created_at: new Date().toLocaleDateString('id-ID')
        };
        
        let riwayat = JSON.parse(localStorage.getItem('riwayatReservasi') || '[]');
        riwayat.unshift(reservasiBaru);
        localStorage.setItem('riwayatReservasi', JSON.stringify(riwayat));
        
        alert('✅ Janji temu berhasil dibuat!');
        window.location.href = "{{ route('pasien.reservasi.success') }}";
    });
</script>