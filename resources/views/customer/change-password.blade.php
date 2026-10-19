
@extends('layouts.customer')

@section('title', 'Ubah Password - SAÉ CAFE ROJEL')
@section('mobile_title', 'Ubah Password')

@section('content')

<style>
    .forgot-password-card {
        width: calc(100% - 32px);
        max-width: 520px;
        margin: 35px auto;
        padding: 26px;
        background: #fffdf9;
        border: 1px solid #e9ded1;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(75, 45, 28, .06);
        box-sizing: border-box;
    }

    .forgot-password-title {
        margin: 0;
        color: #4b2d1c;
        font-size: 24px;
        font-weight: 700;
    }

    .forgot-password-subtitle {
        margin-top: 7px;
        color: #8b796b;
        font-size: 12px;
        line-height: 1.7;
    }

    .forgot-password-form {
        display: grid;
        gap: 16px;
        margin-top: 24px;
    }

    .forgot-password-field {
        display: block;
        color: #4b2d1c;
        font-size: 12px;
        font-weight: 700;
    }

    .forgot-password-input-wrap {
        position: relative;
        margin-top: 7px;
    }

    .forgot-password-input {
        display: block;
        width: 100%;
        height: 47px;
        padding: 0 14px;
        border: 1px solid #e9ded1;
        border-radius: 10px;
        background: #fff;
        color: #33251d;
        font-family: inherit;
        font-size: 13px;
        outline: none;
        box-sizing: border-box;
        transition: border-color .2s, box-shadow .2s;
    }

    .forgot-password-input:focus {
        border-color: #70462f;
        box-shadow: 0 0 0 3px rgba(84, 44, 24, .08);
    }

    .forgot-password-input::placeholder {
        color: #b2a59a;
    }

    .forgot-password-input.has-toggle {
        padding-right: 48px;
    }

    .forgot-password-toggle {
        position: absolute;
        top: 50%;
        right: 7px;
        width: 34px;
        height: 34px;
        display: grid;
        place-items: center;
        transform: translateY(-50%);
        border: 0;
        border-radius: 8px;
        background: transparent;
        color: #89776a;
        cursor: pointer;
        font-size: 17px;
    }

    .forgot-password-toggle:hover {
        background: #f8f1e9;
        color: #4b2d1c;
    }

    .forgot-password-error {
        margin-top: 7px;
        color: #b84444;
        font-size: 11px;
        font-weight: 400;
    }

    .forgot-password-alert {
        margin-top: 16px;
        padding: 12px;
        border-radius: 10px;
        font-size: 12px;
        line-height: 1.6;
    }

    .forgot-password-alert.error {
        border: 1px solid #f0c8c5;
        background: #fff0ef;
        color: #b84444;
    }

    .forgot-password-alert.success {
        border: 1px solid #d7ecd9;
        background: #eef9ef;
        color: #2d7c49;
    }

    .forgot-password-info {
        padding: 13px 14px;
        border-radius: 10px;
        background: #f8f4ef;
        color: #827468;
        font-size: 11px;
        line-height: 1.7;
    }

    .forgot-password-actions {
        display: flex;
        gap: 10px;
        margin-top: 5px;
    }

    .forgot-password-button {
        flex: 1;
        min-height: 45px;
        padding: 11px 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        font-family: inherit;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        box-sizing: border-box;
        transition: background .2s, border-color .2s;
    }

    .forgot-password-cancel {
        border: 1px solid #e9ded1;
        background: #fff;
        color: #6e6258;
    }

    .forgot-password-cancel:hover {
        background: #f8f4ef;
    }

    .forgot-password-submit {
        border: 0;
        background: #4b2d1c;
        color: #fff;
    }

    .forgot-password-submit:hover {
        background: #362014;
    }

    @media (max-width: 600px) {
        .forgot-password-card {
            margin: 22px auto;
            padding: 22px 18px;
            border-radius: 15px;
        }

        .forgot-password-title {
            font-size: 22px;
        }

        .forgot-password-actions {
            flex-direction: column-reverse;
        }

        .forgot-password-button {
            width: 100%;
        }
    }
</style>

<div class="forgot-password-card">

    <h1 class="forgot-password-title">
        Ubah Password
    </h1>

    <p class="forgot-password-subtitle">
        Masukkan email yang terdaftar dan password baru.
        Kami akan mengirim kode OTP ke email untuk memverifikasi
        perubahan password kamu.
    </p>

    @if ($errors->any())
        <div class="forgot-password-alert error" role="alert">
            {{ $errors->first() }}
        </div>
    @endif

    @if (session('success'))
        <div class="forgot-password-alert success" role="status">
            {{ session('success') }}
        </div>
    @endif

    <form
        method="POST"
        action="{{ route('password.forgot.send') }}"
        class="forgot-password-form"
    >
        @csrf

        {{-- EMAIL --}}
        <div>
            <label for="reset_email" class="forgot-password-field">
                Email Terdaftar
            </label>

            <div class="forgot-password-input-wrap">
                <input
                    id="reset_email"
                    name="email"
                    type="email"
                    class="forgot-password-input"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email terdaftar"
                    autocomplete="email"
                    maxlength="255"
                    required
                >
            </div>

            @error('email')
                <div class="forgot-password-error">{{ $message }}</div>
            @enderror
        </div>

        {{-- PASSWORD BARU --}}
        <div>
            <label for="reset_password" class="forgot-password-field">
                Password Baru
            </label>

            <div class="forgot-password-input-wrap">
                <input
                    id="reset_password"
                    name="password"
                    type="password"
                    class="forgot-password-input has-toggle"
                    placeholder="Masukkan password baru"
                    autocomplete="new-password"
                    minlength="8"
                    required
                >

                <button
                    type="button"
                    class="forgot-password-toggle"
                    onclick="toggleResetPassword('reset_password', this)"
                    aria-label="Tampilkan password"
                >◉</button>
            </div>

            @error('password')
                <div class="forgot-password-error">{{ $message }}</div>
            @enderror
        </div>

        {{-- KONFIRMASI PASSWORD --}}
        <div>
            <label
                for="reset_password_confirmation"
                class="forgot-password-field"
            >
                Konfirmasi Password Baru
            </label>

            <div class="forgot-password-input-wrap">
                <input
                    id="reset_password_confirmation"
                    name="password_confirmation"
                    type="password"
                    class="forgot-password-input has-toggle"
                    placeholder="Masukkan kembali password baru"
                    autocomplete="new-password"
                    minlength="8"
                    required
                >

                <button
                    type="button"
                    class="forgot-password-toggle"
                    onclick="toggleResetPassword('reset_password_confirmation', this)"
                    aria-label="Tampilkan password"
                >◉</button>
            </div>

            @error('password_confirmation')
                <div class="forgot-password-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="forgot-password-info">
            Password baru minimal <strong>8 karakter</strong>.
            Pastikan password dan konfirmasinya sama.
            Password lama tetap berlaku sampai kode OTP berhasil diverifikasi.
        </div>

        <div class="forgot-password-actions">
            <a
                href="{{ route('login') }}"
                class="forgot-password-button forgot-password-cancel"
            >
                Batal
            </a>

            <button
                type="submit"
                class="forgot-password-button forgot-password-submit"
            >
                Kirim Kode OTP
            </button>
        </div>
    </form>
</div>

<script>
function toggleResetPassword(inputId, button) {
    const input = document.getElementById(inputId);

    if (!input) {
        return;
    }

    const showPassword = input.type === 'password';

    input.type = showPassword ? 'text' : 'password';
    button.textContent = showPassword ? '◌' : '◉';

    button.setAttribute(
        'aria-label',
        showPassword ? 'Sembunyikan password' : 'Tampilkan password'
    );
}
</script>

@endsection
