

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - Request Instalasi Software | Universitas Budi Luhur</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Vite Assets (Breeze) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ============================================================
           BASE & RESET
        ============================================================ */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #000;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ============================================================
           WRAPPER UTAMA - Split Panel
        ============================================================ */
        .login-wrapper {
            display: flex;
            width: 100%;
            max-width: 1100px;
            min-height: 620px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.5);
            margin: 20px;
        }

        /* ============================================================
           PANEL KIRI - Branding & Hero Image
        ============================================================ */
        .panel-left {
            flex: 1;
            background: linear-gradient(160deg, #c8e8f5 0%, #a8d4ea 40%, #84bcd8 100%);
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }

        /* Logo Laboratorium (pojok kiri atas) */
        .lab-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 28px 30px;
            position: relative;
            z-index: 2;
        }

        .lab-logo img {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        .lab-logo-text {
            font-size: 13px;
            font-weight: 700;
            color: #1a3a5c;
            line-height: 1.3;
        }

        /* Judul Request Instalasi */
        .panel-title {
            padding: 10px 30px 24px 30px;
            position: relative;
            z-index: 2;
        }

        .panel-title h1 {
            font-size: 28px;
            font-weight: 800;
            color: #0d2a45;
            line-height: 1.25;
            letter-spacing: -0.5px;
            text-transform: uppercase;
        }

        /* Hero Image (foto lab komputer) */
        .hero-image {
            flex: 1;
            position: relative;
            overflow: hidden;
        }

        .hero-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center top;
            display: block;
        }

        /* Overlay subtle agar foto blend ke biru */
        .hero-image::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(200,232,245,0.15) 0%, transparent 40%);
        }

        /* Dekorasi lingkaran blur di background */
        .panel-left::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,0.18);
            top: -80px;
            right: -80px;
            filter: blur(60px);
            z-index: 1;
        }

        /* ============================================================
           PANEL KANAN - Form Login
        ============================================================ */
        .panel-right {
            width: 420px;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 50px 48px;
        }

        /* Logo Universitas */
        .university-logo {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 36px;
        }

        .university-logo img {
            width: 52px;
            height: 52px;
            object-fit: contain;
        }

        .university-name {
            font-size: 15px;
            font-weight: 800;
            color: #1a1a2e;
            line-height: 1.3;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Judul Login */
        .login-title {
            font-size: 30px;
            font-weight: 400;
            color: #222;
            letter-spacing: -0.5px;
            margin-bottom: 32px;
            align-self: flex-start;
            width: 100%;
        }

        /* ============================================================
           FORM ELEMENTS
        ============================================================ */
        .form-group {
            width: 100%;
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: #555;
            margin-bottom: 8px;
            letter-spacing: 0.2px;
        }

        .form-input {
            width: 100%;
            padding: 13px 16px;
            border: 1.5px solid #e2e2e2;
            border-radius: 10px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            color: #1a1a2e;
            background: #fff;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-input:focus {
            border-color: #1a3a5c;
            box-shadow: 0 0 0 3px rgba(26, 58, 92, 0.1);
        }

        .form-input.is-error {
            border-color: #e53e3e;
            box-shadow: 0 0 0 3px rgba(229, 62, 62, 0.08);
        }

        /* Pesan error validasi */
        .error-message {
            display: block;
            font-size: 12px;
            color: #e53e3e;
            margin-top: 6px;
        }

        /* ============================================================
           TOMBOL LOGIN
        ============================================================ */
        .btn-login {
            width: 100%;
            padding: 15px;
            background: #111111;
            color: #fff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 15px;
            font-weight: 600;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            margin-top: 10px;
            letter-spacing: 0.3px;
            transition: background 0.2s ease, transform 0.15s ease, box-shadow 0.2s ease;
        }

        .btn-login:hover {
            background: #2a2a2a;
            box-shadow: 0 6px 20px rgba(0,0,0,0.25);
            transform: translateY(-1px);
        }

        .btn-login:active {
            transform: translateY(0);
            box-shadow: none;
        }

        .btn-login:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        /* ============================================================
           SESSION ERROR ALERT
        ============================================================ */
        .alert-error {
            width: 100%;
            background: #fff5f5;
            border: 1.5px solid #fed7d7;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 13px;
            color: #c53030;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        /* ============================================================
           RESPONSIVE - Mobile
        ============================================================ */
        @media (max-width: 768px) {
            body {
                background: #fff;
                align-items: flex-start;
            }

            .login-wrapper {
                flex-direction: column;
                max-width: 100%;
                min-height: 100vh;
                margin: 0;
                border-radius: 0;
                box-shadow: none;
            }

            .panel-left {
                min-height: 260px;
                max-height: 320px;
            }

            .panel-title h1 {
                font-size: 22px;
            }

            .panel-right {
                width: 100%;
                padding: 36px 28px;
                justify-content: flex-start;
            }
        }
    </style>
</head>
<body>

<div class="login-wrapper">

    {{-- ============================================================
         PANEL KIRI: Branding, Judul, dan Foto Hero
    ============================================================ --}}
    <div class="panel-left">

        {{-- Logo Laboratorium ICT Terpadu --}}
        <div class="lab-logo">
            {{-- Ganti src dengan path logo Anda --}}
            <img
                src="{{ asset('images/logo-lab.png') }}"
                alt="Logo Laboratorium ICT Terpadu"
                onerror="this.style.display='none'"
            >
            <div class="lab-logo-text">
                Laboratorium ICT<br>Terpadu
            </div>
        </div>

        {{-- Judul Halaman --}}
        <div class="panel-title">
            <h1>Request Instalasi<br>Software</h1>
        </div>

        {{-- Foto Hero Lab Komputer --}}
        <div class="hero-image">
            {{-- Ganti src dengan foto lab Anda
                 Letakkan foto di: public/images/hero-lab.jpg --}}
            <img
                src="{{ asset('images/hero-lab.jpg') }}"
                alt="Foto Laboratorium Komputer"
                onerror="this.style.background='#84bcd8'; this.style.height='100%'"
            >
        </div>

    </div>

    {{-- ============================================================
         PANEL KANAN: Form Login
    ============================================================ --}}
    <div class="panel-right">

        {{-- Logo Universitas Budi Luhur --}}
        <div class="university-logo">
            {{-- Ganti src dengan logo UBL Anda --}}
            <img
                src="{{ asset('images/logo-ubl.png') }}"
                alt="Logo Universitas Budi Luhur"
                onerror="this.style.display='none'"
            >
            <div class="university-name">
                Universitas<br>Budi Luhur
            </div>
        </div>

        {{-- Judul Login --}}
        <h2 class="login-title">Login</h2>

        {{-- Alert: Error dari Session (misal: kredensial salah) --}}
        @if (session('status'))
            <div class="alert-error">
                {{ session('status') }}
            </div>
        @endif

        {{-- Validasi Error Global --}}
        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        {{-- ============================================================
             FORM LOGIN
        ============================================================ --}}
        <form method="POST" action="{{ route('login') }}" style="width:100%">
            @csrf

            {{-- Field NIM/NIP --}}
            <div class="form-group">
                <label for="nim_nip" class="form-label">NIM/NIP</label>
                <input
                    id="nim_nip"
                    type="text"
                    name="email"
                    class="form-input {{ $errors->has('email') ? 'is-error' : '' }}"
                    value="{{ old('email') }}"
                    placeholder="Masukkan NIM atau NIP"
                    required
                    autofocus
                    autocomplete="username"
                >
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            {{-- Field Password --}}
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    class="form-input {{ $errors->has('password') ? 'is-error' : '' }}"
                    placeholder="Masukkan password"
                    required
                    autocomplete="current-password"
                >
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            {{-- Tombol Login --}}
            <button type="submit" class="btn-login">
                Login
            </button>

        </form>

    </div>
    {{-- END Panel Kanan --}}

</div>
{{-- END Login Wrapper --}}

</body>
</html>
