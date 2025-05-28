<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{

    public function index(Request $request)
    {
        $query = Laporan::query();
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

        return view('pegawai.laporan.index', compact('laporans', 'mitras', 'selectedMitra'));
    }

    public function create(Request $request)
    {
        $mitras = Mitra::where('status', 'disetujui')->get();

        if ($request->has('mitra_id')) {
            $selectedMitra = Mitra::findOrFail($request->mitra_id);
            return view('pegawai.laporan.create', compact('mitras', 'selectedMitra'));
        }

        return view('pegawai.laporan.select-mitra', compact('mitras'));
    }

    public function store(Request $request)
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
            'media_foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'media_video' => 'nullable|mimes:mp4,mov,avi|max:10240'
        ]);

        if ($request->hasFile('media_foto')) {
            $mediaFoto = $request->file('media_foto');
            $mediaFotoName = time() . '_' . $mediaFoto->getClientOriginalName();
            $mediaFoto->move(public_path('storage/laporan/foto'), $mediaFotoName);
            $mediaFotoPath = 'laporan/foto/' . $mediaFotoName;
        } else {
            $mediaFotoPath = null;
        }

        if ($request->hasFile('media_video')) {
            $mediaVideo = $request->file('media_video');
            $mediaVideoName = time() . '_' . $mediaVideo->getClientOriginalName();
            $mediaVideo->move(public_path('storage/laporan/video'), $mediaVideoName);
            $mediaVideoPath = 'laporan/video/' . $mediaVideoName;
        } else {
            $mediaVideoPath = null;
        }

        // Buat data laporan baru
        $laporan = Laporan::create([
            'pegawai_id' => Auth::id(),
            'mitra_id' => $request->mitra_id,
            'judul' => $request->judul,
            'tanggal_laporan' => $request->tanggal_laporan,
            'keterangan' => $request->keterangan,
            'metode' => $request->metode,
            'template' => $request->template,
            'kegiatan_lainnya' => $request->template === 'Kegiatan Lainnya' ? $request->kegiatan_lainnya : null,
            'panen_buah' => $request->panen_buah,
            'media_foto' => $mediaFotoPath,
            'media_video' => $mediaVideoPath
        ]);

        return redirect()->route('pegawai.laporan.show', $laporan)
            ->with('success', 'Laporan berhasil disimpan.');
    }

    public function show(Laporan $laporan)
    {
        return view('pegawai.laporan.show', compact('laporan'));
    }

    public function edit(Laporan $laporan)
    {
        $mitras = Mitra::where('status', 'disetujui')->get();
        return view('pegawai.laporan.edit', compact('laporan', 'mitras'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $request->validate([
            'mitra_id' => 'required|exists:mitras,id',
            'judul' => 'required|string|max:255',
            'tanggal_laporan' => 'required|date',
            'keterangan' => 'required|string',
            'metode' => 'required|string|max:100',
            'media_foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'media_video' => 'nullable|mimes:mp4,mov,avi|max:10240'
        ]);

        $data = $request->only(['mitra_id', 'judul', 'tanggal_laporan', 'keterangan', 'metode']);

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
            ->route('pegawai.laporan.show', $laporan)
            ->with('success', 'Laporan berhasil diperbarui');
    }

    public function destroy(Laporan $laporan)
    {
        // Hapus file media jika ada
        if ($laporan->media_foto) {
            Storage::disk('public')->delete($laporan->media_foto);
        }
        if ($laporan->media_video) {
            Storage::disk('public')->delete($laporan->media_video);
        }

        $laporan->delete();

        return redirect()
            ->route('pegawai.laporan.index')
            ->with('success', 'Laporan berhasil dihapus');
    }

    public function search(Request $request)
    {
        $query = Laporan::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('keterangan', 'like', "%{$search}%");
            });
        }

        if ($request->filled('mitra_id')) {
            $query->where('mitra_id', $request->mitra_id);
        }

        $laporans = $query->latest()->paginate(10);

        if ($request->ajax()) {
            $view = view('pegawai.laporan._list', compact('laporans'))->render();
            $pagination = $laporans->links()->toHtml();

            return response()->json([
                'html' => $view,
                'pagination' => $pagination
            ]);
        }

        return view('pegawai.laporan.index', compact('laporans'));
    }

    public function selectMitra()
    {
        $mitras = Mitra::where('status', 'disetujui')->get();
        return view('pegawai.laporan.select-mitra', compact('mitras'));
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
        $view = view('pegawai.laporan._mitra-cards', compact('mitras'))->render();
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

        $html = view('pegawai.laporan._mitra-cards-index', compact('mitras'))->render();

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
            $view = view('pegawai.laporan._list', compact('laporans'))->render();
            $pagination = $laporans->links()->toHtml();
            return response()->json([
                'html' => $view,
                'pagination' => $pagination
            ]);
        }

        return view('pegawai.laporan.laporan-mitra', compact('mitra', 'laporans'));
    }
}
