@extends('Dashboard/layouts/master')

@section('title')
    section
@endsection

@section('page-url')
    <h6 class="pt-1">{{ trans('Dashboard/home.dashboard') }} / <span class="active">
            {{ trans('Dashboard/section.section') }} </span></h6>
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
        <div class="container-fluid card" style="margin-top: -70px">
            <!-- write your content here -->
            <div class="pb-0">
                <div class="options my-2 d-flex justify-content-between">
                    <div class="add">
                        <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#add">
                            {{ trans('Dashboard/section.add_section') }}
                        </button>
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
                                <th class="wd-15p border-bottom-0">{{ trans('Dashboard/section.section_number') }}</th>
                                <th class="wd-15p border-bottom-0">{{ trans('Dashboard/section.section_name') }}
                                </th>
                                <th class="wd-15p border-bottom-0">{{ trans('Dashboard/section.section_description') }}
                                </th>
                                <th class="wd-20p border-bottom-0">{{ trans('Dashboard/section.section_created_at') }}</th>
                                <th class="wd-20p border-bottom-0">{{ trans('Dashboard/section.section_options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sections as $section)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{ route('section.show', $section->id) }}">{{ $section->name }}</a>
                                    </td>
                                    <td>{{ \Str::limit($section->description, 50) }}</td>
                                    <td>{{ $section->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a type="button" class="btn btn-sm btn-primary text-white" data-mdb-toggle="modal"
                                            data-mdb-target="#edit{{ $section->id }}"><i class="fa-solid fa-pen"></i></a>
                                        <a class="modal-effect btn btn-sm btn-danger text-white" data-effect="effect-scale"
                                            data-mdb-toggle="modal" data-mdb-target="#delete{{ $section->id }}"><i
                                                class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                @include('Dashboard.Sections.edit')
                                @include('Dashboard.Sections.delete')
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="wd-15p border-bottom-0">{{ trans('Dashboard/section.section_number') }}</th>
                                <th class="wd-15p border-bottom-0">{{ trans('Dashboard/section.section_name') }}
                                </th>
                                <th class="wd-15p border-bottom-0">{{ trans('Dashboard/section.section_description') }}
                                </th>
                                <th class="wd-20p border-bottom-0">{{ trans('Dashboard/section.section_created_at') }}</th>
                                <th class="wd-20p border-bottom-0">{{ trans('Dashboard/section.section_options') }}</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal section feedback-->
    <div class="modal fade" id="SectionAlert" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Section Feedback</h5>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body" id="responseMessage">...</div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                        data-mdb-dismiss="modal">Close</button> --}}
                    <button type="button" class="btn btn-primary" id="refresh" data-mdb-ripple-init>Save Change</button>
                </div>
            </div>
        </div>
    </div>
    @include('Dashboard.Sections.add')
@endsection

@push('js')
    <!-- serch operation -->
    <script>
        $(document).ready(function() {
            $("#search-input").keyup(function() {
                let value = $(this).val().toLowerCase();
                $("tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            $("#refresh").click(function() {
                window.location = '/section';
            });
        })
    </script>

    <!-- data table -->
    <script>
        new DataTable('#DataTable');
    </script>
@endpush
