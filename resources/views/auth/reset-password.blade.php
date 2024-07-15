{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



@extends('auth/layouts/master')
@section('title')
    reset password
@endsection
@section('content')
    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">
        <div class="container px-4  px-md-5 text-center text-lg-start my-5" style="height:87.8vh">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <h2 class="fw-bold mb-3 text-center">Reset your password</h2>

                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf

                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <!-- Email Address -->
                                <div class="form-outline p-2 my-3">
                                    <input id="email" class="form-control" type="email" name="email"
                                        :value="old('email', $request - > email)" required autofocus />
                                    <label class="form-label" for="email">email</label>
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                <!-- Password -->
                                <div class="form-outline p-2 my-3">
                                    <input id="password" class="form-control" type="password" name="password" required
                                        autocomplete="new-password" />
                                    <label class="form-label" for="email">Password</label>

                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                <!-- Confirm Password -->
                                <div class="form-outline p-2 my-3">
                                    <input id="password_confirmation" class="form-control" type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                                    <label class="form-label" for="email">Confirm Password</label>
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                                <div>
                                    <x-primary-button class="btn btn-primary btn-block mb-4 shadow-0">
                                        {{ __('Reset Password') }}
                                    </x-primary-button>
                                </div>
                                
                            </form>
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
                <div class="col-lg-6 mb-5 mb-lg-0 animate">
                    <img class="animated-image" src="{{ url('Dashboard/img/3d/reset.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
@endsection
