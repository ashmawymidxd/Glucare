@extends('Website/layouts/master')

@section('title')
    website home
@endsection

@push('css')
    {{-- <link rel="stylesheet" href="{{URL::asset('Website/css/custom-style.css')}}" /> --}}
    {{-- {{url('Website/img/chat.png')}} --}}
@endpush

@section('sub-header')
@endsection

@section('content')
    <div class="mt-5 p-5">
        {{-- <livewire:p-d-m.patient-doctor-message-list :user="$user" :doctor="$doctor" /> --}}
        <livewire:p-d-m.patient-doctor-message :user="$user" :doctor="$doctor" />
    </div>
@endsection

@push('js')
    {{-- <script src="{{url('Website/js/chart.js')}}"></script> --}}
@endpush
