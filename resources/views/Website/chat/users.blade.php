@extends('Website/layouts/master')

@section('title')
    chat section
@endsection

@push('css')
    {{-- <link rel="stylesheet" href="{{URL::asset('Website/css/custom-style.css')}}" /> --}}
@endpush

@section('sub-header')
    <header>
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
                                <h6>
                                    <a href="../index.html">Website</a> /
                                    <a href="">Live chat</a>
                                </h6>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li>
                                            <a class="active" href="{{ route('chat.index') }}">Chat Room</a>
                                        </li>
                                        <li><a href="{{ route('chat.users') }}">Users</a></li>
                                        <li>
                                            <a class="active" href="{{ route('chat.chatbot') }}">ChatBoot</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-lg-block">
                            <div class="Appointment">
                                <div class="book_btn d-lg-block"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div class="container-fluid my-3">
        {{-- display the list of users --}}
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4">
                    <div class="card my-2" style="border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex text-black">
                                <div class="flex-shrink-0">
                                    @if ($user->image)
                                        <img src="{{ URL('Dashboard/img/profile/users/' . $user->image->filename) }}"
                                            alt="Generic placeholder image" class="img-fluid"
                                            style="width: 180px; border-radius: 10px;">
                                    @else
                                        <img src="{{ URL('Dashboard/img/profile/users/default.png') }}"
                                            alt="Generic placeholder image" class="img-fluid"
                                            style="width: 180px; border-radius: 10px;">
                                    @endif
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">{{ $user->name }}</h5>
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;">{{ $user->phone }}</p>
                                    <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                                        style="background-color: #efefef;">
                                        <div>
                                            <p class="small text-muted mb-1">Articles</p>
                                            <p class="mb-0">41</p>
                                        </div>
                                        <div class="px-3">
                                            <p class="small text-muted mb-1">Followers</p>
                                            <p class="mb-0">976</p>
                                        </div>
                                        <div>
                                            <p class="small text-muted mb-1">Rating</p>
                                            <p class="mb-0">8.5</p>
                                        </div>
                                    </div>
                                    <div class="d-flex pt-1">
                                        <button type="button"
                                            class="btn btn-outline-primary me-1 flex-grow-1">Chat</button>
                                        <button type="button" class="btn btn-primary flex-grow-1">Follow</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('js')
    {{-- <script src="{{url('Dashboard/js/chart.js')}}"></script> --}}
@endpush
