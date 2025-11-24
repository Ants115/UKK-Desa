<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();

            $table->string('nama_barang');
            $table->string('kode_barang')->nullable()->unique();
            
            // Jumlah barang, minimal 0
            $table->unsignedInteger('jumlah')->default(1);

            // Kolom kondisi barang
            $table->enum('kondisi', ['Baik', 'Rusak Ringan', 'Rusak Berat'])->default('Baik');

            // Lokasi tempat barang disimpan
            $table->string('lokasi');

            // Keterangan tambahan (opsional)
            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};