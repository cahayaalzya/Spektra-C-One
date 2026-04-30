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

        /* NEWS CARD NEUBRUTALISM */
        .news-card {
            background: white;
            border-radius: 30px;
            padding: 16px;
            border: 3px solid var(--dark-bolt);
            box-shadow: 10px 10px 0px var(--dark-bolt);
            display: flex;
            flex-direction: column;
            height: 100%;
            text-decoration: none !important;
            color: inherit;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .news-card:hover {
            transform: translate(-5px, -5px);
            box-shadow: 15px 15px 0px var(--capsule-pink);
            border-color: var(--dark-bolt);
        }

        .news-img-frame {
            border-radius: 20px;
            aspect-ratio: 16/10;
            overflow: hidden;
            position: relative;
            background: var(--sky-blue);
            border: 2px solid var(--dark-bolt);
        }

        /* CUSTOM BUTTON STYLE */
        .btn-read-full {
            background: var(--dark-bolt);
            color: white;
            width: 100%;
            padding: 16px;
            border-radius: 15px;
            font-size: 10px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-align: center;
            transition: all 0.2s ease;
            margin-top: auto;
            border: 2px solid var(--dark-bolt);
        }

        .news-card:hover .btn-read-full {
            background: var(--retro-green);
            color: var(--dark-bolt);
            transform: scale(1.02);
        }

        .title-pacific { font-family: 'Pacifico', cursive; }
        
        /* STAR DECORATION */
        .star-sparkle {
            position: absolute;
            background: var(--dark-bolt);
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
            z-index: 1;
        }
    </style>

    <div class="max-w-[1300px] mx-auto p-6 md:p-14 relative">
        <div class="star-sparkle" style="width: 40px; height: 40px; top: 5%; left: 2%; background: var(--retro-yellow);"></div>
        <div class="star-sparkle" style="width: 25px; height: 25px; top: 10%; right: 5%; background: var(--sky-blue);"></div>

        <header class="mb-24 text-center">
            <h1 class="text-7xl md:text-9xl font-black uppercase tracking-tighter leading-none" style="font-family: 'Space Grotesk', sans-serif;">
                NEWS <br> <span class="title-pacific lowercase text-6xl md:text-8xl" style="color: var(--sky-blue); -webkit-text-stroke: 0px;">Updates.</span>
            </h1>
            <div class="inline-block mt-8 px-8 py-2 bg-retro-green border-2 border-dark-bolt rounded-full shadow-[4px_4px_0px_var(--dark-bolt)]">
                <p class="text-[10px] font-black uppercase tracking-[0.4em]">Informasi Terbaru Spektra C One</p>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @forelse($beritas as $b)
                <a href="{{ route('siswa.showKarya', $b->id) }}" class="news-card group">
                    <div class="news-img-frame">
                        @php 
                            $gambar = $b->foto ?? $b->image; 
                        @endphp

                        @if($gambar)
                            <img src="{{ asset('storage/' . $gambar) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="{{ $b->judul }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-white font-black uppercase text-[10px]">No Image</div>
                        @endif
                        
                        <div class="absolute top-4 left-4">
                            <span class="bg-white border-2 border-dark-bolt px-4 py-1.5 rounded-lg text-[9px] font-black uppercase tracking-wider shadow-[3px_3px_0px_var(--dark-bolt)]">
                                {{ $b->kategori ?? 'News' }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="mt-8 px-2 pb-6">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] mb-3">{{ $b->created_at->format('d M Y') }}</p>
                        <h2 class="text-3xl font-black uppercase tracking-tighter leading-[0.9] mb-5 group-hover:text-sky-blue transition-colors italic">
                            {{ $b->judul }}
                        </h2>
                        <p class="text-[11px] text-slate-500 font-bold leading-relaxed uppercase opacity-70">
                            {{ Str::limit($b->deskripsi ?? $b->isi, 85) }}
                        </p>
                    </div>

                    <div class="btn-read-full">
                        Baca Selengkapnya →
                    </div>
                </a>
            @empty
                <div class="col-span-full py-32 text-center border-4 border-dashed border-dark-bolt rounded-[40px] bg-white/50">
                    <p class="text-dark-bolt font-black uppercase tracking-[0.5em] italic opacity-20">Belum ada berita terbaru</p>
                </div>
            @endforelse
        </div>
    </div>

    <footer class="mt-40 pb-16 text-center border-t-2 border-dashed border-dark-bolt pt-20">
        <h2 class="title-pacific text-4xl mb-4">Spektra.</h2>
        <p class="text-[10px] font-black opacity-30 uppercase tracking-[0.6em]">SMKN 1 Cimahi • Batch 51 • 2026</p>
    </footer>
</x-app-layout>