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
    <li class="">
        <div class="">
            <div class="iocn-link">
                <a href="{{ route('dashboard.admin') }}" class="iocn-link">
                    <i class="fa-solid fa-gauge"></i>
                    <span class="link_name">{{ trans('Dashboard/admin_sidebar.dashboard') }}</span>
                </a>
                <i class='bx bxs-chevron-down arrow' hidden></i>
            </div>
        </div>
    </li>
    <li class="">
        <div class="iocn-link">
            <a role="button" class="iocn-link">
                <i class="fa-solid fa-puzzle-piece"></i>
                <span class="link_name">{{ trans('Dashboard/admin_sidebar.sections') }}</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            {{-- <li><a class="link_name" href="#">Services</a></li> --}}
            <li><a href="{{ route('section.index') }}">{{ trans('Dashboard/admin_sidebar.all_sections') }}</a></li>
        </ul>
    </li>
    <li class="">
        <div class="iocn-link">
            <a role="button" class="iocn-link">
                <i class="fa-solid fa-user-doctor"></i>
                <span class="link_name">{{ trans('Dashboard/admin_sidebar.doctors') }}</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a href="{{ route('Doctors.index') }}">{{ trans('Dashboard/admin_sidebar.all_doctors') }}</a></li>
        </ul>
    </li>
    <li class="">
        <div class="iocn-link">
            <a role="button" class="iocn-link">
                <i class="fa-solid fa-user-tie"></i>
                <span class="link_name">{{ trans('Dashboard/admin_sidebar.employees') }}</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            {{-- <li><a class="link_name" href="#">Services</a></li> --}}
            <li><a href="{{ route('Employees.index') }}">
                {{ trans('Dashboard/admin_sidebar.employees') }}
            </a></li>
        </ul>
    </li>
    <li class="">
        <div class="iocn-link">
            <a role="button" class="iocn-link">
                <i class="fa-solid fa-hospital-user"></i>
                <span class="link_name">{{ trans('Dashboard/admin_sidebar.patients') }}</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">

            <li><a href="{{ route('Patients.index') }}">all Patients</a></li>
        </ul>
    </li>
    <li>
        <div class="iocn-link">
            <a role="button" class="iocn-link">
                <i class="fa-solid fa-file-lines"></i>
                <span class="link_name">{{ trans('Dashboard/admin_sidebar.reports') }}</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name" href="#">Report</a></li>
            <li><a href="{{ route('Reports.index') }}">data table reports</a></li>
        </ul>
    </li>
    <li>
        <div class="iocn-link">
            <a role="button" class="iocn-link">
                <i class="fa-solid fa-calendar-check"></i>
                <span class="link_name">{{ trans('Dashboard/admin_sidebar.appointments') }}</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a href="{{ route('appointments_admin.index') }}">all appointments</a></li>
            <li><a href="{{ route('un_confirmed_appointments_admin') }}">un confirmed</a></li>
            <li><a href="{{ route('confirmed_appointments_admin') }}">confirmed</a></li>
            <li><a href="{{ route('completed_appointments_admin') }}">completed </a></li>
            <li><a href="{{ route('archived_appointments_admin') }}">archived</a></li>
        </ul>
    </li>
    <li>
        <div class="">
            <div class="iocn-link">
                <a href="{{ route('setting.index') }}" class="iocn-link">
                    <i class="fa-solid fa-gear"></i>
                    <span class="link_name">{{ trans('Dashboard/admin_sidebar.settings') }}</span>
                </a>
                <i class='bx bxs-chevron-down arrow' hidden></i>
            </div>
        </div>
    </li>
</ul>
