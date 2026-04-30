<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spektra Curator - Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root { 
            --sky-blue: #89B4FA; 
            --retro-green: #A6E3A1; 
            --retro-yellow: #F9E2AF;
            --dark-bolt: #111111; 
            --bg-cream: #FAF9F6;
        }

        body { 
            background: var(--bg-cream);
            background-image: radial-gradient(var(--sky-blue) 1px, transparent 1px);
            background-size: 30px 30px;
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
        
        /* Sidebar Retro */
        .sidebar-guru { 
            background: white; 
            border-right: 4px solid var(--dark-bolt); 
        }

        .nav-link-guru { 
            display: flex; 
            align-items: center; 
            padding: 1.1rem 1.5rem; 
            border-radius: 16px; 
            font-weight: 800; 
            font-size: 13px; 
            color: var(--dark-bolt); 
            transition: 0.2s; 
            margin-bottom: 12px;
            border: 2px solid transparent;
        }

        .nav-link-guru:hover {
            background: var(--retro-yellow);
            border-color: var(--dark-bolt);
            transform: translate(-3px, -3px);
            box-shadow: 4px 4px 0px var(--dark-bolt);
        }

        .nav-link-guru.active { 
            background: var(--sky-blue); 
            color: var(--dark-bolt); 
            border: 2px solid var(--dark-bolt);
            box-shadow: 6px 6px 0px var(--dark-bolt); 
        }
        
        /* Stat Cards Neubrutalism */
        .stat-card { 
            background: white; 
            padding: 2.5rem; 
            border-radius: 24px; 
            border: 3px solid var(--dark-bolt); 
            box-shadow: 8px 8px 0px var(--dark-bolt);
            transition: 0.3s;
        }
        .stat-card:hover {
            transform: scale(1.02);
        }

        /* Bento Box Styling */
        .bento-box { 
            background: white; 
            border-radius: 32px; 
            border: 3px solid var(--dark-bolt); 
            padding: 2.5rem; 
            box-shadow: 12px 12px 0px rgba(0,0,0,0.05);
        }
        
        .antrean-item {
            background: white;
            border: 2px solid var(--dark-bolt);
            border-radius: 24px;
            transition: 0.2s;
        }
        .antrean-item:hover {
            background: #fdfdfd;
            transform: translate(-4px, -4px);
            box-shadow: 6px 6px 0px var(--dark-bolt);
        }

        .img-container { 
            position: relative; 
            overflow: hidden; 
            border-radius: 18px; 
            aspect-ratio: 4/5; 
            border: 2px solid var(--dark-bolt);
        }

        .title-pacific { font-family: 'Pacifico', cursive; }
        .title-serif { font-family: 'Instrument Serif', serif; font-style: italic; }

        /* Custom Button */
        .btn-retro {
            background: var(--dark-bolt);
            color: white;
            border-radius: 12px;
            font-weight: 900;
            text-transform: uppercase;
            transition: 0.2s;
        }
        .btn-retro:hover {
            background: var(--retro-green);
            color: var(--dark-bolt);
            transform: translate(-2px, -2px);
            box-shadow: 4px 4px 0px var(--dark-bolt);
        }
    </style>
</head>
<body class="antialiased">
    <div class="min-h-screen flex">
        <aside class="w-80 sidebar-guru hidden lg:flex flex-col p-8 h-screen sticky top-0">
            <div class="mb-12 px-2">
                <h1 class="title-pacific text-4xl text-dark-bolt">Spektra.</h1>
                <p class="text-[9px] font-black uppercase tracking-[0.4em] text-slate-400">Curator Dashboard</p>
            </div>
            
            <nav class="flex-1">
                <a href="{{ route('guru.dashboard') }}" class="nav-link-guru active">
                    <i class="fas fa-th-large mr-3 text-lg"></i> Dashboard
                </a>
                <a href="{{ route('guru.review') }}" class="nav-link-guru">
                    <i class="fas fa-check-circle mr-3 text-lg"></i> Review Karya 
                    @if($pending_count > 0) 
                        <span class="ml-auto bg-red-500 text-white px-2 py-1 rounded-lg border-2 border-dark-bolt text-[10px]">{{ $pending_count }}</span> 
                    @endif
                </a>
                <a href="{{ route('guru.siswa') }}" class="nav-link-guru">
                    <i class="fas fa-users mr-3 text-lg"></i> Database Siswa
                </a>
            </nav>

            <div class="bg-dark-bolt rounded-[24px] p-6 text-white shadow-xl relative overflow-hidden">
                <div class="relative z-10">
                    <p class="text-[8px] font-black uppercase tracking-widest text-retro-green mb-1" style="color: var(--retro-green)">Logged as Admin</p>
                    <p class="text-sm font-bold truncate">{{ Auth::user()->name }}</p>
                    <form method="POST" action="{{ route('logout') }}" class="mt-4">
                        @csrf
                        <button class="btn-retro w-full py-3 text-[10px] tracking-widest bg-red-500">Log Out</button>
                    </form>
                </div>
            </div>
        </aside>

        <main class="flex-1 p-8 lg:p-14">
            <header class="mb-14 flex justify-between items-end">
                <div>
                    <h1 class="text-6xl font-black text-slate-800 uppercase tracking-tighter leading-none">
                        Hi, <span class="title-serif normal-case text-sky-blue" style="color: var(--sky-blue)">{{ explode(' ', Auth::user()->name)[0] }}!</span>
                    </h1>
                    <p class="text-slate-500 text-[11px] font-black uppercase tracking-[0.5em] mt-3">Monitoring Station 2.0</p>
                </div>
                <div class="hidden md:block">
                    <span class="badge-date border-2 border-dark-bolt px-4 py-2 rounded-full font-black text-xs bg-retro-yellow">
                        {{ date('D, d M Y') }}
                    </span>
                </div>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-14">
                <div class="stat-card" style="background: var(--retro-green);">
                    <h1 class="text-7xl font-black text-dark-bolt tracking-tighter">{{ str_pad($pending_count, 2, '0', STR_PAD_LEFT) }}</h1>
                    <p class="text-[11px] font-black text-dark-bolt uppercase tracking-widest mt-2 italic">Pending Review</p>
                </div>
                <div class="stat-card" style="background: var(--sky-blue);">
                    <h1 class="text-7xl font-black text-dark-bolt tracking-tighter">{{ str_pad($approved_count, 2, '0', STR_PAD_LEFT) }}</h1>
                    <p class="text-[11px] font-black text-dark-bolt uppercase tracking-widest mt-2 italic">Active Posts</p>
                </div>
                <div class="stat-card" style="background: var(--retro-yellow);">
                    <h1 class="text-7xl font-black text-dark-bolt tracking-tighter">{{ str_pad($siswa_count, 2, '0', STR_PAD_LEFT) }}</h1>
                    <p class="text-[11px] font-black text-dark-bolt uppercase tracking-widest mt-2 italic">Total Artists</p>
                </div>
            </div>

            <div class="bento-box mb-16">
                <div class="flex justify-between items-center mb-10">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-8 bg-dark-bolt rounded-full"></div>
                        <h2 class="text-3xl font-black text-slate-800 uppercase tracking-tighter">Antrean Validasi</h2>
                    </div>
                    <a href="{{ route('guru.review') }}" class="btn-retro px-6 py-2 text-[10px]">Review All</a>
                </div>
                
                <div class="grid grid-cols-1 gap-5">
                    @forelse($antrean_karya as $k)
                        <div class="antrean-item flex items-center justify-between p-5">
                            <div class="flex items-center gap-6">
                                <div class="w-24 h-20 rounded-xl overflow-hidden border-2 border-dark-bolt shadow-sm">
                                    <img src="{{ asset('storage/'.$k->foto) }}" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <span class="text-[10px] font-black text-sky-blue uppercase tracking-widest">{{ $k->user->name }}</span>
                                    <h4 class="text-2xl font-black text-dark-bolt uppercase tracking-tighter leading-tight">{{ $k->judul }}</h4>
                                </div>
                            </div>
                            <a href="{{ route('guru.review') }}" class="btn-retro px-8 py-4 text-[10px]">Action</a>
                        </div>
                    @empty
                        <div class="text-center py-10 border-4 border-dashed border-slate-200 rounded-3xl">
                            <p class="font-black text-slate-300 uppercase tracking-widest">No pending works found.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <h2 class="text-4xl font-black text-slate-800 uppercase tracking-tighter mb-10 flex items-center gap-4">
                Global Feed <span class="h-px flex-1 bg-dark-bolt opacity-10"></span>
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($allKarya as $karya)
                    <div class="flex flex-col bg-white p-5 rounded-[30px] border-3 border-dark-bolt shadow-[8px_8px_0px_rgba(0,0,0,1)] group transition-all hover:translate-y-[-4px]">
                        <div class="img-container mb-5">
                            <img src="{{ asset('storage/' . $karya->foto) }}" class="grayscale group-hover:grayscale-0 transition-all duration-500">
                        </div>
                        <div class="flex flex-col flex-grow">
                            <div class="flex justify-between items-start mb-3">
                                <span class="text-[9px] font-black uppercase bg-retro-yellow border-2 border-dark-bolt px-3 py-1 rounded-full shadow-[2px_2px_0px_var(--dark-bolt)]">{{ $karya->kategori }}</span>
                            </div>
                            <h4 class="font-black text-xl uppercase tracking-tighter text-dark-bolt line-clamp-2 leading-none mb-4">{{ $karya->judul }}</h4>
                            <div class="mt-auto pt-4 border-t-2 border-dashed border-slate-100">
                                <p class="text-[10px] text-slate-400 font-black uppercase tracking-widest italic">By: {{ $karya->user->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
</body>
</html>