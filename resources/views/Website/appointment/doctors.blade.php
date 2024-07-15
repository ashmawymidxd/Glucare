@extends('Website/layouts/master')

@section('title')
    website appointment doctors
@endsection

@push('css')
    <!-- the bellow to links for bootstrap5 tabs  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
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
    <link rel="stylesheet" href="{{ URL::asset('Website/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Website/css/mdb.min.css') }}" />
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
    <!-- expert_doctors_area_start -->
    <style>
        #myTab .active {
            background-color: #3b71ca;
            color: white
        }
    </style>
    <div class="card rounded-0 my-5 p-3">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            @foreach ($departments as $key => $section)
                <li class="nav-item" role="presentation">
                    <button class="nav-link{{ $key === 0 ? ' active' : '' }}" id="tab-{{ $key }}"
                        data-bs-toggle="tab" data-bs-target="#tab-content-{{ $key }}" type="button"
                        role="tab" aria-controls="tab-content-{{ $key }}"
                        aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ $section->name }}</button>
                </li>
            @endforeach
        </ul>
        <div class="tab-content my-3" id="myTabContent">
            @foreach ($departments as $key => $section)
                <div class="tab-pane fade{{ $key === 0 ? ' show active' : '' }}" id="tab-content-{{ $key }}"
                    role="tabpanel" aria-labelledby="tab-{{ $key }}">
                    <div class="row">
                        @foreach ($doctors->where('section.name', $section->name) as $doctor)
                            <div class="col-md-6 col-lg-3">
                                <a href="{{ route('doctors_website.show', $doctor->id) }}">
                                    <div class="single_expert mb-40" style="border: 1px solid #ddd">
                                        <div class="expert_thumb bg-secondary">
                                            @if ($doctor->image)
                                                <img src="{{ Url::asset('Dashboard/img/profile/doctors/' . $doctor->image->filename) }}"
                                                    alt="" style="width: 100%">
                                            @else
                                                <img src="{{ Url::asset('Dashboard/img/profile/doctors/default.png') }}"
                                                    alt="" style="width: 100%">
                                            @endif
                                        </div>
                                        <div class="experts_name p-3">
                                            <h3>Dr. {{ $doctor->name }}</h3>
                                            <span class="">{{ $doctor->section->name }}</span>
                                            <div class="d-flex justify-content-between">
                                                <p>
                                                    @if ($doctor->ratings->isNotEmpty() && $doctor->ratings->first()->average_rating)
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $doctor->ratings->first()->average_rating)
                                                                <i class="fas fa-star text-warning me-2"></i>
                                                            @else
                                                                <i class="fas fa-star text-secondary me-2"></i>
                                                            @endif
                                                        @endfor
                                                    @else
                                                        <i class="fas fa-star text-secondary me-2"></i>
                                                    @endif

                                                </p>
                                                <p>
                                                    @if ($doctor->ratings->isNotEmpty() && $doctor->ratings->first()->average_rating)
                                                        {{ round($doctor->ratings->first()->average_rating, 1) }}
                                                    @else
                                                        0
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- appointment page -->
    @include('Website.appointment.appointment_modal')
@endsection

@push('js')
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
@endpush
