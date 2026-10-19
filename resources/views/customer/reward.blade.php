@extends('layouts.customer')

@section('title', 'Reward - SAÉ CAFE ROJEL')
@section('mobile_title', 'Reward')

@section('content')

<style>
/* =========================================================
   PAGE
========================================================= */


.reward-page {
    width: 100%;
    min-height: calc(100vh - 80px);

    display: grid;
    align-content: start;
    gap: 18px;

    /* Latar mengikuti tema Member Card */
    background: #f5f1eb;
    color: #171311;

    box-sizing: border-box;
}



/* =========================================================
   HEADER
========================================================= */

.reward-head {
    display: flex;
    align-items: flex-end;
}

.reward-head h1 {
    margin: 0;
    color: #171311;
    font-size: 28px;
    line-height: 1.2;
    font-weight: 700;
    letter-spacing: -.03em;
}

.reward-head p {
    margin: 6px 0 0;
    color: #8B796B;
    font-size: 11px;
}


/* =========================================================
   SUMMARY
========================================================= */

.reward-summary {
    display: grid;

    grid-template-columns:
        minmax(260px, .9fr) minmax(0, 1.1fr);

    gap: 14px;

    width: 100%;
}


/* =========================================================
   POINT CARD
========================================================= */

.reward-balance {
    position: relative;

    min-height: 130px;

    padding: 20px;

    overflow: hidden;

    border: 1px solid #E9DCCF;
    border-radius: 14px;

    background: #FFFAF1;;
}

/* GAMBAR KADO CUSTOM */
.reward-balance::after {
    content: "";

    position: absolute;
    width: 115px;
    height: 100px;

    right: 12px;
    top: 50%;
    transform: translateY(-50%);

    background-image: url('/images/reward_gift.png');
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;

    pointer-events: none;
}

.reward-balance-label {
    color: #6F5D50;
    font-size: 11px;
}

.reward-balance-point {
    margin-top: 7px;

    display: flex;
    align-items: baseline;

    gap: 6px;
}

.reward-balance-point strong {
    color: #4B2D1C;

    font-size: 32px;
    line-height: 1;

    font-weight: 700;
}

.reward-balance-point span {
    color: #6F5D50;
    font-size: 12px;
}

.reward-balance-rule {
    margin-top: 8px;

    color: #766457;

    font-size: 9px;
}


/* =========================================================
   RIGHT SIDE
========================================================= */

.reward-summary-right {
    display: grid;

    grid-template-rows:
        auto auto;

    gap: 10px;

    min-width: 0;
}


/* =========================================================
   STAT CARDS
========================================================= */

.reward-stat-grid {
    display: grid;

    grid-template-columns:
        repeat(2, minmax(0, 1fr));

    gap: 10px;
}

.reward-stat-card {
    min-height: 60px;

    display: flex;
    align-items: center;

    gap: 10px;

    padding: 12px 14px;

    border: 1px solid #E9DED1;
    border-radius: 11px;

    background: #FFFDF9;
}

.reward-stat-icon {
    width: 30px;
    height: 30px;

    display: grid;
    place-items: center;

    flex-shrink: 0;

    border-radius: 50%;

    background: #F4E6D4;

    color: #7A4A28;

    font-size: 14px;
}

.reward-stat-label {
    color: #827265;
    font-size: 8px;
}

.reward-stat-value {
    margin-top: 2px;

    color: #33261F;

    font-size: 12px;
    font-weight: 700;
}


/* =========================================================
   TABS
========================================================= */

.reward-tabs {
    display: grid;

    grid-template-columns:
        1fr 1fr;

    gap: 4px;

    min-height: 38px;

    padding: 3px;

    border: 1px solid #E5D8CB;
    border-radius: 8px;

    background: #FFFDF9;
}

.reward-tab {
    display: flex;

    align-items: center;
    justify-content: center;

    gap: 6px;

    border: 0;
    border-radius: 6px;

    background: transparent;

    color: #6F5D50;

    font-size: 9px;

    font-weight: 600;

    cursor: pointer;

    transition:
        background-color .2s ease,
        color .2s ease;
}

.reward-tab.active {
    background: #4B2D1C;
    color: #FFFFFF;
}


/* =========================================================
   TAB CONTENT
========================================================= */

.reward-tab-content {
    display: none;
}

.reward-tab-content.active {
    display: block;
}


/* =========================================================
   REWARD SECTION
========================================================= */

.reward-section {
    width: 100%;

    padding: 18px;

    border: 1px solid #E9DED1;
    border-radius: 14px;

    background: #FFFDF9;
}

.reward-section-head {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 10px;

    margin-bottom: 14px;
}

.reward-section-title {
    margin: 0;

    color: #171311;

    font-size: 15px;
    font-weight: 700;
}


/* =========================================================
   REWARD GRID
========================================================= */

.reward-grid-all {
    width: 100%;

    display: grid;

    grid-template-columns:
        repeat(auto-fill, minmax(165px, 1fr));

    gap: 14px;
}


/* =========================================================
   REWARD CARD
========================================================= */

.reward-box {
    min-width: 0;

    display: flex;
    flex-direction: column;

    overflow: hidden;

    border: 1px solid #E8DDD0;
    border-radius: 9px;

    background: #FFFFFF;
}

.reward-box-img {
    width: 100%;
    height: 145px;

    display: grid;
    place-items: center;

    overflow: hidden;

    background: #F8EFE4;
}

.reward-box-img img {
    width: auto;
    height: auto;

    max-width: 82%;
    max-height: 120px;

    object-fit: contain;

    padding: 6px;
}

.reward-box-placeholder {
    font-size: 40px;
}

.reward-box-body {
    display: flex;
    flex-direction: column;

    flex: 1;

    padding: 11px;
}

.reward-box-name {
    min-height: 28px;

    color: #201810;

    font-size: 10px;
    line-height: 1.35;

    font-weight: 700;
}

.reward-box-point {
    margin-top: 4px;

    color: #7D6B5C;

    font-size: 9px;
}

.reward-box-point span {
    color: #D39B4C;

    font-size: 12px;
}

.reward-box-actions {
    margin-top: auto;
    padding-top: 8px;
}

.btn-primary {
    width: 100%;

    padding: 9px 6px;

    border: 0;
    border-radius: 6px;

    background: #4B2D1C;
    color: #FFFFFF;

    font-size: 8px;
    font-weight: 700;

    cursor: pointer;
}

.btn-primary:hover:not(:disabled) {
    background: #5B3927;
}

.btn-primary:disabled {
    background: #D8D8D8;
    color: #8A8A8A;

    cursor: not-allowed;
}


/* =========================================================
   HISTORY
========================================================= */

.history-box {
    width: 100%;

    padding: 0;

    border: 0;
    border-radius: 0;

    background: transparent;
}

.history-head {
    margin-bottom: 10px;
}

.history-title {
    margin: 0;

    color: #171311;

    font-size: 15px;
    font-weight: 700;
}

.history-row {
    display: flex;

    align-items: center;
    justify-content: space-between;

    gap: 15px;

    min-height: 52px;

    padding: 9px 4px;

    border-bottom: 1px solid #EEE4DA;
}

.history-row:last-child {
    border-bottom: 0;
}

.history-main {
    min-width: 0;
}

.history-name {
    overflow: hidden;

    color: #251B16;

    font-size: 10px;
    font-weight: 600;

    white-space: nowrap;
    text-overflow: ellipsis;
}

.history-date {
    margin-top: 3px;

    color: #9A8C80;

    font-size: 8px;
}

.history-status {
    flex-shrink: 0;

    padding: 5px 8px;

    border-radius: 999px;

    font-size: 8px;
    font-weight: 600;
}

.history-status.pending {
    background: #FEF3C7;
    color: #A16207;
}

.history-status.done {
    background: #DCFCE7;
    color: #15803D;
}

.history-status.failed {
    background: #FEE2E2;
    color: #B91C1C;
}


/* =========================================================
   POINT HISTORY
========================================================= */

.history-month {
    margin-top: 18px;
    margin-bottom: 8px;

    color: #5A3926;

    font-size: 11px;

    font-weight: 700;
}

.history-month:first-child {
    margin-top: 0;
}

.history-list {
    display: grid;

    gap: 10px;

    width: 100%;
}

.history-activity-row {
    display: grid;

    grid-template-columns:
        42px 190px minmax(0, 1fr) auto;

    align-items: center;

    gap: 14px;

    min-height: 62px;

    padding: 9px 14px;

    border: 1px solid #E9DED1;

    border-radius: 8px;

    background: #FFFFFF;

    box-shadow: 0 1px 3px rgba(52, 34, 23, 0.03);
}



/* ICON */

.history-activity-icon {
    width: 36px;
    height: 36px;

    display: grid;

    place-items: center;

    border-radius: 50%;

    font-size: 16px;
}

.history-activity-icon.plus {
    background: #EEF8F1;
    color: #3E8A56;
}

.history-activity-icon.minus {
    background: #FFF0F0;
    color: #C94343;
}

.history-activity-icon.redeem {
    width: 36px;
    height: 36px;

    display: grid;
    place-items: center;

    border-radius: 50%;

    background: #F7EBDD;

    color: #8A5A32;
}

.history-activity-icon.redeem svg {
    width: 18px;
    height: 18px;
}


/* DATE */

.history-activity-date {
    color: #75665C;

    font-size: 9px;

    white-space: nowrap;
}

.history-activity-date span {
    margin: 0 3px;
}


/* MAIN */

.history-activity-main {
    min-width: 0;
}

.history-activity-title {
    color: #251B16;

    font-size: 10px;

    font-weight: 600;

    line-height: 1.4;
}

.history-activity-description {
    margin-top: 3px;

    color: #75665C;

    font-size: 9px;

    line-height: 1.4;
}


/* POINT */

.history-activity-point {
    font-size: 11px;

    font-weight: 700;

    white-space: nowrap;
}

.history-activity-point.plus {
    color: #2F7D48;
}

.history-activity-point.minus {
    color: #B84444;
}

/* AREA POIN DAN STATUS PENUKARAN */
.history-activity-right {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    justify-content: center;
    gap: 6px;
    min-width: 0;
}

/* LABEL STATUS */
.history-activity-status {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    max-width: 100%;
    padding: 4px 8px;
    border-radius: 7px;
    font-size: 8px;
    font-weight: 600;
    line-height: 1.2;
    white-space: nowrap;
    box-sizing: border-box;
}

/* STATUS BELUM DIKONFIRMASI */
.history-activity-status.pending {
    background: #FFF2D8;
    color: #9A6715;
}

/* STATUS SUDAH BERHASIL DIKONFIRMASI */
/* STATUS BERHASIL — HIJAU */
.history-activity-status.done {
    background: #E4F3E6;
    color: #2E7D32;
}


/* EMPTY */

.history-empty {
    padding: 25px 10px;

    color: #8B796B;

    text-align: center;

    font-size: 10px;
}


/* Default: gunakan tombol disabled abu-abu */
.reward-insufficient {
    display: none;
}

.reward-insufficient-button {
    display: flex;
    align-items: center;
    justify-content: center;
}

/* =========================================================
   RESPONSIVE
========================================================= */

/* =========================================================
   1. DESKTOP: 721px KE ATAS
========================================================= */
@media (min-width: 721px) {

    /* LAYOUT UTAMA */
    .reward-page {
        gap: 18px;
    }

    .reward-summary {
        grid-template-columns: minmax(260px, 0.9fr) minmax(0, 1.1fr);
        gap: 14px;
    }

    /* DAFTAR REWARD */
    .reward-grid-all {
        grid-template-columns: repeat(auto-fill, minmax(165px, 1fr));
        gap: 14px;
    }

    .reward-box-img {
        height: 145px;
    }

    .reward-box-img img {
        max-width: 82%;
        max-height: 120px;
    }

    .reward-section {
        padding: 18px;
    }

    .reward-section-title {
        font-size: 18px;
        font-weight: 700;
    }

        /* =====================================================
       RIWAYAT PENUKARAN — DESKTOP
    ===================================================== */

    .history-activity-row {
        grid-template-columns: 54px minmax(125px, 190px) minmax(0, 1fr) auto;
        gap: 14px;
        align-items: center;
    }

    /* GAMBAR REWARD — KOTAK KREM */
    .history-activity-icon.redeem {
        grid-column: 1;
        grid-row: 1;

        display: grid;
        place-items: center;

        width: 54px;
        height: 54px;
        padding: 0;

        background: #F8EFE4;
        border-radius: 14px;
        overflow: hidden;
        box-sizing: border-box;
    }

    .history-activity-icon.redeem img {
        display: block;
        width: 90%;
        height: 90%;
        object-fit: contain;
        border-radius: 0;
    }

    /* TANGGAL */
    .history-activity-date {
        margin: 0;
        font-size: 10px;
        margin-left: 30px;
        white-space: nowrap;
        transform: none !important;
    }

    /* JUDUL DAN NAMA REWARD */
    .history-activity-main {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        gap: clamp(16px, 2vw, 30px);

        min-width: 0;
        margin: 0;
        transform: none !important;
    }

    .history-activity-title {
        flex: 0 0 auto;
        margin: 0;
            margin-left: 100px;
        font-size: 12px;
        white-space: nowrap;
        transform: none !important;
    }

    .history-activity-description {
    flex: 0 1 auto;
    min-width: 0;
    margin-left: 500px;
    font-size: 12px;
    white-space: nowrap;
    transform: none !important;
}

   
/* =====================================================
   PANEL STATISTIK — DESKTOP
   Menyesuaikan tampilan seperti gambar 1
===================================================== */

.reward-summary .reward-stat-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 0;

    min-height: 52px;
    border: 1px solid #E9DED1;
    border-radius: 11px;
    background: #FFFAF1;
    overflow: hidden;
    box-sizing: border-box;
}

.reward-summary .reward-stat-card {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 9px;

    min-width: 0;
    min-height: 52px;
    padding: 7px 12px;

    border: 0;
    border-radius: 0;
    background: transparent;
    box-sizing: border-box;
}

/* GARIS PEMISAH ANTARSTATISTIK */
.reward-summary .reward-stat-card + .reward-stat-card {
    position: relative;
    border-left: 0;
}

.reward-summary .reward-stat-card + .reward-stat-card::before {
    content: "";
    position: absolute;
    top: 8px;
    bottom: 8px;
    left: 0;
    width: 1px;
    background: #E9DED1;
}

/* IKON STATISTIK */
.reward-summary .reward-stat-icon {
    display: grid;
    place-items: center;

    width: 30px;
    height: 30px;
    flex: 0 0 30px;

    margin: 0;
    padding: 0;
    border: 0;
    border-radius: 0;
    background: transparent;

    color: transparent;
    font-size: 0;
}
/* BINTANG EMAS */
.reward-summary .reward-stat-card:first-child
.reward-stat-icon::before {
    content: "★";
    display: block;
    color: #D5A447;
    font-size: 35px;
    line-height: 1;
    transform: translateY(-3px);

}

/* LATAR LINGKARAN IKON HADIAH */
.reward-summary .reward-stat-card:nth-child(2)
.reward-stat-icon {
    border-radius: 0;
    background: transparent;
}

/* IKON HADIAH GARIS EMAS */
.reward-summary .reward-stat-card:nth-child(2)
.reward-stat-icon::before {
    content: "";
    display: block;
    width: 25px;
    height: 25px;

    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23D5A447' stroke-width='1.8' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M20 12v9H4v-9'/%3E%3Cpath d='M2 7h20v5H2z'/%3E%3Cpath d='M12 7v14'/%3E%3Cpath d='M12 7H7.5a2.5 2.5 0 1 1 0-5C10 2 12 7 12 7Z'/%3E%3Cpath d='M12 7h4.5a2.5 2.5 0 1 0 0-5C14 2 12 7 12 7Z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
}

/* TEKS STATISTIK */
/* TULISAN STATISTIK */
.reward-summary .reward-stat-label {
    font-size: 11px;
    line-height: 1.4;
}

/* JUMLAH POINT */
.reward-summary .reward-stat-value {
    margin-top: 3px;
    color: #33261F;
    font-size: 13px;
    line-height: 1.4;
    font-weight: 700;
    white-space: nowrap;
}


    /* TAB REWARD */
    .reward-tabs {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
        min-height: auto;
        padding: 0;
        border: 0;
        border-radius: 0;
        background: transparent;
    }

    .reward-tab {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 0;
        min-height: 36px;
        padding: 6px 12px;
        border: 1px solid #E5D8CB;
        border-radius: 14px;
        background: #FFFDF9;
        color: #4B2D1C;
        font-size: 11px;
        font-weight: 600;
        text-align: center;
        cursor: pointer;
    }

    .reward-tab.active {
        background: #4B2D1C;
        color: #FFFFFF;
        border-color: #4B2D1C;
    }

    /* GESER JUDUL PENUKARAN REWARD KE KANAN */
.history-activity-title {
    transform: translateX(130px) !important;
}

}



/* DESKTOP RESPONSIF: 721px–1400px */
@media (min-width: 721px) and (max-width: 1400px) {

    .history-activity-row {
        grid-template-columns: 54px minmax(125px, 160px) minmax(0, 1fr) auto;
        gap: 8px;
    }

    /* JUDUL DAN NAMA REWARD */
    .history-activity-main {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        gap: clamp(16px, 2vw, 30px);

        margin: 0;
        min-width: 0;
        transform: none !important;
    }

    /* JUDUL PENUKARAN */
    .history-activity-title {
        flex: 0 0 auto;
        margin: 0;
        margin-left: 70px;
        white-space: nowrap;
        transform: none !important;
    }

    /* NAMA REWARD */
    .history-activity-description {
        flex: 0 1 auto;
        min-width: 0;
        margin: 0;
        margin-left: 90px;
        white-space: nowrap;
        transform: none !important;
    }

    /* TANGGAL  */
.history-activity-date {
    margin: 0;
    transform: translateX(20px) !important;
}
}

/* =========================================================
   2. TABLET: 561px - 720px
========================================================= */
@media (min-width: 561px) and (max-width: 720px) {

    /* =====================================================
       LAYOUT UTAMA
    ===================================================== */
    .reward-page {
        gap: 16px;
    }

    .reward-head h1 {
        font-size: 25px;
    }

    .reward-head p {
        font-size: 11px;
        line-height: 1.5;
    }

    /* =====================================================
       PANEL SALDO + STATISTIK
    ===================================================== */
    .reward-summary {
        display: grid;
        grid-template-columns: minmax(0, 1fr);
        gap: 0;
        width: 100%;
    }

    /* Anak reward-summary-right menjadi item grid */
    .reward-summary-right {
        display: contents;
    }

    /* PANEL SALDO */
    .reward-summary > .reward-balance {
        position: relative;
        grid-column: 1;
        grid-row: 1;

        min-height: 115px;
        padding: 18px;

        background: #FFFAF1;
        border: 1px solid #E9DCCF;
        border-bottom: 0;
        border-radius: 14px 14px 0 0;

        box-sizing: border-box;
    }

    /* GAMBAR KADO */
    .reward-balance::after {
        content: "";

        position: absolute;
        width: 115px;
        height: 100px;

        right: 12px;
        top: 50%;
        transform: translateY(-50%);

        background-image: url('/images/reward_gift.png');
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;

        pointer-events: none;
    }

    .reward-balance-point strong {
        font-size: 30px;
    }

    /* PANEL STATISTIK */
    .reward-summary .reward-stat-grid {
        display: grid;
        grid-column: 1;
        grid-row: 2;

        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0;

        margin: 0;
        padding: 0;

        background: #FFFAF1;
        border: 1px solid #E9DCCF;
        border-top: 0;
        border-radius: 0 0 14px 14px;

        overflow: hidden;
        box-sizing: border-box;
    }

    .reward-summary .reward-stat-card {
        display: flex;
        align-items: center;
        gap: 8px;

        min-width: 0;
        min-height: 60px;
        padding: 10px;

        border: 0;
        border-radius: 0;
        background: transparent;

        box-sizing: border-box;
    }

    /* Garis pemisah kedua statistik */
    .reward-summary .reward-stat-card + .reward-stat-card {
        position: relative;
        border-left: 0;
    }

    .reward-summary .reward-stat-card + .reward-stat-card::before {
        content: "";

        position: absolute;
        left: 0;
        top: 8px;
        bottom: 8px;

        width: 1.5px;
        background: #E9DCCF;
    }

    /* Tulisan statistik */
    .reward-summary .reward-stat-label {
        font-size: 10px;
        line-height: 1.4;
    }

    .reward-summary .reward-stat-value {
        font-size: 12px;
        line-height: 1.4;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    /* IKON STATISTIK */
    .reward-summary .reward-stat-icon {
        display: grid;
        place-items: center;

        width: 30px;
        height: 30px;
        flex: 0 0 30px;

        background: transparent;
        border-radius: 0;
        color: transparent;
        font-size: 0;
    }

    /* Bintang emas */
    .reward-summary .reward-stat-card:first-child
    .reward-stat-icon::before {
        content: "★";
        color: #D5A447;
        font-size: 25px;
        line-height: 1;
    }

    /* Kado garis emas */
    .reward-summary .reward-stat-card:nth-child(2)
    .reward-stat-icon::before {
        content: "";
        display: block;

        width: 28px;
        height: 28px;

        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23D5A447' stroke-width='1.9' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M20 12v9H4v-9'/%3E%3Cpath d='M2 7h20v5H2z'/%3E%3Cpath d='M12 7v14'/%3E%3Cpath d='M12 7H7.5a2.5 2.5 0 1 1 0-5C10 2 12 7 12 7Z'/%3E%3Cpath d='M12 7h4.5a2.5 2.5 0 1 0 0-5C14 2 12 7 12 7Z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
    }

    /* =====================================================
       TAB REWARD DAN RIWAYAT
    ===================================================== */
    .reward-summary .reward-tabs {
        display: grid;
        grid-column: 1;
        grid-row: 3;

        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 6px;

        width: 100%;
        min-height: auto;
        margin-top: 18px;
        padding: 0;

        border: 0;
        border-radius: 0;
        background: transparent;
        box-sizing: border-box;
    }

    .reward-summary .reward-tab {
        display: flex;
        align-items: center;
        justify-content: center;

        width: 100%;
        min-width: 0;
        height: 50px;
        min-height: 50px;
        padding: 8px 7px;

        border: 1px solid #E5D8CB;
        border-radius: 12px;

        background: #FFFFFF;
        color: #4B2D1C;

        font-size: 13px;
        font-weight: 600;
        text-align: center;
        line-height: 1.3;

        box-shadow: 0 1px 3px rgba(70, 45, 25, 0.08);
        box-sizing: border-box;
        cursor: pointer;
    }

    .reward-summary .reward-tab.active {
        background: #4B2D1C;
        color: #FFFFFF;
        border-color: #4B2D1C;
    }

    /* =====================================================
       DAFTAR REWARD
    ===================================================== */
    .reward-section {
        padding: 14px;
    }

    .reward-section-title {
        font-size: 14px;
    }

    .reward-grid-all {
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 10px;
    }

    .reward-box {
        min-width: 0;
    }

    .reward-box-img {
        height: 110px;
    }

    .reward-box-img img {
        max-width: 86%;
        max-height: 95px;
    }

    .reward-box-body {
        padding: 8px;
    }

    .reward-box-name {
        min-height: 25px;
        font-size: 10px;
        overflow-wrap: anywhere;
    }

    .reward-box-point {
        position: relative;
        top: -8px;

        font-size: 10px;
        line-height: 1.4;
    }

    .reward-box-point span {
        font-size: 15px;
        color: #D39B4C;
        vertical-align: -1px;
    }

    .reward-box-actions {
        padding-top: 8px;
    }

    .btn-primary {
        min-height: 32px;
        padding: 7px 4px;
        font-size: 8px;
        overflow-wrap: anywhere;
    }
/* =====================================================
   RIWAYAT PENUKARAN — TABLET
   SEMUA ELEMEN SEJAJAR
===================================================== */

.history-activity-row {
    display: grid;
grid-template-columns: 56px minmax(90px, 0.9fr) minmax(0, 1.5fr) 65px;
    grid-template-rows: auto;
    align-items: center;
    column-gap: 8px;

    min-height: 68px;
    padding: 10px;
    box-sizing: border-box;
}

/* GAMBAR REWARD */
/* GAMBAR REWARD */
.history-activity-icon {
    grid-column: 1;
    grid-row: 1;

    width: 54px;
    height: 54px;
}

.history-activity-icon.redeem {
    grid-column: 1;
    grid-row: 1;

    display: grid;
    place-items: center;

    width: 54px;
    height: 54px;
    padding: 0;

    background: #F8EFE4;
    border-radius: 14px;
    overflow: hidden;
    box-sizing: border-box;
}

.history-activity-icon.redeem img {
    display: block;
    width: 90%;
    height: 90%;
    object-fit: contain;
    border-radius: 0;
}

/* TANGGAL */
.history-activity-date {
    grid-column: 2;
    grid-row: 1;

    min-width: 0;
    margin: 0;
    font-size: 8px;
    white-space: nowrap;
    transform: none !important;
}

/* JUDUL DAN NAMA REWARD */
.history-activity-main {
    grid-column: 3;
    grid-row: 1;

    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-start;
    flex-wrap: nowrap;
    gap: 6px;

    min-width: 0;
    margin: 0;
    transform: none !important;
}

/* PENUKARAN REWARD */
.history-activity-title {
    flex: 0 0 auto;
    margin: 0;
    font-size: 9px;
    white-space: nowrap;
    transform: none !important;
}

/* NAMA REWARD */
.history-activity-description {
    flex: 0 1 auto;
    min-width: 0;
    margin: 0 0 0 100px;
    font-size: 10px;
    white-space: nowrap;
    transform: none !important;
}

/* POIN */
.history-activity-point {
    grid-column: 4;
    grid-row: 1;

    width: 65px;
    justify-self: end;
    align-self: center;

    margin: 0;
    text-align: right;
    font-size: 8px;
    white-space: nowrap;
    transform: none !important;
}
}

/* =========================================================
   3. MOBILE: 381px - 560px
========================================================= */

@media (min-width: 381px) and (max-width: 560px) {

    /* =====================================================
       LAYOUT UTAMA
    ===================================================== */
    .reward-page {
        gap: 14px;
    }

    .reward-head h1 {
        font-size: 24px;
    }

    .reward-head p {
        font-size: 10px;
        line-height: 1.5;
    }

    /* =====================================================
       PANEL SALDO + STATISTIK
    ===================================================== */
    .reward-summary {
        display: grid;
        grid-template-columns: minmax(0, 1fr);
        gap: 0;
        width: 100%;
    }

    .reward-summary-right {
        display: contents;
    }

    /* PANEL SALDO */
    .reward-summary > .reward-balance {
        position: relative;
        grid-column: 1;
        grid-row: 1;

        min-height: 110px;
        padding: 16px;

        background: #FFFAF1;
        border: 1px solid #E9DCCF;
        border-bottom: 0;
        border-radius: 14px 14px 0 0;

        box-sizing: border-box;
    }

    /* GAMBAR KADO */
    .reward-balance::after {
        content: "";

        position: absolute;
        width: 115px;
        height: 100px;

        right: 12px;
        top: 50%;
        transform: translateY(-50%);

        background-image: url('/images/reward_gift.png');
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;

        pointer-events: none;
    }

    .reward-balance-point strong {
        font-size: 28px;
    }

    .reward-balance-rule {
        font-size: 11px;
        line-height: 1.4;
    }

    /* PANEL DUA STATISTIK */
    .reward-summary .reward-stat-grid {
        display: grid;
        grid-column: 1;
        grid-row: 2;

        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0;

        margin: 0;
        padding: 0;

        background: #FFFAF1;
        border: 1px solid #E9DCCF;
        border-top: 0;
        border-radius: 0 0 14px 14px;

        overflow: hidden;
        box-sizing: border-box;
    }

    .reward-summary .reward-stat-card {
        display: flex;
        align-items: center;
        gap: 7px;

        min-width: 0;
        min-height: 54px;
        padding: 9px;

        border: 0;
        border-radius: 0;
        background: transparent;

        box-sizing: border-box;
    }

    /* GARIS PEMISAH STATISTIK */
    .reward-summary .reward-stat-card + .reward-stat-card {
        position: relative;
        border-left: 0;
    }

    .reward-summary .reward-stat-card + .reward-stat-card::before {
        content: "";

        position: absolute;
        left: 0;
        top: 7px;
        bottom: 7px;

        width: 1.5px;
        background: #D8C5AF;
    }

    /* TULISAN STATISTIK */
    .reward-summary .reward-stat-label {
        font-size: 9px;
        line-height: 1.4;
    }

    .reward-summary .reward-stat-value {
        font-size: 10px;
        line-height: 1.4;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    /* IKON STATISTIK */
    .reward-summary .reward-stat-icon {
        position: relative;

        display: grid;
        place-items: center;

        width: 27px;
        height: 27px;
        flex: 0 0 27px;

        background: transparent;
        border-radius: 0;
        color: transparent;
        font-size: 0;
    }

    /* BINTANG EMAS */
    .reward-summary .reward-stat-card:first-child
    .reward-stat-icon::before {
        content: "★";
        color: #D5A447;
        font-size: 22px;
        line-height: 1;
    }

    /* IKON KADO EMAS */
    .reward-summary .reward-stat-card:nth-child(2)
    .reward-stat-icon::before {
        content: "";
        display: block;

        width: 24px;
        height: 24px;

        background-image: url("data:image/svg+xml,%3Csvg xmlns=%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22 viewBox=%220 0 24 24%22 fill=%22none%22 stroke=%22%23D5A447%22 stroke-width=%221.9%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22%3E%3Cpath d=%22M20 12v9H4v-9%22/%3E%3Cpath d=%22M2 7h20v5H2z%22/%3E%3Cpath d=%22M12 7v14%22/%3E%3Cpath d=%22M12 7H7.5a2.5 2.5 0 1 1 0-5C10 2 12 7 12 7Z%22/%3E%3Cpath d=%22M12 7h4.5a2.5 2.5 0 1 0 0-5C14 2 12 7 12 7Z%22/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
    }

    /* =====================================================
       TOMBOL TAB REWARD DAN RIWAYAT
    ===================================================== */
    .reward-summary .reward-tabs {
        display: grid;
        grid-column: 1;
        grid-row: 3;

        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 8px;

        width: 100%;
        min-height: auto;
        margin-top: 10px;
        margin-bottom: 6px;
        padding: 0;

        border: 0;
        border-radius: 0;
        background: transparent;
    }

    .reward-summary .reward-tab {
        display: flex;
        align-items: center;
        justify-content: center;

        width: 100%;
        min-width: 0;
        height: 40px;
        min-height: 40px;
        padding: 6px 3px;

        border: 1px solid #E5D8CB;
        border-radius: 10px;

        background: #FFFDF9;
        color: #4B2D1C;

        font-size: 10px;
        font-weight: 600;
        line-height: 1.3;
        text-align: center;

        box-sizing: border-box;
        cursor: pointer;
    }

    .reward-summary .reward-tab.active {
        background: #4B2D1C;
        color: #FFFFFF;
        border-color: #4B2D1C;
    }

    /* =====================================================
       BAGIAN JUDUL REWARD
    ===================================================== */
    .reward-section {
        width: 100%;
        padding: 0;

        border: 0;
        border-radius: 0;
        background: transparent;
        box-shadow: none;

        box-sizing: border-box;
    }

    .reward-section-head {
        margin-bottom: 8px;
        padding: 0 2px;
    }

    .reward-section-title,
    .history-title {
        font-size: 13px;
    }

    /* =====================================================
       KARTU REWARD HORIZONTAL
    ===================================================== */
    .reward-grid-all {
        display: grid;
        grid-template-columns: minmax(0, 1fr);
        gap: 8px;
        width: 100%;
    }

    .reward-box {
        display: grid;
        grid-template-columns: 60px minmax(0, 1fr);
        align-items: stretch;

        width: 100%;
        min-width: 0;
        min-height: 66px;

        border: 1px solid #E6DDD3;
        border-radius: 8px;
        background: #FFFFFF;
        box-shadow: 0 2px 5px rgba(70, 45, 25, 0.10);

        overflow: hidden;
        box-sizing: border-box;
    }

    /* GAMBAR REWARD */
    .reward-box-img {
        display: grid;
        place-items: center;

        width: 60px;
        height: 100%;
        min-height: 66px;
        padding: 3px;

        background: #FFFFFF;
        box-sizing: border-box;
    }

    .reward-box-img img {
        display: block;

        width: auto;
        height: auto;
        max-width: 100%;
        max-height: 60px;
        padding: 0;

        object-fit: contain;
    }

    .reward-box-placeholder {
        font-size: 24px;
    }

    /* NAMA DAN POIN REWARD */
    .reward-box-body {
        position: relative;

        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        gap: 3px;

        min-width: 0;
        min-height: 66px;
        padding: 5px 66px 5px 5px;

        box-sizing: border-box;
    }

    .reward-box-name {
        min-height: 0;
        margin: 0;

        color: #33261F;
        font-size: 14px;
        font-weight: 600;
        line-height: 1.3;

        overflow-wrap: anywhere;
    }

    .reward-box-point {
        position: static;

        margin: 0;
        color: #7D6B5C;
        font-size: 9px;
        line-height: 1.3;
    }

    .reward-box-point span {
        display: none;
    }

    /* =====================================================
       TOMBOL PENUKARAN DI SEBELAH KANAN
    ===================================================== */
    .reward-box-actions {
        position: absolute;
        top: 50%;
        right: 5px;
        transform: translateY(-50%);

        width: 56px;
        min-width: 0;
        margin: 0;
        padding: 0;
    }

    .reward-box-actions form {
        width: 100%;
        margin: 0;
    }

    .reward-box-actions .btn-primary {
        display: flex;
        align-items: center;
        justify-content: center;

        width: 100%;
        min-width: 0;
        min-height: 24px;
        height: auto;
        margin: 0;
        padding: 4px 2px;

        border-radius: 5px;
        font-size: 6px;
        line-height: 1.25;
        text-align: center;

        overflow-wrap: anywhere;
        box-sizing: border-box;
    }

    /* STATUS SAAT POIN BELUM CUKUP */
    .reward-box-actions .reward-insufficient-button {
        display: none !important;
    }

    .reward-box-actions .reward-insufficient {
        display: flex !important;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 1px;

        width: 100%;
        min-width: 0;
        min-height: 38px;
        margin: 0;
        padding: 2px;

        color: #8B796B;
        text-align: center;
        line-height: 1.2;

        box-sizing: border-box;
        position: static;
        transform: none;
    }

    .reward-box-actions .reward-insufficient-icon {
        font-size: 11px;
        line-height: 1;
    }

    .reward-box-actions .reward-insufficient-label,
    .reward-box-actions .reward-insufficient-point {
        font-size: 7px;
        line-height: 1.2;
    }

    .reward-box-actions .reward-insufficient-label {
        font-weight: 400;
    }
/* =====================================================
   RIWAYAT PENUKARAN — MOBILE
===================================================== */

.history-box {
    min-width: 0;
}

.history-list {
    gap: 9px;
}

/* KARTU RIWAYAT */
.history-activity-row {
    display: grid;
    grid-template-columns: 56px minmax(72px, 0.9fr) minmax(0, 1.4fr) 55px;
    grid-template-rows: auto;

    align-items: center;
    column-gap: 6px;

    min-height: 64px;
    padding: 8px;
    box-sizing: border-box;
}

/* GAMBAR REWARD */

.history-activity-icon,

.history-activity-icon.redeem {
    grid-column: 1;
    grid-row: 1;
    width: 54px;
    height: 54px;
    padding: 0;
    display: grid;
    place-items: center;
    overflow: hidden;
    border-radius: 14px;
    background: #F8EFE4;
    box-sizing: border-box;
}

.history-activity-icon.redeem img {
    width: 90%;
    height: 90%;
    object-fit: contain;
    border-radius: 0;
}
/* TANGGAL */
.history-activity-date {
    grid-column: 2;
    grid-row: 1;

    min-width: 0;
    margin: 0;
    font-size: 8px;
    line-height: 1.4;
    white-space: normal;

    transform: translateX(10px) !important;
}

/* JUDUL DAN NAMA REWARD */
.history-activity-main {
    grid-column: 3;
    grid-row: 1;

    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-start;
    flex-wrap: nowrap;
    gap: 0;

    min-width: 0;
    margin: 0;

    transform: translateX(-10px) !important;
}

/* PENUKARAN REWARD */
.history-activity-title {
    flex: 0 0 auto;
    margin: 0;

    font-size: 8px;
    white-space: nowrap;

    transform: none !important;
}

/* NAMA REWARD */
.history-activity-description {
    flex: 0 1 auto;
    min-width: 0;
    margin: 0 0 0 60px;
    font-size: 9px;
    white-space: nowrap;
    transform: none !important;
}

/* POIN */
.history-activity-point {
    grid-column: 4;
    grid-row: 1;

    width: 55px;
    justify-self: end;
    align-self: center;

    margin: 0;
    font-size: 7px;
    text-align: right;
    white-space: nowrap;

    transform: none !important;
}

/* BULAN RIWAYAT */
.history-month {
    font-size: 10px;
}




}


/* =========================================================
   4. MOBILE KECIL: 380px KE BAWAH
========================================================= */
@media (max-width: 380px) {

    /* =====================================================
       PAGE DAN HEADER
    ===================================================== */
    .reward-page {
        gap: 12px;
    }

    .reward-head h1 {
        font-size: 22px;
    }

    .reward-head p {
        font-size: 10px;
        line-height: 1.5;
    }

    /* =====================================================
       PANEL SALDO + STATISTIK
    ===================================================== */
    .reward-summary {
        display: grid;
        grid-template-columns: minmax(0, 1fr);
        gap: 0;
        width: 100%;
    }

    .reward-summary > .reward-balance {
        position: relative;
        grid-column: 1;
        grid-row: 1;

        min-height: 85px;
        padding: 10px 14px;

        background: #FFFAF1;
        border: 1px solid #E9DCCF;
        border-bottom: 0;
        border-radius: 12px 12px 0 0;

        box-sizing: border-box;
    }

    /* GAMBAR KADO */
    .reward-balance::after {
        content: "";

        position: absolute;
        width: 90px;
        height: 80px;

        right: 8px;
        top: 50%;
        transform: translateY(-50%);

        background-image: url('/images/reward_gift.png');
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;

        pointer-events: none;
    }

    .reward-balance-label {
        font-size: 9px;
    }

    .reward-balance-point {
        margin-top: 6px;
        gap: 5px;
    }

    .reward-balance-point strong {
        font-size: 26px;
    }

    .reward-balance-point span {
        font-size: 11px;
    }

    .reward-balance-rule {
        font-size: 8px;
    }

    /* Hilangkan wrapper kanan secara visual */
    .reward-summary-right {
        display: contents;
    }

    /* PANEL STATISTIK */
    .reward-summary .reward-stat-grid {
        display: grid;
        grid-column: 1;
        grid-row: 2;

        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0;

        margin: 0;
        padding: 0;

        background: #FFFAF1;
        border: 1px solid #E9DCCF;
        border-top: 0;
        border-radius: 0 0 12px 12px;

        overflow: hidden;
        box-sizing: border-box;
    }

    .reward-summary .reward-stat-card {
        display: flex;
        align-items: center;
        gap: 6px;

        min-width: 0;
        min-height: 46px;
        padding: 6px 8px;

        border: 0;
        border-radius: 0;
        background: transparent;

        box-sizing: border-box;
    }

    /* GARIS PEMISAH STATISTIK */
    .reward-summary .reward-stat-card + .reward-stat-card {
        position: relative;
        border-left: 0;
    }

    .reward-summary .reward-stat-card + .reward-stat-card::before {
        content: "";

        position: absolute;
        left: 0;
        top: 7px;
        bottom: 7px;

        width: 1.5px;
        background: #D8C5AF;
    }

    /* IKON STATISTIK */
    .reward-summary .reward-stat-icon {
        position: relative;

        display: grid;
        place-items: center;

        width: 24px;
        height: 24px;
        flex: 0 0 24px;

        background: transparent;
        border-radius: 0;
        color: transparent;
        font-size: 0;
    }

    /* BINTANG EMAS */
    .reward-summary .reward-stat-card:first-child
    .reward-stat-icon::before {
        content: "★";
        color: #D5A447;
        font-size: 20px;
        line-height: 1;
    }

    /* IKON KADO EMAS */
    .reward-summary .reward-stat-card:nth-child(2)
    .reward-stat-icon::before {
        content: "";
        display: block;

        width: 22px;
        height: 22px;

        background-image: url("data:image/svg+xml,%3Csvg xmlns=%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22 viewBox=%220 0 24 24%22 fill=%22none%22 stroke=%22%23D5A447%22 stroke-width=%221.9%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22%3E%3Cpath d=%22M20 12v9H4v-9%22/%3E%3Cpath d=%22M2 7h20v5H2z%22/%3E%3Cpath d=%22M12 7v14%22/%3E%3Cpath d=%22M12 7H7.5a2.5 2.5 0 1 1 0-5C10 2 12 7 12 7Z%22/%3E%3Cpath d=%22M12 7h4.5a2.5 2.5 0 1 0 0-5C14 2 12 7 12 7Z%22/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
    }

    /* TULISAN STATISTIK */
    .reward-summary .reward-stat-label {
        font-size: 7px;
        line-height: 1.3;
    }

    .reward-summary .reward-stat-value {
        font-size: 9px;
        line-height: 1.4;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    /* =====================================================
       TOMBOL REWARD DAN RIWAYAT
    ===================================================== */
    .reward-summary .reward-tabs {
        display: grid;
        grid-column: 1;
        grid-row: 3;

        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 6px;

        width: 100%;
        min-height: auto;
        margin-top: 10px;
        margin-bottom: 6px;
        padding: 0;

        border: 0;
        border-radius: 0;
        background: transparent;
    }

    .reward-summary .reward-tab {
        display: flex;
        align-items: center;
        justify-content: center;

        width: 100%;
        min-width: 0;
        height: 36px;
        min-height: 36px;
        padding: 5px 3px;

        border: 1px solid #E5D8CB;
        border-radius: 8px;

        background: #FFFDF9;
        color: #4B2D1C;

        font-size: 7px;
        font-weight: 600;
        line-height: 1.3;
        text-align: center;

        box-sizing: border-box;
        cursor: pointer;
    }

    .reward-summary .reward-tab.active {
        background: #4B2D1C;
        color: #FFFFFF;
        border-color: #4B2D1C;
    }

    /* =====================================================
       BAGIAN REWARD
    ===================================================== */
    .reward-section {
        width: 100%;
        padding: 0;

        border: 0;
        border-radius: 0;
        background: transparent;
        box-shadow: none;

        box-sizing: border-box;
    }

    .reward-section-head {
        margin-bottom: 9px;
        padding: 0 2px;
    }

    .reward-section-title,
    .history-title {
        font-size: 12px;
    }

    /* =====================================================
       KARTU REWARD HORIZONTAL
    ===================================================== */
    .reward-grid-all {
        display: grid;
        grid-template-columns: minmax(0, 1fr);
        gap: 8px;
        width: 100%;
    }

    .reward-box {
        position: relative;

        display: grid;
        grid-template-columns: 64px minmax(0, 1fr);
        align-items: stretch;

        width: 100%;
        min-width: 0;
        min-height: 68px;

        border: 1px solid #E6DDD3;
        border-radius: 8px;
        background: #FFFFFF;
        box-shadow: 0 2px 5px rgba(70, 45, 25, 0.10);

        overflow: hidden;
        box-sizing: border-box;
    }

    /* GAMBAR REWARD DI KIRI */
    .reward-box-img {
        grid-column: 1;
        grid-row: 1;

        display: grid;
        place-items: center;

        width: 64px;
        height: 100%;
        min-height: 68px;
        padding: 4px;

        background: #FFFFFF;
        box-sizing: border-box;
    }

    .reward-box-img img {
        display: block;

        width: auto;
        height: auto;
        max-width: 100%;
        max-height: 70px;
        padding: 0;

        object-fit: contain;
        box-sizing: border-box;
    }

    .reward-box-placeholder {
        font-size: 25px;
    }

    /* NAMA, POIN, DAN TOMBOL */
    .reward-box-body {
        position: relative;

        grid-column: 2;
        grid-row: 1;

        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        gap: 4px;

        min-width: 0;
        min-height: 68px;
        padding: 8px 88px 8px 4px;

        box-sizing: border-box;
    }

    .reward-box-name {
        min-height: 0;
        margin: 0;

        font-size: 12px;
        font-weight: 600;
        line-height: 1.35;
        color: #33261F;

        overflow-wrap: anywhere;
    }

    .reward-box-point {
        margin: 0;

        font-size: 9px;
        line-height: 1.4;
        position: static;
        color: #6F5D50;
    }

    .reward-box-point span {
        display: none;
    }

    /* TOMBOL DI KANAN */
    .reward-box-actions {
        position: absolute;
        top: 50%;
        right: 8px;
        transform: translateY(-50%);

        width: 74px;
        min-width: 0;
        margin: 0;
        padding: 0;
    }

    .reward-box-actions form {
        width: 100%;
        margin: 0;
    }

    .reward-box-actions .btn-primary {
        display: flex;
        align-items: center;
        justify-content: center;

        width: 100%;
        min-width: 0;
        min-height: 28px;
        height: auto;
        margin: 0;
        padding: 4px 3px;

        border-radius: 6px;
        font-size: 7px;
        line-height: 1.3;
        text-align: center;

        overflow-wrap: anywhere;
        box-sizing: border-box;
    }

    /* STATUS JIKA POIN BELUM CUKUP */
    .reward-box-actions .reward-insufficient-button {
        display: none !important;
    }

    .reward-box-actions .reward-insufficient {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 2px;

        width: 100%;
        min-width: 0;
        min-height: 46px;
        margin: 0;
        padding: 3px;

        color: #8B796B;
        text-align: center;
        line-height: 1.25;

        box-sizing: border-box;
        position: relative;
        top: 5px;
    }

    .reward-box-actions .reward-insufficient-icon {
        font-size: 12px;
        line-height: 1.1;
    }

    .reward-box-actions .reward-insufficient-label,
    .reward-box-actions .reward-insufficient-point {
        font-size: 8px;
        line-height: 1.25;
    }

    .reward-box-actions .reward-insufficient-label {
        font-weight: 400;
    }

    .reward-box-actions .btn-primary:disabled {
        background: #D8D8D8;
        color: #8A8A8A;
        cursor: not-allowed;
    }

    /* =====================================================
       RIWAYAT PENUKARAN
    ===================================================== */
    .history-box {
        min-width: 0;
    }

    .history-list {
        display: grid;
        gap: 8px;
        width: 100%;
    }
.history-activity-row {
    display: grid;
    grid-template-columns: 56px minmax(0, 1fr) 64px;
    grid-template-rows: auto auto;

    column-gap: 7px;
    row-gap: 3px;

    min-height: 78px;
    padding: 8px;

    box-sizing: border-box;
}

   .history-activity-icon,
.history-activity-icon.redeem {
    grid-column: 1;
    grid-row: 1 / span 2;

    display: grid;
    place-items: center;

    width: 52px;
    height: 52px;
    padding: 4px;

    background: #F8EFE4;
    border-radius: 10px;
    overflow: hidden;
    box-sizing: border-box;
}


    .history-activity-icon.redeem svg {
        width: 15px;
        height: 15px;
    }
/* GAMBAR REWARD DI RIWAYAT — MOBILE KECIL */
/* GAMBAR REWARD — KOTAK DAN LEBIH BESAR */
.history-activity-icon.redeem {
    display: grid;
    place-items: center;

    width: 52px;
    height: 52px;
    padding: 4px;

    background: #F8EFE4;
    border-radius: 10px;
    overflow: hidden;
    box-sizing: border-box;
}

.history-activity-icon.redeem img {
    display: block;

    width: 100%;
    height: 100%;

    object-fit: contain;
    border-radius: 6px;
}

.history-activity-icon.redeem img {
    display: block;

    width: 100%;
    height: 100%;

    object-fit: contain;
    border-radius: 6px;
}

  /* TANGGAL — MOBILE KECIL */
.history-activity-date {
    grid-column: 2;
    grid-row: 1;

    min-width: 0;
    margin: 0;

    font-size: 7px;
    line-height: 1.3;
    white-space: normal;

    transform: none !important;
}

/* DETAIL PENUKARAN */
.history-activity-main {
    grid-column: 2;
    grid-row: 2;

    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 3px;

    min-width: 0;
    margin: 0;

    transform: none !important;
}

/* JUDUL */
.history-activity-title {
    margin: 0;

    font-size: 8px;
    line-height: 1.3;
    overflow-wrap: anywhere;

    /* Naikkan posisi tulisan */
    transform: translateY(-10px) !important;
}

/* NAMA REWARD */
.history-activity-description {
    margin: 0;

    font-size: 7px;
    line-height: 1.3;
    white-space: normal;
    overflow-wrap: anywhere;

    /* Naikkan posisi nama reward */
    transform: translateY(-9px) !important;
}

/* KOLOM KANAN: POIN DAN STATUS */
.history-activity-right {
    grid-column: 3;
    grid-row: 1 / span 2;

    display: flex;
    flex-direction: column;
    align-items: flex-end;
    justify-content: center;
    gap: 6px;

    width: 64px;
    min-width: 0;

    justify-self: end;
    align-self: center;
}

/* POIN DI ATAS STATUS */
.history-activity-right .history-activity-point {
    width: auto;
    margin: 0;

    font-size: 8px;
    line-height: 1.3;
    text-align: right;
    white-space: nowrap;

    transform: none !important;
}

/* LABEL STATUS */
.history-activity-right .history-activity-status {
    max-width: 100%;
    padding: 4px 6px;
    font-size: 7px;
    text-align: center;
}

/* STATUS BERHASIL — HIJAU UNTUK HP MAKSIMAL 380px */
.history-activity-status.done {
    background: #DCFCE7;
    color: #15803D;
}

    .history-month {
        font-size: 9px;
        margin-top: 14px;
        margin-bottom: 7px;
    }

    .history-empty {
        padding: 20px 8px;
        font-size: 9px;
    }

}




/* =====================================================
   MODAL REDEMPTION — OVERLAY MENGAMBANG
===================================================== */

/* Modal tersembunyi sebelum dibuka */
#redemption-modal[hidden] {
    display: none !important;
}

/* Latar gelap di belakang modal */
#redemption-modal {
    position: fixed;
    inset: 0;
    z-index: 99999;

    display: flex;
    align-items: center;
    justify-content: center;

    padding: 16px;
    background: rgba(0, 0, 0, 0.58);

    overflow-y: auto;
    box-sizing: border-box;
}

/* Card Redemption */
#redemption-modal #redemption-inline {
    position: relative;

    width: 100%;
    max-width: 440px;
    max-height: calc(100vh - 32px);

    margin: auto;
    padding: 30px 24px 24px;

    overflow-y: auto;
    overscroll-behavior: contain;

    text-align: center;
    background: #FFFDF9;
    border: 1px solid #E9DED1;
    border-radius: 24px;

    box-shadow: 0 18px 55px rgba(0, 0, 0, 0.20);
    box-sizing: border-box;
}

/* Tombol silang */
#redemption-modal .redemption-close {
    position: absolute;
    top: 12px;
    right: 12px;

    display: grid;
    place-items: center;

    width: 32px;
    height: 32px;
    padding: 0;

    border: 0;
    border-radius: 50%;
    background: #F4EDE5;
    color: #5A4537;

    font-size: 23px;
    line-height: 1;
    cursor: pointer;
}

#redemption-modal .redemption-close:hover {
    background: #E9DED1;
}

/* Label */
#redemption-modal .redemption-label {
    margin-top: 12px;
    color: #8B796B;
    font-size: 10px;
    letter-spacing: .1em;
    text-transform: uppercase;
}

/* Nama reward */
#redemption-modal .redemption-title {
    margin: 7px 0 4px;
    color: #4B2D1C;
    font-size: 24px;
    font-weight: 700;
    line-height: 1.3;
    overflow-wrap: anywhere;
}

/* Keterangan */
#redemption-modal .redemption-subtitle {
    margin: 0;
    color: #8B796B;
    font-size: 12px;
    line-height: 1.5;
}

/* QR Code */
#redemption-modal .redemption-qr {
    display: grid;
    place-items: center;

    width: 210px;
    height: 210px;
    margin: 20px auto 14px;
    padding: 12px;

    background: #FFFFFF;
    border: 1px solid #E9DED1;
    border-radius: 16px;
    overflow: hidden;
    box-sizing: border-box;
}

#redemption-modal .redemption-qr svg {
    display: block;
    width: 100%;
    height: 100%;
    max-width: 194px;
    max-height: 194px;
}

/* Kode redemption */
#redemption-modal .redemption-code-label {
    color: #8B796B;
    font-size: 10px;
}

#redemption-modal .redemption-code {
    margin-top: 4px;
    color: #4B2D1C;
    font-size: 22px;
    font-weight: 700;
    letter-spacing: .05em;
    overflow-wrap: anywhere;
}

/* Kartu poin dan status */
#redemption-modal .redemption-info {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 9px;
    margin-top: 16px;
}

#redemption-modal .redemption-info-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    min-width: 0;
    min-height: 66px;
    padding: 10px 7px;

    background: #FFFFFF;
    border: 1px solid #E9DED1;
    border-radius: 12px;
    box-sizing: border-box;
}

#redemption-modal .redemption-info-label {
    color: #8B796B;
    font-size: 9px;
}

#redemption-modal .redemption-info-value {
    margin-top: 3px;
    color: #171311;
    font-size: 15px;
    font-weight: 700;
    overflow-wrap: anywhere;
}

/* Tombol kembali */
#redemption-modal .redemption-back {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 100%;
    min-height: 42px;
    margin-top: 14px;
    padding: 10px 14px;

    border: 0;
    border-radius: 10px;
    background: #4B2D1C;
    color: #FFFFFF;

    font-size: 11px;
    font-weight: 700;
    cursor: pointer;
    box-sizing: border-box;
}

#redemption-modal .redemption-back:hover {
    background: #5B3927;
}

/* Catatan */
#redemption-modal .redemption-note {
    margin-top: 13px;
    padding: 11px;

    border-radius: 11px;
    background: #FFF4DF;
    color: #765C45;

    font-size: 10px;
    line-height: 1.6;
    overflow-wrap: anywhere;
    box-sizing: border-box;
}

/* Responsif untuk layar kecil */
@media (max-width: 560px) {
    #redemption-modal {
        padding: 14px;
    }

    #redemption-modal #redemption-inline {
        max-width: 420px;
        max-height: calc(100vh - 28px);
        padding: 26px 18px 18px;
        border-radius: 20px;
    }

#redemption-modal .redemption-qr {
    width: 200px;
    height: 200px;
    margin-top: 17px;
    padding: 12px;
}

#redemption-modal .redemption-qr svg {
    max-width: 180px;
    max-height: 180px;
}

    #redemption-modal .redemption-title {
        font-size: 22px;
    }

    #redemption-modal .redemption-code {
        font-size: 19px;
    }
}

@media (max-width: 380px) {
    #redemption-modal {
        padding: 10px;
    }

    #redemption-modal #redemption-inline {
        max-height: calc(100vh - 20px);
        padding: 24px 12px 14px;
        border-radius: 16px;
    }

    #redemption-modal .redemption-qr {
    width: 185px;
    height: 185px;
    padding: 15px;
}

#redemption-modal .redemption-qr svg {
    max-width: 165px;
    max-height: 165px;
}
    #redemption-modal .redemption-title {
        font-size: 20px;
    }

    #redemption-modal .redemption-code {
        font-size: 17px;
    }
}

#redemption-inline-status.status-success {
    color: #2E7D32;
}

#redemption-inline-status.status-pending {
    color: #171311;
}

#redemption-inline-status.status-failed {
    color: #B42318;
}

.history-activity-status.failed {
    background: #FDE7E7;
    color: #B42318;
}


/* =====================================================
   MODAL KONFIRMASI REWARD
===================================================== */

#reward-confirm-modal[hidden] {
    display: none !important;
}

#reward-confirm-modal {
    position: fixed;
    inset: 0;
    z-index: 100000;

    display: flex;
    align-items: center;
    justify-content: center;

    padding: 20px;
    overflow-y: auto;

    background: rgba(25, 18, 13, 0.58);
    box-sizing: border-box;
}

.reward-confirm-card {
    position: relative;

    width: 100%;
    max-width: 420px;
    padding: 30px 26px 24px;

    border: 1px solid #E9DED1;
    border-radius: 18px;

    background: #FFFAF1;
    color: #33261F;

    box-shadow: 0 18px 55px rgba(0, 0, 0, 0.2);
    box-sizing: border-box;
}

.reward-confirm-close {
    position: absolute;
    top: 12px;
    right: 14px;

    width: 32px;
    height: 32px;

    border: 0;
    border-radius: 50%;

    background: #F4E6D4;
    color: #4B2D1C;

    font-size: 23px;
    cursor: pointer;
}

.reward-confirm-heading {
    padding-right: 20px;

    color: #4B2D1C;
    font-size: 22px;
    font-weight: 700;
}

.reward-confirm-subtitle {
    margin: 9px 0 20px;

    color: #827265;
    font-size: 13px;
    line-height: 1.6;
}

.reward-confirm-item {
    display: flex;
    align-items: center;
    gap: 14px;

    padding: 13px;

    border: 1px solid #E9DED1;
    border-radius: 12px;

    background: #FFFDF9;
}

.reward-confirm-image {
    display: grid;
    place-items: center;

    flex: 0 0 82px;
    width: 82px;
    height: 82px;

    border-radius: 10px;
    background: #F8EFE4;
    overflow: hidden;
}

.reward-confirm-image img {
    width: 100%;
    height: 100%;
    padding: 5px;

    object-fit: contain;
    box-sizing: border-box;
}

.reward-confirm-detail {
    min-width: 0;
}

.reward-confirm-detail h2 {
    margin: 0;

    color: #33261F;
    font-size: 15px;
    line-height: 1.4;
    overflow-wrap: anywhere;
}

.reward-confirm-detail p {
    margin: 7px 0 0;

    color: #7D6B5C;
    font-size: 12px;
}

.reward-confirm-detail p span {
    color: #D39B4C;
}

.reward-confirm-note {
    margin: 15px 0 20px;

    color: #827265;
    font-size: 11px;
    line-height: 1.6;
}

.reward-confirm-actions {
    display: flex;
    gap: 10px;
}

.reward-confirm-actions button {
    flex: 1;
    min-height: 43px;
    padding: 10px;

    border-radius: 8px;

    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
}

#reward-confirm-cancel {
    border: 1px solid #D8C5AF;
    background: #FFFFFF;
    color: #4B2D1C;
}

#reward-confirm-submit {
    border: 1px solid #4B2D1C;
    background: #4B2D1C;
    color: #FFFFFF;
}

#reward-confirm-submit:hover:not(:disabled) {
    background: #5B3927;
}

.reward-confirm-actions button:disabled {
    opacity: 0.65;
    cursor: not-allowed;
}

@media (max-width: 480px) {
    .reward-confirm-card {
        padding: 28px 18px 20px;
        border-radius: 15px;
    }

    .reward-confirm-heading {
        font-size: 19px;
    }

    .reward-confirm-image {
        flex-basis: 70px;
        width: 70px;
        height: 70px;
    }
}

</style>


<div class="reward-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="reward-head">

        <div>

            <h1>
                Reward
            </h1>

            <p>
                Tukarkan point dengan reward favorit Anda.
            </p>

        </div>

    </div>


    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    <div class="reward-summary">


        {{-- POINT CUSTOMER --}}
        <div class="reward-balance">

            <div class="reward-balance-label">
                Point Kamu Saat Ini
            </div>

            <div class="reward-balance-point">

                <strong>
                    {{ number_format((int) $customer->saldo_point, 0, ',', '.') }}
                </strong>

                <span>
                    Point
                </span>

            </div>

            <div class="reward-balance-rule">
                1 Point = Rp 10.000 pembelanjaan
            </div>

        </div>


        {{-- RIGHT SIDE --}}
        <div class="reward-summary-right">


            {{-- STATISTICS --}}
            <div class="reward-stat-grid">

                <div class="reward-stat-card">

                    <div class="reward-stat-icon">
                        ☆
                    </div>

                    <div>

                        <div class="reward-stat-label">
                            Total Point Didapat
                        </div>

                        <div class="reward-stat-value">
                            {{ number_format((int) ($totalPointDidapat ?? 0), 0, ',', '.') }}
                            Point
                        </div>

                    </div>

                </div>


                <div class="reward-stat-card">

                    <div class="reward-stat-icon">
                        🎁
                    </div>

                    <div>

                        <div class="reward-stat-label">
                            Total Point Digunakan
                        </div>

                        <div class="reward-stat-value">
                            {{ number_format((int) ($totalPointDigunakan ?? 0), 0, ',', '.') }}
                            Point
                        </div>

                    </div>

                </div>

            </div>


            {{-- TABS --}}
            <div class="reward-tabs" role="tablist">

              <button type="button" class="reward-tab" data-tab="reward">
    Reward
</button>

<button type="button" class="reward-tab" data-tab="history">
    Riwayat Penukaran
</button>
            </div>

        </div>

    </div>


    {{-- =====================================================
         REWARD CONTENT
    ====================================================== --}}

    <section id="reward-list" class="reward-section reward-tab-content active">

        <div class="reward-section-head">

            <h2 class="reward-section-title">
                Reward Tersedia
            </h2>

        </div>


        <div class="reward-grid-all">

            @php
    $rewards = $rewards->sortBy('point_required');
@endphp

@forelse($rewards as $reward)

            <article class="reward-box">


                <div class="reward-box-img">

                    @if($reward->image_path)

                    <img src="{{ '/storage/' . ltrim($reward->image_path, '/') }}" alt="{{ $reward->reward_name }}"
                        onerror="
                                    this.style.display='none';
                                    this.nextElementSibling.style.display='block';
                                ">

                    @endif

                    <div class="reward-box-placeholder" style="{{ $reward->image_path ? 'display:none' : '' }}">
                        🎁
                    </div>

                </div>


                <div class="reward-box-body">

                    <div class="reward-box-name">
                        {{ $reward->reward_name }}
                    </div>

                    <div class="reward-box-point">

                        <span>★</span>

                        {{ number_format((int) $reward->point_required, 0, ',', '.') }}
                        Point

                    </div>


<div class="reward-box-actions">

    @if ((int) $customer->saldo_point >= (int) $reward->point_required)

        {{-- Poin mencukupi: tombol penukaran aktif --}}
        <form method="POST"
              action="{{ route('customer.reward.redeem') }}"
              onsubmit="return redeemReward(event, this)">

            @csrf

            <input type="hidden"
                   name="id_reward"
                   value="{{ $reward->id_reward }}">

            <button type="submit" class="btn-primary">
                TUKARKAN
            </button>

        </form>

    @else

        {{-- Versi untuk media selain HP kecil --}}
        <button type="button"
                class="btn-primary reward-insufficient-button"
                disabled>
            Tukarkan Sekarang
        </button>

        {{-- Versi khusus HP maksimal 380px --}}
        <div class="reward-insufficient">
            <span class="reward-insufficient-icon">🔒</span>

            <span class="reward-insufficient-label">
                Belum Cukup
            </span>

            <span class="reward-insufficient-point">
                {{ number_format((int) $reward->point_required, 0, ',', '.') }} Point
            </span>
        </div>

    @endif

</div>



                </div>

            </article>

            @empty

            <div style="
                        grid-column:1/-1;
                        color:#8B796B;
                        font-size:10px;
                        padding:25px 0;
                        text-align:center;
                    ">
                Belum ada reward tersedia.
            </div>

            @endforelse

        </div>

    </section>

    {{-- =====================================================
     HISTORY CONTENT
====================================================== --}}

    <section id="reward-history" class="history-box reward-tab-content">

        <div class="history-head">

            <h2 class="history-title">
                Riwayat Penukaran
            </h2>

        </div>


        @php
        /*
        * Riwayat yang ditampilkan DI SINI HANYA redemption.
        * Tidak menggunakan $pointHistory karena itu mencakup
        * transaksi pembelian juga.
        */
        $groupedRedemptions = $redemptions->groupBy(
        fn ($redemption) =>
        optional($redemption->created_at)->format('Y-m')
        );
        @endphp


        @forelse($groupedRedemptions as $month => $redemptionItems)

        @php
        $monthDate = \Carbon\Carbon::createFromFormat(
        'Y-m',
        $month
        );
        @endphp


        {{-- =========================
             NAMA BULAN
        ========================== --}}

        <div class="history-month">

            {{ $monthDate->translatedFormat('F Y') }}

        </div>


        {{-- =========================
             LIST REDEMPTION
        ========================== --}}

        <div class="history-list">

            @foreach($redemptionItems as $redemption)

            <div
    class="history-activity-row"
    data-redemption-code="{{ $redemption->redemption_code }}"
>


                {{-- ICON --}}

               
{{-- GAMBAR REWARD YANG DITUKARKAN --}}
<div class="history-activity-icon redeem">

    @if ($redemption->reward && $redemption->reward->image_path)

        <img
            src="{{ '/storage/' . ltrim($redemption->reward->image_path, '/') }}"
            alt="{{ $redemption->reward->reward_name }}"
        >

    @else

        {{-- Ikon cadangan jika gambar tidak tersedia --}}
        <span aria-label="Reward">🎁</span>

    @endif

</div>



                {{-- TANGGAL --}}

                <div class="history-activity-date">

                    {{ optional($redemption->created_at)->format('j F Y') }}

                    <span>•</span>

                    {{ optional($redemption->created_at)->format('H:i') }}

                </div>


                {{-- DETAIL --}}

                <div class="history-activity-main">

                    <div class="history-activity-title">
                        Penukaran Reward
                    </div>

                    <div class="history-activity-description">

                        {{ $redemption->reward->reward_name ?? 'Reward' }}

                    </div>

                </div>


                {{-- POINT --}}

                {{-- POIN DAN STATUS PENUKARAN --}}
<div class="history-activity-right">

    {{-- POIN YANG DIGUNAKAN --}}
    <div class="history-activity-point minus">
        -
        {{ number_format(
            (int) $redemption->point_used,
            0,
            ',',
            '.'
        ) }}
        Point
    </div>

    {{-- STATUS PENUKARAN --}}
    <div class="history-activity-status
        {{ $redemption->status === 'pending' ? 'pending' : 'done' }}">

        {{ $redemption->status === 'pending' ? 'Menunggu' : 'Berhasil' }}

    </div>

</div>

            </div>

            @endforeach

        </div>


        @empty

        <div class="history-empty">

            Belum ada riwayat penukaran.

        </div>

        @endforelse

    </section>

</div>



{{-- =====================================================
     MODAL KONFIRMASI PENUKARAN REWARD
===================================================== --}}
<div id="reward-confirm-modal" hidden>
    <section class="reward-confirm-card"
             role="dialog"
             aria-modal="true"
             aria-labelledby="reward-confirm-title">

        <button type="button"
                id="reward-confirm-close"
                class="reward-confirm-close"
                aria-label="Tutup">
            &times;
        </button>

        <div class="reward-confirm-heading">
            Konfirmasi Penukaran
        </div>

        <p class="reward-confirm-subtitle">
            Apakah kamu yakin ingin menukarkan reward ini?
        </p>

        <div class="reward-confirm-item">
            <div class="reward-confirm-image">
                <img id="reward-confirm-image" src="" alt="Gambar reward">
            </div>

            <div class="reward-confirm-detail">
                <h2 id="reward-confirm-title">Nama Reward</h2>
                <p>
                    <span>★</span>
                    <strong id="reward-confirm-point">0</strong> Point
                </p>
            </div>
        </div>

        <p class="reward-confirm-note">
            Pastikan reward dan jumlah point sudah sesuai sebelum melanjutkan.
        </p>

        <div class="reward-confirm-actions">
            <button type="button" id="reward-confirm-cancel">
                Batal
            </button>

            <button type="button" id="reward-confirm-submit">
                Tukar Reward
            </button>
        </div>
    </section>
</div>
{{-- =====================================================
     PANEL REDEMPTION — MODAL DI HALAMAN REWARD
===================================================== --}}

<div
    id="redemption-modal"
    class="redemption-modal-overlay"
    hidden
>

    <section
        id="redemption-inline"
        class="redemption-page"
        role="dialog"
        aria-modal="true"
        aria-labelledby="redemption-inline-title"
    >

        {{-- TOMBOL TUTUP --}}
        <button
            type="button"
            id="redemption-inline-close"
            class="redemption-close"
            aria-label="Tutup Redemption"
        >
            &times;
        </button>


<div class="redemption-label" id="redemption-inline-label">
    Tunjukkan ke Kasir
</div>

<h1 class="redemption-title" id="redemption-inline-title">
    Nama Reward
</h1>

<p class="redemption-subtitle" id="redemption-inline-subtitle">
    Redemption menunggu konfirmasi staff.
</p>

<div class="redemption-qr" id="redemption-inline-qr"></div>


        {{-- KODE REDEMPTION --}}
        <div class="redemption-code-label">
            Kode Redemption
        </div>

        <div
            class="redemption-code"
            id="redemption-inline-code"
        ></div>


        {{-- INFORMASI POIN DAN STATUS --}}
        <div class="redemption-info">

            {{-- POIN DIGUNAKAN --}}
            <div class="redemption-info-card">

                <div class="redemption-info-label">
                    Point Digunakan
                </div>

                <div
                    class="redemption-info-value"
                    id="redemption-inline-point"
                >
                    0
                </div>

            </div>


            {{-- STATUS REDEMPTION --}}
            <div class="redemption-info-card">

                <div class="redemption-info-label">
                    Status
                </div>

                <div
                    class="redemption-info-value"
                    id="redemption-inline-status"
                >
                    Pending
                </div>

            </div>

        </div>


        {{-- TOMBOL KEMBALI --}}
        <button
            type="button"
            class="redemption-back"
            id="redemption-inline-back"
        >
            Kembali ke Reward
        </button>


        {{-- CATATAN --}}
<div class="redemption-note" id="redemption-inline-note">
    Point belum dipotong. Point akan berkurang setelah
    staff memindai dan mengonfirmasi QR ini.
</div>

    </section>

</div>

<script>


function updateRedemptionModalStatus(status, serverLabel = null) {
    status = String(status || 'pending').toLowerCase();
    const labelElement = document.getElementById(
    'redemption-inline-label'
);

if (labelElement) {
    labelElement.style.display =
        status === 'pending' ? '' : 'none';
}

    const messages = {
        pending: {
            label: 'Pending',
            subtitle: 'Redemption menunggu konfirmasi staff.',
            note: 'Point belum dipotong. Point akan berkurang setelah staff memindai dan mengonfirmasi QR ini.',
            className: 'status-pending'
        },
        berhasil: {
            label: 'Berhasil',
            subtitle: 'Redemption berhasil dikonfirmasi staff.',
            note: 'Point telah dikonfirmasi oleh staff.',
            className: 'status-success'
        },
        gagal: {
            label: 'Gagal',
            subtitle: 'Redemption gagal dikonfirmasi staff.',
            note: 'Silakan hubungi staff untuk informasi lebih lanjut.',
            className: 'status-failed'
        }
    };

    const message = messages[status] || messages.pending;

    const statusElement = document.getElementById(
        'redemption-inline-status'
    );

    const subtitleElement = document.getElementById(
        'redemption-inline-subtitle'
    );

    const noteElement = document.getElementById(
        'redemption-inline-note'
    );

    if (statusElement) {
        statusElement.textContent = serverLabel || message.label;

        statusElement.classList.remove(
            'status-pending',
            'status-success',
            'status-failed'
        );

        statusElement.classList.add(message.className);
    }

    if (subtitleElement) {
        subtitleElement.textContent = message.subtitle;
    }

    if (noteElement) {
        noteElement.textContent = message.note;
    }
}




let selectedRewardForm = null;

function redeemReward(event, form) {
    event.preventDefault();

    selectedRewardForm = form;

    const card = form.closest('.reward-box');

    if (!card) {
        alert('Data reward tidak ditemukan.');
        return false;
    }

    const name = card.querySelector('.reward-box-name')?.textContent.trim() || 'Reward';
    const point = card.querySelector('.reward-box-point')?.textContent.trim() || '0 Point';
    const image = card.querySelector('.reward-box-img img');

    document.getElementById('reward-confirm-title').textContent = name;
    document.getElementById('reward-confirm-point').textContent = point.replace(/Point/i, '').trim();

    const confirmImage = document.getElementById('reward-confirm-image');

    if (image && image.getAttribute('src')) {
        confirmImage.src = image.getAttribute('src');
        confirmImage.style.display = 'block';
    } else {
        confirmImage.removeAttribute('src');
        confirmImage.style.display = 'none';
    }

    document.getElementById('reward-confirm-modal').hidden = false;
    document.body.style.overflow = 'hidden';

    return false;
}

function closeRewardConfirmModal() {
    document.getElementById('reward-confirm-modal').hidden = true;
    document.body.style.overflow = '';
    selectedRewardForm = null;
}

document.getElementById('reward-confirm-close')
    ?.addEventListener('click', closeRewardConfirmModal);

document.getElementById('reward-confirm-cancel')
    ?.addEventListener('click', closeRewardConfirmModal);

document.addEventListener('DOMContentLoaded', function () {
    const params = new URLSearchParams(window.location.search);
    const rewardId = params.get('confirm_reward');

    if (!rewardId) return;

    const rewardInput = document.querySelector(
        `form input[name="id_reward"][value="${rewardId}"]`
    );

    if (!rewardInput) return;

    const form = rewardInput.closest('form');

    if (form) {
        redeemReward(
            { preventDefault() {} },
            form
        );
    }

    // Hapus parameter dari alamat setelah modal dipanggil.
    window.history.replaceState(
        {},
        document.title,
        window.location.pathname
    );
});

async function submitRewardRedemption(form) {

    const button = form.querySelector('button[type="submit"]');
    const originalText = button
        ? button.textContent.trim()
        : 'TUKARKAN';

    if (button) {
        button.disabled = true;
        button.textContent = 'Memproses...';
    }

    try {
        const csrfToken = document.querySelector(
            'meta[name="csrf-token"]'
        )?.content;

        const headers = {
            'Accept': 'application/json'
        };

        if (csrfToken) {
            headers['X-CSRF-TOKEN'] = csrfToken;
        }

        const response = await fetch(form.action, {
            method: 'POST',
            headers: headers,
            body: new FormData(form)
        });

        const result = await response.json();

        if (!response.ok) {
            throw new Error(
                result.message || 'Redemption gagal diproses.'
            );
        }

        const data = result.data;

        if (!data || !data.code || !data.svg) {
            throw new Error(
                'Data QR Code redemption tidak lengkap.'
            );
        }

        // Isi informasi redemption ke modal.
        document.getElementById(
            'redemption-inline-title'
        ).textContent = data.reward || 'Reward';

        document.getElementById(
            'redemption-inline-code'
        ).textContent = data.code;

        document.getElementById(
            'redemption-inline-point'
        ).textContent = data.point_used;

        const status = String(data.status || 'pending').toLowerCase();

updateRedemptionModalStatus(status);

        // Tampilkan QR Code SVG dari server.
        document.getElementById(
            'redemption-inline-qr'
        ).innerHTML = data.svg;

        // Tampilkan modal tanpa berpindah halaman.
        const modal = document.getElementById(
            'redemption-modal'
        );

        modal.hidden = false;

document.body.style.overflow = 'hidden';

document.getElementById(
    'redemption-inline-close'
).focus();

startRedemptionStatusPolling(data.code);
    } catch (error) {
        console.error('Redemption error:', error);

        alert(
            error.message || 'Terjadi kesalahan saat menukarkan reward.'
        );

    } finally {
        if (button) {
            button.disabled = false;
            button.textContent = originalText;
        }
    }

    return false;
}


/* =====================================================
   BUKA/TUTUP MODAL REDEMPTION
===================================================== */

function closeRedemptionModal() {
    const modal = document.getElementById('redemption-modal');

    if (!modal) return;

    modal.hidden = true;
    document.body.style.overflow = '';
}

// Tombol silang (×).
document.getElementById('redemption-inline-close')
    ?.addEventListener('click', closeRedemptionModal);

// Tombol kembali ke Reward.
document.getElementById('redemption-inline-back')
    ?.addEventListener('click', closeRedemptionModal);

// Klik area gelap di luar card.
document.getElementById('redemption-modal')
    ?.addEventListener('click', function (event) {
        if (event.target === this) {
            closeRedemptionModal();
        }
    });

// Tombol Escape pada keyboard.
document.addEventListener('keydown', function (event) {
    const modal = document.getElementById('redemption-modal');

    if (event.key === 'Escape' && modal && !modal.hidden) {
        closeRedemptionModal();
    }
});


/* =====================================================
   UPDATE STATUS REDEMPTION OTOMATIS
===================================================== */

let activeRedemptionCode = null;
let redemptionStatusTimer = null;
let redemptionStatusRequestRunning = false;

const redemptionStatusUrlTemplate = @json(
    route('customer.reward.redemption.status', [
        'code' => '__REDEMPTION_CODE__'
    ])
);

const redemptionDetailsUrlTemplate = @json(
    route('customer.reward.redemption.details', [
        'code' => '__REDEMPTION_CODE__'
    ])
);

function startRedemptionStatusPolling(code) {
    activeRedemptionCode = String(code);

    if (redemptionStatusTimer) {
        clearInterval(redemptionStatusTimer);
    }

    checkRedemptionStatus();

    redemptionStatusTimer = setInterval(
        checkRedemptionStatus,
        3000
    );
}

function stopRedemptionStatusPolling() {
    if (redemptionStatusTimer) {
        clearInterval(redemptionStatusTimer);
    }

    redemptionStatusTimer = null;
    activeRedemptionCode = null;
}

async function checkRedemptionStatus() {
    if (
        !activeRedemptionCode ||
        redemptionStatusRequestRunning
    ) {
        return;
    }

    const code = activeRedemptionCode;
    redemptionStatusRequestRunning = true;

    try {
        const url = redemptionStatusUrlTemplate.replace(
            '__REDEMPTION_CODE__',
            encodeURIComponent(code)
        );

        const redemptionDetailsUrlTemplate = @json(
    route('customer.reward.redemption.details', [
        'code' => '__REDEMPTION_CODE__'
    ])
);

        const response = await fetch(url, {
            method: 'GET',
            headers: {
                'Accept': 'application/json'
            },
            credentials: 'same-origin'
        });

        if (!response.ok) {
            return;
        }

        const result = await response.json();

        // Abaikan respons dari kode lama jika ada redemption baru.
        if (code !== activeRedemptionCode) {
            return;
        }

        const status = String(
            result.status || 'pending'
        ).toLowerCase();

        const modal = document.getElementById(
            'redemption-modal'
        );

        const modalCode = document.getElementById(
            'redemption-inline-code'
        );

        // Perbarui status modal jika kode yang ditampilkan cocok.
        if (
            modal &&
            !modal.hidden &&
            modalCode &&
            modalCode.textContent.trim() === code
        ) {
updateRedemptionModalStatus(
    status,
    result.status_label
);
        }

        // Perbarui baris riwayat yang memiliki kode sama.
        document.querySelectorAll(
            '.history-activity-row[data-redemption-code]'
        ).forEach(function (row) {
            if (row.dataset.redemptionCode !== code) {
                return;
            }

            const statusElement = row.querySelector(
                '.history-activity-status'
            );

            if (!statusElement) {
                return;
            }

            const labels = {
                pending: 'Menunggu',
                berhasil: 'Berhasil',
                gagal: 'Gagal'
            };

            const statusClass = {
                pending: 'pending',
                berhasil: 'done',
                gagal: 'failed'
            };

            statusElement.textContent =
                labels[status] || status;

            statusElement.classList.remove(
                'pending',
                'done',
                'failed'
            );

            if (statusClass[status]) {
                statusElement.classList.add(
                    statusClass[status]
                );
            }
        });

        // Berhenti mengecek setelah status tidak lagi pending.
        if (status !== 'pending') {
            stopRedemptionStatusPolling();
        }

    } catch (error) {
        console.error(
            'Gagal memeriksa status redemption:',
            error
        );
    } finally {
        redemptionStatusRequestRunning = false;
    }
}


async function openExistingRedemption(code) {
    try {
        const url = redemptionDetailsUrlTemplate.replace(
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

        const data = await response.json();

        if (!response.ok) {
            throw new Error(
                data.message || 'Gagal membuka QR Code redemption.'
            );
        }

        if (!data.code || !data.svg) {
            throw new Error('Data QR Code tidak lengkap.');
        }

        document.getElementById(
            'redemption-inline-title'
        ).textContent = data.reward || 'Reward';

        document.getElementById(
            'redemption-inline-code'
        ).textContent = data.code;

        document.getElementById(
            'redemption-inline-point'
        ).textContent = data.point_used;

        document.getElementById(
            'redemption-inline-qr'
        ).innerHTML = data.svg;

        updateRedemptionModalStatus(
            data.status,
            data.status_label
        );

        const modal = document.getElementById('redemption-modal');

        modal.hidden = false;
        document.body.style.overflow = 'hidden';

        document.getElementById(
            'redemption-inline-close'
        ).focus();

        startRedemptionStatusPolling(data.code);

    } catch (error) {
        console.error('Gagal membuka redemption:', error);
        alert(error.message || 'Gagal membuka QR Code redemption.');
    }
}

const historySection = document.getElementById('reward-history');

function prepareHistoryCards() {
    document.querySelectorAll(
        '#reward-history .history-activity-row[data-redemption-code]'
    ).forEach(function (row) {
        row.style.cursor = 'pointer';
        row.setAttribute('role', 'button');
        row.setAttribute('tabindex', '0');
    });
}

historySection?.addEventListener('click', function (event) {
    const card = event.target.closest(
        '.history-activity-row[data-redemption-code]'
    );

    if (!card || !historySection.contains(card)) return;

    openExistingRedemption(card.dataset.redemptionCode);
});

historySection?.addEventListener('keydown', function (event) {
    if (event.key !== 'Enter' && event.key !== ' ') return;

    const card = event.target.closest(
        '.history-activity-row[data-redemption-code]'
    );

    if (!card || !historySection.contains(card)) return;

    event.preventDefault();
    openExistingRedemption(card.dataset.redemptionCode);
});

prepareHistoryCards();



document.getElementById('reward-confirm-submit')
    ?.addEventListener('click', async function () {
        if (!selectedRewardForm) return;

        const form = selectedRewardForm;
        const button = this;

        button.disabled = true;
        button.textContent = 'Memproses...';

        try {
            await submitRewardRedemption(form);

            // Modal konfirmasi ditutup setelah proses selesai.
            // Jika gagal, modal tetap dibuka.
            if (!document.getElementById('redemption-modal').hidden) {
                closeRewardConfirmModal();
            }
        } finally {
            button.disabled = false;
            button.textContent = 'Tukar Reward';
        }
    });

</script>


<script>
document.addEventListener('DOMContentLoaded', function() {

    const tabs = document.querySelectorAll('.reward-tab');

    const rewardContent =
        document.getElementById('reward-list');

    const historyContent =
        document.getElementById('reward-history');


    function activateTab(tabName) {

        tabs.forEach(function(tab) {

            tab.classList.toggle(
                'active',
                tab.dataset.tab === tabName
            );

        });


        if (rewardContent) {
            rewardContent.classList.toggle(
                'active',
                tabName === 'reward'
            );
        }


        if (historyContent) {
            historyContent.classList.toggle(
                'active',
                tabName === 'history'
            );
        }

    }


    /* =============================================
       TAB DARI URL
    ============================================== */

    const params =
        new URLSearchParams(window.location.search);

    const requestedTab =
        params.get('tab');


    const initialTab =
        requestedTab === 'history' ?
        'history' :
        'reward';


    activateTab(initialTab);


    /* =============================================
       KLIK TAB
    ============================================== */

    tabs.forEach(function(tab) {

        tab.addEventListener(
            'click',
            function() {

                const tabName =
                    this.dataset.tab;

                activateTab(tabName);


                /* Update URL tanpa reload */

                const url =
                    new URL(window.location.href);


                if (tabName === 'history') {

                    url.searchParams.set(
                        'tab',
                        'history'
                    );

                } else {

                    url.searchParams.delete(
                        'tab'
                    );

                }


                window.history.replaceState({},
                    '',
                    url
                );

            }
        );

    });

});
</script>


<script>
(function () {
    let refreshInProgress = false;

    async function refreshRewardPageData() {
        if (
            refreshInProgress ||
            document.visibilityState === 'hidden'
        ) {
            return;
        }

        refreshInProgress = true;

        try {
            // Ambil halaman terbaru dari Laravel tanpa reload browser.
            const url = new URL(window.location.href);
            url.searchParams.set(
                '_live_refresh',
                Date.now().toString()
            );

            const response = await fetch(url.toString(), {
                method: 'GET',
                headers: {
                    'Accept': 'text/html',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin',
                cache: 'no-store'
            });

            if (!response.ok) return;

            const html = await response.text();

            const freshDocument = new DOMParser().parseFromString(
                html,
                'text/html'
            );

            // Perbarui hanya bagian yang datanya bisa berubah.
            const selectors = [
                '.reward-balance',
                '.reward-stat-grid',
                '#reward-list',
                '#reward-history'
            ];

            selectors.forEach(function (selector) {
                const currentElement =
                    document.querySelector(selector);

                const freshElement =
                    freshDocument.querySelector(selector);

                if (currentElement && freshElement) {
                    currentElement.innerHTML =
                        freshElement.innerHTML;
                }
            });

            // Pasang kembali atribut card setelah riwayat diperbarui.
            prepareHistoryCards();

        } catch (error) {
            console.error(
                'Gagal memperbarui halaman Reward:',
                error
            );
        } finally {
            refreshInProgress = false;
        }
    }

    // Perbarui saat halaman pertama kali dibuka.
    refreshRewardPageData();

    // Periksa perubahan data setiap 5 detik.
    setInterval(refreshRewardPageData, 5000);

    // Perbarui lagi ketika pengguna kembali ke tab browser.
    document.addEventListener('visibilitychange', function () {
        if (document.visibilityState === 'visible') {
            refreshRewardPageData();
        }
    });
})();
</script>
   



@endsection