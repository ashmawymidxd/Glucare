<!-- Title -->
<title>@yield('title', 'document')</title>
<script src="{{ URL::asset('Website/js/vendor/jquery-1.12.4.min.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('Website/css/slider.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('Website/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('Website/css/style.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('Website/css/mdb.min.css') }}" />
{{-- <link rel="stylesheet" href="{{URL::asset('Website/css/mdb.dark.min.css')}}" /> --}}
{{-- <link rel="stylesheet" href="{{URL::asset('Website/css/mdb.rtl.min.css')}}" /> --}}
{{-- <link rel="stylesheet" href="{{URL::asset('Website/css/mdb.dark.rtl.min.css')}}" /> --}}
<style>
    .header-area {
        margin-top: -30px;
    }
</style>
@stack('css')

@if (App::getLocale() == 'ar')
    <link rel="stylesheet" href="{{ URL::asset('Website/css/mdb.rtl.min.css') }}" />
@endif
