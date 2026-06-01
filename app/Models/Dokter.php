<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'spesialis',
        'no_str',
        'status',
    ];

    // Relasi ke User (many-to-one)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Jadwal (one-to-many)
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    // Relasi ke Konsultasi (one-to-many)
    public function konsultasis()
    {
        return $this->hasMany(Konsultasi::class);
    }

    // Nama lengkap dokter dari user
    public function getNamaLengkapAttribute(): string
    {
        return 'dr. ' . $this->user->name . ', ' . $this->spesialis;
    }
}
