<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaporanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('laporans')->insert([
            [
                'mitra_id' => 1,
                'pegawai_id' => 2,
                'judul' => 'Laporan Pengawasan 1',
                'tanggal_laporan' => now()->subDays(3),
                'keterangan' => '<p>Isi laporan pengawasan pertama.</p>',
                'metode' => 'Kunjungan Langsung',
                'media_foto' => null,
                'media_video' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mitra_id' => 2,
                'pegawai_id' => 2,
                'judul' => 'Laporan Pengawasan 2',
                'tanggal_laporan' => now()->subDays(2),
                'keterangan' => '<p>Isi laporan pengawasan kedua.</p>',
                'metode' => 'Pengawasan Online',
                'media_foto' => null,
                'media_video' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mitra_id' => 3,
                'pegawai_id' => 2,
                'judul' => 'Laporan Pengawasan 3',
                'tanggal_laporan' => now()->subDay(),
                'keterangan' => '<p>Isi laporan pengawasan ketiga.</p>',
                'metode' => 'Kunjungan Langsung',
                'media_foto' => null,
                'media_video' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
} 