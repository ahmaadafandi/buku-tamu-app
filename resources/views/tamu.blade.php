@extends('main')

@push('styles')

<!-- Pemuatan CSS DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<style>
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
  <!-- Slide 5 (#85) -->
  <section class="slide fade-6 kenBurns">
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

    // Setiap 5 menit (300000 ms), reload data AJAX
    setInterval(function() {
        tabledata.ajax.reload();
    }, 300000);
</script>
@endpush