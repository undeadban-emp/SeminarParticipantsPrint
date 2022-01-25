<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/all.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }} ">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.html') }} " type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dripicons/webfont.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/dripicons.css') }} ">
    {{-- <style>
        * {
            box-sizing: border-box;
        }

body {
  height: 100vh;
  display: grid;
  place-content: center;
}
span{
  width: 50px;
  height: 50px;
  background-color: #f1f1f9;
  border-radius: 50%;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -ms-border-radius: 50%;
  -o-border-radius: 50%;
  border: 5px solid black;
  border-bottom-color: transparent;
  position: relative;
  animation: spinner 1s linear infinite paused;
  -webkit-animation: spinner 1s linear infinite;
}

@keyframes spinner {
  to {
    transform: rotate(1turn);
    -webkit-transform: rotate(1turn);
    -moz-transform: rotate(1turn);
    -ms-transform: rotate(1turn);
    -o-transform: rotate(1turn);
  }
}

    </style> --}}
</head>

<body>
    {{-- <span id="cover"></span> --}}
    <div id="app">
        <div id="main">

            {{-- Content --}}
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Participants Information</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="basicInput">Fullname</label>
                                    <input type="text" class="form-control" value="{{ $participantsInfo->firstname }} {{ $participantsInfo->middlename }} {{ $participantsInfo->lastname }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="basicInput">Age</label>
                                    <input type="text" class="form-control" value="{{ $participantsInfo->age }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="basicInput">City</label>
                                    <input type="text" class="form-control" value="{{ $participantsInfo->cities->name }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="basicInput">Barangay</label>
                                    <input type="text" class="form-control" value="{{ $participantsInfo->barangays->name }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="basicInput">Contact Number</label>
                                    <input type="text" class="form-control" value="{{ $participantsInfo->contact_number }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="basicInput">About Me</label>
                                    <textarea class="form-control">{{ $participantsInfo->about_me }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- End Content --}}
        </div>
    </div>

    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }} "></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }} "></script>
    <script src="{{ asset('assets/vendors/jquery-datatables/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js') }} "></script>
    <script src="{{ asset('assets/vendors/fontawesome/all.min.js') }} "></script>
    <script src="{{ asset('assets/js/mazer.js') }} "></script>
    <script>
        $(window).on('load', function(){
            $('#cover').fadeOut(1000);
        })
    </script>
</body>
</html>

