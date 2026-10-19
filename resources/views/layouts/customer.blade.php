<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'SAÉ CAFE ROJEL')
    </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
    /* =========================================================
   ROOT
========================================================= */

    :root {
        --customer-black: #080808;
        --customer-brown: #4B2D1C;
        --customer-brown-light: #6B432A;

        --customer-bg: #F7F2EA;
        --customer-card: #FFFDF9;
        --customer-cream: #FAF0DF;

        --customer-border: #E8DDD0;
        --customer-muted: #8B796B;

        --customer-gold: #D9A65A;

        --customer-green: #2F7D48;
        --customer-red: #B84444;
    }


    /* =========================================================
   RESET
========================================================= */

    * {
        box-sizing: border-box;
    }

    html,
    body {
        margin: 0;
        padding: 0;

        min-height: 100%;

        background: var(--customer-bg);

        color: #171311;

        font-family:
            Poppins,
            Arial,
            sans-serif;
    }

    body {
        overflow-x: hidden;
    }

    a {
        color: inherit;
        text-decoration: none;
    }

    button,
    input {
        font: inherit;
    }


    /* =========================================================
   HEADER
========================================================= */

    .cc-header {
        position: sticky;

        top: 0;

        z-index: 1000;

        width: 100%;

        height: 82px;

        display: flex;

        align-items: center;

        padding: 0 42px;

        background: var(--customer-black);

        color: #FFFFFF;
    }


    /* =========================================================
   BRAND
========================================================= */

    .cc-brand {
        display: flex;

        align-items: center;

        gap: 14px;

        min-width: 0;
    }

    .cc-logo {
    display: block;
    width: 54px;
    height: 54px;
    flex-shrink: 0;
    border: none;
    border-radius: 50%;
    background: #FFFFFF;
    object-fit: cover;
    object-position: center;
}

    .cc-brand-name {
        color: #FFFFFF;

        font-size: 20px;

        font-weight: 700;

        line-height: 1;

        letter-spacing: -.02em;

        white-space: nowrap;
    }


    /* =========================================================
   DESKTOP NAVIGATION
========================================================= */

    .cc-nav {
        margin-left: auto;

        display: flex;

        align-items: center;

        gap: 4px;

        padding: 5px;

        background: #151515;

        border-radius: 999px;
    }

    .cc-nav a {
        min-height: 40px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 8px;

        padding: 0 15px;

        border-radius: 999px;

        background: transparent;

        color: #FFFFFF;

        font-size: 12px;

        font-weight: 500;

        line-height: 1;

        white-space: nowrap;

        transition:
            background-color .2s ease,
            color .2s ease;
    }

    .cc-nav a:hover,
    .cc-nav a.active {
        background: var(--customer-brown);

        color: #FFFFFF;
    }


    /* =========================================================
   MODERN NAV ICON
========================================================= */

    .cc-nav-icon {
        width: 17px;
        height: 17px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        flex: 0 0 17px;

        color: currentColor;
    }

    .cc-nav-icon svg {
        width: 100%;
        height: 100%;

        display: block;
    }


    /* =========================================================
   BURGER
========================================================= */

    .cc-menu-btn {
        display: none;

        width: 44px;
        height: 44px;

        margin-left: auto;

        padding: 0;

        border: 0;

        border-radius: 11px;

        background: #181818;

        color: #FFFFFF;

        align-items: center;

        justify-content: center;

        cursor: pointer;
    }

    .cc-menu-btn:hover {
        background: #252525;
    }

    .cc-menu-btn-icon {
        width: 23px;
        height: 23px;

        display: block;
    }

    .cc-menu-btn-icon svg {
        width: 100%;
        height: 100%;

        display: block;
    }


    /* =========================================================
   MOBILE OVERLAY
========================================================= */

    .cc-overlay {
        position: fixed;

        inset: 0;

        z-index: 1100;

        background: rgba(0, 0, 0, .56);

        opacity: 0;

        visibility: hidden;

        pointer-events: none;

        transition:
            opacity .2s ease,
            visibility .2s ease;
    }

    .cc-overlay.open {
        opacity: 1;

        visibility: visible;

        pointer-events: auto;
    }


    /* =========================================================
   MOBILE DRAWER
========================================================= */

    .cc-drawer {
        position: fixed;

        top: 0;
        left: 0;
        bottom: 0;

        z-index: 1200;

        width: min(86vw, 320px);

        display: flex;

        flex-direction: column;

        background: #0B0B0B;

        color: #FFFFFF;

        transform: translateX(-100%);

        transition:
            transform .24s ease;

        box-shadow:
            18px 0 44px rgba(0, 0, 0, .35);
    }

    .cc-drawer.open {
        transform: translateX(0);
    }


    /* =========================================================
   DRAWER HEADER
========================================================= */

   
.cc-drawer-head {
    display: grid;
    grid-template-columns: 42px minmax(0, 1fr) 38px;
    align-items: center;
    column-gap: 12px;
    padding: 18px;
    border-bottom: 1px solid rgba(255, 255, 255, .08);
}

.cc-drawer-head .cc-logo {
    display: block;
    width: 42px;
    height: 42px;
    min-width: 42px;
    object-fit: contain;
    object-position: center;
    border: none;
    border-radius: 50%;
    background: transparent;
}

.cc-drawer-head > div:nth-child(2) {
    min-width: 0;
}

.cc-drawer-head .cc-drawer-title {
    font-size: 13px;
    line-height: 1.3;
    white-space: normal;
    overflow-wrap: break-word;
}

.cc-drawer-head .cc-drawer-subtitle {
    margin-top: 4px;
    font-size: 8px;
    white-space: nowrap;
}


    .cc-drawer-close {
        width: 38px;
        height: 38px;

        margin-left: 0;
        justify-self: end;

        display: grid;

        place-items: center;

        padding: 0;

        border: 0;

        border-radius: 10px;

        background: rgba(255, 255, 255, .08);

        color: #FFFFFF;

        cursor: pointer;
    }

    .cc-drawer-close:hover {
        background: rgba(255, 255, 255, .14);
    }

    .cc-drawer-close svg {
        width: 18px;
        height: 18px;

        display: block;
    }

    .cc-drawer-title {
        color: #FFFFFF;

        font-size: 14px;

        font-weight: 700;

        line-height: 1.2;
    }

    .cc-drawer-subtitle {
        margin-top: 3px;

        color: var(--customer-gold);

        font-size: 8px;

        letter-spacing: .08em;
    }


    /* =========================================================
   DRAWER MENU
========================================================= */

    .cc-drawer-menu {
        display: grid;

        gap: 6px;

        padding: 16px;

        overflow-y: auto;
    }

    .cc-drawer-menu a {
        min-height: 48px;

        display: flex;

        align-items: center;

        gap: 12px;

        padding: 12px 13px;

        border-radius: 11px;

        background: transparent;

        color: #FFFFFF;

        font-size: 14px;

        font-weight: 500;

        line-height: 1;

        transition:
            background-color .2s ease;
    }

    .cc-drawer-menu a:hover,
    .cc-drawer-menu a.active {
        background: var(--customer-brown);

        color: #FFFFFF;
    }


    /* =========================================================
   DRAWER ICON
========================================================= */

    .cc-drawer-icon {
        width: 20px;
        height: 20px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        flex: 0 0 20px;

        color: currentColor;
    }

    .cc-drawer-icon svg {
        width: 100%;
        height: 100%;

        display: block;
    }


    /* =========================================================
   DRAWER FOOT
========================================================= */

    .cc-drawer-foot {
        margin-top: auto;

        padding: 16px;

        border-top:
            1px solid rgba(255, 255, 255, .08);
    }

    .cc-drawer-foot form {
        margin: 0;
    }

    .cc-drawer-foot button {
        width: 100%;

        padding: 11px 12px;

        border: 0;

        border-radius: 11px;

        background: #1D1D1D;

        color: #FFFFFF;

        cursor: pointer;
    }

    .cc-drawer-foot button:hover {
        background: #272727;
    }


    /* =========================================================
   MAIN CONTENT
========================================================= */

    .cc-main {
        width: 100%;

        max-width: 1460px;

        margin: 0 auto;

        padding: 34px 44px 60px;
    }


    /* =========================================================
   LOGOUT CONFIRMATION OVERLAY
========================================================= */

    .customer-logout-overlay {
        position: fixed;

        inset: 0;

        z-index: 9999;

        display: none;

        align-items: center;

        justify-content: center;

        padding: 20px;

        background: rgba(0, 0, 0, .55);
    }

    .customer-logout-overlay.is-open {
        display: flex;
    }


    /* =========================================================
   LOGOUT CARD
========================================================= */

    .customer-logout-box {
        width: min(380px, calc(100vw - 32px));

        margin: 0;

        padding: 24px 22px 20px;

        border:
            1px solid var(--customer-border);

        border-radius: 18px;

        background: #FFFDF9;

        box-shadow:
            0 20px 60px rgba(0, 0, 0, .22);

        text-align: center;

        color: #251B16;
    }


    /* =========================================================
   LOGOUT ICON
========================================================= */

    .customer-logout-box-icon {
        width: 50px;

        height: 50px;

        margin: 0 auto 14px;

        display: flex;

        align-items: center;

        justify-content: center;

        flex-shrink: 0;

        border-radius: 50%;

        background: #F6EBDD;

        color: #4B2D1C;
    }

    .customer-logout-box-icon svg {
        width: 22px;

        height: 22px;

        min-width: 22px;

        min-height: 22px;

        max-width: 22px;

        max-height: 22px;

        display: block;
    }


    /* =========================================================
   LOGOUT TITLE
========================================================= */

    .customer-logout-box-title {
        margin: 0;

        color: #251B16;

        font-family:
            Poppins,
            Arial,
            sans-serif;

        font-size: 18px;

        line-height: 1.35;

        font-weight: 700;
    }


    /* =========================================================
   LOGOUT TEXT
========================================================= */

    .customer-logout-box-text {
        margin: 8px auto 0;

        max-width: 290px;

        color: #8B796B;

        font-family:
            Poppins,
            Arial,
            sans-serif;

        font-size: 10px;

        line-height: 1.6;
    }


    /* =========================================================
   LOGOUT ACTIONS
========================================================= */

    .customer-logout-box-actions {
        display: grid;

        grid-template-columns:
            1fr 1fr;

        gap: 9px;

        margin-top: 20px;
    }


    /* =========================================================
   LOGOUT BUTTON BASE
========================================================= */

    .customer-logout-box-button {
        width: 100%;

        min-height: 40px;

        margin: 0;

        padding: 9px 10px;

        border-radius: 9px;

        font-family:
            Poppins,
            Arial,
            sans-serif;

        font-size: 10px;

        font-weight: 700;

        line-height: 1;

        appearance: none;

        -webkit-appearance: none;

        cursor: pointer;

        box-sizing: border-box;
    }


    /* =========================================================
   CANCEL
========================================================= */

    .customer-logout-box-cancel {
        border: 1px solid #E0D3C6;

        background: #FFFFFF;

        color: #6F5D50;
    }

    .customer-logout-box-cancel:hover {
        background: #F8F3EE;
    }


    /* =========================================================
   CONFIRM
========================================================= */

    .customer-logout-box-confirm {
        border: 1px solid #4B2D1C;

        background: #4B2D1C;

        color: #FFFFFF;
    }

    .customer-logout-box-confirm:hover {
        background: #5A3825;
    }


    /* =========================================================
   TABLET / MOBILE
========================================================= */

    @media (max-width: 1024px) {

        .cc-header {
            height: 68px;

            padding: 0 18px;
        }


        .cc-logo {
            width: 42px;
            height: 42px;

            font-size: 8px;
        }


        .cc-brand {
            gap: 11px;
        }


        .cc-brand-name {
            font-size: 16px;
        }


        .cc-nav {
            display: none;
        }


        .cc-menu-btn {
            display: flex;
        }


        .cc-main {
            max-width: 900px;

            padding: 20px 16px 38px;
        }

    }


    /* =========================================================
   SMALL MOBILE
========================================================= */

    @media (max-width: 520px) {

        .cc-header {
            height: 64px;

            padding: 0 12px;
        }


        .cc-brand {
            gap: 10px;
        }


        .cc-logo {
            width: 38px;
            height: 38px;

            font-size: 7px;
        }


        .cc-brand-name {
            font-size: 14px;
        }


        .cc-menu-btn {
            width: 42px;
            height: 42px;
        }


        .cc-main {
            padding: 16px 12px 28px;
        }


        /* LOGOUT MODAL MOBILE */

        .customer-logout-overlay {
            padding: 12px;
        }


        .customer-logout-box {
            width: 100%;

            max-width: 360px;

            padding: 20px 16px 18px;

            border-radius: 16px;
        }


        .customer-logout-box-icon {
            width: 44px;
            height: 44px;

            margin-bottom: 12px;
        }


        .customer-logout-box-icon svg {
            width: 20px;
            height: 20px;

            min-width: 20px;
            min-height: 20px;

            max-width: 20px;
            max-height: 20px;
        }


        .customer-logout-box-title {
            font-size: 16px;
        }


        .customer-logout-box-text {
            font-size: 9px;
        }


        .customer-logout-box-actions {
            gap: 8px;

            margin-top: 18px;
        }


        .customer-logout-box-button {
            min-height: 38px;

            font-size: 9px;
        }

    }



    
/* PERBAIKAN HEADER MENU HP - 380px KE BAWAH */
@media (max-width: 380px) {
    .cc-drawer-head {
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
        justify-content: flex-start !important;
        gap: 10px !important;
        padding: 14px 12px !important;
        min-height: 72px;
        box-sizing: border-box;
    }

    .cc-drawer-head .cc-logo {
        display: block !important;
        flex: 0 0 42px !important;
        width: 42px !important;
        height: 42px !important;
        min-width: 42px !important;
        min-height: 42px !important;
        margin: 0 !important;
        border: none !important;
        border-radius: 50%;
        object-fit: contain;
    }

    .cc-drawer-head > div:nth-child(2) {
        flex: 1 1 auto !important;
        min-width: 0 !important;
        width: auto !important;
    }

    .cc-drawer-head .cc-drawer-title {
        font-size: 11px !important;
        line-height: 1.35 !important;
        white-space: normal !important;
        overflow-wrap: anywhere;
    }

    .cc-drawer-head .cc-drawer-subtitle {
        margin-top: 4px !important;
        font-size: 8px !important;
        line-height: 1.3;
    }

    .cc-drawer-head .cc-drawer-close {
        display: grid !important;
        flex: 0 0 36px !important;
        width: 36px !important;
        height: 36px !important;
        margin-left: auto !important;
        padding: 0 !important;
        align-self: center;
    }
}

    </style>

    @stack('head')

</head>


<body>


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <header class="cc-header">


        <!-- BRAND -->

        <div class="cc-brand">

            <img
    src="{{ asset('images/sae-logo.png') }}"
    alt="Logo SAÉ CAFE ROJEL"
    class="cc-logo"
>

            <div class="cc-brand-name">
                SAÉ CAFE ROJEL
            </div>

        </div>


        <!-- =================================================
             DESKTOP NAVIGATION
        ================================================== -->

        <nav class="cc-nav" aria-label="Customer navigation">


            <!-- BERANDA -->

            <a href="{{ route('customer.dashboard') }}"
                class="{{ request()->routeIs('customer.dashboard') ? 'active' : '' }}">

                <span class="cc-nav-icon">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true">
                        <path d="M3 10.5 12 3l9 7.5"></path>

                        <path d="M5.5 9.5V21h13V9.5"></path>

                        <path d="M9.5 21v-6h5v6"></path>
                    </svg>

                </span>

                <span>
                    Beranda
                </span>

            </a>


            <!-- REWARD -->

            <a href="{{ route('customer.reward') }}"
                class="{{ request()->routeIs('customer.reward*') ? 'active' : '' }}">

                <span class="cc-nav-icon">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 12v8a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-8"></path>

                        <path d="M2 7h20v5H2z"></path>

                        <path d="M12 7v14"></path>

                        <path d="M12 7H7.5a2.5 2.5 0 1 1 0-5C10 2 12 7 12 7Z"></path>

                        <path d="M12 7h4.5a2.5 2.5 0 1 0 0-5C14 2 12 7 12 7Z"></path>
                    </svg>

                </span>

                <span>
                    Reward
                </span>

            </a>


            <!-- TRANSAKSI -->

            <a href="{{ route('customer.transaction') }}"
                class="{{ request()->routeIs('customer.transaction') ? 'active' : '' }}">

                <span class="cc-nav-icon">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true">
                        <rect x="5" y="3" width="14" height="18" rx="2"></rect>

                        <path d="M9 7h6"></path>

                        <path d="M9 11h6"></path>

                        <path d="M9 15h4"></path>

                        <path d="M9 18h3"></path>
                    </svg>

                </span>

                <span>
                    Transaksi
                </span>

            </a>


            <!-- PROFILE -->

            <a href="{{ route('customer.profile') }}"
                class="{{ request()->routeIs('customer.profile*') ? 'active' : '' }}">

                <span class="cc-nav-icon">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="8" r="3"></circle>

                        <path d="M5 20c.8-3.3 3.1-5 7-5s6.2 1.7 7 5"></path>
                    </svg>

                </span>

                <span>
                    Profile
                </span>

            </a>


        </nav>


        <!-- =================================================
             BURGER BUTTON
        ================================================== -->

        <button type="button" class="cc-menu-btn" id="ccMenuOpen" aria-label="Buka menu" aria-expanded="false">

            <span class="cc-menu-btn-icon">

                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <path d="M4 6h16"></path>
                    <path d="M4 12h16"></path>
                    <path d="M4 18h16"></path>
                </svg>

            </span>

        </button>


    </header>


    <!-- =====================================================
         OVERLAY
    ====================================================== -->

    <div class="cc-overlay" id="ccOverlay"></div>


    <!-- =====================================================
         MOBILE DRAWER
    ====================================================== -->

   
<aside class="cc-drawer" id="ccDrawer" aria-hidden="true">

    <!-- DRAWER HEADER -->
    <div class="cc-drawer-head">

        <img
            src="{{ asset('images/sae-logo.png') }}"
            alt="Logo SAÉ CAFE ROJEL"
            class="cc-logo"
        >

        <div>
            <div class="cc-drawer-title">
                SAÉ CAFE ROJEL
            </div>

            <div class="cc-drawer-subtitle">
                MEMBER AREA
            </div>
        </div>

        <button
            type="button"
            class="cc-drawer-close"
            id="ccMenuClose"
            aria-label="Tutup menu"
        >
            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
            >
                <path d="M6 6l12 12"></path>
                <path d="M18 6L6 18"></path>
            </svg>
        </button>

    </div>

    <!-- DRAWER MENU -->



        <!-- DRAWER MENU -->

        <nav class="cc-drawer-menu" aria-label="Mobile customer navigation">


            <!-- BERANDA -->

            <a href="{{ route('customer.dashboard') }}"
                class="{{ request()->routeIs('customer.dashboard') ? 'active' : '' }}">

                <span class="cc-drawer-icon">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true">
                        <path d="M3 10.5 12 3l9 7.5"></path>

                        <path d="M5.5 9.5V21h13V9.5"></path>

                        <path d="M9.5 21v-6h5v6"></path>
                    </svg>

                </span>

                <span>
                    Beranda
                </span>

            </a>


            <!-- REWARD -->

            <a href="{{ route('customer.reward') }}"
                class="{{ request()->routeIs('customer.reward*') ? 'active' : '' }}">

                <span class="cc-drawer-icon">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 12v8a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-8"></path>

                        <path d="M2 7h20v5H2z"></path>

                        <path d="M12 7v14"></path>

                        <path d="M12 7H7.5a2.5 2.5 0 1 1 0-5C10 2 12 7 12 7Z"></path>

                        <path d="M12 7h4.5a2.5 2.5 0 1 0 0-5C14 2 12 7 12 7Z"></path>
                    </svg>

                </span>

                <span>
                    Reward
                </span>

            </a>


            <!-- TRANSAKSI -->

            <a href="{{ route('customer.transaction') }}"
                class="{{ request()->routeIs('customer.transaction') ? 'active' : '' }}">

                <span class="cc-drawer-icon">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true">
                        <rect x="5" y="3" width="14" height="18" rx="2"></rect>

                        <path d="M9 7h6"></path>

                        <path d="M9 11h6"></path>

                        <path d="M9 15h4"></path>

                        <path d="M9 18h3"></path>
                    </svg>

                </span>

                <span>
                    Transaksi
                </span>

            </a>


            <!-- PROFILE -->

            <a href="{{ route('customer.profile') }}"
                class="{{ request()->routeIs('customer.profile*') ? 'active' : '' }}">

                <span class="cc-drawer-icon">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="8" r="3"></circle>

                        <path d="M5 20c.8-3.3 3.1-5 7-5s6.2 1.7 7 5"></path>
                    </svg>

                </span>

                <span>
                    Profile
                </span>

            </a>


        </nav>


        <!-- DRAWER FOOT -->

        <div class="cc-drawer-foot">

            <form method="POST" action="{{ route('logout') }}" id="customerLogoutForm">
                @csrf

                <button type="button" id="customerLogoutButton">

                    Keluar
                </button>
            </form>

        </div>


    </aside>

    <div id="customerLogoutModal" class="customer-logout-overlay" aria-hidden="true">
        <div class="customer-logout-box" role="dialog" aria-modal="true" aria-labelledby="customerLogoutTitle">

            <div class="customer-logout-box-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round" aria-hidden="true">
                    <path d="M10 17l5-5-5-5"></path>
                    <path d="M15 12H3"></path>
                    <path d="M21 4v16"></path>
                </svg>
            </div>

            <h2 id="customerLogoutTitle" class="customer-logout-box-title">
                Keluar dari akun?
            </h2>

            <p class="customer-logout-box-text">
                Apakah Anda yakin ingin keluar dari akun SAÉ Cafe?
            </p>

            <div class="customer-logout-box-actions">

                <button type="button" id="customerLogoutCancel"
                    class="customer-logout-box-button customer-logout-box-cancel">
                    Batal
                </button>

                <button type="button" id="customerLogoutConfirm"
                    class="customer-logout-box-button customer-logout-box-confirm">
                    Ya, Keluar
                </button>

            </div>

        </div>
    </div>


    <!-- =====================================================
         MAIN CONTENT
    ====================================================== -->

    <main class="cc-main">

        @yield('content')

    </main>


    <!-- =====================================================
         JAVASCRIPT
    ====================================================== -->

    <script>
    (function() {

        const drawer =
            document.getElementById('ccDrawer');

        const overlay =
            document.getElementById('ccOverlay');

        const openButton =
            document.getElementById('ccMenuOpen');

        const closeButton =
            document.getElementById('ccMenuClose');


        function openMenu() {

            if (!drawer) {
                return;
            }

            drawer.classList.add('open');

            overlay?.classList.add('open');

            drawer.setAttribute(
                'aria-hidden',
                'false'
            );

            openButton?.setAttribute(
                'aria-expanded',
                'true'
            );

            document.body.style.overflow =
                'hidden';
        }


        function closeMenu() {

            if (!drawer) {
                return;
            }

            drawer.classList.remove('open');

            overlay?.classList.remove('open');

            drawer.setAttribute(
                'aria-hidden',
                'true'
            );

            openButton?.setAttribute(
                'aria-expanded',
                'false'
            );

            document.body.style.overflow = '';
        }


        openButton?.addEventListener(
            'click',
            openMenu
        );


        closeButton?.addEventListener(
            'click',
            closeMenu
        );


        overlay?.addEventListener(
            'click',
            closeMenu
        );


        drawer
            ?.querySelectorAll('a')
            .forEach(function(link) {

                link.addEventListener(
                    'click',
                    closeMenu
                );

            });


        document.addEventListener(
            'keydown',
            function(event) {

                if (
                    event.key === 'Escape'
                ) {
                    closeMenu();
                }

            }
        );


        window.addEventListener(
            'resize',
            function() {

                if (
                    window.innerWidth > 1024
                ) {
                    closeMenu();
                }

            }
        );

        const logoutForm =
            document.getElementById('customerLogoutForm');

        const logoutButton =
            document.getElementById('customerLogoutButton');

        const profileLogoutButton =
            document.getElementById('profileLogoutButton');

        const logoutModal =
            document.getElementById('customerLogoutModal');

        const logoutCancel =
            document.getElementById('customerLogoutCancel');

        const logoutConfirm =
            document.getElementById('customerLogoutConfirm');


        function openLogoutModal() {

            if (!logoutModal) {
                return;
            }

            logoutModal.classList.add('is-open');

            logoutModal.setAttribute(
                'aria-hidden',
                'false'
            );

            document.body.style.overflow = 'hidden';

        }


        function closeLogoutModal() {

            if (!logoutModal) {
                return;
            }

            logoutModal.classList.remove('is-open');

            logoutModal.setAttribute(
                'aria-hidden',
                'true'
            );

            document.body.style.overflow = '';

        }


        logoutButton?.addEventListener(
            'click',
            openLogoutModal
        );


        profileLogoutButton?.addEventListener(
            'click',
            openLogoutModal
        );


        logoutCancel?.addEventListener(
            'click',
            closeLogoutModal
        );


        logoutConfirm?.addEventListener(
            'click',
            function() {

                if (logoutForm) {
                    logoutForm.submit();
                }

            }
        );


        logoutModal?.addEventListener(
            'click',
            function(event) {

                if (event.target === logoutModal) {
                    closeLogoutModal();
                }

            }
        );


        document.addEventListener(
            'keydown',
            function(event) {

                if (
                    event.key === 'Escape' &&
                    logoutModal?.classList.contains('is-open')
                ) {
                    closeLogoutModal();
                }

            }
        );


    })();
    </script>


    @stack('scripts')


</body>