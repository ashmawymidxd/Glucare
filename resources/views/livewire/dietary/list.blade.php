@extends('Website/layouts/master')

@section('title')
    website Dietary
@endsection

@push('css')
    {{-- <link rel="stylesheet" href="{{URL::asset('Website/css/custom-style.css')}}" /> --}}
    {{-- {{url('Website/img/chat.png')}} --}}
@endpush
@section('sub-header')
    <div class="header-area">
        <div class="header-top_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="social_media_links">
                            <a href="#">
                                <i class="fa fa-linkedin"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="short_contact_list">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-envelope"></i> info@docmed.com</a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fa fa-phone"></i> 160160</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-2">
                        <div class="logo">
                            <h6><a href="./index.html">Website</a> / <a href="./index.html">Dietary</a></h6>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="main-menu  d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a class="active" href="{{route('dietaryList')}}">Dietary List</a></li>
                                    <li><a class="" href="{{route('dietaryHistory')}}">My history</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3  d-lg-block">
                        <div class="Appointment">
                            <div class="book_btn  d-lg-block">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @livewire('dietary.dietary-recommendation-list')
@endsection

@push('js')
    {{-- <script src="{{url('Website/js/chart.js')}}"></script> --}}
@endpush
