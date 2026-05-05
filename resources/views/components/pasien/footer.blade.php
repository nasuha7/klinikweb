<footer class="bg-gray-800 text-white pt-12 pb-6 mt-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- About -->
            <div>
                <h3 class="text-xl font-bold mb-4 flex items-center">
                    <i class="fas fa-clinic-medical mr-2"></i> Klinik Digital
                </h3>
                <p class="text-gray-400 text-sm">Layanan kesehatan modern dengan teknologi terkini untuk kenyamanan Anda.</p>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h4 class="font-semibold mb-4">Tautan Cepat</h4>
                <ul class="text-gray-400 text-sm space-y-2">
                    <li><a href="{{ route('pasien.dashboard') }}" class="hover:text-white transition">Dashboard</a></li>
                    <li><a href="{{ route('dokter') }}" class="hover:text-white transition">Dokter</a></li>
                    <li><a href="{{ route('pasien.reservasi.create') }}" class="hover:text-white transition">Buat Janji</a></li>
                    <li><a href="{{ route('pasien.riwayat') }}" class="hover:text-white transition">Riwayat</a></li>
                </ul>
            </div>
            
            <!-- Contact -->
            <div>
                <h4 class="font-semibold mb-4">Kontak Kami</h4>
                <ul class="text-gray-400 text-sm space-y-2">
                    <li><i class="fas fa-phone mr-2"></i> (021) 1234-5678</li>
                    <li><i class="fas fa-envelope mr-2"></i> info@klinikdigital.com</li>
                    <li><i class="fas fa-map-marker-alt mr-2"></i> Jakarta, Indonesia</li>
                </ul>
            </div>
            
            <!-- Social Media -->
            <div>
                <h4 class="font-semibold mb-4">Ikuti Kami</h4>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition text-xl"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition text-xl"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition text-xl"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition text-xl"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        
        <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400 text-sm">
            <p>&copy; 2024 Klinik Digital. All rights reserved.</p>
        </div>
    </div>
</footer>