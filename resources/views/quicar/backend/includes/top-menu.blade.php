<div class="content-header">
    <div class="content-search">
    </div>
    <nav class="nav" style="align-items: center;">
{{--        <div class="dropdown dropdown-message nav-link">--}}
{{--            <a href="#" class="dropdown-link new-indicator" data-toggle="dropdown">--}}
{{--                <i data-feather="message-square"></i>--}}
{{--                <span>5</span>--}}
{{--            </a>--}}
{{--            <div class="dropdown-menu dropdown-menu-right">--}}
{{--                <div class="dropdown-header">New Messages</div>--}}
{{--                <a href="#" class="dropdown-item">--}}
{{--                    <div class="media">--}}
{{--                        <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/350" class="rounded-circle" alt=""></div>--}}
{{--                        <div class="media-body mg-l-15">--}}
{{--                            <strong>Socrates Itumay</strong>--}}
{{--                            <p>nam libero tempore cum so...</p>--}}
{{--                            <span>Mar 15 12:32pm</span>--}}
{{--                        </div><!-- media-body -->--}}
{{--                    </div><!-- media -->--}}
{{--                </a>--}}
{{--                <div class="dropdown-footer"><a href="#">View all Messages</a></div>--}}
{{--            </div><!-- dropdown-menu -->--}}
{{--        </div>--}}
{{--        <div class="dropdown dropdown-notification nav-link">--}}
{{--            <a href="#" class="dropdown-link new-indicator" data-toggle="dropdown">--}}
{{--                <i data-feather="bell"></i>--}}
{{--                <span>2</span>--}}
{{--            </a>--}}
{{--            <div class="dropdown-menu dropdown-menu-right">--}}
{{--                <div class="dropdown-header">Notifications</div>--}}
{{--                <a href="#" class="dropdown-item">--}}
{{--                    <div class="media">--}}
{{--                        <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/350" class="rounded-circle" alt=""></div>--}}
{{--                        <div class="media-body mg-l-15">--}}
{{--                            <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>--}}
{{--                            <span>Mar 15 12:32pm</span>--}}
{{--                        </div><!-- media-body -->--}}
{{--                    </div><!-- media -->--}}
{{--                </a>--}}

{{--                <div class="dropdown-footer"><a href="#">View all Notifications</a></div>--}}
{{--            </div><!-- dropdown-menu -->--}}
{{--        </div>--}}
        <div class="dropdown dropdown-profile nav-link">
            <a href="#" class="dropdown-link" data-toggle="dropdown" data-display="static">
                <div class="avatar avatar-sm"><img src="{{ asset('quicar/backend/img/avatar.png') }}" class="rounded-circle" alt=""></div>&nbsp;
                <h6 class="tx-semibold mg-b-5 mt-4 ml-2" style="text-transform:capitalize">{{ Auth::guard('admin')->user()->name }}</br><p class="tx-color-03 tx-12"></p></h6>
            </a><!-- dropdown-link -->
            <div class="dropdown-menu dropdown-menu-right tx-13">
{{--                <a href="#" class="dropdown-item"><i data-feather="edit-3"></i> Edit Profile</a>--}}
                <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();"><i data-feather="log-out"></i>Sign Out</a>
                <form id="logoutForm" action="{{ route('backend.admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div><!-- dropdown-menu -->
        </div>
    </nav>
</div>
