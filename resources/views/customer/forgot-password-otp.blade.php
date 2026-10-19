
@extends('layouts.customer')

@section('title', 'Verifikasi OTP - SAÉ CAFE ROJEL')
@section('mobile_title', 'Verifikasi OTP')

@section('content')

<style>
    .reset-otp-card {
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

    .reset-otp-icon {
        width: 54px;
        height: 54px;
        display: grid;
        place-items: center;
        margin-bottom: 18px;
        border-radius: 16px;
        background: #f5ebe0;
        color: #542C18;
        font-size: 25px;
    }

    .reset-otp-title {
        margin: 0;
        color: #4b2d1c;
        font-size: 24px;
        font-weight: 700;
    }

    .reset-otp-subtitle {
        margin-top: 8px;
        color: #8b796b;
        font-size: 12px;
        line-height: 1.7;
    }

    .reset-otp-alert {
        margin-top: 16px;
        padding: 12px;
        border-radius: 10px;
        font-size: 12px;
        line-height: 1.6;
    }

    .reset-otp-error {
        border: 1px solid #f0c8c5;
        background: #fff0ef;
        color: #b84444;
    }

    .reset-otp-success {
        border: 1px solid #d7ecd9;
        background: #eef9ef;
        color: #2d7c49;
    }

    .reset-otp-form {
        display: grid;
        gap: 16px;
        margin-top: 25px;
    }

    .reset-otp-label {
        display: block;
        margin-bottom: 9px;
        color: #4b2d1c;
        font-size: 12px;
        font-weight: 700;
    }

    .reset-otp-input {
        display: block;
        width: 100%;
        height: 56px;
        padding: 0 12px;
        border: 1px solid #e9ded1;
        border-radius: 12px;
        outline: none;
        box-sizing: border-box;
        background: #fff;
        color: #4b2d1c;
        font-family: inherit;
        font-size: 25px;
        font-weight: 700;
        letter-spacing: 10px;
        text-align: center;
        transition: border-color .2s, box-shadow .2s;
    }

    .reset-otp-input:focus {
        border-color: #70462f;
        box-shadow: 0 0 0 3px rgba(84, 44, 24, .08);
    }

    .reset-otp-hint {
        margin-top: 8px;
        color: #8b796b;
        font-size: 11px;
        line-height: 1.6;
    }

    .reset-otp-timer {
        margin-top: 2px;
        color: #786455;
        font-size: 12px;
        text-align: center;
    }

    .reset-otp-timer strong {
        color: #542C18;
    }

    .reset-otp-actions {
        display: grid;
        gap: 10px;
        margin-top: 4px;
    }

    .reset-otp-button {
        width: 100%;
        min-height: 46px;
        padding: 12px 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        font-family: inherit;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        box-sizing: border-box;
        cursor: pointer;
        transition: background .2s, opacity .2s;
    }

    .reset-otp-verify {
        border: 0;
        background: #4b2d1c;
        color: #fff;
    }

    .reset-otp-verify:hover {
        background: #362014;
    }

    .reset-otp-resend {
        border: 1px solid #e9ded1;
        background: #fff;
        color: #542C18;
    }

    .reset-otp-resend:hover:not(:disabled) {
        background: #f8f1e9;
    }

    .reset-otp-resend:disabled {
        opacity: .5;
        cursor: not-allowed;
    }

    .reset-otp-back {
        display: block;
        margin-top: 18px;
        color: #806a59;
        font-size: 11px;
        text-align: center;
        text-decoration: none;
    }

    .reset-otp-back:hover {
        color: #4b2d1c;
        text-decoration: underline;
    }

    @media (max-width: 600px) {
        .reset-otp-card {
            margin: 22px auto;
            padding: 22px 18px;
            border-radius: 15px;
        }

        .reset-otp-title {
            font-size: 22px;
        }

        .reset-otp-input {
            height: 53px;
            font-size: 23px;
            letter-spacing: 8px;
        }
    }
</style>

<div class="reset-otp-card">

    <div class="reset-otp-icon" aria-hidden="true">✉</div>

    <h1 class="reset-otp-title">Verifikasi OTP</h1>

    <p class="reset-otp-subtitle">
        Kode verifikasi telah dikirim ke email terdaftar kamu.
        Masukkan kode enam digit untuk menyelesaikan perubahan password.
    </p>

    @if ($errors->any())
        <div class="reset-otp-alert reset-otp-error" role="alert">
            {{ $errors->first() }}
        </div>
    @endif

    @if (session('success'))
        <div class="reset-otp-alert reset-otp-success" role="status">
            {{ session('success') }}
        </div>
    @endif

    <form
        method="POST"
        action="{{ route('password.forgot.verify.store') }}"
        class="reset-otp-form"
    >
        @csrf

        <div>
            <label for="otp" class="reset-otp-label">
                Kode OTP
            </label>

            <input
                type="text"
                id="otp"
                name="otp"
                class="reset-otp-input"
                value="{{ old('otp') }}"
                placeholder="••••••"
                inputmode="numeric"
                autocomplete="one-time-code"
                pattern="[0-9]{6}"
                minlength="6"
                maxlength="6"
                aria-describedby="otp-hint"
                required
                autofocus
            >

            <p id="otp-hint" class="reset-otp-hint">
                Periksa kotak masuk email kamu. Jika tidak ada,
                periksa juga folder Spam.
            </p>
        </div>

        <div class="reset-otp-timer" aria-live="polite">
            Kirim ulang kode tersedia dalam
            <strong id="otp-countdown">05:00</strong>
        </div>

        <div class="reset-otp-actions">
            <button
                type="submit"
                class="reset-otp-button reset-otp-verify"
            >
                Verifikasi Ubah Password
            </button>
        </div>
    </form>

    <form
        id="resend-otp-form"
        method="POST"
        action="{{ route('password.forgot.verify.resend') }}"
        style="margin-top:10px"
    >
        @csrf

        <button
            type="submit"
            id="resend-otp-button"
            class="reset-otp-button reset-otp-resend"
            disabled
        >
            Kirim Ulang Kode OTP
        </button>
    </form>

    <a href="{{ route('password.forgot') }}" class="reset-otp-back">
        Kembali ke halaman Ubah Password
    </a>
</div>

<script>
(function () {
    const countdownElement = document.getElementById('otp-countdown');
    const resendButton = document.getElementById('resend-otp-button');

    if (!countdownElement || !resendButton) {
        return;
    }

    let seconds = Math.max(
        0,
        Number(@json($resendSeconds ?? 0)) || 0
    );

    function renderCountdown() {
        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = seconds % 60;

        countdownElement.textContent =
            String(minutes).padStart(2, '0') + ':' +
            String(remainingSeconds).padStart(2, '0');

        resendButton.disabled = seconds > 0;
        resendButton.textContent = seconds > 0
            ? 'Kirim Ulang Kode OTP'
            : 'Kirim Ulang Kode OTP';
    }

    renderCountdown();

    if (seconds > 0) {
        const timer = setInterval(function () {
            seconds = Math.max(0, seconds - 1);
            renderCountdown();

            if (seconds === 0) {
                clearInterval(timer);
            }
        }, 1000);
    }
})();
</script>

@endsection
