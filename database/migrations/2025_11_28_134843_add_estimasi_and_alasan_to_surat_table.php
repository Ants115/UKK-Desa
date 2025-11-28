<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('surat', function (Blueprint $table) {
            // estimasi surat selesai (opsional)
            $table->dateTime('estimasi_selesai')
                  ->nullable()
                  ->after('status');

            // alasan penolakan (kalau status = ditolak)
            $table->text('alasan_penolakan')
                  ->nullable()
                  ->after('estimasi_selesai');

            // catatan admin (opsional)
            $table->text('catatan_admin')
                  ->nullable()
                  ->after('alasan_penolakan');
        });
    }

    public function down(): void
    {
        Schema::table('surat', function (Blueprint $table) {
            $table->dropColumn([
                'estimasi_selesai',
                'alasan_penolakan',
                'catatan_admin',
            ]);
        });
    }
};
