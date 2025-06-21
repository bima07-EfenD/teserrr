<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Status Pendaftaran Mitra</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 25px;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 15px;
        }
        h1 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 5px;
        }
        .status-box {
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
            text-align: center;
            font-weight: bold;
        }
        .approved {
            background-color: #e8f5e9;
            color: #2e7d32;
            border-left: 4px solid #2e7d32;
        }
        .rejected {
            background-color: #ffebee;
            color: #c62828;
            border-left: 4px solid #c62828;
        }
        .pending {
            background-color: #fff8e1;
            color: #f57f17;
            border-left: 4px solid #f57f17;
        }
        .reason-box {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 6px;
            margin: 15px 0;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #7f8c8d;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Replace with your actual logo -->
            <img src="https://example.com/logo.png" alt="Company Logo" class="logo">
            <h1>Status Pendaftaran Mitra</h1>
        </div>

        <p>Halo, <strong>{{ $mitra->nama_lengkap }}</strong>!</p>

        @if($mitra->status === 'disetujui')
            <div class="status-box approved">
                <p>Selamat! Pendaftaran Anda sebagai mitra telah <strong>DISETUJUI</strong>.</p>
            </div>
            <p>Anda sekarang dapat mengakses akun mitra Anda dan mulai menggunakan platform kami. Jika Anda memerlukan bantuan, jangan ragu untuk menghubungi tim dukungan kami.</p>
            <center>
                <a href="#" class="btn">Masuk ke Dashboard Mitra</a>
            </center>
        @elseif($mitra->status === 'ditolak')
            <div class="status-box rejected">
                <p>Maaf, pendaftaran Anda sebagai mitra <strong>DITOLAK</strong>.</p>
            </div>
            <div class="reason-box">
                <h3>Detail Penolakan:</h3>
                <p><strong>Alasan:</strong> {{ $mitra->alasan_penolakan }}</p>
                <p><strong>Deskripsi:</strong> {{ $mitra->deskripsi_penolakan }}</p>
            </div>
            <p>Anda dapat memperbaiki dokumen Anda dan mengajukan kembali jika memenuhi persyaratan. Jika Anda memiliki pertanyaan, silakan hubungi tim kami.</p>
        @elseif($mitra->status === 'nonaktif')
            <div class="status-box rejected">
                <p>Status mitra Anda telah diubah menjadi <strong>NONAKTIF</strong>.</p>
            </div>
            <div class="reason-box">
                <h3>Detail Nonaktif:</h3>
                <p><strong>Alasan:</strong> {{ $mitra->alasan_penolakan }}</p>
                <p><strong>Deskripsi:</strong> {{ $mitra->deskripsi_penolakan }}</p>
            </div>
            <p>Akun mitra Anda telah dinonaktifkan. Jika Anda memiliki pertanyaan atau ingin mengklarifikasi status ini, silakan hubungi tim kami.</p>
        @else
            <div class="status-box pending">
                <p>Status pendaftaran Anda saat ini: <strong>{{ strtoupper($mitra->status) }}</strong></p>
            </div>
            <p>Kami sedang memproses aplikasi Anda. Anda akan menerima pemberitahuan segera setelah ada pembaruan. Terima kasih atas kesabaran Anda.</p>
        @endif

        <div class="footer">
            <p>Terima kasih telah bergabung dengan kami.</p>
            <p>Tim Dukungan Mitra<br>

        </div>
    </div>
</body>
</html>
