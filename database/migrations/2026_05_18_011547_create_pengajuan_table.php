use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuan', function (Blueprint $table) {

            $table->id('id_pengajuan');

            $table->string('no_induk');

            $table->string('no_lab');

            $table->unsignedBigInteger('id_software');

            $table->date('tgl_pengajuan');

            $table->string('mata_kuliah');

            $table->string('kelompok_matkul');

            $table->enum('status_persetujuan', [
                'pending',
                'approved',
                'rejected'
            ])->default('pending');

            $table->enum('status_progress', [
                'waiting_assignment',
                'assigned',
                'on_progress',
                'completed'
            ])->default('waiting_assignment');

            $table->string('tugas_admin')->nullable();

            $table->timestamp('tgl_penugasan')->nullable();

            $table->text('dokumentasi_url')->nullable();

            $table->string('software_lain')->nullable();

            $table->string('versi_lain')->nullable();

            $table->timestamps();

            // FK DOSEN
            $table->foreign('no_induk')
                ->references('no_induk')
                ->on('users')
                ->onDelete('cascade');

            // FK LAB
            $table->foreign('no_lab')
                ->references('no_lab')
                ->on('laboratorium')
                ->onDelete('cascade');

            // FK SOFTWARE
            $table->foreign('id_software')
                ->references('id_software')
                ->on('software')
                ->onDelete('cascade');

            // FK ADMIN ASSIGNED
            $table->foreign('tugas_admin')
                ->references('no_induk')
                ->on('users')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};