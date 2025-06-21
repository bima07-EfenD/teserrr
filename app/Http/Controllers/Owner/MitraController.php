<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Mitra;
use App\Models\Kabupaten;
use Illuminate\Support\Facades\Storage;
use App\Mail\StatusMitraMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class MitraController extends Controller
{
    public function index(Request $request)
    {
        $query = Mitra::with(['user', 'kabupaten'])->latest();
        $kabupaten = Kabupaten::orderBy('nama')->get();

        // Fitur pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($sub) use ($search) {
                $sub->where('nama_lengkap', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('telepon', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan kabupaten
        if ($request->filled('kabupaten')) {
            $query->where('kabupaten_id', $request->kabupaten);
        }

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $mitra = $query->paginate(10)->withQueryString();
        return view('owner.mitra.index', compact('mitra', 'kabupaten'));
    }

    public function create()
    {
        return view('owner.mitra.create');
    }

    public function show(Mitra $mitra)
    {
        return view('components.mitra._detail', compact('mitra'));
    }

    public function edit(Mitra $mitra)
    {
        return view('owner.mitra.edit', compact('mitra'));
    }

    public function update(Request $request, Mitra $mitra)
    {
        $request->validate([
            'status' => 'required|in:menunggu,disetujui,ditolak,nonaktif',
            'alasan_penolakan' => 'required_if:status,ditolak,nonaktif',
            'deskripsi_penolakan' => 'required_if:status,ditolak,nonaktif',
        ]);

        // Validasi status nonaktif hanya bisa dari status disetujui
        if ($request->status === 'nonaktif' && $mitra->status !== 'disetujui') {
            return response()->json([
                'success' => false,
                'message' => 'Status nonaktif hanya bisa diubah dari status disetujui'
            ], 422);
        }

        $mitra->status = $request->status;

        if ($request->status === 'ditolak' || $request->status === 'nonaktif') {
            $mitra->alasan_penolakan = $request->alasan_penolakan;
            $mitra->deskripsi_penolakan = $request->deskripsi_penolakan;
        } else {
            $mitra->alasan_penolakan = null;
            $mitra->deskripsi_penolakan = null;
        }

        $mitra->save();

        try {
            Mail::to($mitra->email)->send(new StatusMitraMail($mitra));
        } catch (\Exception $e) {
            Log::error('Gagal mengirim email: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Status diperbarui tapi gagal mengirim email: ' . $e->getMessage()
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Status mitra berhasil diperbarui'
        ]);
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

        return redirect()->route('owner.mitra.index')
            ->with('success', 'Data mitra berhasil dihapus.');
    }

    public function approve(Mitra $mitra)
    {
        $mitra->update(['status' => 'disetujui']);

        return redirect()->route('owner.mitra.index')
            ->with('success', 'Mitra berhasil disetujui.');
    }

    public function reject(Mitra $mitra)
    {
        $mitra->update(['status' => 'ditolak']);

        return redirect()->route('owner.mitra.index')
            ->with('success', 'Mitra berhasil ditolak.');
    }

    public function laporan()
    {
        $laporan = Laporan::with('mitra')->get();
        return view('owner.mitra.laporan', compact('laporan'));
    }

    public function pengajuan()
    {
        $mitras = Mitra::where('status', 'menunggu')->paginate(10);
        return view('owner.mitra.pengajuan', compact('mitras'));
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
            $html = view('owner.laporan._mitra_list', compact('mitras'))->render();
            return response()->json([
                'html' => $html
            ]);
        }

        return view('owner.laporan.index', compact('mitras'));
    }

    public function updateStatus(Request $request, Mitra $mitra)
    {
        $request->validate([
            'status' => 'required|in:menunggu,disetujui,ditolak'
        ]);

        $mitra->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status mitra berhasil diperbarui.');
    }
}
