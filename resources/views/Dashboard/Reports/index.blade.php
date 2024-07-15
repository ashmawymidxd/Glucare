@extends('Dashboard/layouts/master')

@section('title')
    Role Reports
@endsection

@section('page-url')
    <h6 class="pt-1">Dashboard / <span class="active"> Role Reports </span></h6>
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

                <!-- Default checked radio -->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="PatientsRepo" />
                    <label class="form-check-label" for="flexRadioDefault2"> Patients Reports </label>
                </div>

                <!-- Default checked radio -->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="EmployeesRepo" />
                    <label class="form-check-label" for="flexRadioDefault2"> Employees Reports </label>
                </div>
                <div class="DoctorsReports border rounded-3 p-2 my-3"
                    @if (!isset($doctors)) style="display: none" @else style="display: block" @endif>
                    <!-- doctors reports request -->
                    <div class="">
                        <form action="{{ route('role_reports') }}" method="post">
                            @csrf
                            @method('POST')
                            <h5 class="text-center">
                                Generate Doctors Report
                            </h5>
                            <input type="hidden" name="repoType" value="Doctors">
                            <div class="row my-3" id="row">
                                <div class="mb-3 col-md-4">
                                    <label for="section" class="form-label">Section:</label>
                                    <select class="form-select" id="section" name="section">
                                        <option value="Orthopedics">Seclct section</option>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                                        @endforeach
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
                    <div class="">
                        @if (isset($doctors))
                            <div class="table overflow-x-scroll" id="DataTableDiv">
                                <table id="DataTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="example-select-all" name="select_all" />
                                                </div>
                                            </th>
                                            <th>name</th>
                                            <th>img</th>
                                            <th>email</th>
                                            <th>section</th>
                                            <th>phone</th>
                                            <th>appointments</th>
                                            <th>Status</th>
                                            <th>created at</th>
                                            <th>Processes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctors as $doctor)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" value="{{ $doctor->id }}"
                                                            type="checkbox" role="switch" id="flexSwitchCheckDefault"
                                                            name="delete_select" />
                                                    </div>
                                                </td>
                                                <td>{{ $doctor->name }}</td>
                                                <td>
                                                    @if ($doctor->image)
                                                        <img src="{{ Url::asset('Dashboard/img/profile/doctors/' . $doctor->image->filename) }}"
                                                            height="50px" width="50px" alt="">
                                                    @else
                                                        <img src="{{ Url::asset('Dashboard/img/profile/doctors/default.png') }}"
                                                            height="50px" width="50px" alt="">
                                                    @endif
                                                </td>
                                                <td>{{ $doctor->email }}</td>
                                                <td>
                                                    @if ($doctor->section)
                                                        {{ $doctor->section->name }}
                                                    @else
                                                        <span>Not enrolled</span>
                                                    @endif

                                                </td>
                                                <td>{{ $doctor->phone }}</td>
                                                <td>
                                                    @foreach ($doctor->doctorappointments as $appointment)
                                                        {{ $appointment->name }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <div
                                                        class="dot-label bg-{{ $doctor->status == 1 ? 'success' : 'danger' }} ml-1">
                                                    </div>
                                                    {{ $doctor->status == 1 ? 'Enabled' : 'Not_enabled' }}
                                                </td>

                                                <td>{{ $doctor->created_at->diffForHumans() }}</td>
                                                <td>

                                                    <div class="dropdown">
                                                        <button aria-expanded="false" aria-haspopup="true"
                                                            class="btn ripple btn-outline-primary btn-sm"
                                                            data-mdb-toggle="dropdown" type="button">Processes<i
                                                                class="fas fa-caret-down mr-1"></i></button>
                                                        <div class="dropdown-menu tx-13">
                                                            <a class="dropdown-item"
                                                                href="{{ route('Doctors.edit', $doctor->id) }}"><i
                                                                    style="color: #0ba360"
                                                                    class="fas fa-user"></i>&nbsp;&nbsp;
                                                                Edit
                                                                Data</a>
                                                            <a class="dropdown-item" href="#"
                                                                data-mdb-toggle="modal"
                                                                data-mdb-target="#update_password{{ $doctor->id }}"><i
                                                                    class="fas fa-key"></i>&nbsp;&nbsp; Change Password</a>
                                                            <a class="dropdown-item" href="#"
                                                                data-mdb-toggle="modal"
                                                                data-mdb-target="#update_status{{ $doctor->id }}"><i
                                                                    class="fas fa-edit"></i>&nbsp;&nbsp;
                                                                Update Status</a>
                                                            <a class="dropdown-item" href="#"
                                                                data-mdb-toggle="modal"
                                                                data-mdb-target="#delete{{ $doctor->id }}"><i
                                                                    class="fas fa-trash"></i>&nbsp;&nbsp; Delete Data</a>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                            @include('Dashboard.Doctors.delete')
                                            @include('Dashboard.Doctors.delete_select')
                                            @include('Dashboard.Doctors.update_password')
                                            @include('Dashboard.Doctors.update_status')
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
                                            <th>name</th>
                                            <th>img</th>
                                            <th>email</th>
                                            <th>section</th>
                                            <th>phone</th>
                                            <th>appointments</th>
                                            <th>Status</th>
                                            <th>created at</th>
                                            <th>Processes</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="PatientsReports border rounded-3 p-2 my-3"
                    @if (!isset($patients)) style="display: none" @else style="display: block" @endif>
                    <!-- patients reports request -->
                    <div class="">
                        <form action="{{ route('role_reports') }}" method="post">
                            @csrf
                            @method('POST')
                            <h5 class="text-center">
                                Generate Patients Report
                            </h5>
                            <input type="hidden" name="repoType" value="Patients">
                            <div class="row my-3" id="row">
                                <div class="mb-3 col-md-4">
                                    <label for="section" class="form-label">Diabetes Type:</label>
                                    <select class="form-select" id="section" name="diabetes_type">
                                        <option value="Diabetes 1">Type 1</option>
                                        <option value="Diabetes 2">Type 2</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="startDate" class="form-label">Min age:</label>
                                    <input type="number" class="form-control" id="startDate" name="min_age">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="endDate" class="form-label">Max age:</label>
                                    <input type="number" class="form-control" id="endDate" name="max_age">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" id="generateDoctorReport">Generate
                                Report</button>
                        </form>
                    </div>
                    <!-- patients reports response -->
                    <div class="">
                        @if (isset($patients))
                            <div class="table overflow-x-scroll" id="DataTableDiv">
                                <table id="DataTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="example-select-all" name="select_all" />
                                                </div>
                                            </th>
                                            <th>name</th>
                                            <th>img</th>
                                            <th>email</th>
                                            <th>phone</th>
                                            <th>Status</th>
                                            <th>created at</th>
                                            <th>Processes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($patients as $patient)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" value="{{ $patient->id }}"
                                                            type="checkbox" role="switch" id="flexSwitchCheckDefault"
                                                            name="delete_select" />
                                                    </div>
                                                </td>
                                                <td>{{ $patient->name }}</td>
                                                <td>
                                                    @if ($patient->image)
                                                        <img src="{{ Url::asset('Dashboard/img/profile/users/' . $patient->image->filename) }}"
                                                            height="50px" width="50px" alt="">
                                                    @else
                                                        <img src="{{ Url::asset('Dashboard/img/profile/users/default.png') }}"
                                                            height="50px" width="50px" alt="">
                                                    @endif
                                                </td>
                                                <td>{{ $patient->email }}</td>
                                                <td>{{ $patient->phone }}</td>
                                                <td>
                                                    <div
                                                        class="dot-label bg-{{ $patient->status == 1 ? 'success' : 'danger' }} ml-1">
                                                    </div>
                                                    {{ $patient->status == 1 ? 'Enabled' : 'Not_enabled' }}
                                                </td>

                                                <td>{{ $patient->created_at->diffForHumans() }}</td>
                                                <td>

                                                    <div class="dropdown">
                                                        <button aria-expanded="false" aria-haspopup="true"
                                                            class="btn ripple btn-outline-primary btn-sm"
                                                            data-mdb-toggle="dropdown" type="button">Processes<i
                                                                class="fas fa-caret-down mr-1"></i></button>
                                                        <div class="dropdown-menu tx-13">
                                                            <a class="dropdown-item"
                                                                href="{{ route('Patients.edit', $patient->id) }}"><i
                                                                    style="color: #0ba360"
                                                                    class="fas fa-user"></i>&nbsp;&nbsp; Edit
                                                                Data</a>
                                                            <a class="dropdown-item" href="#"
                                                                data-mdb-toggle="modal"
                                                                data-mdb-target="#update_password{{ $patient->id }}"><i
                                                                    class="fas fa-key"></i>&nbsp;&nbsp; Change Password</a>
                                                            <a class="dropdown-item" href="#"
                                                                data-mdb-toggle="modal"
                                                                data-mdb-target="#update_status{{ $patient->id }}"><i
                                                                    class="fas fa-edit"></i>&nbsp;&nbsp;
                                                                Update Status</a>
                                                            <a class="dropdown-item" href="#"
                                                                data-mdb-toggle="modal"
                                                                data-mdb-target="#delete{{ $patient->id }}"><i
                                                                    class="fas fa-trash"></i>&nbsp;&nbsp; Delete Data</a>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                            @include('Dashboard.Patients.delete')
                                            @include('Dashboard.Patients.delete_select')
                                            @include('Dashboard.Patients.update_password')
                                            @include('Dashboard.Patients.update_status')
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
                                            <th>name</th>
                                            <th>img</th>
                                            <th>email</th>
                                            <th>phone</th>
                                            <th>Status</th>
                                            <th>created at</th>
                                            <th>Processes</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="EmployeesReports border rounded-3 p-2 my-3"
                    @if (!isset($employees)) style="display: none" @else style="display: block" @endif>
                    <!-- employee reports request -->
                    <div class="">
                        <form action="{{ route('role_reports') }}" method="post">
                            @csrf
                            @method('POST')
                            <h5 class="text-center">
                                Generate Employees Report
                            </h5>
                            <input type="hidden" name="repoType" value="Employees">
                            <div class="row my-3" id="row">
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
                    <!-- employee reports response -->
                    <div class="">
                        @if (isset($employees))
                            <div class="table overflow-x-scroll" id="DataTableDiv">
                                <table id="DataTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="example-select-all" name="select_all" />
                                                </div>
                                            </th>
                                            <th>name</th>
                                            <th>img</th>
                                            <th>email</th>
                                            <th>section</th>
                                            <th>experience</th>
                                            <th>qualification</th>
                                            <th>phone</th>
                                            <th>Status</th>
                                            <th>created at</th>
                                            <th>Processes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" value="{{ $employee->id }}"
                                                            type="checkbox" role="switch" id="flexSwitchCheckDefault"
                                                            name="delete_select" />
                                                    </div>
                                                </td>
                                                <td>{{ $employee->name }}</td>
                                                <td>
                                                    @if ($employee->image)
                                                        <img src="{{ Url::asset('Dashboard/img/profile/employees/' . $employee->image->filename) }}"
                                                            height="50px" width="50px" alt="">
                                                    @else
                                                        <img src="{{ Url::asset('Dashboard/img/profile/employees/default.png') }}"
                                                            height="50px" width="50px" alt="">
                                                    @endif
                                                </td>
                                                <td>{{ $employee->email }}</td>
                                                <td>
                                                    @if ($employee->section)
                                                        {{ $employee->section->name }}
                                                    @else
                                                        <span>Not enrolled</span>
                                                    @endif

                                                </td>
                                                <td>{{ $employee->employee_experience }}</td>
                                                <td>{{ $employee->employee_qualification }}</td>
                                                <td>{{ $employee->phone }}</td>
                                                <td>
                                                    <div
                                                        class="dot-label bg-{{ $employee->status == 1 ? 'success' : 'danger' }} ml-1">
                                                    </div>
                                                    {{ $employee->status == 1 ? 'Enabled' : 'Not_enabled' }}
                                                </td>

                                                <td>{{ $employee->created_at->diffForHumans() }}</td>
                                                <td>

                                                    <div class="dropdown">
                                                        <button aria-expanded="false" aria-haspopup="true"
                                                            class="btn ripple btn-outline-primary btn-sm"
                                                            data-mdb-toggle="dropdown" type="button">Processes<i
                                                                class="fas fa-caret-down mr-1"></i></button>
                                                        <div class="dropdown-menu tx-13">
                                                            <a class="dropdown-item"
                                                                href="{{ route('Employees.edit', $employee->id) }}"><i
                                                                    style="color: #0ba360"
                                                                    class="fas fa-user"></i>&nbsp;&nbsp; Edit
                                                                Data</a>
                                                            <a class="dropdown-item" href="#"
                                                                data-mdb-toggle="modal"
                                                                data-mdb-target="#update_password{{ $employee->id }}"><i
                                                                    class="fas fa-key"></i>&nbsp;&nbsp; Change Password</a>
                                                            <a class="dropdown-item" href="#"
                                                                data-mdb-toggle="modal"
                                                                data-mdb-target="#update_status{{ $employee->id }}"><i
                                                                    class="fas fa-edit"></i>&nbsp;&nbsp;
                                                                Update Status</a>
                                                            <a class="dropdown-item" href="#"
                                                                data-mdb-toggle="modal"
                                                                data-mdb-target="#delete{{ $employee->id }}"><i
                                                                    class="fas fa-trash"></i>&nbsp;&nbsp; Delete Data</a>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                            @include('Dashboard.Employees.delete')
                                            @include('Dashboard.Employees.delete_select')
                                            @include('Dashboard.Employees.update_password')
                                            @include('Dashboard.Employees.update_status')
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
                                            <th>name</th>
                                            <th>img</th>
                                            <th>email</th>
                                            <th>section</th>
                                            <th>experience</th>
                                            <th>qualification</th>
                                            <th>phone</th>
                                            <th>Status</th>
                                            <th>created at</th>
                                            <th>Processes</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
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
