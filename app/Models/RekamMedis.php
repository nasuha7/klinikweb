<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RekamMedis extends Model
{
    use HasFactory;

    protected $table = 'rekam_medis';

    protected $fillable = [
        'konsultasi_id',
        'diagnosa',
        'tindakan',
        'resep',
        'catatan',
    ];

    // Relasi ke Konsultasi
    public function konsultasi()
    {
        return $this->belongsTo(Konsultasi::class);
    }
}
