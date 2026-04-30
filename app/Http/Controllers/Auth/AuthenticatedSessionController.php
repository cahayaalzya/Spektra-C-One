<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Proses Login & Redirect berdasarkan Role
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // 1. Validasi user (Email & Password)
        $request->authenticate();

        // 2. Buat session baru
        $request->session()->regenerate();

        $user = Auth::user();

        // 3. LOGIC REDIRECT: Pastikan huruf besar/kecil sesuai ENUM di Database (Siswa/Guru)
        if ($user->role === 'Admin') {
            return redirect()->route('admin.dashboard');
        } 
        
        if ($user->role === 'Guru') {
            return redirect()->route('guru.dashboard');
        } 
        
        if ($user->role === 'Siswa') {
            return redirect()->route('siswa.dashboard');
        }

        // Jalur cadangan jika role tidak spesifik
        return redirect()->route('dashboard');
    }

    /**
     * Proses Logout
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}