@extends('main_admin')

@push('styles')
<!-- sweet alert cdn -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endpush

@section('content')
<div class="row">
    <div class="col-sm-12">
       <div class="card">
          <div class="card-header d-flex justify-content-between">
             <div class="header-title">
                <h4 class="card-title">Daftar Tamu</h4>
             </div>
          </div>
          <div class="card-body">
             <p>Images in Bootstrap are made responsive with <code>.img-fluid</code>. <code>max-width: 100%;</code> and <code>height: auto;</code> are applied to the image so that it scales with the parent element.</p>
             <div class="table-responsive">
                <table id="yajra-dataTable" class="table table-striped">
                   <thead>
                      <tr>
                         <th>Bidang</th>
                         <th>Nama</th>
                         <th>Email</th>
                         <th>Instansi Asal</th>
                         {{-- <th>Posisi</th>
                         <th>Status</th> --}}
                         <th><svg width="24" viewBox="0 0 24 24" class="animated-rotate icon-24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8064 7.62361L20.184 6.54352C19.6574 5.6296 18.4905 5.31432 17.5753 5.83872V5.83872C17.1397 6.09534 16.6198 6.16815 16.1305 6.04109C15.6411 5.91402 15.2224 5.59752 14.9666 5.16137C14.8021 4.88415 14.7137 4.56839 14.7103 4.24604V4.24604C14.7251 3.72922 14.5302 3.2284 14.1698 2.85767C13.8094 2.48694 13.3143 2.27786 12.7973 2.27808H11.5433C11.0367 2.27807 10.5511 2.47991 10.1938 2.83895C9.83644 3.19798 9.63693 3.68459 9.63937 4.19112V4.19112C9.62435 5.23693 8.77224 6.07681 7.72632 6.0767C7.40397 6.07336 7.08821 5.98494 6.81099 5.82041V5.82041C5.89582 5.29601 4.72887 5.61129 4.20229 6.52522L3.5341 7.62361C3.00817 8.53639 3.31916 9.70261 4.22975 10.2323V10.2323C4.82166 10.574 5.18629 11.2056 5.18629 11.8891C5.18629 12.5725 4.82166 13.2041 4.22975 13.5458V13.5458C3.32031 14.0719 3.00898 15.2353 3.5341 16.1454V16.1454L4.16568 17.2346C4.4124 17.6798 4.82636 18.0083 5.31595 18.1474C5.80554 18.2866 6.3304 18.2249 6.77438 17.976V17.976C7.21084 17.7213 7.73094 17.6516 8.2191 17.7822C8.70725 17.9128 9.12299 18.233 9.37392 18.6717C9.53845 18.9489 9.62686 19.2646 9.63021 19.587V19.587C9.63021 20.6435 10.4867 21.5 11.5433 21.5H12.7973C13.8502 21.5001 14.7053 20.6491 14.7103 19.5962V19.5962C14.7079 19.088 14.9086 18.6 15.2679 18.2407C15.6272 17.8814 16.1152 17.6807 16.6233 17.6831C16.9449 17.6917 17.2594 17.7798 17.5387 17.9394V17.9394C18.4515 18.4653 19.6177 18.1544 20.1474 17.2438V17.2438L20.8064 16.1454C21.0615 15.7075 21.1315 15.186 21.001 14.6964C20.8704 14.2067 20.55 13.7894 20.1108 13.5367V13.5367C19.6715 13.284 19.3511 12.8666 19.2206 12.3769C19.09 11.8873 19.16 11.3658 19.4151 10.928C19.581 10.6383 19.8211 10.3982 20.1108 10.2323V10.2323C21.0159 9.70289 21.3262 8.54349 20.8064 7.63277V7.63277V7.62361Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <circle cx="12.1747" cy="11.8891" r="2.63616" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                        </svg></th>
                        </tr>
                   </thead>
                   <tbody>
                      
                   </tbody>
                   <tfoot>
                      <tr>
                        <th>Bidang</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Instansi Asal</th>
                        {{-- <th>Posisi</th>
                        <th>Status</th> --}}
                         <th><svg width="24" viewBox="0 0 24 24" class="animated-rotate icon-24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8064 7.62361L20.184 6.54352C19.6574 5.6296 18.4905 5.31432 17.5753 5.83872V5.83872C17.1397 6.09534 16.6198 6.16815 16.1305 6.04109C15.6411 5.91402 15.2224 5.59752 14.9666 5.16137C14.8021 4.88415 14.7137 4.56839 14.7103 4.24604V4.24604C14.7251 3.72922 14.5302 3.2284 14.1698 2.85767C13.8094 2.48694 13.3143 2.27786 12.7973 2.27808H11.5433C11.0367 2.27807 10.5511 2.47991 10.1938 2.83895C9.83644 3.19798 9.63693 3.68459 9.63937 4.19112V4.19112C9.62435 5.23693 8.77224 6.07681 7.72632 6.0767C7.40397 6.07336 7.08821 5.98494 6.81099 5.82041V5.82041C5.89582 5.29601 4.72887 5.61129 4.20229 6.52522L3.5341 7.62361C3.00817 8.53639 3.31916 9.70261 4.22975 10.2323V10.2323C4.82166 10.574 5.18629 11.2056 5.18629 11.8891C5.18629 12.5725 4.82166 13.2041 4.22975 13.5458V13.5458C3.32031 14.0719 3.00898 15.2353 3.5341 16.1454V16.1454L4.16568 17.2346C4.4124 17.6798 4.82636 18.0083 5.31595 18.1474C5.80554 18.2866 6.3304 18.2249 6.77438 17.976V17.976C7.21084 17.7213 7.73094 17.6516 8.2191 17.7822C8.70725 17.9128 9.12299 18.233 9.37392 18.6717C9.53845 18.9489 9.62686 19.2646 9.63021 19.587V19.587C9.63021 20.6435 10.4867 21.5 11.5433 21.5H12.7973C13.8502 21.5001 14.7053 20.6491 14.7103 19.5962V19.5962C14.7079 19.088 14.9086 18.6 15.2679 18.2407C15.6272 17.8814 16.1152 17.6807 16.6233 17.6831C16.9449 17.6917 17.2594 17.7798 17.5387 17.9394V17.9394C18.4515 18.4653 19.6177 18.1544 20.1474 17.2438V17.2438L20.8064 16.1454C21.0615 15.7075 21.1315 15.186 21.001 14.6964C20.8704 14.2067 20.55 13.7894 20.1108 13.5367V13.5367C19.6715 13.284 19.3511 12.8666 19.2206 12.3769C19.09 11.8873 19.16 11.3658 19.4151 10.928C19.581 10.6383 19.8211 10.3982 20.1108 10.2323V10.2323C21.0159 9.70289 21.3262 8.54349 20.8064 7.63277V7.63277V7.62361Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <circle cx="12.1747" cy="11.8891" r="2.63616" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                        </svg></th>
                        </tr>
                   </tfoot>
                </table>
             </div>
          </div>
       </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ajaxModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <form id="tamuForm" action="javascript:void(0)">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <input type="hidden" class="form-control" id="tamu_id">
                <div class="col-12 mb-3">
                    <label for="bidang mb1">Bidang</label>
                    <select id="bidang" class="form-control">
                        <option value="">--Pilih Bidang Urusan--</option>
                        <option value="pertama">Pertama</option>
                        <option value="kedua">Kedua</option>
                    </select>
                </div>
                <div class="col-6 mb-3">
                    <label for="nama mb1">Nama</label>
                    <input type="text" class="form-control" id="nama">
                </div>
                <div class="col-6 mb-3">
                    <label for="no_hp mb1">No. HP/WA</label>
                    <input type="text" class="form-control" id="no_hp">
                </div>
                <div class="col-6 mb-3">
                    <label for="email mb1">Email</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="col-6 mb-3">
                    <label for="instansi_asal mb1">Asal Instansi</label>
                    <input type="text" class="form-control" id="instansi_asal">
                </div>
                <div class="col-12">
                    <label for="tujuan mb1">Tujuan</label>
                    <textarea type="text" class="form-control" id="tujuan"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btnSimpan">Send message</button>
        </div>
      </div>
    </form>
    </div>
  </div>
@endsection

@push('scripts')
<script>
    var token = $("meta[name='csrf-token']").attr("content");

    var tabledata = "";
    function data_tamu() {
        tabledata = $('#yajra-dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('mbtamu.data') }}",
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {data: 'bidang', name: 'bidang'},
                {data: 'nama', name: 'nama'},
                {data: 'email', name: 'email'},
                {data: 'instansi_asal', name: 'instansi_asal'},
                // {data: 'posisi_id', name: 'posisi_id'},
                // {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: true, searchable: true},
            ],
            language: { "emptyTable":     "My Custom Message On Empty Table" }
        });
    }

    data_tamu();

    $('body').on('click', '.edit', function () {
        // reset();
        $('#btnSimpan').html("Update");
        $('#modalHeading').html("Edit Data");
        var id = $(this).data('id');
        $.get('/mbtamu/' + id + '/edit', function (data) {
            $('#ajaxModel').modal('show');
            $('#tamu_id').val(data.data.id);
            $('#bidang').val(data.data.bidang);
            $('#nama').val(data.data.nama);
            $('#no_hp').val(data.data.no_hp);
            $('#email').val(data.data.email);
            $('#instansi_asal').val(data.data.instansi_asal);
            $('#tujuan').val(data.data.tujuan);
        });
    });

    $("#btnSimpan").click(function(){
        // Buat variabel data untuk menampung data hasil input dari form
        var data = new FormData();

        var url = "{{ route('mbtamu.updatetamu') }}";

        data.append('tamu_id', $("#tamu_id").val());
        data.append('bidang', $("#bidang option:selected").val());
        data.append('nama', $("#nama ").val());
        data.append('no_hp', $("#no_hp ").val());
        data.append('email', $("#email ").val());
        data.append('instansi_asal', $("#instansi_asal ").val());
        data.append('tujuan', $("#tujuan ").val());
        // data.append('otoritas', $("#otoritas option:selected").val());
        data.append('_token', token);

        if ($("#tamu_id").val()!="" && $("#bidang").val()!="" && $("#nama").val()!=""){
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
                        showToast('success', e['pesan']);

                        document.getElementById("tamuForm").reset();
                        $('#ajaxModel').modal('hide');
                        tabledata.ajax.reload();
                    } else {
                        showToast('error', e['pesan']);
                    }
                },
                error: function(xhr, status, error) {
                    // Tangkap error jika terjadi
                    showToast('error', "Terjadi kesalahan");
                    // console.error(xhr.responseJSON);
                }
            });
        }
    });

    hapus('mbtamu');

    document.addEventListener('DOMContentLoaded', function () {
        @if(session()->has('success'))
            showToast('success', "{{ Session::get('success') }}");
        @endif

        @if(Session::has('error'))
            showToast('error', "{{ Session::get('error') }}");
        @endif
    });
  </script>
  
@endpush
