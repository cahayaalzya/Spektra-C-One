<x-guest-layout>
    <style>
        :root {
            --sky-blue: #89B4FA;
            --retro-green: #A6E3A1;
            --retro-yellow: #F9E2AF;
            --soft-pink: #F5C2E7;
            --dark-bolt: #111111;
        }

        body { 
            font-family: 'Plus Jakarta Sans', sans-serif;
            /* Background Gradient ala Digicam/Y2K */
            background: linear-gradient(180deg, #6292EE 0%, #FFFFFF 50%, #6292EE 100%);
            min-height: 100vh;
            overflow: hidden;
        }

        /* Ornaments */
        .star-y2k {
            position: absolute;
            width: 45px;
            height: 45px;
            background: var(--dark-bolt);
            z-index: 0;
            clip-path: polygon(50% 0%, 58% 42%, 100% 50%, 58% 58%, 50% 100%, 42% 58%, 0% 50%, 42% 42%);
        }

        /* Retro Login Card */
        .glass-login {
            background: white;
            border: 3px solid var(--dark-bolt);
            border-radius: 40px;
            box-shadow: 12px 12px 0px rgba(0,0,0,0.1);
            position: relative;
            z-index: 10;
        }

        .input-summer {
            background: #f9f9f9;
            border: 2px solid var(--dark-bolt);
            border-radius: 12px;
            padding: 1rem 1.2rem;
            width: 100%;
            font-weight: 700;
            font-size: 13px;
            color: var(--dark-bolt);
            transition: all 0.2s ease;
        }

        .input-summer:focus {
            background: white;
            transform: translate(-2px, -2px);
            box-shadow: 4px 4px 0px var(--dark-bolt);
            outline: none;
            border-color: var(--dark-bolt);
        }

        .btn-login {
            background: var(--dark-bolt);
            color: white;
            padding: 1.1rem;
            border-radius: 12px;
            font-weight: 900;
            font-size: 12px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            transition: 0.2s;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .btn-login:hover {
            background: var(--retro-green);
            color: var(--dark-bolt);
            transform: translate(-3px, -3px);
            box-shadow: 6px 6px 0px var(--dark-bolt);
        }

        .title-retro {
            font-family: 'Pacifico', cursive;
            font-size: 3.5rem;
            background: linear-gradient(180deg, #A6E3A1 0%, #74C179 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(2px 2px 0px var(--dark-bolt));
        }

        .badge-year {
            background: var(--retro-yellow);
            border: 2px solid var(--dark-bolt);
            padding: 4px 15px;
            border-radius: 50px;
            font-weight: 900;
            font-size: 12px;
            display: inline-block;
            margin-bottom: 10px;
        }
    </style>

    <div class="min-h-screen flex items-center justify-center p-6 relative">
        <div class="star-y2k" style="top: 10%; left: 10%;"></div>
        <div class="star-y2k" style="bottom: 15%; right: 10%; transform: scale(0.8);"></div>
        <div style="position: absolute; width: 30px; height: 30px; border: 2px solid var(--dark-bolt); border-radius: 50%; top: 20%; right: 20%;"></div>

        <div class="w-full max-w-5xl flex flex-col lg:flex-row items-center gap-12 relative z-10">
            
            <div class="lg:w-1/2 text-center lg:text-left">
                <div class="badge-year">VERSION 2.0</div>
                <h2 class="title-retro mb-4">Spektra.</h2>
                <h1 class="text-5xl md:text-6xl font-black text-slate-800 leading-[0.9] tracking-tighter mb-6 uppercase">
                    Back to the <br>
                    <span style="color: var(--sky-blue); -webkit-text-stroke: 1.5px var(--dark-bolt);">archives.</span>
                </h1>
                <p class="text-slate-600 font-bold text-sm max-w-xs lg:mx-0 mx-auto leading-relaxed mb-8">
                    Silakan masuk untuk melanjutkan dokumentasi digital Batch 51.
                </p>
                
                <div class="flex items-center gap-4 justify-center lg:justify-start">
                    <div class="h-px w-12 bg-dark-bolt" style="background: var(--dark-bolt)"></div>
                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">Secure Vault Access</span>
                </div>
            </div>

            <div class="lg:w-5/12 w-full">
                <div class="glass-login p-10">
                    
                    @if (session('success'))
                        <div class="mb-6 p-4 rounded-xl border-2 border-dark-bolt" style="background: var(--retro-green);">
                            <div class="flex items-center gap-3">
                                <span class="font-black text-[10px] uppercase">Success: {{ session('success') }}</span>
                            </div>
                        </div>
                    @endif

                    <div class="mb-8">
                        <h3 class="text-xl font-black text-slate-800 uppercase italic tracking-tighter">Login Session.</h3>
                        <div class="h-1.5 w-10 bg-retro-green" style="background: var(--retro-green); border: 1px solid var(--dark-bolt); margin-top: 5px;"></div>
                    </div>

                    <x-auth-session-status class="mb-6 font-bold text-[10px] text-green-600 uppercase tracking-widest" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        <div>
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-1 mb-2 block">Identity (Email)</label>
                            <input type="email" name="email" class="input-summer" placeholder="your@email.com" :value="old('email')" required autofocus>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-[10px] font-bold text-red-500" />
                        </div>

                        <div>
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-1 mb-2 block">Secret Key</label>
                            <input type="password" name="password" class="input-summer" placeholder="••••••••" required>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-[10px] font-bold text-red-500" />
                        </div>

                        <div class="flex items-center justify-between px-1">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="remember" class="w-4 h-4 rounded border-2 border-dark-bolt text-dark-bolt focus:ring-0 transition">
                                <span class="ml-2 text-[10px] font-black uppercase text-slate-500 tracking-widest">Keep me in</span>
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-[10px] font-black uppercase text-slate-400 hover:text-dark-bolt transition tracking-widest underline">Forgot?</a>
                            @endif
                        </div>

                        <button type="submit" class="btn-login">
                            AUTHENTICATE →
                        </button>

                        <div class="pt-6 text-center border-t-2 border-dashed border-slate-200">
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                New Member? <a href="{{ route('register') }}" class="text-dark-bolt hover:text-sky-blue transition-colors font-black underline">Join Batch 51</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>