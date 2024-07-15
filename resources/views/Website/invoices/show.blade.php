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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Invoice
                    </div>
                    {{-- `id`, `invoice_date`, `patient_id`, `doctor_id`, `section_id`, `price`, `discount_value`, `tax_rate`, `tax_value`, `total_with_tax`, `created_at`, `updated_at` --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Invoice Details</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Invoice Number</th>
                                        <td>{{ $invoice->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> patient_id</th>
                                        <td>{{ $invoice->patient_id }}</td>
                                    </tr>
                                    <tr>
                                        <th> doctor_id</th>
                                        <td>{{ $invoice->doctor_id }}</td>
                                    </tr>
                                    <tr>
                                        <th> section_id</th>
                                        <td>{{ $invoice->section_id }}</td>

                                    </tr>
                                    <tr>
                                        <th> price</th>
                                        <td>{{ $invoice->price }}</td>

                                    </tr>
                                    <tr>
                                        <th> discount_value</th>
                                        <td>{{ $invoice->discount_value }}</td>
                                    </tr>
                                    <tr>
                                        <th> tax_rate</th>
                                        <td>{{ $invoice->tax_rate }}</td>
                                    </tr>
                                    <tr>
                                        <th> tax_value</th>
                                        <td>{{ $invoice->tax_value }}</td>
                                    </tr>
                                    <tr>
                                        <th> total_with_tax</th>
                                        <td>{{ $invoice->total_with_tax }}</td>
                                    </tr>
                                    <tr>
                                        <th> created_at</th>
                                        <td>{{ $invoice->created_at }}</td>

                                    </tr>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('js')
        {{-- <script src="{{url('Website/js/chart.js')}}"></script> --}}
    @endpush
