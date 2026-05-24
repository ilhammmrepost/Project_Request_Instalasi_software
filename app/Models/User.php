<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'no_induk';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'no_induk',
        'nama',
        'email',
        'password',
        'no_hp',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    // DOSEN
    public function pengajuanDosen()
    {
        return $this->hasMany(Pengajuan::class, 'no_induk');
    }

    // ADMIN YANG DITUGASKAN
    public function assignedPengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'assigned_to');
    }

    // ADMIN PENANGGUNG JAWAB LAB
    public function laboratorium()
    {
        return $this->hasOne(Laboratorium::class, 'admin_no_induk');
    }

    // ADMIN YANG INSTALL SOFTWARE
    public function instalasi()
    {
        return $this->hasMany(Instalasi::class, 'installed_by');
    }
}