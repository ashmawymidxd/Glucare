@extends('Dashboard/layouts/master')

@section('title')
    {{ trans('Dashboard/home.dashboard') }} {{ trans('Dashboard/home.admin') }} {{ trans('Dashboard/home.home') }}
@endsection
@push('css')
    <script src="https://cdn.jsdelivr.net/npm/frappe-charts@1.2.4/dist/frappe-charts.min.iife.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/custom-style.css') }}" />
@endpush

@section('page-url')
    <h6 class="pt-1">{{ trans('Dashboard/home.dashboard') }} / {{ trans('Dashboard/home.admin') }} / <span class="active">
            {{ trans('Dashboard/home.home') }} </span></h6>
@endsection

@section('page-header')
    <div class="header">
        <div class="layer1"></div>
        <div class="layer2">
            <div class="container-fluid d-flex align-items-center justify-content-center p-0">
                <div class="row col-md-12 p-1" style="background-color:rgba(137, 43, 226, 0);margin-top: -100px;">
                    <div class="col-md-4 p-4">
                        <div class="card p-3 d-flex">
                            <div class="d-flex align-items-center justify-content-around">
                                <div class="card d-flex align-items-center justify-content-center p-4"
                                    style="margin-top: -50px;">
                                    <i class="fa-solid fa-hospital-user" style="color:#3B71CA;font-size: 35px;"></i>
                                </div>
                                <div style="color: #3B71CA;line-height: 20px;">
                                    <p>{{ trans('dashboard/home.patient') }}</p>
                                    <span>{{ \App\Models\User::count() }}</span>
                                </div>
                            </div>
                            <hr>
                            {{ round((\App\Models\User::count() / (\App\Models\Doctor::count() + \App\Models\Employee::count() + \App\Models\Employee::count())) * 100, 3) }}%
                        </div>
                    </div>
                    <div class="col-md-4 p-4">
                        <div class="card p-3 d-flex">
                            <div class="d-flex align-items-center justify-content-around">
                                <div class="card d-flex align-items-center justify-content-center p-4"
                                    style="margin-top: -50px;">
                                    <i class="fa-solid fa-user-tie" style="color:#3B71CA;font-size: 35px;"></i>
                                </div>
                                <div style="color: #3B71CA;line-height: 20px;">
                                    <p>{{ trans('Dashboard/home.employee') }}</p>
                                    <span>{{\App\Models\Employee::count()}}</span>
                                </div>
                            </div>
                            <hr>
                            {{ round((\App\Models\Employee::count() / (\App\Models\User::count() + \App\Models\Doctor::count() + \App\Models\Employee::count())) * 100, 3) }}%
                        </div>
                    </div>
                    <div class="col-md-4 p-4">
                        <div class="card p-3 d-flex">
                            <div class="d-flex align-items-center justify-content-around">
                                <div class="card d-flex align-items-center justify-content-center p-4"
                                    style="margin-top: -50px;">
                                    <i class="fa-solid fa-user-doctor"style="color:#3B71CA;font-size: 35px;"></i>
                                </div>
                                <div style="color: #3B71CA;line-height: 20px;">
                                    <p>{{ trans('Dashboard/home.doctor') }}</p>
                                    <span>{{ \App\Models\Doctor::count() }}</span>
                                </div>
                            </div>
                            <hr>
                            {{ round((\App\Models\Doctor::count() / (\App\Models\User::count() + \App\Models\Employee::count() + \App\Models\Employee::count())) * 100, 3) }}%
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="mx-4 my-3">
        <div class="container-fluid p-0" style="margin-top: -70px">
            <!-- write your content here -->
            <div class="row col-md-12 m-0 p-0" id="row">
                <div class="col-md-6 col-sm-6 m-0 p-1">
                    <div class="card">
                        <div id="chart"></div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 m-0 p-1">
                    <div class="card">
                        <div id="frost-chart"></div>
                    </div>
                </div>
                {{-- <div class="col-md-6 col-sm-6 m-0 p-1">
                    <div class="card">
                        {!! $chart1->renderHtml() !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 m-0 p-1">
                    <div class="card">
                        <div id="frost-chart"></div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-6 col-sm-6 m-0 p-1">
                    <div class="card">
                        <canvas id="circleChart" height="370px"></canvas>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 m-0 p-1">
                    <div class="card">
                        <canvas id="barChart" height="370px"></canvas>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
{{-- @section('js')
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
@endsection --}}
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- chart file -->
    <script src="{{ url('Dashboard/js/chart.js') }}"></script>
    <!-- frost chart file -->
    <script src="{{ url('Dashboard/js/frost_chart.js') }}"></script>
    <!-- bar charts -->
    <script src="{{ url('Dashboard/js/bar.js') }}"></script>
    <!-- circle -->
    <script src="{{ url('Dashboard/js/circle.js') }}"></script>
@endsection
