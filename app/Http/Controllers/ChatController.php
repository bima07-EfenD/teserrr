<?php
namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Laporan;


class ChatController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'laporan_id' => 'required|exists:laporans,id',
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        Chat::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $validated['receiver_id'],
            'laporan_id' => $validated['laporan_id'],
            'message' => $validated['message'],
        ]);

        switch (Auth::user()->role) {
            case 'pegawai':
                return redirect()->route('pegawai.laporan.show', $validated['laporan_id']);
            case 'petani':
                return redirect()->route('petani.laporan.show', $validated['laporan_id']);
            case 'owner':
                return redirect()->route('owner.laporan.show', $validated['laporan_id']);
            default:
                abort(403, 'Role tidak dikenal.');
        }
    }


}
