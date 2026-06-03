<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengajuan', function (Blueprint $table) {
            $table->text('catatan_progress')->nullable()->after('status_progress');
            $table->text('kendala')->nullable()->after('catatan_progress');
        });

        Schema::table('instalasi', function (Blueprint $table) {
            $table->date('tgl_instalasi')->nullable()->after('diinstal_oleh');
        });
    }

    public function down(): void
    {
        Schema::table('pengajuan', function (Blueprint $table) {
            $table->dropColumn([
                'catatan_progress',
                'kendala',
            ]);
        });

        Schema::table('instalasi', function (Blueprint $table) {
            $table->dropColumn('tgl_instalasi');
        });
    }
};