<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\Pengajuan;
use App\Models\Instalasi;
use App\Models\Laboratorium;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'no_induk',
        'name',
        'email',
        'password',
        'no_hp',
        'role',
        'email_verified_at',
    ];

    protected $hidden =[
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



    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    public function getFilamentName(): string
    {
        return $this->name;
    }


    public function pengajuanDosen()
    {
        return $this->hasMany(Pengajuan::class, 'no_induk', 'no_induk');
    }


    public function assignedPengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'assigned_to', 'no_induk');
    }


    public function laboratorium()
    {
        return $this->hasOne(Laboratorium::class, 'admin_no_induk', 'no_induk');
    }

    public function instalasi()
    {
        return $this->hasMany(Instalasi::class, 'installed_by', 'no_induk');
    }
}