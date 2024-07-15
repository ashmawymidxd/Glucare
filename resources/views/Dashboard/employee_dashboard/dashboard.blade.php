@extends('Dashboard/layouts/master')

@section('title')
    dashboard employee home
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/custom-style.css') }}" />
@endsection

@section('page-url')
    <h6 class="pt-1">Dashboard / Employee / <span class="active"> Home </span></h6>
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
                                    <i class="fa-solid fa-file-invoice" style="color:#3B71CA;font-size: 35px;"></i>
                                </div>
                                <div style="line-height: 10px;">
                                    <strong>Price Without Discount</strong>
                                    <span></span>
                                </div>
                            </div>
                            <hr>
                            {{ $totalaccualPrice }} $
                        </div>
                    </div>
                    <div class="col-md-4 p-4">
                        <div class="card p-3 d-flex">
                            <div class="d-flex align-items-center justify-content-around">
                                <div class="card d-flex align-items-center justify-content-center p-4"
                                    style="margin-top: -50px;">
                                    <i class="fa-solid fa-file-invoice-dollar" style="color:#3B71CA;font-size: 35px;"></i>
                                </div>
                                <div style="line-height: 10px;">
                                    <strong>Total : </strong>
                                    <span>{{ $allInvoicesCount }}</span>
                                </div>
                            </div>
                            <hr>
                            {{ $sumInvoices }} $
                        </div>
                    </div>
                    <div class="col-md-4 p-4">
                        <div class="card p-3 d-flex">
                            <div class="d-flex align-items-center justify-content-around">
                                <div class="card d-flex align-items-center justify-content-center p-4"
                                    style="margin-top: -50px;">
                                    <i class="fa-solid fa-receipt" style="color:#3B71CA;font-size: 35px;"></i>
                                </div>
                                <div style="line-height: 10px;">
                                    <strong>Today Invoices :</strong>
                                    <span>{{ $todayInvoicesCount }}</span>
                                </div>
                            </div>
                            <hr>
                            {{ $todayInvoicesSum }} $
                        </div>
                    </div>
                </div>
            </div>
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
                        <div id="chart"></div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="card p-3">
                        <div id="frost-chart"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- chart file -->
    <script src="{{ url('Dashboard/js/chart.js') }}"></script>
    <!-- frost chart file -->
    <script src="{{ url('Dashboard/js/frost_chart.js') }}"></script>
@endsection
