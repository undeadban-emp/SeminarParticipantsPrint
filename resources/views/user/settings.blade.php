@extends('user.layout.app')
@section('title', 'Settings')
@section('settingsActive', 'active')
@prepend('page-css')
{{-- CSS HERE --}}
<link rel="preconnect" href="https://fonts.gstatic.com/">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }} ">
<link rel="stylesheet" href="{{ asset('assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/all.min.css') }} ">
<style>
table.dataTable td{
    padding: 15px 8px;
}
.fontawesome-icons .the-icon svg {
    font-size: 24px;
}
</style>
<link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }} ">
<link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }} ">
<link rel="stylesheet" href="{{ asset('assets/css/app.css') }} ">
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.html') }} " type="image/x-icon">
<link rel="stylesheet" href="{{ asset('assets/vendors/dripicons/webfont.css') }} ">
<link rel="stylesheet" href="{{ asset('assets/css/pages/dripicons.css') }} ">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endprepend

@prepend('meta-data')

@endprepend
@section('content')
{{-- content --}}

<section class="section">
    <div id="listShow" class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="col-sm-12 d-flex justify-content-end">
                        <button id="addImage" class=" btn btn-primary"><i class="icon dripicons-plus"></i> Add Photo</button>
                    </div>
                </div>
            </div>
            <br>
            <table class="table" id="imageList">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Option</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div id="addShow" class="card d-none">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="col-sm-12 d-flex justify-content-end">
                        <button id="showList" class=" btn btn-primary"><i class="icon dripicons-list"></i> Add Photo</button>
                    </div>
                </div>
            </div>
            </div>
            <div class="card-body">
                <form action="{{ url('settings') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input class="form-control filestyle margin" type="file" name="file" required>
                        <div class="pt-2 col-sm-12 d-flex justify-content-end">
                            <button class=" btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
            </div>
        </div>
</section>
@push('page-scripts')
    {{-- JS SCRIPTS HERE --}}
<script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }} "></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }} "></script>
<script src="{{ asset('assets/vendors/jquery/jquery.min.js') }} "></script>
<script src="{{ asset('assets/vendors/jquery-datatables/jquery.dataTables.min.js') }} "></script>
<script src="{{ asset('assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js') }} "></script>
<script src="{{ asset('assets/vendors/fontawesome/all.min.js') }} "></script>
<script src="{{ asset('assets/js/mazer.js') }} "></script>
<script src="{{ asset('assets/winbox/winbox.bundle.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
        // Jquery Datatable
        let jquery_datatable = $("#table1").DataTable()

         $(document).ready(function() {
         let municipality_table = $("#imageList").DataTable({
            processing: true,
            serverSide: true,
            language: {
                processing:
                    '<i class="spinner-border"></i><span class="sr-only">Loading...</span> ',
            },
            ajax: "/CertificateImageList",
            columns: [
                {
                        class : 'align-middle text-center',
                        data : 'file_path',
                        name : 'file_path',
                        searchable: false,
                        orderable: false,
                        render : function (_, _, data, row) {
                                return `
                                <img src="/images/${data.file_path}" border="0" width="50%" height="50%" class="img-rounded" align="center" />
                                `;
                        },
                },
                {
                        class : 'align-middle text-center',
                        data : 'status',
                        name : 'status',
                        searchable: false,
                        orderable: false,
                        render : function (_, _, data, row) {
                        if(data.status == 0){
                            return `
                            <select data-key="${data.id}" class="form-select" id="basicSelect">
                                            <option value="0" selected>In-active</option>
                                            <option value="1">Active</option>
                            </select>
                            `;
                        }else{
                            return `
                            <select data-key="${data.id}" class="form-select" id="basicSelect">
                                            <option value="0">In-active</option>
                                            <option value="1" selected>Active</option>
                            </select>
                            `;
                        }
                    },
                },
                {
                        class : 'align-middle text-center',
                        data : 'actions',
                        name : 'actions',
                        searchable: false,
                        orderable: false,
                        render : function (_, _, data, row) {
                                return `
                                    <button data-row="${data.id}" class="delete btn btn-danger rounded-pill">
                                        <i class="icon dripicons-trash"></i>
                                    </button>
                                `;
                        },
                },
            ],
        });

        $(document).on('change', '.form-select', function () {
            let key = $(this).attr('data-key');
            let data = {  value: $("#basicSelect").val() };
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    url: `/settings/update/${key}`,
                    data: data,
                    cache: false,
                    method: "PUT",
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                });
        });


        $(document).on('click', '.delete', function () {
            let key = $(this).attr('data-row');
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    url: `/settings/delete/${key}`,
                    cache: false,
                    method: "DELETE",
                    success: function (response) {
                        $("#imageList").DataTable().ajax.reload();
                        Swal.fire({
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                });
        });
    });

    $("#addImage").click(function () {
        $("#listShow").attr("class", "card d-none");
        $("#addShow").attr("class", "card");
    });
    $("#showList").click(function () {
        $("#listShow").attr("class", "card");
        $("#addShow").attr("class", "card d-none");
    });
    </script>
@endpush
@endsection
