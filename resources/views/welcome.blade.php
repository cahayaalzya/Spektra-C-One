<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spektra | Digital Legacy</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700;800&family=Pacifico&family=VT323&display=swap" rel="stylesheet">
    <style>
        :root {
            --sky-blue: #89B4FA;
            --retro-green: #A6E3A1;
            --retro-yellow: #F9E2AF;
            --soft-pink: #F5C2E7;
            --dark-bolt: #111111;
        }

        html {
            scroll-behavior: smooth;
        }

        body { 
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0; 
            padding: 0;
            background: linear-gradient(180deg, #6292EE 0%, #FFFFFF 50%, #6292EE 100%);
            min-height: 100vh;
            overflow-x: hidden;
            color: var(--dark-bolt);
        }

        /* --- NAV BAR --- */
        nav {
            position: fixed;
            top: 20px;
            width: 100%;
            display: flex;
            justify-content: center;
            z-index: 100;
        }

        .nav-pill {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 2px solid var(--dark-bolt);
            border-radius: 100px;
            padding: 10px 30px;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 4px 4px 0px rgba(0,0,0,0.1);
        }

        .nav-link {
            text-decoration: none;
            color: var(--dark-bolt);
            font-weight: 800;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-auth {
            background: var(--dark-bolt);
            color: white;
            padding: 8px 22px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 800;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-auth:hover {
            transform: scale(1.05);
            background: #333;
        }

        /* --- HERO SECTION --- */
        .hero-container {
            position: relative;
            margin-top: 25vh;
            text-align: center;
            padding-bottom: 100px;
        }

        .main-capsule {
            background: white;
            border: 3px solid var(--dark-bolt);
            border-radius: 200px;
            padding: 50px 100px;
            display: inline-block;
            position: relative;
            box-shadow: 10px 10px 0px rgba(0,0,0,0.05);
        }

        .year-badge {
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--retro-yellow);
            border: 3px solid var(--dark-bolt);
            border-radius: 50px;
            padding: 5px 25px;
            font-weight: 900;
            font-size: 1.5rem;
        }

        .title-text {
            font-family: 'Pacifico', cursive;
            font-size: clamp(4rem, 10vw, 7.5rem);
            background: linear-gradient(180deg, #A6E3A1 0%, #74C179 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin: 0;
            filter: drop-shadow(3px 3px 0px var(--dark-bolt));
        }

        .pixel-t {
            font-family: 'VT323', monospace;
            -webkit-text-fill-color: var(--dark-bolt);
        }

        .sub-badge {
            margin-top: 30px;
            background: var(--retro-green);
            border: 2px solid var(--dark-bolt);
            border-radius: 50px;
            padding: 12px 45px;
            display: inline-block;
            font-weight: 800;
            letter-spacing: 1px;
            box-shadow: 4px 4px 0px rgba(0,0,0,0.1);
        }

        /* --- DECORATIONS --- */
        .star-y2k {
            position: absolute;
            width: 45px;
            height: 45px;
            background: var(--dark-bolt);
            z-index: -1;
            clip-path: polygon(50% 0%, 58% 42%, 100% 50%, 58% 58%, 50% 100%, 42% 58%, 0% 50%, 42% 42%);
        }

        .deco-circle {
            position: absolute;
            border: 2px solid var(--dark-bolt);
            border-radius: 50%;
            z-index: -1;
        }

        /* --- FOOTER --- */
        .main-footer {
            margin-top: 50px;
            padding: 60px 20px;
            border-top: 3px solid var(--dark-bolt);
            background: rgba(255,255,255,0.4);
            backdrop-filter: blur(5px);
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
        }

        .footer-logo {
            font-family: 'Pacifico', cursive;
            font-size: 2.2rem;
            color: var(--dark-bolt);
            filter: drop-shadow(2px 2px 0px var(--retro-green));
        }

        .footer-tag {
            background: var(--retro-yellow);
            border: 2px solid var(--dark-bolt);
            padding: 8px 18px;
            border-radius: 12px;
            font-weight: 800;
            font-size: 11px;
            text-decoration: none;
            color: black;
            box-shadow: 4px 4px 0px var(--dark-bolt);
            transition: 0.2s;
        }

        .footer-tag:hover {
            transform: translate(-2px, -2px);
            box-shadow: 6px 6px 0px var(--dark-bolt);
        }

    </style>
</head>
<body class="antialiased">

    <nav>
        <div class="nav-pill">
            <a href="#" class="nav-link">About</a>
            <a href="#works" class="nav-link">Gallery</a>
            <div style="width: 2px; height: 15px; background: #ccc;"></div>
            @auth
                <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="nav-link">Login</a>
                <a href="{{ route('register') }}" class="btn-auth">Join Us</a>
            @endauth
        </div>
    </nav>

    <div class="star-y2k" style="top: 15%; left: 12%;"></div>
    <div class="star-y2k" style="top: 25%; right: 15%; transform: scale(0.7) rotate(15deg);"></div>
    <div class="deco-circle" style="width: 40px; height: 40px; bottom: 35%; left: 8%;"></div>
    <div class="deco-circle" style="width: 25px; height: 25px; top: 40%; right: 5%;"></div>

    <main class="hero-container">
        <div class="main-capsule">
            <div class="year-badge">2026</div>
            <h1 class="title-text">
                Spek<span class="pixel-t">t</span>ra
            </h1>
        </div>

        <br>
        
        <div class="sub-badge">C-ONE</div>

        <p style="margin-top: 35px; font-weight: 700; color: #333; font-size: 1rem; max-width: 450px; margin-left: auto; margin-right: auto; line-height: 1.6;">
            Digital Mading Archives: Elevating creativity with a touch of retro noise.
        </p>

        <div style="margin-top: 45px;">
            <a href="#works" style="background: white; border: 3px solid var(--dark-bolt); padding: 20px 60px; border-radius: 20px; font-weight: 900; text-decoration: none; color: black; display: inline-block; box-shadow: 8px 8px 0px var(--dark-bolt); font-size: 1.1rem; transition: 0.2s;" onmouseover="this.style.transform='translate(-3px, -3px)'; this.style.boxShadow='11px 11px 0px var(--dark-bolt)'" onmouseout="this.style.transform='translate(0,0)'; this.style.boxShadow='8px 8px 0px var(--dark-bolt)'">
                ENTER GALLERY →
            </a>
        </div>
    </main>

    <footer class="main-footer">
        <div class="footer-content">
            
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <div class="footer-logo">Spektra.</div>
                <span style="font-weight: 800; font-size: 11px; letter-spacing: 2px; text-transform: uppercase; color: #444;">
                    SMK Negeri 1 Cimahi • Batch 51
                </span>
            </div>

            <div style="display: flex; gap: 20px;">
                <a href="#" class="footer-tag">INSTAGRAM</a>
            </div>

            <div style="text-align: right;">
                <p style="font-weight: 800; font-size: 12px; margin: 0; letter-spacing: 1px;">SPEKTRA C-ONE</p>
                <p style="font-family: 'VT323', monospace; font-size: 15px; margin: 5px 0 0 0; color: #666;">
                    STABLE_BUILD_2026 // NO_ERRORS
                </p>
            </div>

        </div>
    </footer>

</body>
</html>