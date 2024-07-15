<div class="header p-2">
    @if ($settings->image)
        <img src="{{ url('Dashboard/img/logo/' . $settings->image->filename) }}" alt="" />
    @else
        <img src="{{ url('Dashboard/img/logo/main_logo.png') }}" alt="" />
    @endif
    <h3>{{ $settings->website_name }}</h3>
    <i role="button" id="toggle" class="fa-solid fa-bars"></i>
</div>
<ul class="nav-links">
    <li>
        <div class="div">
            <div class="div">
                <a href="{{ route('dashboard.doctor') }}">
                    <i class="fa-solid fa-home"></i>
                    <span class="link_name">Home</span>
                </a>
            </div>
        </div>
    </li>
    <li>
        <div class="iocn-link">
            <a role="button">
                <i class="fa-solid fa-file-lines"></i>
                <span class="link_name">Report</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a href="{{route('getAppointmentReport')}}">appointment report</a></li>
        </ul>
    </li>
    <li>
        <div class="iocn-link">
            <a role="button">
                <i class="fa-solid fa-hospital-user"></i>
                <span class="link_name">Patient</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a href="{{route('DoctorPatient')}}">all patients</a></li>
            <li><a href="{{route('ratings')}}">patient rating</a></li>
        </ul>
    </li>
    <li>
        <div class="iocn-link">
            <a role="button">
                <i class="fa-solid fa-calendar-check"></i>
                <span class="link_name">Appointment</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a href="{{ route('appointments.index') }}">all appointments</a></li>
            <li><a href="{{ route('un_confirmed_appointments') }}">un confirmed</a></li>
            <li><a href="{{ route('confirmed_appointments') }}">confirmed</a></li>
            <li><a href="{{ route('completed_appointments') }}">completed </a></li>
            <li><a href="{{ route('archived_appointments') }}">archived</a></li>
        </ul>
    </li>

</ul>
