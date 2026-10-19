@extends('layouts.customer')

@section('title', 'Profil - SAÉ CAFE ROJEL')
@section('mobile_title', 'Profil')

@section('content')

<style>
/* =========================================================
   PROFILE PAGE
========================================================= */

.profile-page {
    width: 100%;
    max-width: 1080px;
    margin: 0 auto;
    display: grid;
    gap: 18px;
    box-sizing: border-box;
}

/* =========================================================
   TITLE
========================================================= */

.profile-page-title {
    margin: 0;
    color: #171311;
    font-size: 26px;
    line-height: 1.2;
    font-weight: 600;
    letter-spacing: -0.2px;
}

/* =========================================================
   TOP AREA
   DESKTOP: KARTU KIRI, INFORMASI KANAN
========================================================= */

.profile-top {
    display: grid;
    grid-template-columns: 0.75fr 1.45fr;
    gap: 18px;
    align-items: stretch;
    min-width: 0;
}

/* =========================================================
   PROFILE SUMMARY CARD
========================================================= */

.profile-summary {
    min-width: 0;
    min-height: 300px;
    display: flex;
    flex-direction: column;
    padding: 20px;
    border-radius: 16px;
    background: #4B2D1C;
    color: #FFFFFF;
    box-sizing: border-box;
}

.profile-avatar {
    width: 72px;
    height: 72px;
    display: grid;
    place-items: center;
    flex-shrink: 0;
    border-radius: 50%;
    background: #FFF5EA;
    color: #8B5D37;
    font-size: 27px;
    font-weight: 700;
}

.profile-name {
    margin-top: 18px;
    color: #FFFFFF;
    font-size: 17px;
    line-height: 1.3;
    font-weight: 700;
    overflow-wrap: anywhere;
}

.profile-member-label {
    margin-top: 5px;
    color: #DCCBC0;
    font-size: 10px;
    line-height: 1.3;
}

.profile-member-code {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 6px;
    margin-top: 7px;
    color: #FFFFFF;
    font-size: 12px;
    font-weight: 500;
    line-height: 1.3;
}

.profile-member-code-text {
    font-size: inherit;
    font-weight: inherit;
}

.profile-member-copy {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 22px;
    height: 22px;
    padding: 0;
    border: none;
    border-radius: 4px;
    background: transparent;
    color: #FFFFFF;
    cursor: pointer;
    flex-shrink: 0;
}

.profile-member-copy svg {
    display: block;
    width: 16px;
    height: 16px;
}

.profile-member-copy:hover {
    background: rgba(255, 255, 255, 0.12);
}

.profile-copy-feedback {
    color: #DDF6E8;
    font-size: 9px;
    white-space: nowrap;
}

.profile-summary-divider {
    width: 100%;
    height: 1px;
    flex-shrink: 0;
    margin: 14px 0 18px;
    background: rgba(255, 255, 255, 0.35);
}

.profile-summary-bottom {
    margin-top: auto;
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    align-items: start;
    gap: 12px;
}

.profile-summary-label {
    color: #DCCBC0;
    font-size: 10px;
    line-height: 1.3;
}

.profile-summary-value {
    margin-top: 6px;
    color: #FFFFFF;
    font-size: 13px;
    line-height: 1.3;
    font-weight: 500;
}

.profile-summary-value.point::before {
    content: "★";
    margin-right: 4px;
    color: #F1C87B;
    font-size: 21px;
    vertical-align: -2px;
}

.profile-status {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: fit-content;
    min-width: 45px;
    padding: 4px 9px;
    border-radius: 999px;
    background: #DDF6E8;
    color: #25834A;
    font-size: 9px;
    line-height: 1.3;
    font-weight: 600;
}

/* =========================================================
   ACCOUNT INFORMATION
========================================================= */

.profile-info {
    min-width: 0;
    padding: 20px;
    border: 1px solid #E9DED1;
    border-radius: 16px;
    background: #FFFFFF;
    box-sizing: border-box;
}

.profile-info-title {
    margin: 0 0 14px;
    color: #171311;
    font-size: 17px;
    line-height: 1.3;
    font-weight: 600;
    letter-spacing: -0.2px;
}

.profile-info-list {
    display: grid;
    width: 100%;
    min-width: 0;
}

.profile-info-row {
    display: grid;
    grid-template-columns: 26px minmax(120px, 175px) minmax(0, 1fr);
    align-items: center;
    min-height: 52px;
    gap: 10px;
    border-bottom: 1px solid #EEE4DA;
}

.profile-info-row:last-child {
    border-bottom: 0;
}

.profile-info-icon {
    width: 24px;
    height: 24px;
    display: grid;
    place-items: center;
    color: #4B2D1C;
}

.profile-info-icon svg {
    display: block;
    width: 18px;
    height: 18px;
}

/* DESKTOP: IKON OUTLINE */
.profile-info-icon svg.profile-info-icon-outline {
    display: block;
}

/* Ikon solid hanya ditampilkan di media yang mengaturnya */
.profile-info-icon svg.profile-info-icon-solid {
    display: none;
}

/* DESKTOP: gunakan ikon solid seperti tablet */
@media (min-width: 721px) {
    .profile-info-icon svg.profile-info-icon-outline {
        display: none;
    }

    .profile-info-icon svg.profile-info-icon-solid {
        display: block;
    }
}

.profile-info-label {
    min-width: 0;
    color: #251B16;
    font-size: 11px;
    line-height: 1.3;
    font-weight: 600;
}

.profile-info-value {
    min-width: 0;
    color: #70645D;
    font-size: 10px;
    line-height: 1.3;
    text-align: right;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}

/* =========================================================
   MENU
========================================================= */

.profile-menu-section {
    display: grid;
    gap: 9px;
}

.profile-menu-title {
    margin: 0 0 2px 4px;
    color: #171311;
    font-size: 17px;
    line-height: 1.3;
    font-weight: 600;
    letter-spacing: -0.2px;
}

.profile-menu-list {
    width: 100%;
    overflow: hidden;
    border: 1px solid #E9DED1;
    border-radius: 12px;
    background: #FFFFFF;
    box-sizing: border-box;
}

.profile-menu-item {
    width: 100%;
    min-height: 54px;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 16px;
    border: 0;
    background: #FFFFFF;
    color: #251B16;
    font: inherit;
    font-size: 10px;
    font-weight: 500;
    line-height: 1.3;
    text-align: left;
    text-decoration: none;
    cursor: pointer;
    box-sizing: border-box;
    transition: background-color 0.2s ease;
}

.profile-menu-item + .profile-menu-item {
    border-top: 1px solid #EEE4DA;
}

.profile-menu-item:hover {
    background: #FCF7F1;
}

.profile-menu-icon {
    width: 28px;
    height: 28px;
    display: grid;
    place-items: center;
    flex: 0 0 28px;
    border-radius: 6px;
    background: #4B2D1C;
    color: #FFFFFF;
}

.profile-menu-icon svg {
    width: 18px;
    height: 18px;
}

.profile-menu-arrow {
    margin-left: auto;
    color: #4B2D1C;
    font-size: 20px;
    line-height: 1;
}

.profile-menu-item.logout {
    color: #C12E2E;
}

.profile-menu-item.logout .profile-menu-icon {
    background: #4B2D1C;
    color: #FFFFFF;
}

/* =========================================================
   RESPONSIVE - TABLET
========================================================= */
@media (min-width: 561px) and (max-width: 720px) {

    /* HALAMAN */
    .profile-page {
        width: 100%;
        max-width: 100%;
        gap: 16px;
    }

    .profile-page-title {
        font-size: 24px;
        line-height: 1.2;
        margin-left: 16px;
    }

    /* AREA PROFIL DAN INFORMASI AKUN */
    .profile-top {
        display: grid;
        grid-template-columns: minmax(0, 1fr);
        align-items: stretch;
        gap: 22px;
        width: 100%;
        min-width: 0;
    }

    /* =========================
       KARTU COKELAT
    ========================= */
    .profile-summary {
        display: grid;
        grid-template-columns: 76px minmax(0, 1fr);
        align-content: start;
        column-gap: 12px;

        width: calc(100% - 18px);
        min-width: 0;
        min-height: 165px;

        margin-left: auto;
        margin-right: auto;

        padding: 16px 14px 12px;
        border-radius: 16px;
    }

    .profile-avatar {
        grid-column: 1;
        grid-row: 1 / 4;
        position: relative;
        left: 3px;
        width: 76px;
        height: 76px;
        flex: 0 0 76px;
        overflow: hidden;
        border-radius: 50%;
        font-size: 0;
        background: #F7F1E8;
        color: #C39168;
    }

    .profile-avatar::before {
        content: "";
        position: absolute;
        top: 16px;
        left: 28px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #C39168;
    }

    .profile-avatar::after {
        content: "";
        position: absolute;
        bottom: 9px;
        left: 19px;
        width: 38px;
        height: 25px;
        border-radius: 20px 20px 2px 2px;
        background: #C39168;
    }

    .profile-name {
        grid-column: 2;
        grid-row: 1;
        margin: 7px 0 3px;
        font-size: 15px;
        line-height: 1.3;
        font-weight: 700;
        position: relative;
        top: 6px;
        left: 6px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .profile-member-label {
        grid-column: 2;
        grid-row: 2;
        margin: 0;
        font-size: 10px;
        line-height: 1.2;
        position: relative;
        top: 4px;
        left: 6px;
    }

    .profile-member-code {
        grid-column: 2;
        grid-row: 3;
        display: flex;
        align-items: center;
        gap: 8px;
        margin: 5px 0 0;
        font-size: 11px;
        line-height: 1.2;
        font-weight: normal;
        position: relative;
        top: -3px;
        left: 6px;
    }

    /* TOMBOL SALIN MEMBER ID */
    .profile-member-code-text {
        font-size: inherit;
        font-weight: inherit;
    }

    .profile-member-copy {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 22px;
        height: 22px;
        padding: 0;
        border: none;
        background: transparent;
        color: #FFFFFF;
        cursor: pointer;
        flex-shrink: 0;
    }

    .profile-member-copy svg {
        width: 16px;
        height: 16px;
    }

    .profile-copy-feedback {
        color: #DDF6E8;
        font-size: 9px;
        white-space: nowrap;
    }

    .profile-summary-divider {
        grid-column: 1 / -1;
        width: calc(100% - 10px);
        height: 1px;
        margin: 21px auto 8px;
        box-sizing: border-box;
        position: relative;
        left: 2px;
    }

    .profile-summary-bottom {
        grid-column: 1 / -1;
        margin-top: 0;
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
        gap: 12px;
    }

    .profile-summary-label {
        font-size: 9px;
        line-height: 1.3;
    }

    .profile-summary-value {
        margin-top: 4px;
        font-size: 12px;
        line-height: 1.3;
        font-weight: normal;
    }

    .profile-summary-value.point {
        position: relative;
        left: 6px;
        top: -4px;
    }

    .profile-summary-value.point::before {
        margin-right: 3px;
        font-size: 22px;
        vertical-align: -2px;
    }

    .profile-status {
        min-width: 42px;
        padding: 4px 8px;
        font-size: 8px;
    }

    /* =========================
       INFORMASI AKUN
    ========================= */
    .profile-info {
        width: 100%;
        min-width: 0;
        padding: 0;
        border: 0;
        border-radius: 0;
        background: transparent;
    }

    .profile-info-title {
        margin: 0 0 8px 16px;
        font-size: 14px;
        line-height: 1.2;
        font-weight: 600;
        letter-spacing: -0.2px;
    }

    .profile-info-list {
        width: calc(100% - 12px);
        margin-left: auto;
        margin-right: auto;
        box-sizing: border-box;
        padding: 0 10px;
        border: 1px solid #E9DED1;
        border-radius: 13px;
        background: #FFFFFF;
    }

    .profile-info-row {
        display: grid;
        grid-template-columns: 25px minmax(0, 1fr) minmax(0, 150px);
        align-items: center;
        gap: 5px;
        min-height: 49px;
        border-bottom: 1px solid #EEE4DA;
    }

    .profile-info-row:last-child {
        border-bottom: 0;
    }

    .profile-info-icon {
        width: 24px;
        height: 24px;
        display: grid;
        place-items: center;
        color: #4B2D1C;
    }

    .profile-info-icon svg {
        width: 18px;
        height: 18px;
    }

    /* TABLET: gunakan ikon solid seperti mobile */
    .profile-info-icon svg.profile-info-icon-outline {
        display: none;
    }

    .profile-info-icon svg.profile-info-icon-solid {
        display: block;
    }

    .profile-info-row .profile-info-label {
        min-width: 0;
        font-size: 10px;
        line-height: 1.3;
        font-weight: 600;
        position: relative;
        left: 9px;
    }

    .profile-info-row .profile-info-value {
        min-width: 0;
        font-size: 9px;
        line-height: 1.3;
        text-align: right;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        position: relative;
        right: 4px;
    }

    /* =========================
       MENU
    ========================= */
    .profile-menu-section {
        display: grid;
        gap: 7px;
    }

    .profile-menu-title {
        margin: 6px 0 8px 12px;
        font-size: 14px;
        line-height: 1.2;
        font-weight: 600;
        letter-spacing: -0.2px;
    }

    .profile-menu-list {
        width: calc(100% - 18px);
        margin-left: auto;
        margin-right: auto;
        box-sizing: border-box;
        position: relative;
        top: -8px;
        overflow: hidden;
        border: 1px solid #E9DED1;
        border-radius: 9px;
        background: #FFFFFF;
    }

   .profile-menu-item {
    width: 100%;
    min-height: 62px;
    display: flex;
    align-items: center;
    gap: 9px;
    padding: 10px;
    font-size: 10px;
    line-height: 1.3;
}

    .profile-menu-icon {
        width: 28px;
        height: 28px;
        flex: 0 0 28px;
        display: grid;
        place-items: center;
        border-radius: 6px;
        background: #4B2D1C;
    }

    .profile-menu-icon svg {
        width: 18px;
        height: 18px;
    }

    .profile-menu-arrow {
        margin-left: auto;
        font-size: 20px;
    }
}










/* =========================================================
   RESPONSIVE - MOBILE
========================================================= */
@media (max-width: 560px) {

    /* HALAMAN */
    .profile-page {
        gap: 13px;
    }

    .profile-page-title {
    font-size: 20px;
    line-height: 1.2;
    margin-left: 16px;
}

  .profile-top {
    grid-template-columns: minmax(0, 1fr);
    gap: 22px;
}

.profile-summary {
    display: grid;
    grid-template-columns: 64px minmax(0, 1fr);
    align-content: start;
    column-gap: 10px;

    width: calc(100% - 18px);
    min-width: 0;
    min-height: 145px;

    margin-left: auto;
    margin-right: auto;

    padding: 12px 11px 8px;
    border-radius: 16px;
}
/* LINGKARAN FOTO PROFIL */
.profile-avatar {
    grid-column: 1;
    grid-row: 1 / 4;
    position: relative;
    left: 3px;
    width: 68px;
    height: 68px;
    flex: 0 0 68px;
    overflow: hidden;
    border-radius: 50%;
    font-size: 0;
    background: #F7F1E8;
    color: #C39168;
}

/* KEPALA IKON ORANG */
.profile-avatar::before {
    content: "";
    position: absolute;
    top: 13px;
    left: 25px;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background: #C39168;
}

/* BADAN IKON ORANG */
.profile-avatar::after {
    content: "";
    position: absolute;
    bottom: 10px;
    left: 17px;
    width: 34px;
    height: 22px;
    border-radius: 17px 17px 2px 2px;
    background: #C39168;
}

   .profile-name {
    grid-column: 2;
    grid-row: 1;
    margin: 7px 0 3px;
    font-size: 12px;
    line-height: 1.2;
    font-weight: 700;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    position: relative;
    top: 6px;
    left: 6px;
}

    

   .profile-member-label {
    grid-column: 2;
    grid-row: 2;
    margin: 0;
    font-size: 8px;
    line-height: 1.2;
    position: relative;
    top: 4px;
     left: 6px;
}

.profile-member-code {
    grid-column: 2;
    grid-row: 3;
    margin: 5px 0 0;
    font-size: 10px;
    line-height: 1.2;
    font-weight: normal;
    position: relative;
    top: -3px;
     left: 6px;
}

.profile-summary-divider {
    grid-column: 1 / -1;
    width: calc(100% - 10px);
    height: 1px;
    margin: 21px auto 8px;
    box-sizing: border-box;
    position: relative;
    left: 2px;
}

.profile-summary-bottom {
    grid-column: 1 / -1;
    margin-top: 0;
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    gap: 8px;
    align-items: start;
}

/* STATUS MEMBER */
.profile-summary-bottom > :nth-child(2) {
    display: block;
}

/* Turunkan tulisan Status Member */
.profile-summary-bottom > :nth-child(2) .profile-summary-label {
    position: relative;
    top: 6px;
}

/* Naikkan badge Aktif */
.profile-summary-bottom > :nth-child(2) > div:last-child {
    position: relative;
    top: -4px;
}

    .profile-summary-label {
        font-size: 7px;
        line-height: 1.3;
    }

    .profile-summary-value {
    margin-top: 4px;
    font-size: 10px;
    line-height: 1.3;
    font-weight: normal;
}

.profile-summary-value.point {
    position: relative;
    left: 6px;
    top: -4px;
}

    .profile-summary-value.point::before {
        margin-right: 3px;
        font-size: 21px;
        vertical-align: -2px;
    
    }

    .profile-status {
        min-width: 37px;
        padding: 3px 7px;
        font-size: 7px;
    }

    /* =========================
       INFORMASI AKUN
    ========================= */
    .profile-info {
        min-width: 0;
        padding: 0;
        border: 0;
        border-radius: 0;
        background: transparent;
    }

.profile-info-title {
    margin: 0 0 8px 12px;
    font-size: 10px;
    line-height: 1.2;
}

    .profile-info-list {
    width: calc(100% - 12px);
    margin-left: auto;
    margin-right: auto;
    box-sizing: border-box;

    padding: 0 8px;
    border: 1px solid #E9DED1;
    border-radius: 13px;
    background: #FFFFFF;
}

   .profile-info-row {
    display: grid;
    grid-template-columns: 25px minmax(0, 1fr) minmax(0, 105px);
    align-items: center;
    gap: 5px;
    min-height: 39px;
    border-bottom: 1px solid #EEE4DA;
}
.profile-info-list .profile-info-row {
    min-height: 44px;
}

    .profile-info-row:last-child {
        border-bottom: 0;
    }

 .profile-info-icon {
    width: 24px;
    height: 24px;
}

.profile-info-icon svg {
    width: 18px;
    height: 18px;
}

/* MOBILE: gunakan ikon solid */
.profile-info-icon svg.profile-info-icon-outline {
    display: none;
}

.profile-info-icon svg.profile-info-icon-solid {
    display: block;
}

.profile-info-row .profile-info-label {
    min-width: 0;
    font-size: 9px !important;
    line-height: 1.3;
    font-weight: 600;
    position: relative;
    left: 9px;
}

   .profile-info-row .profile-info-value {
    min-width: 0;
    font-size: 7.2px !important;
    line-height: 1.3;
    text-align: right;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    position: relative;
    right: 4px;
}

    /* =========================
       MENU
    ========================= */
  /* =========================
   MENU - MOBILE
========================= */

.profile-menu-section {
    display: grid;
    gap: 7px;
}

.profile-menu-title {
    margin: 6px 0 8px 12px;
    font-size: 10px;
    line-height: 1.2;
    font-weight: 700;
}

.profile-menu-list {
    width: calc(100% - 18px);
    margin-left: auto;
    margin-right: auto;
    box-sizing: border-box;

    position: relative;
    top: -8px;

    overflow: hidden;
    border: 1px solid #E9DED1;
    border-radius: 9px;
    background: #FFFFFF;
}

.profile-menu-item {
    width: 100%;
    min-height: 54px;

    display: flex;
    align-items: center;
    gap: 9px;

    padding: 10px;
    font-size: 8px;
    line-height: 1.3;
}

.profile-menu-icon {
    width: 28px;
    height: 28px;
    flex: 0 0 28px;

    display: grid;
    place-items: center;

    border-radius: 6px;
    background: #4B2D1C;
}

.profile-menu-icon svg {
    width: 18px;
    height: 18px;
}

.profile-menu-arrow {
    margin-left: auto;
    font-size: 18px;
}
}

/* =========================================================
   RESPONSIVE - SMALL MOBILE
========================================================= */
@media (max-width: 380px) {

    /* HALAMAN */
    .profile-page {
        gap: 12px;
    }

    .profile-page-title {
        font-size: 19px;
        margin-left: 14px;
    }

    .profile-top {
        grid-template-columns: minmax(0, 1fr);
        gap: 18px;
    }

    /* =========================
       SUMMARY / KARTU COKELAT
    ========================= */
    .profile-summary {
        grid-template-columns: 64px minmax(0, 1fr);
        column-gap: 8px;
        width: calc(100% - 14px);
        min-width: 0;
        min-height: 140px;
        padding: 11px 9px 8px;
        margin-left: auto;
        margin-right: auto;
        box-sizing: border-box;
    }

    /* LINGKARAN FOTO */
    .profile-avatar {
        left: 2px;
        width: 64px;
        height: 64px;
        flex: 0 0 64px;
    }

    .profile-avatar::before {
        top: 12px;
        left: 23px;
        width: 18px;
        height: 18px;
    }

    .profile-avatar::after {
        bottom: 8px;
        left: 15px;
        width: 34px;
        height: 22px;
    }

    /* NAMA MEMBER */
    .profile-name {
        font-size: 11px;
        top: 5px;
        left: 5px;
    }

    .profile-member-label {
        font-size: 8px;
        top: 3px;
        left: 5px;
    }

    .profile-member-code {
        font-size: 9px;
        left: 5px;
    }

    /* GARIS KARTU */
    .profile-summary-divider {
        width: calc(100% - 10px);
        margin: 19px auto 8px;
        left: 2px;
    }

    /* POIN */
    .profile-summary-value {
        font-size: 9px;
    }

    .profile-summary-value.point {
        left: 5px;
        top: -3px;
    }

    .profile-summary-value.point::before {
        font-size: 20px;
    }

    /* =========================
       INFORMASI AKUN
    ========================= */
    .profile-info {
        min-width: 0;
    }

    .profile-info-title {
        margin: 0 0 8px 12px;
        font-size: 10px;
        letter-spacing: -0.2px;
    }

    .profile-info-list {
        width: calc(100% - 12px);
        margin-left: auto;
        margin-right: auto;
        padding: 0 6px;
        box-sizing: border-box;
    }

    .profile-info-row {
        grid-template-columns: 24px minmax(0, 1fr) minmax(0, 90px);
        gap: 4px;
        min-height: 42px;
    }

    .profile-info-list .profile-info-row {
        min-height: 42px;
    }

    .profile-info-icon {
        width: 22px;
        height: 22px;
    }

    .profile-info-icon svg {
        width: 17px;
        height: 17px;
    }

    .profile-info-row .profile-info-label {
        min-width: 0;
        font-size: 8px !important;
        line-height: 1.3;
        font-weight: 600;
        left: 7px;
    }

    .profile-info-row .profile-info-value {
        min-width: 0;
        font-size: 7px !important;
        line-height: 1.3;
        text-align: right;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        right: 3px;
    }

    /* =========================
       MENU
    ========================= */
    .profile-menu-section {
        gap: 7px;
    }

    .profile-menu-title {
        margin: 6px 0 8px 12px;
        font-size: 10px;
        font-weight: 600;
        letter-spacing: -0.2px;
    }

    .profile-menu-list {
        width: calc(100% - 18px);
        margin-left: auto;
        margin-right: auto;
        top: -6px;
    }

    .profile-menu-item {
        min-height: 50px;
        gap: 8px;
        padding: 8px;
        font-size: 7px;
    }

    .profile-menu-icon {
        width: 26px;
        height: 26px;
        flex: 0 0 26px;
    }

    .profile-menu-icon svg {
        width: 16px;
        height: 16px;
    }

    .profile-menu-arrow {
        font-size: 17px;
    }
}

</style>


<div class="profile-page">


    {{-- =====================================================
         TITLE
    ====================================================== --}}

    <h1 class="profile-page-title">
        Profil
    </h1>


    {{-- =====================================================
         TOP
    ====================================================== --}}

    <div class="profile-top">


        {{-- =================================================
             PROFILE SUMMARY
        ================================================== --}}

        <section class="profile-summary">

            <div class="profile-avatar">
                {{ strtoupper(substr($customer->nama ?? 'C', 0, 1)) }}
            </div>


            <div class="profile-name">
                {{ $customer->nama ?? 'Customer' }}
            </div>


            <div class="profile-member-label">
                Member ID
            </div>


           <div class="profile-member-code">

    <span class="profile-member-code-text">
        {{ $customer->member_code ?? '-' }}
    </span>

    <button
        type="button"
        class="profile-member-copy"
        data-member-code="{{ $customer->member_code ?? '' }}"
        aria-label="Salin Member ID"
        title="Salin Member ID">

        <svg viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="1.8"
             stroke-linecap="round"
             stroke-linejoin="round"
             aria-hidden="true">
            <rect x="8" y="8" width="12" height="13" rx="1.5"></rect>
            <path d="M16 8V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h3"></path>
        </svg>

    </button>

    <span class="profile-copy-feedback" aria-live="polite"></span>

</div>


            <div class="profile-summary-divider"></div>


            <div class="profile-summary-bottom">

                <div>

                  
                    <div class="profile-summary-value point">
                        {{ number_format(
                            (int) ($customer->saldo_point ?? 0),
                            0,
                            ',',
                            '.'
                        ) }}
                        Point
                    </div>

                </div>


                <div>

                    <div class="profile-summary-label">
                        Status Member
                    </div>

                    <div style="margin-top:6px">
                        <span class="profile-status">
                            Aktif
                        </span>
                    </div>

                </div>

            </div>

        </section>


        {{-- =================================================
             ACCOUNT INFORMATION
        ================================================== --}}

        <section class="profile-info">

            <h2 class="profile-info-title">
                Informasi Akun
            </h2>


            <div class="profile-info-list">


                {{-- NAMA --}}
<div class="profile-info-row">

    <div class="profile-info-icon">

        <!-- Ikon outline untuk desktop dan tablet -->
        <svg class="profile-info-icon-outline"
             viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="1.8"
             stroke-linecap="round"
             stroke-linejoin="round">
            <circle cx="12" cy="8" r="3"></circle>
            <path d="M5 20c.8-3.3 3.1-5 7-5s6.2 1.7 7 5"></path>
        </svg>

        <!-- Ikon solid untuk mobile -->
        <svg class="profile-info-icon-solid"
             viewBox="0 0 24 24"
             fill="currentColor"
             aria-hidden="true">
            <path d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z"/>
            <path d="M4 20c0-3.4 3.6-6 8-6s8 2.6 8 6v1H4z"/>
        </svg>

    </div>

    <div class="profile-info-label">
        Nama Lengkap
    </div>

    <div class="profile-info-value">
        {{ $customer->nama ?? '-' }}
    </div>

</div>

{{-- NO HP --}}

<div class="profile-info-row">

    <div class="profile-info-icon">

        <!-- Ikon outline untuk desktop dan tablet -->
        <svg class="profile-info-icon-outline"
             viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="1.8"
             stroke-linecap="round"
             stroke-linejoin="round">
            <path d="M6.5 3.5l3 3-2 2c1.2 2.8 3.2 4.8 6 6l2-2 3 3-1.7 2.1c-.7.9-2 1.2-3 .8C8.5 16 5 12.5 3.6 7.2c-.4-1 .0-2.3.8-3z">
            </path>
        </svg>

        <!-- Ikon solid untuk mobile -->
        <svg class="profile-info-icon-solid"
             viewBox="0 0 24 24"
             fill="currentColor"
             aria-hidden="true">
            <path d="M6.6 2.8a2 2 0 0 0-2.1.5L3 4.8c-.7.7-.9 1.8-.6 2.8a21.6 21.6 0 0 0 14 14c1 .3 2.1.1 2.8-.6l1.5-1.5a2 2 0 0 0-.1-2.9l-3-2.6a2 2 0 0 0-2.5 0l-1.7 1.4a16 16 0 0 1-4.8-4.8L10 8.9a2 2 0 0 0 0-2.5z"/>
        </svg>

    </div>

    <div class="profile-info-label">
        No. Hp
    </div>

    <div class="profile-info-value">
        {{ $customer->nomor_hp ?? '-' }}
    </div>

</div>

                
              {{-- EMAIL --}}

<div class="profile-info-row">

    <div class="profile-info-icon">

        <!-- Ikon outline untuk desktop dan tablet -->
        <svg class="profile-info-icon-outline"
             viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="1.8"
             stroke-linecap="round"
             stroke-linejoin="round">
            <rect x="3" y="5" width="18" height="14" rx="2"></rect>
            <path d="M3 7l9 6 9-6"></path>
        </svg>

        <!-- Ikon solid untuk mobile -->
        <svg class="profile-info-icon-solid"
             viewBox="0 0 24 24"
             fill="currentColor"
             aria-hidden="true">
            <path d="M3 5h18a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z"/>
            <path d="m2 7 10 7 10-7"
                  fill="none"
                  stroke="#FFFFFF"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>

    </div>

    <div class="profile-info-label">
        Email
    </div>

    <div class="profile-info-value">
        {{ $customer->email ?? '-' }}
    </div>

</div>

              {{-- TANGGAL LAHIR --}}

<div class="profile-info-row">

    <div class="profile-info-icon">

        <!-- Ikon outline untuk desktop dan tablet -->
        <svg class="profile-info-icon-outline"
             viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="1.8"
             stroke-linecap="round"
             stroke-linejoin="round">
            <rect x="4" y="5" width="16" height="15" rx="2"></rect>
            <path d="M8 3v4"></path>
            <path d="M16 3v4"></path>
            <path d="M4 9h16"></path>
        </svg>

        <!-- Ikon kalender solid untuk mobile -->
        <svg class="profile-info-icon-solid"
             viewBox="0 0 24 24"
             fill="currentColor"
             aria-hidden="true">
            <path d="M7 2h2v3h6V2h2v3h2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h2V2Z"/>
            <path d="M3 9h18" fill="none"
                  stroke="#FFFFFF"
                  stroke-width="1.5"/>
            <path d="M7 12h2v2H7zm4 0h2v2h-2zm4 0h2v2h-2zM7 16h2v2H7zm4 0h2v2h-2z"
                  fill="#FFFFFF"/>
        </svg>

    </div>

    <div class="profile-info-label">
        Tanggal Lahir
    </div>

    <div class="profile-info-value">
        {{ !empty($customer->tanggal_lahir)
            ? \Carbon\Carbon::parse(
                $customer->tanggal_lahir
            )->format('d F Y')
            : '-'
        }}
    </div>

</div>


           {{-- TANGGAL BERGABUNG --}}

<div class="profile-info-row">

    <div class="profile-info-icon">

        <!-- Ikon outline untuk desktop dan tablet -->
        <svg class="profile-info-icon-outline"
             viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="1.8"
             stroke-linecap="round"
             stroke-linejoin="round">
            <rect x="4" y="5" width="16" height="15" rx="2"></rect>
            <path d="M8 3v4"></path>
            <path d="M16 3v4"></path>
            <path d="M4 9h16"></path>
        </svg>

        <!-- Ikon kalender solid untuk mobile -->
        <svg class="profile-info-icon-solid"
             viewBox="0 0 24 24"
             fill="currentColor"
             aria-hidden="true">
            <path d="M7 2h2v3h6V2h2v3h2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h2V2Z"/>
            <path d="M3 9h18"
                  fill="none"
                  stroke="#FFFFFF"
                  stroke-width="1.5"/>
            <path d="M7 12h2v2H7zm4 0h2v2h-2zm4 0h2v2h-2zM7 16h2v2H7zm4 0h2v2h-2z"
                  fill="#FFFFFF"/>
        </svg>

    </div>

    <div class="profile-info-label">
        Tanggal Bergabung
    </div>

    <div class="profile-info-value">
        {{ !empty($customer->tanggal_daftar)
            ? \Carbon\Carbon::parse(
                $customer->tanggal_daftar
            )->format('d F Y')
            : '-'
        }}
    </div>

</div>


        </section>

    </div>


    {{-- =====================================================
         MENU
    ====================================================== --}}

    <section class="profile-menu-section">

        <h2 class="profile-menu-title">
            Menu
        </h2>


        <div class="profile-menu-list">



            {{-- RIWAYAT POINT --}}

            <a href="{{ route('customer.transaction') }}" class="profile-menu-item">

                <span class="profile-menu-icon">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M6 3h12"></path>
                        <path d="M6 21h12"></path>
                        <path d="M8 3v4"></path>
                        <path d="M16 3v4"></path>
                        <rect x="7" y="7" width="10" height="10" rx="1"></rect>
                        <path d="M10 11h4"></path>
                        <path d="M10 14h3"></path>
                    </svg>

                </span>

                <span>
                    Riwayat Point
                </span>

                <span class="profile-menu-arrow">
                    ›
                </span>

            </a>


            {{-- RIWAYAT REDEEM --}}

            <a href="{{ route('customer.reward') }}?tab=history" class="profile-menu-item">

                <span class="profile-menu-icon">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M20 12v8a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-8"></path>
                        <path d="M2 7h20v5H2z"></path>
                        <path d="M12 7v14"></path>
                        <path d="M12 7H7.5a2.5 2.5 0 1 1 0-5C10 2 12 7 12 7Z"></path>
                        <path d="M12 7h4.5a2.5 2.5 0 1 0 0-5C14 2 12 7 12 7Z"></path>
                    </svg>

                </span>

                <span>
                    Riwayat Penukaran
                </span>

                <span class="profile-menu-arrow">
                    ›
                </span>

            </a>


                      {{-- LOGOUT --}}

            <button type="button" class="profile-menu-item logout" id="profileLogoutButton">
                <span class="profile-menu-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10 17l5-5-5-5"></path>
                        <path d="M15 12H3"></path>
                        <path d="M21 4v16"></path>
                    </svg>
                </span>

                <span>
                    Keluar
                </span>

                <span class="profile-menu-arrow">
                    ›
                </span>
            </button>

        </div>

    </section>

</div>

{{-- JAVASCRIPT SALIN MEMBER ID --}}
<script>
document.addEventListener('click', async function (event) {
    const button = event.target.closest('.profile-member-copy');

    if (!button) {
        return;
    }

    const code = button.dataset.memberCode;
    const feedback = button.parentElement.querySelector('.profile-copy-feedback');

    if (!code) {
        if (feedback) feedback.textContent = 'Kode kosong';
        return;
    }

    try {
        if (navigator.clipboard && window.isSecureContext) {
            await navigator.clipboard.writeText(code);
        } else {
            const textarea = document.createElement('textarea');
            textarea.value = code;
            textarea.setAttribute('readonly', '');
            textarea.style.position = 'fixed';
            textarea.style.left = '-9999px';

            document.body.appendChild(textarea);
            textarea.select();

            const copied = document.execCommand('copy');
            textarea.remove();

            if (!copied) {
                throw new Error('Gagal menyalin kode');
            }
        }

        if (feedback) {
            feedback.textContent = 'Tersalin!';
            setTimeout(function () {
                feedback.textContent = '';
            }, 1500);
        }
    } catch (error) {
        if (feedback) {
            feedback.textContent = 'Gagal menyalin';
        }
    }
});
</script>


<script>
(function () {
    const UPDATE_INTERVAL = 3000;
    let isRefreshing = false;

    async function refreshProfilePage() {
        if (document.hidden || isRefreshing) {
            return;
        }

        const currentProfile = document.querySelector('.profile-page');

        if (!currentProfile) {
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

            // Jangan mengganti halaman jika sesi login berakhir.
            if (!response.ok || response.redirected) {
                return;
            }

            const html = await response.text();

            const parsedDocument = new DOMParser().parseFromString(
                html,
                'text/html'
            );

            const latestProfile = parsedDocument.querySelector(
                '.profile-page'
            );

            if (!latestProfile) {
                return;
            }

            // Perbarui tampilan hanya ketika data berubah.
            if (currentProfile.innerHTML !== latestProfile.innerHTML) {
                currentProfile.replaceWith(
                    latestProfile.cloneNode(true)
                );
            }

        } catch (error) {
            console.warn(
                'Pembaruan otomatis Profil gagal:',
                error
            );
        } finally {
            isRefreshing = false;
        }
    }

    const refreshTimer = setInterval(
        refreshProfilePage,
        UPDATE_INTERVAL
    );

    // Perbarui segera ketika pengguna kembali ke tab Profil.
    document.addEventListener('visibilitychange', function () {
        if (!document.hidden) {
            refreshProfilePage();
        }
    });

    // Hentikan timer ketika halaman ditinggalkan.
    window.addEventListener('pagehide', function () {
        clearInterval(refreshTimer);
    });
})();
</script>


@endsection