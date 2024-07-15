@extends('Website/layouts/master')

@section('title')
    website appointment section
@endsection

@push('css')
    <link rel="stylesheet" href="{{ URL::asset('Website/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Website/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Website/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Website/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Website/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Website/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Website/css/gijgo.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Website/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Website/css/slicknav.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Website/css/website_style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Website/css/mdb.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Website/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Website/css/mdb.min.css') }}" />
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
                                <h6><a href="../index.html">Website</a> / <a href="../index.html">Appointmet</a> / <a
                                        href="./index.html">Home</a></h6>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="{{ route('appointment.index') }}">home</a></li>
                                        <li><a href="{{ route('doctors_website.index') }}">Doctors</a></li>
                                        <li><a href="{{ route('userAppointments') }}">My appointments</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                {{-- <div class="book_btn d-none d-lg-block">
                                    <a class="popup-with-form" href="#test-form">Make an Appointment</a>
                                </div> --}}
                                <button type="button" class="btn btn-outline-primary" data-mdb-toggle="modal"
                                    data-mdb-target="#addAppointmentModal">
                                    Make appointment
                                </button>
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
    <!-- slider -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider d-flex align-items-center slider_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text">
                                <h3>
                                    <span>Health care</span> <br />
                                    For Hole Family
                                </h3>
                                <p>
                                    In healthcare sector, service excellence is the facility of
                                    <br />
                                    the hospital as healthcare service provider to consistently.
                                </p>
                                <a href="#" class="boxed-btn3">Check Our Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center slider_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text">
                                <h3>
                                    <span>Health care</span> <br />
                                    For Hole Family
                                </h3>
                                <p>
                                    In healthcare sector, service excellence is the facility of
                                    <br />
                                    the hospital as healthcare service provider to consistently.
                                </p>
                                <a href="#" class="boxed-btn3">Check Our Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center slider_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text">
                                <h3>
                                    <span>Health care</span> <br />
                                    For Hole Family
                                </h3>
                                <p>
                                    In healthcare sector, service excellence is the facility of
                                    <br />
                                    the hospital as healthcare service provider to consistently.
                                </p>
                                <a href="#" class="boxed-btn3">Check Our Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- service_area_start -->
    <div class="service_area">
        <div class="container p-0">
            <div class="row no-gutters">
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        <div class="icon">
                            <i class="flaticon-electrocardiogram"></i>
                        </div>
                        <h3>Hospitality</h3>
                        <p>
                            Clinical excellence must be the priority for any health care
                            service provider.
                        </p>
                        <a href="#" class="boxed-btn3-white">Apply For a Bed</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        <div class="icon">
                            <i class="flaticon-emergency-call"></i>
                        </div>
                        <h3>Emergency Care</h3>
                        <p>
                            Clinical excellence must be the priority for any health care
                            service provider.
                        </p>
                        <a href="#" class="boxed-btn3-white">+10 672 356 3567</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        <div class="icon">
                            <i class="flaticon-first-aid-kit"></i>
                        </div>
                        <h3>Chamber Service</h3>
                        <p>
                            Clinical excellence must be the priority for any health care
                            service provider.
                        </p>
                        <a href="#" class="boxed-btn3-white">Make an Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service_area_end -->

    <!-- welcome_docmed_area_start -->
    <div class="welcome_docmed_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_thumb">
                        <div class="thumb_1">
                            <img src="{{ URL('Website/img/about/1.png') }}" alt="" />
                        </div>
                        <div class="thumb_2">
                            <img src="{{ URL('Website/img/about/2.png') }}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
                        <h2>Welcome to Docmed</h2>
                        <h3>
                            Best Care For Your <br />
                            Good Health
                        </h3>
                        <p>
                            Esteem spirit temper too say adieus who direct esteem. It
                            esteems luckily or picture placing drawing. Apartments
                            frequently or motionless on reasonable projecting expression.
                        </p>
                        <ul>
                            <li>
                                <i class="flaticon-right"></i> Apartments frequently or
                                motionless.
                            </li>
                            <li>
                                <i class="flaticon-right"></i> Duis aute irure dolor in
                                reprehenderit in voluptate.
                            </li>
                            <li>
                                <i class="flaticon-right"></i> Voluptatem quia voluptas sit
                                aspernatur.
                            </li>
                        </ul>
                        <a href="#" class="boxed-btn3-white-2">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome_docmed_area_end -->

    <!-- offers_area_start -->
    <div class="our_department_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-55">
                        <h3>Our Departments</h3>
                        <p>
                            Esteem spirit temper too say adieus who direct esteem. <br />
                            It esteems luckily or picture placing drawing.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($departments as $department)
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="single_department" style="height: 350px">
                            <div class="department_thumb">
                                <img src="img/department/1.png" alt="" />
                            </div>
                            <div class="department_content">
                                <h3><a href="#">{{ $department->name }}</a></h3>
                                <p>{{ $department->description }}</p>
                                <a href="#" class="learn_more">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- offers_area_end -->

    <!-- testmonial_area_start -->
    <div class="testmonial_area">
        <div class="testmonial_active owl-carousel">
            <div class="single-testmonial testmonial_bg_1 overlay2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1">
                            <div class="testmonial_info text-center">
                                <div class="quote">
                                    <i class="flaticon-straight-quotes"></i>
                                </div>
                                <p>
                                    Donec imperdiet congue orci consequat mattis. Donec rutrum
                                    porttitor <br />
                                    sollicitudin. Pellentesque id dolor tempor sapien feugiat
                                    ultrices nec sed neque.
                                    <br />
                                    Fusce ac mattis nulla. Morbi eget ornare dui.
                                </p>
                                <div class="testmonial_author">
                                    <h4>Asana Korim</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-testmonial testmonial_bg_2 overlay2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1">
                            <div class="testmonial_info text-center">
                                <div class="quote">
                                    <i class="flaticon-straight-quotes"></i>
                                </div>
                                <p>
                                    Donec imperdiet congue orci consequat mattis. Donec rutrum
                                    porttitor <br />
                                    sollicitudin. Pellentesque id dolor tempor sapien feugiat
                                    ultrices nec sed neque.
                                    <br />
                                    Fusce ac mattis nulla. Morbi eget ornare dui.
                                </p>
                                <div class="testmonial_author">
                                    <h4>Asana Korim</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-testmonial testmonial_bg_1 overlay2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1">
                            <div class="testmonial_info text-center">
                                <div class="quote">
                                    <i class="flaticon-straight-quotes"></i>
                                </div>
                                <p>
                                    Donec imperdiet congue orci consequat mattis. Donec rutrum
                                    porttitor <br />
                                    sollicitudin. Pellentesque id dolor tempor sapien feugiat
                                    ultrices nec sed neque.
                                    <br />
                                    Fusce ac mattis nulla. Morbi eget ornare dui.
                                </p>
                                <div class="testmonial_author">
                                    <h4>Asana Korim</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testmonial_area_end -->

    <!-- business_expert_area_start  -->
    <div class="business_expert_area">
        <div class="business_tabs_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="nav" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                    role="tab" aria-controls="home" aria-selected="true">Excellent Services</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Qualified
                                    Doctors</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                    aria-controls="contact" aria-selected="false">Emergency
                                    Departments</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="border_bottom">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-md-6">
                                <div class="business_info">
                                    <div class="icon">
                                        <i class="flaticon-first-aid-kit"></i>
                                    </div>
                                    <h3>Leading edge care for Your family</h3>
                                    <p>
                                        Esteem spirit temper too say adieus who direct esteem. It
                                        esteems luckily picture placing drawing. Apartments
                                        frequently or motionless on reasonable projecting
                                        expression.
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="business_thumb">
                                    <img src="img/about/business.png" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-md-6">
                                <div class="business_info">
                                    <div class="icon">
                                        <i class="flaticon-first-aid-kit"></i>
                                    </div>
                                    <h3>Leading edge care for Your family</h3>
                                    <p>
                                        Esteem spirit temper too say adieus who direct esteem. It
                                        esteems luckily picture placing drawing. Apartments
                                        frequently or motionless on reasonable projecting
                                        expression.
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="business_thumb">
                                    <img src="img/about/business.png" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-md-6">
                                <div class="business_info">
                                    <div class="icon">
                                        <i class="flaticon-first-aid-kit"></i>
                                    </div>
                                    <h3>Leading edge care for Your family</h3>
                                    <p>
                                        Esteem spirit temper too say adieus who direct esteem. It
                                        esteems luckily picture placing drawing. Apartments
                                        frequently or motionless on reasonable projecting
                                        expression.
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="business_thumb">
                                    <img src="img/about/business.png" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- business_expert_area_end  -->

    <!-- expert_doctors_area_start -->
    <div class="expert_doctors_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="doctors_title mb-55">
                        <h3>Expert Doctors</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="expert_active owl-carousel">
                        @foreach ($doctors as $doctor)
                            <div class="single_expert">
                                <div class="expert_thumb">
                                    <img src="img/experts/1.png" alt="" />
                                </div>
                                <div class="experts_name text-center">
                                    <h3>{{ $doctor->name }}</h3>
                                    <span>{{ $doctor->section->name }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- appointment page -->
    @include('Website.appointment.appointment_modal')
@endsection

@push('js')
    <!-- refresh -->
    <script>
        $(document).ready(function() {
            $("#refresh").click(function() {
                window.location = "/userAppointments";
            });
        });
    </script>

    <!-- add appointment -->
    <script>
        $(document).ready(function() {
            $('#AddAppointmentForm').submit(function(event) {
                event.preventDefault();

                // Disable the submit button and show loading text or spinner
                $('#submitButton_A').prop('disabled', true).html(
                    '<i class="fa fa-spinner fa-spin"></i> Loading...');

                $.ajax({
                    datatype: 'multipart/form-data',
                    type: 'POST',
                    url: '{{ route('appointment.store') }}',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#responseMessageAdd').html('<div class="alert alert-success">' +
                            response.message + '</div>');
                    },
                    error: function(error) {
                        // Parse the JSON response if it's a JSON string
                        var errorResponse = JSON.parse(error.responseText);

                        // Check if the errorResponse has a 'message' property
                        if (errorResponse.message) {
                            var errorHtml = '<div class="alert alert-warning">' + errorResponse
                                .message + '</div>';

                            for (var fieldName in errorResponse.errors) {
                                if (errorResponse.errors.hasOwnProperty(fieldName)) {
                                    var fieldErrors = errorResponse.errors[fieldName];
                                    fieldErrors.forEach(function(errorMessage) {
                                        errorHtml +=
                                            '<div class="alert alert-warning">' +
                                            errorMessage + '</div>';
                                    });
                                }
                            }

                            $('#responseMessage').html(errorHtml);
                        }
                    },
                    complete: function() {
                        // Enable the submit button and restore its original text
                        $('.submitButton_A').prop('disabled', false).html('Submit');
                        $("#addAppointmentModal").modal('hide')
                        // Open the modal
                        $('#AppointmentAlertAdd').modal('show');
                    },

                });

            });
        });
    </script>

    <!-- retreve the doctor by it's department by ajax  -->
    <script>
        $(document).ready(function() {
            $('.departments_select').change(function() {
                var departmentId = $(this).val();
                if (departmentId) {
                    $.ajax({
                        url: "get-doctors/" + departmentId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('.doctors_select').empty();
                            $.each(data, function(key, value) {
                                $('.doctors_select').append('<option value="' + value
                                    .id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('.doctors_select').empty();
                }
            });
        });
    </script>

    <!-- JS here -->
    <script src="{{ url('Website/js_appointment/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ url('Website/js_appointment/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ url('Website/js_appointment/popper.min.js') }}"></script>
    <script src="{{ url('Website/js_appointment/bootstrap.min.js') }}"></script>
    <script src="{{ url('Website/js_appointment/owl.carousel.min.js') }}"></script>
    <script src="{{ url('Website/js_appointment/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('Website/js_appointment/ajax-form.js') }}"></script>
    <script src="{{ url('Website/js_appointment/waypoints.min.js') }}"></script>
    <script src="{{ url('Website/js_appointment/jquery.counterup.min.js') }}"></script>
    <script src="{{ url('Website/js_appointment/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ url('Website/js_appointment/scrollIt.js') }}"></script>
    <script src="{{ url('Website/js_appointment/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ url('Website/js_appointment/wow.min.js') }}"></script>
    <script src="{{ url('Website/js_appointment/nice-select.min.js') }}"></script>
    <script src="{{ url('Website/js_appointment/jquery.slicknav.min.js') }}"></script>
    <script src="{{ url('Website/js_appointment/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('Website/js_appointment/plugins.js') }}"></script>
    <script src="{{ url('Website/js_appointment/gijgo.min.js') }}"></script>
    <!--contact js-->
    <script src="{{ url('Website/js_appointment/contact.js') }}"></script>
    <script src="{{ url('Website/js_appointment/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ url('Website/js_appointment/jquery.form.js') }}"></script>
    <script src="{{ url('Website/js_appointment/jquery.validate.min.js') }}"></script>
    <script src="{{ url('Website/js_appointment/mail-script.js') }}"></script>
    <script src="{{ url('Website/js_appointment/main.js') }}"></script>
    <script>
        $("#datepicker").datepicker({
            iconsLibrary: "fontawesome",
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>',
            },
        });
        $("#datepicker2").datepicker({
            iconsLibrary: "fontawesome",
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>',
            },
        });

        // $(document).ready(function() {
        //     $(".js-example-basic-multiple").select2();
        // });
    </script>
@endpush
