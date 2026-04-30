<x-app-layout>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&family=Pacifico&family=Instrument+Serif:ital@1&family=Space+Grotesk:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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
            background: var(--bg-cream);
            background-image: radial-gradient(var(--sky-blue) 0.5px, transparent 0.5px);
            background-size: 30px 30px;
            font-family: 'Plus Jakarta Sans', sans-serif; 
            color: var(--dark-bolt);
        }
        
        .hero-section {
            background: white;
            border: 3px solid var(--dark-bolt);
            border-radius: 40px;
            padding: 60px;
            box-shadow: 15px 15px 0px var(--sky-blue);
            position: relative;
            overflow: hidden;
        }

        .stat-card { 
            background: white; 
            padding: 2rem; 
            border-radius: 24px; 
            border: 3px solid var(--dark-bolt); 
            box-shadow: 8px 8px 0px var(--dark-bolt);
            transition: 0.3s;
        }

        .stat-card:hover {
            transform: translate(-4px, -4px);
            box-shadow: 12px 12px 0px var(--dark-bolt);
        }

        .karya-card {
            background: white;
            border-radius: 28px;
            padding: 16px;
            border: 3px solid var(--dark-bolt);
            box-shadow: 8px 8px 0px var(--dark-bolt);
            transition: 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .karya-card:hover {
            transform: translate(-5px, -5px);
            box-shadow: 14px 14px 0px var(--retro-green);
        }

        .btn-main {
            background: var(--dark-bolt);
            color: white;
            padding: 18px 35px;
            border-radius: 18px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: 0.2s;
            display: inline-block;
        }

        .btn-main:hover {
            background: var(--retro-yellow);
            color: var(--dark-bolt);
            transform: translate(-3px, -3px);
            box-shadow: 6px 6px 0px var(--dark-bolt);
        }

        .title-pacific { font-family: 'Pacifico', cursive; }
        .title-serif { font-family: 'Instrument Serif', serif; font-style: italic; }
        .title-huge { font-family: 'Space Grotesk', sans-serif; letter-spacing: -0.04em; }

        .star-sparkle {
            position: absolute;
            background: var(--dark-bolt);
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
        }
    </style>

    <div class="max-w-[1200px] mx-auto p-6 md:p-12">
        
        <div class="hero-section mb-16">
            <div class="star-sparkle" style="width: 30px; height: 30px; top: 10%; right: 10%; background: var(--retro-yellow);"></div>
            <div class="star-sparkle" style="width: 20px; height: 20px; bottom: 15%; left: 5%; background: var(--retro-green);"></div>
            
            <div class="relative z-10">
                <p class="text-[10px] font-black uppercase tracking-[0.6em] mb-4 opacity-40">Student Creative Hub</p>
                <h1 class="title-huge text-6xl md:text-8xl font-black uppercase leading-[0.85] mb-10">
                    HELLO, <br> <span class="title-serif normal-case" style="color: var(--sky-blue)">{{ explode(' ', Auth::user()->name)[0] }}!</span>
                </h1>

                <div class="flex flex-wrap gap-6 mb-12">
                    <div class="stat-card px-10 py-6">
                        <p class="text-[9px] font-black opacity-40 uppercase tracking-widest mb-1">My Archive</p>
                        <p class="text-3xl font-black">{{ $total_karya ?? 0 }}</p>
                    </div>
                    <div class="stat-card px-10 py-6" style="background: var(--capsule-pink);">
                        <p class="text-[9px] font-black opacity-40 uppercase tracking-widest mb-1">Pending</p>
                        <p class="text-3xl font-black">{{ $pending_count ?? 0 }}</p>
                    </div>
                </div>

                <a href="{{ route('siswa.create') }}" class="btn-main text-xs">
                    Mulai Berkreasi <i class="fas fa-plus ml-2"></i>
                </a>
            </div>
        </div>

        <div class="flex justify-between items-end mb-10">
            <div>
                <h2 class="text-4xl font-black uppercase tracking-tighter">Karya Saya</h2>
                <p class="text-[10px] font-black opacity-30 uppercase tracking-[0.4em]">Manage your creative vault</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($allKarya as $k)
                <div class="karya-card group">
                    <div class="aspect-square rounded-[20px] overflow-hidden border-2 border-dark-bolt mb-6">
                        <img src="{{ asset('storage/'.$k->foto) }}" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" 
                             alt="{{ $k->judul }}">
                    </div>

                    <div class="px-2">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-[9px] font-black px-3 py-1 bg-retro-yellow border-2 border-dark-bolt rounded-lg uppercase">
                                {{ $k->kategori }}
                            </span>
                            @if($k->status == 'approved')
                                <span class="text-[8px] font-bold text-green-500 uppercase tracking-widest italic">● Published</span>
                            @else
                                <span class="text-[8px] font-bold text-pink-500 uppercase tracking-widest italic">● {{ $k->status }}</span>
                            @endif
                        </div>
                        <h3 class="text-2xl font-black uppercase tracking-tighter leading-none mb-6">
                            {{ $k->judul }}
                        </h3>
                        
                        <a href="{{ route('siswa.showKarya', $k->id) }}" class="block w-full text-center py-3 border-2 border-dark-bolt rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-dark-bolt hover:text-white transition-all">
                            View Details
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-24 text-center border-4 border-dashed border-dark-bolt rounded-[40px] opacity-20">
                    <p class="font-black uppercase tracking-[0.5em] italic">Belum ada karya yang diunggah.</p>
                </div>
            @endforelse
        </div>

        <footer class="mt-24 py-10 border-t-2 border-dark-bolt border-dashed text-center">
            <p class="title-pacific text-2xl mb-2">Spektra.</p>
            <p class="text-[9px] font-black opacity-30 uppercase tracking-[0.6em]">SMKN 1 Cimahi • Batch 51 • 2026</p>
        </footer>
    </div>
</x-app-layout>