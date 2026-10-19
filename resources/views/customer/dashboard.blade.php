@extends('layouts.customer')
@section('title','Beranda - SAÉ CAFE ROJEL')
@section('mobile_title','SAÉ CAFE ROJEL')
@section('content')
@php
$greeting = now()->hour < 11 ? 'Good Morning' : (now()->hour < 15 ? 'Good Afternoon' : (now()->hour < 19
            ? 'Good Evening' : 'Good Night' )); $name=$customer->nama ?? 'Customer';
            $memberCode = $customer->member_code ?? '-';
            $point = (int)($customer->saldo_point ?? 0);
            $favorites = $rewards ?? collect();
            @endphp
            <style>
            /* =========================================================
   CUSTOMER DASHBOARD
========================================================= */

            .customer-dashboard {
                display: grid;
                gap: 22px;
                width: 100%;
            }


            /* =========================================================
   GREETING
========================================================= */

         .customer-greeting {
    padding: 2px 4px 0;
}

.customer-greeting h1 {
    margin: 0;
    color: #171311;
    font-family: 'Poppins', sans-serif;
    line-height: 1.2;
    letter-spacing: -.03em;
}

.customer-greeting h1 .greeting-text {
    display: block;
    font-size: 20px;
    font-weight: 400;
    margin-bottom: 8px;
}

.customer-greeting h1 .customer-name {
    display: block;
    font-size: clamp(24px, 3vw, 32px);
    font-weight: 700;
}

.customer-greeting h1 .greeting-text,
.customer-greeting h1 .customer-name {
    display: block;
}


/* =========================================================
   TOP AREA
   DESKTOP:
   MEMBER 40% | REWARD 60%
========================================================= */

.customer-top {
    display: grid;

    grid-template-columns:
        minmax(0, 0.68fr) minmax(0, 1.32fr);

    gap: 20px;

    align-items: stretch;

    width: 100%;
}

            /* =========================================================
   MEMBER AREA
========================================================= */

            .customer-member-area {
                display: grid;

                grid-template-rows: auto auto;

                gap: 10px;

                min-width: 0;

                align-content: start;
            }

            .customer-member-card {
                position: relative;

                min-height: 205px;

                overflow: hidden;

                padding: 18px 20px;

                border: 1px solid #E7D9C8;

                border-radius: 14px;

                background: #FBF3E8;

                color: #201810;
            }

            .customer-member-card::after {
                content: "";

                position: absolute;

                width: 180px;
                height: 180px;

                right: -60px;
                bottom: -72px;

                border-radius: 50%;

                background:
                    radial-gradient(circle,
                        rgba(161, 95, 34, .22),
                        transparent 68%);

                pointer-events: none;
            }

            .customer-member-label {
                color: #7F6C5D;

                font-size: 13px;

                text-transform: uppercase;

                letter-spacing: .07em;

                font-weight: 600;
            }

            .customer-member-code {
                margin-top: 5px;

                color: #201810;

                font-size: 16px;

                font-weight: 600;
            }

            .customer-member-point {
                margin-top: 20px;

                display: flex;

                align-items: baseline;

                gap: 7px;
            }

            .customer-member-point strong {
                color: #201810;

                font-size: 46px;

                line-height: 1;

                font-weight: 700;
            }

            .customer-member-point span {
                color: #7A634F;

                font-size: 15px;
            }

            .customer-member-help {
                margin-top: 15px;

                max-width: 185px;

                color: #7B6A5E;

                font-size: 10px;

                line-height: 1.55;
            }

            .customer-member-qr {
                position: absolute;

                top: 14px;
                right: 14px;

                width: 56px;
                height: 56px;

                padding: 5px;

                display: grid;
                place-items: center;

                border: 1px solid #DFD1C1;
                border-radius: 9px;

                background: #FFFFFF;

                cursor: pointer;

                z-index: 5;
            }

            .customer-member-qr svg {
                display: block;

                width: 100%;
                height: 100%;

                max-width: 100%;
                max-height: 100%;
            }


            .customer-member-coffee {
                position: absolute;

                right: 4px;
                bottom: -18px;

                width: 85px;

                height: auto;

                z-index: 2;
            }


            /* =========================================================
   POINT RULE
========================================================= */

            .customer-point-rule {
                min-height: 40px;

                display: flex;

                align-items: center;
                justify-content: space-between;

                padding: 0 14px;

                border-radius: 8px;

                background: #4B2D1C;

                color: #FFFFFF;

                font-size: 10px;

                font-weight: 600;
            }

            .customer-point-rule span {
                min-width: 0;
            }

            .customer-point-rule strong {
                flex-shrink: 0;

                color: #F0C87B;

                font-size: 21px;
            }


            /* =========================================================
   SECTION / REWARD
========================================================= */

            .customer-section {
                min-width: 0;
                width: 100%;
                padding: 18px;

                border: 0;
                border-radius: 0;

                background: transparent;
            }

            /* =========================================================
   ALIGN REWARD FAVORITE WITH MEMBER CARD
========================================================= */

          

            .customer-section-head {
                display: flex;

                align-items: center;
                justify-content: space-between;

                gap: 10px;

                margin-bottom: 13px;
            }

            .customer-section-title {
                  margin: 16px 0 0;

                color: #171311;

                font-size: 15px;

                line-height: 1.25;

                font-weight: 700;
            }

            .customer-section-link {
                color: #6B432A;

                font-size: 10px;

                font-weight: 600;

                text-decoration: none;
            }

            .customer-see-all {
                display: inline-flex;

                align-items: center;
                justify-content: center;

                gap: 7px;

                min-height: 38px;

                padding: 8px 13px;

                border: 1px solid #4B2D1C;

                border-radius: 8px;

                background: #4B2D1C;

                color: #FFFFFF;

                font-size: 9px;

                font-weight: 700;

                white-space: nowrap;

                transition:
                    background-color .2s ease,
                    border-color .2s ease;
            }

            .customer-see-all:hover {
                background: #5B3927;

                border-color: #5B3927;
            }

            .customer-see-all span {
                font-size: 12px;

                line-height: 1;
            }


            /* =========================================================
   REWARD GRID
   DESKTOP = 4 COLUMNS
========================================================= */

          .customer-reward-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 14px;
    width: 75%;
    margin-top: 13px;
}


            /* =========================================================
   REWARD CARD
========================================================= */

            .customer-reward-card {
                min-width: 0;

                display: flex;

                flex-direction: column;

                overflow: hidden;

                border: 1px solid #E9DED1;

                border-radius: 12px;

                padding: 8px;

                background: #FFFFFF;
            }


            /* =========================================================
   REWARD IMAGE
========================================================= */

            .customer-reward-img {
    width: 100%;
    height: 95px;
    display: grid;
    place-items: center;
    overflow: hidden;
    background: #F7EEE2;
    border-radius: 10px;
}

            .customer-reward-img img {
                display: block;

                width: auto;
                height: auto;

                max-width: 88%;
                max-height: 92px;

                object-fit: contain;
            }

            .customer-reward-placeholder {
                font-size: 28px;
            }


            /* =========================================================
   REWARD BODY
========================================================= */

            .customer-reward-body {
                min-width: 0;

                flex: 1;

                display: flex;

                flex-direction: column;

                padding: 10px;
            }

            .customer-reward-name {
                overflow: hidden;

                min-height: 27px;

                color: #201810;

                font-size: 14px;

                line-height: 1.4;

                font-weight: 700;

                white-space: nowrap;

                text-overflow: ellipsis;
            }

        
.customer-reward-point {
    margin-top: -7px;
    color: #806A59;
    font-size: 8px;
    line-height: 1.3;
}

.customer-reward-point b {
    color: #806A59;
}

.customer-reward-point::first-letter {
    color: #C9892C;
}

.customer-reward-point::first-letter {
    font-size: 10px;
}


            /* =========================================================
   REWARD BUTTON
========================================================= */

            .customer-reward-cta {
                display: flex;

                align-items: center;
                justify-content: center;

                width: 100%;

                min-height: 34px;

                box-sizing: border-box;

                margin-top: 9px;

                padding: 7px 6px;

                border: 0;

                border-radius: 6px;

                background: #4B2D1C;

                color: #FFFFFF;

                text-align: center;
                text-decoration: none;

                font-size: 8px;

                line-height: 1.2;

                font-weight: 700;

                cursor: pointer;
            }

            .customer-reward-cta:hover {
                background: #5B3927;
            }


            /* =========================================================
   DISABLED REWARD BUTTON
========================================================= */

            .customer-reward-cta-disabled,
            .customer-reward-cta:disabled {
                display: flex;

                align-items: center;
                justify-content: center;

                width: 100%;

                min-height: 34px;

                box-sizing: border-box;

                margin-top: 9px;

                padding: 7px 6px;

                border: 0;

                border-radius: 6px;

                background: #D8D8D8 !important;

                color: #8A8A8A !important;

                cursor: not-allowed;

                opacity: 1;

                text-align: center;

                font-size: 8px;

                line-height: 1.2;

                font-weight: 700;
            }


            /* =========================================================
   BOTTOM AREA
========================================================= */

            .customer-bottom {
                display: grid;

                grid-template-columns:
                    minmax(0, 1fr) 250px;

                gap: 18px;

                align-items: start;
            }


            /* =========================================================
   ACTIVITY
========================================================= */

            .customer-activity-list {
                width: 100%;

                margin-top: 13px;

                overflow: hidden;

                border: 1px solid #EEE2D6;

                border-radius: 10px;

                background: #FFFFFF;
            }
.customer-activity-row {
    display: grid;
    grid-template-columns: 40px minmax(0, 1fr) auto;
    gap: 10px;
    align-items: center;
    min-height: 60px;
    padding: 10px 12px;
    background: #FFFFFF;
}

.customer-activity-row + .customer-activity-row {
    border-top: 1px solid #EEE7DF;
}

.customer-activity-icon {
    width:55px;
    height: 55px;
    display: grid;
    place-items: center;
    flex-shrink: 0;
    border-radius: 50%;
    background: #FBF3E8;
    color: #8A5A32;
}

.customer-activity-icon svg {
    width: 38px;
    height: 38px;
}

.customer-activity-reward-image {
    width: 65px;
    height: 65px;
    object-fit: cover;
    display: block;
    border-radius: 50%;
    transform: scale(1.3);
}

.customer-activity-icon.plus,
.customer-activity-icon.minus {
    background: #F7EBDD;
    color: #8A5A32;
}

.customer-activity-main {
    min-width: 0;
}

.customer-activity-date {
    margin-top: 0;
    color: #9A8C80;
    font-size: 8px;
}

.customer-activity-title {
    overflow: hidden;
    color: #251B16;
    font-size: 9px;
    font-weight: 600;
    white-space: nowrap;
    text-overflow: ellipsis;
}

.customer-activity-point {
    flex-shrink: 0;
    font-size: 9px;
    font-weight: 700;
    white-space: nowrap;
}

.customer-plus {
    color: #2D7C49;
}

.customer-minus {
    color: #B84444;
}
   

            .customer-activity-row+.customer-activity-row {
                border-top: 1px solid #EEE7DF;
            }

      

           .customer-activity-icon svg {
    width: 18px;
    height: 18px;
}

           .customer-activity-icon.plus {
    background: #F7EBDD;
    color: #8A5A32;
}

            .customer-activity-icon.minus {
                background: #F7EBDD;

                color: #8A5A32;
            }

            .customer-activity-main {
                min-width: 0;
            }

            .customer-activity-title {
                overflow: hidden;

                color: #251B16;

                font-size: 9px;

                font-weight: 600;

                white-space: nowrap;

                text-overflow: ellipsis;
            }

            .customer-activity-date {
                margin-top: 2px;

                color: #9A8C80;

                font-size: 8px;
            }

            .customer-activity-point {
                flex-shrink: 0;

                font-size: 9px;

                font-weight: 700;

                white-space: nowrap;
            }

            .customer-plus {
                color: #2D7C49;
            }

            .customer-minus {
                color: #B84444;
            }

            .customer-activity-empty {
                padding: 20px;

                color: #8B796B;

                font-size: 10px;
            }


            /* =========================================================
   ABOUT POINT
========================================================= */

            .customer-about {
                background: #FFF1DF;
            }
            .customer-activity-row {
    grid-template-columns: 40px minmax(0, 1fr) auto;
    gap: 8px;
    min-height: 58px;
    padding: 8px 10px;
}

.customer-activity-icon {
    width: 36px;
    height: 36px;
}

.customer-activity-reward-image {
    width: 28px;
    height: 28px;
}

.customer-activity-date {
    font-size: 8px;
}

.customer-activity-title {
    font-size: 9px;
}

.customer-activity-point {
    font-size: 8px;
}

            .customer-about h3 {
                margin: 0;

                color: #171311;

                font-size: 14px;

                font-weight: 700;
            }

            .customer-about ul {
                display: grid;

                gap: 9px;

                margin: 12px 0 0;

                padding: 0;

                list-style: none;
            }

            .customer-about li {
                display: flex;

                gap: 7px;

                color: #6F5D50;

                font-size: 9px;

                line-height: 1.55;
            }

        



         

        
            /* =========================================================
   VERY SMALL MOBILE
========================================================= */

       



            .customer-qr-modal {
                width: min(420px, calc(100vw - 32px));

                max-width: 420px;

                max-height: 90vh;

                margin: auto;

                padding: 0;

                border: 0;

                border-radius: 20px;

                background: #FFFFFF;

                overflow: auto;

                box-shadow:
                    0 20px 60px rgba(0, 0, 0, .22);
            }

            .customer-qr-modal::backdrop {
                background: rgba(0, 0, 0, .55);
            }

            .customer-qr-modal-content {
                position: relative;

                padding: 24px 20px 28px;

                text-align: center;

                font-family: Poppins, Arial, sans-serif;
            }

            .customer-qr-modal-close {
                position: absolute;

                top: 16px;
                right: 16px;

                width: 36px;
                height: 36px;

                display: grid;

                place-items: center;

                border: 0;

                border-radius: 50%;

                background: #F3EEE7;

                color: #171311;

                font-size: 20px;

                line-height: 1;

                cursor: pointer;
            }

            .customer-qr-modal-brand {
                margin-top: 24px;

                color: #4B2D1C;

                font-size: 22px;

                font-weight: 700;

                line-height: 1.2;
            }

            .customer-qr-modal-subtitle {
                margin-top: 5px;

                color: #8B796B;

                font-size: 12px;
            }


            /* =========================================================
   QR BOX
========================================================= */

            .customer-qr-box {
                width: min(200px, 62vw);

                aspect-ratio: 1 / 1;

                display: grid;

                place-items: center;

                margin: 22px auto 20px;

                padding: 10px;

                border: 1px solid #E9DED1;

                border-radius: 14px;

                background: #FFFFFF;

                overflow: hidden;
            }

            .customer-qr-box svg {
                display: block;

                width: 100%;

                height: 100%;

                max-width: 100%;

                max-height: 100%;

                object-fit: contain;
            }


            /* =========================================================
   MEMBER INFO
========================================================= */

            .customer-qr-member-code {
                color: #4B2D1C;

                font-size: 28px;

                line-height: 1.2;

                font-weight: 700;

                letter-spacing: .04em;
            }

            .customer-qr-member-name {
                margin-top: 5px;

                color: #6F5D50;

                font-size: 13px;
            }

            .customer-qr-point {
                margin-top: 18px;

                padding: 13px;

                border-radius: 12px;

                background: #FBF2E6;

                color: #171311;

                font-size: 18px;
            }

            .customer-qr-description {
                margin-top: 14px;

                color: #8B796B;

                font-size: 11px;

                line-height: 1.6;
            }
            .customer-reward-point-label {
            font-size: 7px !important;
            color: #806A59;
}













/* =========================================================
   1. DESKTOP: 721px KE ATAS
========================================================= */
@media (min-width: 721px) {

    .customer-top {
        align-items: start;
    }

     /* Tambahkan ukuran font di sini */
    .customer-member-label {
        font-size: 13px;
    }

    .customer-member-code {
        font-size: 16px;
    }

    /* Ukuran teks bantuan member */
.customer-member-help {
    max-width: 250px;
    font-size: 12px;
    line-height: 1.5;
}
   .customer-top > .customer-section {
    position: relative;
    top: -25px;
    left: 90px;
}
.customer-bottom {
    grid-template-columns: minmax(0, 1fr) 250px;
    gap: 18px;
    margin-top: -10px;
}
    .customer-bottom > .customer-section {
        transform: none;
    }
.customer-about {
    order: initial;
    margin-top: 74px;
}

    .customer-reward-grid {
    grid-template-columns: repeat(3, minmax(0, 1fr));
    width: 75%;
}

/* Membuat kartu reward lebih panjang ke bawah */
.customer-reward-card {
    min-height: 210px;
}
/* Memperbesar kotak gambar reward ke bawah */
.customer-reward-img {
    height: 130px;
}

/* Memperbesar gambar agar sesuai dengan kotaknya */
.customer-reward-img img {
    max-height: 110px;
}
    /* Membesarkan area kartu member sedikit */
.customer-member-area {
    position: relative;
    left: 8px;
    top: 8px;
    width: calc(100% + 80px);
}

/* Membuat kartu member sedikit lebih tinggi */
.customer-member-card {
    min-height: 255px;
}

/* Gambar kopi: lebih besar dan geser ke kiri */
.customer-member-coffee {
    width: 100px;
    right: 16px;
    bottom: -18px;
}

/* QR Member: lebih besar dan geser ke kiri */
.customer-member-qr {
    width: 65px;
    height: 65px;
    right: 24px;
    top: 24px;
}
}





















/* =========================================================
   2. TABLET: 561px - 720px
   MEMBER DI ATAS, REWARD DI BAWAH
========================================================= */
@media (min-width: 561px) and (max-width: 720px) {

    /* =====================================================
       DASHBOARD
    ===================================================== */
    .customer-dashboard {
        gap: 18px;
        width: 100%;
    }

    .customer-greeting {
        padding: 0;
    }

    .customer-greeting h1 {
        line-height: 1.15;
    }

    .customer-greeting h1 .greeting-text {
        font-size: 14px;
        margin-bottom: 5px;
    }

    .customer-greeting h1 .customer-name {
        font-size: 23px;
    }


    /* =====================================================
       TOP AREA: MEMBER DAN REWARD BERTUMPUK VERTIKAL
    ===================================================== */
    .customer-top {
        display: grid;
        grid-template-columns: minmax(0, 1fr);
        gap: 18px;
        align-items: start;
        width: 100%;
    }


    /* =====================================================
       MEMBER AREA
    ===================================================== */
    .customer-member-area {
        position: static;
        left: auto;
        top: auto;
        width: 100%;
        min-width: 0;
        gap: 10px;
    }

    .customer-member-card {
        min-height: 215px;
        padding: 16px;
        box-sizing: border-box;
    }

    .customer-member-label {
        font-size: 11px;
    }

    .customer-member-code {
        font-size: 14px;
    }

    .customer-member-point {
        margin-top: 16px;
        gap: 5px;
    }

    .customer-member-point strong {
        font-size: 38px;
    }

    .customer-member-point span {
        font-size: 12px;
    }

    .customer-member-help {
        max-width: 190px;
        margin-top: 12px;
        font-size: 10px;
        line-height: 1.5;
    }

    .customer-member-qr {
        width: 55px;
        height: 55px;
        padding: 4px;
        top: 12px;
        right: 38px;
    }

    /* Gambar kopi lebih besar dan geser ke kiri */
.customer-member-coffee {
    width: 95px;
    right: 30px;
    bottom: -19px;
}


    /* =====================================================
       ATURAN POIN
    ===================================================== */
    .customer-point-rule {
        min-height: 36px;
        padding: 0 10px;
        font-size: 8px;
        gap: 8px;
    }

    .customer-point-rule strong {
        font-size: 18px;
    }


    /* =====================================================
       REWARD FAVORITE: DI BAWAH MEMBER
    ===================================================== */
    .customer-top > .customer-section {
        position: static;
        top: auto;
        left: auto;
        transform: none;
        width: 100%;
        min-width: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .customer-section-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
        margin-bottom: 10px;
    }

    .customer-section-title {
        margin: 0;
        font-size: 14px;
        line-height: 1.3;
    }


    /* =====================================================
       REWARD GRID: TIGA KARTU SEJAJAR
    ===================================================== */
    .customer-reward-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 10px;
        width: 100%;
        margin: 10px 0 0;
        padding: 0;
        overflow: visible;
    }

    .customer-reward-grid::-webkit-scrollbar {
        display: initial;
    }

    .customer-reward-card {
        display: flex;
        flex-direction: column;
        min-width: 0;
        min-height: 0;
        padding: 7px;
        box-sizing: border-box;
    }


    /* =====================================================
       GAMBAR REWARD
    ===================================================== */
    .customer-reward-img {
        display: grid;
        place-items: center;
        width: 100%;
        height: 105px;
        overflow: hidden;
        box-sizing: border-box;
    }

    .customer-reward-img img {
        display: block;
        width: auto;
        height: auto;
        max-width: 88%;
        max-height: 95px;
        object-fit: contain;
        transform: none;
    }

    .customer-reward-placeholder {
        font-size: 26px;
    }


    /* =====================================================
       ISI KARTU REWARD
    ===================================================== */
    .customer-reward-body {
        display: flex;
        flex-direction: column;
        flex: 1;
        min-width: 0;
        padding: 8px 4px;
    }

    .customer-reward-name {
        min-height: 24px;
        margin: 0;
        font-size: 10px;
        line-height: 1.35;
        white-space: normal;
        overflow-wrap: anywhere;
        position: static;
        transform: none;
    }

    .customer-reward-point {
        display: flex;
        align-items: center;
        gap: 3px;
        margin-top: 2px;
        font-size: 8px;
        line-height: 1.4;
        position: static;
        transform: none;
    }

    .customer-reward-point-label {
        font-size: 8px !important;
        color: #806A59;
    }


    /* =====================================================
       TOMBOL REWARD
    ===================================================== */
    .customer-reward-cta,
    .customer-reward-cta-disabled,
    .customer-reward-cta:disabled {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        min-width: 0;
        min-height: 28px;
        height: auto;
        margin: 8px 0 0;
        padding: 5px 3px;
        box-sizing: border-box;
        font-size: 7px;
        line-height: 1.25;
        text-align: center;
        white-space: normal;
        position: static;
        transform: none;
    }

    .customer-reward-cta span,
    .customer-reward-cta-disabled span {
        position: static;
    }


    /* =====================================================
       BOTTOM AREA: AKTIVITAS DAN TENTANG POINT
    ===================================================== */
    .customer-bottom {
        display: grid;
        grid-template-columns: minmax(0, 1fr);
        gap: 14px;
        align-items: start;
        margin-top: 0;
    }

    .customer-bottom > .customer-section {
        width: 100%;
        min-width: 0;
        padding: 14px 0;
        transform: none;
        box-sizing: border-box;
    }

    .customer-bottom > .customer-section .customer-activity-list {
        width: 100%;
        margin-top: 12px;
    }

    .customer-bottom > .customer-about {
        width: 100%;
        margin-top: 0;
        order: initial;
        padding: 16px;
        box-sizing: border-box;
    }

    .customer-about h3 {
        font-size: 14px;
    }

    .customer-about li {
        font-size: 10px;
    }


    /* =====================================================
       IKON AKTIVITAS
    ===================================================== */
    .customer-activity-row {
        grid-template-columns: 36px minmax(0, 1fr) auto;
        gap: 8px;
        min-height: 54px;
        padding: 8px 10px;
        box-sizing: border-box;
    }

    .customer-activity-icon {
        display: grid;
        place-items: center;
        width: 36px;
        height: 36px;
    }

    .customer-activity-icon .customer-activity-reward-image {
        display: block;
        width: 28px !important;
        height: 28px !important;
        max-width: 28px !important;
        max-height: 28px !important;
        object-fit: contain;
        transform: none;
    }

    .customer-activity-icon svg {
        width: 18px;
        height: 18px;
    }

    .customer-activity-date {
        font-size: 8px;
    }

    .customer-activity-title {
        font-size: 9px;
    }

    .customer-activity-point {
        font-size: 8px;
    }


    /* =====================================================
       MODAL QR
    ===================================================== */
    .customer-qr-modal {
        width: calc(100vw - 28px);
        max-width: 420px;
        max-height: 88vh;
    }

    .customer-qr-modal-content {
        padding: 20px 14px 22px;
    }

    .customer-qr-modal-close {
        top: 12px;
        right: 12px;
        width: 34px;
        height: 34px;
    }

    .customer-qr-modal-brand {
        font-size: 19px;
    }

    .customer-qr-modal-subtitle {
        font-size: 11px;
    }

    .customer-qr-box {
        width: 170px;
        margin-top: 18px;
        padding: 8px;
    }

    .customer-qr-member-code {
        font-size: 23px;
    }

    .customer-qr-member-name {
        font-size: 12px;
    }

    .customer-qr-point {
        margin-top: 14px;
        font-size: 16px;
    }

    .customer-qr-description {
        font-size: 10px;
    }

}



/* =========================================================
   3. MOBILE: 381px - 560px
========================================================= */
@media (min-width: 381px) and (max-width: 560px) {
    .customer-dashboard {
        gap: 16px;
    }

    .customer-greeting {
        padding: 0;
    }

    .customer-greeting h1 {
        line-height: 1.15;
    }

    .customer-greeting h1 .greeting-text {
        margin-bottom: 5px;
        font-size: 12px;
    }

    .customer-greeting h1 .customer-name {
        font-size: 18px;
    }

    .customer-top {
        grid-template-columns: minmax(0, 1fr);
        gap: 16px;
        align-items: stretch;
    }

    .customer-member-card {
        min-height: 205px;
        padding: 16px;
    }

    .customer-member-point {
        margin-top: 18px;
    }

    .customer-member-point strong {
        font-size: 42px;
    }

    .customer-member-qr {
        width: 50px;
        height: 50px;
        top: 12px;
        right: 12px;
    }

    .customer-member-coffee {
        width: 90px;
        bottom: -16px;
    }

    .customer-point-rule {
        min-height: 40px;
        padding: 0 12px;
        font-size: 9px;
    }

    .customer-point-rule strong {
        font-size: 20px;
    }

    .customer-section {
        padding: 14px;
    }

    .customer-top > .customer-section {
        position: static;
        top: auto;
        transform: none;
    }

    .customer-section-title {
        margin-top: 0;
        font-size: 13px;
    }

    .customer-reward-grid {
        display: flex;
        flex-wrap: nowrap;
        gap: 12px;
        width: 100%;
        margin: 12px 0 0;
        padding: 0 0 6px;
        overflow-x: auto;
        overflow-y: hidden;
        scroll-snap-type: x mandatory;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .customer-reward-grid::-webkit-scrollbar {
        display: none;
    }

.customer-reward-card {
    flex: 0 0 145px;
    min-width: 0;
    min-height: 0;
    padding: 7px;
    scroll-snap-align: start;
    box-sizing: border-box;
}

    .customer-reward-img {
        height: 115px;
    }

    .customer-reward-img img {
        width: auto;
        height: auto;
        max-width: 90%;
        max-height: 110px;
        object-fit: contain;
        transform: none;
    }

    .customer-reward-body {
        padding: 8px;
    }

    .customer-reward-name {
        min-height: 23px;
        font-size: 9px;
        white-space: normal;
        position: static;
    }

    .customer-reward-point {
    margin-top: -3px;
    font-size: 8px;
    position: relative;
    top: -5px;
}

   .customer-reward-cta,
.customer-reward-cta-disabled,
.customer-reward-cta:disabled {
    width: 100%;
    min-width: 0;
    min-height: 28px;
    height: 25px;
    margin: 8px 0 0;
    padding: 3px 2px;
    box-sizing: border-box;
    font-size: 7px;
    line-height: 1.2;
    position: relative;
top: -5px;
}

    .customer-bottom {
        grid-template-columns: minmax(0, 1fr);
        gap: 12px;
    }

    .customer-bottom > .customer-section {
        padding: 14px;
        transform: none;
    }

    .customer-bottom > .customer-section .customer-activity-list {
        width: 100%;
    }

    .customer-activity-icon {
        width: 36px;
        height: 36px;
    }

    .customer-activity-icon .customer-activity-reward-image {
        width: 28px !important;
        height: 28px !important;
        max-width: 28px !important;
        max-height: 28px !important;
        object-fit: contain;
        transform: none;
    }

    .customer-activity-icon svg {
        width: 18px;
        height: 18px;
    }

    .customer-qr-modal {
        width: calc(100vw - 24px);
        max-height: 88vh;
        border-radius: 18px;
    }

    .customer-qr-modal-content {
        padding: 20px 14px 22px;
    }

    .customer-qr-modal-close {
        top: 12px;
        right: 12px;
        width: 34px;
        height: 34px;
    }

    .customer-qr-modal-brand {
        font-size: 19px;
    }

    .customer-qr-modal-subtitle {
        font-size: 11px;
    }

    .customer-qr-box {
        width: min(170px, 52vw);
        margin-top: 18px;
        padding: 8px;
    }

    .customer-qr-member-code {
        font-size: 23px;
    }

    .customer-qr-member-name {
        font-size: 12px;
    }

    .customer-qr-point {
        margin-top: 14px;
        font-size: 16px;
    }

    .customer-qr-description {
        font-size: 10px;
    }
}


/* =========================================================
   4. MOBILE KECIL: 380px KE BAWAH
========================================================= */
@media (max-width: 380px) {
    .customer-dashboard {
        gap: 16px;
    }

    .customer-greeting {
        padding: 0;
    }

    .customer-greeting h1 {
        line-height: 1.15;
    }

    .customer-greeting h1 .greeting-text {
        margin-bottom: 5px;
        font-size: 12px;
    }

    .customer-greeting h1 .customer-name {
        font-size: 18px;
    }

    .customer-top {
        grid-template-columns: minmax(0, 1fr);
        gap: 16px;
        align-items: stretch;
    }

    .customer-member-card {
        min-height: 205px;
        padding: 16px;
    }

    .customer-member-point {
        margin-top: 18px;
    }

    .customer-member-point strong {
        font-size: 42px;
    }

    .customer-member-qr {
        width: 50px;
        height: 50px;
        top: 12px;
        right: 12px;
    }

    .customer-member-coffee {
        width: 90px;
        bottom: -16px;
    }

    .customer-point-rule {
        min-height: 40px;
        padding: 0 12px;
        font-size: 9px;
    }

    .customer-point-rule strong {
        font-size: 20px;
    }

    .customer-section {
        padding: 14px;
    }

    .customer-top > .customer-section {
        position: static;
        top: auto;
        transform: none;
    }

    .customer-section-title {
        margin-top: 0;
        font-size: 13px;
    }

    .customer-reward-grid {
        display: flex;
        flex-wrap: nowrap;
        gap: 10px;
        width: 100%;
        margin: 12px 0 0;
        padding: 0 0 6px;
        overflow-x: auto;
        overflow-y: hidden;
        scroll-snap-type: x mandatory;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .customer-reward-grid::-webkit-scrollbar {
        display: none;
    }

    .customer-reward-card {
        flex: 0 0 135px;
        min-width: 0;
        min-height: 100px;
        padding: 7px;
        scroll-snap-align: start;
    }

    .customer-reward-img {
        height: 110px;
    }

    .customer-reward-img img {
        width: auto;
        height: auto;
        max-width: 80%;
        max-height: 82px;
        object-fit: contain;
        transform: none;
    }

    .customer-reward-body {
        padding: 7px;
    }

    .customer-reward-name {
        min-height: 23px;
        font-size: 9px;
        white-space: normal;
        position: static;
    }

    .customer-reward-point {
        margin-top: 2px;
        font-size: 7px;
        position: static;
    }

    /* Tombol reward - HP kecil */
.customer-reward-cta,
.customer-reward-cta-disabled,
.customer-reward-cta:disabled {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 100% !important;
    min-width: 0;
    min-height: 23px !important;
    height: 23px !important;

    margin: 1px auto 0 !important;
    padding: 3px 2px;
    box-sizing: border-box;

    font-size: 6.5px;
    line-height: 1.2;
    position: static;
}

    .customer-bottom {
        grid-template-columns: minmax(0, 1fr);
        gap: 12px;
    }

    .customer-bottom > .customer-section {
        padding: 14px;
        transform: none;
    }

    .customer-bottom > .customer-section .customer-activity-list {
        width: 100%;
    }

    .customer-activity-icon {
        width: 36px;
        height: 36px;
    }

    .customer-activity-icon .customer-activity-reward-image {
        width: 28px !important;
        height: 28px !important;
        max-width: 28px !important;
        max-height: 28px !important;
        object-fit: contain;
        transform: none;
    }

    .customer-activity-icon svg {
        width: 18px;
        height: 18px;
    }

    .customer-qr-modal {
        width: calc(100vw - 20px);
        max-width: 340px;
        max-height: calc(100vh - 16px);
        margin: 8px auto;
        border-radius: 16px;
    }

    .customer-qr-modal-content {
        padding: 20px 12px;
    }

    .customer-qr-modal-brand {
        font-size: 19px;
    }

    .customer-qr-modal-subtitle {
        font-size: 11px;
    }

    .customer-qr-box {
        width: 145px;
        margin-top: 18px;
        padding: 7px;
    }

    .customer-qr-member-code {
        font-size: 21px;
    }

    .customer-qr-member-name {
        font-size: 12px;
    }

    .customer-qr-point {
        margin-top: 14px;
        font-size: 16px;
    }

    .customer-qr-description {
        font-size: 10px;
    }
  /* Tampilan poin tetap seperti desain sebelumnya */
.customer-reward-point {
    display: flex;
    align-items: baseline;
    gap: 4px;
    font-size: 22px !important;
    color: #806A59;
}
/* Ukuran bintang dan poin untuk HP kecil */
.customer-reward-point {
    display: flex;
    align-items: baseline;
    gap: 3px;
    font-size: 12px !important;
    color: #806A59;
}

.customer-reward-star {
    display: inline-block;
    color: #C9892C;
    font-size: 14px;
    line-height: 1;
    position: relative;
    top: -9px;
}

.customer-reward-point b {
    color: #806A59;
    font-size: 10px;
    font-weight: 700;
    position: relative;
    top: -8px;
}

.customer-reward-point-label {
    color: #806A59 !important;
    font-size: 9px !important;
    font-weight: 400;
    position: relative;
    top: -8px;
}

/* Tentang Point: samakan lebar dengan kartu aktivitas */
.customer-bottom > .customer-about {
    width: calc(100% - 28px);
    margin: 0 auto;
    box-sizing: border-box;
}
}


/* FORM REWARD FAVORITE */
.customer-reward-form {
    width: 100%;
    margin: 0;
    padding: 0;
}

/* OVERLAY MODAL REDEMPTION */
#favorite-redemption-modal[hidden] {
    display: none !important;
}

#favorite-redemption-modal {
    position: fixed;
    inset: 0;
    z-index: 99999;

    display: flex;
    align-items: center;
    justify-content: center;

    padding: 16px;
    background: rgba(0, 0, 0, .58);
    overflow-y: auto;
    box-sizing: border-box;
}

#favorite-redemption-modal .favorite-redemption-card {
    position: relative;
    width: 100%;
    max-width: 365px;
    max-height: calc(100vh - 32px);
    overflow-y: auto;
    overscroll-behavior: contain;

    margin: auto;
    padding: 26px 20px 20px;

    border: 1px solid #E9DED1;
    border-radius: 22px;
    background: #FFFDF9;
    color: #171311;
    text-align: center;
    box-shadow: 0 18px 55px rgba(0, 0, 0, .20);
    box-sizing: border-box;
}

#favorite-redemption-modal .favorite-redemption-close {
    position: absolute;
    top: 10px;
    right: 10px;

    width: 30px;
    height: 30px;
    display: grid;
    place-items: center;

    padding: 0;
    border: 0;
    border-radius: 50%;
    background: #F4EDE5;
    color: #5A4537;
    font-size: 21px;
    line-height: 1;
    cursor: pointer;
}

#favorite-redemption-modal .favorite-redemption-label {
    margin-top: 5px;
    color: #8B796B;
    font-size: 9px;
    letter-spacing: .1em;
    text-transform: uppercase;
}

#favorite-redemption-modal .favorite-redemption-title {
    margin: 7px 0 4px;
    color: #4B2D1C;
    font-size: 22px;
    line-height: 1.3;
    overflow-wrap: anywhere;
}

#favorite-redemption-modal .favorite-redemption-subtitle {
    margin: 0;
    color: #8B796B;
    font-size: 11px;
    line-height: 1.5;
}

#favorite-redemption-modal .favorite-redemption-qr {
    width: 174px;
    height: 174px;
    display: grid;
    place-items: center;

    margin: 17px auto 13px;
    padding: 7px;
    overflow: hidden;

    border: 1px solid #E9DED1;
    border-radius: 15px;
    background: #FFFFFF;
    box-sizing: border-box;
}

#favorite-redemption-modal .favorite-redemption-qr svg {
    display: block;
    width: 100%;
    height: 100%;
    max-width: 158px;
    max-height: 158px;
}

#favorite-redemption-modal .favorite-redemption-code-label {
    color: #8B796B;
    font-size: 9px;
}

#favorite-redemption-modal .favorite-redemption-code {
    margin-top: 4px;
    color: #4B2D1C;
    font-size: 20px;
    font-weight: 700;
    letter-spacing: .04em;
    overflow-wrap: anywhere;
}

#favorite-redemption-modal .favorite-redemption-info {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 8px;
    margin-top: 15px;
}

#favorite-redemption-modal .favorite-redemption-info-card {
    min-width: 0;
    min-height: 55px;
    padding: 9px 6px;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    border: 1px solid #E9DED1;
    border-radius: 11px;
    background: #FFFFFF;
    box-sizing: border-box;
}

#favorite-redemption-modal .favorite-redemption-info-label {
    color: #8B796B;
    font-size: 8px;
}

#favorite-redemption-modal .favorite-redemption-info-value {
    margin-top: 4px;
    color: #171311;
    font-size: 13px;
    font-weight: 700;
    overflow-wrap: anywhere;
}

#favorite-redemption-modal .favorite-redemption-info-value.status-pending {
    color: #9A6715;
}

#favorite-redemption-modal .favorite-redemption-info-value.status-success {
    color: #2E7D32;
}

#favorite-redemption-modal .favorite-redemption-info-value.status-failed {
    color: #B42318;
}

#favorite-redemption-modal .favorite-redemption-back {
    width: 100%;
    min-height: 39px;
    margin-top: 11px;
    padding: 10px 12px;

    border: 0;
    border-radius: 9px;
    background: #4B2D1C;
    color: #FFFFFF;
    font-size: 10px;
    font-weight: 700;
    cursor: pointer;
}

#favorite-redemption-modal .favorite-redemption-note {
    margin-top: 11px;
    padding: 10px;

    border-radius: 10px;
    background: #FFF4DF;
    color: #765C45;
    font-size: 9px;
    line-height: 1.6;
}

@media (max-width: 380px) {
    #favorite-redemption-modal {
        padding: 10px;
    }

    #favorite-redemption-modal .favorite-redemption-card {
        max-height: calc(100vh - 20px);
        padding: 24px 13px 14px;
        border-radius: 16px;
    }

    #favorite-redemption-modal .favorite-redemption-qr {
        width: 145px;
        height: 145px;
        margin-top: 15px;
        padding: 6px;
    }

    #favorite-redemption-modal .favorite-redemption-qr svg {
        max-width: 131px;
        max-height: 131px;
    }

    #favorite-redemption-modal .favorite-redemption-title {
        font-size: 20px;
    }

    #favorite-redemption-modal .favorite-redemption-code {
        font-size: 17px;
    }
}

          
            </style>

            <div class="customer-dashboard">

                {{-- GREETING --}}
                <div class="customer-greeting">

                  <h1>
    <span class="greeting-text">{{ $greeting }},</span>
    <span class="customer-name">{{ $name }} 👋</span>
</h1>
                </div>


                {{-- TOP --}}
                <div class="customer-top">

                    {{-- MEMBER --}}
                    <section class="customer-member-area">

                        <div class="customer-member-card">

                            <div class="customer-member-label">
                                Member ID
                            </div>

                            <div class="customer-member-code">
                                {{ $memberCode }}
                            </div>

                            <div class="customer-member-point">

                                <strong>
                                    {{ number_format($point, 0, ',', '.') }}
                                </strong>

                                <span>
                                    POINT
                                </span>

                            </div>

                            <div class="customer-member-help">
                                Terus kumpulkan point dan
                                tukarkan dengan reward menarik.
                            </div>

                            <button type="button" class="customer-member-qr"
                                onclick="document.getElementById('customerQrModal').showModal()"
                                aria-label="Tampilkan QR Member">
                                {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::format('svg')
                                ->size(100)
                                ->margin(1)
                                ->generate($customer->qr_code) !!}
                            </button>

                            <img class="customer-member-coffee" src="{{ asset('images/kopi.png') }}" alt="SAÉ Coffee"
                                onerror="this.style.display='none'">

                        </div>

                        <div class="customer-point-rule">

                            <span>
                                Setiap Rp 10.000 pembelanjaan
                                = 1 Point
                            </span>

                            <strong>
                                ★
                            </strong>

                        </div>

                    </section>


                    {{-- REWARD --}}
                    <section class="customer-section">

                        <div class="customer-section-head">

                            <h2 class="customer-section-title">
                                Reward Favorite
                            </h2>


                        </div>

                        <div class="customer-reward-grid">

                            @forelse($favorites as $reward)

                            <article class="customer-reward-card">

                                <div class="customer-reward-img">


                                    @if($reward->image_path)

                                    <img src="{{ '/storage/'.ltrim($reward->image_path, '/') }}"
                                        alt="{{ $reward->reward_name }}" onerror="
                                        this.style.display='none';
                                        this.nextElementSibling.style.display='block';
                                    ">

                                    @endif

                                    <div class="customer-reward-placeholder"
                                        style="{{ $reward->image_path ? 'display:none' : '' }}">
                                        🎁
                                    </div>

                                </div>

                                <div class="customer-reward-body">

                                    <div class="customer-reward-name">
                                        {{ $reward->reward_name }}
                                    </div>

<div class="customer-reward-point">
    <span class="customer-reward-star">★</span>
    <b>{{ number_format((int)$reward->point_required, 0, ',', '.') }}</b>
    <span class="customer-reward-point-label">Point</span>
</div>


                          @if((int) $customer->saldo_point >= (int) $reward->point_required)

    <a
        href="{{ url('/customer/reward') }}?confirm_reward={{ $reward->id_reward }}"
        class="customer-reward-cta"
    >
        Tukarkan Sekarang
    </a>

@else

    <button
        type="button"
        class="customer-reward-cta customer-reward-cta-disabled"
        disabled
    >
        Tukarkan Sekarang
    </button>

@endif
                                </div>

                            </article>

                            @empty

                            <div style="
                            grid-column:1/-1;
                            color:#8b796b;
                            font-size:10px;
                            padding:20px 0;
                        ">
                                Belum ada reward tersedia.
                            </div>

                            @endforelse

                        </div>

                    </section>

                </div>


                {{-- BOTTOM --}}
                <div class="customer-bottom">

                    {{-- ACTIVITY --}}
                    <section class="customer-section">

                        <div class="customer-section-head">

                            <h2 class="customer-section-title">
                                Aktivitas Terakhir
                            </h2>

                        </div>


                        <div class="customer-activity-list">

                          @forelse($activities as $activity)

@php
    $isMinus = $activity['is_redeem'];
    $title = $activity['title'];
    $date = $activity['date'];
    $point = (int) $activity['point'];
    $rewardImage = $activity['reward_image'] ?? null;
@endphp

<div class="customer-activity-row">

   <div class="
    customer-activity-icon
    {{ $isMinus ? 'minus' : 'plus' }}
">

    @if($isMinus)

        {{-- GAMBAR REWARD YANG DITUKARKAN --}}
        @if($rewardImage)

            <img
                src="{{ '/storage/' . ltrim($rewardImage, '/') }}"
                alt="{{ $title }}"
                class="customer-activity-reward-image"
                onerror="this.style.display='none';"
            >

        @else

            {{-- fallback kalau reward tidak punya gambar --}}
            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
                aria-hidden="true"
            >
                <path d="M20 12v8a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-8" />
                <path d="M2 7h20v5H2z" />
                <path d="M12 7v14" />
                <path d="M12 7H7.5a2.5 2.5 0 1 1 0-5C10 2 12 7 12 7Z" />
                <path d="M12 7h4.5a2.5 2.5 0 1 0 0-5C14 2 12 7 12 7Z" />
            </svg>

        @endif

    @else

        {{-- ICON KERANJANG UNTUK TRANSAKSI --}}
        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true"
        >
            <circle cx="9" cy="20" r="1" />
            <circle cx="18" cy="20" r="1" />
            <path d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 1.9-1.4L21 8H6" />
        </svg>

    @endif

</div>


        {{-- DETAIL --}}
       <div class="customer-activity-main">

    <div class="customer-activity-date">
        {{ \Carbon\Carbon::parse($date)->format('d F Y • H:i') }}
    </div>

    <div class="customer-activity-title">
        {{ $title }}
    </div>

</div>


        {{-- POINT --}}
        <div class="
            customer-activity-point
            {{ $isMinus ? 'customer-minus' : 'customer-plus' }}
        ">

            {{ $isMinus ? '-' : '+' }}

            {{ number_format(
                abs($point),
                0,
                ',',
                '.'
            ) }}

            Point

        </div>

    </div>

@empty

    <div class="customer-activity-empty">
        Belum ada aktivitas.
    </div>

@endforelse

                        </div>

                    </section>


                    {{-- ABOUT --}}
                    <aside class="customer-section customer-about">

                        <h3>
                            Tentang Point
                        </h3>

                        <ul>

                            <li>
                                1 Point didapat dari setiap
                                pembelanjaan Rp10.000.
                            </li>

                            <li>
                                Point dapat ditukarkan dengan
                                berbagai reward menarik.
                            </li>

                            <li>
                                Point tidak dapat diuangkan.
                            </li>

                            <li>
                                QR Code reward hanya dapat
                                digunakan 1 kali.
                            </li>

                        </ul>

                    </aside>

                </div>

            </div>
            <dialog id="customerQrModal" class="customer-qr-modal">

                <div class="customer-qr-modal-content">

                    {{-- TOMBOL CLOSE --}}
                    <button type="button" class="customer-qr-modal-close"
                        onclick="document.getElementById('customerQrModal').close()" aria-label="Tutup">
                        ×
                    </button>


                    {{-- HEADER --}}
                    <div class="customer-qr-modal-brand">
                        SAÉ CAFE ROJEL
                    </div>

                    <div class="customer-qr-modal-subtitle">
                        MEMBER CARD
                    </div>


                    {{-- QR --}}
                    <div class="customer-qr-box">

                        {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::format('svg')
                        ->size(180)
                        ->margin(1)
                        ->generate($customer->qr_code)
                        !!}

                    </div>


                    {{-- MEMBER CODE --}}
                    <div class="customer-qr-member-code">
                        {{ $memberCode }}
                    </div>

                    <div class="customer-qr-member-name">
                        {{ $name }}
                    </div>


                    {{-- POINT --}}
                    <div class="customer-qr-point">
                        <b>
                            {{ number_format($point,0,',','.') }} Point
                        </b>
                    </div>


                    {{-- DESCRIPTION --}}
                    <div class="customer-qr-description">
                        Tunjukkan QR ini kepada kasir saat melakukan transaksi.
                    </div>

                </div>

            </dialog>


            {{-- MODAL REDEMPTION DARI REWARD FAVORITE --}}
<div
    id="favorite-redemption-modal"
    hidden
>
    <section
        class="favorite-redemption-card"
        role="dialog"
        aria-modal="true"
        aria-labelledby="favorite-redemption-title"
    >
        <button
            type="button"
            id="favorite-redemption-close"
            class="favorite-redemption-close"
            aria-label="Tutup modal"
        >
            &times;
        </button>

        <div class="favorite-redemption-label">
            Tunjukkan ke Kasir
        </div>

        <h2
            class="favorite-redemption-title"
            id="favorite-redemption-title"
        >
            Nama Reward
        </h2>

        <p
            class="favorite-redemption-subtitle"
            id="favorite-redemption-subtitle"
        >
            Redemption menunggu konfirmasi staff.
        </p>

        <div
            class="favorite-redemption-qr"
            id="favorite-redemption-qr"
        ></div>

        <div class="favorite-redemption-code-label">
            Kode Redemption
        </div>

        <div
            class="favorite-redemption-code"
            id="favorite-redemption-code"
        ></div>

        <div class="favorite-redemption-info">
            <div class="favorite-redemption-info-card">
                <div class="favorite-redemption-info-label">
                    Point Digunakan
                </div>

                <div
                    class="favorite-redemption-info-value"
                    id="favorite-redemption-point"
                >
                    0
                </div>
            </div>

            <div class="favorite-redemption-info-card">
                <div class="favorite-redemption-info-label">
                    Status
                </div>

                <div
                    class="favorite-redemption-info-value status-pending"
                    id="favorite-redemption-status"
                >
                    Pending
                </div>
            </div>
        </div>

        <button
            type="button"
            id="favorite-redemption-back"
            class="favorite-redemption-back"
        >
            Kembali ke Beranda
        </button>

        <div class="favorite-redemption-note">
            Point belum dipotong. Point akan berkurang setelah
            staff memindai dan mengonfirmasi QR ini.
        </div>
    </section>
</div>


<script>
let favoriteRedemptionActiveCode = null;
let favoriteRedemptionTimer = null;
let favoriteRedemptionRequestRunning = false;

const favoriteRedemptionStatusUrl = @json(
    route('customer.reward.redemption.status', [
        'code' => '__REDEMPTION_CODE__'
    ])
);

async function redeemFavoriteReward(event, form) {
    event.preventDefault();

    const button = form.querySelector('button[type="submit"]');
    const originalText = button
        ? button.textContent.trim()
        : 'Tukarkan Sekarang';

    if (button) {
        button.disabled = true;
        button.textContent = 'Memproses...';
    }

    try {
        const response = await fetch(form.action, {
            method: 'POST',
            headers: {
                'Accept': 'application/json'
            },
            credentials: 'same-origin',
            body: new FormData(form)
        });

        let result;

        try {
            result = await response.json();
        } catch {
            throw new Error('Server tidak memberikan respons yang valid.');
        }

        if (!response.ok) {
            const firstValidationError = result.errors
                ? Object.values(result.errors).flat()[0]
                : null;

            throw new Error(
                result.message ||
                firstValidationError ||
                'Penukaran reward gagal diproses.'
            );
        }

        const data = result.data;

        if (!data || !data.code || !data.svg) {
            throw new Error('Data QR Redemption tidak lengkap.');
        }

        document.getElementById(
            'favorite-redemption-title'
        ).textContent = data.reward || 'Reward';

        document.getElementById(
            'favorite-redemption-code'
        ).textContent = data.code;

        document.getElementById(
            'favorite-redemption-point'
        ).textContent = data.point_used;

        document.getElementById(
            'favorite-redemption-qr'
        ).innerHTML = data.svg;

        updateFavoriteRedemptionStatus(data.status || 'pending');

        const modal = document.getElementById(
            'favorite-redemption-modal'
        );

        modal.hidden = false;
        document.body.style.overflow = 'hidden';

        document.getElementById(
            'favorite-redemption-close'
        ).focus();

        startFavoriteRedemptionPolling(data.code);

    } catch (error) {
        console.error('Redemption error:', error);

        alert(
            error.message ||
            'Terjadi kesalahan saat menukarkan reward.'
        );

    } finally {
        if (button) {
            button.disabled = false;
            button.textContent = originalText;
        }
    }

    return false;
}

function updateFavoriteRedemptionStatus(status, statusLabel = null) {
    const normalizedStatus = String(status).toLowerCase();

    const labels = {
        pending: 'Pending',
        menunggu: 'Pending',
        berhasil: 'Berhasil',
        gagal: 'Gagal'
    };

    const statusClasses = {
        pending: 'status-pending',
        menunggu: 'status-pending',
        berhasil: 'status-success',
        gagal: 'status-failed'
    };

    const statusElement = document.getElementById(
        'favorite-redemption-status'
    );

    const subtitle = document.getElementById(
        'favorite-redemption-subtitle'
    );

    if (!statusElement) return;

    statusElement.textContent =
        statusLabel || labels[normalizedStatus] || normalizedStatus;

    statusElement.classList.remove(
        'status-pending',
        'status-success',
        'status-failed'
    );

    statusElement.classList.add(
        statusClasses[normalizedStatus] || 'status-pending'
    );

    if (subtitle) {
        subtitle.textContent = normalizedStatus === 'berhasil'
            ? 'Redemption berhasil dikonfirmasi staff.'
            : normalizedStatus === 'gagal'
                ? 'Redemption gagal diproses.'
                : 'Redemption menunggu konfirmasi staff.';
    }
}

function startFavoriteRedemptionPolling(code) {
    stopFavoriteRedemptionPolling();

    favoriteRedemptionActiveCode = String(code);

    checkFavoriteRedemptionStatus();

    favoriteRedemptionTimer = setInterval(
        checkFavoriteRedemptionStatus,
        3000
    );
}

function stopFavoriteRedemptionPolling() {
    if (favoriteRedemptionTimer) {
        clearInterval(favoriteRedemptionTimer);
    }

    favoriteRedemptionTimer = null;
    favoriteRedemptionActiveCode = null;
}

async function checkFavoriteRedemptionStatus() {
    if (
        !favoriteRedemptionActiveCode ||
        favoriteRedemptionRequestRunning
    ) {
        return;
    }

    const code = favoriteRedemptionActiveCode;

    favoriteRedemptionRequestRunning = true;

    try {
        const url = favoriteRedemptionStatusUrl.replace(
            '__REDEMPTION_CODE__',
            encodeURIComponent(code)
        );

        const response = await fetch(url, {
            method: 'GET',
            headers: {
                'Accept': 'application/json'
            },
            credentials: 'same-origin'
        });

        if (!response.ok) return;

        const result = await response.json();

        if (code !== favoriteRedemptionActiveCode) return;

        const status = result.status ||
            result.data?.status ||
            'pending';

        updateFavoriteRedemptionStatus(
            status,
            result.status_label || result.data?.status_label || null
        );

        if (String(status).toLowerCase() !== 'pending') {
            stopFavoriteRedemptionPolling();
        }

    } catch (error) {
        console.error('Gagal memeriksa status redemption:', error);
    } finally {
        favoriteRedemptionRequestRunning = false;
    }
}

function closeFavoriteRedemptionModal() {
    const modal = document.getElementById(
        'favorite-redemption-modal'
    );

    if (!modal) return;

    modal.hidden = true;
    document.body.style.overflow = '';

    stopFavoriteRedemptionPolling();
}

document.getElementById('favorite-redemption-close')
    ?.addEventListener('click', closeFavoriteRedemptionModal);

document.getElementById('favorite-redemption-back')
    ?.addEventListener('click', closeFavoriteRedemptionModal);

document.getElementById('favorite-redemption-modal')
    ?.addEventListener('click', function (event) {
        if (event.target === this) {
            closeFavoriteRedemptionModal();
        }
    });

document.addEventListener('keydown', function (event) {
    const modal = document.getElementById(
        'favorite-redemption-modal'
    );

    if (
        event.key === 'Escape' &&
        modal &&
        !modal.hidden
    ) {
        closeFavoriteRedemptionModal();
    }
});
</script>



<script>
(function () {
    const UPDATE_INTERVAL = 3000;
    let isUpdating = false;

    async function refreshCustomerDashboard() {
        // Tidak perlu meminta data ketika tab browser tersembunyi.
        if (document.hidden || isUpdating) {
            return;
        }

        const currentDashboard = document.querySelector(
            '.customer-dashboard'
        );

        if (!currentDashboard) {
            return;
        }

        isUpdating = true;

        try {
            const response = await fetch(window.location.href, {
                method: 'GET',
                headers: {
                    'Accept': 'text/html'
                },
                credentials: 'same-origin',
                cache: 'no-store'
            });

            // Jangan mengubah halaman jika sesi login berakhir.
            if (!response.ok || response.redirected) {
                return;
            }

            const html = await response.text();

            const parsedDocument = new DOMParser().parseFromString(
                html,
                'text/html'
            );

            const latestDashboard = parsedDocument.querySelector(
                '.customer-dashboard'
            );

            if (!latestDashboard) {
                return;
            }

            const liveDashboard = document.querySelector(
                '.customer-dashboard'
            );

            // Perbarui dashboard hanya jika ada perubahan data.
            if (
                liveDashboard &&
                liveDashboard.innerHTML !== latestDashboard.innerHTML
            ) {
                const focusableSelector =
                    'a, button, input, select, textarea, [tabindex]';

                const oldControls = Array.from(
                    liveDashboard.querySelectorAll(focusableSelector)
                );

                const focusedIndex = oldControls.indexOf(
                    document.activeElement
                );

                liveDashboard.replaceWith(
                    latestDashboard.cloneNode(true)
                );

                // Pertahankan fokus keyboard jika memungkinkan.
                if (focusedIndex >= 0) {
                    const updatedControls = document.querySelectorAll(
                        '.customer-dashboard ' + focusableSelector
                    );

                    if (updatedControls[focusedIndex]) {
                        updatedControls[focusedIndex].focus({
                            preventScroll: true
                        });
                    }
                }
            }

            // Ikut perbarui saldo pada modal QR Member.
            const currentQrPoint = document.querySelector(
                '#customerQrModal .customer-qr-point'
            );

            const latestQrPoint = parsedDocument.querySelector(
                '#customerQrModal .customer-qr-point'
            );

            if (
                currentQrPoint &&
                latestQrPoint &&
                currentQrPoint.innerHTML !== latestQrPoint.innerHTML
            ) {
                currentQrPoint.replaceWith(
                    latestQrPoint.cloneNode(true)
                );
            }

        } catch (error) {
            console.warn(
                'Pembaruan otomatis Beranda gagal:',
                error
            );
        } finally {
            isUpdating = false;
        }
    }

    // Perbarui data setiap 3 detik.
    const refreshTimer = setInterval(
        refreshCustomerDashboard,
        UPDATE_INTERVAL
    );

    // Saat pengguna kembali ke tab Beranda, perbarui segera.
    document.addEventListener('visibilitychange', function () {
        if (!document.hidden) {
            refreshCustomerDashboard();
        }
    });

    // Hentikan timer ketika halaman ditinggalkan.
    window.addEventListener('pagehide', function () {
        clearInterval(refreshTimer);
    });
})();
</script>

            @endsection