@extends('Dashboard/layouts/master')

@section('title')
    Doctors Reports
@endsection

@section('page-url')
    <h6 class="pt-1">Dashboard / <span class="active"> Doctors Reports </span></h6>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/custom-style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/custom-style-settings.css') }}" />
@endpush

@section('page-header')
    <div class="header">
        <div class="layer1"></div>
        <div class="layer2">
        </div>
    </div>
@endsection

@section('content')
    <div class="p-3">
        <div class="container-fluid p-0" style="margin-top: -70px">
            <!-- write your content here -->
            <div class="row col-md-12 m-0 p-0" id="row">
                <div class="col-md-6 col-sm-6">
                    <div class="card p-3 mb-1">
                        {!! $chart2->renderHtml() !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="card p-3">
                        @foreach ($doctors as $doctor)
                            <div class="card shadow-0 border p-3 rounded-1 my-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="">
                                        @if ($doctor->image)
                                            <img src="{{ Url::asset('Dashboard/img/profile/doctors/' . $doctor->image->filename) }}"
                                                height="50px" width="50px" alt="">
                                        @else
                                            <img src="{{ Url::asset('Dashboard/img/profile/doctors/default.png') }}"
                                                height="50px" width="50px" alt="">
                                        @endif
                                        <span>ahmed</span>

                                    </div>
                                    <div class="">
                                        {{ $doctor->speciality }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {!! $chart2->renderChartJsLibrary() !!}
    {!! $chart2->renderJs() !!}
@endpush
