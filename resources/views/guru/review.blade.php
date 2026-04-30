<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spektra Curator - Review Karya</title>
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

        /* Review Card Style */
        .review-card {
            background: white;
            border-radius: 32px;
            border: 3px solid var(--dark-bolt);
            overflow: hidden;
            box-shadow: 12px 12px 0px rgba(0,0,0,0.05);
            transition: 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .review-card:hover {
            transform: translate(-4px, -4px);
            box-shadow: 16px 16px 0px var(--dark-bolt);
        }

        /* Custom Button */
        .btn-retro {
            border: 2px solid var(--dark-bolt);
            border-radius: 14px;
            font-weight: 900;
            text-transform: uppercase;
            transition: 0.2s;
            cursor: pointer;
        }

        .btn-approve { background: var(--retro-green); color: var(--dark-bolt); }
        .btn-approve:hover { transform: translate(-3px, -3px); box-shadow: 6px 6px 0px var(--dark-bolt); }
        
        .btn-reject { background: #fff; color: var(--dark-bolt); }
        .btn-reject:hover { background: var(--color-rose); transform: translate(-3px, -3px); box-shadow: 6px 6px 0px var(--dark-bolt); }

        .title-pacific { font-family: 'Pacifico', cursive; }
        .title-serif { font-family: 'Instrument Serif', serif; font-style: italic; }
        
        .badge-category {
            background: var(--retro-yellow);
            border: 2px solid var(--dark-bolt);
            box-shadow: 3px 3px 0px var(--dark-bolt);
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
                <a href="{{ route('guru.dashboard') }}" class="nav-link-guru {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-th-large mr-3 text-lg"></i> Dashboard
                </a>
                <a href="{{ route('guru.review') }}" class="nav-link-guru {{ request()->routeIs('guru.review') ? 'active' : '' }}">
                    <i class="fas fa-check-circle mr-3 text-lg"></i> Review Karya 
                    @if(isset($pending_count) && $pending_count > 0) 
                        <span class="ml-auto bg-red-500 text-white px-2 py-1 rounded-lg border-2 border-dark-bolt text-[10px]">{{ $pending_count }}</span> 
                    @endif
                </a>
                <a href="{{ route('guru.siswa') }}" class="nav-link-guru {{ request()->routeIs('guru.siswa') ? 'active' : '' }}">
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
                    Review <span class="title-serif normal-case text-sky-blue" style="color: var(--sky-blue)">Karya Siswa.</span>
                </h1>
                <p class="text-slate-500 text-[11px] font-black uppercase tracking-[0.5em] mt-3">Curator Approval Queue</p>
            </header>

            <div class="grid grid-cols-1 gap-12">
                @forelse($karyas as $karya)
                    <div class="review-card flex flex-col lg:flex-row">
                        <div class="w-full lg:w-[450px] min-h-[350px] relative overflow-hidden bg-slate-100 border-b-4 lg:border-b-0 lg:border-r-4 border-dark-bolt">
                            <img src="{{ asset('storage/'.$karya->foto) }}" class="w-full h-full object-cover">
                            <div class="absolute top-6 left-6">
                                <span class="badge-category text-[10px] font-black px-5 py-2 rounded-full uppercase">{{ $karya->kategori }}</span>
                            </div>
                        </div>

                        <div class="flex-1 p-10 flex flex-col">
                            <div class="mb-8">
                                <div class="flex items-center gap-2 mb-3">
                                    <div class="w-2 h-2 rounded-full bg-retro-green border border-dark-bolt"></div>
                                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Submission by: {{ $karya->user->name }}</span>
                                </div>
                                <h2 class="text-5xl font-black text-dark-bolt uppercase tracking-tighter leading-none">{{ $karya->judul }}</h2>
                            </div>
                            
                            <div class="bg-slate-50 p-7 rounded-[24px] mb-10 border-2 border-dashed border-slate-200">
                                <p class="text-sm text-slate-600 leading-relaxed font-medium">"{{ $karya->deskripsi }}"</p>
                            </div>

                            <div class="mt-auto flex flex-wrap gap-5">
                                <form action="{{ route('guru.updateStatus', $karya->id) }}" method="POST" class="flex-1">
                                    @csrf
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="btn-retro btn-approve w-full py-5 text-[11px] tracking-widest flex items-center justify-center gap-3">
                                        <i class="fas fa-check-circle text-base"></i> APPROVE THIS WORK
                                    </button>
                                </form>
                                
                                <form action="{{ route('guru.updateStatus', $karya->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="btn-retro btn-reject px-10 py-5 text-[11px] tracking-widest flex items-center justify-center gap-3">
                                        <i class="fas fa-times-circle text-base"></i> REJECT
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="py-32 text-center bg-white rounded-[40px] border-4 border-dashed border-slate-200">
                        <div class="w-24 h-24 bg-retro-yellow border-2 border-dark-bolt rounded-full flex items-center justify-center mx-auto mb-8 shadow-[6px_6px_0px_var(--dark-bolt)]">
                            <i class="fas fa-wind text-3xl text-dark-bolt"></i>
                        </div>
                        <h3 class="text-2xl font-black text-dark-bolt uppercase tracking-widest">Nothing to curate!</h3>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.4em] mt-3">Take a break, you've cleared the queue.</p>
                    </div>
                @endforelse
            </div>

            <footer class="mt-24 border-t-2 border-dashed border-slate-200 pt-10 text-center">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.5em]">System Status: All systems operational • Batch 51</p>
            </footer>
        </main>
    </div>
</body>
</html>