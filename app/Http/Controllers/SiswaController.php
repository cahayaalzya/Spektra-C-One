<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    /**
     * Dashboard: Menampilkan statistik personal dan Galeri Kolektif (Hanya yang Approved)
     */
    public function index()
    {
        $userId = Auth::id();
        
        // Statistik untuk widget di atas hero
        $total_karya = Karya::where('user_id', $userId)->count();
        $approved_count = Karya::where('user_id', $userId)->where('status', 'approved')->count();
        $pending_count = Karya::where('user_id', $userId)->where('status', 'pending')->count();
        
        // DISCOVERY: Menampilkan karya semua siswa yang sudah disetujui Guru
        // Kecuali kategori Berita/Prestasi/Event karena itu masuk ke halaman News
        $allKarya = Karya::with('user')
            ->where('status', 'approved')
            ->whereNotIn('kategori', ['Berita', 'Prestasi', 'Event'])
            ->latest()
            ->get();

        return view('siswa.dashboard', compact('total_karya', 'approved_count', 'pending_count', 'allKarya'));
    }

    /**
     * Menampilkan form upload karya
     */
    public function create()
    {
        $kategoris = Kategori::all(); 
        return view('siswa.create', compact('kategoris'));
    }

    /**
     * Simpan karya ke database dengan status PENDING
     */
    public function storeKarya(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:1048576', // Maks 1MB
            'deskripsi' => 'required|string',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('karya', 'public');

            Karya::create([
                'user_id' => Auth::id(),
                'judul' => $request->judul,
                'kategori' => $request->kategori,
                'foto' => $path,
                'deskripsi' => $request->deskripsi,
                'status' => 'pending', // <--- FIX: Sekarang nunggu review guru dulu
            ]);

            // Redirect ke 'karyaku' karena di dashboard utama (index) karya pending tidak muncul
            return redirect()->route('siswa.karyaku')->with('success', 'Karya berhasil dikirim! Menunggu kurasi guru.');
        }

        return back()->with('error', 'Gagal mengunggah foto.');
    }

    /**
     * Detail Karya
     */
    public function show($id)
    {
        $item = Karya::with('user')->findOrFail($id);
        return view('siswa.show', compact('item'));
    }

    /**
     * Koleksi Pribadi Siswa (Menampilkan semua karya milik sendiri, baik pending maupun approved)
     */
    public function karyaku()
    {
        $karyaku = Karya::where('user_id', Auth::id())->latest()->get();
        return view('siswa.karyaku', compact('karyaku'));
    }

    /**
     * Halaman Berita & Event Sekolah
     */
    public function berita()
    {
        // Hanya menampilkan kategori informasi resmi dari sekolah
        $beritas = Karya::whereIn('kategori', ['Berita', 'Prestasi', 'Event'])
            ->where('status', 'approved')
            ->latest()
            ->get();
            
        return view('siswa.berita', compact('beritas'));
    }
}