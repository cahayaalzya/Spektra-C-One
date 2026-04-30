<x-app-layout>
    <x-slot name="header"></x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap');

        /* Paksa root dan body agar warnanya berubah */
        :root {
            --color-cream: #F9F9F7 !important;
        }

        /* Kita hajar langsung class pembungkusnya */
        .mading-universe-full {
            background-color: #F9F9F7 !important;
            min-height: 100vh !important;
            width: 100% !important;
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            margin: 0 !important;
            padding: 40px 0 !important;
            position: relative;
            z-index: 1;
        }

        .serif { font-family: 'Instrument Serif', serif !important; }

        .custom-card {
            background: white !important;
            border: 1px solid #E2E8F0 !important;
            border-radius: 24px !important;
            padding: 2rem !important;
            transition: all 0.3s ease;
        }

        .custom-card:hover {
            border-color: #1A1A1A !important;
            transform: translateY(-4px);
        }

        .btn-hitam {
            background: #1A1A1A !important;
            color: white !important;
            padding: 10px 20px !important;
            border-radius: 12px !important;
            font-weight: 800 !important;
            text-transform: uppercase !important;
            font-size: 11px !important;
        }
    </style>

    <div class="mading-universe-full">
        <div class="max-w-7xl mx-auto px-6">
            
            <div class="flex justify-between items-end mb-12">
                <div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Workspace</p>
                    <h1 class="text-4xl font-extrabold tracking-tighter">Spektra<span class="text-red-500">.</span>Center</h1>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-hitam">Sign Out</button>
                </form>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <div class="lg:col-span-4">
                    <div class="custom-card">
                        <h3 class="text-3xl font-bold leading-tight mb-4">
                            Halo, <br>
                            <span class="serif italic text-red-500 lowercase">{{ Auth::user()->name }}</span>
                        </h3>
                        <p class="text-sm text-slate-500 mb-8">Siap buat karya keren lagi hari ini di Spektra?</p>
                        
                        <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 mb-6">
                            <p class="text-[10px] font-black uppercase mb-2">Progress Project</p>
                            <div class="w-full h-1.5 bg-slate-200 rounded-full overflow-hidden">
                                <div class="h-full bg-black" style="width: 88%"></div>
                            </div>
                        </div>

                        <button class="w-full py-4 bg-red-500 text-white rounded-2xl font-bold uppercase text-xs tracking-widest hover:bg-red-600 transition">
                            + Tambah Karya
                        </button>
                    </div>
                </div>

                <div class="lg:col-span-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="custom-card group cursor-pointer">
                            <div class="aspect-video bg-slate-100 rounded-xl mb-4 overflow-hidden flex items-center justify-center">
                                <span class="serif italic text-slate-400">Preview Project</span>
                            </div>
                            <h4 class="font-bold text-xl">Project UI/UX 2026</h4>
                            <p class="text-xs text-slate-400 uppercase font-black mt-1">Cahaya Alzya • 11 RPL</p>
                        </div>

                        <div class="custom-card group cursor-pointer">
                            <div class="aspect-video bg-slate-100 rounded-xl mb-4 overflow-hidden flex items-center justify-center">
                                <span class="serif italic text-slate-400">Preview Project</span>
                            </div>
                            <h4 class="font-bold text-xl">Dokumentasi Forpec</h4>
                            <p class="text-xs text-slate-400 uppercase font-black mt-1">PDD Team • SMK 1</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>