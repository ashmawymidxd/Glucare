@extends('Website/layouts/master')

@section('title')
    Chatboot Section
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
                                <h5>
                                    <a href="../index.html">Website</a> /
                                    <a href="">Chatboot</a>
                                </h5>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li>
                                            <a class="active" href="{{ route('chat.index') }}">Chat Room</a>
                                        </li>
                                        {{-- <li><a href="{{route('chat.users')}}">Users</a></li> --}}
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
    <!-- Navbar -->
    <div class="container">
        <div class="my-5">
            <!-- send message -->
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <img class="rounded-circle shadow-1-strong me-3 p-1"
                        src="{{ url('Dashboard/img/logo/' . $settings->image->filename) }}" alt="avatar" width="60"
                        height="60" />
                    <h4>Chat Bot</h4>
                </div>
                <div class="card-body" id="chat-box">
                    <div class="chat-box">
                        <div class="bot-inbox inbox">
                            <div class="msg-header">
                                <p>Hello, I am AI Chat Boot. How can I help you today?</p>
                            </div>
                            <input class="form-control p-3" placeholder="Type a message" id="prompt">
                            <button class="btn btn-primary btn-sm mt-3 p-3 w-25 shadow-0" id="send_button">
                                <i class="fas fa-paper-plane"></i> Send
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <!-- response message -->
            <div class="card mt-5">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Response</h4>
                        <div class="">
                            <button class="btn btn-light" id="copy_button" onclick="copyText()">
                                <i class="fas fa-copy mx-1" id="copy"></i>
                            </button>
                            <button class="btn btn-light" onclick="speakText()">
                                <i class="fas fa-volume-up mx-1" id="speak"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="response">
                    <div class="response">
                        <div class="bot-inbox inbox">
                            <div class="msg-header">
                                <p id="response-container">
                                    .... the response will be here
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{url('Dashboard/js/chatbot.js')}}"></script>
@endpush
