@extends('Dashboard/layouts/master')

@section('title')
    Empty
@endsection

@section('page-url')
    <h6 class="pt-1">Dashboard / <span class="active"> Empty </span></h6>
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
            <h1>empty</h1>
        </div>
    </div>
@endsection

@push('js')
@endpush