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

        /* BENTO TABLE STYLE */
        .table-container {
            background: rgba(255, 255, 255, 0.95) !important;
            border: 2px solid #EEE6D8 !important;
            border-radius: 32px !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
            overflow: hidden;
        }

        .btn-action {
            font-[900] text-[9px] uppercase tracking-widest px-4 py-2 rounded-xl transition-all;
        }

        .title-serif {
            font-family: 'Instrument Serif', serif;
            font-style: italic;
        }
    </style>

    <div class="min-h-screen flex relative">
        
        <aside class="w-72 sidebar-guru hidden lg:flex flex-col p-8 h-screen sticky top-0 z-50">
            <div class="mb-12 px-2">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-slate-800 rounded-2xl flex items-center justify-center shadow-xl">
                        <span class="text-white font-black text-2xl">S</span>
                    </div>
                    <div>
                        <h1 class="text-2xl font-black text-slate-800 tracking-tighter uppercase leading-none">Spektra<span class="text-peach-500">.</span></h1>
                        <p class="text-[8px] font-black text-slate-400 uppercase tracking-[0.3em] mt-1">Curator Panel v2.0</p>
                    </div>
                </div>
            </div>
            
            <nav class="flex-1">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-6 ml-2">Management</p>
                <a href="{{ route('guru.dashboard') }}" class="nav-link-guru group {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
                    <span class="mr-3 uppercase opacity-40 text-[10px]">01</span> Dashboard
                </a>
                <a href="{{ route('guru.review') }}" class="nav-link-guru group {{ request()->route