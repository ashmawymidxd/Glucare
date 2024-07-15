@extends('Website/layouts/master')

@section('title')
    get start
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
                                <h6><a href="../index.html">Website</a> / <a href="./index.html">Getstart</a></h6>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="#Doctors.html">More Info</a></li>
                                        <li><a href="#about.html">Policy</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3  d-lg-block">
                            <div class="Appointment">
                                <div class="book_btn  d-lg-block">

                                </div>
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
    <!-- Modal Respons -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Request Status</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="responseMessage">...</div>
                <div class="modal-footer">
                    <button id="close_btn" type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="refrsh">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Bmi-->
    <div class="modal fade" id="exampleModalBmi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Body Mass Index</h5>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="result"></p>

                    <label for="weight">Weight (kg):</label>
                    <input type="number" id="weight" class="form-control" min="0" step="any" />

                    <label for="height">Height (m):</label>
                    <input type="number" id="height" class="form-control" min="0" step="any" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                        data-mdb-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="calculateBtns">
                        Calculate</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal search -->
    <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body" id="searchResults">...</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                        data-mdb-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-8 my-3">
                <div class="card">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Save Diabetes Data</h5>
                    </div>
                    <div class="card-body">
                        <form id="patientDataForm">
                            @csrf
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <input type="hidden" name="user_id" value="{{ Auth('web')->user()->id }}">

                            <div class="row mb-4">
                                <div class="col">
                                    <div>
                                        <label for="" class="form-label">Select Hypertension Statues</label>
                                    </div>
                                    <div class="d-flex gap-10 mb-3">
                                        <!-- Default checked radio -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="hypertension"
                                                id="flexRadioDefault3" value="1" checked />
                                            <label class="form-check-label" for="flexRadioDefault3">Have
                                            </label>
                                        </div>
                                        <!-- Default radio -->
                                        <div class="form-check mx-5">
                                            <input class="form-check-input" type="radio" name="hypertension"
                                                id="flexRadioDefault4" value="0" />
                                            <label class="form-check-label" for="flexRadioDefault4">Dont Have
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div>
                                        <label for="" class="form-label">Select Heart Disease Statues</label>
                                    </div>
                                    <div class="d-flex gap-10 mb-3">
                                        <!-- Default checked radio -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="heart_disease"
                                                id="flexRadioDefault2" value="1" checked />
                                            <label class="form-check-label" for="flexRadioDefault2">Have
                                            </label>
                                        </div>
                                        <!-- Default radio -->
                                        <div class="form-check mx-5">
                                            <input class="form-check-input" type="radio" name="heart_disease"
                                                id="flexRadioDefault1" value="0" />
                                            <label class="form-check-label" for="flexRadioDefault1">Dont Have
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline p-2">
                                        <input type="text" formtarget="float" id="form7Example1" class="form-control"
                                            min="0" name="age" pattern="[0-9]+(\.[0-9]+)?" />
                                        <label class="form-label" for="form7Example1">Age</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline p-2">
                                        <input type="text" id="form7Example2" class="form-control"
                                            name="smoking_history" />
                                        <label class="form-label" for="form7Example2">Smoking History</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline p-2">
                                        <input type="text" id="bmiResult" class="form-control" min="0"
                                            name="bmi" pattern="[0-9]+(\.[0-9]+)?" />
                                        <label class="form-label" for="form7Example1">Bmi</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline p-2">
                                        <input type="text" id="form7Example2" class="form-control"
                                            name="HbA1c_level" />
                                        <label class="form-label" for="form7Example2">HbA1c_level</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline p-2">
                                        <input type="text" id="form7Example1" class="form-control" min="0"
                                            name="blood_glucose_level" pattern="[0-9]+(\.[0-9]+)?" />
                                        <label class="form-label" for="form7Example1">Blood Glucose Level</label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="" class="form-label">Select Heart Disease Statues</label>
                            </div>
                            <div class="d-flex gap-10 mb-3">
                                <!-- Default checked radio -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault5"
                                        value="Male" checked />
                                    <label class="form-check-label" for="flexRadioDefault5"> Male </label>
                                </div>
                                <!-- Default radio -->
                                <div class="form-check mx-5">
                                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault6"
                                        value="Female" />
                                    <label class="form-check-label" for="flexRadioDefault6"> Female </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                {{-- <button id="submitButton" type="submit" class="btn btn-primary btn-rounded px-5"
                                    data-mdb-ripple-init>Start
                                    Now</button> --}}
                                <button id="submitButton" type="submit" class="btn btn-primary btn-lg btn-block"
                                    data-mdb-ripple-init>Start
                                    Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4 my-3">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Helpfull Information</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>BMI</strong>
                                    <strong>
                                        <p class="mb-0">(Body Mass Index)</p>
                                    </strong>
                                </div>
                                <span>
                                    <strong>
                                        BMI=Height (m) /2Weight (kg) ​
                                    </strong>
                                </span>
                            </li>
                            {{-- <li>
                                Underweight: BMI less than 18.5 Normal weight:<br>
                                BMI between 18.5 and 24.9 Overweight:<br>
                                BMI
                                between 25 and 29.9 Obesity:<br> BMI of 30 or greater
                            </li> --}}
                        </ul>

                        <button type="button" id="bmi" class="btn btn-primary btn-rounded px-5 mt-1">
                            Calculate BMI
                        </button>
                    </div>
                </div>
                <div class="card mb-4">
                    <form id="searchForm" action="#" method="POST">
                        <div class="input-group p-3">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="fieldName" class="form-control" name="fieldName" />
                                <label class="form-label" for="fieldName">Search For Medical Info</label>
                            </div>
                            <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>

                </div>
            </div>


        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#patientDataForm').submit(function(event) {
                event.preventDefault();

                // Disable the submit button and show loading text or spinner
                $('#submitButton').prop('disabled', true).html(
                    '<i class="fa fa-spinner fa-spin"></i> Loading...');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('getstart.store') }}',
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
                        $('#submitButton').prop('disabled', false).html('Submit');

                        // Open the modal
                        $('#exampleModal').modal('show');

                        $("#refrsh").click(function() {
                            location.href = "/getstart";
                        })
                    },

                });
            });
        });
    </script>

    <!-- BMI clac Section -->
    <script>
        $(document).ready(function() {
            $('#bmi').click(function() {
                $("#exampleModalBmi").modal('show');
            });

            $("#calculateBtns").on("click", function() {
                // Get weight and height values
                var weight = parseFloat($("#weight").val());
                var height = parseFloat($("#height").val());

                // Check if values are valid
                if (isNaN(weight) || isNaN(height) || weight <= 0 || height <= 0) {
                    $("#result").text("Please enter valid weight and height.");
                } else {
                    // Calculate BMI
                    var bmi = calculateBMI(weight, height);

                    // Display the result
                    $("#result").text("Your BMI is: " + bmi.toFixed(2));
                    $("#bmiResult").val(bmi.toFixed(2));
                }
            });

            // Function to calculate BMI
            function calculateBMI(weight, height) {
                return weight / (height * height);
            }
        });
    </script>

    <!-- search -->

    <script>
        $(document).ready(function() {
            $('#searchForm').submit(function(e) {
                e.preventDefault(); // Prevent default form submission

                // Get the field name entered by the user
                var fieldName = $("#fieldName").val();
                // Send AJAX request
                $.ajax({
                    url: '/search/' + fieldName,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // Display search results
                        $('#searchResults').html(response.data[0].information);
                        $(".modal-title").html(response.data[0].title);
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    },
                    complete: function() {
                        $("#exampleModal5").modal('show');
                    }
                });
            });
        });
    </script>
@endpush

{{-- ("

gender": "Female",
"age": 60.0,
"hypertension": 1,
"heart_disease": 0,
"smoking_history": "never",
"bmi": 28.5,
"HbA1c_level": 7.0,
"blood_glucose_level": 120

) --}}
