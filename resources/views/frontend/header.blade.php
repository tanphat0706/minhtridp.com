<header class="navbar-fixed-top ng-scope">
    <div id="header">
        <div class="top-navbar hidden-xs">
            <div class="container">
                <div class="row ng-scope">
                    <div class="hidden-sm col-md-4 header-statement">
                        <strong>Chất lượng - Nhanh chóng - Giá rẻ</strong>
                    </div>
                    <div class="col-sm-8 col-md-8 nav-control-options">
                        <ul class="nav nav-pills">
                            <li>
                                <a href="{{route('tin-tuc')}}"><span>Tin tức</span></a>
                            </li>
                            <li>
                                <a href="{{route('lien-he')}}"><span>Liên hệ</span></a>
                            </li>
                            <li>
                                <a href="{{route('gioi-thieu')}}">Giới thiệu</a>
                            </li>
                            @if(\Auth::check())
                                <li class="dropdown toggle-with-hover">
                                    <a href="#" class="dropdown-toggle hover-dropdown" data-toggle="dropdown"
                                       aria-haspopup="true"
                                       aria-expanded="true">Hi, {{ \Auth::user()->name }} <span
                                                class="caret"></span></a>
                                    <ul id="top-dropdown" class="dropdown-menu hover-dropdown" style="top:95%">
                                        @if(\Auth::user()->group_id == 1)
                                            <li><a href="{{ url('admin') }}"><i
                                                            class="fa-dashboard fa"></i> {{ trans('system.admin_page') }}
                                                </a></li>
                                            @else
                                            <li><a href="{{route('my-page')}}">
                                                    <i class="fa-dashboard fa"></i> Trang cá nhân
                                                </a></li>
                                        @endif
                                        <li><a href="{{ url('admin/logout') }}"><i
                                                        class="fa-sign-out fa"></i> {{ trans('system.logout') }}</a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li>
                                    <a class="page-scroll" href="{{route('login')}}">Tài khoản</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle col-xs-2" data-toggle="collapse"
                            data-target="#MobileCollapse">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-navicon fa-2x fa-inverse"></i>
                    </button>

                    <a class="logo hidden-xs wt-identifier wti_iptitle" href="{{route('frontend')}}">
                        <img src="{{asset('images/LOGOFull.svg')}}" style="max-width:200px"></a>
                    <a class="navbar-brand visible-xs col-xs-10 wt-identifier wti_navbaricon"
                       href="#">
                        <img class="img-responsive" style="max-width:130px" src="{{asset('images/LOGOFull.svg')}}">
                    </a>
                </div>

                <div class="visible-sm col-sm-8 text-right pull-right number-container">
                    <strong class="need-help">Bạn cần hổ trợ ? Hãy liên hệ</strong>
                    <a class="phone-number" href="tel:0902 71 62 62">0902 71 62 62</a>
                </div>

                <div class="collapse navbar-collapse" id="NavbarCollapse">
                    <ul class="nav navbar-nav" ng-mouseleave="hideMenu()">
                        <li class="dropdown toggle-with-hover">
                            <a class="dropdown-toggle wt-identifier wti_productflyersdropdown" data-toggle="dropdown" data-target="#" href="javascript:void(0);">
                                <span>Thiết Kế</span> &nbsp;<i class="fa fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu row" role="menu">
                                <li class="col-md-12">
                                    <ul>
                                        <li>
                                            <a href="{{url('flyer-leaflet')}}">
                                                All Flyers<i class="fa fa-angle-right pull-right"></i>
                                            </a>
                                        </li>
                                        <li class="last-li">
                                            <a href="{{route('a4-flyer')}}" class="wt-identifier wti_productla3">
                                                Tờ rơi A4<i class="fa fa-angle-right pull-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown toggle-with-hover">
                            <a class="dropdown-toggle wt-identifier wti_productbcdropdown" data-toggle="dropdown"
                               data-target="#" href="javascript:void(0);">
                                <span>Sản Phẩm In</span> &nbsp;<i class="fa fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu row" role="menu">
                                <li class="col-md-12">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                Loyalty Cards<i class="fa fa-angle-right pull-right"></i>
                                            </a>
                                        </li>
                                        <li class="last-li">
                                            <a href="#">
                                                Free Design Templates <i class="fa fa-angle-right pull-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown toggle-with-hover">
                            <a class="dropdown-toggle wt-identifier wti_productpostersdropdown" data-toggle="dropdown" data-target="#" href="javascript:void(0);">
                                <span>Khuyến Mãi & CSKH</span> &nbsp;<i class="fa fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-last row" role="menu">
                                <li class="col-md-12">
                                    <ul>
                                        <li>
                                            <a href="#">A1 Posters <i class="fa fa-angle-right pull-right"></i></a>
                                        </li>
                                        <li class="last-li">
                                            <a href="#">A0 Posters <i class="fa fa-angle-right pull-right"></i></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <div class="hidden-xs hidden-sm col-md-3 col-lg-3 text-right pull-right number-container">
                        <strong class="need-help">Bạn cần hổ trợ ? Hãy liên hệ</strong>
                        <a class="phone-number" href="tel:0902 71 62 62">0902 71 62 62</a>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="MobileCollapse">
                    <div class="nav navbar-nav visible-xs">
                        <div class="row products-row">
                            <div class="col-xs-12">
                                <span><a href="#">Thiết Kế</a></span>
                            </div>
                            <div class="col-xs-12">
                                <span><a href="#">Sản Phẩm In</a></span>
                            </div>
                            <div class="col-xs-12">
                                <span><a href="#">Khuyến Mãi & CSKH</a></span>
                            </div>
                            <div class="col-xs-12">
                                <span><a href="{{route('tin-tuc')}}">Tin tức</a></span>
                            </div>
                            <div class="col-xs-12">
                                <span><a href="{{route('lien-he')}}">Liên hệ</a></span>
                            </div>
                            <div class="col-xs-12">
                                <span><a href="{{route('gioi-thieu')}}">Giới thiệu</a></span>
                            </div>
                        </div>
                        <div class="row">
                            @if(\Auth::check())
                                <div class="col-xs-12 btn-mobile-menu-container" style="padding-top:10px">
                                    <a href="{{ url('admin') }}"
                                       class="btn btn-primary btn-mobile-menu btn-sample-pack ">{{ trans('system.admin_page') }} </a>
                                </div>
                                <br>
                                <div class="col-xs-12 btn-mobile-menu-container" style="padding-bottom:0px">
                                    <a href="{{ url('admin/logout') }}"
                                       class="btn btn-default btn-mobile-menu btn-call">{{ trans('system.logout') }}</a>
                                </div>

                            @else
                                <div class="col-xs-12 btn-mobile-menu-container btn-login-container">
                                    <a href="#account" class="btn btn-default btn-mobile-menu btn-login wt-identifier wti_loginmobileurl">
                                        <img src="{{asset('images/key.png')}}">Đăng nhập tài khoản
                                    </a>
                                </div>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>

    </div>
</header>
