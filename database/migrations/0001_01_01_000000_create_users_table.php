<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

            $table->string('no_induk')->primary();

            $table->string('nama');

            $table->string('email')->unique();

            $table->string('password');

            $table->string('no_hp');

            $table->enum('role', [
                'dosen',
                'admin',
                'supervisor'
            ]);

            $table->rememberToken();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};