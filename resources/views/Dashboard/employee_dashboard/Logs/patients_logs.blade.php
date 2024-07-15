@extends('Dashboard/layouts/master')

@section('title')
    user_logs logs
@endsection

@section('page-url')
    <h6 class="pt-1">Dashboard / <span class="active"> user_logs logs </span></h6>
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
            <div class="">
                <div class="mx-4 my-3">
                    <!-- write your content here -->
                    <div class="pb-0">
                        <div class="options my-2 p-2 d-flex justify-content-between">
                            <div class="btn-group shadow-0">
                                @include('Dashboard.layouts.export-btn')
                            </div>
                        </div>

                        <div class="table overflow-x-scroll" id="DataTableDiv">
                            <table id="DataTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>

                                        <th>message</th>
                                        <th>created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user_logs as $user_log)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>{{ $user_log->message }}</td>
                                            <td>{{ $user_log->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>

                                        <th>message</th>
                                        <th>created at</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
