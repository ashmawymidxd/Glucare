@extends('Dashboard/layouts/master')

@section('title')
    Patients Detailes
@endsection

@section('page-url')
    <h6 class="pt-1">Dashboard / <span class="active"> Patients Detailes </span></h6>
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
    <div class="mx-4 my-3">
        <div class="container-fluid card p-0" style="margin-top: -70px">
            <div class=" tab-menu-heading">
                <div class="tabs-menu1">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs main-nav-line">
                        <li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">Patient
                                Records</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body main-content-body-right p-3">
                <div class="tab-content">
                    {{-- Strat Show Information Patient --}}

                    <div class="tab-pane active" id="tab1">
                        <br>
                        <div class="vtimeline">
                            <div class="row p-3">
                                @foreach ($patient_records as $patient_record)
                                    <div class="col-md-6">
                                        <div class="bg-primary text-white p-3 rounded-5 m-2">
                                            <div class=" {{ $loop->iteration % 2 == 0 ? 'timeline-inverted' : '' }}">
                                                <div class="timeline-badge"><i
                                                        class="fa-solid fa-check-circle fa-2xl mb-4"></i>
                                                </div>
                                                <div class="timeline-panel">
                                                    <div class="">
                                                        <strong>Diagnosis</strong>
                                                        <p class="text-info">{{ $patient_record->diagnosis }}</p>
                                                    </div>
                                                    <div class="">
                                                        <strong>Medicine</strong>
                                                        <p class="text-info">{{ $patient_record->medicine }}</p>
                                                    </div>
                                                    <div class="timeline-footer d-flex align-items-center flex-wrap">
                                                        <i class="fas fa-user-md"></i>&nbsp;
                                                        <span>{{ $patient_record->Doctor->name }}</span>
                                                        <span class="mr-auto"><i
                                                                class="fe fe-calendar  mr-1"></i>{{ $patient_record->date }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    {{-- End Show Information Patient --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
