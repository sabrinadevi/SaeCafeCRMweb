
@extends('layouts.customer')

@section('title', 'Verifikasi OTP - SAÉ CAFE ROJEL')

@section('content')

<div style="
    min-height: calc(100vh - 80px);
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f7f3ed;
    padding: 24px 16px;
">
    <div style="
        width: min(430px, 100%);
        box-sizing: border-box;
        background: #fffaf2;
        border: 1px solid #e8ddd1;
        border-radius: 22px;
        padding: 24px;
        box-shadow: 0 16px 40px rgba(75,45,28,.08);
        transform: translateY(-45px);
    ">

        <div style="
            font-size: 10px;
            color: #806f62;
            letter-spacing: .08em;
            text-transform: uppercase;
        ">
            Verifikasi Member
        </div>

        <h1 style="
            margin: 6px 0 12px;
            font-size: 22px;
            line-height: 1.3;
            color: #3b2418;
        ">
            Masukkan Kode OTP
        </h1>

        <p style="
            margin: 0 0 16px;
            font-size: 9px;
            color: #806f62;
            line-height: 1.6;
        ">
            Kode verifikasi telah dikirim ke email Anda dan
            berlaku selama 5 menit. Silakan periksa kotak
            masuk atau folder spam.
        </p>

        @if($errors->any())
            <div style="
                margin: 14px 0;
                padding: 10px;
                border-radius: 10px;
                background: #fff0f0;
                color: #a12727;
                font-size: 11px;
                line-height: 1.6;
            ">
                {{ $errors->first() }}
            </div>
        @endif

        @if(session('success'))
            <div style="
                margin: 14px 0;
                padding: 10px;
                border-radius: 10px;
                background: #edf7ef;
                color: #21673a;
                font-size: 11px;
                line-height: 1.6;
            ">
                {{ session('success') }}
            </div>
        @endif

        <form
            method="POST"
            action="{{ route('register.verify.store') }}"
        >
            @csrf

            <input
                type="text"
                name="otp"
                inputmode="numeric"
                pattern="[0-9]{6}"
                maxlength="6"
                minlength="6"
                autocomplete="one-time-code"
                placeholder="••••••"
                style="
                    width: 100%;
                    box-sizing: border-box;
                    text-align: center;
                    letter-spacing: .4em;
                    font-size: 20px;
                    padding: 12px;
                    border: 1px solid #ded2c6;
                    border-radius: 12px;
                    outline: none;
                    background: #fff;
                    color: #3b2418;
                "
                required
            >

            <button
                type="submit"
                style="
                    width: 100%;
                    margin-top: 12px;
                    padding: 12px;
                    border: 0;
                    border-radius: 12px;
                    background: #70462f;
                    color: #fff;
                    font-size: 13px;
                    font-weight: 600;
                    cursor: pointer;
                "
            >
                Verifikasi & Aktifkan Member
            </button>
        </form>

        <div style="
            margin-top: 17px;
            text-align: center;
            font-size: 9px;
            color: #806f62;
            line-height: 1.6;
        ">
            Belum menerima email atau kode OTP sudah kedaluwarsa?
        </div>

        <form
            id="resendOtpForm"
            method="POST"
            action="{{ route('register.verify.resend') }}"
        >
            @csrf

            <button
                id="resendOtpButton"
                type="submit"
                @if(($resendSeconds ?? 0) > 0) disabled @endif
                style="
                    width: 100%;
                    margin-top: 9px;
                    padding: 11px;
                    border: 1px solid #4a2e1f;
                    border-radius: 12px;
                    background: #fffaf2;
                    color: #4a2e1f;
                    font-size: 12px;
                    font-weight: 600;
                    cursor: pointer;
                    transition: opacity .2s;
                "
            >
                <span id="resendOtpLabel">Kirim Ulang Kode OTP</span>
                <span id="resendOtpCountdown">
                    @if(($resendSeconds ?? 0) > 0)
                        ({{ sprintf('%02d:%02d', intdiv($resendSeconds, 60), $resendSeconds % 60) }})
                    @endif
                </span>
            </button>
        </form>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('resendOtpButton');
    const form = document.getElementById('resendOtpForm');
    const label = document.getElementById('resendOtpLabel');
    const countdown = document.getElementById('resendOtpCountdown');

    if (!button || !form || !label || !countdown) {
        return;
    }

    let remaining = Math.max(
        0,
        Number(@json($resendSeconds ?? 0))
    );

    function updateCountdown() {
        if (remaining > 0) {
            const minutes = Math.floor(remaining / 60);
            const seconds = remaining % 60;

            countdown.textContent =
                '(' +
                String(minutes).padStart(2, '0') +
                ':' +
                String(seconds).padStart(2, '0') +
                ')';

            button.disabled = true;
            button.style.opacity = '0.6';
            button.style.cursor = 'not-allowed';
        } else {
            countdown.textContent = '';
            button.disabled = false;
            button.style.opacity = '1';
            button.style.cursor = 'pointer';
        }
    }

    updateCountdown();

    const timer = setInterval(function () {
        if (remaining > 0) {
            remaining--;
            updateCountdown();
        }

        if (remaining <= 0) {
            clearInterval(timer);
        }
    }, 1000);

    form.addEventListener('submit', function () {
        button.disabled = true;
        label.textContent = 'Mengirim OTP...';
        countdown.textContent = '';
    });
});
</script>

@endsection
