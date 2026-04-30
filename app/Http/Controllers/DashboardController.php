<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karya; // Pastikan model karyamu di-import
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil semua karya dari semua siswa untuk galeri publik
        $semuaKarya = Karya::with('user')->latest()->get();

        // 2. Cek role user yang login
        $user = Auth::user();

        // 3. Arahkan ke view sesuai role sambil bawa data karya
        if ($user->role === 'Guru') {
            return view('guru.dashboard', compact('semuaKarya'));
        }

        return view('siswa.dashboard', compact('semuaKarya'));
    }
}