<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Participants Certificate</title>
    <style>
        body{
            text-align: center;
        }
    </style>
</head>
<body>
    @foreach ($participantsNameAll as $participantsName)
    <div style="margin:0px;position:relative;" class="container">
        <image style="-webkit-background-size: cover;  -o-background-size: cover;-moz-background-size: cover;background-size: cover;max-width:97%;" src="file:///laragon/www/TrainingPrint/public/images/{{ $certificateImage->file_path }}"></image>
        {{-- <image style="-webkit-background-size: cover;  -o-background-size: cover;-moz-background-size: cover;background-size: cover;max-width:97%;" src="file:///laragon/www/TrainingPrint/public/assets/images/certificate.jpg"></image> --}}
        <p style="text-transform: uppercase;font-weight:600;font-size:50px;font-family:century gothic; position:absolute; top:42%; left:0; right: 0; ">{{ ucwords($participantsName->firstname) }} {{ ucwords($participantsName->middlename) }} {{ ucwords($participantsName->lastname) }}</p>
    </div>
    @endforeach
</body>
</html>
