<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'nomor_induk',
        'role',
        'photo_path',
        'account_status',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getAuthIdentifierName(): string
    {
        return 'email';
    }

    /**
     * Mapping role ke primary_role SDD (admin|guru|siswa)
     * Digunakan oleh RoleMiddleware
     */
    public function getPrimaryRoleAttribute(): string
    {
        return strtolower($this->role ?? '');
    }

    /**
     * Cek apakah akun aktif (account_status = 'Aktif')
     * Digunakan oleh CheckActiveMiddleware
     */
    public function isActive(): bool
    {
        // Default ke aktif jika account_status belum di-set
        return ($this->account_status ?? 'Aktif') === 'Aktif';
    }

    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class, 'user_id', 'id');
    }

    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'user_id', 'id');
    }
}
