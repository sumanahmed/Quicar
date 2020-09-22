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
            <li id="car" class="nav-item"><a href="{{ route('backend.car.index') }}" class="nav-link"><i data-feather="truck"></i> <span>Cars</span></a></li>
            <li id="driver" class="nav-item"><a href="{{ route('backend.driver.index') }}" class="nav-link"><i data-feather="share-2"></i> <span>Drivers</span></a></li>
            <li id="feedback" class="nav-item"><a href="{{ route('backend.feedback.index') }}" class="nav-link"><i data-feather="share-2"></i> <span>Feedbacks</span></a></li>            
            <li class="nav-item with-sub">
                <a href="#" class="nav-link">
                <i data-feather="truck"></i>
                    <span>Rides</span>
                </a>
                <ul>
                    <li id="current_ride"><a href="">Current Ride</a></li>
                    <li id="package_order"><a href="">Package Order</a></li>
                    <li id="bid"><a href="">Bid</a></li>
                    <li id="ambulance_ride"><a href="">Ambulance Ride</a></li>
                </ul>
            </li>
            <li class="nav-item with-sub">
                <a href="#" class="nav-link">
                <i data-feather="square"></i>
                    <span>Accounts</span>
                </a>
                <ul>
                    <li id="income"><a href="{{ route('backend.income.index') }}">Income</a></li>
                </ul>
            </li>
            <li class="nav-item with-sub">
                <a href="#" class="nav-link">
                <i data-feather="settings"></i>
                    <span>Settings</span>
                </a>
                <ul>
                    <li id="brand"><a href="{{ route('backend.brand.index') }}">Brands</a></li>
                    <li id="model"><a href="{{ route('backend.model.index') }}">Model</a></li>
                    <li id="year"><a href="{{ route('backend.year.index') }}">Year</a></li>
                    <li id="class"><a href="{{ route('backend.class.index') }}">Classes</a></li>
                    <li id="color"><a href="{{ route('backend.color.index') }}">Colors</a></li>
                    <li id="district"><a href="{{ route('backend.district.index') }}">Disctrict</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
