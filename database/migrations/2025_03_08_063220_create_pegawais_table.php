<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Hanya migration tabel terentu spt dibwa :
     * php artisan migrate --path=/database/migrations/2024_08_17_051354_create_pegawais_table.php --pretend
     * setelah migration dilanjutkan dengan menjalankan perintah :
     * php artisan migrate
     */
    public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('ktp')->nullable();
            $table->string('tlahir')->nullable();
            $table->date('tgllhr')->nullable();
            $table->string('jk')->nullable();
            $table->string('telp')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
