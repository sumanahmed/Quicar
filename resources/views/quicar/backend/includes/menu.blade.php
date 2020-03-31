<aside class="aside aside-fixed">
    <div class="aside-header">
        <a href="{{ route('backend.dashboard') }}" class="aside-logo"><img style="width:152px;height:48px" src="{{ asset('quicar/backend/img/Logo.png') }}" alt=""></a>
        <a href="" class="aside-menu-link">
            <i data-feather="menu"></i>
            <i data-feather="x"></i>
        </a>
    </div>
    <div class="aside-body" style="padding: 0px 16px;">
        <ul class="nav nav-aside">
            <li id="dashboard" class="nav-item"><a href="{{ route('backend.dashboard') }}" class="nav-link"><i data-feather="database"></i> <span>Dashboard</span></a></li>
            <li id="car_type" class="nav-item"><a href="{{ route('backend.car_types') }}" class="nav-link"><i data-feather="share-2"></i> <span>Car Types</span></a></li>
        </ul>
    </div>
</aside>
