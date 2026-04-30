<nav class="bg-sky-blue border-b-4 border-dark-bolt py-4 px-6 md:px-12 flex items-center justify-between sticky top-0 z-[100] shadow-[0_4px_0_rgba(0,0,0,0.1)]">
    <div class="absolute inset-0 opacity-[0.08] pointer-events-none z-[-1]" 
         style="background-image: url('data:image/svg+xml,%3Csvg viewBox=\'0 0 200 200\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cfilter id=\'noiseFilter\'%3E%3CfeTurbulence type=\'fractalNoise' baseFrequency=\'0.65\' numOctaves=\'3\' stitchTiles=\'stitch\'/%3E%3C/filter%3E%3Crect width=\'100%25\' height=\'100%25\' filter=\'url(%23noiseFilter)\'/%3E%3C/svg%3E');">
    </div>

    <div class="flex items-center gap-4">
        <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center transition-all hover:-rotate-12 border-2 border-dark-bolt shadow-[4px_4px_0px_var(--dark-bolt)]">
            <span class="text-dark-bolt font-black text-xl">C</span>
        </div>
        <span class="text-xl font-black italic uppercase tracking-tighter text-dark-bolt hidden sm:block">
            Spektra <span class="text-white" style="-webkit-text-stroke: 1px var(--dark-bolt);">C One.</span>
        </span>
    </div>

    <div class="hidden md:flex items-center gap-2 bg-white border-2 border-dark-bolt p-1.5 rounded-2xl shadow-[5px_5px_0px_var(--dark-bolt)]">
        <a href="{{ route('siswa.dashboard') }}" 
           class="px-6 py-2 text-[10px] font-black uppercase tracking-widest transition-all rounded-xl {{ request()->routeIs('siswa.dashboard') ? 'bg-capsule-pink text-dark-bolt border-2 border-dark-bolt shadow-[2px_2px_0px_var(--dark-bolt)]' : 'text-dark-bolt hover:bg-sky-blue/20' }}">
            Main
        </a>
        <a href="{{ route('siswa.berita') }}" 
           class="px-6 py-2 text-[10px] font-black uppercase tracking-widest transition-all rounded-xl {{ request()->routeIs('siswa.berita') ? 'bg-capsule-pink text-dark-bolt border-2 border-dark-bolt shadow-[2px_2px_0px_var(--dark-bolt)]' : 'text-dark-bolt hover:bg-sky-blue/20' }}">
            News
        </a>
        <a href="{{ route('siswa.karyaku') }}" 
           class="px-6 py-2 text-[10px] font-black uppercase tracking-widest transition-all rounded-xl {{ request()->routeIs('siswa.karyaku') ? 'bg-capsule-pink text-dark-bolt border-2 border-dark-bolt shadow-[2px_2px_0px_var(--dark-bolt)]' : 'text-dark-bolt hover:bg-sky-blue/20' }}">
            Archive
        </a>
    </div>

    <div class="flex items-center gap-5">
        <a href="{{ route('siswa.create') }}" 
           class="hidden lg:flex px-6 py-3 bg-white text-dark-bolt text-[10px] font-black uppercase tracking-widest rounded-xl border-2 border-dark-bolt shadow-[4px_4px_0px_var(--dark-bolt)] hover:bg-retro-green transition-all active:translate-y-1 active:shadow-none">
            + Add Work
        </a>

        <div class="flex items-center gap-4 pl-4 border-l-2 border-dark-bolt/10">
            <div class="text-right hidden xl:block">
                <p class="text-[10px] font-black text-dark-bolt uppercase leading-none">{{ Auth::user()->name }}</p>
                <p class="text-[8px] font-black text-white bg-dark-bolt px-2 py-0.5 rounded mt-1 uppercase tracking-tighter">Batch 51</p>
            </div>
            
            <div class="relative group">
                <div class="w-12 h-12 bg-retro-yellow rounded-2xl border-2 border-dark-bolt flex items-center justify-center shadow-[4px_4px_0px_var(--dark-bolt)] group-hover:bg-capsule-pink transition-colors cursor-pointer">
                    <span class="text-dark-bolt font-black text-sm uppercase">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </span>
                </div>

                <form method="POST" action="{{ route('logout') }}" class="absolute -bottom-2 -right-2">
                    @csrf
                    <button type="submit" class="w-7 h-7 bg-white border-2 border-dark-bolt rounded-full flex items-center justify-center hover:bg-red-400 transition-all shadow-[2px_2px_0px_var(--dark-bolt)] hover:scale-110">
                        <svg class="w-3.5 h-3.5 text-dark-bolt" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                            <path d="M17 16l4-4m0 0l-4-4m4 4H7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>