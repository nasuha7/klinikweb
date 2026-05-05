<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <div class="bg-green-50 px-5 py-3 border-b">
        <h2 class="font-bold text-gray-800 flex items-center">
            <i class="fas fa-star text-yellow-500 mr-2"></i> Rekomendasi Dokter
        </h2>
    </div>
    <div class="p-5 space-y-3">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center">
                <i class="fas fa-user-md text-pink-500"></i>
            </div>
            <div class="flex-1">
                <p class="font-semibold text-gray-800">dr. Siti Rahma, Sp.A</p>
                <p class="text-xs text-gray-500">Spesialis Anak · Rating 4.9</p>
            </div>
            <a href="{{ route('dokter') }}" class="bg-blue-500 text-white px-3 py-1 rounded-lg text-xs">Pilih</a>
        </div>
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                <i class="fas fa-user-md text-blue-500"></i>
            </div>
            <div class="flex-1">
                <p class="font-semibold text-gray-800">dr. Budi Santoso, Sp.JP</p>
                <p class="text-xs text-gray-500">Spesialis Jantung · Rating 4.8</p>
            </div>
            <a href="{{ route('dokter') }}" class="bg-blue-500 text-white px-3 py-1 rounded-lg text-xs">Pilih</a>
        </div>
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                <i class="fas fa-user-md text-purple-500"></i>
            </div>
            <div class="flex-1">
                <p class="font-semibold text-gray-800">dr. Maya Sari, Sp.M</p>
                <p class="text-xs text-gray-500">Spesialis Mata · Rating 4.7</p>
            </div>
            <a href="{{ route('dokter') }}" class="bg-blue-500 text-white px-3 py-1 rounded-lg text-xs">Pilih</a>
        </div>
    </div>
    <div class="bg-gray-50 px-5 py-3 text-center">
        <a href="{{ route('dokter') }}" class="text-blue-500 text-sm hover:underline">Lihat Semua Dokter →</a>
    </div>
</div>