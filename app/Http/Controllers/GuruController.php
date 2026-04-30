<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function dashboard() {
        $pending_count = Karya::where('status', 'pending')->count();
        $approved_count = Karya::where('status', 'approved')->count();
        $siswa_count = User::where('role', 'Siswa')->count();
        $antrean_karya = Karya::with('user')->where('status', 'pending')->latest()->take(3)->get();
        $allKarya = Karya::with('user')->where('status', 'approved')->latest()->get();

        return view('guru.dashboard', compact('pending_count', 'approved_count', 'siswa_count', 'antrean_karya', 'allKarya'));
    }

    public function review() {
        $pending_count = Karya::where('status', 'pending')->count();
        $karyas = Karya::with('user')->where('status', 'pending')->latest()->get();
        return view('guru.review', compact('karyas', 'pending_count'));
    }

    public function siswa() {
        $siswas = User::where('role', 'Siswa')->withCount('karyas')->orderBy('name', 'asc')->get();
        $pending_count = Karya::where('status', 'pending')->count();
        return view('guru.siswa', compact('siswas', 'pending_count'));
    }

    public function showSiswa($id)
    {
        $siswa = User::with(['karyas' => function($query) {
            $query->latest();
        }])->withCount('karyas')->findOrFail($id);

        $pending_count = Karya::where('status', 'pending')->count();

        return view('guru.show-siswa', compact('siswa', 'pending_count'));
    }

    // --- FIX: FUNGSI YANG DICARI ROUTE KAMU ---
    public function updateStatus(Request $request, $id)
    {
        $karya = Karya::findOrFail($id);
        
        // Mengambil status dari input form (bisa 'approved' atau 'rejected')
        $karya->update([
            'status' => $request->status
        ]);

        $pesan = $request->status == 'approved' ? 'Karya berhasil dipublikasikan!' : 'Karya telah ditolak.';
        
        return redirect()->route('guru.review')->with('success', $pesan);
    }
}