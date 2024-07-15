@extends('Dashboard/layouts/master')

@section('title')
    dashboard doctor home
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/custom-style.css') }}" />
@endsection

@section('page-url')
    <h6 class="pt-1">Dashboard / Doctor / <span class="active"> Home </span></h6>
@endsection
@section('page-header')
    <div class="header">

        <input type="hidden" value="{{ $allAppointments }}" id="allAppointments">
        <input type="hidden" value="{{ $confirmedAppointments }}" id="confirmedAppointments">
        <input type="hidden" value="{{ $unconfirmedAppointments }}" id="unconfirmedAppointments">
        <input type="hidden" value="{{ $endAppointments }}" id="endAppointments">

        <div class="layer1"></div>
        <div class="layer2">
            <div class="container-fluid d-flex align-items-center justify-content-center p-0">
                <div class="row col-md-12 p-1" style="background-color:rgba(137, 43, 226, 0);margin-top: -100px;">
                    <!-- today -->
                    <div class="col-md-3 p-4">
                        <div class="card p-3 d-flex">
                            <div class="d-flex align-items-center justify-content-around">
                                <div class="card d-flex align-items-center justify-content-center p-4"
                                    style="margin-top: -50px;">
                                    <i class="fa-solid fa-calendar-week" style="color:#3B71CA;font-size: 35px;"></i>
                                </div>
                                <div style="line-height: 10px;">
                                    <strong>Today Appoint</strong>
                                    <span>: {{ $todayAppointmentsCount }}</span>
                                </div>
                            </div>
                            <hr>
                            {{ $todayAppointmentsCount ? round(($todayAppointmentsCount / $allAppointments) * 100, 2) : 0 }}%
                        </div>
                    </div>
                    <!-- unconfirmedAppointments -->
                    <div class="col-md-3 p-4">
                        <div class="card p-3 d-flex">
                            <div class="d-flex align-items-center justify-content-around">
                                <div class="card d-flex align-items-center justify-content-center p-4"
                                    style="margin-top: -50px;">
                                    <i class="fa-solid fa-circle-xmark" style="color:#3B71CA;font-size: 35px;"></i>
                                </div>
                                <div style="line-height: 10px;">
                                    <strong>Un Confirmed</strong>
                                    <span>{{ $unconfirmedAppointments }}</span>
                                </div>
                            </div>
                            <hr>
                            {{ $unconfirmedAppointments ? round(($unconfirmedAppointments / $allAppointments) * 100, 2) : 0 }}%
                        </div>
                    </div>
                    <!-- confirmedAppointments -->
                    <div class="col-md-3 p-4">
                        <div class="card p-3 d-flex">
                            <div class="d-flex align-items-center justify-content-around">
                                <div class="card d-flex align-items-center justify-content-center p-4"
                                    style="margin-top: -50px;">
                                    <i class="fa-solid fa-circle-check" style="color:#3B71CA;font-size: 35px;"></i>
                                </div>
                                <div style="line-height: 10px;">
                                    <strong>Confirmed</strong>
                                    <span>{{ $confirmedAppointments }}</span>
                                </div>
                            </div>
                            <hr>
                            {{ $confirmedAppointments ? round(($confirmedAppointments / $allAppointments) * 100, 2) : 0 }}%
                        </div>
                    </div>
                    <!-- end appointments -->
                    <div class="col-md-3 p-4">
                        <div class="card p-3 d-flex">
                            <div class="d-flex align-items-center justify-content-around">
                                <div class="card d-flex align-items-center justify-content-center p-4"
                                    style="margin-top: -50px;">
                                    <i class="fa-solid fa-chart-pie" style="color:#3B71CA;font-size: 35px;"></i>
                                </div>
                                <div style="line-height: 10px;">
                                    <strong>total</strong>
                                    <span>{{ $allAppointments }}</span>
                                </div>
                            </div>
                            <hr>
                            100%
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="p-3">
        <div class="container-fluid p-0 mt--70">
            <!-- write your content here -->
            <div class="row col-md-12 m-0 p-0" id="row">
                {{-- <div class="col-md-6 col-sm-6">
                    <div class="card p-3 mb-1">
                        <div id="chart"></div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="card p-3">
                        <div id="frost-chart"></div>
                    </div>
                </div> --}}
                <div class="col-md-6 col-sm-6 m-0 p-1">
                    <div class="card">
                        <canvas id="circleChart" height="370px"></canvas>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 m-0 p-1">
                    <div class="card">
                        <canvas id="barChart" height="370px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- chart file -->
    {{-- <script src="{{ url('Dashboard/js/chart.js') }}"></script> --}}
    <!-- frost chart file -->
    {{-- <script src="{{ url('Dashboard/js/frost_chart.js') }}"></script> --}}
    <!-- bar charts -->
    <script src="{{ url('Dashboard/js/bar.js') }}"></script>
    <!-- circle -->
    <script src="{{ url('Dashboard/js/circle.js') }}"></script>
@endsection
