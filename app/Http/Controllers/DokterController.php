<?php

namespace App\Http\Controllers;

class DokterController extends Controller
{
    public function index()
    {
        // Data dummy dokter (hardcoded, bukan database)
        $dokters = [
            [
                'id' => 1,
                'nama' => 'dr. Andi Wijaya, Sp.PD',
                'spesialis' => 'Penyakit Dalam',
                'foto' => 'https://randomuser.me/api/portraits/men/1.jpg',
                'pengalaman' => '10 tahun',
                'rating' => 4.8,
                'pasien' => 1200,
                'jadwal' => 'Senin - Jumat, 09:00 - 17:00',
                'telepon' => '0812-3456-7890',
                'email' => 'dr.andi@klinikdigital.com',
                'deskripsi' => 'Dokter spesialis penyakit dalam berpengalaman.'
            ],
            [
                'id' => 2,
                'nama' => 'dr. Siti Rahma, Sp.A',
                'spesialis' => 'Anak',
                'foto' => 'https://randomuser.me/api/portraits/women/2.jpg',
                'pengalaman' => '8 tahun',
                'rating' => 4.9,
                'pasien' => 950,
                'jadwal' => 'Senin - Sabtu, 08:00 - 15:00',
                'telepon' => '0812-3456-7891',
                'email' => 'dr.siti@klinikdigital.com',
                'deskripsi' => 'Dokter spesialis anak yang ramah dan sabar.'
            ]
        ];

        return view('dokter', compact('dokters'));
    }
}