<div class="bg-white rounded-xl shadow-md p-6">
    {{-- Flash error message --}}
    @if(session('error'))
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('pasien.reservasi.store') }}" method="POST" id="reservasiForm">
        @csrf
        <div class="space-y-4">
            
            {{-- Pilih Dokter --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Dokter *</label>
                <select name="dokter_id" id="dokter_id" 
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('dokter_id') border-red-500 @enderror" 
                    required>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach($dokters as $dokter)
                        <option value="{{ $dokter->id }}" {{ old('dokter_id') == $dokter->id ? 'selected' : '' }}>
                            dr. {{ $dokter->user->name }} - {{ $dokter->spesialis }}
                        </option>
                    @endforeach
                </select>
                @error('dokter_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Pilih Jadwal (Dinamis via AJAX) --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Jadwal *</label>
                <select name="jadwal_id" id="jadwal_id"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('jadwal_id') border-red-500 @enderror"
                    required>
                    <option value="">-- Pilih dokter dahulu --</option>
                </select>
                @error('jadwal_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <p id="loading-jadwal" class="text-xs text-gray-500 mt-1 hidden">Memuat jadwal...</p>
            </div>

            {{-- Keluhan --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Keluhan *</label>
                <textarea name="keluhan" id="keluhan" rows="4" 
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('keluhan') border-red-500 @enderror"
                    placeholder="Jelaskan keluhan Anda secara detail (minimal 10 karakter)..."
                    required>{{ old('keluhan') }}</textarea>
                @error('keluhan')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol Submit --}}
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-lg font-semibold transition">
                <i class="fas fa-calendar-check mr-2"></i> Buat Janji Temu
            </button>
        </div>
    </form>
</div>

<script>
document.getElementById('dokter_id').addEventListener('change', function () {
    const dokterId = this.value;
    const jadwalSelect = document.getElementById('jadwal_id');
    const loadingText = document.getElementById('loading-jadwal');

    jadwalSelect.innerHTML = '<option value="">-- Pilih Jadwal --</option>';

    if (!dokterId) return;

    loadingText.classList.remove('hidden');

    fetch(`{{ route('pasien.reservasi.jadwal') }}?dokter_id=${dokterId}`)
        .then(response => response.json())
        .then(jadwals => {
            loadingText.classList.add('hidden');

            if (jadwals.length === 0) {
                jadwalSelect.innerHTML = '<option value="">Tidak ada jadwal tersedia</option>';
                return;
            }

            jadwals.forEach(jadwal => {
                const tanggal = new Date(jadwal.tanggal).toLocaleDateString('id-ID', {
                    weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
                });
                const option = document.createElement('option');
                option.value = jadwal.id;
                option.textContent = `${tanggal} | ${jadwal.jam_mulai} - ${jadwal.jam_selesai} (Sisa: ${jadwal.sisa_kuota} slot)`;
                jadwalSelect.appendChild(option);
            });
        })
        .catch(() => {
            loadingText.classList.add('hidden');
            jadwalSelect.innerHTML = '<option value="">Gagal memuat jadwal</option>';
        });
});
</script>
