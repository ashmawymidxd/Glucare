@extends('Dashboard/layouts/master')

@section('title')
    Patients Ratings
@endsection

@section('page-url')
    <h6 class="pt-1">Dashboard / <span class="active"> Patients Ratings </span></h6>
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
            @if ($doctorRatings)
                <div class="col-md-12 col-lg-12 col-xl-12 mt-3">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex flex-row">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $doctorRatingsAvg)
                                    <i class="fas fa-star text-warning me-2"></i>
                                @else
                                    <i class="fas fa-star text-secondary me-2"></i>
                                @endif
                            @endfor
                        </div>
                        <h5 class="text-dark mb-0">all comments ({{ $doctorRatingsCount }})</h5>
                        <div class="card">
                            <div class="card-body p-2 d-flex align-items-center">
                                <h6 class="text-primary fw-bold small mb-0 me-1">Comments "ON"</h6>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked />
                                    <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($doctorRatings as $doctorRating)
                        <div class="card mb-3 shadow-0 border">
                            <div class="card-body">
                                <div class="d-flex flex-start">
                                    @if ($doctorRating->image)
                                        <img alt="Image placeholder" width="50px" height="50px"
                                            src="{{ URL('Dashboard/img/profile/users/' . $doctorRating->image->filename) }}"
                                            class="avatar rounded-circle mr-3">
                                    @else
                                        <img src="{{ URL('Dashboard/img/profile/users/default.png') }}"
                                            class="rounded-circle mr-3" height="50" width="50px" alt="Avatar"
                                            loading="lazy" />
                                    @endif
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="text-primary fw-bold mb-0">
                                                {{ $doctorRating->user_name }}
                                                <span class="text-dark ms-2">Hi, {{ $doctorRating->user_review }}</span>
                                            </h6>
                                            <p class="mb-0">{{ $doctorRating->created_at->diffForHumans() }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="small mb-0" style="color: #aaa;">
                                                <a href="#!" class="link-grey">Remove</a> •
                                                <a href="#!" class="link-grey">Reply</a> •
                                                <a href="#!" class="link-grey">Translate</a>
                                            </p>
                                            <div class="d-flex flex-row">
                                                @php
                                                    $userRating = $doctorRating->user_rating;
                                                @endphp

                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $userRating)
                                                        <i class="fas fa-star text-warning me-2"></i>
                                                    @else
                                                        <i class="fas fa-star text-secondary me-2"></i>
                                                    @endif
                                                @endfor

                                                <i class="far fa-check-circle" style="color: #aaa;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-danger" role="alert">
                    No Ratings Found
                </div>
            @endif
        </div>
    </div>
@endsection

@push('js')
@endpush
