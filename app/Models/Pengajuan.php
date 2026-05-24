<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';

    protected $primaryKey = 'id_pengajuan';

    protected $fillable = [
        'no_induk',
        'no_lab',
        'id_software',
        'tgl_pengajuan',
        'mata_kuliah',
        'kelompok_matkul',
        'status_persetujuan',
        'status_progress',
        'tugas_admin',
        'tgl_penugasan',
        'dokumentasi_url',
        'software_lain',
        'versi_lain'
    ];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'no_induk');
    }

    public function laboratorium()
    {
        return $this->belongsTo(Laboratorium::class, 'no_lab');
    }

    public function software()
    {
        return $this->belongsTo(Software::class, 'id_software');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'tugas_admin');
    }
}