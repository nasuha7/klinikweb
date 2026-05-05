<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <div class="bg-yellow-50 px-5 py-3 border-b">
        <h2 class="font-bold text-gray-800 flex items-center">
            <i class="fas fa-clock text-yellow-500 mr-2"></i> Janji Temu Terdekat
        </h2>
    </div>
    <div class="p-5">
        <div class="flex items-center gap-4 border-b pb-4 mb-4">
            <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">
                <i class="fas fa-user-md text-2xl text-blue-500"></i>
            </div>
            <div class="flex-1">
                <p class="font-semibold text-gray-800">dr. Andi Wijaya, Sp.PD</p>
                <p class="text-sm text-gray-500">Spesialis Penyakit Dalam</p>
                <div class="flex items-center gap-2 mt-1">
                    <span class="text-xs text-gray-500"><i class="far fa-calendar mr-1"></i>Senin, 20 Mei 2024</span>
                    <span class="text-xs text-gray-500"><i class="far fa-clock mr-1"></i>10:00</span>
                </div>
            </div>
            <span class="bg-yellow-100 text-yellow-700 text-xs px-2 py-1 rounded-full">Menunggu</span>
        </div>
        <a href="{{ route('pasien.reservasi.create') }}" class="text-blue-500 text-sm hover:underline">+ Buat Janji Temu Baru</a>
    </div>
</div>