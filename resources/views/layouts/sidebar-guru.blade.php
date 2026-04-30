<nav class="flex-1 px-4 space-y-2 mt-4">
    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4 ml-4 italic">Management</p>

    <a href="{{ route('guru.dashboard') }}" 
       class="nav-link-guru {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
       <i class="fas fa-grid-2 mr-3 text-lg"></i>
       <span>Dashboard</span>
    </a>

    <a href="{{ route('guru.review') }}" 
       class="nav-link-guru {{ request()->routeIs('guru.review') ? 'active' : '' }}">
       <i class="fas fa- check-circle mr-3 text-lg"></i>
       <span>Review Karya</span>
       @if($pending_count > 0)
           <span class="ml-auto bg-rose-500 text-[10px] text-white px-2 py-0.5 rounded-full border border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">
               {{ $pending_count }}
           </span>
       @endif
    </a>

    <a href="{{ route('guru.siswa') }}" 
       class="nav-link-guru {{ request()->routeIs('guru.siswa') ? 'active' : '' }}">
       <i class="fas fa-users mr-3 text-lg"></i>
       <span>Data Siswa</span>
    </a>

    <a href="{{ route('guru.pesan') }}" 
       class="nav-link-guru {{ request()->routeIs('guru.pesan') ? 'active' : '' }}">
       <i class="fas fa-envelope mr-3 text-lg"></i>
       <span>Pesan Siswa</span>
       @if(isset($pesan_count) && $pesan_count > 0)
           <span class="ml-auto bg-blue-500 text-[10px] text-white px-2 py-0.5 rounded-full border border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">
               {{ $pesan_count }}
           </span>
       @endif
    </a>
</nav>