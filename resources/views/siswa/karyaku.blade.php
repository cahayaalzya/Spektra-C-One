<x-app-layout>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&family=Space+Grotesk:wght@700&family=Pacifico&display=swap" rel="stylesheet">

    <style>
        :root {
            --sky-blue: #89B4FA; 
            --retro-green: #A6E3A1; 
            --retro-yellow: #F9E2AF; 
            --capsule-pink: #F5C2E7; 
            --dark-bolt: #111111; 
            --bg-cream: #FAF9F6;
        }

        /* GRAIN EFFECT */
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            opacity: 0.05;
            z-index: 9999;
            pointer-events: none;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-cream);
            background-image: radial-gradient(var(--sky-blue) 0.5px, transparent 0.5px);
            background-size: 30px 30px;
            color: var(--dark-bolt);
        }

        /* NEUBRUTALISM CARD */
        .portfolio-card {
            background: white;
            border-radius: 35px;
            padding: 20px;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 3px solid var(--dark-bolt);
            box-shadow: 10px 10px 0px var(--dark-bolt);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .portfolio-card:hover {
            transform: translate(-5px, -5px);
            box-shadow: 15px 15px 0px var(--retro-yellow);
        }

        .img-container {
            border-radius: 24px;
            aspect-ratio: 4/3;
            overflow: hidden;
            background: var(--sky-blue);
            position: relative;
            border: 2px solid var(--dark-bolt);
        }

        /* STATUS BADGE */
        .status-badge {
            padding: 8px 16px;
            border-radius: 12px;
            font-size: 9px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            border: 2px solid var(--dark-bolt);
            box-shadow: 3px 3px 0px var(--dark-bolt);
        }

        .status-approved { background: var(--retro-green); color: var(--dark-bolt); }
        .status-pending { background: var(--retro-yellow); color: var(--dark-bolt); }
        .status-rejected { background: var(--capsule-pink); color: var(--dark-bolt); }

        /* FEEDBACK BOX */
        .feedback-box {
            background: var(--bg-cream);
            border: 2px solid var(--dark-bolt);
            padding: 15px;
            border-radius: 20px;
            margin-top: 15px;
            box-shadow: 4px 4px 0px var(--capsule-pink);
        }

        .btn-add {
            background: var(--dark-bolt);
            color: white;
            padding: 18px 30px;
            border-radius: 20px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 11px;
            border: 3px solid var(--dark-bolt);
            transition: all 0.2s ease;
        }

        .btn-add:hover {
            background: var(--retro-green);
            color: var(--dark-bolt);
            transform: translate(-3px, -3px);
            box-shadow: 6px 6px 0px var(--dark-bolt);
        }

        .title-pacific { font-family: 'Pacifico', cursive; }

        /* STAR DECORATION */
        .star-sparkle {
            position: absolute;
            background: var(--dark-bolt);
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
        }
    </style>

    <div class="max-w-[1300px] mx-auto p-6 md:p-14 relative">
        <div class="star-sparkle" style="width: 30px; height: 30px; top: 5%; right: 2%; background: var(--retro-yellow);"></div>
        <div class="star-sparkle" style="width: 20px; height: 20px; top: 12%; left: 0; background: var(--capsule-pink);"></div>

        <header class="mb-20 flex flex-col md:flex-row justify-between items-end gap-8">
            <div class="text-center md:text-left">
                <h1 class="text-6xl md:text-7xl font-black uppercase tracking-tighter leading-none" style="font-family: 'Space Grotesk', sans-serif;">
                    MY <span class="title-pacific lowercase text-5xl md:text-6xl" style="color: var(--sky-blue); -webkit-text-stroke: 0px;">Archive.</span>
                </h1>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.5em] mt-6">Kumpulan jejak kreatifitasmu di Spektra</p>
            </div>
            
            <a href="{{ route('siswa.create') }}" class="btn-add">
                + Tambah Karya
            </a>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @forelse($karyaku as $item)
            <div class="portfolio-card">
                <div class="img-container mb-8">
                    <img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-full object-cover" alt="{{ $item->judul }}">
                    
                    <div class="absolute top-4 left-4">
                        <span class="status-badge 
                            {{ $item->status == 'approved' ? 'status-approved' : ($item->status == 'rejected' ? 'status-rejected' : 'status-pending') }}">
                            {{ $item->status }}
                        </span>
                    </div>
                </div>
                
                <div class="px-2 flex-grow">
                    <h3 class="text-3xl font-black uppercase tracking-tighter leading-tight mb-3 italic">{{ $item->judul }}</h3>
                    <div class="inline-block px-4 py-1 bg-white border-2 border-dark-bolt rounded-lg shadow-[3px_3px_0px_var(--dark-bolt)] mb-6">
                        <p class="text-[9px] font-black text-dark-bolt uppercase tracking-widest">
                            {{ $item->category->nama_kategori ?? $item->kategori }}
                        </p>
                    </div>
                    
                    @if($item->status == 'rejected' && $item->alasan_tolak)
                    <div class="feedback-box">
                        <p class="text-[9px] font-black text-dark-bolt uppercase tracking-widest mb-2 italic">Ditolak karena:</p>
                        <p class="text-[11px] text-dark-bolt font-bold leading-relaxed opacity-70">"{{ $item->alasan_tolak }}"</p>
                    </div>
                    @endif
                </div>

                <div class="mt-10 pt-6 border-t-2 border-dashed border-dark-bolt opacity-30">
                    <p class="text-[9px] font-black uppercase tracking-[0.3em] text-center">
                        Captured on {{ $item->created_at->format('d M Y') }}
                    </p>
                </div>
            </div>
            @empty
            <div class="col-span-full py-32 text-center border-4 border-dashed border-dark-bolt rounded-[40px] bg-white/50">
                <p class="text-dark-bolt font-black uppercase tracking-[0.5em] italic opacity-20">Belum ada karya yang kamu unggah</p>
            </div>
            @endforelse
        </div>
    </div>

    <footer class="mt-40 pb-16 text-center border-t-2 border-dashed border-dark-bolt pt-20">
        <h2 class="title-pacific text-4xl mb-4">Spektra.</h2>
        <p class="text-[10px] font-black opacity-30 uppercase tracking-[0.6em]">SMKN 1 Cimahi • Batch 51 • 2026</p>
    </footer>
</x-app-layout>