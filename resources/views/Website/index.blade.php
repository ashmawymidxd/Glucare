@extends('Website/layouts/master')

@section('title')
    website users home
@endsection
@push('css')
    <link rel="stylesheet" href="{{ URL::asset('Website/css/flaticon.css') }}" />
@endpush
@section('sub-header')
    <!-- header -->
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
                                    <a href="{{ route('website.user') }}">Home</a>
                                </h6>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="{{ route('website.user') }}">Home</a></li>
                                        <li><a href="{{ route('website.user.medicalinfo') }}">Medical Info</a></li>
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
    <!-- slider_area_start -->
    <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <!-- Inner -->

        <div class="carousel-inner">
            <!-- Single item -->
            <div class="carousel-item active">
                <img src="{{ url('Dashboard/img/pannels/slide1.png') }}" style="height: 500px" class="d-block w-100"
                    alt="Sunset Over the City" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Inslin Recommendation</h5>
                    <p class="text-white">by using machine learning to recommend the best insulin dose for the patient diam
                        sed stet.</p>
                </div>
            </div>
            <div class="carousel-item active">
                <img src="{{ url('Dashboard/img/pannels/slide3.png') }}" style="height: 500px" class="d-block w-100"
                    alt="Sunset Over the City" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Detect Diabetes</h5>
                    <p class="text-white">by using machine learning algorismes to classify if the patient have diabetes or
                        not diam sed stet.
                    </p>
                </div>
            </div>
            <div class="carousel-item active">
                <img src="{{ url('Dashboard/img/pannels/slide2.png') }}" style="height: 500px" class="d-block w-100"
                    alt="Sunset Over the City" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Doctors Appointments</h5>
                    <p class="text-white">by providing a system to allow the patient to book an appointment with the doctor
                        diam sed stet.</p>
                </div>
            </div>
        </div>
        <!-- Inner -->

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
            <i class="fa-solid fa-arrow-left card p-3 rounded-circle" id="prev"></i>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
            <i class="fa-solid fa-arrow-right card p-3 rounded-circle" id="next"></i>
        </button>
    </div>
    <!-- slider_area_end -->

    <!-- welcome_docmed_area_start -->
    <div class="welcome_docmed_area card shadow-0 rounded-0 p-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_thumb">
                        <div class="thumb_1">
                            <img src="{{ url('Website/img/home/world1.png') }}" alt="">
                        </div>
                        <div class="thumb_2 animate">
                            {{-- <img src="{{url('Website/img/home/world2.png')}}" alt=""> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
                        <h2>Welcome to {{ $settings->website_name }}</h2>
                        <h3>Best Care For <br>
                            Good Diabetes Controlle </h3>
                        <p>
                            AI algorithms can analyze an individual's diet preferences, limitations, and
                            health goals to generate personalized meal plans. These plans can be designed
                            to help stabilize blood sugar levels, control carbohydrate consumption,
                            and promote overall health.
                        </p>
                        <ul>
                            <li> <i class="flaticon-right"></i> Apartments frequently or motionless.</li>
                            <li> <i class="flaticon-right"></i> Dietary Recommendations.</li>
                            <li> <i class="flaticon-right"></i> Insulin Dose Recommendations.</li>
                            <li> <i class="flaticon-right"></i> Health Records and Reports.</li>
                            <li> <i class="flaticon-right"></i> Alerts for abnormal readings.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome_docmed_area_end -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Services</p>
                <h1>Health Care Solutions</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class=" card  rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa-solid fa-person text-primary fa-2xl"></i>
                        </div>
                        <h4 class="mb-3">Detect Diabetes</h4>
                        <p class="mb-4">by using machine learning algorismes to classify if the patient have diabetes or
                            not
                            diam sed stet.</p>


                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class=" card  rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa-solid fa-wine-bottle text-primary fa-2xl"></i>
                        </div>
                        <h4 class="mb-3">Inslin Recommendation</h4>
                        <p class="mb-4">by using machine learning to recommend the best insulin dose for the patient
                            diam sed stet.</p>


                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class=" card  rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa-solid fa-seedling text-primary fa-2xl"></i>
                        </div>
                        <h4 class="mb-3">Dietary Recommendation</h4>
                        <p class="mb-4">by analizing the patient data to recommend the best diet for the patient
                            diam sed stet.</p>


                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class=" card  rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa-solid fa-dumbbell text-primary fa-2xl"></i>
                        </div>
                        <h4 class="mb-3">Activity Recommenation</h4>
                        <p class="mb-4">by analizing the patient data to recommend the best activity for the patient
                            diam sed stet.</p>


                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class=" card  rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa-solid fa-comments text-primary fa-2xl"></i>
                        </div>
                        <h4 class="mb-3">Support Community</h4>
                        <p class="mb-4">by adding live chat system and medical blog to add medical posts and allow the
                            interactive between them
                            diam sed stet.</p>


                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class=" card  rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa-solid fa-calendar-check text-primary fa-2xl"></i>
                        </div>
                        <h4 class="mb-3">Doctors Appointments</h4>
                        <p class="mb-4">by providing a system to allow the patient to book an appointment with the doctor
                            diam sed stet.</p>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service End -->
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
        <p class="d-inline-block border rounded-pill py-1 px-4">Users Rating</p>
        <h1>Some Of Feedback</h1>
    </div>

    <!-- Carousel wrapper -->
    <div id="carouselExampleControls" class="carousel slide text-center carousel-dark card p-3 rounded-0"
        data-mdb-ride="carousel">
        <div class="carousel-inner">
            @foreach ($doctorRatings as $doctorRating)
                <div class="carousel-item active">
                    @if ($doctorRating->image)
                        <img alt="Image placeholder" width="100px" height="100px"
                            src="{{ URL('Dashboard/img/profile/users/' . $doctorRating->image->filename) }}"
                            class="avatar rounded-circle mr-3">
                    @else
                        <img src="{{ URL('Dashboard/img/profile/users/default.png') }}" class="rounded-circle mr-3"
                            height="100" width="100px" alt="Avatar" loading="lazy" />
                    @endif
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <h5 class="mb-3 mt-5"> {{ $doctorRating->user_name }}</h5>
                            <p>{{ $doctorRating->created_at->diffForHumans() }}</p>
                            <p class="text-muted">
                                {{ $doctorRating->user_review }}
                            </p>
                        </div>
                    </div>
                        <div class="list-unstyled d-flex justify-content-center text-warning mb-0">
                            <div class="d-flex flex-row">
                                @php
                                    $userRating = $doctorRating->user_rating;
                                @endphp

                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $userRating)
                                        <i class="fas fa-star text-warning me-2"></i>
                                    @else
                                        <i class="fas fa-star text-secondary me-2"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>
                </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleControls"
            data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleControls"
            data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel wrapper -->
@endsection

@push('js')
    {{-- <script src="{{ url('Website/js/slider.js') }}"></script> --}}
@endpush
