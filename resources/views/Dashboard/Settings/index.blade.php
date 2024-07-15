@extends('Dashboard/layouts/master')

@section('title')
    settings
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/custom-style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/custom-style-settings.css') }}" />
@endsection

@section('page-url')
    <h5 class="pt-1">Dashboard / Settings / <span class="active"> settings </span></h5>
@endsection

@section('page-header')
    <div class="header">
        <div class="layer1"></div>
        <div class="layer2"></div>
    </div>
@endsection

@section('content')
    <!-- show the request response -->
    @if (session()->has('success'))
        <script>
            window.onload = function() {
                $("#SettingAlert").modal('show');
                $(".modal-body").html('<p> The Seting Data Updated Successfully </p>');
            }
        </script>
    @elseif ($errors->any())
        <script>
            window.onload = function() {
                $("#SettingAlert").modal('show');
                $(".modal-body").html(`
                {!! implode(
                    '',
                    $errors->all('
                    <div class="alert alert-primary">
                        <button type="button" aria-hidden="true" class="close">
                        <i class="fa-solid fa-close"></i>
                        </button>
                        <span>
                        <b> Error - </b> :message ".alert-Error"</span>
                    </div>'),
                ) !!}
                `);
            }
        </script>
    @endif
    <div class="mx-4 my-3">
        <div class="container-fluid card p-0" style="margin-top: -70px">
            <div class="p-2">
                <form action="{{ route('setting.update', $setting->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="col-md-12 text-center mb-4">
                        @if ($setting->image)
                            <img class="rounded-5 shadow-4 p-3" height="100px" id="output"
                                src="{{ URL('Dashboard/img/logo/' . $setting->image->filename) }}" alt="Avatar" />
                        @else
                            <img class="rounded-5 shadow-4 p-3" height="100px" id="output"
                                src="{{ URL('Dashboard/img/logo/main_logo.png') }}" alt="Avatar" />
                        @endif
                    </div>

                    <div class="row col-md-12" id="row">
                        <div class="col-md-6">
                            <input type="text" class="main-input" placeholder="Enter Website Name" name="website_name"
                                value="{{ old('website_name') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="main-input d-flex align-items-center w-100" for="website_logo"><i
                                    class="fa-solid fa-camera-retro fa-xl"></i> <span class="mx-2">Select
                                    website logo</span> </label>
                            <input type="file" class="form-control" id="website_logo" accept="image/*"
                                name="website_logo" onchange="loadFile(event)" hidden />
                        </div>
                    </div>

                    <div class="m-3">
                        <textarea class="main-textarea" id="textAreaExample2" name="website_description">{{ $setting->website_description }}</textarea>
                    </div>

                    <div class="row col-md-12" id="row">
                        <div class="col-md-6">
                            <input type="text" class="main-input" placeholder="Enter Email" name="website_email"
                                value="{{ old('website_email') }}">
                            <input type="text" class="main-input" placeholder="Enter instagram" name="website_instagram"
                                value="{{ old('website_instagram') }}">
                            <input type="text" class="main-input" placeholder="Enter phone" name="website_phone"
                                value="{{ old('website_phone') }}">
                            <input type="text" class="main-input" placeholder="Enter website address"
                                name="website_address" value="{{ old('website_address') }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="main-input" placeholder="Enter facebook" name="website_facebook"
                                value="{{ old('website_facebook') }}">
                            <input type="text" class="main-input" placeholder="Enter Youtube" name="website_youtube"
                                value="{{ old('website_youtube') }}">
                            <input type="text" class="main-input" placeholder="Enter Twitter" name="website_twitter"
                                value="{{ old('website_twitter') }}">
                            <input type="tel" class="main-input" placeholder="Enter website whatsapp"
                                name="website_whatsapp" value="{{ old('website_whatsapp') }}">
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary btn-rounded btn-lg main-button">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- alert modal -->
    <div class="modal fade" id="SettingAlert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
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
    <!-- render the image -->
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>

    <!-- clse the errors message -->
    <script>
        // Get all close buttons
        var closeButtons = document.getElementsByClassName('close');

        // Attach click event listeners to each close button
        for (var i = 0; i < closeButtons.length; i++) {
            closeButtons[i].addEventListener('click', function() {
                // Find the parent notification element and hide it
                var notification = this.parentNode;
                notification.style.display = 'none';
            });
        }
    </script>
@endpush
