@extends('main')

@push('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Pemuatan CSS DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

{{-- sweetalert2 --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark/dark.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .button-container {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap; /* Responsif: Card akan rapat di layar kecil */
        margin-top: 11%;
    }

    .button-container .card-button {
        background-color: #0d1136;
        color: white;
        width: 300px;
        height: 70px; /* Tinggi default */
        border-radius: 10px;
        position: relative;
        overflow: hidden;
        text-align: left;
        transition: all 0.3s ease; /* Efek animasi lebih halus */
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
    }

    .button-container .card-button:hover {
        height: 200px; /* Meningkatkan tinggi saat hover */
        transform: translateY(-65%); /* Membuat card bergerak ke atas */
        background-color: #ffc107;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        margin-bottom: -100px;
    }

    .button-container .header {
        align-items: center;
        gap: 10px;
        padding: 15px;
        z-index: 10;
    }

    .button-container .header-content {
        display: flex;
        justify-content: center;
        margin: 3%;
    }

    .button-container .icon {
        font-size: 30px;
        color: #ffc107;
    }

    .button-container h3 {
        font-size: 18px;
        font-weight: bold;
        margin: 0;
    }

    .button-container .content {
        opacity: 0; /* Konten tersembunyi */
        transform: translateY(0);
        transition: opacity 0.4s ease, transform 0.4s ease;
        padding: 20px;
    }

    .card-button:hover .content {
        opacity: 1;
        transform: translateY(-100%); /* Tidak ada efek tambahan */
    }

    .card-button .description {
        text-align: center;
        opacity: 0;
    }

    .card-button:hover .description {
        opacity: 1;
    }

    .button-container .button-link {
        text-decoration: none;
        color: #0d1136;
        font-weight: bold;
    }

    @media (max-width: 768px) {
        .card-button {
            width: 100%; /* Menggunakan lebar penuh pada layar kecil */
            margin-bottom: 20px;
        }
    }

    /* slide 1 */
    #slide_1 .judul-utama-slide-1 {
        font-size: 46px;
    }

    #slide_1 .judul-slide-1 {
        font-size: 35px;
        margin-top: 5%;
        /* margin-bottom: 30%; */
    }

    @media (max-width: 768px) {
        #slide_1 .judul-slide-1 {
            font-size: 25px;
        }
    }


    /* slide 2 */

    #slide_2 .slides-form select, #slide_2 .slides-form textarea {
        margin: 5px !important;
    }

    /* sweetalert custome css */
    .custom-swal-popup {
        font-size: 18px;
        width: 600px !important;
        max-width: 90% !important;
    }

    /* slide 3 */
    /* Tabel dan header */
    #slide_3 .judul-slide-3 {
        font-size: 35px;
    }
    
    table.table {
        width: 100%;
        border-collapse: collapse;
    }

    table.table thead tr {
        background-color: rgba(255, 255, 255, 0.5); /* putih transparan */
        color: #000; /* warna teks hitam pada header */
        font-size: 24px;
    }

    /* Baris pada body tabel */
    table.table tbody tr {
        background-color: rgba(169, 169, 169, 0.5); /* abu-abu transparan */ 
        font-size: 22px;
    }

    table.table td {
        padding: 8px;
        text-align: left;
    }

    /* Latar belakang pada kolom pencarian */
    .dataTables_filter {
        background-color: rgba(169, 169, 169, 0.5); /* Warna abu-abu transparan */
        color: #000; /* Warna teks */
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    /* Latar belakang pada dropdown Show Entries */
    .dataTables_length {
        background-color: rgba(169, 169, 169, 0.5); /* Warna abu-abu transparan */
        color: #000; /* Warna teks */
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    /* Latar belakang pada pagination (seperti sebelumnya) */
    .dataTables_paginate {
        background-color: rgba(169, 169, 169, 0.5); /* Warna abu-abu transparan */
        padding: 5px;
        border-radius: 4px;
    }

    .dataTables_paginate a {
        background-color: rgba(169, 169, 169, 0.5); /* Warna abu-abu transparan */
        padding: 5px 10px;
        border-radius: 4px;
        color: #000;
        text-decoration: none;
    }

    .dataTables_paginate a:hover {
        background-color: rgba(169, 169, 169, 0.7); /* Warna saat hover */
    }

    @media (max-width: 768px) {
        #slide_2 .slides-form select, #slide_2 .slides-form textarea {
            margin: 0 !important;
        }

        /* slide 3 */
        table.table thead tr {
            font-size: 18px;
        }

        table.table tbody tr {
            font-size: 16px;
        }

        #slide_3 .judul-slide-3 {
            font-size: 25px;
        }
    }
</style>
@endpush

@section('content')
<!-- Slide 1 (#09) -->
  <section id="slide_1" class="slide fade-6 kenBurns">
    <div class="content">
      <div class="container">
        <div class="wrap">
          <div class="fix-12">
            <img class="ae-1" src="{{ asset('./images/logo_sumutprov_baru.png') }}" alt="" width="100">
            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="328.000000pt" height="76.000000pt" viewBox="0 0 2698.000000 156.000000"
            preserveAspectRatio="xMidYMid meet" class="wide ae-2 fromCenter">

                <g transform="translate(0.000000,156.000000) scale(0.100000,-0.100000)"
                fill="white" stroke="none">
                <path d="M4087 1176 c-133 -49 -195 -159 -153 -269 23 -61 57 -90 171 -143 55
                -25 108 -53 118 -62 24 -21 21 -64 -6 -90 -45 -43 -111 -17 -124 48 l-5 30
                -96 0 -95 0 6 -49 c16 -133 114 -211 267 -211 174 0 279 109 256 264 -11 69
                -57 114 -179 174 -57 27 -111 58 -120 67 -36 36 -6 95 49 95 24 0 54 -29 54
                -53 0 -15 13 -17 96 -17 l97 0 -5 45 c-12 101 -104 175 -227 182 -41 2 -80 -2
                -104 -11z"/>
                <path d="M6616 1180 c-160 -41 -282 -182 -294 -340 -11 -163 76 -303 234 -377
                52 -25 71 -28 159 -28 92 0 106 3 167 32 137 65 217 177 226 318 l5 75 -222 0
                -221 0 0 -75 0 -75 110 0 c61 0 110 -4 110 -9 0 -19 -55 -74 -87 -87 -46 -20
                -130 -17 -179 5 -90 41 -134 153 -104 263 39 141 242 187 334 77 24 -29 26
                -29 130 -29 58 0 106 3 106 8 0 4 -13 30 -29 57 -65 113 -187 185 -324 191
                -45 2 -99 -1 -121 -6z"/>
                <path d="M7677 1176 c-133 -49 -195 -159 -153 -269 23 -61 57 -90 171 -143 55
                -25 108 -53 118 -62 24 -21 21 -64 -6 -90 -45 -43 -111 -17 -124 48 l-5 30
                -96 0 -95 0 6 -49 c16 -133 114 -211 267 -211 174 0 279 109 256 264 -11 69
                -57 114 -179 174 -57 27 -111 58 -120 67 -36 36 -6 95 49 95 24 0 54 -29 54
                -53 0 -15 13 -17 96 -17 l97 0 -5 45 c-12 101 -104 175 -227 182 -41 2 -80 -2
                -104 -11z"/>
                <path d="M10167 1176 c-133 -49 -195 -159 -153 -269 23 -61 57 -90 171 -143
                55 -25 108 -53 118 -62 24 -21 21 -64 -6 -90 -45 -43 -111 -17 -124 48 l-5 30
                -96 0 -95 0 6 -49 c16 -133 114 -211 267 -211 174 0 279 109 256 264 -11 69
                -57 114 -179 174 -57 27 -111 58 -120 67 -36 36 -6 95 49 95 24 0 54 -29 54
                -53 0 -15 13 -17 96 -17 l97 0 -5 45 c-12 101 -104 175 -227 182 -41 2 -80 -2
                -104 -11z"/>
                <path d="M17799 1171 c-105 -34 -191 -109 -238 -211 -22 -47 -26 -69 -26 -150
                0 -88 3 -101 33 -162 144 -294 573 -287 710 11 22 48 26 70 26 151 0 81 -4
                103 -26 151 -82 179 -290 270 -479 210z m216 -174 c87 -49 128 -178 86 -272
                -27 -61 -45 -82 -93 -106 -64 -33 -168 -19 -221 29 -31 28 -58 91 -64 146 -6
                58 22 139 60 174 63 57 161 69 232 29z"/>
                <path d="M19239 1171 c-105 -34 -191 -109 -238 -211 -22 -47 -26 -69 -26 -150
                0 -88 3 -101 33 -162 144 -294 573 -287 710 11 22 48 26 70 26 151 0 81 -4
                103 -26 151 -82 179 -290 270 -479 210z m216 -174 c87 -49 128 -178 86 -272
                -27 -61 -45 -82 -93 -106 -64 -33 -168 -19 -221 29 -31 28 -58 91 -64 146 -6
                58 22 139 60 174 63 57 161 69 232 29z"/>
                <path d="M22709 1171 c-105 -34 -191 -109 -238 -211 -22 -47 -26 -69 -26 -150
                0 -88 3 -101 33 -162 144 -294 573 -287 710 11 22 48 26 70 26 151 0 81 -4
                103 -26 151 -82 179 -290 270 -479 210z m216 -174 c87 -49 128 -178 86 -272
                -27 -61 -45 -82 -93 -106 -64 -33 -168 -19 -221 29 -31 28 -58 91 -64 146 -6
                58 22 139 60 174 63 57 161 69 232 29z"/>
                <path d="M25797 1176 c-133 -49 -195 -159 -153 -269 23 -61 57 -90 171 -143
                55 -25 108 -53 118 -62 24 -21 21 -64 -6 -90 -45 -43 -111 -17 -124 48 l-5 30
                -96 0 -95 0 6 -49 c16 -133 114 -211 267 -211 174 0 279 109 256 264 -11 69
                -57 114 -179 174 -57 27 -111 58 -120 67 -36 36 -6 95 49 95 24 0 54 -29 54
                -53 0 -15 13 -17 96 -17 l97 0 -5 45 c-12 101 -104 175 -227 182 -41 2 -80 -2
                -104 -11z"/>
                <path d="M507 1173 c-4 -7 -231 -567 -278 -686 l-19 -47 103 0 103 0 19 55 18
                56 130 -3 130 -3 17 -50 17 -50 101 -3 c56 -1 102 1 102 5 0 5 -65 170 -144
                368 l-144 360 -75 3 c-41 2 -77 -1 -80 -5z m113 -338 c18 -60 35 -116 38 -122
                3 -10 -15 -13 -72 -13 -42 0 -76 3 -76 6 0 4 14 52 31 108 17 56 33 109 36
                119 2 10 6 17 8 15 2 -2 18 -52 35 -113z"/>
                <path d="M1030 811 l0 -371 90 0 90 0 0 114 0 113 93 6 c120 8 163 23 214 74
                96 96 95 273 -4 364 -62 58 -82 63 -290 67 l-193 4 0 -371z m333 188 c49 -22
                60 -83 23 -126 -21 -25 -31 -28 -100 -31 l-76 -4 0 86 0 86 65 0 c35 0 75 -5
                88 -11z"/>
                <path d="M1670 810 l0 -370 205 0 205 0 0 85 0 85 -110 0 -110 0 0 285 0 285
                -95 0 -95 0 0 -370z"/>
                <path d="M2160 810 l0 -370 95 0 95 0 0 370 0 370 -95 0 -95 0 0 -370z"/>
                <path d="M2500 810 l0 -370 95 0 94 0 3 157 3 158 100 -158 100 -157 107 0
                c60 0 108 3 108 6 0 3 -54 82 -120 175 -67 93 -123 176 -126 184 -4 8 41 84
                108 182 63 92 118 174 122 181 6 9 -16 12 -93 12 l-99 0 -104 -164 -103 -164
                -3 164 -2 164 -95 0 -95 0 0 -370z"/>
                <path d="M3427 1173 c-4 -7 -231 -567 -278 -686 l-19 -47 103 0 103 0 19 55
                18 56 130 -3 130 -3 17 -50 17 -50 101 -3 c56 -1 102 1 102 5 0 5 -65 170
                -144 368 l-144 360 -75 3 c-41 2 -77 -1 -80 -5z m113 -338 c18 -60 35 -116 38
                -122 3 -10 -15 -13 -72 -13 -42 0 -76 3 -76 6 0 4 14 52 31 108 17 56 33 109
                36 119 2 10 6 17 8 15 2 -2 18 -52 35 -113z"/>
                <path d="M4530 810 l0 -370 95 0 95 0 0 370 0 370 -95 0 -95 0 0 -370z"/>
                <path d="M5170 811 l0 -371 90 0 89 0 3 117 3 118 83 -118 84 -117 109 0 110
                0 -100 124 -101 125 35 11 c112 37 173 180 133 311 -15 51 -69 114 -122 142
                -37 19 -59 22 -228 25 l-188 4 0 -371z m346 166 c40 -47 26 -125 -27 -153 -16
                -8 -53 -14 -84 -14 l-55 0 0 101 0 101 71 -4 c63 -3 74 -7 95 -31z"/>
                <path d="M5820 810 l0 -370 205 0 205 0 0 85 0 85 -115 0 -115 0 0 65 0 65
                110 0 110 0 0 85 0 85 -110 0 -110 0 0 50 0 50 115 0 115 0 0 85 0 85 -205 0
                -205 0 0 -370z"/>
                <path d="M7210 810 l0 -370 95 0 95 0 0 370 0 370 -95 0 -95 0 0 -370z"/>
                <path d="M8050 1095 l0 -85 75 0 75 0 0 -285 0 -285 95 0 95 0 0 285 0 284 73
                3 72 3 3 83 3 82 -246 0 -245 0 0 -85z"/>
                <path d="M8610 811 l0 -371 90 0 89 0 3 117 3 118 83 -118 84 -117 109 0 110
                0 -100 124 -101 125 35 11 c112 37 173 180 133 311 -15 51 -69 114 -122 142
                -37 19 -59 22 -228 25 l-188 4 0 -371z m346 166 c40 -47 26 -125 -27 -153 -16
                -8 -53 -14 -84 -14 l-55 0 0 101 0 101 71 -4 c63 -3 74 -7 95 -31z"/>
                <path d="M9507 1173 c-4 -7 -231 -567 -278 -686 l-19 -47 103 0 103 0 19 55
                18 56 130 -3 130 -3 17 -50 17 -50 101 -3 c56 -1 102 1 102 5 0 5 -65 170
                -144 368 l-144 360 -75 3 c-41 2 -77 -1 -80 -5z m113 -338 c18 -60 35 -116 38
                -122 3 -10 -15 -13 -72 -13 -42 0 -76 3 -76 6 0 4 14 52 31 108 17 56 33 109
                36 119 2 10 6 17 8 15 2 -2 18 -52 35 -113z"/>
                <path d="M10610 810 l0 -370 95 0 95 0 0 370 0 370 -95 0 -95 0 0 -370z"/>
                <path d="M11160 1095 l0 -85 75 0 75 0 0 -285 0 -285 95 0 95 0 0 285 0 284
                73 3 72 3 3 83 3 82 -246 0 -245 0 0 -85z"/>
                <path d="M11937 1173 c-4 -7 -231 -567 -278 -686 l-19 -47 103 0 103 0 19 55
                18 56 130 -3 130 -3 17 -50 17 -50 101 -3 c56 -1 102 1 102 5 0 5 -65 170
                -144 368 l-144 360 -75 3 c-41 2 -77 -1 -80 -5z m113 -338 c18 -60 35 -116 38
                -122 3 -10 -15 -13 -72 -13 -42 0 -76 3 -76 6 0 4 14 52 31 108 17 56 33 109
                36 119 2 10 6 17 8 15 2 -2 18 -52 35 -113z"/>
                <path d="M12460 810 l0 -370 85 0 85 0 1 273 0 272 77 -270 77 -270 65 0 65 0
                77 270 77 270 0 -272 1 -273 85 0 85 0 0 370 0 371 -122 -3 -122 -3 -70 -232
                c-39 -128 -73 -233 -76 -233 -3 0 -37 105 -75 233 l-71 232 -122 3 -122 3 0
                -371z"/>
                <path d="M13380 922 c0 -292 6 -331 65 -399 46 -54 107 -83 192 -90 129 -11
                234 43 285 145 22 45 23 57 26 325 l3 277 -95 0 -96 0 0 -249 c0 -256 -6 -303
                -40 -321 -25 -13 -76 -13 -102 1 -42 23 -48 63 -48 324 l0 245 -95 0 -95 0 0
                -258z"/>
                <path d="M14380 810 l0 -372 188 4 c208 5 260 17 335 79 162 134 151 474 -21
                592 -81 56 -103 61 -309 65 l-193 4 0 -372z m376 173 c49 -35 69 -85 69 -178
                0 -62 -4 -88 -20 -114 -35 -59 -67 -75 -156 -80 l-79 -3 0 202 0 202 78 -3
                c60 -3 84 -9 108 -26z"/>
                <path d="M15327 1173 c-4 -7 -231 -567 -278 -686 l-19 -47 103 0 103 0 19 55
                18 56 130 -3 130 -3 17 -50 17 -50 101 -3 c56 -1 102 1 102 5 0 5 -65 170
                -144 368 l-144 360 -75 3 c-41 2 -77 -1 -80 -5z m113 -338 c18 -60 35 -116 38
                -122 3 -10 -15 -13 -72 -13 -42 0 -76 3 -76 6 0 4 14 52 31 108 17 56 33 109
                36 119 2 10 6 17 8 15 2 -2 18 -52 35 -113z"/>
                <path d="M15850 810 l0 -370 90 0 90 0 2 220 3 221 139 -221 139 -220 83 0 84
                0 0 370 0 370 -90 0 -90 0 -2 -227 -3 -227 -140 227 -140 227 -82 0 -83 0 0
                -370z"/>
                <path d="M16920 811 l0 -371 90 0 90 0 0 114 0 113 93 6 c120 8 163 23 214 74
                96 96 95 273 -4 364 -62 58 -82 63 -290 67 l-193 4 0 -371z m333 188 c49 -22
                60 -83 23 -126 -21 -25 -31 -28 -100 -31 l-76 -4 0 86 0 86 65 0 c35 0 75 -5
                88 -11z"/>
                <path d="M18670 912 c0 -291 -4 -312 -55 -312 -26 0 -55 33 -55 62 0 16 -11
                18 -100 18 l-100 0 0 -26 c0 -77 51 -158 123 -197 33 -17 59 -22 122 -22 90 0
                126 14 188 73 61 59 67 95 67 404 l0 268 -95 0 -95 0 0 -268z"/>
                <path d="M19870 810 l0 -370 95 0 94 0 3 157 3 158 100 -158 100 -157 107 0
                c60 0 108 3 108 6 0 3 -54 82 -120 175 -67 93 -123 176 -126 184 -4 8 41 84
                108 182 63 92 118 174 122 181 6 9 -16 12 -93 12 l-99 0 -104 -164 -103 -164
                -3 164 -2 164 -95 0 -95 0 0 -370z"/>
                <path d="M20870 810 l0 -370 95 0 95 0 0 370 0 370 -95 0 -95 0 0 -370z"/>
                <path d="M21200 810 l0 -370 90 0 90 0 2 220 3 221 139 -221 139 -220 83 0 84
                0 0 370 0 370 -90 0 -90 0 -2 -227 -3 -227 -140 227 -140 227 -82 0 -83 0 0
                -370z"/>
                <path d="M21960 810 l0 -370 90 0 90 0 0 140 0 139 108 3 107 3 3 83 3 82
                -111 0 -110 0 0 60 0 60 110 0 110 0 0 85 0 85 -200 0 -200 0 0 -370z"/>
                <path d="M23330 811 l0 -371 90 0 89 0 3 117 3 118 83 -118 84 -117 109 0 110
                0 -100 124 -101 125 35 11 c112 37 173 180 133 311 -15 51 -69 114 -122 142
                -37 19 -59 22 -228 25 l-188 4 0 -371z m346 166 c40 -47 26 -125 -27 -153 -16
                -8 -53 -14 -84 -14 l-55 0 0 101 0 101 71 -4 c63 -3 74 -7 95 -31z"/>
                <path d="M23980 810 l0 -370 85 0 85 0 1 273 0 272 77 -270 77 -270 65 0 65 0
                77 270 77 270 0 -272 1 -273 85 0 85 0 0 370 0 371 -122 -3 -122 -3 -70 -232
                c-39 -128 -73 -233 -76 -233 -3 0 -37 105 -75 233 l-71 232 -122 3 -122 3 0
                -371z"/>
                <path d="M25137 1173 c-4 -7 -231 -567 -278 -686 l-19 -47 103 0 103 0 19 55
                18 56 130 -3 130 -3 17 -50 17 -50 101 -3 c56 -1 102 1 102 5 0 5 -65 170
                -144 368 l-144 360 -75 3 c-41 2 -77 -1 -80 -5z m113 -338 c18 -60 35 -116 38
                -122 3 -10 -15 -13 -72 -13 -42 0 -76 3 -76 6 0 4 14 52 31 108 17 56 33 109
                36 119 2 10 6 17 8 15 2 -2 18 -52 35 -113z"/>
                <path d="M26240 810 l0 -370 95 0 95 0 0 370 0 370 -95 0 -95 0 0 -370z"/>
                </g>
            </svg>
            {{-- <span class="ae-3 judul-utama-slide-1"><b> APLIKASI REGISTRASI TAMU DAN POJOK INFORMASI </b></span> --}}
            <span class="ae-3 judul-slide-1"><b>Badan Keuangan dan Aset Daerah <br/> Provinsi Sumatera Utara </b></span>
            <div class="button-container">
                <div class="card-button ae-4 fromCenter">
                    <div class="header">
                        <div class="header-content">
                            <img src="{{ asset('frontend/assets/img/tamu.png') }}" alt="registrasi tamu" width="100"> <h3>Registrasi Tamu</h3>
                        </div> <br/>
                        <div class="description">
                            <h6 style="margin-bottom: 20px;">Silahkan daftarkan diri anda di buku tamu kami</h6>
                            <a class="button blue gradient crop ae-3" href="#slide_2">Get Started</a>
                        </div>
                    </div>
                </div>

                <div class="card-button ae-5 fromCenter">
                    <div class="header">
                        <div class="header-content">
                            <img src="{{ asset('frontend/assets/img/informasi.png') }}" alt="pojok informasi" width="35"> <h3>Pojok Informasi</h3>
                        </div> <br>
                        <div class="description">
                            <h6 style="margin-bottom: 20px;">Ayo telusuri informasi yang anda butuhkan dalam kunjungan anda</h6>
                            <a class="button blue gradient crop ae-3" href="#slide_3">Get Started</a>
                        </div>
                    </div>
                </div>
            
                <div class="card-button ae-6 fromCenter">
                    <div class="header">
                        <div class="header-content">
                            <img src="{{ asset('frontend/assets/img/survey kepuasan.png') }}" alt="survey kepuasan" width="100"> <h3>Survey Kepuasan</h3>
                        </div> <br>
                        <div class="description">
                            <h6 style="margin-bottom: 20px;">Terima kasih atas partisipasi anda dalam memberikan penilaian terhadap layanan kami</h6>
                            <a class="button blue gradient crop ae-3">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>                                            
          </div>
        </div>
      </div>
    </div>
    <div class="background" style="background-image: url({{ $preference->background_s1 }})"></div>
  </section>

  {{-- Popup Video  --}}
  <div class="popup autoplay" data-popup-id="9">
    <div class="close">
      <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close"></use></svg>
    </div>
    <div class="content">
      <div class="container">
        <div class="wrap">
          <div class="fix-10-12">
            <div class="embedVideo popupContent">
              <iframe src="https://www.youtube.com/embed/g8yBqxTiHSs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Slide 2 (#15) --}}
  <section id="slide_2" class="slide fade-6 kenBurns fromLeft">
    <div class="content">
      <div class="container">
        <div class="wrap">
          <div class="fix-12-12">
            <div class="fix-7-12 left toRight">
                <h2 class="ae-1">SILAHKAN ISI DATA ANDA</h2>
                <form action="javascript:;" id="formtamu" autocomplete="off" class="slides-form margin-bottom-3">
                    @csrf
                    <select class="wide ae-3" name="bidang" id="bidang" style="width: 610px !important;">
                        <option value="">-Pilih Bidang Urusan-</option>
                        <option value="pertama">pertama</option>
                        <option value="kedua">kedua</option>
                    </select>
                    <input type="text" class="ae-4" name="nama" id="nama" placeholder="Nama Anda" />
                    <input type="text" class="ae-5" name="no_hp" id="no_hp" placeholder="No. HP/WA" />
                    <input type="email" class="ae-6" name="email" id="email" placeholder="Alamat Email" />
                    <input type="text" class="ae-7" name="Instansi_asal" id="Instansi_asal" placeholder="Instansi Asal" />
                    <textarea type="text" class="wide ae-8" name="tujuan" id="tujuan" placeholder="Tujuan" style="width: 610px !important;"></textarea>
                    <button type="button" class="button blue gradient ae-9" name="submit" id="btnSimpan">Simpan Data</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="background" style="background-image: url({{ $preference->background_s2 }})"></div>
  </section>

  {{-- Popup Video --}}
  <div class="popup autoplay" data-popup-id="89-3">
    <div class="close">
      <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close"></use></svg>
    </div>
    <div class="content">
      <div class="container">
        <div class="wrap">
          <div class="fix-10-12">
            <div class="embedVideo popupContent">
              <iframe src="https://www.youtube.com/embed/g8yBqxTiHSs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Slide 3 (#85) --}}
  <section id="slide_3" class="slide fade-6 kenBurns">
    <div class="content">
      <div class="container">
        <div class="wrap">
          <div class="fix-12">
            <h1 class="ae-1 judul-slide-3"><b>DAFTAR REGISTRASI TAMU HARI INI</b></h1>
            <table id="yajra-dataTable" class="ae-2 table">
                <thead>
                    <tr>
                        <td style="width: 2%;">No.</td>
                        <td style="width: 10%;">Tanggal</td>
                        <td>Bidang Tujuan</td>
                        <td>Asal Instansi</td>
                        <td>Keperluan</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
          </div>
          <!-- Tambahkan Footer untuk Waktu -->
        <footer class="ae-3 time-footer" style="text-align: center; margin-top: 20px; font-size: 24px;">
            <span id="current-time"></span>
        </footer>
        </div>
      </div>
    </div>
    <div class="background" style="background-image: url({{ $preference->background_s3 }})"></div>
  </section>

  {{-- Slide 4 (#95) --}}
  <section id="slide_4" class="slide fade-6 kenBurns">
    <div class="content">
      <div class="container">
        <div class="wrap">
          <div class="fix-7-12">
            <h1 class="huge ae-1 margin-bottom-2">Terima kasih telah mengunjungi kami 😊</h1>

            <div class="button-container">
                <div class="card-button ae-4 fromCenter">
                    <div class="header">
                        <div class="header-content">
                            <img src="{{ asset('frontend/assets/img/tamu.png') }}" alt="registrasi tamu" width="100"> <h3>Registrasi Tamu</h3>
                        </div> <br>
                        <div class="description">
                            <h6 style="margin-bottom: 20px;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates, fuga?</h6>
                            <a class="button blue gradient crop ae-3" href="#slide_2">Get Started</a>
                        </div>
                    </div>
                </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
    <div class="background" style="background-image: url({{ $preference->background_s4 }})"></div>
  </section>

@endsection

@push('scripts')
{{-- Pemuatan JS DataTables --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
    var token = $("meta[name='csrf-token']").attr("content");

    var tabledata = "";
    function data_tamu() {
        tabledata = $('#yajra-dataTable').DataTable({
            processing: true,
            serverSide: true,
            paging: false,
            searching: false,
            ajax: "{{ route('frontend.data') }}",
            columns: [
                { data: 'no', name:'id', render: function (data, type, row, meta) {
                     return meta.row + meta.settings._iDisplayStart + 1;
                }},
                {data: 'tanggal', name: 'tanggal'},
                {data: 'bidang', name: 'bidang'},
                {data: 'instansi_asal', name: 'instansi_asal'},
                {data: 'tujuan', name: 'tujuan'},
            ],
            language: { "emptyTable":     "My Custom Message On Empty Table" }
        });
    }

    data_tamu();

    $("#btnSimpan").click(function(){
        // Buat variabel data untuk menampung data hasil input dari form
        var data = new FormData();

        var url = "{{ route('mbtamu.store') }}";

        data.append('bidang', $("#bidang option:selected").val());
        data.append('nama', $("#nama").val());
        data.append('no_hp', $("#no_hp").val());
        data.append('email', $("#email").val());
        data.append('Instansi_asal', $("#Instansi_asal").val());
        data.append('tujuan', $("#tujuan").val());
        // data.append('otoritas', $("#otoritas option:selected").val());
        data.append('_token', token);

        console.log(token);

        if ($("#nama").val()!="" && $("#email").val()!=""){
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                processData: false,
                contentType: false,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': token // Tambahkan header CSRF
                },
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(e) {
                    if (e['status'] == true) {
                        Swal.fire({
                            title: "Sukses!",
                            text: e['pesan'],
                            icon: "success",
                            customClass: {
                                popup: 'custom-swal-popup'
                            }
                        }).then(() => {
                            // Menggunakan JavaScript murni untuk scroll
                            var slide4 = document.getElementById('slide_4');
                            // Menambahkan kelas pada slide_3
                            $('#slide_4').removeClass('after').addClass('selected active animate');
                            
                            // Menghapus kelas pada slide sebelumnya
                            $('#slide_2').removeClass('selected active animate').addClass('before');

                            $('#slide_3').removeClass('after').addClass('before');

                            // Menambahkan kelas selected pada item navigasi untuk slide 3
                            $('nav.side.pole ul li').removeClass('selected'); // Menghapus kelas selected dari semua item navigasi
                            
                            // Menambahkan kelas selected pada item ke-3 di navigasi (indeks 2, karena dimulai dari 0)
                            $('nav.side.pole ul li').eq(3).addClass('selected'); // Slide 3 adalah item ke-3 (indeks 2)
                            
                            window.location.hash = "#slide_4";
                        });
                        document.getElementById("formtamu").reset();
                        tabledata.ajax.reload();
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: e['pesan'],
                            customClass: {
                                popup: 'custom-swal-popup'
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Tangkap error jika terjadi
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Terjadi kesalahan: " + xhr.responseJSON.message,
                        customClass: {
                            popup: 'custom-swal-popup'
                        }
                    });
                    console.error(xhr.responseJSON);
                }
            });
        }
    });

    // Fungsi untuk mendapatkan nama hari dalam bahasa Indonesia
    function getIndonesianDay(dayIndex) {
        const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        return days[dayIndex];
    }

    // Fungsi untuk mendapatkan nama bulan dalam bahasa Indonesia
    function getIndonesianMonth(monthIndex) {
        const months = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni", 
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        return months[monthIndex];
    }

    // Fungsi untuk memperbarui waktu
    function updateTime() {
        const now = new Date();
        const dayName = getIndonesianDay(now.getDay());
        const date = now.getDate();
        const monthName = getIndonesianMonth(now.getMonth());
        const year = now.getFullYear();

        // Format waktu
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        const formattedTime = `
                <i class="fa fa-calendar"></i> ${dayName}, ${date} ${monthName} ${year} 
                <span style="margin-left: 15px;"><i class="fa fa-clock"></i> ${hours}:${minutes}:${seconds}</span>`;
        document.getElementById('current-time').innerHTML = formattedTime;
    }

    // Jalankan updateTime setiap detik
    setInterval(updateTime, 1000);

    // Panggil pertama kali saat halaman dimuat
    updateTime();
</script>
@endpush