namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laboratorium extends Model
{
    use HasFactory;

    protected $table = 'laboratorium';

    protected $primaryKey = 'no_lab';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'no_lab',
        'nama_lab',
        'level_lab',
        'jumlah_pc',
        'no_induk_admin'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'no_induk_admin');
    }

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'no_lab');
    }

    public function instalasi()
    {
        return $this->hasMany(Instalasi::class, 'no_lab');
    }
}