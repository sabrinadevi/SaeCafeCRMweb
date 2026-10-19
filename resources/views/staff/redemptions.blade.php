@extends('layouts.staff')

@section('title', 'Redemption - Staff')

@section('content')

<style>
/* =========================================================
       PAGE
    ========================================================== */

.staff-redemption-page {
    width: 100%;
    min-width: 0;
}

.staff-redemption-header {
    margin-bottom: 20px;
}

.staff-selected-redemption-customer {
    display: flex;

    align-items: center;
    justify-content: space-between;

    gap: 16px;

    margin-bottom: 18px;

    padding: 15px 16px;

    background: #FFF9F2;

    border: 1px solid #EADFD1;

    border-radius: 14px;
}

.staff-selected-redemption-label {
    color: #8D745E;

    font-size: 10px;

    font-weight: 700;

    letter-spacing: .06em;

    text-transform: uppercase;
}

.staff-selected-redemption-name {
    margin-top: 4px;

    color: #171717;

    font-size: 15px;

    font-weight: 600;
}

.staff-selected-redemption-meta {
    margin-top: 2px;

    color: #8A7667;

    font-size: 11px;

    line-height: 17px;
}

.staff-selected-redemption-clear {
    flex-shrink: 0;

    min-height: 34px;

    padding: 8px 11px;

    border: 1px solid #D9C9BB;

    border-radius: 9px;

    background: #FFFFFF;

    color: #4A2E1F;

    font-size: 11px;

    font-weight: 600;

    text-decoration: none;

    white-space: nowrap;
}

.staff-selected-redemption-clear:hover {
    background: #FFF9F2;

    border-color: #C9B3A1;
}

.staff-redemption-title {
    margin: 0;

    color: #171717;

    font-size: 26px;
    line-height: 34px;

    font-weight: 600;
}

.staff-redemption-subtitle {
    margin: 5px 0 0;

    color: #7F6D60;

    font-size: 13px;
    line-height: 19px;
}


/* =========================================================
       CONFIRM FORM
    ========================================================== */

.staff-redemption-form-card {
    margin-bottom: 18px;

    padding: 18px;

    background: #FFFFFF;

    border:
        1px solid #EADFD1;

    border-radius: 16px;

    box-shadow:
        0 8px 24px rgba(48, 31, 21, .04);
}

.staff-redemption-form {
    display: grid;

    grid-template-columns:
        minmax(0, 1fr) auto;

    gap: 10px;
}

.staff-redemption-input {
    width: 100%;

    min-height: 44px;

    padding: 12px 13px;

    border:
        1px solid #DDD2C8;

    border-radius: 11px;

    background: #FFFFFF;

    color: #171717;

    font-family: inherit;

    font-size: 13px;

    outline: none;

    transition:
        border-color .2s ease,
        box-shadow .2s ease;
}

.staff-redemption-input:focus {
    border-color: #4A2E1F;

    box-shadow:
        0 0 0 3px rgba(74, 46, 31, .08);
}

.staff-redemption-input::placeholder {
    color: #A49487;
}

.staff-redemption-button {
    min-height: 44px;

    padding: 12px 18px;

    border: 0;

    border-radius: 11px;

    background: #4A2E1F;

    color: #FFFFFF;

    font-family: inherit;

    font-size: 13px;

    font-weight: 600;

    cursor: pointer;

    transition:
        background-color .2s ease;
}


/*========================================================
   SCAN QR REDEMPTION BUTTON
   ========================================================== */

.staff-scan-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;

    min-height: 40px;
    padding: 8px 14px;

    background: #FFFFFF;
    color: #4A2E1F;
    border: 1px solid #DCCFC3;
    border-radius: 10px;

    font-family: inherit;
    font-size: 12px;
    font-weight: 600;

    cursor: pointer;

    transition:
        background-color .2s ease,
        border-color .2s ease,
        box-shadow .2s ease,
        transform .2s ease;
}

.staff-scan-button:hover {
    background: #FFF9F4;
    border-color: #CDB9A8;
    box-shadow: 0 3px 10px rgba(48, 31, 21, .06);
}

.staff-scan-button:active {
    transform: translateY(1px);
}

.staff-scan-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    font-size: 15px;
    color: #4A2E1F;
}


/* =========================================================
   REDEMPTION BUTTON
   ========================================================== */

.staff-redemption-button:hover {
    background: #5B3927;
}


/* =========================================================
   REDEMPTION HELP
   ========================================================== */

.staff-redemption-help {
    margin: 9px 0 0;

    color: #968476;

    font-size: 11px;

    line-height: 16px;
}


/* =========================================================
   SCAN QR REDEMPTION PANEL
   ========================================================== */

.staff-redemption-scan-panel {
    display: none;

    margin-bottom: 18px;
    padding: 18px;

    background: #FFFFFF;

    border: 1px solid #EADFD1;
    border-radius: 16px;

    box-shadow:
        0 8px 24px rgba(48, 31, 21, .04);
}

.staff-redemption-scan-panel.open {
    display: block;
}


/* =========================================================
   SCANNER HEADER
   ========================================================== */

.staff-redemption-scan-header {
    display: flex;

    align-items: center;
    justify-content: space-between;

    gap: 12px;

    margin-bottom: 14px;
}

.staff-redemption-scan-title {
    margin: 0;

    color: #171717;

    font-size: 14px;

    font-weight: 600;
}

.staff-redemption-scan-header-actions {
    display: flex;

    align-items: center;

    gap: 8px;
}


/* =========================================================
   PUTAR KAMERA
   ========================================================== */

.staff-redemption-camera-switch {
    display: inline-flex;

    align-items: center;
    justify-content: center;

    gap: 7px;

    min-height: 36px;

    padding: 8px 12px;

    border: 1px solid #D9C9BB;
    border-radius: 9px;

    background: #FFFFFF;

    color: #4A2E1F;

    font-family: inherit;

    font-size: 11px;

    font-weight: 600;

    cursor: pointer;

    white-space: nowrap;

    transition:
        background-color .2s ease,
        border-color .2s ease;
}

.staff-redemption-camera-switch:hover {
    background: #FFF9F2;

    border-color: #C9B3A1;
}

.staff-redemption-camera-switch:disabled {
    opacity: .45;

    cursor: not-allowed;
}


/* =========================================================
   TOMBOL X / CLOSE SCANNER
   ========================================================== */

.staff-redemption-scan-close {
    display: inline-flex;

    align-items: center;
    justify-content: center;

    width: 36px;
    height: 36px;

    border: 0;

    border-radius: 9px;

    background: #F5F0EA;

    color: #7F6D60;

    font-size: 20px;

    line-height: 1;

    cursor: pointer;

    transition:
        background-color .2s ease,
        color .2s ease;
}

.staff-redemption-scan-close:hover {
    background: #EDE4DB;

    color: #4A2E1F;
}


/* =========================================================
   CAMERA VIEW
   ========================================================== */

.staff-redemption-reader {
    width: 100%;

    max-width: 520px;

    margin: 0 auto;

    overflow: hidden;

    border-radius: 14px;

    background: #111;
}

#staffRedemptionQrReader {
    width: 100%;
}

#staffRedemptionQrReader video {
    width: 100% !important;

    height: auto !important;

    display: block;

    object-fit: cover;

    border-radius: 14px;
}


/* =========================================================
   SCAN MESSAGE
   ========================================================== */

.staff-redemption-scan-message {
    margin-top: 11px;

    color: #8D7B6D;

    font-size: 11px;

    line-height: 16px;

    text-align: center;
}


/* =========================================================
   RESPONSIVE
   ========================================================== */

@media (max-width: 640px) {

    .staff-redemption-scan-header {
        align-items: flex-start;
    }

    .staff-redemption-scan-header-actions {
        flex-shrink: 0;
    }

    .staff-redemption-camera-switch {
        font-size: 10px;

        padding: 8px 10px;
    }

    .staff-redemption-scan-panel {
        padding: 14px;
    }

}

/* =========================================================
       TABLE CARD
    ========================================================== */

.staff-redemption-table-card {
    width: 100%;

    overflow: hidden;

    background: #FFFFFF;

    border:
        1px solid #EADFD1;

    border-radius: 16px;

    box-shadow:
        0 8px 24px rgba(48, 31, 21, .04);
}

.staff-redemption-table-wrap {
    width: 100%;

    overflow-x: auto;
}

.staff-redemption-table {
    width: 100%;

    min-width: 820px;

    border-collapse: collapse;

    font-size: 12px;
}

.staff-redemption-table thead {
    background: #4A2E1F;

    color: #FFFFFF;
}

.staff-redemption-table th {
    padding: 13px 12px;

    text-align: left;

    font-size: 11px;

    font-weight: 600;

    white-space: nowrap;
}

.staff-redemption-table td {
    padding: 13px 12px;

    border-top:
        1px solid #F0ECE8;

    color: #4B443F;

    white-space: nowrap;
}

.staff-redemption-table tbody tr:hover {
    background: #FFFCF8;
}


/* =========================================================
       CODE
    ========================================================== */

.staff-redemption-code {
    color: #171717;

    font-weight: 600;
}


/* =========================================================
       POINT DIGUNAKAN
    ========================================================== */

.staff-redemption-point {
    color: #B91C1C;

    font-weight: 700;
}


/* =========================================================
       STATUS
    ========================================================== */

.staff-redemption-status {
    display: inline-flex;

    align-items: center;

    justify-content: center;

    min-height: 26px;

    padding: 4px 9px;

    border-radius: 999px;

    font-size: 10px;

    font-weight: 600;

    text-transform: capitalize;
}

.staff-redemption-status.success {
    background: #DCFCE7;

    color: #15803D;
}

.staff-redemption-status.pending {
    background: #FEF3C7;

    color: #B45309;
}

.staff-redemption-status.failed {
    background: #FEE2E2;

    color: #B91C1C;
}


/* =========================================================
       OK BUTTON
    ========================================================== */

.staff-redemption-ok {
    min-height: 32px;

    padding: 6px 10px;

    border: 0;

    border-radius: 8px;

    background: #4A2E1F;

    color: #FFFFFF;

    font-family: inherit;

    font-size: 11px;

    font-weight: 600;

    cursor: pointer;
}

.staff-redemption-ok:hover {
    background: #5B3927;
}


/* =========================================================
       EMPTY
    ========================================================== */

.staff-redemption-empty {
    padding: 30px 20px !important;

    text-align: center;

    color: #9A8779 !important;
}


/* =========================================================
       PAGINATION
    ========================================================== */

.staff-redemption-pagination {
    margin-top: 16px;
}


/* =========================================================
       RESPONSIVE
    ========================================================== */

@media (max-width: 640px) {

    .staff-selected-redemption-customer {
        align-items: flex-start;

        flex-direction: column;
    }

    .staff-selected-redemption-clear {
        width: 100%;

        text-align: center;
    }

    .staff-redemption-title {
        font-size: 23px;

        line-height: 30px;
    }

    .staff-redemption-form {
        grid-template-columns: 1fr;
    }

    .staff-redemption-button {
        width: 100%;
    }

    .staff-redemption-form-card {
        padding: 15px;
    }

    .staff-redemption-table-card {
        border-radius: 14px;
    }

}
</style>


<div class="staff-redemption-page">


    {{-- =====================================================
        HEADER
    ====================================================== --}}

    <div class="staff-redemption-header" style="
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    gap:20px;
    flex-wrap:wrap;
">

    <div>
        <h1 class="staff-redemption-title">
            Konfirmasi Redemption
        </h1>

        <p class="staff-redemption-subtitle">
            Scan QR redemption customer untuk memverifikasi
            reward sebelum dikonfirmasi.
        </p>
    </div>

  <button
    type="button"
    id="staffOpenRedemptionScanner"
    class="staff-scan-button"
>
    <span class="staff-scan-icon">
        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M4 7V5a1 1 0 0 1 1-1h2" />
            <path d="M17 4h2a1 1 0 0 1 1 1v2" />
            <path d="M20 17v2a1 1 0 0 1-1 1h-2" />
            <path d="M7 20H5a1 1 0 0 1-1-1v-2" />
            <path d="M8 12h8" />
        </svg>
    </span>

    <span>
        Scan QR Redemption
    </span>
</button>
</div>

<div
    id="staffRedemptionScannerPanel"
    style="
        display:none;
        margin-bottom:20px;
        padding:18px;
        background:#FFFFFF;
        border:1px solid #EADFD1;
        border-radius:16px;
        box-shadow:0 8px 24px rgba(48,31,21,.04);
    "
>

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:12px;
        margin-bottom:14px;
    ">

        <div>
            <div style="
                font-size:15px;
                font-weight:600;
                color:#171717;
            ">
                Scan QR Redemption
            </div>

            <div style="
                margin-top:3px;
                font-size:11px;
                color:#8A7667;
            ">
                Arahkan kamera ke QR yang ditampilkan customer.
            </div>
        </div>

    
<div style="
    display:flex;
    align-items:center;
    gap:8px;
">

    <button
        type="button"
        id="staffRedemptionSwitchCamera"
        class="staff-redemption-camera-switch"
        disabled
    >
        <svg
            width="16"
            height="16"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
        >
            <path d="M7 7h10" />
            <path d="M17 4l3 3-3 3" />
            <path d="M17 17H7" />
            <path d="M7 20l-3-3 3-3" />
        </svg>

        Putar Kamera
    </button>

    <button
        type="button"
        id="staffCloseRedemptionScanner"
        class="staff-redemption-scan-close"
        aria-label="Tutup scanner"
    >
        ×
    </button>

</div>



    </div>

    <div
        id="staffRedemptionQrReader"
        style="
            width:100%;
            max-width:520px;
            margin:0 auto;
            overflow:hidden;
            border-radius:14px;
        "
    ></div>

    <div
        id="staffRedemptionScanMessage"
        style="
            margin-top:12px;
            text-align:center;
            color:#8A7667;
            font-size:11px;
        "
    >
        Kamera belum dimulai.
    </div>

</div>

<div
    id="staffRedemptionScanResult"
    style="
        display:none;
        margin-bottom:20px;
        padding:20px;
        background:#FFFFFF !important;
    border:1px solid #EADFD1;
        border-radius:16px;
    "
>

    <div style="
        margin-bottom:16px;
        color:#4A2E1F;
        font-size:16px;
        font-weight:700;
    ">
        Detail Redemption
    </div>

    <div style="
        display:grid;
        grid-template-columns:repeat(2,minmax(0,1fr));
        gap:10px;
    ">

        <div>
            <div style="font-size:10px;color:#8A7667;">
                Customer
            </div>

            <div
                id="scannedRedemptionCustomer"
                style="margin-top:3px;font-weight:600;"
            >
                -
            </div>
        </div>

        <div>
            <div style="font-size:10px;color:#8A7667;">
                Member Code
            </div>

            <div
                id="scannedRedemptionMember"
                style="margin-top:3px;font-weight:600;"
            >
                -
            </div>
        </div>

        <div>
            <div style="font-size:10px;color:#8A7667;">
                Reward
            </div>

            <div
                id="scannedRedemptionReward"
                style="margin-top:3px;font-weight:600;"
            >
                -
            </div>
        </div>

        <div>
            <div style="font-size:10px;color:#8A7667;">
                Point Digunakan
            </div>

            <div
                id="scannedRedemptionPoint"
                style="margin-top:3px;font-weight:600;"
            >
                -
            </div>
        </div>

        <div>
            <div style="font-size:10px;color:#8A7667;">
                Kode Redemption
            </div>

            <div
                id="scannedRedemptionCode"
                style="margin-top:3px;font-weight:600;word-break:break-all;"
            >
                -
            </div>
        </div>

        <div>
            <div style="font-size:10px;color:#8A7667;">
                Status
            </div>

            <div
                id="scannedRedemptionStatus"
                style="margin-top:3px;font-weight:600;"
            >
                -
            </div>
        </div>

    </div>

    <div
        id="scannedRedemptionWarning"
        style="
            display:none;
            margin-top:15px;
            padding:11px 12px;
            background:#FFF4DF;
            border-radius:10px;
            color:#765C45;
            font-size:11px;
        "
    ></div>

    <form
        id="scannedRedemptionConfirmForm"
        method="POST"
        action="{{ route('staff.redemptions.confirm') }}"
        style="margin-top:16px;"
    >

        @csrf

        <input
            type="hidden"
            name="redemption_code"
            id="scannedRedemptionCodeInput"
        >

        <button
            type="submit"
            id="scannedRedemptionConfirmButton"
            class="staff-redemption-button"
            style="width:100%;"
        >
            Konfirmasi Redemption
        </button>

    </form>

</div>


    @if($selectedCustomer)

    <div style="
    margin-bottom:18px;
    padding:14px 16px;
    background:#FFFFFF !important;
    border:1px solid #EADFD1;
    border-radius:14px;
">

        <div style="
            font-size:10px;
            color:#8D745E;
            font-weight:700;
            text-transform:uppercase;
            letter-spacing:.06em;
        ">
            Customer dari Scan QR
        </div>

        <div style="
            margin-top:4px;
            font-size:15px;
            font-weight:600;
            color:#171717;
        ">
            {{ $selectedCustomer->nama }}
        </div>

        <div style="
            margin-top:2px;
            font-size:11px;
            color:#8A7667;
        ">
            {{ $selectedCustomer->member_code }}
            •
            {{ $selectedCustomer->nomor_hp }}
            •
            {{ number_format($selectedCustomer->saldo_point) }} Point
        </div>

    </div>

    @endif


    {{-- =====================================================
        FORM KONFIRMASI
    ====================================================== --}}

    <div class="staff-redemption-form-card">

        @if($selectedCustomer)

        <div class="staff-redemption-form-card">

            @if($nextPendingRedemption)

            <div style="
            margin-bottom:10px;
            color:#6B5D53;
            font-size:12px;
        ">
                Redemption berikutnya yang harus dikonfirmasi:
            </div>

            <div style="
            padding:12px 14px;
            margin-bottom:12px;
            background:#FFFFFF;
            border:1px solid #EADFD1;
            border-radius:11px;
        ">

                <div style="
                color:#171717;
                font-size:13px;
                font-weight:600;
            ">
                    {{ $nextPendingRedemption->redemption_code }}
                </div>

                <div style="
                margin-top:3px;
                color:#8A7667;
                font-size:11px;
            ">
                    {{ $nextPendingRedemption->reward->reward_name ?? '-' }}
                    •
                    {{ number_format($nextPendingRedemption->point_used) }} Point
                </div>

            </div>

            <form method="POST" action="{{ route('staff.redemptions.confirm') }}">
                @csrf

                <input type="hidden" name="redemption_code" value="{{ $nextPendingRedemption->redemption_code }}">

                <button type="submit" class="staff-redemption-button" style="width:100%;">
                    Konfirmasi Redemption Berikutnya
                </button>

            </form>

            <p class="staff-redemption-help">
                Redemption dikonfirmasi sesuai urutan dibuat.
            </p>

            @else

            <div style="
            color:#6B5D53;
            font-size:12px;
        ">
                Tidak ada redemption pending untuk customer ini.
            </div>

            @endif

        </div>

        @endif


        <p class="staff-redemption-help">
            Setelah dikonfirmasi, point customer dan stock reward
            akan dikurangi secara atomic.
        </p>

    </div>


    {{-- =====================================================
        TABLE REDEMPTION
    ====================================================== --}}
    @if($selectedCustomer)

    <div style="
        margin-bottom:10px;
        color:#171717;
        font-size:14px;
        font-weight:600;
    ">
        Redemption {{ $selectedCustomer->nama }}
    </div>

    @else

    <div style="
        margin-bottom:10px;
        color:#171717;
        font-size:14px;
        font-weight:600;
    ">
        Riwayat Redemption
    </div>

    @endif

    <div class="staff-redemption-table-card">

        <div class="staff-redemption-table-wrap">

            <table class="staff-redemption-table">

                <thead>

                    <tr>

                        <th>
                            Kode
                        </th>

                        <th>
                            Customer
                        </th>

                        <th>
                            Reward
                        </th>

                        <th>
                            Point Digunakan
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Waktu
                        </th>

                        @if($selectedCustomer)

                        <th>
                            Aksi
                        </th>

                        @endif

                    </tr>

                </thead>


                <tbody>

                    @forelse($redemptions as $redemption)

                    <tr>

                        {{-- KODE --}}
                        <td class="staff-redemption-code">
                            {{ $redemption->redemption_code ?? '-' }}
                        </td>

                        {{-- CUSTOMER --}}
                        <td>
                            {{ $redemption->customer->nama ?? '-' }}
                        </td>

                        {{-- REWARD --}}
                        <td>
                            {{ $redemption->reward->reward_name ?? '-' }}
                        </td>

                        {{-- POINT --}}
                        <td class="staff-redemption-point">
                            -{{ number_format($redemption->point_used) }}
                        </td>

                        {{-- STATUS --}}
                        <td>

                            @if($redemption->status === 'berhasil')

                            <span class="staff-redemption-status success">
                                Berhasil
                            </span>

                            @elseif($redemption->status === 'pending')

                            <span class="staff-redemption-status pending">
                                Pending
                            </span>

                            @else

                            <span class="staff-redemption-status failed">
                                {{ $redemption->status }}
                            </span>

                            @endif

                        </td>

                        {{-- WAKTU --}}
                        <td>
                            {{ $redemption->created_at?->format('d M H:i') ?? '-' }}
                        </td>

                        {{-- AKSI --}}
                        @if($selectedCustomer)

                        <td>

                            @if(
                            $redemption->status === 'pending' &&
                            $nextPendingRedemption &&
                            $redemption->redemption_code ===
                            $nextPendingRedemption->redemption_code
                            )

                            <form method="POST" action="{{ route('staff.redemptions.confirm') }}">
                                @csrf

                                <input type="hidden" name="redemption_code" value="{{ $redemption->redemption_code }}">

                                <button type="submit" class="staff-redemption-ok">
                                    Konfirmasi
                                </button>

                            </form>

                            @elseif($redemption->status === 'pending')

                            <span style="
                            color:#A49487;
                            font-size:10px;
                        ">
                                Menunggu giliran
                            </span>

                            @else

                            <span style="
                            color:#A49487;
                            font-size:10px;
                        ">
                                -
                            </span>

                            @endif

                        </td>

                        @endif

                    </tr>

                    @empty

                    <tr>

                        <td colspan="{{ $selectedCustomer ? 7 : 6 }}" class="staff-redemption-empty">

                            @if($selectedCustomer)

                            <div style="
                        font-weight:600;
                        color:#6B5D53;
                        margin-bottom:4px;
                    ">
                                Tidak ada redemption untuk
                                {{ $selectedCustomer->nama }}.
                            </div>

                            <div>
                                Customer ini belum memiliki redemption yang dapat ditampilkan.
                            </div>

                            @else

                            Belum ada redemption.

                            @endif

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- =====================================================
        PAGINATION
    ====================================================== --}}

    <div class="staff-redemption-pagination">
        {{ $redemptions->links() }}
    </div>


</div>
<script>
document.addEventListener('DOMContentLoaded', () => {

    const openButton =
    document.getElementById('staffOpenRedemptionScanner');

const closeButton =
    document.getElementById('staffCloseRedemptionScanner');

const switchButton =
    document.getElementById('staffRedemptionSwitchCamera');

const scannerPanel =
    document.getElementById('staffRedemptionScannerPanel');

const reader =
    document.getElementById('staffRedemptionQrReader');

const message =
    document.getElementById('staffRedemptionScanMessage');

const result =
    document.getElementById('staffRedemptionScanResult');

const customer =
    document.getElementById('scannedRedemptionCustomer');

const member =
    document.getElementById('scannedRedemptionMember');

const reward =
    document.getElementById('scannedRedemptionReward');

const point =
    document.getElementById('scannedRedemptionPoint');

const code =
    document.getElementById('scannedRedemptionCode');

const status =
    document.getElementById('scannedRedemptionStatus');

const codeInput =
    document.getElementById('scannedRedemptionCodeInput');

const confirmButton =
    document.getElementById('scannedRedemptionConfirmButton');

const warning =
    document.getElementById('scannedRedemptionWarning');

   if (
    !openButton ||
    !closeButton ||
    !switchButton ||
    !scannerPanel ||
    !reader
) {
    return;
}

let scanner = null;
let cameras = [];
let currentCameraIndex = 0;
let scannerRunning = false;
let scanProcessing = false;
let scanLocked = false;

function findBackCameraIndex() {

    if (!cameras.length) {
        return 0;
    }

    const index = cameras.findIndex(function(camera) {

        const label =
            String(camera.label || '').toLowerCase();

        return (
            label.includes('back') ||
            label.includes('rear') ||
            label.includes('environment') ||
            label.includes('belakang')
        );
    });

    return index >= 0 ? index : 0;
}


    function showMessage(text) {
        message.textContent = text;
    }

async function stopScanner() {

    scannerRunning = false;

    const activeScanner = scanner;

    scanner = null;

    if (!activeScanner) {
        return;
    }

    try {
        await activeScanner.stop();
    } catch (error) {
        console.warn(
            'Gagal menghentikan scanner:',
            error
        );
    }

    try {
        await activeScanner.clear();
    } catch (error) {
        console.warn(
            'Gagal membersihkan scanner:',
            error
        );
    }
}

async function startWithCameraId(cameraId) {

    await stopScanner();

    scanner =
        new window.Html5Qrcode(
            'staffRedemptionQrReader'
        );

    await scanner.start(

        cameraId,

        {
            fps: 10,
            qrbox: {
                width: 230,
                height: 230
            },
            aspectRatio: 1
        },

        async function(decodedText) {

            if (
                !scannerRunning ||
                scanProcessing ||
                scanLocked
            ) {
                return;
            }

            scanProcessing = true;
            scanLocked = true;
            scannerRunning = false;

            showMessage(
                'QR ditemukan. Memeriksa redemption...'
            );

            await stopScanner();

            await lookupRedemption(
                decodedText.trim()
            );
        },

        function() {
            // QR belum terbaca.
        }

    );

    scannerRunning = true;

    showMessage(
        'Arahkan kamera ke QR Redemption customer.'
    );
}

async function startScanner() {

    if (typeof window.Html5Qrcode !== 'function') {

        showMessage(
            'Scanner QR belum tersedia. Jalankan Vite terlebih dahulu.'
        );

        return;
    }

    await stopScanner();

    scanProcessing = false;
    scanLocked = false;

    showMessage(
        'Meminta akses kamera...'
    );

    try {

        scanner = new window.Html5Qrcode(
            'staffRedemptionQrReader'
        );

        await scanner.start(

            {
                facingMode: {
                    ideal: 'environment'
                }
            },

            {
                fps: 10,
                qrbox: {
                    width: 230,
                    height: 230
                },
                aspectRatio: 1
            },

            async function(decodedText) {

                if (
                    !scannerRunning ||
                    scanProcessing ||
                    scanLocked
                ) {
                    return;
                }

                scanProcessing = true;
                scanLocked = true;
                scannerRunning = false;

                showMessage(
                    'QR ditemukan. Memeriksa redemption...'
                );

                await stopScanner();

                await lookupRedemption(
                    decodedText.trim()
                );
            },

            function() {
                // QR belum terbaca.
            }

        );

        scannerRunning = true;

        try {

            cameras =
                await window.Html5Qrcode.getCameras();

        } catch (error) {

            cameras = [];

        }

        currentCameraIndex =
            findBackCameraIndex();

        switchButton.disabled =
            cameras.length < 2;

        showMessage(
            'Arahkan kamera ke QR Redemption customer.'
        );

        return;

    } catch (error) {

        console.warn(
            'Kamera belakang tidak tersedia:',
            error
        );

        await stopScanner();
    }

    try {

        cameras =
            await window.Html5Qrcode.getCameras();

        if (!cameras.length) {

            throw new Error(
                'Tidak ada kamera yang ditemukan.'
            );
        }

        currentCameraIndex =
            findBackCameraIndex();

        switchButton.disabled =
            cameras.length < 2;

        await startWithCameraId(
            cameras[currentCameraIndex].id
        );

    } catch (error) {

        console.error(
            'Camera error:',
            error
        );

        switchButton.disabled = true;

        showMessage(
            'Kamera tidak ditemukan atau izin kamera belum diberikan.'
        );
    }
}


    async function lookupRedemption(redemptionCode) {

        try {

            const response = await fetch(
                '{{ route('staff.redemptions.scan') }}',
                {
                    method: 'POST',

                    headers: {
                        'Content-Type':
                            'application/json',

                        'Accept':
                            'application/json',

                        'X-CSRF-TOKEN':
                            document
                                .querySelector(
                                    'meta[name="csrf-token"]'
                                )
                                ?.getAttribute('content')
                    },

                    body: JSON.stringify({
                        redemption_code:
                            redemptionCode
                    })
                }
            );


            const resultData =
                await response.json();


            if (!response.ok) {

                throw new Error(
                    resultData.message ||
                    'Redemption tidak ditemukan.'
                );
            }


            const data =
                resultData.data;


            customer.textContent =
                data.customer?.nama || '-';

            member.textContent =
                data.customer?.member_code || '-';

            reward.textContent =
                data.reward?.reward_name || '-';

            point.textContent =
                `${data.point_used} Point`;

            code.textContent =
                data.redemption_code || '-';

            status.textContent =
                data.status || '-';

            codeInput.value =
                data.redemption_code || '';


            warning.style.display = 'none';


            if (data.can_confirm) {

                confirmButton.disabled = false;

                confirmButton.style.opacity = '1';

                confirmButton.style.cursor =
                    'pointer';

            } else {

                confirmButton.disabled = true;

                confirmButton.style.opacity = '.5';

                confirmButton.style.cursor =
                    'not-allowed';


                if (data.status !== 'pending') {

                    warning.textContent =
                        'Redemption ini sudah diproses dan tidak dapat dikonfirmasi lagi.';

                } else {

                    warning.textContent =
                        'Redemption ini belum dapat dikonfirmasi karena masih menunggu redemption sebelumnya dari customer tersebut.';
                }

                warning.style.display =
                    'block';
            }


            result.style.display =
                'block';


            showMessage(
                'Redemption berhasil ditemukan.'
            );


        } catch (error) {

            console.error(error);

            result.style.display =
                'none';

            showMessage(
                error.message ||
                'QR Redemption tidak valid.'
            );

           scanProcessing = false;
scanLocked = false;

setTimeout(() => {
    startScanner();
}, 1200);
        }
    }


    openButton.addEventListener(
        'click',
        async () => {

            scannerPanel.style.display =
                'block';

            result.style.display =
                'none';

            scanLocked = false;

            await startScanner();
        }
    );


    switchButton.addEventListener(
    'click',
    async () => {

        if (cameras.length < 2) {

            showMessage(
                'Perangkat ini hanya memiliki satu kamera yang tersedia.'
            );

            return;
        }

        currentCameraIndex =
            (currentCameraIndex + 1) % cameras.length;

        showMessage(
            'Mengganti kamera...'
        );

        try {

            await startWithCameraId(
                cameras[currentCameraIndex].id
            );

        } catch (error) {

            console.error(
                'Camera switch error:',
                error
            );

            showMessage(
                'Gagal mengganti kamera.'
            );
        }
    }
);


    closeButton.addEventListener(
        'click',
        async () => {

            await stopScanner();

            scannerPanel.style.display =
                'none';

            result.style.display =
                'none';

            scanLocked = false;
        }
    );


});
</script>

@endsection