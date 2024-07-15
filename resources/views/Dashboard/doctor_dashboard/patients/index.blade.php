@extends('Dashboard/layouts/master')

@section('title')
    Patients
@endsection

@section('page-url')
    <h6 class="pt-1">Dashboard / <span class="active"> Patients </span></h6>
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
                $("#patientAlert").modal('show');
                $(".modal-body").html('<p> The patient Data Saved Successfully </p>');
            }
        </script>
    @elseif (session()->has('delete'))
        <script>
            window.onload = function() {
                $("#patientAlert").modal('show');
                $(".modal-body").html('<p> The patient Deleted Successfully </p>');
            }
        </script>
    @endif

    <!-- show data -->
    <div class="mx-4 my-3">
        <div class="container-fluid card p-0" style="margin-top: -70px">
            <!-- write your content here -->
            <div class="pb-0">
                <div class="options my-2 p-2 d-flex justify-content-between">
                    <!-- add -->
                    <div class="add">
                        <a href="{{ route('Patients.create') }}" class="btn btn-primary" role="button"
                            aria-pressed="true">Add patient</a>
                        <button type="button" class="btn btn-danger" id="btn_delete_all">Delete Select</button>
                    </div>
                    <!-- exports methods -->
                    <div class="btn-group shadow-0">
                        @include('Dashboard.layouts.export-btn')
                    </div>
                </div>

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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" value="{{ $patient->id }}" type="checkbox"
                                                role="switch" id="flexSwitchCheckDefault" name="delete_select" />
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
                                        <div class="dot-label bg-{{ $patient->status == 1 ? 'success' : 'danger' }} ml-1">
                                        </div>
                                        {{ $patient->status == 1 ? 'Enabled' : 'Not_enabled' }}
                                    </td>

                                    <td>{{ $patient->created_at->diffForHumans() }}</td>
                                </tr>
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
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('js')
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
                window.location = "/Patients";
            });
        });
    </script>
@endpush
