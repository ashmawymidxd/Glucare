@extends('auth/layouts/master')
@section('title')
    login
@endsection
@section('content')
    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">
        <div class="container px-4  px-md-5 text-center text-lg-start my-5" style="height:87.8vh">
            <div class="row gx-lg-5 align-items-center mb-5">

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div class="card">
                        <div class="card-body px-4 py-5 px-md-5">
                            <h2 class="fw-bold mb-3 text-center font-arial">{{ trans('Dashboard/login_trans.Sign') }}</h2>

                            <!-- Tabs navigation -->
                            <ul class="nav nav-tabs mb-5" id="myTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="admin-tab" data-bs-toggle="tab" href="#admin"
                                        role="tab" aria-controls="admin"
                                        aria-selected="true">{{ trans('Dashboard/login_trans.admin') }}</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="doctors-tab" data-bs-toggle="tab" href="#doctors" role="tab"
                                        aria-controls="doctors"
                                        aria-selected="false">{{ trans('Dashboard/login_trans.doctor') }}</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="employee-tab" data-bs-toggle="tab" href="#employee"
                                        role="tab" aria-controls="employee"
                                        aria-selected="false">{{ trans('Dashboard/login_trans.employee') }}</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="user-tab" data-bs-toggle="tab" href="#user" role="tab"
                                        aria-controls="user"
                                        aria-selected="false">{{ trans('Dashboard/login_trans.user') }}</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <!-- error messages -->
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <p class="text-warning">{{ $error }}</p>
                                    @endforeach
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <!-- Administrator Form -->
                                <div class="tab-pane fade show active" id="admin" role="tabpanel"
                                    aria-labelledby="user-tab">
                                    <form method="POST" action="{{ route('login.admin') }}">
                                        @csrf
                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <input id="form3Example1" class="form-control p-3" type="email" name="email"
                                                value="{{ old('email') }}" required autofocus autocomplete="username" />
                                            <label class="form-label"
                                                for="form3Example1">{{ trans('Dashboard/login_trans.email') }}</label>
                                        </div>
                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <input type="password" id="form3Example5" class="form-control p-3"
                                                type="password" name="password" required autocomplete="current-password" />
                                            <label class="form-label"
                                                for="form3Example5">{{ trans('Dashboard/login_trans.password') }}</label>
                                        </div>
                                        <div class="d-flex justify-content-between mb-4">
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                    href="{{ route('password.request') }}">
                                                    {{ trans('Dashboard/login_trans.forget') }}
                                                </a>
                                            @endif
                                            <!-- Remember Me -->
                                            <div class="form-check">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="flexSwitchCheckDefault1" name="remember" />
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckDefault1">{{ trans('Dashboard/login_trans.remember') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary btn-block mb-4 p-3">
                                            {{ trans('Dashboard/login_trans.login') }}
                                        </button>
                                        <!-- Register buttons -->
                                        @include('auth.layouts.register-with-another')
                                    </form>
                                </div>

                                <!-- Doctor Form -->
                                <div class="tab-pane fade" id="doctors" role="tabpanel" aria-labelledby="admin-tab">
                                    <form method="POST" action="{{ route('login.doctor') }}">
                                        @csrf
                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <input id="form3Example2" class="form-control p-3" type="email" name="email"
                                                value="{{ old('email') }}" required autofocus autocomplete="username" />
                                            <label class="form-label"
                                                for="form3Example2">{{ trans('Dashboard/login_trans.email') }}</label>
                                        </div>
                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <input type="password" id="form3Example6" class="form-control p-3"
                                                type="password" name="password" required
                                                autocomplete="current-password" />
                                            <label class="form-label"
                                                for="form3Example6">{{ trans('Dashboard/login_trans.password') }}</label>
                                        </div>
                                        <div class="d-flex justify-content-between mb-4">
                                            <!-- Submit button -->
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                    href="{{ route('password.request') }}">
                                                    {{ trans('Dashboard/login_trans.forget') }}
                                                </a>
                                            @endif
                                            <!-- Remember Me -->
                                            <div class="form-check">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="flexSwitchCheckDefault2" name="remember" />
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckDefault2">{{ trans('Dashboard/login_trans.remember') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block mb-4 p-3">
                                            {{ trans('Dashboard/login_trans.login') }}
                                        </button>
                                        <!-- Register buttons -->
                                        @include('auth.layouts.register-with-another')
                                    </form>
                                </div>

                                <!-- Employee Form -->
                                <div class="tab-pane fade" id="employee" role="tabpanel"
                                    aria-labelledby="employee-tab">
                                    <form method="POST" action="{{ route('login.employee') }}">
                                        @csrf
                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <input id="form3Example7" class="form-control p-3" type="email"
                                                name="email" value="{{ old('email') }}" required autofocus
                                                autocomplete="username" />
                                            <label class="form-label"
                                                for="form3Example7">{{ trans('Dashboard/login_trans.email') }}</label>
                                        </div>
                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <input type="password" id="form3Example3" class="form-control p-3"
                                                type="password" name="password" required
                                                autocomplete="current-password" />
                                            <label class="form-label"
                                                for="form3Example3">{{ trans('Dashboard/login_trans.password') }}</label>
                                        </div>
                                        <div class="d-flex justify-content-between mb-4">
                                            <!-- Submit button -->
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                    href="{{ route('password.request') }}">
                                                    {{ trans('Dashboard/login_trans.forget') }}
                                                </a>
                                            @endif
                                            <!-- Remember Me -->
                                            <div class="form-check">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="flexSwitchCheckDefault3" name="remember" />
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckDefault3">{{ trans('Dashboard/login_trans.remember') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block mb-4 p-3">
                                            {{ trans('Dashboard/login_trans.login') }}
                                        </button>
                                        <!-- Register buttons -->
                                        @include('auth.layouts.register-with-another')
                                        
                                    </form>
                                </div>

                                <!-- User Form -->
                                <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="doctors-tab">
                                    <form method="POST" action="{{ route('login.user') }}">
                                        @csrf
                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <input id="form3Example4" class="form-control p-3" type="email"
                                                name="email" value="{{ old('email') }}" required autofocus
                                                autocomplete="username" />
                                            <label class="form-label"
                                                for="form3Example4">{{ trans('Dashboard/login_trans.email') }}</label>
                                        </div>
                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <input type="password" id="form3Example8" class="form-control p-3"
                                                type="password" name="password" required
                                                autocomplete="current-password" />
                                            <label class="form-label"
                                                for="form3Example8">{{ trans('Dashboard/login_trans.password') }}</label>
                                        </div>
                                        <div class="d-flex justify-content-between mb-4">
                                            <!-- Submit button -->
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                    href="{{ route('password.request') }}">
                                                    {{ trans('Dashboard/login_trans.forget') }}
                                                </a>
                                            @endif
                                            <!-- Remember Me -->
                                            <div class="form-check">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="flexSwitchCheckDefault4" name="remember" />
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckDefault4">{{ trans('Dashboard/login_trans.remember') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block mb-4 p-3">
                                            {{ trans('Dashboard/login_trans.login') }}
                                        </button>
                                        <!-- Register buttons -->
                                        @include('auth.layouts.register-with-another')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bootstrap JS (Make sure to include Bootstrap and Popper.js) -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                    <script>
                        // Activate the User tab by default
                        var userTab = new bootstrap.Tab(document.getElementById('admin-tab'));
                        userTab.show();
                    </script>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0 animate" style="z-index: 10">
                    <img class="animated-image" src="{{ url('Dashboard/img/3d/login.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
@endsection
