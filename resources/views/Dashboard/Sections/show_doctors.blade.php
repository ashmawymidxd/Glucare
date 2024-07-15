@extends('Dashboard/layouts/master')

@section('title')
    Doctors section
@endsection

@section('page-url')
    <h5 class="pt-1">Dashboard / <span class="active"> doctors section </span></h5>
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
    @elseif (session()->has('edit_pass'))
        <script>
            window.onload = function() {
                $("#DoctorAlert").modal('show');
                $(".modal-body").html('<p> The Doctor Password Updated Successfully </p>');
            }
        </script>
    @elseif (session()->has('edit_status'))
        <script>
            window.onload = function() {
                $("#DoctorAlert").modal('show');
                $(".modal-body").html('<p> The Doctor Data Status Updated Successfully </p>');
            }
        </script>
    @endif

    <!-- Button trigger modal -->
    <div class="mx-4 my-3">
        <div class="container-fluid card" style="margin-top: -70px">
            <!-- write your content here -->
            <div class="card-header pb-0">

                <div class="table overflow-x-scroll">
                    <table id="example" class="table table-striped mg-b-0 text-md-nowrap table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>email</th>
                                <th>section</th>
                                <th>phone</th>
                                <th>appointments</th>
                                <th>Status</th>
                                <th>Processes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>{{ $doctor->section->name }}</td>
                                    <td>{{ $doctor->phone }}</td>
                                    <td>
                                        @foreach ($doctor->doctorappointments as $appointment)
                                            {{ $appointment->name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="dot-label bg-{{ $doctor->status == 1 ? 'success' : 'danger' }} ml-1">
                                        </div>
                                        {{ $doctor->status == 1 ? trans('doctors.Enabled') : trans('doctors.Not_enabled') }}
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                class="btn ripple btn-outline-primary btn-sm" data-mdb-toggle="dropdown"
                                                type="button">Processes<i class="fas fa-caret-down mr-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="{{ route('Doctors.edit', $doctor->id) }}"><i
                                                        style="color: #0ba360" class="fas fa-user"></i>&nbsp;&nbsp; Edit
                                                    Data</a>
                                                <a class="dropdown-item" href="#" data-mdb-toggle="modal"
                                                    data-mdb-target="#update_password{{ $doctor->id }}"><i
                                                        class="fas fa-key"></i>&nbsp;&nbsp; Change Password</a>
                                                <a class="dropdown-item" href="#" data-mdb-toggle="modal"
                                                    data-mdb-target="#update_status{{ $doctor->id }}"><i
                                                        class="fas fa-edit"></i>&nbsp;&nbsp;
                                                    Update Status</a>
                                                <a class="dropdown-item" href="#" data-mdb-toggle="modal"
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
                    </table>
                </div>
                @include('Dashboard.Sections.add')
            </div>
        </div>
    </div>

    <!-- alert modal -->
    <div class="modal fade" id="DoctorAlert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">...</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                        data-mdb-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-mdb-ripple-init>Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- chart file -->
    <script src="{{ url('Dashboard/js/chart.js') }}"></script>
    <!-- frost chart file -->
    <script src="{{ url('Dashboard/js/frost_chart.js') }}"></script>
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
        new DataTable('#example');
    </script>
@endpush
