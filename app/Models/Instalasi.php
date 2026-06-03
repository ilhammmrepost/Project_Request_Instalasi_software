<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Software;
use App\Models\User;
use App\Models\Laboratorium;

class Instalasi extends Model
{
    use HasFactory;

    protected $table = 'instalasi';

    protected $primaryKey = 'id_instalasi';

    protected $fillable = [
        'id_software',
        'no_lab',
        'diinstal_oleh',
        'tgl_instalasi',
        'status_lisensi',
        'tgl_aktif',
        'tgl_expired'
    ];

    public function software()
    {
        return $this->belongsTo(Software::class, 'id_software', 'id_software');
    }

    public function laboratorium()
    {
        return $this->belongsTo(Laboratorium::class, 'no_lab', 'no_lab');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'diinstal_oleh', 'no_induk');
    }
}