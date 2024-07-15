@extends('Dashboard/layouts/master')

@section('title')
    dashboard appointment appointments
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/custom-style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/custom-style-settings.css') }}" />
@endsection

@section('page-url')
    <h6 class="pt-1">Dashboard / appointment / <span class="active">confirmed appointments </span></h6>
@endsection

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
            <div class="pb-0">
                <div class="options my-2 p-2 d-flex justify-content-between">
                    <!-- add -->
                    <div class="add">
                        <button type="button" class="btn btn-danger" id="btn_delete_all">Delete Select</button>
                    </div>
                    <!-- exports methods -->
                    <div class="btn-group shadow-0">
                        @include('Dashboard.layouts.export-btn')
                    </div>
                </div>

                <div class="table overflow-x-scroll" id="DataTableDiv">
                    <table id="DataTable" class="table table-striped rounded-0">
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
                                <th>Meeting</th>
                                <th>Section</th>
                                <th>Patient</th>
                                <th>Phone</th>
                                <th>date</th>
                                <th>time</th>
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
                                    <td>{{ $appointment->doctor->name }}</td>
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
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
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
                                @include('Dashboard.appointments.delete')
                                @include('Dashboard.appointments.delete_select')
                                @include('Dashboard.appointments.update_status')
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
                                <th>Meeting</th>
                                <th>Section</th>
                                <th>Patient</th>
                                <th>Phone</th>
                                <th>date</th>
                                <th>time</th>
                                <th>Status</th>
                                <th>created at</th>
                                <th>Process</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
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
                    {{-- <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                        data-mdb-dismiss="modal">Close</button> --}}
                    <button type="button" class="btn btn-primary" data-mdb-ripple-init id="refresh">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            jQuery("[name=select_all]").click(function(source) {
                checkboxes = jQuery("[name=delete_select]");
                for (var i in checkboxes) {
                    checkboxes[i].checked = source.target.checked;
                }
            });
        })
    </script>

    <script type="text/javascript">
        $(function() {
            $("#btn_delete_all").click(function() {
                var selected = [];
                $("#DataTable input[name=delete_select]:checked").each(function() {
                    selected.push(this.value);
                });

                if (selected.length > 0) {
                    $('input[class="delete_select_id"]').val(selected);
                    $('#delete_select').modal('show')
                }
                // alert('delete');
            });
        });
    </script>

    <!-- search -->
    <script>
        $(document).ready(function() {
            $("#search-input").keyup(function() {
                let value = $(this).val().toLowerCase();
                $("tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        })
    </script>

    <!-- data table -->
    <script>
        new DataTable('#DataTable');
    </script>

    <script>
        $(document).ready(function() {
            $("#refresh").click(function() {
                window.location = "/appointments_admin";
            });
        });
    </script>
@endsection
