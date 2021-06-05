<!-- Top Menu Items -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="mobile-only-brand pull-left">
        <div class="nav-header pull-left">
            <div class="logo-wrap">
                <a href="{{ route('home') }}">
                    <img class="brand-img" src="{{ asset('dist/img/logo.png') }}" alt="brand"/>
                    <span class="brand-text">Subscription</span>
                </a>
            </div>
        </div>
        <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
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
                <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="{{ asset('dist/img/user.png') }}" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
                <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                    <li>
                        <a><i class="zmdi zmdi-account"></i><span><?php echo Auth()->user()->name ?></span></a>
                    </li>
                    <li>
                        <a><i class="fa fa-money"></i><span>ZAR <?php echo Auth()->user()->balance ?></span></a>
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