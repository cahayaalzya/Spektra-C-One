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

        /* BACK BUTTON */
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-size: 11px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--dark-bolt);
            background: white;
            padding: 12px 24px;
            border-radius: 15px;
            border: 2px solid var(--dark-bolt);
            box-shadow: 4px 4px 0px var(--dark-bolt);
            transition: 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            margin-bottom: 40px;
            text-decoration: none !important;
        }

        .btn-back:hover { 
            transform: translate(-3px, -3px);
            box-shadow: 7px 7px 0px var(--capsule-pink);
            background: var(--dark-bolt);
            color: white;
        }

        .article-container {
            max-width: 900px;
            margin: 0 auto;
        }

        /* NEUBRUTALISM ARTICLE CARD */
        .article-card {
            background: white;
            border-radius: 45px;
            padding: 20px;
            border: 3px solid var(--dark-bolt);
            box-shadow: 15px 15px 0px var(--dark-bolt);
        }

        .img-wrapper {
            width: 100%;
            background: var(--sky-blue);
            border-radius: 30px;
            display: flex;
            justify-content: center;
            padding: 30px;
            border: 2px solid var(--dark-bolt);
            position: relative;
            overflow: hidden;
        }

        .main-hero-img {
            max-width: 100%;
            height: auto;
            max-height: 600px;
            object-fit: contain;
            border-radius: 20px;
            border: 3px solid var(--dark-bolt);
            box-shadow: 10px 10px 0px rgba(0,0,0,0.1);
        }

        .category-pill {
            background: var(--retro-green);
            color: var(--dark-bolt);
            padding: 8px 20px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            border: 2px solid var(--dark-bolt);
            box-shadow: 4px 4px 0px var(--dark-bolt);
        }

        .content-body {
            font-size: 16px;
            line-height: 1.9;
            color: var(--dark-bolt);
            opacity: 0.8;
            white-space: pre-line;
            font-weight: 600;
        }

        .meta-info {
            border-top: 3px dashed var(--dark-bolt);
            padding-top: 35px;
            margin-top: 40px;
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
        }

        .meta-label {
            font-size: 9px;
            font-weight: 900;
            color: var(--dark-bolt);
            text-transform: uppercase;
            letter-spacing: 2px;
            opacity: 0.4;
            display: block;
            margin-bottom: 5px;
        }

        .meta-value {
            font-size: 15px;
            font-weight: 900;
            text-transform: uppercase;
            font-family: 'Space Grotesk', sans-serif;
        }

        .title-pacific { font-family: 'Pacifico', cursive; }

        /* STAR DECORATION */
        .star-sparkle {
            position: absolute;
            background: var(--dark-bolt);
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
        }
    </style>

    <div class="py-16 px-6 relative">
        <div class="article-container">
            
            <a href="javascript:history.back()" class="btn-back">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                Kembali
            </a>

            <article class="article-card">
                <div class="img-wrapper">
                    <div class="star-sparkle" style="width: 20px; height: 20px; top: 10px; right: 20px; background: var(--retro-yellow);"></div>
                    
                    <img src="{{ asset('storage/' . ($item->foto ?? $item->image)) }}" class="main-hero-img" alt="{{ $item->judul }}">
                </div>

                <div class="p-8 md:p-14">
                    <div class="mb-8 flex items-center gap-4">
                        <span class="category-pill">{{ $item->kategori ?? 'Karya' }}</span>
                        <div class="h-[2px] flex-grow bg-dark-bolt opacity-10 border-dashed border-t-2"></div>
                    </div>

                    <h1 class="text-4xl md:text-6xl font-black uppercase italic tracking-tighter leading-none mb-10" style="font-family: 'Space Grotesk', sans-serif;">
                        {{ $item->judul }}
                    </h1>

                    <div class="content-body">
                        {{ $item->deskripsi ?? $item->isi }}
                    </div>

                    <div class="meta-info">
                        @if(isset($item->user))
                        <div>
                            <span class="meta-label">Kreator</span>
                            <p class="meta-value text-sky-blue">{{ $item->user->name }}</p>
                        </div>
                        @endif
                        <div>
                            <span class="meta-label">Tanggal Rilis</span>
                            <p class="meta-value">{{ $item->created_at->format('d M Y') }}</p>
                        </div>
                        <div class="ml-auto hidden md:block">
                            <span class="title-pacific text-2xl opacity-20">Spektra.</span>
                        </div>
                    </div>
                </div>
            </article>

            <footer class="mt-24 text-center">
                <p class="text-[10px] font-black uppercase tracking-[0.8em] opacity-30">Archive System • Batch 51</p>
            </footer>
        </div>
    </div>
</x-app-layout>