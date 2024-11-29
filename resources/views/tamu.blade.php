@extends('main')

@push('styles')

<!-- Pemuatan CSS DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    /* slide 3 */
    /* Tabel dan header */
    .judul-utama-slide-3 {
        font-size: 35px;
    }

    .judul-slide-3 {
        font-size: 25px;
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
        .judul-utama-slide-3 {
            font-size: 25px;
        }

        .judul-slide-3 {
            font-size: 15px;
        }

        table.table thead tr {
            font-size: 18px;
        }

        table.table tbody tr {
            font-size: 16px;
        }
    }
</style>
@endpush

@section('content')
  <!-- Slide 5 (#85) -->
  <section class="slide fade-6 kenBurns">
    <div class="content">
      <div class="container">
        <div class="wrap">
          <div class="fix-12">
            <h1 class="ae-1 judul-utama-slide-3"><b>APLIKASI REGISTRASI TAMU DAN POJOK INFORMASI</b></h1>
            <h1 class="ae-2 judul-slide-3"><b>DAFTAR REGISTRASI TAMU HARI INI</b></h1>
            <table id="yajra-dataTable" class="ae-3 table">
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
        <footer class="ae-4 time-footer" style="text-align: center; margin-top: 20px; font-size: 24px;">
            <span id="current-time"></span>
        </footer>
    </div>
</div>
    </div>
    <div class="background" style="background-image: url({{ $preference->background_s3 }})"></div>
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

    // Setiap 5 menit (300000 ms), reload data AJAX
    setInterval(function() {
        tabledata.ajax.reload();
    }, 300000);


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