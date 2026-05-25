<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instalasi extends Model
{
    use HasFactory;

    protected $table = 'instalasi';

    protected $primaryKey = 'id_instalasi';

    protected $fillable = [
        'id_software',
        'no_lab',
        'diinstal_oleh',
        'status_lisensi',
        'tgl_aktif',
        'tgl_expired'
    ];

    public function software()
    {
        return $this->belongsTo(Software::class, 'id_software');
    }

    public function laboratorium()
    {
        return $this->belongsTo(Laboratorium::class, 'no_lab');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'diinstall_oleh');
    }
}