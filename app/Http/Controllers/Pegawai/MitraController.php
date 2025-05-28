<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Mitra;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    public function index(Request $request)
    {
        $query = Mitra::with('kabupaten')
            ->where('status', 'disetujui')
            ->latest();

        // Fitur pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($sub) use ($search) {
                $sub->where('nama_lengkap', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhereHas('kabupaten', function($q) use ($search) {
                        $q->where('nama', 'like', "%{$search}%");
                    });
            });
        }

        $mitras = $query->paginate(10)->withQueryString();
        return view('pegawai.mitra.index', compact('mitras'));
    }

    public function create()
    {
        return view('pegawai.mitra.create');
    }

    public function show(Mitra $mitra)
    {
        return view('pegawai.mitra.show', compact('mitra'));
    }

    public function edit(Mitra $mitra)
    {
        return view('pegawai.mitra.edit', compact('mitra'));
    }

    public function update(Request $request, Mitra $mitra)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'luas_lahan' => 'required|numeric|min:0',
            'pohon' => 'nullable|numeric|min:0',
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'alamat_detail' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'surat_tanah' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'kontrak' => 'nullable|file|mimes:pdf|max:10240'
        ]);

        $data = $request->except(['surat_tanah', 'kontrak']);

        // Upload file surat tanah jika ada
        if ($request->hasFile('surat_tanah')) {
            // Hapus file lama jika ada
            if ($mitra->surat_tanah) {
                Storage::disk('public')->delete($mitra->surat_tanah);
            }
            $data['surat_tanah'] = $request->file('surat_tanah')->store('surat_tanah', 'public');
        }

        // Upload file kontrak jika ada
        if ($request->hasFile('kontrak')) {
            // Hapus file lama jika ada
            if ($mitra->kontrak) {
                Storage::disk('public')->delete($mitra->kontrak);
            }
            $data['kontrak'] = $request->file('kontrak')->store('kontrak', 'public');
        }

        $mitra->update($data);

        return redirect()->route('pegawai.mitra.index')
            ->with('success', 'Data mitra berhasil diperbarui.');
    }

    public function destroy(Mitra $mitra)
    {
        // Hapus file jika ada
        if ($mitra->surat_tanah) {
            Storage::disk('public')->delete($mitra->surat_tanah);
        }
        if ($mitra->kontrak) {
            Storage::disk('public')->delete($mitra->kontrak);
        }

        $mitra->delete();

        return redirect()->route('pegawai.mitra.index')
            ->with('success', 'Data mitra berhasil dihapus.');
    }

    public function approve(Mitra $mitra)
    {
        $mitra->update(['status' => 'disetujui']);

        return redirect()->route('pegawai.mitra.index')
            ->with('success', 'Mitra berhasil disetujui.');
    }

    public function reject(Mitra $mitra)
    {
        $mitra->update(['status' => 'ditolak']);

        return redirect()->route('pegawai.mitra.index')
            ->with('success', 'Mitra berhasil ditolak.');
    }

    public function laporan()
    {
        $laporan = Laporan::with('mitra')->get();
        return view('pegawai.mitra.laporan', compact('laporan'));
    }

    public function pengajuan()
    {
        $mitras = Mitra::where('status', 'menunggu')->paginate(10);
        return view('pegawai.mitra.pengajuan', compact('mitras'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $kabupatenList = Mitra::with('kabupaten')
            ->get()
            ->pluck('kabupaten.nama')
            ->unique()
            ->sort()
            ->values();
        $kabupaten = $kabupatenList;

        $mitras = Mitra::where('status', 'disetujui')
            ->where(function($query) use ($search) {
                $query->where('nama_lengkap', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('kabupaten', 'like', "%{$search}%")
                    ->orWhere('telepon', 'like', "%{$search}%");
            })
            ->get();

        if ($request->ajax()) {
            $html = view('pegawai.laporan._mitra_list', compact('mitras'))->render();
            return response()->json([
                'html' => $html
            ]);
        }

        return view('pegawai.laporan.index', compact('mitras'));
    }

    public function updateStatus(Request $request, Mitra $mitra)
    {
        $request->validate([
            'status' => 'required|in:menunggu,disetujui,ditolak'
        ]);

        $mitra->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status mitra berhasil diperbarui.');
    }

    public function editJumlahPohon(Mitra $mitra)
    {
        return view('pegawai.mitra.edit-jumlah-pohon', compact('mitra'));
    }

    public function updateJumlahPohon(Request $request, Mitra $mitra)
    {
        $request->validate([
            'jumlah_pohon' => 'required|numeric|min:1'
        ]);

        $mitra->update([
            'jumlah_pohon' => $request->jumlah_pohon
        ]);

        return redirect()->route('pegawai.mitra.show', $mitra)
            ->with('success', 'Jumlah pohon berhasil diperbarui');
    }
}