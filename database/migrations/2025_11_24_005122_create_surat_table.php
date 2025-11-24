<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();

            // relasi ke tabel users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->string('jenis_surat');
            $table->text('keterangan')->nullable();

            // default: menunggu
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};