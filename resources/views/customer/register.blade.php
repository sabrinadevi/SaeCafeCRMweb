<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Registrasi - SAÉ CAFE ROJEL
    </title>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600&display=swap');

        :root {
            --brown-950: #2f1c13;
            --brown-900: #3b2418;
            --brown-800: #4b2d1c;
            --brown-700: #68432d;
            --gold: #d7a34a;
            --gold-soft: #f8e9c7;
            --cream: #f7f1e8;
            --cream-2: #fffaf4;
            --text: #2e251f;
            --muted: #89776a;
            --border: #e6dcd0;
            --danger-bg: #fff0ef;
            --danger: #ad4743;
            --shadow: 0 24px 70px rgba(59, 36, 24, .12);
        }

        * {
            box-sizing: border-box;
        }

        html {
            min-height: 100%;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 34px 22px;
            overflow-x: hidden;
            background:
                radial-gradient(circle at 8% 12%, rgba(215, 163, 74, .14), transparent 28%),
                radial-gradient(circle at 92% 88%, rgba(104, 67, 45, .10), transparent 30%),
                var(--cream);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
        }

        body::before,
        body::after {
            content: "";
            position: fixed;
            z-index: -1;
            border-radius: 50%;
            pointer-events: none;
        }

        body::before {
            width: 330px;
            height: 330px;
            top: -170px;
            right: -120px;
            border: 1px solid rgba(104, 67, 45, .12);
        }

        body::after {
            width: 250px;
            height: 250px;
            bottom: -130px;
            left: -100px;
            border: 1px solid rgba(215, 163, 74, .18);
        }

        .register-container {
            width: 100%;
            max-width: 1040px;
        }

        .register-shell {
            display: grid;
            grid-template-columns: .88fr 1.12fr;
            overflow: hidden;
            border: 1px solid rgba(230, 220, 208, .9);
            border-radius: 28px;
            background: rgba(255, 255, 255, .94);
            box-shadow: var(--shadow);
        }

        /* =========================
           BRAND PANEL
           ========================= */

        .brand-panel {
            position: relative;
            min-height: 690px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
            padding: 42px;
            background:
                radial-gradient(circle at 80% 15%, rgba(215, 163, 74, .18), transparent 28%),
                linear-gradient(150deg, var(--brown-950), var(--brown-800));
            color: #fff;
        }

        .brand-panel::before {
            content: "";
            position: absolute;
            width: 330px;
            height: 330px;
            right: -170px;
            bottom: -150px;
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 50%;
        }

        .brand-panel::after {
            content: "";
            position: absolute;
            width: 190px;
            height: 190px;
            left: -115px;
            top: 185px;
            border: 1px solid rgba(215,163,74,.14);
            border-radius: 50%;
        }

        .brand-content,
        .brand-bottom {
            position: relative;
            z-index: 1;
        }

        .brand-logo {
            width: 68px;
            height: 68px;
            display: grid;
            place-items: center;
            margin-bottom: 24px;
            border: 1px solid rgba(215,163,74,.75);
            border-radius: 50%;
            color: #f5d58f;
            font-size: 11px;
            font-weight: 800;
            line-height: 1.1;
            text-align: center;
            letter-spacing: .03em;
        }

        .brand-kicker {
            margin: 0 0 11px;
            color: #f0cf8d;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .10em;
            text-transform: uppercase;
        }

        .brand-title {
            max-width: 350px;
            margin: 0;
            color: #fff;
            font-family: 'DM Sans', Arial, Helvetica, sans-serif;
            font-size: clamp(34px, 3.2vw, 40px);
            line-height: 1.12;
            font-weight: 600;
            letter-spacing: -.025em;
        }

        .brand-description {
            max-width: 355px;
            margin: 15px 0 0;
            color: rgba(255,255,255,.70);
            font-size: 12.5px;
            line-height: 1.7;
            font-weight: 400;
        }

        .loyalty-card {
            width: min(100%, 330px);
            margin-top: 45px;
            padding: 20px;
            border: 1px solid rgba(255,255,255,.14);
            border-radius: 19px;
            background: rgba(255,255,255,.07);
            backdrop-filter: blur(8px);
        }

        .loyalty-card-label {
            margin: 0 0 12px;
            color: rgba(255,255,255,.58);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .loyalty-card-title {
            margin: 0;
            color: #fff;
            font-size: 16px;
            font-weight: 800;
        }

        .loyalty-card-text {
            margin: 7px 0 0;
            color: rgba(255,255,255,.66);
            font-size: 11px;
            line-height: 1.5;
        }

        .brand-bottom {
            color: rgba(255,255,255,.52);
            font-size: 10px;
        }

        /* =========================
           FORM PANEL
           ========================= */

        .register-card {
            padding: 44px 48px 40px;
            background: var(--cream-2);
        }

        .form-heading {
            margin-bottom: 27px;
        }

        .form-heading-eyebrow {
            margin: 0 0 8px;
            color: var(--brown-700);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .register-title {
            margin: 0;
            color: var(--brown-950);
            font-size: 28px;
            line-height: 1.15;
            font-weight: 700;
            letter-spacing: -.025em;
        }

        .register-description {
            max-width: 470px;
            margin: 9px 0 0;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        .alert-error {
            display: flex;
            flex-direction: column;
            gap: 5px;
            margin-bottom: 20px;
            padding: 13px 14px;
            border: 1px solid #f0c8c5;
            border-radius: 12px;
            background: var(--danger-bg);
            color: var(--danger);
            font-size: 11px;
            line-height: 1.45;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 15px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;
            margin-bottom: 7px;
            color: var(--brown-800);
            font-size: 11px;
            font-weight: 800;
        }

        .optional {
            color: #a59689;
            font-weight: 500;
        }

        .input-wrap {
            position: relative;
        }

        .form-input {
            width: 100%;
            height: 45px;
            padding: 0 13px;
            border: 1px solid var(--border);
            border-radius: 11px;
            outline: none;
            background: #fff;
            color: var(--text);
            font-size: 12px;
            transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .form-input::placeholder {
            color: #b2a59a;
        }

        .form-input:hover {
            border-color: #d5c7b8;
        }

        .form-input:focus {
            border-color: var(--brown-600);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(104,67,45,.09);
        }

        .form-help {
            display: block;
            margin-top: 5px;
            color: #a19387;
            font-size: 9px;
            line-height: 1.4;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 8px;
            width: 32px;
            height: 32px;
            transform: translateY(-50%);
            display: grid;
            place-items: center;
            border: 0;
            border-radius: 8px;
            background: transparent;
            color: #917e70;
            font-size: 13px;
            cursor: pointer;
        }

        .password-toggle:hover {
            background: #f5ede4;
            color: var(--brown-800);
        }

        .password-input {
            padding-right: 48px;
        }

        .register-button {
            width: 100%;
            height: 47px;
            margin-top: 4px;
            border: 0;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--brown-800), var(--brown-900));
            color: #fff;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .01em;
            cursor: pointer;
            box-shadow: 0 9px 20px rgba(75,45,28,.16);
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .register-button:hover {
            transform: translateY(-1px);
            background: var(--brown-950);
            box-shadow: 0 12px 25px rgba(75,45,28,.21);
        }

        .register-button:active {
            transform: translateY(0);
        }

        .login-link {
            margin-top: 20px;
            padding-top: 18px;
            border-top: 1px solid var(--border);
            text-align: center;
            color: var(--muted);
            font-size: 11px;
        }

        .login-link a {
            color: var(--brown-800);
            font-weight: 800;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* =========================
           RESPONSIVE
           ========================= */

        @media (max-width: 900px) {
            body {
                padding: 24px 16px;
            }

            .register-shell {
                grid-template-columns: 1fr;
                max-width: 650px;
            }

            .brand-panel {
                min-height: auto;
                padding: 30px;
            }

            .brand-title {
                max-width: 500px;
                font-size: 34px;
                line-height: 1.12;
                font-weight: 600;
            }

            .brand-description {
                max-width: 540px;
            }

            .loyalty-card {
                margin-top: 28px;
            }

            .brand-bottom {
                margin-top: 28px;
            }

            .register-card {
                padding: 34px 34px 30px;
            }
        }
   @media (max-width: 600px) {
            body {
                align-items: flex-start;
                padding: 14px 10px;
            }

            .register-shell {
                border-radius: 20px;
            }

            .brand-panel {
                padding: 26px 22px;
            }

            .brand-logo {
                width: 58px;
                height: 58px;
                margin-bottom: 18px;
                font-size: 9px;
            }

            .brand-kicker {
                font-size: 9px;
            }

            .brand-title {
                font-size: 29px;
                line-height: 1.14;
                font-weight: 600;
            }

            .brand-description {
                margin-top: 12px;
                font-size: 12px;
            }

            .loyalty-card {
                margin-top: 22px;
                padding: 15px;
                border-radius: 15px;
            }

            .loyalty-card-title {
                font-size: 14px;
            }

            .register-card {
                padding: 27px 20px 24px;
            }

            .form-heading {
                margin-bottom: 22px;
            }

            .register-title {
                font-size: 24px;
                font-weight: 700;
            }

            .register-description {
                font-size: 11px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .form-group {
                margin-bottom: 14px;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-input {
                height: 44px;
                font-size: 12px;
            }

            .register-button {
                height: 45px;
            }
        }

        @media (max-width: 380px) {
            body {
                padding: 8px;
            }

            .register-shell {
                border-radius: 16px;
            }

            .brand-panel {
                padding: 22px 18px;
            }

            .brand-title {
                font-size: 27px;
                line-height: 1.14;
            }

            .brand-description {
                font-size: 11px;
            }

            .register-card {
                padding: 24px 16px 21px;
            }

            .register-title {
                font-size: 23px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition: none !important;
            }
        }
    </style>

</head>


<body>

    <div class="register-container">

        <div class="register-shell">

            {{-- BRAND PANEL --}}
            <aside class="brand-panel">

                <div class="brand-content">

                    <div class="brand-logo">
                        SAÉ<br>CAFE<br>ROJEL
                    </div>

                    <p class="brand-kicker">
                        Member Loyalty System
                    </p>

                    <h1 class="brand-title">
                        Jadi bagian dari keluarga SAÉ Café.
                    </h1>

                    <p class="brand-description">
                        Buat akun member dan mulai kumpulkan point
                        dari setiap transaksi untuk mendapatkan reward
                        favoritmu.
                    </p>

                    <div class="loyalty-card">
                        <p class="loyalty-card-label">
                            Member Benefit
                        </p>

                        <h2 class="loyalty-card-title">
                            Point &amp; Reward
                        </h2>

                        <p class="loyalty-card-text">
                            Nikmati pengalaman loyalty yang lebih
                            praktis setiap kali berkunjung ke café.
                        </p>
                    </div>

                </div>

                <div class="brand-bottom">
                    SAÉ CAFE ROJEL • Member Area
                </div>

            </aside>

            {{-- REGISTER FORM --}}
            <section class="register-card">

                <div class="form-heading">
                    <p class="form-heading-eyebrow">
                        Create Account
                    </p>

                    <h2 class="register-title">
                        Daftar Member
                    </h2>

                    <p class="register-description">
                        Lengkapi data berikut untuk membuat akun
                        member SAÉ CAFE ROJEL.
                    </p>
                </div>

                {{-- ERROR --}}
                @if ($errors->any())
                    <div class="alert-error">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                {{-- FORM --}}
                <form
                    method="POST"
                    action="{{ route('register.store') }}"
                >
                    @csrf

                    <div class="form-grid">

                        {{-- NAMA --}}
                        <div class="form-group full">
                            <label
                                class="form-label"
                                for="nama"
                            >
                                Nama Lengkap
                            </label>

                            <div class="input-wrap">
                                <input
                                    class="form-input"
                                    type="text"
                                    id="nama"
                                    name="nama"
                                    value="{{ old('nama') }}"
                                    placeholder="Masukkan nama lengkap"
                                    autocomplete="name"
                                >
                            </div>

                            <small class="form-help">
                                Nomor WhatsApp akan menjadi username login.
                            </small>
                        </div>

                        {{-- NOMOR HP --}}
                        <div class="form-group">
                            <label
                                class="form-label"
                                for="nomor_hp"
                            >
                                Nomor HP
                            </label>

                            <div class="input-wrap">
                                <input
                                    class="form-input"
                                    type="tel"
                                    id="nomor_hp"
                                    name="nomor_hp"
                                    value="{{ old('nomor_hp') }}"
                                    placeholder="081234567890"
                                    autocomplete="tel"
                                    inputmode="tel"
                                    required
                                >
                            </div>
                        </div>


                         {{-- EMAIL --}}
                        <div class="form-group full">
                            <label
                                class="form-label"
                                for="email"
                            >
                                Email
                                <span class="optional">(Akan digunakan untuk verifikasi akun)</span>
                            </label>

                            <div class="input-wrap">
                                <input
                                    class="form-input"
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="contoh@email.com"
                                    autocomplete="email"
                                >
                            </div>
                        </div>

                        {{-- TANGGAL LAHIR --}}
                        <div class="form-group">
                            <label
                                class="form-label"
                                for="tanggal_lahir"
                            >
                                Tanggal Lahir <span class="optional">(opsional)</span>
                            </label>

                            <div class="input-wrap">
                                <input
                                    class="form-input"
                                    type="date"
                                    id="tanggal_lahir"
                                    name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir') }}"
                                    autocomplete="bday"
                                >
                            </div>
                        </div>

                        {{-- PASSWORD --}}
                        <div class="form-group">
                            <label
                                class="form-label"
                                for="password"
                            >
                                Password
                            </label>

                            <div class="input-wrap">
                                <input
                                    class="form-input password-input"
                                    type="password"
                                    id="password"
                                    name="password"
                                    placeholder="Minimal 8 karakter"
                                    autocomplete="new-password"
                                    required
                                >

                                <button
                                    type="button"
                                    class="password-toggle"
                                    onclick="togglePassword('password', this)"
                                    aria-label="Tampilkan password"
                                >
                                    ◉
                                </button>
                            </div>
                        </div>

                        {{-- KONFIRMASI PASSWORD --}}
                        <div class="form-group">
                            <label
                                class="form-label"
                                for="password_confirmation"
                            >
                                Konfirmasi Password
                            </label>

                            <div class="input-wrap">
                                <input
                                    class="form-input password-input"
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    placeholder="Ulangi password"
                                    autocomplete="new-password"
                                    required
                                >

                                <button
                                    type="button"
                                    class="password-toggle"
                                    onclick="togglePassword('password_confirmation', this)"
                                    aria-label="Tampilkan konfirmasi password"
                                >
                                    ◉
                                </button>
                            </div>
                        </div>

                    </div>

                    <button
                        type="submit"
                        class="register-button"
                    >
                        Daftar Sekarang
                    </button>

                </form>

                <div class="login-link">
                    Sudah punya akun?
                    <a href="{{ route('login') }}">
                        Login
                    </a>
                </div>

            </section>

        </div>

    </div>

    <script>
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);

            if (!input) {
                return;
            }

            const isPassword = input.type === 'password';

            input.type = isPassword ? 'text' : 'password';
            button.textContent = isPassword ? '◉' : '◌';
            button.setAttribute(
                'aria-label',
                isPassword
                    ? 'Sembunyikan password'
                    : 'Tampilkan password'
            );
        }
    </script>

</body></body>

</html>