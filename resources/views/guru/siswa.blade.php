<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spektra Curator - Database Siswa</title>
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
            --color-rose: #F38BA8;
        }

        body { 
            background: var(--bg-cream);
            background-image: radial-gradient(var(--sky-blue) 1px, transparent 1px);
            background-size: 30px 30px;
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
        
        /* Sidebar Retro */
        .sidebar-guru { background: white; border-right: 4px solid var(--dark-bolt); }
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

        /* Student Card Neubrutalism */
        .student-card {
            background: white;
            border-radius: 32px;
            border: 3px solid var(--dark-bolt);
            padding: 2.5rem;
            transition: 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-align: center;
            height: 100%;
            display: flex;
            flex-direction: column;
            box-shadow: 8px 8px 0px rgba(0,0,0,0.05);
        }
        .student-card:hover {
            transform: translate(-8px, -8px);
            box-shadow: 12px 12px 0px var(--dark-bolt);
            border-color: var(--dark-bolt);
        }

        .initial-box {
            width: 85px; height: 85px;
            background: var(--retro-yellow);
            border: 3px solid var(--dark-bolt);
            border-radius: 24px;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 24px;
            font-weight: 900; font-size: 28px; color: var(--dark-bolt);
            transition: 0.4s ease;
            box-shadow: 4px 4px 0px var(--dark-bolt);
        }
        .student-card:hover .initial-box {
            background: var(--retro-green);
            transform: rotate(-12deg) scale(1.1);
        }

        .btn-retro {
            background: var(--dark-bolt);
            color: white;
            border-radius: 16px;
            font-weight: 900;
            text-transform: uppercase;
            transition: 0.2s;
            border: 2px solid var(--dark-bolt);
        }
        .btn-retro:hover {
            background: var(--sky-blue);
            color: var(--dark-bolt);
            transform: translate(-3px, -3px);
            box-shadow: 5px 5px 0px var(--dark-bolt);
        }
        
        .title-pacific { font-family: 'Pacifico', cursive; }
        .title-serif { font-family: 'Instrument Serif', serif; font-style: italic; }
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
                <a href="{{ route('guru.dashboard') }}" class="nav-link-guru {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-th-large mr-3 text-lg"></i> Dashboard
                </a>
                <a href="{{ route('guru.review') }}" class="nav-link-guru {{ request()->routeIs('guru.review') ? 'active' : '' }}">
                    <i class="fas fa-check-circle mr-3 text-lg"></i> Review Karya 
                    @if($pending_count > 0) 
                        <span class="ml-auto bg-red-500 text-white px-2 py-1 rounded-lg border-2 border-dark-bolt text-[10px]">{{ $pending_count }}</span> 
                    @endif
                </a>
                <a href="{{ route('guru.siswa') }}" class="nav-link-guru {{ request()->routeIs('guru.siswa') || request()->routeIs('guru.siswa.show') ? 'active' : '' }}">
                    <i class="fas fa-users mr-3 text-lg"></i> Database Siswa
                </a>
            </nav>

            <div class="bg-dark-bolt rounded-[24px] p-6 text-white shadow-xl">
                <p class="text-[8px] font-black uppercase tracking-widest text-slate-400 mb-1">Logged as Admin</p>
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
            <header class="mb-14">
                <h1 class="text-6xl font-black text-slate-800 uppercase tracking-tighter leading-none">
                    Database <span class="title-serif normal-case text-retro-green" style="color: var(--retro-green)">Siswa Spektra.</span>
                </h1>
                <p class="text-slate-500 text-[11px] font-black uppercase tracking-[0.5em] mt-3">Student Directory & Contributions</p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">
                @forelse($siswas as $siswa)
                    <div class="student-card group">
                        <div class="initial-box">
                            {{ strtoupper(substr($siswa->name, 0, 2)) }}
                        </div>
                        
                        <div class="mb-6">
                            <h3 class="font-black text-dark-bolt uppercase text-xl tracking-tighter line-clamp-1 leading-none">
                                {{ $siswa->name }}
                            </h3>
                            <p class="text-[10px] font-black text-sky-blue uppercase tracking-widest mt-2 bg-sky-100 border border-sky-200 inline-block px-3 py-1 rounded-full">
                                {{ $siswa->kelas ?? 'No Class' }}
                            </p>
                        </div>

                        <div class="mt-auto pt-6 border-t-2 border-dashed border-slate-100">
                            <div class="flex justify-between items-center bg-bg-cream border-2 border-dark-bolt px-4 py-2 rounded-xl mb-5 shadow-[3px_3px_0px_var(--dark-bolt)]">
                                <span class="text-[9px] font-black text-dark-bolt uppercase tracking-widest">Total Karya</span>
                                <span class="text-lg font-black text-dark-bolt">{{ $siswa->karyas_count ?? 0 }}</span>
                            </div>
                            
                            <a href="{{ route('guru.siswa.show', $siswa->id) }}" 
                               class="btn-retro block w-full py-4 text-[10px] tracking-widest">
                                View Profile
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-32 text-center bg-white rounded-[40px] border-4 border-dashed border-slate-200">
                        <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-user-slash text-3xl text-slate-200"></i>
                        </div>
                        <h3 class="text-xl font-black text-slate-300 uppercase tracking-widest">No students found.</h3>
                    </div>
                @endforelse
            </div>

            <footer class="mt-24 pt-10 border-t-2 border-dashed border-slate-200 text-center">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.5em]">SMKN 1 Cimahi • Spektra Curator Panel • Batch 51</p>
            </footer>
        </main>
    </div>
</body>
</html>