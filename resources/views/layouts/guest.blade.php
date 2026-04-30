<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Spektra - Mading Digital</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            /* Base Style buat seluruh aplikasi Spektra */
            body {
                background-color: #FFF8EC; /* Warna Cream Dasar */
                font-family: 'Plus Jakarta Sans', sans-serif;
                color: #334155;
                margin: 0;
                padding: 0;
            }

            /* Efek Grid Kertas Mading di Seluruh Halaman */
            .mading-bg-overlay {
                fixed: top 0 left 0;
                width: 100%;
                height: 100%;
                background-image: radial-gradient(#FDC3A1 0.5px, transparent 0.5px);
                background-size: 24px 24px;
                z-index: -1;
                position: fixed;
            }

            /* Custom Scrollbar biar nggak kaku */
            ::-webkit-scrollbar { width: 10px; }
            ::-webkit-scrollbar-track { background: #FFF8EC; }
            ::-webkit-scrollbar-thumb { 
                background: #FDC3A1; 
                border: 3px solid #FFF8EC;
                border-radius: 10px;
            }
        </style>

        @stack('styles')
    </head>
    <body class="antialiased">
        <div class="mading-bg-overlay"></div>

        <div class="min-h-screen relative z-10">
            {{ $slot }}
        </div>

        @stack('scripts')
    </body>
</html>