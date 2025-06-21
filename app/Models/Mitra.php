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
        'umur_pohon',
        'tanggal_input_umur',
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

    protected $casts = [
        'tanggal_input_umur' => 'date',
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

    /**
     * Hitung umur pohon saat ini berdasarkan tanggal input pertama
     */
    public function getUmurPohonSekarangAttribute()
    {
        if (!$this->tanggal_input_umur || !$this->umur_pohon) {
            return null;
        }

        $tanggalSekarang = now();
        $selisihHari = $tanggalSekarang->diffInDays($this->tanggal_input_umur);
        return $this->umur_pohon + $selisihHari;
    }

    /**
     * Cek apakah umur pohon sudah diinput
     */
    public function isUmurPohonSet()
    {
        return !is_null($this->umur_pohon) && !is_null($this->tanggal_input_umur);
    }
}
