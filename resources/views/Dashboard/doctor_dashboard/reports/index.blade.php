@extends('Dashboard/layouts/master')

@section('title')
    appointment Reports
@endsection

@section('page-url')
    <h6 class="pt-1">Dashboard / <span class="active"> Appointment Reports </span></h6>
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
    <!-- show data -->
    <div class="mx-4 my-3">
        <div class="container-fluid card p-0" style="margin-top: -70px">
            <!-- write your content here -->
            <div class="p-3">
                <!-- Default radio -->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="DoctorsRepo" />
                    <label class="form-check-label" for="flexRadioDefault1"> Doctors Reports </label>
                </div>
                <div class="DoctorsReports border rounded-3 p-2 my-3">
                    <!-- doctors reports request -->
                    <div class="mb-5">
                        <form action="{{ route('getAppointmentReport') }}" method="post">
                            @csrf
                            @method('POST')
                            <h5 class="text-center">
                                Generate Appointment Reports
                            </h5>
                            <input type="hidden" name="repoType" value="appointment">
                            <div class="row my-3" id="row">
                                <div class="mb-3 col-md-4">
                                    <label for="section" class="form-label">appointment type:</label>
                                    <select class="form-select" id="section" name="appointment_type">
                                        <option value="un confirmed">un confirmed</option>
                                        <option value="confirmed">confirmed</option>
                                        <option value="end">end</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="startDate" class="form-label">Start Date:</label>
                                    <input type="date" class="form-control" id="startDate" name="startDate">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="endDate" class="form-label">End Date:</label>
                                    <input type="date" class="form-control" id="endDate" name="endDate">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" id="generateDoctorReport">Generate
                                Report</button>
                        </form>
                    </div>
                    <!-- doctors reports response -->
                    <div class="p-3" id="row">
                        @if (isset($appointments))
                            <table id="DataTable" class="table table-striped rounded-0 mt-3">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="example-select-all" name="select_all" />
                                            </div>
                                        </th>
                                        <th>Doctor</th>
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
                                                    <input class="form-check-input" value="{{ $appointment->id }}"
                                                        type="checkbox" role="switch" id="flexSwitchCheckDefault"
                                                        name="delete_select" />
                                                </div>
                                            </td>
                                            <td>{{ $appointment->doctor->name }}</td>
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
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-mdb-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Options
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li>
                                                            <a class="dropdown-item" href="/" data-mdb-toggle="modal"
                                                                data-mdb-target="#update_status{{ $appointment->id }}"><i
                                                                    class="fas fa-edit"></i>&nbsp;&nbsp;
                                                                Update Status</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="/" data-mdb-toggle="modal"
                                                                data-mdb-target="#delete{{ $appointment->id }}"><i
                                                                    class="fas fa-trash"></i>&nbsp;&nbsp; Delete Data</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="/" data-mdb-toggle="modal"
                                                                data-mdb-target="#archive{{ $appointment->id }}"><i
                                                                    style="color:
                                                            #0ba360"
                                                                    class="fas fa-archive"></i>&nbsp;&nbsp;
                                                                Archive
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </td>
                                        </tr>
                                        </tr>
                                        @include('Dashboard.doctor_dashboard.appointments.delete')
                                        @include('Dashboard.doctor_dashboard.appointments.delete_select')
                                        @include('Dashboard.doctor_dashboard.appointments.update_status')
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="example-select-all" name="select_all" />
                                            </div>
                                        </th>
                                        <th>Doctor</th>
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('input[name="flexRadioDefault"]').change(function() {
                $('.DoctorsReports, .PatientsReports, .EmployeesReports').hide();
                if ($('#DoctorsRepo').is(':checked')) {
                    $('.DoctorsReports').show();
                } else if ($('#PatientsRepo').is(':checked')) {
                    $('.PatientsReports').show();
                } else if ($('#EmployeesRepo').is(':checked')) {
                    $('.EmployeesReports').show();
                }
            });
        });
    </script>
    <!-- data table -->
    <script>
        new DataTable('#DataTable');
    </script>
@endpush
