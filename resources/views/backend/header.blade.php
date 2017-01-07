<!-- Main Header -->
<header class="main-header">
    <!-- Logo -->
    <a href="{{route('admin')}}" class="logo"> <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>MT</b>dp</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Admin Panel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas"
           role="button"> <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left"  id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{route('frontend')}}"> {{ trans('system.frontend') }}</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu"><a href="#"
                                                       class="dropdown-toggle" data-toggle="dropdown"> <i
                                class="fa fa-user"></i> <span class="hidden-xs">
                            {{ trans( 'system.hi' ) }} {{ Auth::user()->name }} </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="pull-left">
                                <a href="{{ route('profile') }}" class="btn btn-default btn-flat">{{ trans( 'system.profile' ) }}</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('admin/logout') }}" class="btn btn-default btn-flat">{{ trans('auth.logout') }}</a>
                            </div>
                        </li>
                    </ul></li>
            </ul>
        </div>
    </nav>
</header>