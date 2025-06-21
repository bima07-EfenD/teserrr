<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporans';

    protected $fillable = [
        'pegawai_id',
        'mitra_id',
        'judul',
        'keterangan',
        'tanggal_laporan',
        'media_foto',
        'media_video',
        'metode',
        'template',
        'kegiatan_lainnya',
        'panen_buah',
        'berat_rata_rata',
    ];

    protected $casts = [
        'tanggal_laporan' => 'datetime',
        'panen_buah' => 'decimal:2'
    ];

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'pegawai_id')->where('role', 'pegawai');
    }
    public function chats()
    {
        return $this->hasMany(Chat::class, 'laporan_id');
    }
}
