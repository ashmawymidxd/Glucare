@extends('Website/layouts/master')

@section('title')
    website my appointment
@endsection

@push('css')
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
    <div class="bg-white">
        <div class="container">
            <div class="table overflow-x-scroll" id="DataTableDiv">
                <table id="DataTable" class="table table-striped rounded-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="example-select-all"
                                        name="select_all" />
                                </div>
                            </th>
                            <th>Doctor</th>
                            <th>Meeting</th>
                            <th>Section</th>
                            <th>Patient</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>created at</th>
                            <th>Process</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" value="{{ $appointment->id }}" type="checkbox"
                                            role="switch" id="flexSwitchCheckDefault" name="delete_select" />
                                    </div>
                                </td>
                                <td>
                                    <a
                                        href="patient_doctor_message/{{ $appointment->doctor_id }}">{{ $appointment->doctor->name }}</a>
                                </td>
                                <td>
                                    @if ($appointment->zoom_meeting_url)
                                        <a href="{{ $appointment->zoom_meeting_url }}" target="_blank">Start Meeting</a>
                                    @else
                                        <span class="badge bg-danger">Not Started</span>
                                    @endif
                                </td>
                                <td>{{ $appointment->section->name }}</td>
                                <td>{{ $appointment->name }}</td>
                                <td>{{ $appointment->phone }}</td>
                                <td>{{ $appointment->appointment_date }}</td>
                                <td>{{ $appointment->appointment_time }}</td>
                                <td>
                                    {{ $appointment->type }}
                                </td>

                                <td>{{ $appointment->created_at->diffForHumans() }}</td>
                                <td>
                                    <div class="btn-group shadow-0">
                                        <a class="btn btn-secondary" href="/" data-mdb-toggle="modal"
                                            data-mdb-target="#update_status{{ $appointment->id }}"><i
                                                class="fas fa-edit"></i>&nbsp;&nbsp;
                                        </a>
                                        <a class="btn btn-danger" href="/" data-mdb-toggle="modal"
                                            data-mdb-target="#delete{{ $appointment->id }}"><i
                                                class="fas fa-trash"></i>&nbsp;&nbsp;</a>
                                    </div>

                                </td>
                            </tr>
                            </tr>
                            @include('Website.appointment.delete')
                            @include('Website.appointment.update')
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="example-select-all"
                                        name="select_all" />
                                </div>
                            </th>
                            <th>Doctor</th>
                            <th>Meeting</th>
                            <th>Section</th>
                            <th>Patient</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>created at</th>
                            <th>Process</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- appointment page -->

    @include('Website.appointment.appointment_modal')
    <!-- alert modal -->
    <div class="modal fade" id="appointmentAlert" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Doctor Feedback</h5>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body" id="responseMessage">...</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-mdb-ripple-init id="refresh2">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $("#refresh").click(function() {
                window.location = "/userAppointments";
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#refresh2").click(function() {
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

                            $('#responseMessageAdd').html(errorHtml);
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
