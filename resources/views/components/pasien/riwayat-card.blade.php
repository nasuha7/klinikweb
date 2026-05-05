<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <div class="bg-gray-50 px-5 py-3 border-b flex justify-between items-center">
        <h2 class="font-bold text-gray-800 flex items-center">
            <i class="fas fa-history text-gray-500 mr-2"></i> Riwayat Konsultasi Terbaru
        </h2>
        <a href="{{ route('pasien.riwayat') }}" class="text-blue-500 text-sm hover:underline">Lihat Semua →</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 text-xs text-gray-500">
                <tr><th class="px-5 py-3 text-left">Tanggal</th><th class="px-5 py-3 text-left">Dokter</th><th class="px-5 py-3 text-left">Spesialis</th><th class="px-5 py-3 text-left">Status</th></tr>
            </thead>
            <tbody class="divide-y">
                <tr><td class="px-5 py-3 text-sm">10 Mei 2024</td><td class="px-5 py-3 font-medium text-sm">dr. Andi Wijaya</td><td class="px-5 py-3 text-sm">Penyakit Dalam</td><td class="px-5 py-3"><span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full">Selesai</span></td></tr>
                <tr><td class="px-5 py-3 text-sm">25 April 2024</td><td class="px-5 py-3 font-medium text-sm">dr. Siti Rahma</td><td class="px-5 py-3 text-sm">Anak</td><td class="px-5 py-3"><span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full">Selesai</span></td></tr>
                <tr><td class="px-5 py-3 text-sm">10 Maret 2024</td><td class="px-5 py-3 font-medium text-sm">dr. Budi Santoso</td><td class="px-5 py-3 text-sm">Jantung</td><td class="px-5 py-3"><span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full">Selesai</span></td></tr>
            </tbody>
        </table>
    </div>
</div>