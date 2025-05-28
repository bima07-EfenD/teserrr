<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mitra;
use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Statistik Pengajuan
        $totalPengajuan = Mitra::where('user_id', $user->id)->count();
        $pengajuanDiterima = Mitra::where('user_id', $user->id)
            ->where('status', 'disetujui')
            ->count();
        $pengajuanPending = Mitra::where('user_id', $user->id)
            ->where('status', 'menunggu')
            ->count();
        $pengajuanDitolak = Mitra::where('user_id', $user->id)
            ->where('status', 'ditolak')
            ->count();

        // Pengajuan Terbaru - Hanya untuk user yang login
        $pengajuanTerbaru = Mitra::where('user_id', $user->id)
            ->with(['user', 'kabupaten'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Data untuk Chart - Perbaikan query untuk statistik per bulan
        $pengajuanPerBulan = Mitra::where('user_id', $user->id)
            ->select(
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('COUNT(*) as total')
            )
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get()
            ->keyBy('bulan');

        $bulan = [];
        $totalPengajuanPerBulan = [];

        // Inisialisasi array dengan 0 untuk semua bulan
        for ($i = 1; $i <= 12; $i++) {
            $bulan[] = Carbon::create()->month($i)->format('M');
            $totalPengajuanPerBulan[] = $pengajuanPerBulan->get($i, (object)['total' => 0])->total;
        }

        // Statistik per Status dengan persentase
        $statusPengajuan = [
            [
                'status' => 'Disetujui',
                'total' => $pengajuanDiterima,
                'color' => 'green',
                'persentase' => $totalPengajuan > 0 ? round(($pengajuanDiterima / $totalPengajuan) * 100) : 0
            ],
            [
                'status' => 'Menunggu',
                'total' => $pengajuanPending,
                'color' => 'yellow',
                'persentase' => $totalPengajuan > 0 ? round(($pengajuanPending / $totalPengajuan) * 100) : 0
            ],
            [
                'status' => 'Ditolak',
                'total' => $pengajuanDitolak,
                'color' => 'red',
                'persentase' => $totalPengajuan > 0 ? round(($pengajuanDitolak / $totalPengajuan) * 100) : 0
            ]
        ];

        // Laporan Terkait Mitra
        $laporanTerbaru = Laporan::whereHas('mitra', function($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->with(['mitra', 'pegawai'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('petani.dashboard', compact(
            'totalPengajuan',
            'pengajuanDiterima',
            'pengajuanPending',
            'pengajuanDitolak',
            'pengajuanTerbaru',
            'bulan',
            'totalPengajuanPerBulan',
            'statusPengajuan',
            'laporanTerbaru'
        ));
    }
}
