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
        margin-top: 50px;
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

    /* slide 2 */

    #slide_2 .slides-form select, #slide_2 .slides-form textarea {
        margin: 5px !important;
    }

    @media (max-width: 768px) {
        #slide_2 .slides-form select, #slide_2 .slides-form textarea {
            margin: 0 !important;
        }
    }

    /* sweetalert custome css */
    .custom-swal-popup {
        font-size: 18px;
        width: 600px !important;
        max-width: 90% !important;
    }

    /* slide 3 */
    /* Tabel dan header */
    table.table {
        width: 100%;
        border-collapse: collapse;
    }

    table.table thead tr {
        background-color: rgba(169, 169, 169, 0.5); /* abu-abu transparan */
    }

    /* Baris pada body tabel */
    table.table tbody tr {
        background-color: rgba(255, 255, 255, 0.5); /* putih transparan */
        color: #000; /* warna teks hitam pada header */
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
</style>
@endpush

@section('content')
<!-- Slide 1 (#09) -->
  <section id="slide_1" class="slide fade-6 kenBurns">
    <div class="content">
      <div class="container">
        <div class="wrap">
          <div class="fix-12-12">
            <div class="fix-9-12">
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                width="528.000000pt" height="76.000000pt" viewBox="0 0 1328.000000 156.000000"
                preserveAspectRatio="xMidYMid meet" class="wide ae-1 fromCenter">
               
               <g transform="translate(0.000000,156.000000) scale(0.100000,-0.100000)"
               fill="white" stroke="none">
               <path d="M8816 1294 c-189 -46 -346 -204 -391 -396 -42 -180 4 -353 131 -488
               114 -121 259 -177 429 -167 247 14 445 177 500 409 92 392 -269 739 -669 642z
               m221 -229 c151 -45 236 -237 179 -404 -28 -80 -103 -154 -180 -176 -144 -42
               -294 36 -343 178 -22 66 -22 177 1 231 61 144 200 213 343 171z"/>
               <path d="M340 776 l0 -516 224 0 c303 0 366 14 454 101 71 71 101 196 71 302
               -13 47 -67 109 -115 132 l-36 17 36 33 c107 97 100 285 -14 375 -73 58 -101
               63 -372 68 l-248 4 0 -516z m442 255 c23 -30 23 -73 -1 -102 -17 -21 -29 -24
               -105 -28 l-86 -3 0 82 0 83 87 -5 c74 -4 89 -8 105 -27z m44 -384 c26 -30 30
               -62 13 -100 -18 -40 -48 -51 -151 -55 l-98 -4 0 97 0 97 106 -4 c102 -3 107
               -4 130 -31z"/>
               <path d="M2130 775 l0 -515 115 0 115 0 2 185 3 186 109 -186 109 -185 129 0
               c70 0 128 2 128 5 0 3 -61 98 -135 211 -74 113 -135 209 -135 214 0 5 63 82
               141 172 l141 163 -128 3 c-70 1 -133 1 -140 -2 -6 -2 -55 -61 -108 -130 -53
               -69 -101 -128 -106 -131 -7 -4 -10 86 -10 259 l0 266 -115 0 -115 0 0 -515z"/>
               <path d="M4150 1175 l0 -115 105 0 105 0 0 -400 0 -400 130 0 130 0 0 400 0
               400 100 0 100 0 0 115 0 115 -335 0 -335 0 0 -115z"/>
               <path d="M10510 775 l0 -515 115 0 115 0 0 515 0 515 -115 0 -115 0 0 -515z"/>
               <path d="M10910 1200 l0 -90 115 0 115 0 0 90 0 90 -115 0 -115 0 0 -90z"/>
               <path d="M5055 1029 c-162 -52 -265 -201 -265 -383 0 -222 145 -387 353 -403
               95 -7 173 15 227 64 l40 35 0 -41 0 -41 115 0 115 0 0 380 0 380 -115 0 -115
               0 0 -36 0 -36 -42 36 c-76 66 -197 83 -313 45z m272 -231 c111 -73 101 -253
               -16 -315 -57 -30 -136 -31 -191 -3 -93 48 -126 179 -68 268 41 61 88 83 169
               79 52 -2 75 -8 106 -29z"/>
               <path d="M6150 1041 c-45 -14 -88 -40 -109 -67 l-21 -27 0 42 0 41 -110 0
               -110 0 0 -385 0 -385 115 0 115 0 0 216 c0 232 8 289 46 325 32 30 114 38 150
               14 49 -32 54 -64 54 -320 l0 -235 115 0 115 0 0 223 c0 122 5 239 10 259 15
               54 61 88 119 88 27 0 56 -7 70 -16 46 -32 51 -66 51 -319 l0 -235 116 0 115 0
               -3 298 c-3 269 -5 300 -22 332 -54 99 -123 147 -229 157 -94 8 -165 -15 -228
               -76 l-50 -48 -52 51 c-33 33 -67 56 -93 64 -45 13 -125 15 -164 3z"/>
               <path d="M9967 1036 c-44 -16 -64 -30 -94 -65 l-23 -26 0 43 0 42 -110 0 -110
               0 0 -385 0 -385 115 0 115 0 1 233 c0 250 6 287 50 319 36 27 97 33 142 14 62
               -26 67 -49 67 -326 l0 -240 115 0 115 0 0 278 c0 314 -6 356 -66 421 -19 21
               -58 49 -87 61 -65 29 -176 36 -230 16z"/>
               <path d="M11647 1036 c-44 -16 -64 -30 -94 -65 l-23 -26 0 43 0 42 -110 0
               -110 0 0 -385 0 -385 115 0 115 0 1 233 c0 250 6 287 50 319 36 27 97 33 142
               14 62 -26 67 -49 67 -326 l0 -240 115 0 115 0 0 278 c0 314 -6 356 -66 421
               -19 21 -58 49 -87 61 -65 29 -176 36 -230 16z"/>
               <path d="M12438 1031 c-72 -23 -112 -48 -170 -108 -119 -122 -150 -303 -79
               -448 100 -203 343 -291 539 -194 69 34 153 113 190 178 l23 41 -124 0 c-101 0
               -127 -3 -138 -16 -41 -50 -170 -60 -226 -18 -28 21 -73 80 -73 95 0 5 130 9
               289 9 l289 0 6 31 c9 45 -11 155 -39 216 -28 63 -101 143 -160 178 -94 54
               -224 69 -327 36z m229 -207 c29 -22 69 -81 61 -90 -3 -2 -83 -3 -177 -2 l-172
               3 23 35 c13 19 39 45 58 58 30 21 44 23 107 20 53 -2 79 -9 100 -24z"/>
               <path d="M1230 762 c0 -211 3 -279 15 -320 34 -114 128 -188 252 -199 91 -7
               148 9 195 57 l38 38 0 -39 0 -39 110 0 110 0 0 385 0 385 -115 0 -115 0 0
               -230 c0 -251 -5 -279 -55 -318 -20 -16 -41 -22 -80 -22 -64 0 -100 24 -115 78
               -5 20 -10 139 -10 265 l0 227 -115 0 -115 0 0 -268z"/>
               <path d="M2940 762 c0 -211 3 -279 15 -320 34 -114 128 -188 252 -199 91 -7
               148 9 195 57 l38 38 0 -39 0 -39 110 0 110 0 0 385 0 385 -115 0 -115 0 0
               -230 c0 -251 -5 -279 -55 -318 -20 -16 -41 -22 -80 -22 -64 0 -100 24 -115 78
               -5 20 -10 139 -10 265 l0 227 -115 0 -115 0 0 -268z"/>
               <path d="M7130 762 c0 -211 3 -279 15 -320 34 -114 128 -188 252 -199 91 -7
               148 9 195 57 l38 38 0 -39 0 -39 110 0 110 0 0 385 0 385 -115 0 -115 0 0
               -230 c0 -251 -5 -279 -55 -318 -20 -16 -41 -22 -80 -22 -64 0 -100 24 -115 78
               -5 20 -10 139 -10 265 l0 227 -115 0 -115 0 0 -268z"/>
               <path d="M10910 645 l0 -385 115 0 115 0 0 385 0 385 -115 0 -115 0 0 -385z"/>
               </g>
               </svg>
               
            </div>
            <div class="button play small white popupTrigger ae-2 fromCenter margin-top-6 margin-bottom-6" data-popup-id="9">
              <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#play"></use></svg>
            </div>
            <p class="ae-3">
              <span class="opacity-8">Silahkan pilih <b>Tujuan</b> anda</span>
            </p>
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

                <div class="card-button ae-5 fromCenter">
                    <div class="header">
                        <div class="header-content">
                            <img src="{{ asset('frontend/assets/img/informasi.png') }}" alt="pojok informasi" width="35"> <h3>Pojok Informasi</h3>
                        </div> <br>
                        <div class="description">
                            <h6 style="margin-bottom: 20px;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates, fuga?</h6>
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
                            <h6 style="margin-bottom: 20px;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates, fuga?</h6>
                            <a class="button blue gradient crop ae-3">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>                                            
          </div>
        </div>
      </div>
    </div>
    <div class="background" style="background-image: url({{ asset('frontend/assets/img/background/img-09.jpg') }})"></div>
  </section>

  <!-- Popup Video -->
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

  <!-- Slide 2 (#15) -->
  <section id="slide_2" class="slide fade-6 kenBurns fromLeft">
    <div class="content">
      <div class="container">
        <div class="wrap">
          <div class="fix-12-12">
            <div class="fix-7-12 left toRight">
                <h1 class="ae-1">Silahkan isi data anda.</h1>
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
    <div class="background" style="background-image: url({{ asset('frontend/assets/img/background/img-15.jpg') }})"></div>
  </section>

  <!-- Slide 3 (#14) -->
  {{-- <section class="slide fade-6 kenBurns fromRight">
    <div class="content">
      <div class="container">
        <div class="wrap">
          <div class="fix-12-12">
            <div class="fix-6-12 left toLeft">
              <h1 class="ae-1">Designers are meant to be loved, not to be understood.</h1>
              <p class="ae-2"><span class="opacity-8">You must forget all your theories, all your ideas before the subject. What part of these is really your own will be expressed in your&nbsp;expression.</span></p>
              <a class="button blue gradient crop ae-3">Get Started</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="background" style="background-image: url({{ asset('frontend/assets/img/background/img-14.jpg') }})"></div>
  </section> --}}

  <!-- Slide 4 (#89) -->
  {{-- <section class="slide fade-6 kenBurns">
    <div class="content">
      <div class="container">
        <div class="wrap">
          <div class="fix-12-12">
            <ul class="flex left">
              <li class="col-6-12 fromBottomLeft">
                <p class="opacity-6 margin-bottom-2 ae-1">Case study</p>
                <h1 class="ae-2">The Secret of Success</h1>
                <div class="ae-3">
                  <p class="opacity-8">
                    No matter how many times your amazing, absolutely brilliant work is rejected by the client, for whatever dopey, arbitrary reason, there is often another amazing, absolutely brilliant solution possible.
                  </p>
                </div>
                <ul class="flex">
                  <li class="col-6-12 ae-3">
                    <h3 class="margin-top-3">Camera</h3>
                    <p class="tiny opacity-6">Scan entire conversations in a chat-like view.</p>
                  </li>
                  <li class="col-6-12 ae-4">
                    <h3 class="margin-top-3">Messages</h3>
                    <p class="tiny opacity-6">Quickly swipe messages to your archive or trash.</p>
                  </li>
                  <li class="col-6-12 ae-5">
                    <h3 class="margin-top-3">Music Center</h3>
                    <p class="tiny opacity-6">Unforgettable feelings through a quality music.</p>
                  </li>
                  <li class="col-6-12 ae-6">
                    <h3 class="margin-top-3">Channels</h3>
                    <p class="tiny opacity-6">Read reviews, compare customer ratings.</p>
                  </li>
                </ul>
              </li>
              <li class="col-1-12">&nbsp;</li>
              <li class="col-5-12 bottom">
                <div class="videoThumbnail shadow rounded popupTrigger margin-bottom-3 ae-7" data-popup-id="89-3">
                  <img src="assets/img/image-89-1.jpg" class="wide" alt="Video Thumbnail" />
                </div>
                <img src="assets/img/image-89-2.jpg" data-action="zoom" class="shadow rounded ae-8" alt="Image" />
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="background" style="background-image: url({{ asset('frontend/assets/img/background/img-89.jpg') }})"></div>
  </section> --}}

  <!-- Popup Video -->
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

  <!-- Slide 5 (#85) -->
  <section id="slide_3" class="slide fade-6 kenBurns">
    <div class="content">
      <div class="container">
        <div class="wrap">
          <div class="fix-9-12">
            <h1 class="ae-1">Daftar Tamu Hari Ini</h1>
            <table id="yajra-dataTable" class="table">
                <thead>
                    <tr>
                        <td>Tanggal</td>
                        <td>Bidang</td>
                        <td>Asal Instansi</td>
                        <td>Tujuan</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="background" style="background-image: url({{ asset('frontend/assets/img/background/img-85.jpg') }})"></div>
  </section>

  <!-- Slide 6 (#95) -->
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
    <div class="background" style="background-image: url({{ asset('frontend/assets/img/background/img-95.jpg') }})"></div>
  </section>

@endsection

@push('scripts')
<!-- Pemuatan JS DataTables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
    var token = $("meta[name='csrf-token']").attr("content");

    var tabledata = "";
    function data_tamu() {
        tabledata = $('#yajra-dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('frontend.data') }}",
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
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
</script>
@endpush