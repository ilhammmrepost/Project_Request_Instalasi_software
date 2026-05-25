<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('instalasi', function (Blueprint $table) {

            $table->id('id_instalasi');

            $table->unsignedBigInteger('id_software');

            $table->string('no_lab');

            $table->string('diinstal_oleh');

            $table->enum('status_lisensi', [
                'aktif',
                'expired',
                'trial'
            ]);

            $table->date('tgl_aktif');

            $table->date('tgl_expired')->nullable();

            $table->timestamps();

            // FK SOFTWARE
            $table->foreign('id_software')
                ->references('id_software')
                ->on('software')
                ->onDelete('cascade');

            // FK LAB
            $table->foreign('no_lab')
                ->references('no_lab')
                ->on('laboratorium')
                ->onDelete('cascade');

            // FK ADMIN
            $table->foreign('diinstal_oleh')
                ->references('no_induk')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instalasi');
    }
};