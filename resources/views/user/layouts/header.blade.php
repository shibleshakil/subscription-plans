<!-- Top Menu Items -->
<nav class="navbar navbar-inverse navbar-fixed-top front-navbar">
    <div id="mobile_only_nav" class="mobile-only-nav pull-left">
        <ul class="nav navbar-right top-nav pull-right">
            <li>
                <a class="ml-10">Subscription</a>
            </li>
        </ul>
    </div>	
    <div id="mobile_only_nav" class="mobile-only-nav pull-right">
        <ul class="nav navbar-right top-nav pull-right">
            <li>
                <a href="{{ route('home') }}">Offered Plans</a>
            </li>
            <li>
                <a href="{{ route('user-subscriptions-list') }}">My Plan</a>
            </li>
            <li class="dropdown auth-drp">
                <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="{{ asset('dist/img/user1.png') }}" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
                <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                    <li>
                        <a href="#"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="zmdi zmdi-settings"></i><span>Settings</span></a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="zmdi zmdi-power"></i>
                            <span>Log Out</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>	
</nav>
<!-- /Top Menu Items -->