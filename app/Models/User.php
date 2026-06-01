<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'nomor_hp',
        'role',
        'jenis_kelamin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi ke tabel dokter (1:1)
    public function dokter()
    {
        return $this->hasOne(Dokter::class);
    }

    // Relasi ke tabel pasien (1:1)
    public function pasien()
    {
        return $this->hasOne(Pasien::class);
    }

    // Helper: cek apakah user ini admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Helper: cek apakah user ini dokter
    public function isDokter(): bool
    {
        return $this->role === 'dokter';
    }

    // Helper: cek apakah user ini pasien
    public function isPasien(): bool
    {
        return $this->role === 'pasien';
    }
}
