@extends('layouts.customer')
@section('title', 'Transaksi - SAÉ CAFE ROJEL')
@section('mobile_title', 'Riwayat Transaksi')
@section('content')
@php
    $grouped = $transactions->groupBy(function ($t) {
        if (empty($t->tanggal_transaksi)) {
            return 'Tanggal tidak tersedia';
        }
        return \Carbon\Carbon::parse($t->tanggal_transaksi)
            ->locale('id')
            ->translatedFormat('F Y');
    });
@endphp
<style>

    
/* =========================================================
   TRANSACTION PAGE
========================================================= */
.transaction-page {
    width: 100%;
    display: grid;
    gap: 20px;
    box-sizing: border-box;
}





.transaction-page-title {
    margin: 0 0 -8px 10px;
    color: #171311;
    font-size: 26px;
    line-height: 1.2;
    font-weight: 700;
    letter-spacing: -0.03em;
}


/* =========================================================
   HEADER - TRANSAKSI MEMBER
========================================================= */
.transaction-member-banner {
    display: flex;
    align-items: center;
    gap: 13px;
    width: 100%;
    padding: 14px 16px;
    box-sizing: border-box;
    border-radius: 13px;
    background: #F8EFE6;
}
.transaction-member-icon {
    width: 42px;
    height: 42px;
    flex: 0 0 42px;
    display: grid;
    place-items: center;
    border-radius: 50%;
    background: #6B381C;
    color: #FFFFFF;
}
.transaction-member-icon svg {
    display: block;
    width: 25px;
    height: 25px;
}
.transaction-member-content {
    min-width: 0;
}
.transaction-member-title {
    margin: 0 0 3px;
    color: #3E2A1E;
    font-size: 13px;
    line-height: 1.3;
    font-weight: 600;
    letter-spacing: -0.15px;
}
.transaction-member-description {
    max-width: 350px;
    color: #817165;
    font-size: 10px;
    line-height: 1.45;
}
/* =========================================================
   MONTH GROUP
========================================================= */
.transaction-month-group {
    display: grid;
    gap: 10px;
}
.transaction-month {
    margin: 3px 0 1px;
    color: #4B382B;
    font-size: 12px;
    line-height: 1.3;
    font-weight: 600;
}
/* =========================================================
   TRANSACTION LIST
========================================================= */
.transaction-list {
    display: grid;
    gap: 10px;
}
/* =========================================================
   TRANSACTION CARD
========================================================= */
.transaction-card {
    display: grid;
    grid-template-columns:
        42px minmax(0, 1fr) minmax(100px, auto);
    grid-template-rows: auto auto auto;
    grid-template-areas:
        ".     date  reference"
        "icon  main  total"
        "icon  main  point";
    align-items: center;
    column-gap: 10px;
    row-gap: 5px;
    width: 100%;
    min-width: 0;
    min-height: 96px;
    padding: 9px 9px 4px;
    box-sizing: border-box;
    border: 1px solid #E6DDD2;
    border-radius: 12px;
    background: #FFFFFF;
}
/* =========================================================
   TRANSACTION DATE
========================================================= */
.transaction-date {
    grid-area: date;
    min-width: 0;
    color: #51453C;
    font-size: 10px;
    line-height: 1.35;
    font-weight: 600;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
/* =========================================================
   TRANSACTION REFERENCE / CODE
========================================================= */
.transaction-reference {
    grid-area: reference;
    justify-self: end;
    max-width: 112px;
    min-width: 0;
    padding: 5px 8px;
    box-sizing: border-box;
    border-radius: 999px;
    background: #F7F0E7;
    color: #978779;
    font-size: 8px;
    line-height: 1.3;
    font-weight: 400;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
/* =========================================================
   COFFEE ICON
========================================================= */
.transaction-icon {
    grid-area: icon;
    width: 40px;
    height: 40px;
    display: grid;
    place-items: center;
    border-radius: 50%;
    background: #F7F0E7;
    color: #8A5A32;
}
.transaction-icon svg {
    display: block;
    width: 23px;
    height: 23px;
}
/* =========================================================
   MAIN TRANSACTION DETAIL
========================================================= */
.transaction-main {
    grid-area: main;
    min-width: 0;
}
.transaction-merchant {
    color: #34281F;
    font-size: 10px;
    line-height: 1.4;
    font-weight: 600;
    overflow-wrap: anywhere;
}
.transaction-description {
    margin-top: 3px;
    color: #A19489;
    font-size: 9px;
    line-height: 1.4;
}
/* =========================================================
   TOTAL
========================================================= */
.transaction-total {
    grid-area: total;
    min-width: 0;
    justify-self: end;
    align-self: end;
    color: #34281F;
    font-size: 14px;
    line-height: 1.25;
    font-weight: 700;
    white-space: nowrap;
}
/* =========================================================
   POINT BADGE
========================================================= */
.transaction-point {
    grid-area: point;
    justify-self: end;
    align-self: start;
    max-width: 100%;
    min-width: 0;
    padding: 5px 8px;
    box-sizing: border-box;
    border-radius: 999px;
    background: #F8EFE4;
    color: #6B482E;
    font-size: 8px;
    line-height: 1.3;
    font-weight: 600;
    text-align: center;
    white-space: nowrap;
}
.transaction-point.zero {
    background: #F2EEE8;
    color: #8B796B;
}

/* =========================================================
   EMPTY STATE - BELUM ADA TRANSAKSI
========================================================= *//* =========================================================
   EMPTY STATE - BELUM ADA TRANSAKSI
========================================================= */
.transaction-page .transaction-empty {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    gap: 8px;

    width: 100%;
    box-sizing: border-box;
    padding: 130px 16px 28px;

    border: none;
    border-radius: 0;
    background: transparent;

    color: #A19489;
    text-align: center;
}

/* ICON CANGKIR */
.transaction-empty-icon {
    display: block;
    width: 38px;
    height: 38px;
    margin-bottom: 2px;
    flex-shrink: 0;

    color: #8A5A32;
    filter: drop-shadow(0 2px 1px rgba(80, 50, 30, 0.22));
    transform: perspective(100px) rotateX(5deg);
}

/* JUDUL */
.transaction-empty-title {
    margin: 0;
    color: #34281F;
    font-size: 13px;
    line-height: 1.4;
    font-weight: 600;
}

/* DESKRIPSI */
.transaction-empty-description {
    margin: 0;
    color: #A19489;
    font-size: 10px;
    line-height: 1.4;
}
/* =========================================================
   RESPONSIVE - TABLET
   561px - 720px
========================================================= */
@media (min-width: 561px) and (max-width: 720px) {
    .transaction-page {
        gap: 18px;
    }
   .transaction-member-banner {
    gap: 12px;
    padding: 13px 14px;
    border-radius: 12px;
    background: rgba(128, 128, 128, 0.03);

    margin-top: 8px; /* Turunkan kotak transparan */
}
    .transaction-member-icon {
        width: 42px;
        height: 42px;
        flex: 0 0 42px;
    }
    .transaction-member-icon svg {
        width: 25px;
        height: 25px;
    }
    .transaction-member-title {
        font-size: 13px;
    }
    .transaction-member-description {
        font-size: 10px;
    }
    .transaction-month {
    font-size: 13px;
    position: relative;
    left: 10px;
}
    .transaction-list {
        gap: 12px;
    }
    .transaction-card {
        grid-template-columns: 40px minmax(0, 1fr) minmax(95px, auto);
        grid-template-rows: auto auto auto;
        grid-template-areas:
            ".     date  reference"
            "icon  main  total"
            "icon  main  point";
        column-gap: 9px;
        row-gap: 6px;
        min-height: 100px;
        padding: 12px;
        border-radius: 13px;
    }
    .transaction-date {
    font-size: 9px;
    font-weight: 700;
    position: relative;
    left: -40px;
}
    .transaction-reference {
        max-width: 115px;
        font-size: 8px;
    }
    .transaction-icon {
        width: 38px;
        height: 38px;
        position: relative;
        top: -8px;
           left: 4px;
    }
    .transaction-icon svg {
        width: 22px;
        height: 22px;
    }
    .transaction-merchant {
        font-size: 10px;
    }
    .transaction-description {
        font-size: 9px;
    }
    .transaction-total {
        font-size: 14px;
    }
    .transaction-point {
    padding: 5px 8px;
    font-size: 8px;
    background: #EAF6ED;
    color: #328653;
}
    .transaction-main {
    position: relative;
    left: 8px;
    top: -6px;
}
}

/* =========================================================
   RESPONSIVE - MOBILE
   560px ke bawah
========================================================= */
@media (max-width: 560px) {
    .transaction-page {
        gap: 14px;
    }

  /* HEADER TRANSAKSI MEMBER */
.transaction-member-banner {
    display: flex;
    align-items: center;
    gap: 11px;
    padding: 12px 13px;
    border-radius: 12px;
    background: rgba(128, 128, 128, 0.03);

    width: calc(100% - 20px);
    margin-inline: auto;
    margin-top: 8px; /* Turunkan kotak transparan */
    box-sizing: border-box;
}

    .transaction-member-icon {
        width: 40px;
        height: 40px;
        flex: 0 0 40px;
    }

    .transaction-member-icon svg {
        width: 23px;
        height: 23px;
    }

    .transaction-member-title {
        font-size: 12px;
        font-weight: 600;
    }

    .transaction-member-description {
        font-size: 9px;
        line-height: 1.45;
    }

    /* BULAN TRANSAKSI */
    .transaction-month-group {
        gap: 9px;
    }

    .transaction-month {
        font-size: 12px;
        margin: 3px 0 1px;
        position: relative;
        left: 10px;
    }

    .transaction-list {
        gap: 10px;
    }

    /* CARD TRANSAKSI */
    .transaction-card {
        grid-template-columns: 38px minmax(0, 1fr) minmax(78px, auto);
        grid-template-rows: auto auto auto;
        grid-template-areas:
            ".     date  reference"
            "icon  main  total"
            "icon  main  point";
        align-items: center;
        column-gap: 8px;
        row-gap: 5px;
        min-height: 94px;
        padding: 10px;
        border-radius: 12px;
        width: calc(100% - 8px);
        margin-inline: auto;
        box-sizing: border-box;
    }

    .transaction-date {
        font-size: 8px;
        line-height: 1.35;
        font-weight: 700;
        position: relative;
        left: -38px;
    }

    .transaction-reference {
        max-width: 95px;
        padding: 5px 7px;
        font-size: 7px;
        position: relative;
        top: -3px;
    }

    .transaction-icon {
    width: 36px;
    height: 36px;
    position: relative;
    left: 8px;
    top: -10px;
}

    .transaction-icon svg {
        width: 20px;
        height: 20px;
    }

    .transaction-merchant {
        font-size: 9px;
        line-height: 1.4;
        font-weight: 600;
    }

    .transaction-merchant,
    .transaction-description {
        position: relative;
        left: 10px;
        top: -8px;
    }

    .transaction-description {
        margin-top: 2px;
        font-size: 8px;
    }

    .transaction-total {
        font-size: 12px;
        position: relative;
        top: -8px;
    }

  .transaction-point {
    padding: 4px 8px;
    font-size: 7px;
    font-weight: 700;
    position: relative;
    top: -8px;
    background: #EAF6ED;
    color: #328653;
}

    .transaction-empty {
        padding: 18px 12px;
        font-size: 10px;
    }
}


/* =========================================================
   RESPONSIVE - SMALL MOBILE
   380px ke bawah
========================================================= */

@media (max-width: 380px) {
    .transaction-page {
        gap: 14px;
    }
.transaction-member-banner {
    gap: 9px;
    padding: 12px 10px;
    border-radius: 11px;
    background: rgba(128, 128, 128, 0.03);

    width: calc(100% - 8px);
    margin-inline: auto;
    margin-top: 8px; /* Turunkan kotak transparan */
    box-sizing: border-box;
}box-sizing: border-box;
}
.transaction-member-icon {
    width: 38px;
    height: 38px;
    flex: 0 0 38px;
}

.transaction-member-icon svg {
    width: 22px;
    height: 22px;
}
    .transaction-member-title {
        font-size: 9.5px;
          font-weight: 600;
    }
    .transaction-member-description {
        font-size: 7.5px;
        line-height: 1.4;
    }
    .transaction-month-group {
        gap: 8px;
    }
    .transaction-month {
    font-size: 10px;
    position: relative;
    left: 10px;
}
    .transaction-list {
        gap: 9px;
    }
   .transaction-card {
    grid-template-columns: 30px minmax(0, 1fr) minmax(72px, auto);
    grid-template-rows: auto auto auto;
    grid-template-areas:
        ".     date  reference"
        "icon  main  total"
        "icon  main  point";
    column-gap: 6px;
    row-gap: 5px;
    min-height: 88px;
    padding: 9px;
    border-radius: 10px;

    /* Tambahan untuk mempersempit card */
    width: calc(100% - 8px);
    margin-inline: auto;
    box-sizing: border-box;
}
    .transaction-date {
    font-size: 9px;
    line-height: 1.3;
    font-weight: 700;
    position: relative;
    left: -33px;
}
.transaction-reference {
    max-width: 90px;
    padding: 6px 7px 5px;
    font-size: 7px;
    position: relative;
    top: -3px;
}
  .transaction-icon {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    left: 2px;
    top: -8px;
}

.transaction-icon svg {
    width: 20px;
    height: 20px;
}
   .transaction-merchant {
    font-size: 9px;
    font-weight: 600;
}

.transaction-merchant,
.transaction-description {
    position: relative;
    left: 10px;
    top: -10px;
}

.transaction-description {
    font-size: 7px;
}
    .transaction-total {
    font-size: 13px;
    position: relative;
    top: -8px;
}
    .transaction-point {
    padding: 4px 10px;
    font-size: 7px;
    font-weight: 700;
    position: relative;
    top: -8px;
}
    .transaction-empty {
        padding: 16px 10px;
        font-size: 9px;
    }




/* =========================================================
   DESKTOP ONLY - TRANSACTION HORIZONTAL
   Hanya layar 721px ke atas
========================================================= */
@media (min-width: 721px) {

    /* KARTU TRANSAKSI - HORIZONTAL */
    .transaction-card {
        display: grid;

        grid-template-columns:
            42px 180px minmax(0, 1fr) 125px 100px !important;

        grid-template-rows: auto;
        grid-template-areas:
            "icon date reference total point";

        align-items: center;
        column-gap: clamp(8px, 1.2vw, 18px);
        row-gap: 0;

        width: 100%;
        min-width: 0;
        min-height: 70px;
        padding: 10px 16px;
        box-sizing: border-box;
    }

    /* IKON */
    .transaction-icon {
        grid-area: icon;
        width: 42px;
        height: 42px;
        display: grid;
        place-items: center;
        position: static;
    }

    .transaction-icon svg {
        width: 23px;
        height: 23px;
    }

    /* TANGGAL */
    .transaction-date {
        grid-area: date;
        min-width: 0;
        font-size: 12px;
        line-height: 1.4;
        font-weight: 700;
        position: static;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* KODE TRANSAKSI */
    .transaction-reference {
        grid-area: reference;
        justify-self: start;

        min-width: 0;
        max-width: 100%;
        padding: 0;
        box-sizing: border-box;

        border-radius: 0;
        background: transparent;
        color: #34281F;

        font-size: 13px;
        line-height: 1.4;
        font-weight: 600 !important;

        position: static;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .transaction-reference::before {
        content: "Transaksi ";
        font-weight: 600 !important;
    }

    /* DETAIL MERCHANT TIDAK DITAMPILKAN DI DESKTOP */
    .transaction-main {
        display: none;
    }

    /* NOMINAL TRANSAKSI - RATA KIRI */
    .transaction-card .transaction-total {
        grid-area: total;
        justify-self: start;
        align-self: center;
        text-align: left;

        position: static;
        left: auto;
        margin: 0;

        font-size: 16px;
        white-space: nowrap;
    }

    /* POIN */
    .transaction-point {
        grid-area: point;
        justify-self: end;
        align-self: center;

        padding: 6px 10px;
        border-radius: 999px;

        background: #EAF6ED;
        color: #328653;

        font-size: 10px;
        position: static;
        white-space: nowrap;
    }

    /* KOTAK TRANSAKSI MEMBER */
    .transaction-member-banner {
        margin-top: 8px;
        background: rgba(128, 128, 128, 0.03);
    }
}

</style>




<div class="transaction-page">

    <h1 class="transaction-page-title">
        Riwayat Transaksi
    </h1>

    {{-- =====================================================
         HEADER - TRANSAKSI MEMBER
    ====================================================== --}}
    <div class="transaction-member-banner">

       
<div class="transaction-member-icon">
    <svg viewBox="0 0 32 32"
         fill="none"
         stroke="currentColor"
         stroke-width="1.8"
         stroke-linecap="round"
         stroke-linejoin="round"
         aria-hidden="true">

        <!-- Kepala orang -->
        <circle cx="11" cy="8" r="3.5"></circle>

        <!-- Badan orang -->
        <path d="M3 23.5v-1.2a7.5 7.5 0 0 1 12.8-5.3"></path>
        <path d="M3 23.5h10"></path>

        <!-- Bintang -->
        <path d="m23.5 14.5 2.1 4.3 4.8.7-3.5 3.4.8 4.8-4.2-2.2-4.2 2.2.8-4.8-3.5-3.4 4.8-.7 2.1-4.3Z"></path>
    </svg>
</div>
        <div class="transaction-member-content">
            <div class="transaction-member-title">
                Transaksi Member
            </div>
            <div class="transaction-member-description">
    Semua transaksi yang dilakukan<br>
    menggunakan Member SAE Cafe.
</div>
        </div>
    </div>
    {{-- =====================================================
         TRANSACTIONS
    ====================================================== --}}
    @forelse($grouped as $month => $items)
        <section class="transaction-month-group">
            <div class="transaction-month">
                {{ $month }}
            </div>
            <div class="transaction-list">
                @foreach($items as $tx)
                    <article class="transaction-card">
                        {{-- DATE --}}
                        <div class="transaction-date">
                            @if($tx->tanggal_transaksi)
                                {{ \Carbon\Carbon::parse($tx->tanggal_transaksi)->locale('id')->translatedFormat('j F Y') }}
                                ·
                                {{ \Carbon\Carbon::parse($tx->tanggal_transaksi)->format('H:i') }}
                            @else
                                Tanggal tidak tersedia
                            @endif
                        </div>
                        {{-- TRANSACTION REFERENCE --}}
                        <div class="transaction-reference"
                             title="#{{ $tx->kode_transaksi }}">
                            #{{ $tx->kode_transaksi }}
                        </div>
                        {{-- COFFEE ICON --}}
                        <div class="transaction-icon">
                            <svg viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor"
                                 stroke-width="1.6"
                                 stroke-linecap="round"
                                 stroke-linejoin="round"
                                 aria-hidden="true">
                                <path d="M5 9h12v6a4 4 0 0 1-4 4H9a4 4 0 0 1-4-4V9Z"></path>
                                <path d="M17 11h1.2a2.3 2.3 0 1 1 0 4.6H17"></path>
                                <path d="M8 6c0-1 1-1 1-2"></path>
                                <path d="M12 6c0-1 1-1 1-2"></path>
                                <path d="M16 6c0-1 1-1 1-2"></path>
                                <path d="M4 21h16"></path>
                            </svg>
                        </div>
                        {{-- MAIN DETAIL --}}
                        <div class="transaction-main">
                            <div class="transaction-merchant">
                                Sae Cafe Lumajang
                            </div>
                            <div class="transaction-description">
                                Pembayaran
                            </div>
                        </div>
                        {{-- TOTAL --}}
                        <div class="transaction-total">
                            Rp{{ number_format(
                                (int) $tx->total_belanja,
                                0,
                                ',',
                                '.'
                            ) }}
                        </div>
                        {{-- POINT --}}
                        <div class="transaction-point {{ (int) $tx->point_didapat === 0 ? 'zero' : '' }}">
                            +{{ number_format(
                                (int) $tx->point_didapat,
                                0,
                                ',',
                                '.'
                            ) }} Point
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @empty
    <div class="transaction-empty">
        <svg class="transaction-empty-icon"
             viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="1.5"
             stroke-linecap="round"
             stroke-linejoin="round"
             aria-hidden="true">
            <path d="M5 9h12v6a4 4 0 0 1-4 4H9a4 4 0 0 1-4-4V9Z"></path>
            <path d="M17 11h1.2a2.3 2.3 0 1 1 0 4.6H17"></path>
            <path d="M8 6c0-1 1-1 1-2"></path>
            <path d="M12 6c0-1 1-1 1-2"></path>
            <path d="M16 6c0-1 1-1 1-2"></path>
            <path d="M4 21h16"></path>
        </svg>

        <div class="transaction-empty-title">
            Belum ada transaksi
        </div>

        <div class="transaction-empty-description">
            Transaksi kamu akan muncul di sini.
        </div>
    </div>
@endforelse
</div>



<script>
(function () {
    const UPDATE_INTERVAL = 3000;
    let isRefreshing = false;

    async function refreshTransactionPage() {
        if (document.hidden || isRefreshing) {
            return;
        }

        const currentPage = document.querySelector('.transaction-page');

        if (!currentPage) {
            return;
        }

        isRefreshing = true;

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

            const latestPage = parsedDocument.querySelector(
                '.transaction-page'
            );

            if (!latestPage) {
                return;
            }

            // Ganti tampilan hanya jika ada perubahan data.
            if (currentPage.innerHTML !== latestPage.innerHTML) {
                currentPage.replaceWith(
                    latestPage.cloneNode(true)
                );
            }

        } catch (error) {
            console.warn(
                'Pembaruan riwayat transaksi gagal:',
                error
            );
        } finally {
            isRefreshing = false;
        }
    }

    // Periksa transaksi terbaru setiap 3 detik.
    const refreshTimer = setInterval(
        refreshTransactionPage,
        UPDATE_INTERVAL
    );

    // Perbarui segera ketika pengguna kembali ke tab ini.
    document.addEventListener('visibilitychange', function () {
        if (!document.hidden) {
            refreshTransactionPage();
        }
    });

    // Hentikan timer ketika halaman ditinggalkan.
    window.addEventListener('pagehide', function () {
        clearInterval(refreshTimer);
    });
})();
</script>

@endsection
