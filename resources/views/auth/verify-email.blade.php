@extends('auth/layouts/master')
@section('title')
    verify email
@endsection
@section('content')
    <section class="background-radial-gradient overflow-hidden">
        <div class="container px-4  px-md-5 text-center text-lg-start my-5" style="height:87.8vh">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <h2 class="fw-bold mb-3 text-center">verification Your Email</h2>
                            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                            </div>

                            @if (session('status') == 'verification-link-sent')
                                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400"
                                    style="color: goldenrod">
                                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                </div>
                            @endif
                            <div class="d-flex justify-content-between">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf

                                    <div>
                                        <x-primary-button class="btn btn-primary btn-block mb-4 shadow-0">
                                            {{ __('Resend Verification Email') }}
                                        </x-primary-button>
                                    </div>
                                </form>

                                <form method="POST" action="{{ route('logout.user') }}">
                                    @csrf

                                    <button type="submit" class="btn btn-secondary btn-block mb-4">
                                        {{ __('Log Out') }}
                                    </button>
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
                    <img class="animated-image" src="{{ url('Dashboard/img/3d/verify-email.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
