{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('auth/layouts/master')
@section('title')
    Forget password
@endsection
@section('content')
    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">
        <div class="container px-4  px-md-5 text-center text-lg-start my-5" style="height:87.8vh">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <h2 class="fw-bold mb-3 text-center">Forgot your password</h2>

                            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            </div>

                            <div class="">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div>
                                        <x-input-label for="email" :value="__('Email')" />

                                        <div class="form-outline p-2">
                                            <input id="email" class="form-control" type="email" name="email"
                                                :value="old('email')" required autofocus />
                                            <label class="form-label" for="form7Example2">current Email Address</label>
                                        </div>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                    </div>
                                    <div class="flex justify-end mt-4">
                                        <x-primary-button class="btn btn-primary btn-block mb-4 shadow-0">
                                            {{ __('Email Password Reset Link') }}
                                        </x-primary-button>
                                    </div>
                                </form>
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
                <div class="col-lg-6 mb-5 mb-lg-0 animate">
                    <img class="animated-image" src="{{ url('Dashboard/img/3d/forget.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
@endsection
