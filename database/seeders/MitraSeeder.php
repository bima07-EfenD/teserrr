<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MitraSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Mitra Satu',
                'email' => 'mitra1@example.com',
                'password' => Hash::make('password'),
                'no_telepon' => '081234567890',
                'alamat' => 'Jl. Mitra Satu No. 1',
                'role' => 'petani',
                'created_at' => Carbon::now()->subDays(10),
            ],
            [
                'name' => 'Mitra Dua',
                'email' => 'mitra2@example.com',
                'password' => Hash::make('password'),
                'no_telepon' => '081234567891',
                'alamat' => 'Jl. Mitra Dua No. 2',
                'role' => 'petani',
                'created_at' => Carbon::now()->subDays(5),
            ],
            [
                'name' => 'Mitra Tiga',
                'email' => 'mitra3@example.com',
                'password' => Hash::make('password'),
                'no_telepon' => '081234567892',
                'alamat' => 'Jl. Mitra Tiga No. 3',
                'role' => 'petani',
                'created_at' => Carbon::now()->subDays(2),
            ],
        ]);

        // Ambil id lokasi
        $provinsiId = DB::table('provinsis')->where('nama', 'Jawa Timur')->value('id');
        $kabupatenId = DB::table('kabupatens')->where('nama', 'Jember')->value('id');
        $kecamatanId = DB::table('kecamatans')->where('nama', 'Ajung')->value('id');
        $desaId = DB::table('desas')->where('nama', 'Ajung')->value('id');

        DB::table('mitras')->insert([
            [
                'user_id' => 1, // ID dari Mitra Satu
                'nama_lengkap' => 'Mitra Satu',
                'email' => 'mitra1@example.com',
                'telepon' => '081234567890',
                'luas_lahan' => 100.50,
                'jumlah_pohon' => 50,
                'provinsi_id' => $provinsiId,
                'kabupaten_id' => $kabupatenId,
                'kecamatan_id' => $kecamatanId,
                'desa_id' => $desaId,
                'alamat_detail' => 'Jl. Mitra Satu No. 1',
                'latitude' => -6.12345678,
                'longitude' => 106.12345678,
                'media_lahan' => 'Sawah',
                'surat_tanah' => 'surat_tanah_1.pdf',
                'kontrak' => 'kontrak_1.pdf',
                'status' => 'menunggu',
                'created_at' => Carbon::now()->subDays(10),
                'updated_at' => Carbon::now()->subDays(10),
            ],
            [
                'user_id' => 2, // ID dari Mitra Dua
                'nama_lengkap' => 'Mitra Dua',
                'email' => 'mitra2@example.com',
                'telepon' => '081234567891',
                'luas_lahan' => 75.25,
                'jumlah_pohon' => 30,
                'provinsi_id' => $provinsiId,
                'kabupaten_id' => $kabupatenId,
                'kecamatan_id' => $kecamatanId,
                'desa_id' => $desaId,
                'alamat_detail' => 'Jl. Mitra Dua No. 2',
                'latitude' => -6.23456789,
                'longitude' => 106.23456789,
                'media_lahan' => 'Kebun',
                'surat_tanah' => 'surat_tanah_2.pdf',
                'kontrak' => 'kontrak_2.pdf',
                'status' => 'disetujui',
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            [
                'user_id' => 3, // ID dari Mitra Tiga
                'nama_lengkap' => 'Mitra Tiga',
                'email' => 'mitra3@example.com',
                'telepon' => '081234567892',
                'luas_lahan' => 50.75,
                'jumlah_pohon' => 20,
                'provinsi_id' => $provinsiId,
                'kabupaten_id' => $kabupatenId,
                'kecamatan_id' => $kecamatanId,
                'desa_id' => $desaId,
                'alamat_detail' => 'Jl. Mitra Tiga No. 3',
                'latitude' => -6.34567890,
                'longitude' => 106.34567890,
                'media_lahan' => 'Tebang',
                'surat_tanah' => 'surat_tanah_3.pdf',
                'kontrak' => 'kontrak_3.pdf',
                'status' => 'ditolak',
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
        ]);

        DB::table('mitras')->insert([
            [
                'nama_lengkap' => 'Mitra Satu',
                'email' => 'mitra1@tas.test',
                'telepon' => '081234567890',
                'provinsi_id' => $provinsiId,
                'kabupaten_id' => $kabupatenId,
                'kecamatan_id' => $kecamatanId,
                'desa_id' => $desaId,
                'alamat_detail' => 'Jl. Mitra Satu No. 1',
                'luas_lahan' => 1000,
                'jumlah_pohon' => 50,
                'media_lahan' => 'Sawah',
                'latitude' => -6.12345678,
                'longitude' => 106.12345678,
                'surat_tanah' => 'surat_tanah_1.pdf',
                'kontrak' => 'kontrak_1.pdf',
                'status' => 'disetujui',
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Mitra Dua',
                'email' => 'mitra2@tas.test',
                'telepon' => '081234567891',
                'provinsi_id' => $provinsiId,
                'kabupaten_id' => $kabupatenId,
                'kecamatan_id' => $kecamatanId,
                'desa_id' => $desaId,
                'alamat_detail' => 'Jl. Mitra Dua No. 2',
                'luas_lahan' => 1500,
                'jumlah_pohon' => 75,
                'media_lahan' => 'Kebun',
                'latitude' => -6.23456789,
                'longitude' => 106.23456789,
                'surat_tanah' => 'surat_tanah_2.pdf',
                'kontrak' => 'kontrak_2.pdf',
                'status' => 'disetujui',
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Mitra Tiga',
                'email' => 'mitra3@tas.test',
                'telepon' => '081234567892',
                'provinsi_id' => $provinsiId,
                'kabupaten_id' => $kabupatenId,
                'kecamatan_id' => $kecamatanId,
                'desa_id' => $desaId,
                'alamat_detail' => 'Jl. Mitra Tiga No. 3',
                'luas_lahan' => 2000,
                'jumlah_pohon' => 100,
                'media_lahan' => 'Tebang',
                'latitude' => -6.34567890,
                'longitude' => 106.34567890,
                'surat_tanah' => 'surat_tanah_3.pdf',
                'kontrak' => 'kontrak_3.pdf',
                'status' => 'disetujui',
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
} 