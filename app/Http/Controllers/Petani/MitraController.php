<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mitra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Provinsi;

class MitraController extends Controller
{
    public function index()
    {
        $mitras = Mitra::where('user_id', Auth::id())->paginate(10);
        $kabupatenList = Mitra::where('user_id', Auth::id())
            ->with('kabupaten')
            ->get()
            ->pluck('kabupaten.nama')
            ->unique()
            ->values();
        return view('petani.mitra.index', compact('mitras', 'kabupatenList'));
    }

    public function create()
    {
        $provinsis = Provinsi::all();
        return view('petani.mitra.create', compact('provinsis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'luas_lahan' => 'required|numeric',
            'punya_alpukat' => 'required|in:ya,tidak',
            'jumlah_pohon' => 'required_if:punya_alpukat,ya|integer|nullable',
            'provinsi_id' => 'required|exists:provinsis,id',
            'kabupaten_id' => 'required|exists:kabupatens,id',
            'kecamatan_id' => 'required|exists:kecamatans,id',
            'desa_id' => 'required|exists:desas,id',
            'alamat_detail' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'media_lahan' => 'required|mimetypes:image/jpeg,image/png,image/jpg,video/mp4,video/quicktime|max:10240',
            'surat_tanah' => 'required|file|mimes:pdf|max:10240',
            'kontrak' => 'required|file|mimes:pdf|max:10240',
        ], [
            'media_lahan.max' => 'Foto lahan tidak boleh lebih dari 10MB',
            'surat_tanah.max' => 'File surat tanah tidak boleh lebih dari 10MB',
            'kontrak.max' => 'File kontrak tidak boleh lebih dari 10MB',
        ]);

        try {
            // Upload media lahan
            $mediaLahan = $request->file('media_lahan');
            $mediaLahanName = time() . '_' . $mediaLahan->getClientOriginalName();
            $mediaLahan->move(public_path('storage/media-lahan'), $mediaLahanName);
            $mediaLahanPath = 'media-lahan/' . $mediaLahanName;

            // Upload surat tanah
            $suratTanah = $request->file('surat_tanah');
            $suratTanahName = time() . '_' . $suratTanah->getClientOriginalName();
            $suratTanah->move(public_path('storage/surat-tanah'), $suratTanahName);
            $suratTanahPath = 'surat-tanah/' . $suratTanahName;

            // Upload kontrak
            $kontrak = $request->file('kontrak');
            $kontrakName = time() . '_' . $kontrak->getClientOriginalName();
            $kontrak->move(public_path('storage/kontrak'), $kontrakName);
            $kontrakPath = 'kontrak/' . $kontrakName;

            // Set jumlah pohon berdasarkan pilihan punya_alpukat
            $jumlahPohon = $request->punya_alpukat === 'tidak' ? 0 : $request->jumlah_pohon;

            // Buat data mitra baru
            Mitra::create([
                'user_id' => Auth::id(),
                'email' => Auth::user()->email,
                'nama_lengkap' => $request->nama_lengkap,
                'telepon' => $request->telepon,
                'luas_lahan' => $request->luas_lahan,
                'jumlah_pohon' => $jumlahPohon,
                'provinsi_id' => $request->provinsi_id,
                'kabupaten_id' => $request->kabupaten_id,
                'kecamatan_id' => $request->kecamatan_id,
                'desa_id' => $request->desa_id,
                'alamat_detail' => $request->alamat_detail,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'media_lahan' => $mediaLahanPath,
                'surat_tanah' => $suratTanahPath,
                'kontrak' => $kontrakPath,
                'status' => 'menunggu'
            ]);

            return redirect()->route('petani.mitra.index')
                ->with('success', 'Data mitra berhasil ditambahkan dan sedang menunggu persetujuan.');

        } catch (\Exception $e) {
            Log::error('Error creating mitra: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan data mitra. Silakan coba lagi.')
                ->withInput();
        }
    }

    public function show($id)
    {
        // Ambil data mitra dan pastikan milik petani yang login
        $mitra = Mitra::where('id', $id)
                      ->where('user_id', Auth::id())
                      ->firstOrFail(); // akan throw 404 jika tidak ditemukan

        return view('petani.mitra.show', compact('mitra'));
    }

    public function search(Request $request)
    {
        try {
            $search = $request->get('search');

            $query = Mitra::where('user_id', Auth::id())
                         ->where('status', 'disetujui');

            if ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('nama_lengkap', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('kabupaten', 'like', "%{$search}%")
                      ->orWhere('telepon', 'like', "%{$search}%");
                });
            }

            $mitras = $query->get();

            if ($request->ajax()) {
                $view = view('petani.laporan._mitra_list', compact('mitras'))->render();
                return response()->json(['view' => $view]);
            }

            return view('petani.mitra.index', compact('mitras'));
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json(['error' => 'Terjadi kesalahan saat melakukan pencarian'], 500);
            }
            return back()->with('error', 'Terjadi kesalahan saat melakukan pencarian');
        }
    }
}
