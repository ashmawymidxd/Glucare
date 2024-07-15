@extends('Website/layouts/master')

@section('title')
    website appointment about
@endsection

@push('css')
    <link rel="stylesheet" href="{{ URL::asset('Website/css/bootstrap.min.css') }}" />
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

    <!-- bradcam_area_start  -->
    @if ($doctor->image)
        <div class="bradcam_area breadcam_bg bradcam_overlay"
            style="background-image: url({{ asset('Dashboard/img/profile/doctors/' . $doctor->image->filename) }}); background-position: right;">
        @else
            <div class="bradcam_area breadcam_bg bradcam_overlay">
    @endif
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>{{ $doctor->name }}</h3>
                    <p><a href="index.html">Home /</a> About</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- bradcam_area_end  -->
@endsection
@section('content')
    <!-- welcome_docmed_area_start -->
    <div class="welcome_docmed_area card my-0 py-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_thumb">
                        <div class="welcome_thumb">
                            <div class="thumb_2">
                                <img src="{{ URL('Website/img/about/2.png') }}" alt="" />
                            </div>
                            <div class="thumb_1">
                                @if ($doctor->image)
                                    <img src="{{ asset('Dashboard/img/profile/doctors/' . $doctor->image->filename) }}"
                                        alt="" />
                                @else
                                    <img src="{{ Url::asset('Dashboard/img/profile/doctors/default.png') }}"
                                        alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
                        <h2>Welcome to {{ $doctor->name }} page</h2>
                        <h3>Best Care For Your <br>
                            Good Health</h3>
                        <p>Esteem spirit temper too say adieus who direct esteem.
                            It esteems luckily or picture placing drawing. Apartments frequently or motionless on reasonable
                            projecting expression.</p>
                        <ul>
                            <li> <i class="flaticon-right"></i> {{ $doctor->experience }} </li>
                            <li> <i class="flaticon-right"></i> {{ $doctor->qualification }}</li>
                            <li> <i class="flaticon-right"></i> {{ $doctor->speciality }} </li>
                            <li> <i class="flaticon-right"></i> {{ $doctor->section->name }} </li>
                            <li> <i class="flaticon-right"></i>
                                @foreach ($doctor->doctorappointments as $appointment)
                                    {{ $appointment->name }},
                                @endforeach
                            </li>
                        </ul>
                        <!-- second -->
                        <button type="button" class="btn btn-primary" data-mdb-toggle="modal"
                            data-mdb-target="#RatingDoctorModal">
                            Rating Doctor
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- rating -->
    @if ($doctorRatings != null)
        <div class="container text-dark mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex flex-row">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $doctorRatingsAvg)
                                    <i class="fas fa-star text-warning me-2"></i>
                                @else
                                    <i class="fas fa-star text-secondary me-2"></i>
                                @endif
                            @endfor
                        </div>
                        <h4 class="text-dark mb-0">all comments ({{ $doctorRatingsCount }})</h4>
                        <div class="card">
                            <div class="card-body p-2 d-flex align-items-center">
                                <h6 class="text-primary fw-bold small mb-0 me-1">Comments "ON"</h6>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                        checked />
                                    <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- this here --}}
                    @foreach ($doctorRatings as $doctorRating)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex flex-start">
                                    @if ($doctorRating->image)
                                        <img alt="Image placeholder" width="50px" height="50px"
                                            src="{{ URL('Dashboard/img/profile/users/' . $doctorRating->image->filename) }}"
                                            class="avatar rounded-circle mr-3">
                                    @else
                                        <img src="{{ URL('Dashboard/img/profile/users/default.png') }}"
                                            class="rounded-circle mr-3" height="50" width="50px" alt="Avatar"
                                            loading="lazy" />
                                    @endif
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="text-primary fw-bold mb-0">
                                                {{ $doctorRating->user_name }}
                                                <span class="text-dark ms-2">Hi, {{ $doctorRating->user_review }}</span>
                                            </h6>
                                            <p class="mb-0">{{ $doctorRating->created_at->diffForHumans() }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="small mb-0" style="color: #aaa;">
                                                <a href="#!" class="link-grey">Remove</a> •
                                                <a href="#!" class="link-grey">Reply</a> •
                                                <a href="#!" class="link-grey">Translate</a>
                                            </p>
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

                                                <i class="far fa-check-circle" style="color: #aaa;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            No Ratings Found
        </div>
    @endif
    <!-- expert_doctors_area_start -->
    <div class="expert_doctors_area card">
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
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="img/experts/1.png" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Mirazul Alom</h3>
                                <span>Neurologist</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="img/experts/2.png" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Mirazul Alom</h3>
                                <span>Neurologist</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="img/experts/3.png" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Mirazul Alom</h3>
                                <span>Neurologist</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="img/experts/4.png" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Mirazul Alom</h3>
                                <span>Neurologist</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="img/experts/1.png" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Mirazul Alom</h3>
                                <span>Neurologist</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="img/experts/2.png" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Mirazul Alom</h3>
                                <span>Neurologist</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- expert_doctors_area_end -->

    <!-- Modal -->
    <div class="modal fade" id="RatingDoctorModal" tabindex="-1" aria-labelledby="exampleModalLabel2"
        aria-hidden="true">
        <div class="modal-dialog d-flex justify-content-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Rating Doctor Modal</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="RatingDoctorForm" action="{{ route('rating_store') }}" method="post">
                        @method('POST')
                        @csrf
                        <div class="mb-4">
                            <p id="responseMessage"></p>
                        </div>
                        <!-- Name input -->
                        <div class="mb-4 d-flex justify-content-center mt-3 mb-3">
                            <i class="fas fa-star text-secondary submit-star mr-1 fa-xl" id="submit_star_1"
                                data-rating="1"></i>
                            <i class="fas fa-star text-secondary submit-star mr-1 fa-xl" id="submit_star_2"
                                data-rating="2"></i>
                            <i class="fas fa-star text-secondary submit-star mr-1 fa-xl" id="submit_star_3"
                                data-rating="3"></i>
                            <i class="fas fa-star text-secondary submit-star mr-1 fa-xl" id="submit_star_4"
                                data-rating="4"></i>
                            <i class="fas fa-star text-secondary submit-star mr-1 fa-xl" id="submit_star_5"
                                data-rating="5"></i>
                        </div>
                        <input type="hidden" name="user_rating" id="user_rating" value="0">
                        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="name2" class="form-control" name="user_name" />
                            <label class="form-label" for="name2">Name</label>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <textarea class="form-control" id="textAreaExample2" rows="3" name="user_review"></textarea>
                            <label class="form-label" for="textAreaExample2">Message</label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block" id="submitButton_RD">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

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

    <!-- retreve the doctor by it's department by ajax  -->
    <script>
        $(document).ready(function() {
            $('.departments_select').change(function() {
                var departmentId = $(this).val();
                if (departmentId) {
                    $.ajax({
                        url: "/get-doctors/" + departmentId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('.doctors_select').empty();
                            $.each(data, function(key, value) {
                                $('.doctors_select').append('<option value="' + value
                                    .id +
                                    '">' + value.name + '</option>');
                            });
                        },
                        error: function(error) {
                            // Parse the JSON response if it's a JSON string
                            var errorResponse = JSON.parse(error.responseText);
                            console.log(errorResponse);
                        },
                    });
                } else {
                    $('.doctors_select').empty();
                }
            });
        });
    </script>

    <!-- optimize rating model stars -->
    <script>
        $(document).ready(function() {
            $('.submit-star').mouseenter(function() {
                var rating = $(this).data('rating');
                $('.submit-star').removeClass('text-warning');
                for (var count = 1; count <= rating; count++) {
                    $('#submit_star_' + count).addClass('text-warning');
                }
                $('#user_rating').val(rating); // Update the value of the hidden input
            });

            $('.submit-star').mouseleave(function() {
                var rating = $('#user_rating').val();
                $('.submit-star').removeClass('text-warning');
                for (var count = 1; count <= rating; count++) {
                    $('#submit_star_' + count).addClass('text-warning');
                }
            });
        });
    </script>

    <!-- ajax code to send rating request -->
    @push('js')
        <script>
            $(document).ready(function() {
                $('#RatingDoctorForm').submit(function(event) {
                    event.preventDefault();

                    // Disable the submit button and show loading text or spinner
                    $('#submitButton_RD').prop('disabled', true).html(
                        '<i class="fa fa-spinner fa-spin"></i> sending...');

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('rating_store') }}',
                        data: $(this).serialize(),
                        success: function(response) {
                            $('#responseMessage').html('<div class="alert alert-success">' +
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
                            $('#submitButton_RD').prop('disabled', false).html('Submit');

                            // close this modal
                            $('#add').modal('hide');

                            // Open the modal
                            $('#SectionAlert').modal('show');
                        },

                    });

                });
            });
        </script>
    @endpush

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
        $(document).ready(function() {
            $(".js-example-basic-multiple").select2();
        });
    </script>
@endpush
