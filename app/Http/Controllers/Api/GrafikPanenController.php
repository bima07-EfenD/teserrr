<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GrafikPanenController extends Controller
{
    public function index($idMitra)
    {
        $laporans = Laporan::where('mitra_id', $idMitra)
            ->where('metode', 'generatif')
            ->where('template', 'panen buah')
            ->orderBy('tanggal_laporan')
            ->get();

        $labels = [];
        $data = [];

        foreach ($laporans as $laporan) {
            $labels[] = Carbon::parse($laporan->tanggal_laporan)->format('d M Y');
            $data[] = $laporan->panen_buah;
        }

        $lastWeight = $laporans->last()?->berat_rata_rata;

        return response()->json([
            'labels' => $labels,
            'data' => $data,
            'avg_berat_rata_rata' => $lastWeight ? round($lastWeight, 2) : null
        ]);
    }
}
