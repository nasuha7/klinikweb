<div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl p-6 mb-8 text-white shadow-lg">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold mb-2">Halo, Pasien! 👋</h1>
            <p class="text-blue-100">Selamat datang di Klinik Digital. Kesehatan Anda adalah prioritas kami.</p>
            <div class="mt-4 flex gap-3" id="welcomeInfo"></div>
        </div>
        <div class="hidden md:block">
            <i class="fas fa-heartbeat text-7xl text-white/30"></i>
        </div>
    </div>
</div>

<script>
    const pasienInfo = { terdaftar: '2024', konsultasi: 3 };
    document.getElementById('welcomeInfo').innerHTML = `
        <span class="bg-white/20 px-3 py-1 rounded-full text-sm">🏥 Terdaftar sejak ${pasienInfo.terdaftar}</span>
        <span class="bg-white/20 px-3 py-1 rounded-full text-sm">🩺 ${pasienInfo.konsultasi}x Konsultasi</span>
    `;
</script>