use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('software', function (Blueprint $table) {

            $table->id('id_software');

            $table->string('nama_software');

            $table->string('versi');

            $table->tinyInteger('level_software');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('software');
    }
};