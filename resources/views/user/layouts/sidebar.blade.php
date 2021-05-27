<!-- Left Sidebar Menu -->
<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header">
            <span>Main</span> 
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a href="{{ route('home') }}" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="clearfix"></div></a>
        </li>
        <li><hr class="light-grey-hr mb-10"/></li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Subscription </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="app_dr" class="collapse collapse-level-1">
                <li>
                    <a href="{{ url('/user/subscriptions/recomanded') }}">Available Subscriptions</a>
                </li>

                <li>
                    <a href="#">My Subscriptions</a>
                </li>
            </ul>
        </li>
        <li><hr class="light-grey-hr mb-10"/></li>
    </ul>
</div>
<!-- /Left Sidebar Menu -->