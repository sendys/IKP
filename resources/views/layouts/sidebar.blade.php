<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{url('index')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="" height="20">
            </span>
        </a>

        <a href="{{url('index')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('/assets/images/logo-light.png') }}" alt="" height="20">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{url('index')}}">
                        <i class="uil-home-alt"></i><span class="badge rounded-pill bg-primary float-end">01</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-window-section"></i>
                        <span>Layouts</span>
                    </a>
                    {{-- <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">@lang('translation.Vertical')</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-dark-sidebar">@lang('translation.Dark_Sidebar')</a></li>
                                <li><a href="layouts-compact-sidebar">@lang('translation.Compact_Sidebar')</a></li>
                                <li><a href="layouts-icon-sidebar">@lang('translation.Icon_Sidebar')</a></li>
                                <li><a href="layouts-boxed">@lang('translation.Boxed_Width')</a></li>
                                <li><a href="layouts-preloader">@lang('translation.Preloader')</a></li>
                                <li><a href="layouts-colored-sidebar">@lang('translation.Colored_Sidebar')</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">@lang('translation.Horizontal')</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-horizontal">@lang('translation.Horizontal')</a></li>
                                <li><a href="layouts-hori-topbar-dark">@lang('translation.Dark_Topbar')</a></li>
                                <li><a href="layouts-hori-boxed-width">@lang('translation.Boxed_Width')</a></li>
                                <li><a href="layouts-hori-preloader">@lang('translation.Preloader')</a></li>
                            </ul>
                        </li>
                    </ul> --}}
                </li>

                <li class="menu-title">Pages</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-user-circle"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        <li><a href="auth-recoverpw">Recover_Password</a></li>
                        <li><a href="auth-lock-screen">Lock_Screen</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
