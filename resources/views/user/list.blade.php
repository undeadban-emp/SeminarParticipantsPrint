@extends('user.layout.app')
@section('title', 'List Of Participants')
@section('listActive', 'active')
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
    #listOfParticipants {
  text-transform: uppercase;
}
</style>
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }} ">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.html') }} " type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dripicons/webfont.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/dripicons.css') }} ">
@endprepend

@prepend('meta-data')

@endprepend
@section('content')
{{-- content --}}
<section class="section">
    <div id="showList" class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <select class="choices form-select" id="municipality">
                        <option value="*">All</option>
                        @foreach ($municipality as $municipalities)
                        <option value="{{ $municipalities->code }}">{{ $municipalities->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <div class="col-sm-12 d-flex justify-content-end">
                        <button id="printAll" class=" btn btn-primary"><i class="icon dripicons-print"></i> Print</button>
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-sm-12 d-flex justify-content-end">
                        <button id="addParticipantsBtn" class=" btn btn-primary"><i class="icon dripicons-plus"></i> Add Participants</button>
                    </div>
                </div>
            </div>
            <br>
            <table class="table" id="listOfParticipants">
                <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Age</th>
                        <th>Contact Number</th>
                        <th>Municipality</th>
                        <th>Barangay</th>
                        <th>Option</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>


    <div id="addParticipants" class="card d-none">
        <div class="card-body">
            @if(session()->has('status'))
                <p class="alert alert-success">{{session('status')}}</p>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="col-sm-12 d-flex justify-content-end">
                        <button id="showParticipantsBtn" class=" btn btn-primary"><i class="icon dripicons-plus"></i> Show Participants List</button>
                    </div>
                </div>
            </div>
            <br>
            <form action="{{ url('/list-of-participants') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <label for="basicInput">First Name</label>
                        <input type="text" class="@error('firstName') is-invalid @enderror form-control" name="firstName" placeholder="Enter First Name">
                        @error('firstName')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label for="helpInputTop"></label>
                        <label for="basicInput">Middle Name</label>
                        <input type="text" class="@error('middleName') is-invalid @enderror form-control" name="middleName" placeholder="Enter Middle Name">
                        @error('middleName')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label for="helperText">Last Name</label>
                        <input type="text" name="lastName" class="@error('lastName') is-invalid @enderror form-control" placeholder="Enter Last Name">
                        @error('lastName')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label for="helperText">Age</label>
                        <input type="text" name="age" class="form-control" placeholder="Enter Age">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label for="basicInput">Municipal / City</label>
                        <select class="choices form-select" name="municipalCity">
                            @foreach ($municipality as $municipalities)
                            <option value="{{ $municipalities->code }}">{{ $municipalities->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4">
                        <label for="helpInputTop"></label>
                        <label for="basicInput">Barangay</label>
                        <select class="choices form-select" name="barangay">
                            @foreach ($barangay as $barangays)
                            <option value="{{ $barangays->code }}">{{ $barangays->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4">
                        <label for="helperText">Contact Number</label>
                        <input type="text" name="contactNo" class="form-control" placeholder="Enter Contact Number">
                    </div>
                    <div class="col-12">
                        <label for="helperText">About Me</label>
                        <input type="text" name="aboutMe" class="form-control" placeholder="Enter About Me">
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-12">
                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="submit" class=" btn btn-primary"><i class="icon dripicons-plus"></i> Save</button>
                        </div>
                    </div>
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
<script>
    // Jquery Datatable
    let jquery_datatable = $("#table1").DataTable()
</script>
<script>
        $(document).ready(function() {
        let municipality_table = $("#listOfParticipants").DataTable({
            processing: true,
            serverSide: true,
            language: {
                processing:
                    '<i class="spinner-border"></i><span class="sr-only">Loading...</span> ',
            },
            ajax: "/listOfParticipants/data/*",
            columns: [
                {
                    class : 'align-middle text-center',
                    data: "fullname",
                    name: "fullname",
                },
                {
                    class : 'align-middle text-center',
                    data: "age",
                    name: "age",
                },
                {
                    class : 'align-middle text-center',
                    data: "contact_number",
                    name: "contact_number",
                },
                {
                    class : 'align-middle text-center',
                    data: "city",
                    name: "city",
                },
                {
                    class : 'align-middle text-center',
                    data: "barangay",
                    name: "barangay",
                },
                {
                        class : 'align-middle text-center',
                        data : 'actions',
                        name : 'actions',
                        searchable: false,
                        orderable: false,
                        render : function (_, _, data, row) {
                                return `
                                    <button data-row="${data.id}" class="show-details btn btn-success rounded-pill">
                                        <i class="icon dripicons-document"></i>
                                    </button>

                                    <button data-row="${data.id}" class="print btn btn-primary rounded-pill">
                                        <i class="icon dripicons-print"></i>
                                    </button>
                                `;
                        },
                },
            ],
        });


        $('#municipality').change(function (e) {
            municipality_table.ajax.url(`/listOfParticipants/data/${e.target.value}`).load();
        });

        $(document).on('click', '.show-details', function () {
            let participantsId = JSON.parse($(this).attr("data-row"));
            new WinBox("Participants Information", {
            root: document.querySelector('.card'),
                    url: `/api/participants/show/details/${participantsId}`,
                    index : 999999,
                    background: "#2a3042",
                    x : "center",
            });
        });

        $(document).on('click', '.print', function () {
            let participantsId = JSON.parse($(this).attr("data-row"));
            window.open(`/print/${participantsId}`);
        });

        $(document).on('click', '#printAll', function () {
            let municipality = $("#municipality").val();
            window.open(`/printAll/${municipality}`);
        });

        $("#addParticipantsBtn").click(function () {
            $("#showList").attr("class", "card d-none");
            $("#addParticipants").attr("class", "card");
        });

        $("#showParticipantsBtn").click(function () {
            $("#showList").attr("class", "card ");
            $("#addParticipants").attr("class", "card d-none");
        });
    });
</script>
@endpush
@endsection
