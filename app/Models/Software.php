namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Software extends Model
{
    use HasFactory;

    protected $table = 'software';

    protected $primaryKey = 'id_software';

    protected $fillable = [
        'nama_software',
        'versi',
        'level_software'
    ];

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'id_software');
    }

    public function instalasi()
    {
        return $this->hasMany(Instalasi::class, 'id_software');
    }
}