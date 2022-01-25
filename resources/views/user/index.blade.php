@extends('user.layout.app')
@section('title', 'Profile Statistic')
@section('indexActive', 'active')
@prepend('page-css')
{{-- CSS HERE --}}
<link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.html') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endprepend
@prepend('meta-data')
@endprepend
@section('content')
{{-- content --}}
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted font-semibold">Total Registrant</h6>
                                    <h6 class="font-extrabold mb-0">{{ $count }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 id="municipality">Registrant per Municipality</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@push('page-scripts')
{{-- JS SCRIPTS HERE --}}
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }} "></script>
<script src="{{ asset('assets/vendors/apexcharts/apexcharts.js') }} "></script>
<script src="{{ asset('assets/js/pages/dashboard.js') }} "></script>
<script src="{{ asset('assets/js/mazer.js') }} "></script>
<script>
    var optionsProfileVisit = {
	annotations: {
		position: 'back'
	},
	dataLabels: {
		enabled:false
	},
	chart: {
		type: 'bar',
		height: 300
	},
	fill: {
		opacity:1
	},
	plotOptions: {
	},
	series: [{
		name: 'Participants',
		data: [{{ $barobo }},{{ $bayabas }},{{ $bislig }},{{ $cagwait }},{{ $cantilan }},{{ $carmen }},{{ $carrascal }},{{ $cortes }},{{ $hinatuan }},{{ $lanuza }},{{ $lianga }},{{ $lingig }},{{ $madrid }},{{ $marihatag }},{{ $san_agustin }},{{ $san_miguel }},{{ $tagbina }},{{ $tago }},{{ $tandag }}]
	}],
	colors: '#435ebe',
	xaxis: {
		categories: ["barobo","bayabas","bislig","cagwait","cantilan","carmen","carrascal", "cortes","hinatuan","lanuza","lianga","lingig", "madrid", "marihatag", "san_agustin", "san_miguel", "tagbina", "tago", "tandag"],
	},
}
var chartProfileVisit = new ApexCharts(
    document.querySelector("#chart-profile-visit"),
    optionsProfileVisit
);
chartProfileVisit.render();
</script>
@endpush
@endsection
