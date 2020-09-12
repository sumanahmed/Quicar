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
            <li id="user" class="nav-item"><a href="{{ route('backend.user.index') }}" class="nav-link"><i data-feather="share-2"></i> <span>Users</span></a></li>
            <li id="owner" class="nav-item"><a href="{{ route('backend.owner.index') }}" class="nav-link"><i data-feather="share-2"></i> <span>Partners</span></a></li>
            <li id="car" class="nav-item"><a href="{{ route('backend.car.index') }}" class="nav-link"><i data-feather="share-2"></i> <span>Cars</span></a></li>
            <li id="car" class="nav-item"><a href="{{ route('backend.driver.index') }}" class="nav-link"><i data-feather="share-2"></i> <span>Drivers</span></a></li>
            
        </ul>
    </div>
</aside>
