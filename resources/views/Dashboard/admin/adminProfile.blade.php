@extends('Dashboard/layouts/master')

@section('title')
    admin profile
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/custom-style-users.css') }}" />
@endsection

@section('page-url')
    <h6 class="pt-1">Dashboard / Admin / <span class="active"> profile </span></h6>
@endsection

@section('page-header')
    <div class="header">
        <div class="layer1"></div>
        <div class="layer2"></div>
    </div>
@endsection

@section('content')
    <div class="p-3">
        <div class="container-fluid d-flex align-items-center justify-content-center" style="margin-top: -70px">
            <div class="row col-md-12" id="row">
                <div class="col-md-7">
                    <div class="card p-3">
                        <div>
                            <h6 class="main-color">edit profile</h6>
                            <form action="" method="post">
                                <input type="text" class="main-input" placeholder="Enter Username">
                                <input type="email" class="main-input" placeholder="Enter Email">
                                <button class="btn-primary main-button">Save</button>
                            </form>
                        </div>
                        <hr>
                        <div>
                            <h6 class="main-color">edit password</h6>
                            <form action="" method="post">
                                <input type="text" class="main-input" placeholder="Enter Old password">
                                <input type="text" class="main-input" placeholder="Enter New Password">
                                <input type="text" class="main-input" placeholder="Enter Confirme Password">
                                <button class="btn-primary main-button">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 p-1"></div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="layerUp">

                        </div>
                        <div class="layerDown">
                            <img width="150" class="rounded-circle" src="{{url('Dashboard/image/ahmed.png')}}" alt="">
                            <h5 class="main-color">ahmed hssan</h5>
                            <p class="main-color">uyu36565@gmail.com</p>
                        </div>
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
