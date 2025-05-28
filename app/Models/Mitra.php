<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitras';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'email',
        'telepon',
        'luas_lahan',
        'jumlah_pohon',
        'provinsi_id',
        'kabupaten_id',
        'kecamatan_id',
        'desa_id',
        'alamat_detail',
        'latitude',
        'longitude',
        'media_lahan',
        'surat_tanah',
        'kontrak',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function laporans()
    {
        return $this->hasMany(Laporan::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
} 