@props([
    'title' => 'My Laravel App',
])
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&family=Syne:wght@700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy:       #0c1a35;
            --blue:       #3b82f6;
            --cream:      #f5f2ed;
            --cream-dark: #e8e4dc;
            --gold:       #f0a500;
            --muted:      rgba(255,255,255,0.45);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background-color: var(--navy);
            color: white;
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* Ambient glow background */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                radial-gradient(ellipse 70% 55% at 10% 5%,  rgba(59,130,246,0.15) 0%, transparent 60%),
                radial-gradient(ellipse 55% 45% at 90% 90%,  rgba(59,130,246,0.10) 0%, transparent 55%);
            pointer-events: none;
            z-index: 0;
        }

        /* Subtle grid */
        body::after {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.022) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.022) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
            z-index: 0;
        }

        /* ── Navbar ── */
        nav {
            position: sticky;
            top: 0;
            z-index: 50;
            background: rgba(245,242,237,0.96);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--cream-dark);
            box-shadow: 0 1px 0 rgba(0,0,0,0.05), 0 6px 24px rgba(0,0,0,0.07);
        }

        .nav-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 62px;
        }

        .nav-logo {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.15rem;
            letter-spacing: -0.03em;
            color: var(--navy);
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .nav-logo .accent { color: var(--blue); }
        .nav-logo .pip {
            display: inline-block;
            width: 5px; height: 5px;
            background: var(--gold);
            border-radius: 50%;
            margin: 0 0 7px 3px;
        }

        .nav-links { display: flex; align-items: center; gap: 1px; list-style: none; }

        .nav-links a {
            display: block;
            padding: 6px 11px;
            border-radius: 7px;
            font-size: 0.82rem;
            font-weight: 500;
            color: #4b5563;
            text-decoration: none;
            white-space: nowrap;
            transition: color 0.14s, background 0.14s;
        }
        .nav-links a:hover { color: #1d4ed8; background: rgba(59,130,246,0.09); }

        .nav-links .btn-cta {
            margin-left: 8px;
            padding: 7px 15px;
            background: var(--navy);
            color: #fff !important;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.81rem;
            letter-spacing: 0.02em;
            box-shadow: 0 2px 8px rgba(12,26,53,0.3);
            transition: background 0.18s, transform 0.14s, box-shadow 0.18s !important;
        }
        .nav-links .btn-cta:hover {
            background: var(--blue) !important;
            transform: translateY(-1px);
            box-shadow: 0 5px 16px rgba(59,130,246,0.4) !important;
        }

        /* ── Main ── */
        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 4rem 2rem 5rem;
            position: relative;
            z-index: 1;
            text-align: center;
        }

        /* Badge */
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 5px 14px 5px 10px;
            background: rgba(59,130,246,0.12);
            border: 1px solid rgba(59,130,246,0.22);
            border-radius: 100px;
            font-size: 0.73rem;
            font-weight: 600;
            color: #93c5fd;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-bottom: 1.75rem;
            animation: fadeUp 0.5s cubic-bezier(0.22,1,0.36,1) both;
        }
        .hero-badge::before {
            content: '';
            width: 6px; height: 6px;
            background: #60a5fa;
            border-radius: 50%;
            box-shadow: 0 0 8px rgba(96,165,250,0.7);
        }

        /* Headline */
        .hero-title {
            font-family: 'Syne', sans-serif;
            font-size: clamp(2.4rem, 5vw, 3.8rem);
            font-weight: 800;
            line-height: 1.08;
            letter-spacing: -0.04em;
            color: #fff;
            max-width: 680px;
            margin: 0 auto 1.25rem;
            animation: fadeUp 0.55s 0.07s cubic-bezier(0.22,1,0.36,1) both;
        }
        .hero-title .hl {
            color: transparent;
            background: linear-gradient(135deg, #60a5fa 0%, #a5c8fe 100%);
            -webkit-background-clip: text;
            background-clip: text;
        }

        /* Sub */
        .hero-sub {
            font-size: 1rem;
            font-weight: 300;
            color: var(--muted);
            line-height: 1.7;
            max-width: 440px;
            margin: 0 auto 2.5rem;
            animation: fadeUp 0.55s 0.13s cubic-bezier(0.22,1,0.36,1) both;
        }

        /* CTA buttons */
        .hero-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 0;
            animation: fadeUp 0.55s 0.19s cubic-bezier(0.22,1,0.36,1) both;
        }

        .btn-primary {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 11px 24px;
            background: var(--blue);
            color: #fff;
            border-radius: 10px;
            font-size: 0.9rem; font-weight: 600;
            text-decoration: none;
            box-shadow: 0 4px 18px rgba(59,130,246,0.4);
            transition: background 0.18s, transform 0.14s, box-shadow 0.18s;
        }
        .btn-primary:hover { background: #2563eb; transform: translateY(-2px); box-shadow: 0 8px 28px rgba(59,130,246,0.5); }
        .btn-primary svg { width: 16px; height: 16px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }

        .btn-ghost {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 11px 22px;
            background: transparent;
            color: rgba(255,255,255,0.72);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 10px;
            font-size: 0.9rem; font-weight: 500;
            text-decoration: none;
            transition: background 0.16s, color 0.16s, border-color 0.16s;
        }
        .btn-ghost:hover { background: rgba(255,255,255,0.07); color: #fff; border-color: rgba(255,255,255,0.28); }

        /* Section divider */
        .divider {
            width: 100%;
            max-width: 820px;
            display: flex;
            align-items: center;
            gap: 14px;
            margin: 4rem auto 2rem;
            animation: fadeUp 0.55s 0.24s cubic-bezier(0.22,1,0.36,1) both;
        }
        .divider::before, .divider::after { content: ''; flex: 1; height: 1px; background: rgba(255,255,255,0.08); }
        .divider span { font-size: 0.68rem; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; color: var(--muted); white-space: nowrap; }

        /* Quick-nav cards */
        .quick-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
            width: 100%;
            max-width: 820px;
            margin: 0 auto;
            animation: fadeUp 0.55s 0.3s cubic-bezier(0.22,1,0.36,1) both;
        }

        .qcard {
            display: flex; flex-direction: column; align-items: flex-start; gap: 8px;
            padding: 18px 18px 16px;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 12px;
            text-decoration: none;
            text-align: center;
            transition: background 0.16s, border-color 0.16s, transform 0.14s;
        }
        .qcard:hover { background: rgba(59,130,246,0.1); border-color: rgba(59,130,246,0.28); transform: translateY(-2px); }

        .qcard-icon {
            width: 32px; height: 32px;
            display: flex; align-items: center; justify-content: center;
            background: rgba(59,130,246,0.15);
            border-radius: 8px;
        }
        .qcard-icon svg { width: 15px; height: 15px; stroke: #60a5fa; fill: none; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }

        .qcard-label { font-size: 0.82rem; font-weight: 600; color: rgba(255,255,255,0.88); }
        .qcard-hint  { font-size: 0.72rem; color: var(--muted); line-height: 1.45; }

        /* Slot wrapper */
        /* --- Center the Slot Wrapper --- */
/* --- The "Big" Background Container --- */
.slot-wrapper {
    width: 100%;
    max-width: 700px; /* Wider container */
    margin: 2rem auto;
    
    /* This creates the 'Big BG' card effect */
    background: rgba(255, 255, 255, 0.03); 
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 24px; /* Softer, larger corners */
    
    padding: 3rem; /* Massive internal spacing to make it feel 'Big' */
    box-shadow: 
        0 20px 50px rgba(0, 0, 0, 0.3),
        0 0 0 1px rgba(255, 255, 255, 0.05) inset;
    
    display: flex;
    flex-direction: column;
    animation: fadeUp 0.6s 0.1s cubic-bezier(0.22,1,0.36,1) both;
}

/* --- Form Spacing --- */
.slot-wrapper form {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 2rem; /* More breathing room between inputs */
}

/* --- Extra Large Inputs --- */
.slot-wrapper input, 
.slot-wrapper textarea {
    width: 100%;
    padding: 18px 22px; /* Even bigger padding for a luxury feel */
    font-size: 1.1rem;
    background: rgba(0, 0, 0, 0.2); /* Darker input to contrast with the card */
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 14px;
    color: white;
}

/* --- Huge Action Button --- */
.slot-wrapper button[type="submit"] {
    padding: 18px;
    font-size: 1.1rem;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    background: linear-gradient(135deg, var(--blue), #2563eb);
    border-radius: 14px;
    margin-top: 1rem;
}
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Footer ── */
        footer {
            position: relative; z-index: 1;
            padding: 1.25rem 2rem;
            display: flex; align-items: center; justify-content: space-between;
            border-top: 1px solid rgba(255,255,255,0.06);
        }
        .footer-copy { font-size: 0.76rem; color: var(--muted); }
        .footer-live { display: flex; align-items: center; gap: 6px; font-size: 0.73rem; color: var(--muted); }
        .live-dot {
            width: 6px; height: 6px;
            background: #22c55e; border-radius: 50%;
            box-shadow: 0 0 6px rgba(34,197,94,0.7);
            animation: blink 2.2s ease-in-out infinite;
        }
        @keyframes blink { 0%,100%{opacity:1} 50%{opacity:0.3} }

        @media (max-width: 768px) {
            .nav-links { display: none; }
            .hero-title { font-size: 2.1rem; }
            main { padding: 3rem 1.25rem 4rem; }

            
        }
    </style>
</head>
<body class="antialiased">

    <nav>
        <div class="nav-inner">
            <a href="/" class="nav-logo">
                LARAVEL<span class="accent">APP</span><span class="pip"></span>
            </a>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/formtest">Form Test</a></li>
                <li><a href="/posts">Posts</a></li>
                <li><a href="/register">Register</a></li>
                <li><a href="/users">View Users</a></li>
                <li><a href="{{ route('books.index') }}" >Books List</a></li>
            </ul>
        </div>
    </nav>

    <main>

        {{-- Hero --}}
      

        <h1 class="hero-title">
            Build something<br><span class="hl">remarkable.</span>
        </h1>

        <p class="hero-sub">
            A clean, modern Laravel starter. Crafted with care to help you build beautiful web applications faster.
        </p>

 
        {{-- Slot content (page-specific) --}}
        @if(isset($slot) && trim((string) $slot) !== '')
            <div class="divider" style="margin-top: 3.5rem;"><span>{{ $title }}</span></div>
            <div class="slot-wrapper">{{ $slot }}</div>
        @endif

    </main>

    <footer>
        <p class="footer-copy">&copy; 2026 Activity 4 &mdash; {{ $title }}</p>
        <div class="footer-live"><span class="live-dot"></span> All systems live</div>
    </footer>

</body>
</html>