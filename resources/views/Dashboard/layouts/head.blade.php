@livewireStyles
<!-- Title -->
<title>@yield('title', 'document')</title>
<!-- datatables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<!-- bootstrap -->
<link rel="stylesheet" href="{{ URL::asset('Dashboard/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('Dashboard/css/mdb.min.css') }}" />
<script src="{{ URL::asset('Website/js/vendor/jquery-1.12.4.min.js') }}"></script>

{{-- <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/font-awesome.min.css') }}" /> --}}
<link rel="stylesheet" href="{{ URL::asset('Dashboard/css/flaticon.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('Dashboard/css/sidebar.css') }}" />

<!-- include SheetJS library excel-->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.8/xlsx.full.min.js"></script> --}}

<!-- include dependencies pdf-->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script> --}}

<!-- take a snapshot -->
{{-- <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script> --}}

@if (App::getLocale() == 'ar')
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/mdb.rtl.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/mdb.dark.min.css') }}" /> --}}
@endif

@stack('css')
@yield('css')
