@extends('Dashboard/layouts/master')

@section('title')
    Edit Patients
@endsection

@section('page-url')
    <h5 class="pt-1">Dashboard / <span class="active"> Edit Patients </span></h5>
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
    @if (session()->has('edit_data'))
        <script>
            window.onload = function() {
                $("#patientAlert").modal('show');
                $(".modal-body").html('<p> The patient Data Updated Successfully </p>');
            }
        </script>
    @endif

    <!-- patient form data  -->
    <div class="mx-4 my-3">
        <div class="card p-2" style="margin-top: -70px">
            <!-- write your content here -->
            <div class="row col-md-12" id="row">
                <div class="col-md-4">
                    <div class="">
                        <div class="layerUp">
                        </div>
                        <div class="layerDown">
                            @if ($patient->image)
                                <img width="150" class="rounded-circle" id="output"
                                    src="{{ Url::asset('Dashboard/img/profile/users/' . $patient->image->filename) }}"
                                    alt="">
                            @else
                                <img width="150" class="rounded-circle" id="output"
                                    src="{{ Url::asset('Dashboard/img/profile/users/default.png') }}" alt="">
                            @endif
                        </div>
                        <div class="mt-5">
                            <p class="main-color"> <strong>Name : </strong> {{ $patient->name }}</p>
                            <p class="main-color"> <strong>Email : </strong> {{ $patient->email }}</p>
                            <p class="main-color"> <strong>Join at : </strong> {{ $patient->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 p-1"></div>
                <div class="col-md-7 ">
                    <form action="{{ route('Patients.update', 'test') }}" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <input class="form-control" value="{{ $patient->id }}" name="id" type="hidden">
                        <div class="p-3">
                            <div>
                                <h6 class="main-color">Edit Profile Data</h6>

                                <div class="row" id="row">
                                    <div class="col-md-6 mb-4">
                                        <input value="{{ $patient->name }}" type="text" name="name" class="main-input"
                                            placeholder="Enter Username">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <input value="{{ $patient->email }}" type="email" name="email" id="Enter Email"
                                            class="main-input" />
                                    </div>
                                </div>
                                <div class="row" id="row">
                                    <div class="col-md-6 mb-4">
                                        <input value="{{ $patient->phone }}" type="text" name="phone"
                                            class="main-input" placeholder="Enter Phone">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="main-input d-flex align-items-center" for="customFile"><i
                                                class="fa-solid fa-camera-retro fa-xl"></i> <span class="mx-2">Select
                                                Profile Image</span> </label>
                                        <input type="file" class="form-control" id="customFile" accept="image/*"
                                            name="photo" onchange="loadFile(event)" hidden />
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary w-100 p-3">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- alert modal -->
    <div class="modal fade" id="patientAlert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a type="button" class="btn btn-primary" href="{{ route('Patients.index') }}"
                        data-mdb-ripple-init>Patients List</a>
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
@endpush
