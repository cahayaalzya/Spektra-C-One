<x-app-layout>
    <style>
        :root {
            --color-cream: #FFF8EC;
            --color-peach: #FDC3A1;
            --color-slate: #334155;
            --color-coral: #E36A6A;
        }

        /* Base & Background */
        body {
            background-color: var(--color-cream) !important;
            background-image: url("https://www.transparenttextures.com/patterns/p6-polka.png") !important;
            font-family: 'Plus Jakarta Sans', sans-serif !important;
        }

        /* SIDEBAR STYLE (Identik) */
        .sidebar-guru {
            background: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(12px);
            border-right: 2px solid rgba(253, 195, 161, 0.3) !important;
            box-shadow: 10px 0 30px rgba(51, 65, 85, 0.05);
        }

        .nav-link-guru {
            display: flex;
            align-items: center;
            padding: 0.9rem 1.2rem;
            border-radius: 16px;
            font-weight: 800;
            font-size: 13px;
            color: var(--color-slate);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin-bottom: 8px;
            border: 1px solid transparent;
        }

        .nav-link-guru.active {
            background: var(--color-slate) !important;
            color: white !important;
            box-shadow: 0 10px 20px -5px rgba(51, 65, 85, 0.3);
        }

        /* CATEGORY CARD STYLE */
        .category-container {
            background: rgba(255, 255, 255, 0.95) !important;
            border: 2px solid #EEE6D8 !important;
            border-radius: 32px !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
        }

        .category-item {
            background: white;
            border: 2px solid #F1F5F9;
            border-radius: 20px;
            padding: 1.2rem 1.5rem;
            transition: all 0.3s ease;
        }

        .category-item:hover {
            border-color: var(--color-peach);
            transform: translateX(8px);
            background: #FDFCF8;
        }

        .btn-add-category {
            background: var(--color-slate);
            color: white;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .btn-add-category:hover {
            background: #1A202C;
            transform: scale(1.05) rotate(-1deg);
        }

        .title-serif {
            font-family: 'Instrument Serif', serif;
            font-style: italic;
        }
    </style>

    <div class="min-h-screen flex relative">
        
        <aside class="w-72 sidebar-guru hidden lg:flex flex-col p-8 h-screen sticky top-0 z-50">
            <div class="mb-12 px-2 group cursor-pointer">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-slate-800 rounded-2xl flex items-center justify-center shadow-xl group-hover:rotate-12 transition-all duration-500">
                        <span class="text-white font-black text-2xl">S</span>
                    </div>
                    <div>
                        <h1 class="text-2xl font-black text-slate-800 tracking-tighter uppercase leading-none">
                            Spektra<span class="text-peach-500">.</span>
                        </h1>
                        <p class="text-[8px] font-black text-slate-400 uppercase tracking-[0.3em] mt-1 text-nowrap">Curator Panel v2.0</p>
                    </div>
                </div>
            </div>
            
            <nav class="flex-1">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-6 ml-2">Management</p>
                <a href="{{ route('guru.dashboard') }}" class="nav-link-guru group {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
                    <span class="mr-3 uppercase opacity-40 text-[10px]">01</span> Dashboard
                </a>
                <a href="{{ route('guru.review') }}" class="nav-link-guru group {{ request()->routeIs('guru.review') ? 'active' : '' }}">
                    <span class="mr-3 uppercase opacity-40 text-[10px]">02</span> Review Karya
                </a>
                <a href="{{ route('guru.pesan') }}" class="nav-link-guru group {{ request()->routeIs('guru.pesan') ? 'active' : '' }}">
                    <span class="mr-3 uppercase opacity-40 text-[10px]">03</span> Kotak Pesan
                </a>
                <a href="#" class="nav-link-guru group">
                    <span class="mr-3 uppercase opacity-40 text-[10px]">04</span> Database Siswa
                </a>
                <a href="#" class="nav-link-guru active group">
                    <span class="mr-3 uppercase opacity-40 text-[10px]">05</span> Kelola Kategori
                </a>
            </nav>

            <div class="mt-auto pt-6 border-t border-slate-100">
                <div class="bg-slate-800 rounded-3xl p-6 shadow-2xl relative overflow-hidden group">
                    <div class="flex items-center gap-4 relative z-10">
                        <div class="w-12 h-12 bg-peach-400 rounded-2xl flex items-center justify-center font-black text-slate-800 border-2 border-white/20">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-[13px] font-bold text-white truncate">{{ Auth::user()->name }}</p>
                            <p class="text-[10px] text-white/40 uppercase font-black tracking-widest text-nowrap">Administrator</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="mt-6">
                        @csrf
                        <button class="w-full bg-white/10 hover:bg-white text-white hover:text-slate-800 text-[10px] font-black py-3 rounded-xl transition-all duration-300 uppercase tracking-widest">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <main class="flex-1 p-12">
            <header class="mb-16 flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <div class="px-3 py-1 bg-peach-100 rounded-full text-[9px] font-black uppercase text-peach-600 tracking-widest w-fit mb-2">Content Taxonomy</div>
                    <h1 class="text-5xl font-black text-slate-800 uppercase tracking-tighter leading-none">
                        Kelola <span class="title-serif normal-case text-slate-400">Kategori</span>
                    </h1>
                </div>
                <button class="btn-add-category px-8 py-4 rounded-2xl font-black text-[11px] uppercase tracking-widest shadow-xl">
                    + Kategori Baru
                </button>
            </header>

            <div class="max-w-3xl">
                <div class="category-container overflow-hidden">
                    <div class="p-8 space-y-4">
                        <div class="category-item flex justify-between items-center group">
                            <div class="flex items-center gap-4">
                                <div class="w-2 h-2 bg-peach-400 rounded-full"></div>
                                <span class="font-black text-slate-800 uppercase tracking-tight">Prestasi</span>
                            </div>
                            <button class="text-[10px] font-black text-red-400 uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-opacity hover:text-red-600">
                                Remove
                            </button>
                        </div>

                        <div class="category-item flex justify-between items-center group">
                            <div class="flex items-center gap-4">
                                <div class="w-2 h-2 bg-peach-400 rounded-full"></div>
                                <span class="font-black text-slate-800 uppercase tracking-tight">Fotografi</span>
                            </div>
                            <button class="text-[10px] font-black text-red-400 uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-opacity hover:text-red-600">
                                Remove
                            </button>
                        </div>

                        <div class="category-item flex justify-between items-center group">
                            <div class="flex items-center gap-4">
                                <div class="w-2 h-2 bg-peach-400 rounded-full"></div>
                                <span class="font-black text-slate-800 uppercase tracking-tight">Literasi</span>
                            </div>
                            <button class="text-[10px] font-black text-red-400 uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-opacity hover:text-red-600">
                                Remove
                            </button>
                        </div>
                    </div>
                </div>

                <div class="mt-8 p-6 bg-slate-800 rounded-[2rem] flex items-center justify-between">
                    <p class="text-[10px] font-black text-white/50 uppercase tracking-[0.2em] ml-2">Total Kategori Aktif</p>
                    <span class="text-white font-black text-2xl mr-2">03</span>
                </div>
            </div>

            <footer class="mt-20 opacity-30 text-center">
                <p class="text-[9px] font-black text-slate-800 uppercase tracking-[0.6em]">SMKN 1 Cimahi • Spektra Curator Panel</p>
            </footer>
        </main>
    </div>
</x-app-layout>