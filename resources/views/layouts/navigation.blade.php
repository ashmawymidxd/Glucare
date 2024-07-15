<!-- Navbar -->
<nav class="bg-blue-700" style="background-color: rgb(59 113 202)">
    <!-- Container -->
    <div class="container mx-auto px-4">
        <!-- Navbar content -->
        <div class="flex justify-between items-center py-4">
            <!-- Brand -->
            <div class="flex justify-between items-center gap-7">
                <a class="text-white text-xl font-bold" href="{{ route('website.user') }}">
                    {{ $settings->website_name }}
                </a>

                <!-- Toggle button -->
                <button class="text-white focus:outline-none lg:hidden">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Navbar links -->
                <div class="hidden lg:flex space-x-4">
                    <a class="" style="color:rgb(22, 230, 230)" href="{{ route('getstart.index') }}">Get Start</a>
                    <a class="text-white" href="{{ route('chat.index') }}">Live Chat</a>
                    <a class="" style="color:rgb(22, 230, 230)" href="/blogPosts">Blog</a>
                    <a class="" style="color:rgb(22, 230, 230)"
                        href="{{ route('patientdiabetesreport.index') }}">Reports</a>
                    <a class="" style="color:rgb(22, 230, 230)" href="{{ route('dietary.index') }}">Dietary</a>
                    <a class="" style="color:rgb(22, 230, 230)" href="{{ route('activity.index') }}">Activity</a>
                    <a class="" style="color:rgb(22, 230, 230)"
                        href="{{ route('appointment.index') }}">Appointment</a>
                </div>

            </div>

            <!-- Right elements -->
            <div class="flex items-center space-x-3">
                <!-- Message icon -->

                <a class="text-white" href="#">
                    <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                    </svg>
                </a>

                <!-- Notifications dropdown -->
                <div class="relative">
                    <a class="text-white" href="#" id="navbarDropdownMenuLink">
                        <svg class="h-6 w-6 text-white" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <polyline points="3 9 12 15 21 9 12 3 3 9" />
                            <path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10" />
                            <line x1="3" y1="19" x2="9" y2="13" />
                            <line x1="15" y1="13" x2="21" y2="19" />
                        </svg>
                    </a>
                    <div class="absolute right-0 mt-2 w-64 bg-white shadow-lg rounded-md hidden"
                        aria-labelledby="navbarDropdownMenuLink">
                        <!-- Dropdown header -->
                        <div class="px-3 py-2">
                            <h6 class="text-sm text-gray-700">You have
                                <strong
                                    class="text-blue-500">{{ auth('web')->user()->unreadNotifications->count() }}</strong>
                                notifications.
                            </h6>
                        </div>
                        <!-- List group -->
                        <div class="divide-y">
                            @foreach (auth()->user()->unreadNotifications as $notification)
                                <a href="{{ route('patientdiabetesreport.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-200">
                                    <div class="flex items-center">
                                        @if (auth('web')->user()->image)
                                            <img src="{{ URL('Dashboard/img/profile/users/' . auth('web')->user()->image->filename) }}"
                                                class="w-8 h-8 rounded-full mr-2" alt="User Avatar">
                                        @else
                                            <img src="{{ URL('Dashboard/img/profile/users/default.png') }}"
                                                class="w-8 h-8 rounded-full mr-2" alt="User Avatar">
                                        @endif
                                        <div>
                                            <h6 class="text-sm">{{ $notification->data['user'] }}</h6>
                                            <p class="text-xs text-gray-600">
                                                {{ $notification->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <!-- View all -->
                        <a href="MarkAsRead_all"
                            class="block px-3 py-2 text-sm text-blue-500 font-bold text-center">View all</a>
                    </div>
                </div>

                <!-- Avatar dropdown -->
                <div class="relative">
                    <button class="flex items-center text-white" id="modalAvatarActive">
                        @if (auth('web')->user()->image)
                            <img src="{{ URL('Dashboard/img/profile/users/' . auth('web')->user()->image->filename) }}"
                                class="w-8 h-8 rounded-full mr-2" alt="User Avatar">
                        @else
                            <img src="{{ URL('Dashboard/img/profile/users/default.png') }}"
                                class="w-8 h-8 rounded-full mr-2" alt="User Avatar">
                        @endif
                    </button>
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden"
                        aria-labelledby="modalAvatarActive">
                        <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Profile</a>
                        <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Settings</a>
                        <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- End Navbar -->
