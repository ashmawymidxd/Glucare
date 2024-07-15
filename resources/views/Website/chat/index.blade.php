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
    <div class="container-fliud">
        <div class="row my-2">
            <div class="col-md-4">
                <div class="card p-3 " style="height: 600px;overflow-y: scroll;">
                    <div class="input-group rounded mb-3">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                            aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    <div data-mdb-perfect-scrollbar="true">
                        <ul class="list-unstyled mb-0">
                            <li class="p-2 border-bottom">
                                <a href="#!" class="d-flex justify-content-between">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                                alt="avatar" class="d-flex align-self-center me-3" width="60">
                                            <span class="badge bg-success badge-dot"></span>
                                        </div>
                                        <div class="pt-1">
                                            <p class="fw-bold mb-0">Marie Horwitz</p>
                                            <p class="small text-muted">Hello, Are you there?</p>
                                        </div>
                                    </div>
                                    <div class="pt-1">
                                        <p class="small text-muted mb-1">Just now</p>
                                        <span class="badge bg-danger rounded-pill float-end">3</span>
                                    </div>
                                </a>
                            </li>
                            <li class="p-2 border-bottom">
                                <a href="#!" class="d-flex justify-content-between">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                                                alt="avatar" class="d-flex align-self-center me-3" width="60">
                                            <span class="badge bg-warning badge-dot"></span>
                                        </div>
                                        <div class="pt-1">
                                            <p class="fw-bold mb-0">Alexa Chung</p>
                                            <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                        </div>
                                    </div>
                                    <div class="pt-1">
                                        <p class="small text-muted mb-1">5 mins ago</p>
                                        <span class="badge bg-danger rounded-pill float-end">2</span>
                                    </div>
                                </a>
                            </li>
                            <li class="p-2 border-bottom">
                                <a href="#!" class="d-flex justify-content-between">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                                                alt="avatar" class="d-flex align-self-center me-3" width="60">
                                            <span class="badge bg-success badge-dot"></span>
                                        </div>
                                        <div class="pt-1">
                                            <p class="fw-bold mb-0">Danny McChain</p>
                                            <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                        </div>
                                    </div>
                                    <div class="pt-1">
                                        <p class="small text-muted mb-1">Yesterday</p>
                                    </div>
                                </a>
                            </li>
                            <li class="p-2 border-bottom">
                                <a href="#!" class="d-flex justify-content-between">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp"
                                                alt="avatar" class="d-flex align-self-center me-3" width="60">
                                            <span class="badge bg-danger badge-dot"></span>
                                        </div>
                                        <div class="pt-1">
                                            <p class="fw-bold mb-0">Ashley Olsen</p>
                                            <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                        </div>
                                    </div>
                                    <div class="pt-1">
                                        <p class="small text-muted mb-1">Yesterday</p>
                                    </div>
                                </a>
                            </li>
                            <li class="p-2 border-bottom">
                                <a href="#!" class="d-flex justify-content-between">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                                alt="avatar" class="d-flex align-self-center me-3" width="60">
                                            <span class="badge bg-warning badge-dot"></span>
                                        </div>
                                        <div class="pt-1">
                                            <p class="fw-bold mb-0">Kate Moss</p>
                                            <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                        </div>
                                    </div>
                                    <div class="pt-1">
                                        <p class="small text-muted mb-1">Yesterday</p>
                                    </div>
                                </a>
                            </li>
                            <li class="p-2">
                                <a href="#!" class="d-flex justify-content-between">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                                alt="avatar" class="d-flex align-self-center me-3" width="60">
                                            <span class="badge bg-success badge-dot"></span>
                                        </div>
                                        <div class="pt-1">
                                            <p class="fw-bold mb-0">Ben Smith</p>
                                            <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                        </div>
                                    </div>
                                    <div class="pt-1">
                                        <p class="small text-muted mb-1">Yesterday</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card p-3 " style="height: 600px">
                    <div class="pt-3 pe-3" data-mdb-perfect-scrollbar="true" style="overflow-y: scroll;">
                        <div class="d-flex flex-row justify-content-start">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                            <div style="">
                                <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Lorem ipsum
                                    dolor
                                    sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore
                                    magna aliqua.</p>
                                <p class="small ms-3 mb-3 rounded-3 text-muted float-end">12:00 PM | Aug 13</p>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                            <div>
                                <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Ut enim ad minim veniam,
                                    quis
                                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                <p class="small me-3 mb-3 rounded-3 text-muted">12:00 PM | Aug 13</p>
                            </div>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                        </div>

                        <div class="d-flex flex-row justify-content-start">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                            <div>
                                <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Duis aute
                                    irure
                                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                </p>
                                <p class="small ms-3 mb-3 rounded-3 text-muted float-end">12:00 PM | Aug 13</p>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                            <div>
                                <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Excepteur sint occaecat
                                    cupidatat
                                    non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <p class="small me-3 mb-3 rounded-3 text-muted">12:00 PM | Aug 13</p>
                            </div>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                        </div>

                        <div class="d-flex flex-row justify-content-start">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                            <div>
                                <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Sed ut
                                    perspiciatis
                                    unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
                                    rem
                                    aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                                    dicta
                                    sunt explicabo.</p>
                                <p class="small ms-3 mb-3 rounded-3 text-muted float-end">12:00 PM | Aug 13</p>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                            <div>
                                <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Nemo enim ipsam
                                    voluptatem quia
                                    voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos
                                    qui
                                    ratione voluptatem sequi nesciunt.</p>
                                <p class="small me-3 mb-3 rounded-3 text-muted">12:00 PM | Aug 13</p>
                            </div>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                        </div>

                        <div class="d-flex flex-row justify-content-start">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                            <div>
                                <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Neque porro
                                    quisquam
                                    est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non
                                    numquam
                                    eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                <p class="small ms-3 mb-3 rounded-3 text-muted float-end">12:00 PM | Aug 13</p>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                            <div>
                                <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Ut enim ad minima veniam,
                                    quis
                                    nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea
                                    commodi
                                    consequatur?</p>
                                <p class="small me-3 mb-3 rounded-3 text-muted">12:00 PM | Aug 13</p>
                            </div>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                        </div>

                    </div>

                    <div class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                            alt="avatar 3" style="width: 40px; height: 100%;">
                        <input type="text" class="form-control form-control-lg" id="exampleFormControlInput2"
                            placeholder="Type message">
                        <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
                        <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
                        <a class="ms-3" href="#!"><i class="fas fa-paper-plane"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{-- <script src="{{url('Dashboard/js/chart.js')}}"></script> --}}
@endpush
