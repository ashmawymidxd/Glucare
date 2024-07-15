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
                <a href="{{ route('dashboard.employee') }}">
                    <i class="fa-solid fa-home"></i>
                    <span class="link_name">Dashboard</span>
                </a>
            </div>
        </div>
    </li>
    <li class="">
        <div class="iocn-link">
            <a role="button">
                <i class="fa-solid fa-file-invoice-dollar"></i>
                <span class="link_name">Invoices</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            {{-- <li><a class="link_name" href="#">Services</a></li> --}}
            <li><a href="{{ route('invoices_livewire') }}">invoices manage</a></li>
        </ul>
    </li>
    <li class="">
        <div class="iocn-link">
            <a role="button">
                <i class="fa-solid fa-file"></i>
                <span class="link_name">Logging</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a href="{{ route('patient_logs.index') }}">patients logs</a></li>
        </ul>
    </li>
    <li class="">
        <div class="iocn-link">
            <a role="button">
                <i class="fa-solid fa-chart-line"></i>
                <span class="link_name">Reports</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            {{-- <li><a class="link_name" href="#">Services</a></li> --}}
            <li><a href="{{ route('patients_reports') }}">patients</a></li>
            <li><a href="{{ route('doctors_reports') }}">doctors</a></li>
        </ul>
    </li>
    <li class="">
        <div class="iocn-link">
            <a role="button">
                <i class="fa fa-seedling"></i>
                <span class="link_name">Dietary</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a href="{{ route('createDietary') }}">Add Dieatry Food</a></li>
        </ul>
    </li>
    <li class="">
        <div class="iocn-link">
            <a role="button">
                <i class="fa-solid fa-dumbbell"></i>
                <span class="link_name">Activity</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a href="{{ route('createActivity') }}">Add Activity</a></li>
        </ul>
    </li>
</ul>
