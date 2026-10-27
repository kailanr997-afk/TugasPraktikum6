<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0f766e">
    <title>LaporBanjir - BPBD</title>
    <style>
        :root {
            color-scheme: light;
            --ink: #16323a;
            --muted: #647b82;
            --teal: #0f766e;
            --teal-dark: #115e59;
            --sky: #e8f5f4;
            --line: #dce8e8;
            --surface: #ffffff;
            --page: #f3f8f8;
            --danger: #b42318;
            --success: #087443;
        }

        * { box-sizing: border-box; }

        body {
            min-height: 100vh;
            margin: 0;
            background: var(--page);
            color: var(--ink);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            line-height: 1.6;
        }

        a { color: inherit; }

        .site-header {
            background: var(--surface);
            border-bottom: 1px solid var(--line);
        }

        .header-inner {
            width: min(1120px, calc(100% - 40px));
            min-height: 76px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 11px;
            color: var(--ink);
            text-decoration: none;
            font-size: 17px;
            font-weight: 800;
            letter-spacing: -.03em;
        }

        .brand-mark {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: var(--teal);
            color: white;
        }

        .brand-mark svg { width: 23px; height: 23px; }

        .brand small {
            display: block;
            color: var(--muted);
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .04em;
        }

        .site-nav {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 6px;
        }

        .site-nav a,
        .nav-button {
            display: inline-flex;
            align-items: center;
            min-height: 40px;
            padding: 8px 13px;
            border: 0;
            border-radius: 9px;
            background: transparent;
            color: #466168;
            font: inherit;
            font-size: 14px;
            font-weight: 650;
            text-decoration: none;
            cursor: pointer;
            transition: background .18s ease, color .18s ease;
        }

        .site-nav a:hover,
        .nav-button:hover,
        .site-nav a:focus-visible,
        .nav-button:focus-visible {
            background: var(--sky);
            color: var(--teal-dark);
        }

        .site-nav .nav-primary {
            background: var(--teal);
            color: white;
        }

        .site-nav .nav-primary:hover,
        .site-nav .nav-primary:focus-visible {
            background: var(--teal-dark);
            color: white;
        }

        .nav-form { display: inline; }

        .page-shell {
            width: min(1120px, calc(100% - 40px));
            margin: 48px auto 64px;
        }

        .container {
            overflow: hidden;
            padding: clamp(24px, 5vw, 48px);
            border: 1px solid var(--line);
            border-radius: 20px;
            background: var(--surface);
            box-shadow: 0 16px 42px rgba(20, 67, 72, .07);
        }

        .page-heading { margin: 0 0 8px; font-size: clamp(26px, 4vw, 36px); line-height: 1.2; letter-spacing: -.04em; }
        .page-description { max-width: 650px; margin: 0 0 30px; color: var(--muted); }
        .eyebrow { margin: 0 0 9px; color: var(--teal); font-size: 12px; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .field { min-width: 0; }
        .field-wide { grid-column: 1 / -1; }

        label {
            display: inline-block;
            margin-bottom: 7px;
            color: #29444b;
            font-size: 14px;
            font-weight: 700;
        }

        .field-hint { display: block; margin-top: 6px; color: var(--muted); font-size: 12px; }

        input:not([type="file"]),
        textarea {
            display: block;
            width: 100%;
            min-height: 48px;
            padding: 11px 14px;
            border: 1px solid #cbdcdd;
            border-radius: 10px;
            outline: none;
            background: #fbfdfd;
            color: var(--ink);
            font: inherit;
            transition: border-color .18s ease, box-shadow .18s ease, background .18s ease;
        }

        textarea { min-height: 116px; resize: vertical; }

        input:not([type="file"]):focus,
        textarea:focus {
            border-color: var(--teal);
            background: white;
            box-shadow: 0 0 0 3px rgba(15, 118, 110, .13);
        }

        input[type="file"] {
            display: block;
            width: 100%;
            padding: 12px;
            border: 1px dashed #b8cecf;
            border-radius: 10px;
            background: #f7fbfb;
            color: var(--muted);
            font: inherit;
        }

        .button {
            display: inline-flex;
            min-height: 46px;
            align-items: center;
            justify-content: center;
            padding: 11px 20px;
            border: 0;
            border-radius: 10px;
            background: var(--teal);
            color: white;
            font: inherit;
            font-weight: 750;
            text-decoration: none;
            cursor: pointer;
            transition: background .18s ease, transform .18s ease;
        }

        .button:hover { transform: translateY(-1px); background: var(--teal-dark); }
        .form-actions { grid-column: 1 / -1; margin-top: 2px; }
        .auth-card { max-width: 560px; margin: 0 auto; }
        .auth-card .page-heading { font-size: 30px; }
        .auth-form { display: grid; gap: 16px; }
        .profile-list { display: grid; gap: 12px; margin: 26px 0 0; padding: 0; list-style: none; }
        .profile-list li { padding: 16px 18px; border: 1px solid var(--line); border-radius: 12px; background: #f8fbfb; }
        .profile-list strong { display: block; margin-bottom: 3px; color: var(--muted); font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: .06em; }

        .success, .error {
            margin-bottom: 22px;
            padding: 13px 16px;
            border-radius: 10px;
            font-size: 14px;
        }

        .success { border: 1px solid #b8e4ce; background: #effaf4; color: var(--success); }
        .error { border: 1px solid #f1c7c3; background: #fff4f2; color: var(--danger); }
        .error ul { margin: 0; padding-left: 20px; }

        .site-footer { padding: 0 20px 30px; color: var(--muted); text-align: center; font-size: 12px; }

        @media (max-width: 680px) {
            .header-inner { width: min(100% - 28px, 1120px); min-height: 0; padding: 15px 0; align-items: flex-start; flex-direction: column; gap: 12px; }
            .site-nav { width: 100%; gap: 3px; }
            .site-nav a, .nav-button { min-height: 38px; padding: 7px 10px; font-size: 13px; }
            .page-shell { width: min(100% - 28px, 1120px); margin: 24px auto 40px; }
            .container { padding: 24px 20px; border-radius: 16px; }
            .form-grid { grid-template-columns: 1fr; gap: 16px; }
            .field-wide, .form-actions { grid-column: auto; }
            .form-actions .button { width: 100%; }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="header-inner">
            <a class="brand" href="{{ route('laporan.create') }}">
                <span class="brand-mark" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M12 3.5c-2.7 3.4-6.5 7.3-6.5 11.1a6.5 6.5 0 0 0 13 0c0-3.8-3.8-7.7-6.5-11.1Z" stroke="currentColor" stroke-width="1.8"/>
                        <path d="M8.8 15.1c.3 1.6 1.4 2.5 3.1 2.8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                </span>
                <span>LaporBanjir<small>LAYANAN PELAPORAN BPBD</small></span>
            </a>
            <nav class="site-nav" aria-label="Navigasi utama">
                <a class="nav-primary" href="{{ route('laporan.create') }}">Kirim Laporan</a>
                @auth
                    <a href="{{ route('laporan.index') }}">Daftar Laporan</a>
                    <a href="{{ route('profil') }}">Profil Petugas</a>
                    <form class="nav-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="nav-button" type="submit">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Login Petugas</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </nav>
        </div>
    </header>
    <main class="page-shell">
        <div class="container">
            @if(session('success'))
                <div class="success" role="status">{{ session('success') }}</div>
            @endif
            @yield('content')
        </div>
    </main>
    <footer class="site-footer">Layanan pelaporan banjir untuk membantu penanganan lebih cepat.</footer>
</body>
</html>
