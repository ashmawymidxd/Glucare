@extends('Dashboard/layouts/master')

@section('title')
    {{ trans('Dashboard/employee.add_employee') }}
@endsection

@section('page-url')
    <h5 class="pt-1">{{ trans('Dashboard/home.dashboard') }} / <span class="active">
            {{ trans('Dashboard/employee.add_employee') }} </span></h5>
@endsection


@push('css')
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/custom-style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/custom-style-settings.css') }}" />
@endpush

@section('page-header')
    <div class="header">
        <div class="layer1"></div>
        <div class="layer2">
        </div>
    </div>
@endsection

@section('content')
    <!-- show the request response -->
    @if (session()->has('add'))
        <script>
            window.onload = function() {
                $("#DoctorAlert").modal('show');
                $(".modal-body").html('<p> The Doctor Data Saved Successfully </p>');
            }
        </script>
    @endif

    <!-- add doctor form data  -->
    <div class="mx-4 my-3">
        <div class="card p-2" style="margin-top: -70px">
            <!-- write your content here -->
            <div class="data-form p-3">
                <form autocomplete="off" id="AddDoctorForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-md-12 text-center mb-4">
                        <img class="rounded-circle shadow-4" id="output"
                            src="{{ URL('Dashboard/img/profile/employees/default.png') }}" style="width: 150px;"
                            alt="Avatar" />
                    </div>

                    <div class="p-3">
                        <div>
                            <h6 class="main-color">Add Profile Data</h6>

                            <div class="row" id="row">
                                <div class="col-md-6 mb-4">
                                    <input type="text" name="name" class="main-input" placeholder="Enter Username">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="email" name="email" id="Enter Email" class="main-input"
                                        placeholder="Enter Email" />
                                </div>
                            </div>

                            <div class="row" id="row">
                                <div class="col-md-6 mb-4">
                                    <input type="password" name="password" class="main-input" placeholder="Enter Password">
                                </div>
                                <div class="col-md-6">
                                    <label class="main-input d-flex align-items-center" for="customFile"><i
                                            class="fa-solid fa-camera-retro fa-xl"></i> <span class="mx-2">Select
                                            Profile Image</span> </label>
                                    <input type="file" class="form-control" id="customFile" accept="image/*"
                                        name="photo" onchange="loadFile(event)" hidden />
                                </div>
                            </div>

                            <div class="row" id="row">
                                <div class="col-md-6 mb-4">
                                    <input type="tel" name="phone" class="main-input" placeholder="Enter Phone">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <input type="text" name="employee_qualification" class="main-input"
                                        placeholder="Enter employee qualification">
                                </div>
                            </div>

                            <div class="row" id="row">
                                <div class="col-md-6 mb-4">
                                    <input type="text" name="employee_experience" id="employee_experience"
                                        class="main-input" placeholder="Enter employee experience" />
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div>
                            <button class="btn btn-primary w-100 p-3 submitButton_AD" id="">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- alert modal -->
    <div class="modal fade" id="DoctorAlert" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1"
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
                    <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                        data-mdb-dismiss="modal">Close</button>
                    <a type="button" class="btn btn-primary" href="{{ route('Employees.index') }}"
                        data-mdb-ripple-init>Employees List</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>

    <script>
        $("#custom_select_btn").click(function() {
            $("#custom_select_list").slideToggle();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#AddDoctorForm').submit(function(event) {
                event.preventDefault();
                var formData = new FormData($('#AddDoctorForm')[0]);
                // Disable the submit button and show loading text or spinner
                $('.submitButton_AD').prop('disabled', true).html(
                    '<i class="fa fa-spinner fa-spin"></i> Loading...');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('Employees.store') }}',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
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
                        $('.submitButton_AD').prop('disabled', false).html('Submit');

                        // Open the modal
                        $('#DoctorAlert').modal('show');
                    },

                });

            });
        });
    </script>
@endpush
