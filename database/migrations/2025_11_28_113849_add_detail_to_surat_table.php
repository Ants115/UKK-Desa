<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('surat', function (Blueprint $table) {
            // tipe pengajuan: manual (cepat) atau online (lengkap)
            $table->enum('tipe_pengajuan', ['manual', 'online'])
                  ->default('manual')
                  ->after('status');

            // data tambahan khusus per jenis surat (JSON)
            $table->json('data_tambahan')
                  ->nullable()
                  ->after('tipe_pengajuan');
        });
    }

    public function down(): void
    {
        Schema::table('surat', function (Blueprint $table) {
            $table->dropColumn(['tipe_pengajuan', 'data_tambahan']);
        });
    }
};
