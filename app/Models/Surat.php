<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';

    protected $fillable = [
        'user_id',
        'jenis_surat',
        'keterangan',
        'status',
        'tipe_pengajuan',
        'data_tambahan',
        'estimasi_selesai',
        'alasan_penolakan',
        'catatan_admin',
    ];

    protected $casts = [
        'data_tambahan'    => 'array',
        'estimasi_selesai' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
