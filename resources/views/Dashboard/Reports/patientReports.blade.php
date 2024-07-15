@extends('Dashboard/layouts/master')

@section('title')
    patient Reports
@endsection

@section('css')
    <link rel="stylesheet" href="{{URL::asset('Dashboard/css/custom-style-patientReports.css')}}" />
@endsection

@section('page-url')
    <h5 class="pt-1">Dashboard / Reports / <span class="active"> patient reports </span></h5>
@endsection

@section('page-header')
    <div class="header">
        <div class="layer1"></div>
        <div class="layer2"></div>
    </div>
@endsection

@section('content')
<div class="p-0 mb-5">
    <div class="container-fluid d-flex align-items-center justify-content-center full" style="margin-top: -70px">
        <div class="row col-md-12" id="row">
            <div class="col-md-12">
                <div class="card p-3 mb-1">
                    <div class="row" id="row">
                        <div class="col-md-4 main-color">
                            <div class="d-flex align-items-baseline">
                                <input type="radio" name="radio" id="age">
                                <label for="age" class="ml-2">Search By Age</label>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <input type="radio" name="radio" id="clocos">
                                <label for="clocos" class="ml-2">Search By Glocos</label>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <input type="radio" name="radio" id="Status">
                                <label for="Status" class="ml-2">Search By Status</label>
                            </div>
                        </div>
                        <div class="col-md-4 main-color">
                            <label for="">Start Date At</label><br>
                            <input type="date" name="" id="">
                        </div>
                        <div class="col-md-4 main-color">
                            <label for="">End Data At</label><br>
                            <input type="date" name="" id="">
                        </div>
                    </div>
                    <button class="btn btn-primary">search</button>
                    <div class="custom-table mt-3 scrole card p-3 mt-5">
                        <!-- search in table -->
                        <div class="search mb-2" >
                            <div class="btn-group p-1" style="box-shadow: none">
                                <button class="btn btn-primary mt-1 mb-1">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                                <input type="text" class="search-hover m-1" name="" placeholder="search here..." />
                            </div>
                        </div>
                        <table class="scrole">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>age</th>
                                    <th>glocos</th>
                                    <th>status</th>
                                    <th>date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>ahmed</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>good</td>
                                    <td>20/10/2021</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>ahmed</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>good</td>
                                    <td>20/10/2021</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>ahmed</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>good</td>
                                    <td>20/10/2021</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>ahmed</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>good</td>
                                    <td>20/10/2021</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>ahmed</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>good</td>
                                    <td>20/10/2021</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>ahmed</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>good</td>
                                    <td>20/10/2021</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>ahmed</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>good</td>
                                    <td>20/10/2021</td>
                        </table>
                        <div class="exports mt-5">
                            <!-- exports buttons with icos from fot awsome as pdf exel snapshoot-->
                            <button class="btn btn-primary">pdf</button>
                            <button class="btn btn-primary">exel</button>
                            <button class="btn btn-primary">snapshoot</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <!-- chart file -->
    <script src="{{url('Dashboard/js/chart.js')}}"></script>
    <!-- frost chart file -->
    <script src="{{url('Dashboard/js/frost_chart.js')}}"></script>
@endsection
