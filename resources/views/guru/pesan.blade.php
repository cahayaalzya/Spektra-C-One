<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spektra Curator - Reports & Inbox</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@1&display=swap" rel="stylesheet">

    <style>
        :root {
            --color-cream: #FFF8EC;
            --color-peach: #FDC3A1;
            --color-slate: #334155;
        }

        body {
            background-color: var(--color-cream) !important;
            background-image: url("https://www.transparenttextures.com/patterns/p6-polka.png") !important;
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            margin: 0;
            padding: 0;
        }

        /* SIDEBAR STYLE KONSISTEN */
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

        .nav-link-guru:not(.active):hover {
            background: white;
            border-color: var(--color-peach);
            transform: translateX(5px);
        }

        .message-card {
            background: white !important;
            border-radius: 32px !important;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .title-serif {
            font-family: 'Instrument Serif', serif;
            font-style: italic;
        }
    </style>
</head>
<body class="antialiased">

    <div class="min-h-screen flex relative">
        
        <aside class="w-72 sidebar-guru hidden lg:flex flex-col p-8 h-screen sticky top-0 z-50">
            <div class="mb-12 px-2 group cursor-pointer">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-slate-800 rounded-2xl flex items-center justify-center shadow-xl group-hover:rotate-12 transition-all duration-500">
                        <span class="text-white font-black text-2xl">S</span>
                    </div>
                    <div>
                        <h1 class="text-2xl font-black text-slate-800 tracking-tighter uppercase leading-none">Spektra.</h1>
                        <p class="text-[8px] font-black text-slate-400 uppercase tracking-[0.3em] mt-1">Curator Panel</p>
                    </div>
                </div>
            </div>
            
            <nav class="flex-1">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-6 ml-2 italic">Management</p>
                
                <a href="{{ route('guru.dashboard') }}" class="nav-link-guru group {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
                    <span class="mr-3 uppercase opacity-40 text-[10px]">01</span> Dashboard
                </a>

                <a href="{{ route('guru.review') }}" class="nav-link-guru group {{ request()->routeIs('guru.review') ? 'active' : '' }}">
                    <span class="mr-3 uppercase opacity-40 text-[10px]">02</span> Review Karya
                </a>

                <a href="{{ route('guru.siswa') }}" class="nav-link-guru group {{ request()->routeIs('guru.siswa') ? 'active' : '' }}">
                    <span class="mr-3 uppercase opacity-40 text-[10px]">03</span> Database Siswa
                </a>

                <a href="{{ route('guru.pesan') }}" class="nav-link-guru active group">
                    <span class="mr-3 uppercase opacity-40 text-[10px]">04</span> Kotak Pesan
                </a>
            </nav>

            <div class="mt-auto pt-6 border-t border-slate-100">
                <div class="bg-slate-800 rounded-3xl p-6 shadow-2xl relative overflow-hidden group">
                    <div class="flex items-center gap-4 relative z-10">
                        <div class="w-12 h-12 bg-orange-300 rounded-2xl flex items-center justify-center font-black text-slate-800 border-2 border-white/20 uppercase">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-[13px] font-bold text-white truncate">{{ Auth::user()->name }}</p>
                            <p class="text-[10px] text-white/40 uppercase font-black tracking-widest text-nowrap">Administrator</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="mt-6">
                        @csrf
                        <button type="submit" class="w-full bg-white/10 hover:bg-white text-white hover:text-slate-800 text-[10px] font-black py-3 rounded-xl transition-all duration-300 uppercase tracking-widest">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <main class="flex-1 p-12 bg-[#FDFCF8]">
            <header class="mb-12">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Reports & Inbox</p>
                <h1 class="text-6xl font-black text-slate-800 tracking-tighter uppercase leading-none">
                    Laporan <span class="title-serif text-slate-400 normal-case">dan Pesan</span>
                </h1>
                <p class="text-sm text-slate-500 font-bold opacity-70 uppercase tracking-tight mt-4">Pantau interaksi dan keamanan konten Spektra</p>
            </header>

            <div class="space-y-6">
                @forelse($semua_pesan as $psn)
                    <div class="message-card relative p-8 border-2 {{ $psn->tipe == 'report' ? 'border-red-100' : 'border-[#EEE6D8]' }} shadow-sm flex items-center justify-between group">
                        <div class="flex items-center gap-8">
                            <div class="w-16 h-16 rounded-full flex items-center justify-center {{ $psn->tipe == 'report' ? 'bg-red-50 text-red-400' : 'bg-slate-50 text-slate-300' }} border-2 border-white shadow-inner font-black text-2xl">
                                {{ $psn->tipe == 'report' ? '!' : 'o' }}
                            </div>
                            <div>
                                <div class="flex items-center gap-3 mb-1">
                                    <span class="px-3 py-0.5 {{ $psn->tipe == 'report' ? 'bg-red-100 text-red-500' : 'bg-slate-100 text-slate-500' }} rounded-full text-[8px] font-black uppercase tracking-widest">
                                        {{ $psn->tipe == 'report' ? 'Urgent Report' : 'Inbox' }}
                                    </span>
                                    <span class="text-[9px] font-bold text-slate-300 uppercase tracking-widest">{{ $psn->created_at->format('d F Y') }}</span>
                                </div>
                                <h3 class="text-xl font-black text-slate-800 uppercase tracking-tight">{{ $psn->judul }}</h3>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wide">
                                    Oleh: <span class="text-slate-600">{{ $psn->pengirim }}</span> | {{ $psn->sub_info }}
                                </p>
                            </div>
                        </div>
                        <button onclick="showDetailPesan('{{ $psn->judul }}', '{{ $psn->pengirim }}', '{{ addslashes($psn->isi_pesan) }}')" 
                                class="{{ $psn->tipe == 'report' ? 'bg-slate-800 text-white' : 'bg-white border-2 border-slate-100 text-slate-400 hover:text-slate-800 hover:border-slate-800' }} px-8 py-3 rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] transition-all">
                            {{ $psn->tipe == 'report' ? 'Tindak Lanjut' : 'Baca Detail' }}
                        </button>
                    </div>
                @empty
                    <div class="py-32 text-center opacity-30">
                        <h3 class="font-black text-slate-800 uppercase tracking-tighter">Tidak ada pesan</h3>
                    </div>
                @endforelse
            </div>
        </main>
    </div>

    <div id="modalPesan" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[100] hidden flex items-center justify-center p-6">
        <div class="bg-white w-full max-w-lg rounded-[40px] p-10 border-2 border-[#EEE6D8]">
            <p id="modalPengirim" class="text-[10px] font-black text-orange-400 uppercase tracking-widest mb-2"></p>
            <h2 id="modalJudul" class="text-3xl font-black text-slate-800 uppercase tracking-tighter mb-6"></h2>
            <div class="bg-[#FDFCF8] p-6 rounded-3xl border border-[#EEE6D8] mb-8">
                <p id="modalIsi" class="text-slate-600 font-medium leading-relaxed"></p>
            </div>
            <button onclick="closeModal()" class="w-full py-4 bg-slate-800 text-white rounded-2xl font-black uppercase tracking-widest text-[10px]">Tutup</button>
        </div>
    </div>

    <script>
        function showDetailPesan(judul, pengirim, isi) {
            document.getElementById('modalJudul').innerText = judul;
            document.getElementById('modalPengirim').innerText = 'Dari: ' + pengirim;
            document.getElementById('modalIsi').innerText = isi;
            document.getElementById('modalPesan').classList.remove('hidden');
        }
        function closeModal() { document.getElementById('modalPesan').classList.add('hidden'); }
    </script>
</body>
</html>