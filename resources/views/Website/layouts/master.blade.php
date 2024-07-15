<!DOCTYPE html>
@if (App::getLocale() == 'ar')
    <html lang="ar" dir="rtl">
@endif
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- Logo -->
    <link rel="shortcut icon" href="{{ URL('Dashboard/img/logo/' . $settings->image->filename) }}" type="image/x-icon">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <!-- headers -->
    @include('Website/layouts.head')
</head>

<body style="background-color: aliceblue">
    @livewireStyles
    <!-- this is main navbar -->
    @include('Website/layouts.main-navbar')

    <!-- sub header -->
    @yield('sub-header')

    <!-- page content -->
    @yield('content')

    <!-- main footer -->
    @include('Website/layouts.footer')

    <!-- scripts -->
    @include('Website/layouts.footer-scripts')
    @livewireScripts
</body>
