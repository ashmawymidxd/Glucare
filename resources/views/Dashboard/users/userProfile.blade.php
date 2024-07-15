@extends('Dashboard/layouts/master')

@section('title')
    user profile
@endsection

@section('css')
    <link rel="stylesheet" href="{{URL::asset('Dashboard/css/custom-style-users.css')}}" />
@endsection

@section('page-url')
    <h5 class="pt-1">Dashboard / Users / <span class="active"> profile </span></h5>
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
            <div class="col-md-6">
                <div class="card">
                    <div class="layerUp">

                    </div>
                    <div class="layerDown">
                        <img width="150" class="rounded-circle" src="{{url('Dashboard/img/profile/ahmed.png')}}" alt="">
                        <h5 class="main-color">ahmed hssan</h5>
                        <p class="main-color">uyu36565@gmail.com</p>
                        <p class="main-color">doctor</p>
                    </div>
                </div>
            </div>
            <div class="col-md-1 p-1"></div>
            <div class="col-md-5">
                <div class="card p-3">
                    <div>
                        <h6 class="main-color">Personal Information</h6>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <p class="mb-0">https://mdbootstrap.com</p>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                    <p class="mb-0">@mdbootstrap</p>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <h6 class="main-color">Medical Information</h6>
                        <div class="mb-4 pb-2 text-center">
                            <button type="button" class="btn btn-outline-primary btn-floating">
                                <i class="fab fa-facebook-f fa-lg"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary btn-floating">
                                <i class="fab fa-twitter fa-lg"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary btn-floating">
                                <i class="fab fa-skype fa-lg"></i>
                            </button>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary btn-rounded btn-lg ">
                                Message now
                            </button>
                        </div>
                        <div class="d-flex justify-content-between text-center mt-5 mb-2">
                            <div>
                                <p class="mb-2 h5">8471</p>
                                <p class="text-muted mb-0">Wallets Balance</p>
                            </div>
                            <div class="px-3">
                                <p class="mb-2 h5">8512</p>
                                <p class="text-muted mb-0">Income amounts</p>
                            </div>
                            <div>
                                <p class="mb-2 h5">4751</p>
                                <p class="text-muted mb-0">Total Transactions</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <!-- chart file -->
    <script src="{{url('Dashboard/js/chart.js')}}"></script>
    <!-- frost chart file -->
    <script src="{{url('Dashboard/js/frost_chart.js')}}"></script>
@endsection
