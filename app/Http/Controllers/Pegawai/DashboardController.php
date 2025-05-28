<?php

namespace App\Http\Controllers\Pegawai;

use Carbon\Carbon;
use App\Models\Mitra;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Mitra - hanya yang disetujui
        $totalMitra = Mitra::where('status', 'disetujui')->count();
        $totalPohon = Mitra::where('status', 'disetujui')->sum('jumlah_pohon');

        // Statistik per Kabupaten - hanya yang disetujui
        $mitraPerKabupaten = Mitra::where('status', 'disetujui')
            ->select('kabupaten_id', DB::raw('count(*) as total'))
            ->with('kabupaten:id,nama')
            ->groupBy('kabupaten_id')
            ->orderBy('total', 'desc')
            ->get();

        // Statistik Laporan - hanya untuk pegawai yang login
        $totalLaporan = Laporan::where('pegawai_id', Auth::id())->count();
        $laporanBulanIni = Laporan::where('pegawai_id', Auth::id())
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        // Laporan Terbaru - hanya untuk pegawai yang login
        $laporanTerbaru = Laporan::with('mitra')
            ->where('pegawai_id', Auth::id())
            ->latest()
            ->take(5)
            ->get();

        return view('pegawai.dashboard', compact(
            'totalMitra',
            'totalPohon',
            'totalLaporan',
            'laporanBulanIni',
            'laporanTerbaru',
            'mitraPerKabupaten'
        ));
    }
}