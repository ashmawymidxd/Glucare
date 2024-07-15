@extends('Website/layouts/master')

@section('title')
    website user profile
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
                                    <a href="{{ route('website.user') }}">Website / </a>
                                    <a href="{{ route('website.user') }}">Users /</a>
                                    <a href="{{ route('website.user') }}">Profile</a>
                                </h6>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ route('website.user.contact') }}">Contact</a></li>
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
        <div class="row">
            <!-- show the request response -->
            @if (session()->has('edit_data'))
                <script>
                    window.onload = function() {
                        $("#UserAlert").modal('show');
                        $(".modal-body").html('<p> The User Data Updated Successfully </p>');
                    }
                </script>
            @endif
            <!-- user info -->
            <div class="col-xl-4 order-xl-2">
                <div class="card card-profile">
                    <img src="{{ URL('Dashboard/img/pannels/layerUp.png') }}" alt="Image placeholder" class="card-img-top">

                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <div>
                                    @if ($user->image)
                                        <img src="{{ URL('Dashboard/img/profile/users/' . $user->image->filename) }}"
                                            class="rounded-circle" id="output" width="120px" height="120px"
                                            style="margin-top:-60px;border:2px solid white">
                                    @else
                                        <img src="{{ URL('Dashboard/img/profile/users/default.png') }}"
                                            class="rounded-circle" id="output" width="120px" height="120px"
                                            style="margin-top:-60px;border:2px solid white">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col my-3">
                                <p> <strong class="h6 font-wight-200">Username</strong> : {{ $user->name }}</p>
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-6 mb-3">
                                <h6>Email</h6>
                                <p class="text-muted">{{ $user->email }}</p>
                            </div>
                            <div class="col-6 mb-3">
                                <h6>Phone</h6>
                                <p class="text-muted">{{ $user->phone }}</p>
                            </div>
                            <div class="col-6 mb-3">
                                <h6>Status</h6>
                                <p class="text-muted">{{ $user->status }}</p>
                            </div>
                            <div class="col-6 mb-3">
                                <h6>Join at</h6>
                                <p class="text-muted">{{ $user->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- edit user info -->
            <div class="col-xl-8 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Edit profile </h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update', 'test') }}" method="post" autocomplete="off"
                            enctype="multipart/form-data">
                            {{ method_field('patch') }}
                            {{ csrf_field() }}
                            <input class="form-control" value="{{ $user->id }}" name="id" type="hidden">
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Username</label>
                                            <input type="username" id="input-username" class="form-control" name="name"
                                                placeholder="Username" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email address</label>
                                            <input type="email" id="input-email" class="form-control" name="email"
                                                placeholder="Email Address" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Contact information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-city">Phone</label>
                                            <input type="tel" id="input-city" class="form-control" name="phone"
                                                placeholder="City" value="{{ $user->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Profile Img</label>
                                            <input type="file" id="customFile" class="form-control" accept="image/*"
                                                name="photo" onchange="loadFile(event)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 p-3 my-3">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- alert modal -->
            <div class="modal fade" id="UserAlert" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">...</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                                data-mdb-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-mdb-ripple-init>Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{-- <script src="{{url('Website/js/chart.js')}}"></script> --}}
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endpush
