<x-app-layout>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&family=Space+Grotesk:wght@700&family=Instrument+Serif:ital@1&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --sky-blue: #89B4FA; 
            --retro-green: #A6E3A1; 
            --retro-yellow: #F9E2AF;
            --dark-bolt: #111111; 
            --bg-cream: #FAF9F6;
            --accent-pink: #FFB7C5;
        }

        /* Menghilangkan navbar default jika ada di pembungkus x-app-layout */
        nav, .navbar { display: none !important; }

        body {
            background: var(--bg-cream);
            background-image: radial-gradient(var(--sky-blue) 0.5px, transparent 0.5px);
            background-size: 25px 25px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--dark-bolt);
        }

        /* Sidebar Style */
        .sidebar-guru { 
            background: white; 
            border-right: 4px solid var(--dark-bolt); 
        }

        .nav-link-guru { 
            display: flex; align-items: center; padding: 1.1rem 1.5rem; border-radius: 16px; 
            font-weight: 800; font-size: 13px; color: var(--dark-bolt); transition: 0.2s; 
            margin-bottom: 12px; border: 2px solid transparent;
        }
        .nav-link-guru:hover:not(.active) {
            background: var(--retro-yellow);
            border-color: var(--dark-bolt);
            transform: translate(-3px, -3px);
            box-shadow: 4px 4px 0px var(--dark-bolt);
        }
        .nav-link-guru.active { 
            background: var(--sky-blue); color: var(--dark-bolt); border: 2px solid var(--dark-bolt);
            box-shadow: 6px 6px 0px var(--dark-bolt); 
        }

        /* Profile Card */
        .profile-card {
            background: white;
            border-radius: 32px;
            padding: 40px;
            border: 3px solid var(--dark-bolt);
            box-shadow: 12px 12px 0px var(--dark-bolt);
        }

        /* Work Card */
        .karya-mini-card {
            background: white;
            border-radius: 28px;
            padding: 16px;
            transition: 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 3px solid var(--dark-bolt);
            box-shadow: 8px 8px 0px var(--dark-bolt);
        }
        .karya-mini-card:hover {
            transform: translate(-5px, -5px);
            box-shadow: 14px 14px 0px var(--accent-pink);
        }

        .status-tag {
            font-size: 9px; font-weight: 900; text-transform: uppercase; letter-spacing: 1.5px;
            padding: 6px 14px; border-radius: 12px; border: 2px solid var(--dark-bolt);
            box-shadow: 3px 3px 0px var(--dark-bolt);
        }

        .title-pacific { font-family: 'Pacifico', cursive; }
        .title-serif { font-family: 'Instrument Serif', serif; font-style: italic; }
    </style>

    <div class="min-h-screen flex">
        <aside class="w-80 sidebar-guru hidden lg:flex flex-col p-8 h-screen sticky top-0">
            <div class="mb-12 px-2">
                <h1 class="title-pacific text-4xl text-dark-bolt">Spektra.</h1>
                <p class="text-[9px] font-black uppercase tracking-[0.4em] text-slate-400">Curator Dashboard</p>
            </div>
            
            <nav class="flex-1">
                <a href="{{ route('guru.dashboard') }}" class="nav-link-guru">
                    <i class="fas fa-th-large mr-3 text-lg"></i> Dashboard
                </a>
                <a href="{{ route('guru.review') }}" class="nav-link-guru">
                    <i class="fas fa-check-circle mr-3 text-lg"></i> Review Karya 
                </a>
                <a href="{{ route('guru.siswa') }}" class="nav-link-guru active">
                    <i class="fas fa-users mr-3 text-lg"></i> Database Siswa
                </a>
            </nav>

            <div class="bg-dark-bolt rounded-[24px] p-6 text-white shadow-xl">
                <p class="text-[8px] font-black uppercase tracking-widest text-slate-400 mb-1">Administrator</p>
                <p class="text-sm font-bold truncate">{{ Auth::user()->name }}</p>
                <form method="POST" action="{{ route('logout') }}" class="mt-4">
                    @csrf
                    <button class="w-full bg-red-500 text-[10px] font-black py-3 rounded-xl uppercase tracking-widest border-2 border-white/20 hover:bg-red-600 transition-all">
                        Logout System
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 p-8 lg:p-14">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-8">
                <div>
                    <h1 class="text-6xl font-black uppercase tracking-tighter leading-none" style="font-family: 'Space Grotesk', sans-serif;">
                        STUDENT <span class="title-serif normal-case" style="color: var(--accent-pink)">Archive.</span>
                    </h1>
                    <p class="text-[11px] font-black opacity-40 uppercase tracking-[0.5em] mt-4 italic">Viewing collection of {{ $siswa->name }}</p>
                </div>
                
                <a href="{{ route('guru.siswa') }}" class="px-8 py-4 bg-white border-4 border-dark-bolt rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-retro-yellow transition-all shadow-[6px_6px_0px_var(--dark-bolt)] hover:translate-x-[-2px] hover:translate-y-[-2px] hover:shadow-[8px_8px_0px_var(--dark-bolt)]">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Database
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
                <div class="lg:col-span-1">
                    <div class="profile-card sticky top-14 text-center lg:text-left">
                        <div class="w-24 h-24 bg-white border-4 border-dark-bolt rounded-[30px] flex items-center justify-center text-4xl mb-8 mx-auto lg:mx-0 shadow-[6px_6px_0px_var(--accent-pink)] rotate-[-3deg]">
                            👤
                        </div>
                        <h2 class="text-3xl font-black uppercase tracking-tighter leading-none mb-3">{{ $siswa->name }}</h2>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-10 bg-slate-100 py-2 px-4 rounded-lg inline-block border-2 border-dark-bolt shadow-[3px_3px_0px_var(--dark-bolt)]">
                            {{ $siswa->email }}
                        </p>

                        <div class="space-y-4 pt-8 border-t-4 border-dark-bolt border-dotted">
                            <div class="flex justify-between items-center bg-bg-cream p-4 rounded-2xl border-2 border-dark-bolt shadow-[4px_4px_0px_var(--dark-bolt)]">
                                <span class="text-[10px] font-black uppercase tracking-widest">Total Work</span>
                                <span class="text-xl font-black">{{ $siswa->karyas_count }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        @forelse($siswa->karyas as $k)
                            <div class="karya-mini-card group">
                                <div class="relative aspect-[4/3] rounded-[22px] overflow-hidden border-2 border-dark-bolt mb-6">
                                    <img src="{{ asset('storage/'.$k->foto) }}" 
                                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" 
                                         alt="{{ $k->judul }}">
                                    
                                    <div class="absolute top-4 left-4">
                                        @if($k->status == 'approved')
                                            <span class="status-tag bg-retro-green">Published</span>
                                        @elseif($k->status == 'pending')
                                            <span class="status-tag bg-retro-yellow">Pending</span>
                                        @else
                                            <span class="status-tag bg-red-400 text-white">Rejected</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="px-2">
                                    <span class="text-[9px] font-black text-slate-400 uppercase tracking-[0.3em] mb-2 block">{{ $k->kategori }}</span>
                                    <h3 class="text-2xl font-black uppercase tracking-tighter mb-5 leading-none group-hover:text-sky-blue transition-colors">
                                        {{ $k->judul }}
                                    </h3>
                                    
                                    <div class="pt-5 border-t-2 border-dashed border-slate-100 flex items-center justify-between">
                                        <span class="text-[10px] font-black opacity-30 italic">{{ $k->created_at->format('M Y') }}</span>
                                        <a href="#" class="text-[11px] font-black uppercase tracking-widest text-dark-bolt hover:text-accent-pink flex items-center gap-2">
                                            Details <i class="fas fa-arrow-right text-[9px]"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full py-32 text-center bg-white rounded-[40px] border-4 border-dashed border-dark-bolt opacity-40">
                                <p class="font-black uppercase tracking-[0.5em] text-xs">No works in the vault.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <footer class="mt-24 pt-10 border-t-2 border-dashed border-slate-200 text-center">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.5em]">SMKN 1 Cimahi • Spektra Curator Panel • Batch 51</p>
            </footer>
        </main>
    </div>
</x-app-layout>