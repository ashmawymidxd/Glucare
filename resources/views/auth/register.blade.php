@extends('auth/layouts/master')
@section('title')
    Registration
@endsection
@section('content')
    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">
        <div class="container px-4  px-md-5 text-center text-lg-start my-5" style="height:87.8vh">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <h2 class="fw-bold mb-3 text-center">Sign in now</h2>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div class="form-outline">
                                            <input id="form3Example1" class="form-control p-3" type="text" name="name"
                                                :value="old('name')" required autofocus autocomplete="name" />
                                            <label class="form-label" for="form3Example1">First name</label>
                                        </div>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-warning" />
                                    </div>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input id="form3Example3" class="form-control p-3" type="email" name="email"
                                        :value="old('email')" required autocomplete="username" />
                                    <label class="form-label" for="form3Example3">Email address</label>
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-warning" />

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input id="form3Example4" class="form-control p-3" type="password" name="password"
                                        required autocomplete="new-password" />
                                    <label class="form-label" for="form3Example4">Password</label>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />


                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input id="form3Example9" class="form-control p-3" type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                                    <label class="form-label" for="form3Example9">confirmation Password</label>
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-warning" />

                                <!-- Checkbox -->
                                <div class="d-flex justify-content-between mb-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault4" name="remember" />
                                        <label class="form-check-label" for="flexSwitchCheckDefault4">Subscribe to our
                                            newsletter</label>
                                    </div>

                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                        href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4 p-3">
                                    Sign up
                                </button>

                                <!-- Register buttons -->
                                @include('auth.layouts.register-with-another')
                            </form>
                        </div>
                    </div>
                    <!-- Bootstrap JS (Make sure to include Bootstrap and Popper.js) -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0 animate">
                    <img class="animated-image" src="{{ url('Dashboard/img/3d/register.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
@endsection
