<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Chat;

class LaporanController extends Controller
{

    public function index(Request $request)
    {
        $query = Laporan::query();
        $selectedMitra = null;
        $petaniId = Auth::id();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('keterangan', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('mitra_id')) {
            $query->where('mitra_id', $request->mitra_id);
            $selectedMitra = Mitra::where('user_id', $petaniId)
                                ->where('id', $request->mitra_id)
                                ->firstOrFail();
        }

        $laporans = $query->whereHas('mitra', function($q) use ($petaniId) {
            $q->where('user_id', $petaniId);
        })->latest()->paginate(6);

        $mitras = Mitra::where('user_id', $petaniId)
                      ->where('status', 'disetujui')
                      ->paginate(6);

        return view('petani.laporan.index', compact('laporans', 'mitras', 'selectedMitra'));
    }


    public function show(Laporan $laporan)

    {
        $chats = Chat::where('laporan_id', $laporan->id)->with('sender')->latest()->get();
        return view('petani.laporan.show', compact('laporan', 'chats'));
    }


    public function search(Request $request)
    {
        $query = Laporan::query();
        $petaniId = Auth::id();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('keterangan', 'like', "%{$search}%");
            });
        }

        if ($request->filled('mitra_id')) {
            $query->where('mitra_id', $request->mitra_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $laporans = $query->whereHas('mitra', function($q) use ($petaniId) {
            $q->where('user_id', $petaniId);
        })->latest()->paginate(6);

        if ($request->ajax()) {
            $view = view('petani.laporan._list', compact('laporans'))->render();
            $pagination = $laporans->links()->toHtml();

            return response()->json([
                'html' => $view,
                'pagination' => $pagination
            ]);
        }

        return view('petani.laporan.index', compact('laporans'));
    }

    public function selectMitra()
    {
        $mitras = Mitra::where('status', 'disetujui')->paginate(6);
        return view('petani.laporan.select-mitra', compact('mitras'));
    }

    public function searchMitraSelect(Request $request)
    {
        $search = $request->input('search');
        $mitras = Mitra::where('status', 'disetujui')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama_lengkap', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%")
                        ->orWhere('kabupaten', 'like', "%$search%")
                        ->orWhere('telepon', 'like', "%$search%");
                });
            })
            ->paginate(6);
        $view = view('petani.laporan._mitra-cards', compact('mitras'))->render();
        $pagination = $mitras->links()->toHtml();
        return response()->json([
            'html' => $view,
            'pagination' => $pagination
        ]);
    }

    public function searchMitraIndex(Request $request)
    {
        $petaniId = Auth::id();
        $mitras = Mitra::where('user_id', $petaniId)
                      ->where('status', 'disetujui')
                      ->where(function($q) use ($request) {
                          $q->where('nama_lengkap', 'like', '%' . $request->search . '%')
                            ->orWhere('email', 'like', '%' . $request->search . '%')
                            ->orWhereHas('kabupaten', function($q) use ($request) {
                                $q->where('nama', 'like', '%' . $request->search . '%');
                            });
                      })
                      ->paginate(6);

        $html = view('petani.laporan._mitra-cards-index', compact('mitras'))->render();
        $pagination = $mitras->links()->toHtml();

        return response()->json([
            'html' => $html,
            'pagination' => $pagination
        ]);
    }

    public function laporanMitra(Mitra $mitra, Request $request)
    {
        $petaniId = Auth::id();

        // Verifikasi bahwa mitra ini milik petani yang login
        if ($mitra->user_id !== $petaniId) {
            abort(403, 'Unauthorized action.');
        }

        // Load mitra with all location relationships
        $mitra->load(['kabupaten', 'kecamatan', 'desa']);

        $query = Laporan::where('mitra_id', $mitra->id);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('keterangan', 'like', "%{$search}%");
            });
        }
        if ($request->filled('bulan')) {
            $query->whereMonth('tanggal_laporan', $request->bulan);
        }
        if ($request->filled('tahun')) {
            $query->whereYear('tanggal_laporan', $request->tahun);
        }

        $laporans = $query->latest()->paginate(6);

        // Untuk filter/pencarian AJAX
        if ($request->ajax()) {
            $view = view('components.laporan._list', [
                'laporans' => $laporans,
                'start_index' => $laporans->firstItem()
            ])->render();
            $pagination = $laporans->links()->toHtml();
            return response()->json([
                'html' => $view,
                'pagination' => $pagination,
                'start_index' => $laporans->firstItem()
            ]);
        }

        return view('petani.laporan.laporan-mitra', compact('mitra', 'laporans'));
    }
}
