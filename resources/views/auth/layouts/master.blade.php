<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- website fivicone -->
    <link rel="shortcut icon" href="{{ URL('Dashboard/img/logo/' . $settings->image->filename) }}" type="image/x-icon">
    <title>@yield('title')</title>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" /> --}}
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/bootstrap.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/mdb.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/text-holder.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/auth-style.css') }}" />
    @if (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/mdb.rtl.min.css') }}" />
        {{-- <link rel="stylesheet" href="{{ URL::asset('Dashboard/css/mdb.dark.min.css') }}" /> --}}
    @endif
</head>

<body>
    <!-- Section: Design Block -->

    @yield('content')
    <!-- Section: Design Block -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
</body>

</html>
