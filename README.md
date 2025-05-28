# TAS (Teknologi Agribisnis)

Sistem manajemen agribisnis berbasis web yang menghubungkan petani, mitra, dan pemilik usaha dalam satu platform terintegrasi.

## Fitur Utama

### Owner
- Manajemen akun mitra dan pegawai
- Monitoring laporan dari mitra
- Pengelolaan status mitra (menunggu, disetujui, ditolak)
- Dashboard dengan statistik dan grafik

### Mitra
- Pengajuan pendaftaran mitra
- Upload dokumen dan foto profil
- Pengiriman laporan kegiatan
- Monitoring status laporan

### Pegawai
- Verifikasi data mitra
- Pengelolaan laporan mitra
- Monitoring kegiatan mitra


## Instalasi

1. Clone repository
```bash
git clone https://github.com/username/tas.git
cd tas
```

2. Install dependencies
```bash
composer install
npm install
```

3. Setup environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Konfigurasi database di file .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tas_db
DB_USERNAME=root
DB_PASSWORD=
```

5. Jalankan migrasi dan seeder
```bash
php artisan migrate --seed
```

6. Compile assets
```bash
npm run dev
```

7. Jalankan server
```bash
php artisan serve
```

## Struktur Folder

```
tas/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Owner/
│   │   │   ├── Mitra/
│   │   │   └── Pegawai/
│   ├── Models/
│   └── Services/
├── resources/
│   ├── views/
│   │   ├── owner/
│   │   ├── mitra/
│   │   └── pegawai/
├── routes/
│   ├── web.php
│   └── api.php
└── database/
    ├── migrations/
    └── seeders/
```

## Kontak

Untuk pertanyaan dan dukungan, silakan hubungi:
- Email: dievoblokagung@gmail.com
- Website: https://divotahta.com
