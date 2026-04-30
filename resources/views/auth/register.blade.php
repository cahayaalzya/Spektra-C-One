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
            /* Gradient Background konsisten dengan Landing Page */
            background: linear-gradient(180deg, #6292EE 0%, #FFFFFF 50%, #6292EE 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Y2K Ornaments */
        .star-y2k {
            position: absolute;
            width: 40px;
            height: 40px;
            background: var(--dark-bolt);
            z-index: 0;
            clip-path: polygon(50% 0%, 58% 42%, 100% 50%, 58% 58%, 50% 100%, 42% 58%, 0% 50%, 42% 42%);
        }

        /* Neubrutalism Card */
        .premium-card {
            background: white;
            border: 3px solid var(--dark-bolt);
            border-radius: 40px;
            box-shadow: 12px 12px 0px rgba(0,0,0,0.1);
            position: relative;
            z-index: 10;
        }

        /* Input Styling */
        .input-field {
            background: #f9f9f9;
            border: 2px solid var(--dark-bolt);
            border-radius: 12px;
            padding: 0.9rem 1.2rem;
            width: 100%;
            font-weight: 700;
            font-size: 13px;
            color: var(--dark-bolt);
            transition: all 0.2s ease;
        }
        .input-field:focus {
            background: white;
            transform: translate(-2px, -2px);
            box-shadow: 4px 4px 0px var(--dark-bolt);
            border-color: var(--dark-bolt);
            outline: none;
        }

        /* Button Styling */
        .btn-register {
            background: var(--dark-bolt);
            color: white;
            padding: 1.1rem;
            border-radius: 14px;
            font-weight: 900;
            font-size: 11px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            transition: 0.3s;
            border: none;
            cursor: pointer;
        }
        .btn-register:hover {
            background: var(--retro-yellow);
            color: var(--dark-bolt);
            transform: translate(-4px, -4px);
            box-shadow: 8px 8px 0px var(--dark-bolt);
        }

        .title-retro {
            font-family: 'Pacifico', cursive;
            font-size: clamp(3rem, 6vw, 5rem);
            background: linear-gradient(180deg, #A6E3A1 0%, #74C179 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(2px 2px 0px var(--dark-bolt));
        }

        .badge-tag {
            background: var(--soft-pink);
            border: 2px solid var(--dark-bolt);
            padding: 5px 15px;
            border-radius: 50px;
            font-weight: 900;
            font-size: 11px;
            display: inline-block;
            margin-bottom: 15px;
            box-shadow: 3px 3px 0px var(--dark-bolt);
        }
    </style>

    <div class="min-h-screen flex items-center justify-center p-6 relative">
        <div class="star-y2k" style="top: 10%; right: 15%;"></div>
        <div class="star-y2k" style="bottom: 10%; left: 10%; transform: scale(0.7);"></div>
        <div style="position: absolute; width: 200px; height: 200px; border: 1px dashed var(--dark-bolt); border-radius: 50%; top: -50px; left: -50px; opacity: 0.2;"></div>

        <div class="w-full max-w-6xl flex flex-col lg:flex-row items-center gap-12 relative z-10">
            
            <div class="lg:w-1/2 text-center lg:text-left">
                <div class="badge-tag">REGISTRY PORTAL</div>
                <h2 class="title-retro mb-2">Spektra.</h2>
                <h1 class="text-5xl md:text-7xl font-black text-slate-800 leading-[0.9] tracking-tighter mb-6 uppercase">
                    Start your <br>
                    <span style="color: var(--retro-green); -webkit-text-stroke: 1.5px var(--dark-bolt);">legacy.</span>
                </h1>
                <p class="text-slate-600 font-bold text-base max-w-sm lg:mx-0 mx-auto italic leading-relaxed mb-8">
                    Mari bergabung dalam arsip digital kreatif Batch 51 SMKN 1 Cimahi.
                </p>
                <div class="flex items-center gap-4 justify-center lg:justify-start opacity-50">
                    <span class="text-[10px] font-black uppercase tracking-widest">System Stable v.2026</span>
                    <div class="h-px w-10 bg-black"></div>
                </div>
            </div>

            <div class="lg:w-1/2 w-full">
                <div class="premium-card p-10 md:p-12">
                    @if ($errors->any())
                        <div class="mb-6 p-4 rounded-xl border-2 border-dark-bolt" style="background: #FF9999;">
                            <p class="text-[10px] font-black uppercase tracking-tight text-black">{{ $errors->first() }}</p>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}" class="space-y-5">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-1 mb-2 block">Full Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="input-field" placeholder="Kero Kotaro" required>
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-1 mb-2 block">Role Identity</label>
                                <select name="role" id="roleSelect" class="input-field appearance-none cursor-pointer" style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23000000%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 0.6em auto;">
                                    <option value="Siswa" {{ old('role') == 'Siswa' ? 'selected' : '' }}>Siswa</option>
                                    <option value="Guru" {{ old('role') == 'Guru' ? 'selected' : '' }}>Guru</option>
                                </select>
                            </div>
                        </div>

                        <div id="secretCodeGroup" style="display: none;">
                            <label class="text-[10px] font-black uppercase tracking-widest text-coral ml-1 mb-2 block" style="color: var(--color-coral)">Guru Secret Code</label>
                            <input type="password" name="secret_code" class="input-field" style="border-color: #E36A6A; background: #FFF5F5;" placeholder="Enter verification code">
                        </div>

                        <div>
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-1 mb-2 block">Institutional Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="input-field" placeholder="name@smkn1cimahi.sch.id" required>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-1 mb-2 block">Password</label>
                                <input type="password" name="password" class="input-field" placeholder="••••••••" required>
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 ml-1 mb-2 block">Confirm Key</label>
                                <input type="password" name="password_confirmation" class="input-field" placeholder="••••••••" required>
                            </div>
                        </div>

                        <button type="submit" class="btn-register w-full mt-4">
                            CREATE ACCOUNT →
                        </button>

                        <div class="text-center pt-6 border-t-2 border-dashed border-slate-100">
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                                Already in? <a href="{{ route('login') }}" class="text-dark-bolt hover:text-sky-blue transition-colors font-black underline underline-offset-4">Sign In</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('roleSelect');
            const secretCodeGroup = document.getElementById('secretCodeGroup');

            function toggleSecretField() {
                if (roleSelect.value === 'Guru') {
                    secretCodeGroup.style.display = 'block';
                } else {
                    secretCodeGroup.style.display = 'none';
                }
            }

            roleSelect.addEventListener('change', toggleSecretField);
            toggleSecretField();
        });
    </script>
</x-guest-layout>