<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Konsultasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'jadwal_id',
        'keluhan',
        'status',
    ];

    // Relasi ke Pasien
    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    // Relasi ke Dokter
    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    // Relasi ke Jadwal
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    // Relasi ke Rekam Medis (one-to-one)
    public function rekamMedis()
    {
        return $this->hasOne(RekamMedis::class);
    }
}
