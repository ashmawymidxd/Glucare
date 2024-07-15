<style>
    #editBody {
        display: none;
    }

    .nav-img {
        background-image: url("https://www.transparenttextures.com/patterns/axiom-pattern.png");
    }
</style>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top nav-img">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Navbar brand -->
        <div class="">
            <a class="d-flex navbar-brand mt-2 mt-lg-0 shadow-0" href="{{ route('website.user') }}">
                {{-- <img width="30px" src="{{ URL('Dashboard/img/logo/' . $settings->image->filename) }}" alt=""> --}}
                <h5 class="pt-1">{{ $settings->website_name }}</h5>
            </a>
        </div>
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('getstart.index') }}">Get Start</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('chat.index') }}">Live Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blogPosts">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('patientdiabetesreport.index') }}">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dietaryList') }}">Dietary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('activityList') }}">Activity</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('appointment.index') }}">Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/todo">Todo List</a>
                </li>
            </ul>
            <!-- Left links -->

            <!-- Right elements -->
            <div class="d-flex align-items-center justify-content-start">
                <!-- Icon -->
                <a class="text-reset me-3" href="#">
                    <i class="fas fa-message text-white"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">0</span>
                </a>

                <!-- Notifications -->
                <div class="dropdown">
                    <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                        role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell text-white"></i>
                        <span
                            class="badge rounded-pill badge-notification bg-danger">{{ auth('web')->user()->unreadNotifications->count() }}</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="width:400px">
                        <!-- Dropdown header -->
                        <div class="px-3 py-3">
                            <h6 class="text-sm text-muted m-0">You have <strong
                                    class="text-primary">{{ auth('web')->user()->unreadNotifications->count() }}</strong>
                                notifications.</h6>
                        </div>
                        <!-- List group -->
                        <div class="list-group list-group-flush" id="notification-list">
                            @foreach (auth()->user()->unreadNotifications as $notification)
                                <div href="{{ route('patientdiabetesreport.index') }}"
                                    class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            @if (auth('web')->user()->image)
                                                <img alt="Image placeholder" width="60px" height="60px"
                                                    src="{{ URL('Dashboard/img/profile/users/' . auth('web')->user()->image->filename) }}"
                                                    class="avatar rounded-circle">
                                            @else
                                                <img alt="Image placeholder" width="60px" height="60px"
                                                    src="{{ URL('Dashboard/img/profile/users/default.png') }}"
                                                    class="avatar rounded-circle">
                                            @endif
                                        </div>
                                        @if ($notification->type == 'App\Notifications\AddpatientInvoices')
                                            <div class="col ml--2">
                                                <a href="showInvoices/{{$notification->data['id']}}" class="">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <h6 class="mb-0 text-sm">{{ $notification->data['user'] }}
                                                            </h6>
                                                        </div>
                                                        <div class="text-right text-muted">
                                                            <small>{{ $notification->created_at->diffForHumans() }}</small>
                                                        </div>
                                                    </div>
                                                    <p class="text-sm mb-0">{{ $notification->data['title'] }} invo</p>
                                                </a>
                                            </div>
                                        @else
                                            <div class="col ml--2">
                                                <a href="{{ route('patientdiabetesreport.index') }}" class="">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <h6 class="mb-0 text-sm">{{ $notification->data['user'] }}
                                                            </h6>
                                                        </div>
                                                        <div class="text-right text-muted">
                                                            <small>{{ $notification->created_at->diffForHumans() }}</small>
                                                        </div>
                                                    </div>
                                                    <p class="text-sm mb-0">{{ $notification->data['title'] }}</p>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- View all -->
                        <a href="MarkAsRead_all"
                            class="dropdown-item text-center text-primary font-weight-bold py-3">View
                            all</a>
                    </div>
                </div>
                <!-- Avatar -->
                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                        id="modalAvatarActive" role="button" aria-expanded="false">
                        @if (auth('web')->check())
                            @if (auth('web')->user()->image)
                                <img src="{{ URL('Dashboard/img/profile/users/' . auth('web')->user()->image->filename) }}"
                                    class="rounded-circle" height="30" width="30px"
                                    alt="Black and White Portrait of a Man" loading="lazy" />
                            @else
                                <img src="{{ URL('Dashboard/img/profile/users/default.png') }}"
                                    class="rounded-circle" height="30" alt="Black and White Portrait of a Man"
                                    loading="lazy" />
                            @endif
                        @endif

                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" href="./profile/profile.html">My profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li>
                            @if (auth('web')->check())
                                <form method="POST" action="{{ route('logout.user') }}">
                                @elseif(auth('admin')->check())
                                    <form method="POST" action="{{ route('logout.admin') }}">
                                    @elseif(auth('doctor')->check())
                                        <form method="POST" action="{{ route('logout.doctor') }}">
                                        @elseif(auth('ray_employee')->check())
                                            <form method="POST" action="{{ route('logout.ray_employee') }}">
                                            @elseif(auth('laboratorie_employee')->check())
                                                <form method="POST"
                                                    action="{{ route('logout.laboratorie_employee') }}">
                                                @else
                                                    <form method="POST" action="{{ route('logout.patient') }}">
                            @endif
                            @csrf
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault();
                        this.closest('form').submit();"><i
                                    class="bx bx-log-out"></i>Logout</a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>

<!-- Modal Profile-->
<div class="modal fade" id="exampleModalProfile" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Profile Information</h6>
                <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    @if (auth('web')->user()->image)
                        <img src="{{ URL('Dashboard/img/profile/users/' . auth('web')->user()->image->filename) }}"
                            class="rounded-circle" width="120px" height="120px" alt="">
                    @else
                        <img src="{{ URL('Dashboard/img/profile/users/default.png') }}" class="rounded-circle"
                            width="120px" height="120px" alt="">
                    @endif
                    <div class="text-center my-3">
                        <!-- edit button -->
                        <a id="btnEdit" class="btn btn-secondary m-2"
                            href="{{ route('user.show', auth('web')->user()->id) }}">Edit</a>
                        <!-- confirm button -->
                        {{-- <a id="btnEdit" class="btn btn-secondary m-2"
                            href="{{ route('password.confirm') }}">Confirm</a> --}}
                        <!-- logout button -->
                        <button class="btn btn-primary m-2">
                            @if (auth('web')->check())
                                <form method="POST" action="{{ route('logout.user') }}">
                                @elseif(auth('admin')->check())
                                    <form method="POST" action="{{ route('logout.admin') }}">
                                    @elseif(auth('doctor')->check())
                                        <form method="POST" action="{{ route('logout.doctor') }}">
                                        @elseif(auth('ray_employee')->check())
                                            <form method="POST" action="{{ route('logout.ray_employee') }}">
                                            @elseif(auth('laboratorie_employee')->check())
                                                <form method="POST"
                                                    action="{{ route('logout.laboratorie_employee') }}">
                                                @else
                                                    <form method="POST" action="{{ route('logout.patient') }}">
                            @endif
                            @csrf
                            <a class="nav-link" href="#"
                                onclick="event.preventDefault();
                    this.closest('form').submit();"><i
                                    class="bx bx-log-out"></i>Logout</a>
                            </form>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#modalAvatarActive').click(function() {
            $("#exampleModalProfile").modal('show');
        })
    });
</script>

<ul id="notification-list"></ul>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- <script>
    $(document).ready(function() {
        function fetchNotifications() {
            $.ajax({
                url: '{{ route('notifications.index') }}',
                type: 'GET',
                success: function(response) {

                },
                error: function(xhr, status, error) {
                    console.error('Error fetching notifications:', error);
                }
            });
        }

        // Fetch notifications initially
        fetchNotifications();

        // Fetch notifications every 10 seconds
        setInterval(fetchNotifications, 20000);
    });
</script> --}}
