<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'jumlah',
        'kondisi',
        'lokasi',
        'keterangan'
    ];
}