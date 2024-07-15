@extends('Dashboard/layouts/master')

@section('title')
    services
@endsection

@section('css')
    <link rel="stylesheet" href="{{URL::asset('Dashboard/css/custom-style-allServices.css')}}" />
@endsection

@section('page-url')
    <h5 class="pt-1">Dashboard / Services / <span class="active"> all services </span></h5>
@endsection

@section('page-header')
<div class="header">
    <div class="layer1"></div>
    <div class="layer2">
      <div class="container-fluid d-flex align-items-center justify-content-center">
        <div class="row col-md-12" style="background-color:rgba(137, 43, 226, 0);margin-top: -100px;">
          <div class="col-md-4 p-5">
            <div class="card p-3 d-flex">
              <div class="d-flex align-items-center justify-content-around">
                <div class="card d-flex align-items-center justify-content-center p-4" style="margin-top: -50px;">
                  <i class="fa-solid fa-street-view"style="color:#3B71CA;font-size: 35px;"></i>
                </div>
                <div style="color: #3B71CA;line-height: 10px;">
                  <p>Diabetes Detection</p>
                  <span>12,333</span>
                </div>
              </div>
              <hr>
              50%
            </div>
          </div>
          <div class="col-md-4 p-5">
            <div class="card p-3 d-flex">
              <div class="d-flex align-items-center justify-content-around">
                <div class="card d-flex align-items-center justify-content-center p-4" style="margin-top: -50px;">
                  <i class="fa-solid fa-utensils" style="color:#3B71CA;font-size: 35px;"></i>
                </div>
                <div style="color: #3B71CA;line-height: 10px;">
                  <p>Recommendation System</p>
                  <span>132</span>
                </div>
              </div>
              <hr>
              50%
            </div>
          </div>
          <div class="col-md-4 p-5">
            <div class="card p-3 d-flex">
              <div class="d-flex align-items-center justify-content-around">
                <div class="card d-flex align-items-center justify-content-center p-4" style="margin-top: -50px;">
                  <i class="fa-solid fa-comment-dots" style="color:#3B71CA;font-size: 35px;"></i>
                </div>
                <div style="color: #3B71CA;line-height: 10px;">
                  <p>Live Chat System</p>
                  <span>1332</span>
                </div>
              </div>
              <hr>
              50%
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
<div class="p-3">
    <div class="container-fluid d-flex align-items-center justify-content-center" style="margin-top: -70px;">
      <div class="row col-md-12" style="background-color: rgba(0, 0, 255, 0);">
        <div class="col-md-6 p-4">
          <div class="card p-3">
            <div id="chart"></div>
          </div>
        </div>
        <div class="col-md-6 p-4">
          <div class="card p-3">
            <div id="frost-chart"></div>
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

