<aside class="aside aside-fixed">
    <div class="aside-header">
        <a href="{{ route('backend.dashboard') }}" class="aside-logo"><img style="width:152px;height:48px" src="{{ asset('quicar/backend/img/logo.png') }}" alt=""></a>
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
            <li id="expired" class="nav-item"><a href="{{ route('backend.car.expired') }}" class="nav-link"><i data-feather="bell"></i> <span>Expired Car</span></a></li>
            <li id="driver" class="nav-item"><a href="{{ route('backend.driver.index') }}" class="nav-link"><i data-feather="share-2"></i> <span>Drivers</span></a></li>
            <li id="feedback" class="nav-item"><a href="{{ route('backend.feedback.index') }}" class="nav-link"><i data-feather="share-2"></i> <span>Feedbacks</span></a></li>                        
            <li class="nav-item with-sub packages menu-order-dropdown">
                <a href="#" class="nav-link">
                <i data-feather="truck"></i>
                    <span>Packages</span>
                </a>
                <ul>
                    <li id="car_package"><a href="{{ route('backend.car.package.index') }}">Car Package</a></li>
                    <li id="hotel_package"><a href="{{ route('backend.hotel.package.index') }}">Hotel Package</a></li>
                </ul>
            </li>
            <li class="nav-item with-sub menu-order-dropdown">
                <a href="#" class="nav-link">
                <i data-feather="truck"></i>
                    <span>Home</span>
                </a>
                <ul>
                    <li id="home_banner"><a href="{{ route('backend.home_banner.index') }}">Home Banner</a></li>
                    <li id="home_ofer"><a href="{{ route('backend.home_offer.index') }}">Home Offer</a></li>
                </ul>
            </li>
            <li class="nav-item with-sub menu-order-dropdown">
                <a href="#" class="nav-link">
                <i data-feather="truck"></i>
                    <span>Rides</span>
                </a>
                <ul>
                    <li id="current_ride"><a href="{{ route('backend.ride.current_ride') }}">Current Ride</a></li>
                    <li id="schedule_ride"><a href="{{ route('backend.ride.schedule_ride') }}">Schedule Ride</a></li>
                    <li id="ambulance_ride"><a href="{{ route('backend.ride.ambulance_ride') }}">Ambulance Ride</a></li>
                    <li id="pakcage_ride"><a href="{{ route('backend.ride.package_ride') }}">Package Ride</a></li>
                </ul>
            </li>
            <li id="sms_notification" class="nav-item"><a href="{{ route('backend.sms_notification.index') }}" class="nav-link"><i data-feather="bell"></i> <span>SMS & Notification</span></a></li>            
            <li class="nav-item with-sub account-sub">
                <a href="#" class="nav-link">
                <i data-feather="square"></i>
                    <span>Accounts</span>
                </a>
                <ul>
                    <li id="withdraw"><a href="{{ route('backend.account.withdraw') }}">Withdraw</a></li>
                    <li id="income"><a href="{{ route('backend.account.income') }}">Income</a></li>
                    <li id="user_account"><a href="{{ route('backend.account.user_account') }}">User Account</a></li>
                    <li id="owner_account"><a href="{{ route('backend.account.owner_account') }}">Partner Account</a></li>
                </ul>
            </li>
            <li class="nav-item settings with-sub">
                <a href="#" class="nav-link">
                <i data-feather="settings"></i>
                    <span>Settings</span>
                </a>
                <ul>
                    <li id="city"><a href="{{ route('backend.city.index') }}">City</a></li>
                    <li id="car_type"><a href="{{ route('backend.car_type.index') }}">Car Types</a></li>
                    <li id="brand"><a href="{{ route('backend.brand.index') }}">Brands</a></li>
                    <li id="model"><a href="{{ route('backend.model.index') }}">Model</a></li>
                    <!-- <li id="car_year"><a href="{{ route('backend.car.year.index') }}">Car Year</a></li> -->
                    <li id="year"><a href="{{ route('backend.year.index') }}">Year</a></li>
                    <li id="class"><a href="{{ route('backend.class.index') }}">Classes</a></li>
                    <!-- <li id="color"><a href="{{ route('backend.color.index') }}">Colors</a></li> -->
                    <li id="district"><a href="{{ route('backend.district.index') }}">Disctrict</a></li>
                    <li id="spot"><a href="{{ route('backend.spot.index') }}">Tour Spot</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
