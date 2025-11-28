<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('surat', function (Blueprint $table) {
            // tambah kolom hanya jika BELUM ada

            if (!Schema::hasColumn('surat', 'tipe_pengajuan')) {
                // tipe pengajuan: manual (cepat) atau online (lengkap)
                $table->enum('tipe_pengajuan', ['manual', 'online'])
                      ->default('manual')
                      ->after('status');
            }

            if (!Schema::hasColumn('surat', 'data_tambahan')) {
                // data tambahan khusus per jenis surat (JSON)
                $table->json('data_tambahan')
                      ->nullable()
                      ->after('tipe_pengajuan');
            }
        });
    }

    public function down(): void
    {
        Schema::table('surat', function (Blueprint $table) {
            $table->string('tipe_pengajuan')->default('manual')->after('status');
            $table->json('data_tambahan')->nullable()->after('tipe_pengajuan');
            $table->dateTime('estimasi_selesai')->nullable()->after('data_tambahan');
            $table->text('alasan_penolakan')->nullable()->after('estimasi_selesai');
            $table->text('catatan_admin')->nullable()->after('alasan_penolakan');
            $table->foreignId('diproses_oleh')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete()
                  ->after('catatan_admin');
        });
        
    }
};
