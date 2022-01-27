<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Participants Certificate</title>
    <style>
        html {
            width: 100% !important;
            height: 100% !important;
        }
        body {
                background: url("file:///laragon/www/TrainingPrint/public/images/{{ $certificateImage->file_path }}") no-repeat;
                -webkit-background-size: cover;
                -o-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;
                text-align: center;
                padding-top: 400px;
        }
    </style>
</head>
<body>
    <div class="container">
        <p style="text-transform: uppercase;font-weight:600;font-size:50px;font-family:century gothic;">{{ ucwords($participantsName->firstname) }} {{ ucwords($participantsName->middlename) }} {{ ucwords($participantsName->lastname) }}</p>
    </div>
</body>
</html>
