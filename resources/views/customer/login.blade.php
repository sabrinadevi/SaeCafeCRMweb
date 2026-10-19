<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - SAÉ CAFE ROJEL</title>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap');

    :root {
        --brown-950: #2f1c13;
        --brown-900: #3b2418;
        --brown-800: #4b2d1c;
        --brown-700: #68432d;
        --gold: #d7a34a;
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
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        min-height: 100%;
    }

    body {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 34px 22px;
        overflow-x: hidden;
        font-family: 'DM Sans', Arial, sans-serif;
        color: var(--text);
        background:
            radial-gradient(circle at 8% 12%, rgba(215, 163, 74, .14), transparent 28%),
            radial-gradient(circle at 92% 88%, rgba(104, 67, 45, .10), transparent 30%),
            var(--cream);
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

    .login-container {
        width: 100%;
        max-width: 960px;
    }

    .login-shell {
        display: grid;
        grid-template-columns: .9fr 1.1fr;
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
        min-height: 590px;
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
        border: 1px solid rgba(255, 255, 255, .12);
        border-radius: 50%;
    }

    .brand-panel::after {
        content: "";
        position: absolute;
        width: 190px;
        height: 190px;
        left: -115px;
        top: 185px;
        border: 1px solid rgba(215, 163, 74, .14);
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
        margin-bottom: 25px;
        border: 1px solid rgba(215, 163, 74, .75);
        border-radius: 50%;
        color: #f5d58f;
        font-size: 11px;
        font-weight: 700;
        line-height: 1.1;
        text-align: center;
    }

    .brand-kicker {
        margin-bottom: 10px;
        color: #f0cf8d;
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .10em;
        text-transform: uppercase;
    }

    .brand-title {
        max-width: 350px;
        color: #fff;
        font-size: clamp(34px, 3.2vw, 40px);
        line-height: 1.12;
        font-weight: 600;
        letter-spacing: -.025em;
    }

    .brand-description {
        max-width: 350px;
        margin-top: 15px;
        color: rgba(255, 255, 255, .70);
        font-size: 12.5px;
        line-height: 1.7;
    }

    .loyalty-card {
        width: min(100%, 330px);
        margin-top: 40px;
        padding: 20px;
        border: 1px solid rgba(255, 255, 255, .14);
        border-radius: 19px;
        background: rgba(255, 255, 255, .07);
        backdrop-filter: blur(8px);
    }

    .loyalty-label {
        margin-bottom: 11px;
        color: rgba(255, 255, 255, .55);
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
    }

    .loyalty-title {
        color: #fff;
        font-size: 16px;
        font-weight: 700;
    }

    .loyalty-text {
        margin-top: 7px;
        color: rgba(255, 255, 255, .64);
        font-size: 10.5px;
        line-height: 1.5;
    }

    .brand-bottom {
        color: rgba(255, 255, 255, .52);
        font-size: 10px;
    }

    /* =========================
           LOGIN PANEL
        ========================= */

    .login-card {
        min-height: 590px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 48px 55px;
        background: var(--cream-2);
    }

    .login-heading {
        margin-bottom: 30px;
    }

    .login-eyebrow {
        margin-bottom: 8px;
        color: var(--brown-700);
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .09em;
        text-transform: uppercase;
    }

    .login-title {
        color: var(--brown-950);
        font-size: 30px;
        line-height: 1.15;
        font-weight: 700;
        letter-spacing: -.025em;
    }

    .login-description {
        max-width: 410px;
        margin-top: 9px;
        color: var(--muted);
        font-size: 12px;
        line-height: 1.6;
    }

    .error {
        margin-bottom: 20px;
        padding: 13px 14px;
        border: 1px solid #f0c8c5;
        border-radius: 12px;
        background: var(--danger-bg);
        color: var(--danger);
        font-size: 11px;
        line-height: 1.45;
    }

   .forgot-link {
    display: flex;
    justify-content: flex-end;
    margin-top: -5px;
    margin-bottom: 18px;
    font-size: 11px;
}

.forgot-link a {
    color: var(--brown-800);
    font-weight: 700;
    text-decoration: none;
}

.forgot-link a:hover {
    color: var(--brown-950);
    text-decoration: underline;
}

    label {
        display: block;
        margin-bottom: 7px;
        color: var(--brown-800);
        font-size: 11px;
        font-weight: 700;
    }

    .input-wrap {
        position: relative;
    }

    input {
        width: 100%;
        height: 46px;
        padding: 0 14px;
        border: 1px solid var(--border);
        border-radius: 11px;
        outline: none;
        background: #fff;
        color: var(--text);
        font-family: inherit;
        font-size: 12px;
        transition: .2s ease;
    }

    input::placeholder {
        color: #b2a59a;
    }

    input:hover {
        border-color: #d5c7b8;
    }

    input:focus {
        border-color: var(--brown-700);
        box-shadow: 0 0 0 3px rgba(104, 67, 45, .09);
    }

    .password-input {
        padding-right: 48px;
    }

    .password-toggle {
        position: absolute;
        top: 50%;
        right: 8px;
        width: 32px;
        height: 32px;
        display: grid;
        place-items: center;
        transform: translateY(-50%);
        border: 0;
        border-radius: 8px;
        background: transparent;
        color: #917e70;
        cursor: pointer;
    }

    .password-toggle:hover {
        background: #f5ede4;
        color: var(--brown-800);
    }

    button[type="submit"] {
        width: 100%;
        height: 47px;
        margin-top: 5px;
        border: 0;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--brown-800), var(--brown-900));
        color: #fff;
        font-family: inherit;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 9px 20px rgba(75, 45, 28, .16);
        transition: .2s ease;
    }

    button[type="submit"]:hover {
        transform: translateY(-1px);
        background: var(--brown-950);
        box-shadow: 0 12px 25px rgba(75, 45, 28, .21);
    }

    .register-link {
        margin-top: 22px;
        padding-top: 19px;
        border-top: 1px solid var(--border);
        text-align: center;
        color: var(--muted);
        font-size: 11px;
    }

    .register-link a {
        color: var(--brown-800);
        font-weight: 700;
        text-decoration: none;
    }

    .register-link a:hover {
        text-decoration: underline;
    }

    /* =========================
           RESPONSIVE
        ========================= */

    @media (max-width: 900px) {
        body {
            padding: 24px 16px;
        }

        .login-shell {
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
        }

        .brand-description {
            max-width: 520px;
        }

        .loyalty-card {
            margin-top: 26px;
        }

        .brand-bottom {
            margin-top: 28px;
        }

        .login-card {
            min-height: auto;
            padding: 36px 34px 32px;
        }
    }

    /* Khusus tampilan desktop */
@media (min-width: 901px) {
    .forgot-link {
        position: relative;
        top: 12px;
    }
}

    @media (max-width: 600px) {
        body {
            align-items: flex-start;
            padding: 14px 10px;
        }

        .login-shell {
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

        .brand-title {
            font-size: 29px;
            line-height: 1.14;
        }

        .brand-description {
            font-size: 11.5px;
        }

        .loyalty-card {
            margin-top: 22px;
            padding: 15px;
            border-radius: 15px;
        }

        .loyalty-title {
            font-size: 14px;
        }

        .login-card {
            padding: 28px 20px 25px;
        }

        .login-heading {
            margin-bottom: 23px;
        }

        .login-title {
            font-size: 25px;
        }

        .login-description {
            font-size: 11px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input {
            height: 44px;
        }

        button[type="submit"] {
            height: 45px;
        }
    }

    @media (max-width: 380px) {
        body {
            padding: 8px;
        }

        .login-shell {
            border-radius: 16px;
        }

        .brand-panel {
            padding: 22px 18px;
        }

        .brand-title {
            font-size: 27px;
        }

        .login-card {
            padding: 24px 16px 21px;
        }

        .login-title {
            font-size: 23px;
        }
    }


    /* =====================================================
           PHONE LOGIN
           Nomor telepon customer menggunakan format 08...
        ====================================================== */

    #username {
        letter-spacing: .02em;
    }

    #username::placeholder {
        letter-spacing: 0;
    }

    /* =====================================================
           MOBILE LOGIN - RESPONSIVE
        ====================================================== */

    @media (max-width: 600px) {
        body {
            width: 100%;
            min-height: 100svh;
            padding: 12px;
            align-items: flex-start;
        }

        .login-container {
            width: 100%;
            max-width: 100%;
        }

        .login-shell {
            width: 100%;
            grid-template-columns: 1fr;
            border-radius: 18px;
        }

        .brand-panel {
            min-height: auto;
            padding: 24px 20px 22px;
        }

        .brand-logo {
            width: 56px;
            height: 56px;
            margin-bottom: 16px;
            font-size: 9px;
        }

        .brand-kicker {
            font-size: 9px;
            margin-bottom: 7px;
        }

        .brand-title {
            max-width: 100%;
            font-size: clamp(25px, 7vw, 30px);
        }

        .brand-description {
            max-width: 100%;
            margin-top: 10px;
            font-size: 11px;
            line-height: 1.55;
        }

        .loyalty-card {
            width: 100%;
            max-width: none;
            margin-top: 18px;
            padding: 14px;
        }

        .brand-bottom {
            margin-top: 20px;
            font-size: 9px;
        }

        .login-card {
            min-height: auto;
            padding: 26px 18px 24px;
        }

        .login-heading {
            margin-bottom: 21px;
        }

        .login-eyebrow {
            font-size: 9px;
        }

        .login-title {
            font-size: clamp(23px, 6.5vw, 27px);
        }

        .login-description {
            max-width: 100%;
            font-size: 11px;
            line-height: 1.55;
        }

        .error {
            margin-bottom: 16px;
            padding: 11px 12px;
            font-size: 10px;
        }

        .form-group {
            margin-bottom: 14px;
        }

        label {
            margin-bottom: 6px;
            font-size: 10px;
        }

        input {
            height: 46px;
            padding: 0 13px;
            border-radius: 10px;
            font-size: 12px;
        }

        .password-input {
            padding-right: 45px;
        }

        button[type="submit"] {
            height: 46px;
            margin-top: 4px;
            border-radius: 10px;
            font-size: 12px;
        }

        .register-link {
            margin-top: 19px;
            padding-top: 16px;
            font-size: 10px;
        }
    }

    @media (max-width: 380px) {
        body {
            padding: 8px;
        }

        .brand-panel {
            padding: 21px 17px;
        }

        .brand-logo {
            width: 52px;
            height: 52px;
            font-size: 8px;
        }

        .brand-title {
            font-size: 24px;
        }

        .brand-description {
            font-size: 10.5px;
        }

        .login-card {
            padding: 23px 15px 21px;
        }

        .login-title {
            font-size: 22px;
        }

        input,
        button[type="submit"] {
            height: 44px;
        }
    }

    @media (prefers-reduced-motion: reduce) {

        *,
        *::before,
        *::after {
            transition: none !important;
        }
    }
    </style>
</head>

<body>

    <div class="login-container">

        <div class="login-shell">

            {{-- BRAND PANEL --}}
            <aside class="brand-panel">

                <div class="brand-content">

                    <div class="brand-logo">
                        SAÉ<br>CAFE<br>ROJEL
                    </div>

                    <div class="brand-kicker">
                        Member Loyalty System
                    </div>

                    <h1 class="brand-title">
                        Selamat datang kembali.
                    </h1>

                    <p class="brand-description">
                        Masuk ke akun member kamu untuk melihat
                        point, reward, dan riwayat transaksi di
                        SAÉ CAFE ROJEL.
                    </p>

                    <div class="loyalty-card">
                        <div class="loyalty-label">
                            Member Benefit
                        </div>

                        <div class="loyalty-title">
                            Point &amp; Reward
                        </div>

                        <div class="loyalty-text">
                            Nikmati pengalaman loyalty yang lebih
                            praktis setiap kali berkunjung ke café.
                        </div>
                    </div>

                </div>

                <div class="brand-bottom">
                    SAÉ CAFE ROJEL • Member Area
                </div>

            </aside>

            {{-- LOGIN FORM --}}
            <section class="login-card">

                <div class="login-heading">
                    <div class="login-eyebrow">
                        Welcome Back
                    </div>

                    <h2 class="login-title">
                        Masuk ke Akun
                    </h2>

                    <p class="login-description">
                        Gunakan nomor WhatsApp untuk Customer atau username untuk Admin dan Staff.
                    </p>
                </div>

                @if ($errors->any())
                <div class="error">
                    {{ $errors->first() }}
                </div>
                @endif

                <form action="{{ route('login.authenticate') }}" method="POST">

                    @csrf

                    <div class="form-group">
                        <label for="username">
                            Username / Nomor WhatsApp
                        </label>

                        <div class="input-wrap">
                            <input type="text" id="username" name="username" value="{{ old('username') }}"
                                placeholder="Nomor WhatsApp / username Admin / Staff" autocomplete="username"
                                inputmode="text" maxlength="100" autocapitalize="none" spellcheck="false" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">
                            Password
                        </label>

                        <div class="input-wrap">
                            <input class="password-input" type="password" id="password" name="password"
                                placeholder="Masukkan password" autocomplete="current-password" required>

                            <button type="button" class="password-toggle" onclick="togglePassword()"
                                aria-label="Tampilkan password">
                                ◉
                            </button>
                        </div>
                                       </div>

                    {{-- LUPA PASSWORD --}}
                    <div class="forgot-link">
                        <a href="{{ route('password.forgot') }}">
                            Lupa password?
                        </a>
                    </div>

                    <button type="submit">
                        Masuk
                    </button>

                </form>

                <div class="register-link">
                    Belum punya akun?
                    <a href="{{ route('register') }}">
                        Daftar Member
                    </a>
                </div>

            </section>

        </div>

    </div>

    <script>
    // Nomor telepon: hanya angka dan harus diawali 08.
    function togglePassword() {
        const input = document.getElementById('password');
        const button = document.querySelector('.password-toggle');

        if (!input || !button) {
            return;
        }

        const isPassword = input.type === 'password';

        input.type = isPassword ? 'text' : 'password';

        button.textContent = isPassword ? '◉' : '◌';

        button.setAttribute(
            'aria-label',
            isPassword ?
            'Sembunyikan password' :
            'Tampilkan password'
        );
    }

    function togglePassword() {
        const input = document.getElementById('password');
        const button = document.querySelector('.password-toggle');

        if (!input || !button) {
            return;
        }

        const isPassword = input.type === 'password';

        input.type = isPassword ? 'text' : 'password';

        button.textContent = isPassword ? '◉' : '◌';

        button.setAttribute(
            'aria-label',
            isPassword ?
            'Sembunyikan password' :
            'Tampilkan password'
        );
    }
    </script>

</body>

</html>