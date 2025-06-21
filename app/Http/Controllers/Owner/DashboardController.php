<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil total mitra
        // $totalMitra = Mitra::count();
        $mitra = Mitra::all();
        $totalMitra = 0;
        foreach ($mitra as $m) {
            if ($m->status == 'disetujui') {
                $totalMitra = $totalMitra + 1;
            }
        }

        // Mengambil total pegawai
        $totalPegawai = User::where('role', 'pegawai')->count();

        // Mengambil total pohon dari mitra yang disetujui
        $totalPohon = Mitra::where('status', 'disetujui')->sum('jumlah_pohon');

        // Mengambil pengajuan baru (status menunggu)
        $pengajuanBaru = Mitra::where('status', 'menunggu')->count();

        // Mengambil pengajuan terbaru
        $pengajuanTerbaru = Mitra::with('user')
            ->where('status', 'menunggu')
            ->latest()
            ->take(5)
            ->get();

        // Data untuk grafik pengajuan (1 bulan terakhir)
        $chartData = Mitra::select(
            DB::raw('DATE(created_at) as tanggal'),
            DB::raw('COUNT(*) as total')
        )
            ->where('created_at', '>=', now()->subMonth())
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        $chartLabels = [];
        $chartValues = [];

        foreach ($chartData as $data) {
            $chartLabels[] = Carbon::parse($data->tanggal)->format('d M');
            $chartValues[] = $data->total;
        }

        // Statistik Laporan
        $totalLaporan = Laporan::count();
        $laporanBulanIni = Laporan::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
        $laporanHariIni = Laporan::whereDate('created_at', Carbon::today())->count();

        // Laporan Terbaru
        $laporanTerbaru = Laporan::with(['mitra.user', 'pegawai'])
            ->latest()
            ->take(5)
            ->get();

        // Data untuk grafik laporan (7 hari terakhir)
        $laporanChartData = Laporan::select(
            DB::raw('DATE(created_at) as tanggal'),
            DB::raw('COUNT(*) as total')
        )
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        $laporanChartLabels = [];
        $laporanChartValues = [];

        foreach ($laporanChartData as $data) {
            $laporanChartLabels[] = Carbon::parse($data->tanggal)->format('d M');
            $laporanChartValues[] = $data->total;
        }

        return view('owner.dashboard', compact(
            'totalMitra',
            'totalPegawai',
            'totalPohon',
            'pengajuanBaru',
            'pengajuanTerbaru',
            'chartLabels',
            'chartValues',
            'totalLaporan',
            'laporanBulanIni',
            'laporanHariIni',
            'laporanTerbaru',
            'laporanChartLabels',
            'laporanChartValues'
        ));
    }
}
