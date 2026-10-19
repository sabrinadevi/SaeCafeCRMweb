@extends('layouts.customer')

@section('title', 'Redemption - SAÉ CAFE ROJEL')
@section('mobile_title', 'Redemption')

@section('content')

<style>
/* =========================================================
   REDEMPTION PAGE
========================================================= */

.redemption-page {
    width: 100%;
    max-width: 560px;
    margin: 0 auto;

    padding: 24px;

    text-align: center;

    background: #FFFDF9;

    border: 1px solid #E9DED1;
    border-radius: 18px;

    box-shadow: 0 10px 30px rgba(70, 45, 25, .05);
}


/* =========================================================
   HEADER
========================================================= */

.redemption-label {
    margin-top: 20px;

    color: #8B796B;

    font-size: 10px;

    letter-spacing: .1em;

    text-transform: uppercase;
}

.redemption-title {
    margin: 7px 0 4px;

    color: #4B2D1C;

    font-size: 24px;

    font-weight: 700;
}

.redemption-subtitle {
    margin: 0;

    color: #8B796B;

    font-size: 12px;
}


/* =========================================================
   QR CODE
========================================================= */

.redemption-qr {
    width: 180px;
    height: 180px;

    display: grid;
    place-items: center;

    margin: 22px auto 16px;

    padding: 8px;

    background: #FFFFFF;

    border: 1px solid #E9DED1;
    border-radius: 14px;

    overflow: hidden;
}

.redemption-qr svg {
    display: block;

    width: 100%;
    height: 100%;

    max-width: 164px;
    max-height: 164px;
}


/* =========================================================
   CODE
========================================================= */

.redemption-code-label {
    color: #8B796B;

    font-size: 11px;
}

.redemption-code {
    margin-top: 4px;

    color: #4B2D1C;

    font-size: 24px;

    font-weight: 700;

    letter-spacing: .08em;

    word-break: break-word;
}


/* =========================================================
   INFO CARDS
========================================================= */

.redemption-info {
    margin-top: 16px;

    display: grid;

    grid-template-columns:
        repeat(2, minmax(0, 1fr));

    gap: 10px;
}

.redemption-info-card {
    min-height: 72px;

    display: flex;

    flex-direction: column;

    align-items: center;
    justify-content: center;

    padding: 12px;

    border: 1px solid #E9DED1;

    border-radius: 12px;

    background: #FFFFFF;
}

.redemption-info-label {
    color: #8B796B;

    font-size: 10px;
}

.redemption-info-value {
    margin-top: 3px;

    color: #171311;

    font-size: 16px;

    font-weight: 700;
}


/* =================

========================================
   BACK BUTTON
========================================================= */

.redemption-back {
    display: inline-flex;

    align-items: center;
    justify-content: center;

    gap: 7px;

    width: 100%;

    min-height: 42px;

    margin-top: 16px;

    padding: 10px 16px;

    border-radius: 10px;

    background: #4B2D1C;

    color: #FFFFFF;

    font-size: 11px;

    font-weight: 700;

    text-decoration: none;

    transition:
        background-color .2s ease,
        transform .2s ease;
}

.redemption-back:hover {
    background: #5B3927;

    transform: translateY(-1px);
}


/* =========================================================
   NOTE
========================================================= */

.redemption-note {
    margin-top: 16px;

    padding: 12px;

    border-radius: 12px;

    background: #FFF4DF;

    color: #765C45;

    font-size: 11px;

    line-height: 1.6;
}







/* =========================================================
   RESPONSIVE
========================================================= */

/* =========================================================
   1. DESKTOP: 721px KE ATAS
========================================================= */
@media (min-width: 721px) {

    .redemption-page {
        width: 100%;
        max-width: 560px;
        margin: 0 auto;
        padding: 30px 24px 26px;

        text-align: center;

        background: #FFFDF9;
        border: 1px solid #E9DED1;
        border-radius: 34px;

        box-shadow: 0 10px 30px rgba(70, 45, 25, 0.08);
        box-sizing: border-box;
    }

    .redemption-title {
        font-size: 24px;
    }

    .redemption-qr {
        width: 180px;
        height: 180px;
        padding: 8px;
        border-radius: 18px;
    }

    .redemption-qr svg {
        max-width: 164px;
        max-height: 164px;
    }

    .redemption-code {
        font-size: 24px;
    }

    .redemption-info-card {
        min-height: 72px;
        border-radius: 14px;
    }

    .redemption-back {
        min-height: 44px;
        border-radius: 12px;
    }

    .redemption-note {
        border-radius: 14px;
    }
}






/* =========================================================
   2. TABLET: 561px–720px
========================================================= */
@media (min-width: 561px) and (max-width: 720px) {

    /* KARTU UTAMA REDEMPTION */
    .redemption-page {
        width: 100%;
        max-width: 560px;
        margin: 0 auto;
        padding: 22px 20px;

        border: 1px solid #E9DED1;
        border-radius: 16px;
        background: #FFFDF9;
        box-shadow: 0 10px 30px rgba(70, 45, 25, 0.08);

        box-sizing: border-box;
    }

    /* JUDUL DAN TEKS */
    .redemption-label {
        margin-top: 16px;
        font-size: 10px;
    }

    .redemption-title {
        margin: 7px 0 4px;
        font-size: 23px;
        line-height: 1.3;
    }

    .redemption-subtitle {
        font-size: 12px;
        line-height: 1.5;
    }

    /* QR CODE */
    .redemption-qr {
        width: 170px;
        height: 170px;
        margin: 20px auto 16px;
        padding: 7px;
        border-radius: 20px;
        box-sizing: border-box;
    }

    .redemption-qr svg {
        display: block;
        width: 100%;
        height: 100%;
        max-width: 154px;
        max-height: 154px;
    }

    /* KODE REDEMPTION */
    .redemption-code-label {
        font-size: 11px;
    }

    .redemption-code {
        margin-top: 4px;
        font-size: 22px;
        letter-spacing: 0.06em;
        line-height: 1.4;
        overflow-wrap: anywhere;
    }

    /* INFORMASI POIN DAN STATUS */
    .redemption-info {
        margin-top: 16px;
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 10px;
    }

    .redemption-info-card {
        min-width: 0;
        min-height: 70px;
        padding: 10px;
        border-radius: 14px;
        box-sizing: border-box;
    }

    .redemption-info-label {
        font-size: 10px;
    }

    .redemption-info-value {
        font-size: 16px;
        overflow-wrap: anywhere;
    }

    /* TOMBOL KEMBALI */
    .redemption-back {
        min-height: 42px;
        margin-top: 16px;
        padding: 10px 14px;
        border-radius: 12px;
        font-size: 11px;
        box-sizing: border-box;
    }

    /* CATATAN */
    .redemption-note {
        margin-top: 16px;
        padding: 12px;
        border-radius: 14px;
        font-size: 11px;
        line-height: 1.6;
        overflow-wrap: anywhere;
    }

}




/* =========================================================
   3. MOBILE: 381px–560px
========================================================= */
@media (min-width: 381px) and (max-width: 560px) {

    /* KARTU UTAMA REDEMPTION */
    .redemption-page {
        width: 100%;
        max-width: none;
        margin: 0 auto;
        padding: 20px 16px;

        border-radius: 16px;
        box-sizing: border-box;
    }

    /* JUDUL DAN TEKS */
    .redemption-label {
        margin-top: 16px;
        font-size: 10px;
    }

    .redemption-title {
        font-size: 22px;
        line-height: 1.3;
        overflow-wrap: anywhere;
    }

    .redemption-subtitle {
        font-size: 11px;
        line-height: 1.5;
    }

    /* QR CODE */
    .redemption-qr {
        width: 155px;
        height: 155px;
        margin: 20px auto 16px;
        padding: 7px;

        box-sizing: border-box;
    }

    .redemption-qr svg {
        display: block;
        width: 100%;
        height: 100%;
        max-width: 141px;
        max-height: 141px;
    }

    /* KODE REDEMPTION */
    .redemption-code-label {
        font-size: 10px;
    }

    .redemption-code {
        margin-top: 4px;
        font-size: 20px;
        line-height: 1.4;
        letter-spacing: 0.05em;
        overflow-wrap: anywhere;
    }

    /* INFORMASI POIN DAN STATUS */
    .redemption-info {
        margin-top: 14px;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 8px;
    }

    .redemption-info-card {
        min-width: 0;
        min-height: 68px;
        padding: 10px 7px;

        box-sizing: border-box;
    }

    .redemption-info-label {
        font-size: 9px;
    }

    .redemption-info-value {
        font-size: 15px;
        overflow-wrap: anywhere;
    }

    /* TOMBOL KEMBALI */
    .redemption-back {
        min-height: 42px;
        margin-top: 14px;
        font-size: 10px;
        box-sizing: border-box;
    }

    /* CATATAN */
    .redemption-note {
        margin-top: 14px;
        padding: 11px;
        font-size: 10px;
        line-height: 1.5;
        overflow-wrap: anywhere;
        box-sizing: border-box;
    }

}


/* =========================================================
   4. MOBILE KECIL: 380px KE BAWAH
========================================================= */
@media (max-width: 380px) {

    /* KARTU UTAMA REDEMPTION */
    .redemption-page {
        width: 100%;
        max-width: none;
        margin: 0 auto;
        padding: 16px 10px;
        border-radius: 14px;
        box-sizing: border-box;
    }

    /* LABEL DAN JUDUL */
    .redemption-label {
        margin-top: 12px;
        font-size: 9px;
        letter-spacing: 0.08em;
    }

    .redemption-title {
        margin: 6px 0 4px;
        font-size: 20px;
        line-height: 1.3;
        overflow-wrap: anywhere;
    }

    .redemption-subtitle {
        font-size: 10px;
        line-height: 1.5;
    }

    /* QR CODE */
    .redemption-qr {
        display: grid;
        place-items: center;

        width: 135px;
        height: 135px;
        margin: 18px auto 14px;
        padding: 6px;

        border-radius: 12px;
        box-sizing: border-box;
        overflow: hidden;
    }

    .redemption-qr svg {
        display: block;
        width: 100%;
        height: 100%;
        max-width: 123px;
        max-height: 123px;
    }

    /* KODE REDEMPTION */
    .redemption-code-label {
        font-size: 9px;
    }

    .redemption-code {
        margin-top: 4px;
        font-size: 17px;
        line-height: 1.4;
        letter-spacing: 0.03em;
        overflow-wrap: anywhere;
    }

    /* KARTU INFORMASI POIN DAN STATUS */
    .redemption-info {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 7px;
        margin-top: 12px;
    }

    .redemption-info-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        min-width: 0;
        min-height: 64px;
        padding: 9px 5px;

        border-radius: 10px;
        box-sizing: border-box;
    }

    .redemption-info-label {
        font-size: 8px;
        line-height: 1.4;
    }

    .redemption-info-value {
        margin-top: 3px;
        font-size: 13px;
        overflow-wrap: anywhere;
    }

    /* TOMBOL KEMBALI */
    .redemption-back {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        width: 100%;
        min-height: 38px;
        margin-top: 12px;
        padding: 9px 8px;

        border-radius: 8px;
        font-size: 10px;
        box-sizing: border-box;
    }

    /* CATATAN */
    .redemption-note {
        margin-top: 12px;
        padding: 10px 8px;

        border-radius: 10px;
        font-size: 9px;
        line-height: 1.5;
        overflow-wrap: anywhere;
        box-sizing: border-box;
    }

}

</style>


<div class="redemption-page">


    {{-- =====================================================
         BACK BUTTON
    ====================================================== --}}

    <div class="redemption-label">
        Tunjukkan ke Kasir
    </div>


    <h1 class="redemption-title">
        {{ $redemption->reward->reward_name }}
    </h1>


    <p class="redemption-subtitle">
        Redemption menunggu konfirmasi staff.
    </p>


    {{-- =====================================================
         QR CODE
    ====================================================== --}}

    <div class="redemption-qr">

        {!! base64_decode($svg) !!}

    </div>


    {{-- =====================================================
         REDEMPTION CODE
    ====================================================== --}}

    <div class="redemption-code-label">
        Kode Redemption
    </div>

    <div class="redemption-code">
        {{ $redemption->redemption_code }}
    </div>


    {{-- =====================================================
         INFO
    ====================================================== --}}

    <div class="redemption-info">


        <div class="redemption-info-card">

            <div class="redemption-info-label">
                Point Digunakan
            </div>

            <div class="redemption-info-value">
                {{ $redemption->point_used }}
            </div>

        </div>


        <div class="redemption-info-card">

            <div class="redemption-info-label">
                Status
            </div>

            <div class="redemption-info-value">
                {{ ucfirst($redemption->status) }}
            </div>

        </div>


    </div>


    {{-- =====================================================
         BACK TO REWARD
    ====================================================== --}}

    <a href="{{ route('customer.reward') }}" class="redemption-back">
        Kembali ke Reward
    </a>


    {{-- =====================================================
         NOTE
    ====================================================== --}}

    <div class="redemption-note">

        Point belum dipotong.
        Point akan berkurang setelah staff memindai
        dan mengonfirmasi QR ini.

    </div>


</div>

@endsection