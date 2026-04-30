<x-app-layout>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&family=Space+Grotesk:wght@700&family=Pacifico&display=swap" rel="stylesheet">

    <style>
        :root {
            --sky-blue: #89B4FA; 
            --retro-green: #A6E3A1; 
            --retro-yellow: #F9E2AF; 
            --capsule-pink: #F5C2E7; 
            --dark-bolt: #111111; 
            --bg-cream: #FAF9F6;
        }

        /* GRAIN EFFECT */
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            opacity: 0.05;
            z-index: 9999;
            pointer-events: none;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-cream);
            background-image: radial-gradient(var(--sky-blue) 0.5px, transparent 0.5px);
            background-size: 30px 30px;
            color: var(--dark-bolt);
        }

        /* CARD STYLE NEUBRUTALISM */
        .form-card {
            background: white;
            border-radius: 40px;
            padding: 50px;
            border: 3px solid var(--dark-bolt);
            box-shadow: 15px 15px 0px var(--dark-bolt);
        }

        /* INPUT STYLE */
        .input-field {
            width: 100%;
            background: white;
            border: 3px solid var(--dark-bolt);
            border-radius: 20px;
            padding: 18px 25px;
            font-weight: 800;
            font-size: 14px;
            transition: all 0.2s ease;
            outline: none;
        }

        .input-field:focus {
            transform: translate(-2px, -2px);
            box-shadow: 6px 6px 0px var(--sky-blue);
        }

        .label-text {
            display: block;
            font-size: 10px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 12px;
            color: var(--dark-bolt);
            opacity: 0.6;
        }

        /* CUSTOM SUBMIT BUTTON */
        .btn-submit {
            background: var(--dark-bolt);
            color: white;
            width: 100%;
            padding: 22px;
            border-radius: 20px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 4px;
            font-size: 14px;
            border: 3px solid var(--dark-bolt);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
        }

        .btn-submit:hover {
            background: var(--retro-green);
            color: var(--dark-bolt);
            transform: translate(-5px, -5px);
            box-shadow: 10px 10px 0px var(--dark-bolt);
        }

        .title-pacific { font-family: 'Pacifico', cursive; }

        /* STAR DECORATION */
        .star-sparkle {
            position: absolute;
            background: var(--dark-bolt);
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
        }
    </style>

    <div class="max-w-2xl mx-auto py-20 px-6 relative">
        <div class="star-sparkle" style="width: 30px; height: 30px; top: 5%; right: 0; background: var(--retro-yellow);"></div>
        <div class="star-sparkle" style="width: 20px; height: 20px; top: 15%; left: -20px; background: var(--capsule-pink);"></div>

        <div class="text-center mb-16">
            <h1 class="text-6xl font-black uppercase tracking-tighter" style="font-family: 'Space Grotesk', sans-serif;">
                ADD <span class="title-pacific lowercase text-5xl" style="color: var(--sky-blue)">Work.</span>
            </h1>
            <div class="inline-block mt-4 px-6 py-1 bg-retro-green border-2 border-dark-bolt rounded-full">
                <p class="text-[9px] font-black uppercase tracking-[0.3em]">Vault Generation 51</p>
            </div>
        </div>

        <div class="form-card">
            <form action="{{ route('siswa.storeKarya') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                @csrf
                
                <div>
                    <label class="label-text">Creative Title</label>
                    <input type="text" name="judul" value="{{ old('judul') }}" 
                           class="input-field @error('judul') border-red-500 @enderror" 
                           placeholder="Nama karyamu..." required>
                    @error('judul') <p class="text-red-500 text-[10px] mt-3 font-black uppercase px-2">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="label-text">Select Category</label>
                    <div class="relative">
                        <select name="kategori" class="input-field cursor-pointer appearance-none @error('kategori') border-red-500 @enderror" required>
                            <option value="" disabled selected>PILIH SEKTOR</option>
                            @foreach($kategoris as $k)
                                <option value="{{ $k->nama_kategori }}" {{ old('kategori') == $k->nama_kategori ? 'selected' : '' }}>
                                    {{ $k->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                    @error('kategori') <p class="text-red-500 text-[10px] mt-3 font-black uppercase px-2">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="label-text">Upload Visual (JPG/PNG)</label>
                    <input type="file" name="foto" 
                           class="input-field file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:bg-dark-bolt file:text-white @error('foto') border-red-500 @enderror" required>
                    @error('foto') <p class="text-red-500 text-[10px] mt-3 font-black uppercase px-2">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="label-text">Project Description</label>
                    <textarea name="deskripsi" rows="4" 
                              class="input-field @error('deskripsi') border-red-500 @enderror" 
                              placeholder="Ceritain sedikit proses kreatifnya..." required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <p class="text-red-500 text-[10px] mt-3 font-black uppercase px-2">{{ $message }}</p> @enderror
                </div>

                <div class="pt-4">
                    <button type="submit" class="btn-submit">
                        Upload to Archive →
                    </button>
                </div>
            </form>
        </div>

        <div class="text-center mt-16">
            <p class="text-[9px] font-black opacity-30 uppercase tracking-[0.8em]">
                Spektra System • 2026
            </p>
        </div>
    </div>
</x-app-layout>