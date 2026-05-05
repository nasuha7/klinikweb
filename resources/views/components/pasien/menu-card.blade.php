<div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-8">
    <a href="{{ route('pasien.reservasi.create') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl p-4 text-center text-white shadow-md hover:shadow-lg transition transform hover:scale-105">
        <i class="fas fa-calendar-plus text-2xl mb-2 block"></i>
        <span class="text-sm font-medium">Buat Janji</span>
    </a>
    <a href="{{ route('dokter') }}" class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl p-4 text-center text-white shadow-md hover:shadow-lg transition transform hover:scale-105">
        <i class="fas fa-user-md text-2xl mb-2 block"></i>
        <span class="text-sm font-medium">Cari Dokter</span>
    </a>
    <a href="{{ route('pasien.riwayat') }}" class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl p-4 text-center text-white shadow-md hover:shadow-lg transition transform hover:scale-105">
        <i class="fas fa-history text-2xl mb-2 block"></i>
        <span class="text-sm font-medium">Riwayat</span>
    </a>
    <a href="{{ route('pasien.rekam-medis') }}" class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl p-4 text-center text-white shadow-md hover:shadow-lg transition transform hover:scale-105">
        <i class="fas fa-file-medical text-2xl mb-2 block"></i>
        <span class="text-sm font-medium">Rekam Medis</span>
    </a>
</div>