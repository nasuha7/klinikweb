<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'dokter_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'kuota',
        'sisa_kuota',
        'status',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // Relasi ke Dokter
    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    // Relasi ke Konsultasi (one-to-many)
    public function konsultasis()
    {
        return $this->hasMany(Konsultasi::class);
    }

    // Cek apakah jadwal masih tersedia
    public function isTersedia(): bool
    {
        return $this->status === 'tersedia' && $this->sisa_kuota > 0;
    }
}
