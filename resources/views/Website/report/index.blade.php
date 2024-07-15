@extends('Website/layouts/master')

@section('title')
    Paitent Reports
@endsection

@push('css')
    <script src="https://cdn.jsdelivr.net/npm/frappe-charts@1.2.4/dist/frappe-charts.min.iife.js"></script>
    <link rel="stylesheet" href="{{ URL('Website/css/reports/style-circle-progress.css') }}">
    <link rel="stylesheet" href="{{ URL('Website/css/reports/gauge.css') }}">
    <link rel="stylesheet" href="{{ URL('Website/css/reports/arc-gauge-master.css') }}">
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
                                    <a href="./index.html">Website</a> /
                                    <a href="./index.html">Reports</a>
                                </h6>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="index.html">Charts</a></li>
                                        <li><a href="reports.html">Reports</a></li>
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
            <!-- reports and progress -->
            <div class="col-md-6">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body text-center">
                        <div class="mt-3 mb-4">
                            @if (auth('web')->user()->image)
                                <img src="{{ URL('Dashboard/img/profile/users/' . auth('web')->user()->image->filename) }}"
                                    class="rounded-circle img-fluid" style="width: 100px; height:100px" />
                            @else
                                <img src="{{ URL('Dashboard/img/profile/users/default.png') }}"
                                    class="rounded-circle img-fluid" style="width: 100px; height:80px" />
                            @endif
                        </div>
                        <h4 class="mb-2">{{ Auth('web')->user()->name }}</h4>
                        <p class="text-muted mb-4">{{ Auth('web')->user()->phone }} <span class="mx-2">|</span> <a
                                href="#!">{{ Auth('web')->user()->email }}</a></p>

                        <button type="button" id="submitButton" class="btn btn-primary btn-rounded btn-lg shadow-1">
                            Check Diabetes
                        </button>

                        <button type="button" class="btn btn-primary btn-rounded btn-lg shadow-1" data-mdb-toggle="modal"
                            data-mdb-target="#CalculateInsuline">
                            Calculate Insuline
                        </button>
                    </div>
                </div>
                <div class=" row mt-2">
                    <div class="col-md-4">
                        <div class="card p-4 mt-2 ">
                            <p class="mb-2 h5">Diabetes type</p>
                            <p class="text-muted mb-0" id="d_type">
                                @if ($PatientDiabetes)
                                    {{ $PatientDiabetes->diabetes_type }}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-4 mt-2 ">
                            <p class="mb-2 h5">Diabetes Duration</p>
                            <p class="text-muted mb-0" id="d_time">
                                @if ($PatientDiabetes)
                                    {{ $PatientDiabetes->created_at }}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-4 mt-2 ">
                            <p class="mb-2 h5">Diabetes Status</p>
                            <p class="text-muted mb-0" id="d_status">
                                @if ($PatientDiabetes)
                                    @if ($PatientDiabetes->diabetes_status == 0)
                                        <span class="badge rounded-pill badge-primary">You not Diabetes</span>
                                    @else
                                        <span class="badge rounded-pill badge-warning">You Diabetes</span>
                                    @endif
                                @endif
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <!-- chart -->
            <input type="hidden" id="gender" value="{{ $PatientData->gender }}">
            <input type="hidden" id="age" value="{{ $PatientData->age }}">
            <input type="hidden" id="hypertension" value="{{ $PatientData->hypertension }}">
            <input type="hidden" id="heart_disease" value="{{ $PatientData->heart_disease }}">
            <input type="hidden" id="smoking_history" value="{{ $PatientData->smoking_history }}">
            <input type="hidden" id="bmi" value="{{ $PatientData->bmi }}">
            <input type="hidden" id="HbA1c_level" value="{{ $PatientData->HbA1c_level }}">
            <input type="hidden" id="blood_glucose_level" value="{{ $PatientData->blood_glucose_level }}">
            <!-- the right data tabel -->
            <div class="col-md-6">
                <div class="card-body card">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Age</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                @if ($PatientData)
                                    @php
                                        $age = $PatientData->age;
                                    @endphp

                                    @if ($age < 18)
                                        {{ $PatientData->age }} (years) - This person is a child.
                                    @elseif ($age >= 18 && $age < 60)
                                        {{ $PatientData->age }} (years) - This person is an adult.
                                    @else
                                        {{ $PatientData->age }} (years) - This person is a old man.
                                    @endif
                                @endif
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Hypertension</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                @if ($PatientData)
                                    @if ($PatientData->hypertension)
                                        {{ $PatientData->hypertension }} - This patient has hypertension.
                                    @else
                                        {{ $PatientData->hypertension }} - This patient does not have hypertension.
                                    @endif
                                @endif
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Heart Disease</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                @if ($PatientData)
                                    @if ($PatientData->heart_disease)
                                        {{ $PatientData->heart_disease }} - This patient has heart disease.
                                    @else
                                        {{ $PatientData->heart_disease }} - This patient does not have heart disease.
                                    @endif
                                @endif
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Smoking History</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                @if ($PatientData)
                                    {{ $PatientData->smoking_history }}
                                @endif
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.1s">
                            <p class="mb-0">HbA1c Level</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                @if ($PatientData)
                                    @php
                                        $hba1cLevel = $PatientData->HbA1c_level;
                                    @endphp

                                    @if ($hba1cLevel >= 7.0)
                                        {{ $PatientData->HbA1c_level }} % - This patient has a high HbA1c level.
                                    @elseif ($hba1cLevel >= 5.7 && $hba1cLevel < 7.0)
                                        {{ $PatientData->HbA1c_level }} % - This patient has a medium HbA1c level.
                                    @else
                                        {{ $PatientData->HbA1c_level }} % - This patient has a low HbA1c level.
                                    @endif
                                @endif
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.1s">
                            <p class="mb-0">Blood Glucose Level</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                @if ($PatientData)
                                    @php
                                        $bloodGlucoseLevel = $PatientData->blood_glucose_level;
                                    @endphp

                                    @if ($bloodGlucoseLevel > 180)
                                        {{ $PatientData->blood_glucose_level }} (mg/dL) - This patient has a high blood
                                        glucose level.
                                    @elseif ($bloodGlucoseLevel < 70)
                                        {{ $PatientData->blood_glucose_level }} (mg/dL) - This patient has a low blood
                                        glucose level.
                                    @else
                                        {{ $PatientData->blood_glucose_level }} (mg/dL) - This patient has a stable blood
                                        glucose level.
                                    @endif
                                @endif

                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3 wow fadeInUp" data-wow-delay="0.1s">
                            <p class="mb-0">BMI</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                @if ($PatientData)
                                    @php
                                        $bmi = $PatientData->bmi;
                                    @endphp

                                    @if ($bmi < 18.5)
                                        {{ $PatientData->bmi }} - This patient is categorized as thin (underweight).
                            </p>
                        @elseif ($bmi >= 18.5 && $bmi < 25)
                            {{ $PatientData->bmi }} - This patient has a normal BMI.</p>
                        @else
                            {{ $PatientData->bmi }} - This patient is categorized as fat (overweight or obese).</p>
                            @endif
                            @endif
                            </p>
                        </div>
                    </div>
                </div>
                {{-- <div class="card p-2" id="chart"></div> --}}
            </div>
        </div>

        <div class="row mt-5">
            <!-- age -->
            <div class="col-md-4 my-5">
                <div class="card p-2">
                    <div class="header text-secondary d-flex align-items-center gap-3 w-50 rounded-3 p-3 shadow-3"
                        style="margin-top: -50px;background-color: white;">
                        <div class="icon p-3 w-25/2 bg-primary text-light d-flex justify-content-center py-4 rounded-5">
                            <i class="fa-solid fa-battery-half fa-2xl"></i>
                        </div>
                        <div class="text">age</div>
                    </div>
                    <div class="body my-3 d-flex justify-content-center" style="height: 250px;">
                        <div class="circular-progress">
                            <span class="progress-value">0%</span>
                        </div>
                    </div>
                    <div class="footer text-secondary">{{ $age }}: years old</div>
                </div>
            </div>

            <!-- HbA1c_level -->
            <div class="col-md-4 my-5">
                <div class="card p-2">
                    <div class="header text-secondary d-flex align-items-center gap-3 w-50 rounded-3 p-3 shadow-3"
                        style="margin-top: -50px;background-color: white;">
                        <div class="icon p-3 w-25/2 bg-primary text-light d-flex justify-content-center py-4 rounded-5">
                            <i class="fa-solid fa-vials fa-2xl"></i>
                        </div>
                        <div class="text">HbA1c_level</div>
                    </div>
                    <div class="body my-3 d-flex justify-content-center" style="height: 250px;">
                        <div class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__fill progress-value"></div>
                                <div class="gauge__cover progress-value"></div>
                            </div>
                            <div class="gauge__foter d-flex justify-content-between">
                                <div class="left-value progress-value text-primary">100</div>
                                <div class="right-value progress-value">{{ $PatientData->HbA1c_level }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="footer text-secondary">HbA1c_level : {{ $PatientData->HbA1c_level }}</div>
                </div>
            </div>

            <!-- hypertension -->
            <div class="col-md-4 my-5">
                <div class="card p-2">
                    <div class="header text-secondary d-flex align-items-center gap-3 w-50 rounded-3 p-3 shadow-3"
                        style="margin-top: -50px;background-color: white;">
                        <div class="icon p-3 w-25/2 bg-primary text-light d-flex justify-content-center py-4 rounded-5">
                            <i class="fa-solid fa-hand-holding-droplet fa-2xl"></i>
                        </div>
                        <div class="text">hypertension</div>
                    </div>
                    <div class="body my-3 d-flex justify-content-center align-items-center" style="height: 250px;">
                        @if ($PatientData->hypertension == 1)
                            <div class="p-5 rounded-circle" style="border:10px solid rgb(117, 117, 216)">
                                <i class="fa-solid fa-arrow-trend-up fa-beat text-primary" style="font-size: 50px"></i>
                            </div>
                        @else
                            <div class="p-5 rounded-circle" style="border:10px solid rgb(117, 117, 216)">
                                <i class="fa-solid fa-arrow-trend-down fa-beat text-primary" style="font-size: 50px"></i>
                            </div>
                        @endif
                    </div>
                    <div class="footer text-secondary">Hypertension Status : {{ $PatientData->hypertension }}</div>
                </div>
            </div>

            <!-- heart_disease -->
            <div class="col-md-4 my-5">
                <div class="card p-2">
                    <div class="header text-secondary d-flex align-items-center gap-3 w-50 rounded-3 p-3 shadow-3"
                        style="margin-top: -50px;background-color: white;">
                        <div class="icon p-3 w-25/2 bg-primary text-light d-flex justify-content-center py-4 rounded-5">
                            <i class="fa-solid fa-heart-pulse fa-2xl"></i>
                        </div>
                        <div class="text">heart_disease</div>
                    </div>
                    <div class="body my-3 d-flex justify-content-center align-items-center" style="height: 250px;">
                        @if ($PatientData->heart_disease == 1)
                            <div class="p-5 rounded-circle" style="border:10px solid rgb(117, 117, 216)">
                                <i class="fa-solid fa-heart-crack fa-beat-fade text-primary" style="font-size: 50px"></i>
                            </div>
                        @else
                            <div class="p-5 rounded-circle" style="border:10px solid rgb(117, 117, 216)">
                                <i class="fa-solid fa-heart-pulse fa-bounce text-primary" style="font-size: 50px"></i>
                            </div>
                        @endif
                    </div>
                    <div class="footer text-secondary">heart disease : {{ $PatientData->heart_disease }}</div>
                </div>
            </div>

            <!-- blood_glucose_level -->
            <div class="col-md-4 my-5">
                <div class="card p-2">
                    <div class="header text-secondary d-flex align-items-center gap-3 w-50 rounded-3 p-3 shadow-3"
                        style="margin-top: -50px;background-color: white;">
                        <div class="icon p-3 w-25/2 bg-primary text-light d-flex justify-content-center py-4 rounded-5">
                            <i class="fa-solid fa-water fa-2xl"></i>
                        </div>
                        <div class="text">blood_glucose</div>
                    </div>
                    <div class="body my-3 d-flex justify-content-center" style="height: 250px;">
                        <div id="gauge">
                            <div id="major-ticks">
                                <span>10℃</span>
                                <span>150℃</span>
                                <span>300℃</span>
                            </div>
                            <div id="minor-ticks">
                                <span title="--i:1"></span>
                                <span title="--i:2"></span>
                                <span title="--i:3"></span>
                                <span title="--i:4"></span>
                                <span title="--i:5"></span>
                                <span title="--i:6"></span>
                                <span title="--i:7"></span>
                                <span title="--i:8"></span>
                                <span title="--i:9"></span>
                                <span title="--i:10"></span>
                                <span title="--i:11"></span>
                                <span title="--i:12"></span>
                                <span title="--i:13"></span>
                                <span title="--i:14"></span>
                                <span title="--i:15"></span>
                                <span title="--i:16"></span>
                                <span title="--i:17"></span>
                                <span title="--i:18"></span>
                                <span title="--i:19"></span>
                                <span title="--i:20"></span>
                            </div>
                            <div id="minor-ticks-bottom-mask"></div>
                            <div id="bottom-circle"></div>
                            <svg version="1.1" baseProfile="full" width="190" height="190"
                                xmlns="http://www.w3.org/2000/svg">
                                <linearGradient id="gradient" x1="0" x2="1" y1="0"
                                    y2="0">
                                    <stop offset="0%" stop-color="#7f25f5" />
                                    <stop offset="100%" stop-color="#ae69bb" />
                                </linearGradient>
                                <path d="M5 95 A80 80 0 0 1 185 95" stroke=url(#gradient) fill="none" stroke-width="10"
                                    stroke-linecap="round" stroke-dasharray="0 282.78" />
                            </svg>
                            <div id="center-circle">
                                <span id="name">mg/dL</span>
                                <span id="temperature">{{ $PatientData->blood_glucose_level }}</span>
                                {{-- <img src="leaf.svg" alt=""> --}}
                            </div>
                            <input type="range" id="range" max="300" min="70"
                                value="{{ $PatientData->blood_glucose_level }}">
                        </div>
                    </div>
                    <div class="footer text-secondary">blood glucose: {{ $PatientData->blood_glucose_level }}</div>
                </div>
            </div>

            <!-- bmi -->
            <div class="col-md-4 my-5">
                <div class="card p-2">
                    <div class="header text-secondary d-flex align-items-center gap-3 w-50 rounded-3 p-3 shadow-3"
                        style="margin-top: -50px;background-color: white;">
                        <div class="icon p-3 w-25/2 bg-primary text-light d-flex justify-content-center py-4 rounded-5">
                            <i class="fa-solid fa-scale-unbalanced-flip fa-2xl"></i>
                        </div>
                        <div class="text">bmi</div>
                    </div>
                    <div class="body my-3 d-flex justify-content-center" style="height: 250px;">
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <canvas id="bmiChart" width="400" height="400"></canvas>
                    </div>
                    <div class="footer text-secondary">BMI : {{ $PatientData->bmi }}</div>
                </div>
            </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Request Status</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="responseMessage">...</div>
                    <div class="modal-footer">
                        <button id="close_btn" type="button" class="btn btn-secondary"
                            data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="refrsh">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="CalculateInsuline" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Calculate Insuline</h5>
                        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control p-3" id="wieght" placeholder="Enter Your Wieght"> <br>
                        <strong class="text-warning mt-5">the inslun units :</strong> <span id="insluinResult"> </span> units
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                            data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn_calc_insluin">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ url('Website/charts/charts.js') }}"></script>
    <script src="{{ url('Website/charts/frost-chart.js') }}"></script>
    <script src="{{ url('Website/charts/charts2.js') }}"></script>
    <script src="{{ url('Website/charts/charts3.js') }}"></script> --}}
    <script src="{{ url('Website/charts/bmi.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Get values from hidden input fields
            var gender = $('#gender').val();
            var age = $('#age').val();
            var hypertension = $('#hypertension').val();
            var heartDisease = $('#heart_disease').val();
            var smokingHistory = $('#smoking_history').val();
            var bmi = $('#bmi').val();
            var hba1cLevel = $('#HbA1c_level').val();
            var bloodGlucoseLevel = $('#blood_glucose_level').val();

            // Data to be sent in the request
            var requestData = {
                "gender": gender,
                "age": parseFloat(age),
                "hypertension": parseInt(hypertension),
                "heart_disease": parseInt(heartDisease),
                "smoking_history": smokingHistory,
                "bmi": parseFloat(bmi),
                "HbA1c_level": parseFloat(hba1cLevel),
                "blood_glucose_level": parseInt(bloodGlucoseLevel)
            };
            console.log(requestData)

            // Send the data to the ai prediction modal
            $('#submitButton').click(function() {

                $(this).prop('disabled', true).html(
                    '<i class="fa fa-spinner fa-spin"></i> Loading...');

                // Make the POST request
                $.ajax({
                    type: 'POST',
                    url: 'http://127.0.0.1:5000/predict_diabetes',
                    contentType: 'application/json', // Set the Content-Type header to JSON
                    data: JSON.stringify(requestData), // Convert the data to JSON string
                    success: function(response) {
                        // Handle the success response
                        console.log(response);
                        StorePatientDiabetesStatusData(response.prediction, response.type);
                    },
                    error: function(error) {
                        // Handle the error response
                        $('#feedbackModal').modal('show');
                        $('#responseMessage').html(
                            '<div class="alert alert-success">The Modal Not Avilable Now</div>'
                        );
                    },
                    complete: function() {
                        // Enable the submit button and restore its original text
                        $('#submitButton').prop('disabled', false).html('Submited Done');
                        $("#refrsh").click(function() {
                            location.href = "/getstart";
                        })
                    },
                });
            });

            // save the model respons data
            function StorePatientDiabetesStatusData(status, type) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('patientdiabetesreport.store') }}',
                    data: {
                        _token: "{{ csrf_token() }}",
                        diabetes_status: status,
                        diabetes_type: type,
                        user_id: "{{ Auth('web')->user()->id }}",
                    }
                }).done(function(response) {
                    console.log(response);
                    $('#feedbackModal').modal('show');
                    $('#responseMessage').html(response.message + ' status = ' + status);
                    $('#d_type').html('Dabetes 1');
                    var currentDate = new Date();
                    timestamp = currentDate.getDate() + "/" + (currentDate.getMonth() + 1) + "/" +
                        currentDate.getFullYear() +
                        " " + currentDate.getHours() + ":" + currentDate.getMinutes() + ":" + currentDate
                        .getSeconds();
                    patientStatus = '';
                    if (status == 1) {
                        patientStatus =
                            `<span class="badge rounded-pill badge-warning"> You Diabetes</span>`
                    } else {
                        patientStatus =
                            `<span class="badge rounded-pill badge-primary">You not Diabetes</span>`
                    }

                    $('#d_time').html(timestamp);
                    $('#d_status').html(patientStatus);
                    $("#close_btn").click(() => {
                        // location.href = "/patientdiabetesreport";
                    })
                });
            }

            $("#btn_calc_insluin").click(function() {
                wieght = $("#wieght").val();
                result = wieght * 0.55;
                $("#insluinResult").html(result.toFixed(2));
            });

        });
    </script>
    <script src="{{ URL('Website/js/reports/arc-gauge-master.js') }}"></script>
    <script src="{{ URL('Website/js/reports/scripty-circle-progress.js') }}"></script>
    <script src="{{ URL('Website/js/reports/gauge.js') }}"></script>
@endpush
