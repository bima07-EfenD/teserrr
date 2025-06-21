<?php

namespace App\Http\Controllers\Owner;

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
        $query = Laporan::with(['mitra.user']);
        $selectedMitra = null;

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
            $selectedMitra = Mitra::findOrFail($request->mitra_id);
        }

        $laporans = $query->latest()->paginate(10);
        $mitras = Mitra::where('status', 'disetujui')->get();

        return view('owner.laporan.index', compact('laporans', 'mitras', 'selectedMitra'));
    }

    public function show(Laporan $laporan)
    {
        $chats = Chat::where('laporan_id', $laporan->id)->with('sender')->latest()->get();
        $laporan->load(['mitra.user']);
        return view('owner.laporan.show',  compact('laporan', 'chats'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $request->validate([
            'mitra_id' => 'required|exists:mitras,id',
            'judul' => 'required|string|max:255',
            'tanggal_laporan' => 'required|date',
            'keterangan' => 'required|string',
            'metode' => 'required|string|in:Vegetatif,Generatif',
            'template' => 'nullable|string|max:100',
            'kegiatan_lainnya' => 'nullable|string|max:255',
            'panen_buah' => 'nullable|numeric|min:0',
            'berat_rata_rata' => 'nullable|numeric|min:0',
            'media_foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'media_video' => 'nullable|mimes:mp4,mov,avi|max:10240'
        ]);

        $data = $request->only([
            'mitra_id',
            'judul',
            'tanggal_laporan',
            'keterangan',
            'metode',
            'template',
            'kegiatan_lainnya',
            'panen_buah',
            'berat_rata_rata'
        ]);

        // Upload foto jika ada
        if ($request->hasFile('media_foto')) {
            if ($laporan->media_foto) {
                Storage::disk('public')->delete($laporan->media_foto);
            }
            $foto = $request->file('media_foto');
            $fotoPath = $foto->store('laporan/foto', 'public');
            $data['media_foto'] = $fotoPath;
        }

        // Upload video jika ada
        if ($request->hasFile('media_video')) {
            if ($laporan->media_video) {
                Storage::disk('public')->delete($laporan->media_video);
            }
            $video = $request->file('media_video');
            $videoPath = $video->store('laporan/video', 'public');
            $data['media_video'] = $videoPath;
        }

        $laporan->update($data);

        return redirect()
            ->route('owner.laporan.show', $laporan)
            ->with('success', 'Laporan berhasil diperbarui');
    }

    public function destroy(Laporan $laporan)
    {
        $laporan->delete();

        return redirect()->route('owner.laporan.index')
            ->with('success', 'Laporan berhasil dihapus');
    }

    public function search(Request $request)
    {
        $query = Laporan::with(['mitra.user'])
            ->when($request->search, function($q) use ($request) {
                $q->whereHas('mitra', function($q) use ($request) {
                    $q->where('nama_lengkap', 'like', "%{$request->search}%")
                        ->orWhere('email', 'like', "%{$request->search}%");
                });
            })
            ->when($request->status, function($q) use ($request) {
                $q->where('status', $request->status);
            })
            ->when($request->tanggal, function($q) use ($request) {
                $q->whereDate('tanggal_laporan', $request->tanggal);
            })
            ->latest();

        $laporans = $query->paginate(10);

        $html = view('owner.laporan._laporan_list', compact('laporans'))->render();
        $pagination = view('owner.laporan._pagination', compact('laporans'))->render();

        return response()->json([
            'html' => $html,
            'pagination' => $pagination
        ]);
    }

    public function selectMitra()
    {
        $mitras = Mitra::where('status', 'disetujui')->get();
        return view('owner.laporan.select-mitra', compact('mitras'));
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
            ->get();
        $view = view('owner.laporan._mitra-cards', compact('mitras'))->render();
        return response()->json(['html' => $view]);
    }

    public function searchMitraIndex(Request $request)
    {
        $mitras = Mitra::where('status', 'disetujui')
                      ->where(function($q) use ($request) {
                          $q->where('nama_lengkap', 'like', '%' . $request->search . '%')
                            ->orWhere('email', 'like', '%' . $request->search . '%')
                            ->orWhereHas('kabupaten', function($q) use ($request) {
                                $q->where('nama', 'like', '%' . $request->search . '%');
                            });
                      })
                      ->get();

        $html = view('owner.laporan._mitra-cards-index', compact('mitras'))->render();

        return response()->json(['html' => $html]);
    }

    public function laporanMitra(Mitra $mitra, Request $request)
    {
        $query = Laporan::where('mitra_id', $mitra->id);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('keterangan', 'like', "%{$search}%");
            });
        }

        $laporans = $query->latest()->paginate(10);

        // Untuk filter/pencarian AJAX
        if ($request->ajax()) {
            $view = view('owner.laporan._list', [
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

        return view('owner.laporan.laporan-mitra', compact('mitra', 'laporans'));
    }

    public function edit(Laporan $laporan)
    {
        $mitras = Mitra::where('status', 'disetujui')->get();
        return view('owner.laporan.edit', compact('laporan', 'mitras'));
    }
}
