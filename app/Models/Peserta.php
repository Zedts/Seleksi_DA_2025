<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Peserta extends Authenticatable
{
    protected $table = 'peserta'; // Add this line to specify the table name

    protected $fillable = [
        'nama_lengkap',
        'wawancara',
        'tes_tulis',
        'cv',
        'visimisi_proker',
        'total_score',
        'status_kelulusan',
        'role_id'
    ];

    protected $casts = [
        'wawancara' => 'decimal:2',
        'tes_tulis' => 'decimal:2',
        'cv' => 'decimal:2',
        'visimisi_proker' => 'decimal:2',
        'total_score' => 'decimal:2'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin()
    {
        return $this->role && $this->role->name === 'admin';
    }

    public function getStatusKelulusanAttribute($value)
    {
        return $value;
    }

    public function scopeLeaderboard($query)
    {
        return $query->selectRaw('*, ((wawancara + tes_tulis + cv + visimisi_proker) / 4) as avg_score')
                ->orderByDesc('avg_score');
    }
}