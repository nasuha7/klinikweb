<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal_lahir',
        'alamat',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Konsultasi (one-to-many)
    public function konsultasis()
    {
        return $this->hasMany(Konsultasi::class);
    }

    // Helper: hitung usia dari tanggal lahir
    public function getUsiaAttribute(): ?int
    {
        if (!$this->tanggal_lahir) return null;
        return $this->tanggal_lahir->age;
    }
}
