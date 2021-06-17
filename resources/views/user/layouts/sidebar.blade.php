<!-- Left Sidebar Menu -->
<div class="fixed-sidebar-left user-side">
    <div class="mobile-only-brand pull-right mr-10">
        <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i id="before" data-icon="before" class="fa fa-arrow-left txt-light"></i></a>
    </div>
    <div class="logo-wrap">
        <a href="{{ route('home') }}">
            <img class="brand-img logo" src="{{ asset('dist/img/logo.png') }}" alt="brand"/>
            <span class="brand-text"></span>
        </a>
    </div>
    <ul class="nav navbar-nav side-nav nicescroll-bar user-side-bg user-nav toggle_nav_btn">
        <li class="user-li">
            <a href="#" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="zmdi zmdi-landscape user-side-icon mr-10"></i><span class="right-nav-text user-side-nav">Dashboard</span></div><div class="clearfix"></div></a>
        </li>
        <li class="user-li">
            <a href="#" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="fa fa-user user-side-icon mr-10"></i><span class="right-nav-text user-side-nav">Profile</span></div><div class="clearfix"></div></a>
        </li>
        <!-- <li><hr class="light-grey-hr mb-10"/></li> -->
        <li class="user-li">
            <a href="#" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="fa fa-bell user-side-icon mr-10"></i><span class="right-nav-text user-side-nav">Notifications</span></div><div class="clearfix"></div></a>
        </li>
        <!-- <li><hr class="light-grey-hr mb-10"/></li> -->
        <li class="user-li">
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="fa  fa-money user-side-icon mr-10"></i><span class="right-nav-text user-side-nav">Transactions</span></div><div class="pull-right user-drop-icon"><i class="zmdi zmdi-caret-down user-side-icon"></i></div><div class="clearfix"></div></a>
            <ul id="ecom_dr" class="collapse collapse-level-1">
                <li>
                    <a class="user-sub-nav" href="#">Sub Menu 1</a>
                </li>
                <li>
                    <a class="user-sub-nav" href="#">Sub Menu 2</a>
                </li>
                <li>
                    <a class="user-sub-nav" href="#">Sub Menu 3</a>
                </li>
                <li>
                    <a class="user-sub-nav" href="#">Sub Menu 4</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="user-img-menu">
        <li class="dropdown auth-drp open-dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle pr-0" data-toggle="dropdown" aria-extended="true"><img src="{{ asset('dist/img/user2.png') }}" alt="user_auth" class="user-menu-img img-circle"/>
                <span class="user-online-status"></span>
                <span class="use-img-name right-nav-text user-side-nav" >Ars</span>
            </a>
            <ul class="dropdown-menu user-auth-dropdown user-img-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                <li>
                    <a class="txt-light"><i class="zmdi zmdi-account txt-light"></i><span><?php echo Auth()->user()->name ?></span></a>
                </li>
                <li>
                    <a class="txt-light" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="zmdi zmdi-power txt-light"></i>
                        <span>Log Out</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </div>
</div>
<!-- /Left Sidebar Menu -->
<!-- script -->
<!-- @section('script')
<script type="text/javascript">
$(document).ready(function(){

    $('#toggle_nav_btn').click(function(){
       alert('test');
   });
});

</script>
@endsection -->
<!-- /script -->