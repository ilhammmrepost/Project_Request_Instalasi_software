use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laboratorium', function (Blueprint $table) {

            $table->string('no_lab')->primary();

            $table->string('nama_lab');

            $table->tinyInteger('level_lab');

            $table->integer('jumlah_pc');

            $table->string('no_induk_admin');

            $table->timestamps();

            $table->foreign('no_induk_admin')
                ->references('no_induk')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laboratorium');
    }
};