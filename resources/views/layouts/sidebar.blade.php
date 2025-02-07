<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm-dark.png') }}" alt="logo-sm-dark" height="24">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="logo-dark" height="22">
            </span>
        </a>

        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm-light.png') }}" alt="logo-sm-light" height="24">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="logo-light" height="22">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn"
        id="vertical-menu-btn">
        <i class="ri-menu-2-line align-middle"></i>
    </button>

    <div data-simplebar class="vertical-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            {{-- <div class="dropdown mx-3 sidebar-user user-dropdown select-dropdown">
                <button type="button" class="btn btn-light w-100 waves-effect waves-light border-0"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avatar-xs rounded-circle flex-shrink-0">
                                <div
                                    class="avatar-title border bg-light text-primary rounded-circle text-uppercase user-sort-name">
                                    R</div>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-2 text-start">
                            <h6 class="mb-1 fw-medium user-name-text"> Reporting </h6>
                            <p class="font-size-13 text-muted user-name-sub-text mb-0"> Team Reporting </p>
                        </div>
                        <div class="flex-shrink-0 text-end">
                            <i class="mdi mdi-chevron-down font-size-16"></i>
                        </div>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end w-100">
                    <!-- item-->
                    <a class="dropdown-item d-flex align-items-center px-3" href="#">
                        <div class="flex-shrink-0 me-2">
                            <div class="avatar-xs rounded-circle flex-shrink-0">
                                <div class="avatar-title border rounded-circle text-uppercase dropdown-sort-name">C
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0 dropdown-name">CRM</h6>
                            <p class="text-muted font-size-13 mb-0 dropdown-sub-desc">Designer Team</p>
                        </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center px-3" href="#">
                        <div class="flex-shrink-0 me-2">
                            <div class="avatar-xs rounded-circle flex-shrink-0">
                                <div class="avatar-title border rounded-circle text-uppercase dropdown-sort-name">A
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0 dropdown-name">Application Design</h6>
                            <p class="text-muted font-size-13 mb-0 dropdown-sub-desc">Flutter Devs</p>
                        </div>
                    </a>

                    <a class="dropdown-item d-flex align-items-center px-3" href="#">
                        <div class="flex-shrink-0 me-2">
                            <div class="avatar-xs rounded-circle flex-shrink-0">
                                <div class="avatar-title border rounded-circle text-uppercase dropdown-sort-name">E
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0 dropdown-name">Ecommerce</h6>
                            <p class="text-muted font-size-13 mb-0 dropdown-sub-desc">Developer Team</p>
                        </div>
                    </a>

                    <a class="dropdown-item d-flex align-items-center px-3" href="#">
                        <div class="flex-shrink-0 me-2">
                            <div class="avatar-xs rounded-circle flex-shrink-0">
                                <div class="avatar-title border rounded-circle text-uppercase dropdown-sort-name">R
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0 dropdown-name">Reporting</h6>
                            <p class="text-muted font-size-13 mb-0 dropdown-sub-desc">Team Reporting</p>
                        </div>
                    </a>

                    <a class="btn btn-sm btn-link font-size-14 text-center w-100" href="javascript:void(0)">
                        View More..
                    </a>
                </div>
            </div> --}}

            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="uim uim-airplay"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uim uim-comment-message"></i>
                        <span>Apps</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Email</a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="email-inbox">Inbox</a></li>
                                <li><a href="email-read">Read Email</a></li>
                            </ul>
                        </li>

                        <li><a href="calendar">Calendar</a></li>

                        <li><a href="apps-chat">Chat</a></li>

                        <li><a href="apps-file-manager">File Manager</a></li>


                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Invoice</a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="invoices">Invoices</a></li>
                                <li><a href="invoice-detail">Invoice Detail</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Users</a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="users-list">Users List</a></li>
                                <li><a href="users-detail">Users Detail</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uim uim-window-grid"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Vertical</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-dark-sidebar">Dark Sidebar</a></li>
                                <li><a href="layouts-light-sidebar">Light Sidebar</a></li>
                                <li><a href="layouts-compact-sidebar">Compact Sidebar</a></li>
                                <li><a href="layouts-icon-sidebar">Icon Sidebar</a></li>
                                <li><a href="layouts-boxed">Boxed Layout</a></li>
                                <li><a href="layouts-preloader">Preloader</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-horizontal">Horizontal</a></li>
                                <li><a href="layouts-hori-light-header">Light Header</a></li>
                                <li><a href="layouts-hori-topbar-dark">Topbar Dark</a></li>
                                <li><a href="layouts-hori-boxed-width">Boxed width</a></li>
                                <li><a href="layouts-hori-preloader">Preloader</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="menu-title">Pages</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uim uim-sign-in-alt"></i>
                        <span>Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('label.edit', 1) }}">Setting Label</a></li>
                        <li><a href="{{ route('users.index') }}">User</a></li>
                       {{--  <li><a href="auth-recoverpw">Recover Password</a></li>
                        <li><a href="auth-lock-screen">Lock Screen</a></li> --}}
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uim uim-box"></i>
                        <span>Extra Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter">Starter Page</a></li>
                        <li><a href="pages-maintenance">Maintenance</a></li>
                        <li><a href="pages-comingsoon">Coming Soon</a></li>
                        <li><a href="pages-404">Error 404</a></li>
                        <li><a href="pages-500">Error 500</a></li>
                        <li><a href="pages-faq">(Help Center) FAQ</a></li>
                        <li><a href="pages-profile">Profile</a></li>
                        <li><a href="pages-pricing">Pricing</a></li>
                        <li><a href="pages-terms-conditions">Terms & Conditions</a></li>
                    </ul>
                </li>

               {{--  <li class="menu-title">Components</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uim uim-layer-group"></i>
                        <span>UI Elements</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts">Alerts</a></li>
                        <li><a href="ui-buttons">Buttons</a></li>
                        <li><a href="ui-cards">Cards</a></li>
                        <li><a href="ui-carousel">Carousel</a></li>
                        <li><a href="ui-dropdowns">Dropdowns</a></li>
                        <li><a href="ui-grid">Grid</a></li>
                        <li><a href="ui-images">Images</a></li>
                        <li><a href="ui-lightbox">Lightbox</a></li>
                        <li><a href="ui-modals">Modals</a></li>
                        <li><a href="ui-offcanvas">Offcavas</a></li>
                        <li><a href="ui-rangeslider">Range Slider</a></li>
                        <li><a href="ui-roundslider">Round Slider</a></li>
                        <li><a href="ui-session-timeout">Session Timeout</a></li>
                        <li><a href="ui-progressbars">Progress Bars</a></li>
                        <li><a href="ui-sweet-alert">Sweetalert 2</a></li>
                        <li><a href="ui-tabs-accordions">Tabs & Accordions</a></li>
                        <li><a href="ui-typography">Typography</a></li>
                        <li><a href="ui-video">Video</a></li>
                        <li><a href="ui-general">General</a></li>
                        <li><a href="ui-rating">Rating</a></li>
                        <li><a href="ui-notifications">Notifications</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="uim uim-document-layout-left"></i>
                        <span class="badge rounded-pill bg-danger float-end">6</span>
                        <span>Forms</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="form-elements">Basic Elements</a></li>
                        <li><a href="form-validation">Validation</a></li>
                        <li><a href="form-plugins">Plugins</a></li>
                        <li><a href="form-editors">Editors</a></li>
                        <li><a href="form-uploads">File Upload</a></li>
                        <li><a href="form-wizard">Wizard</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uim uim-table"></i>
                        <span>Tables</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tables-bootstrap">Bootstrap Tables</a></li>
                        <li><a href="tables-datatable">Data Tables</a></li>
                        <li><a href="tables-editable">Editable Table</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uim uim-chart-pie"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);" class="has-arrow">Apexcharts Part 1</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="charts-line">Line</a></li>
                                <li><a href="charts-area">Area</a></li>
                                <li><a href="charts-column">Column</a></li>
                                <li><a href="charts-bar">Bar</a></li>
                                <li><a href="charts-mixed">Mixed</a></li>
                                <li><a href="charts-timeline">Timeline</a></li>
                                <li><a href="charts-candlestick">Candlestick</a></li>
                                <li><a href="charts-boxplot">Boxplot</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript: void(0);" class="has-arrow">Apexcharts Part 2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="charts-bubble">Bubble</a></li>
                                <li><a href="charts-scatter">Scatter</a></li>
                                <li><a href="charts-heatmap">Heatmap</a></li>
                                <li><a href="charts-treemap">Treemap</a></li>
                                <li><a href="charts-pie">Pie</a></li>
                                <li><a href="charts-radialbar">Radialbar</a></li>
                                <li><a href="charts-radar">Radar</a></li>
                                <li><a href="charts-polararea">Polararea</a></li>
                            </ul>
                        </li>
                        <li><a href="charts-echart">E Charts</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uim uim-object-ungroup"></i>
                        <span>Icons</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="icons-remix">Remix Icons</a></li>
                        <li><a href="icons-materialdesign">Material Design</a></li>
                        <li><a href="icons-unicons">Unicons</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uim uim-comment-plus"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maps-google">Google Maps</a></li>
                        <li><a href="maps-vector">Vector Maps</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uim uim-layers-alt"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 2.1</a></li>
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}

            </ul>

        </div>
        <!-- Sidebar -->
    </div>

    <div class="dropdown px-3 sidebar-user sidebar-user-info">
        <button type="button" class="btn w-100 px-0 border-0" id="page-header-user-dropdown"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <img src="{{ URL::asset('build/images/users/avatar-3.jpg') }}"
                        class="img-fluid header-profile-user rounded-circle" alt="">
                </div>

                <div class="flex-grow-1 ms-2 text-start">
                    <span class="ms-1 fw-medium user-name-text">
                        {{ Auth()->user()->name }}
                    </span>
                </div>

                <div class="flex-shrink-0 text-end">
                    <i class="mdi mdi-dots-vertical font-size-16"></i>
                </div>
            </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <a class="dropdown-item" href="pages-profile"><i
                    class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span
                    class="align-middle">Profile</span></a>
            <a class="dropdown-item" href="apps-chat"><i
                    class="mdi mdi-message-text-outline text-muted font-size-16 align-middle me-1"></i> <span
                    class="align-middle">Messages</span></a>
            {{-- <a class="dropdown-item" href="pages-faq"><i
                    class="mdi mdi-lifebuoy text-muted font-size-16 align-middle me-1"></i> <span
                    class="align-middle">Help</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="pages-profile"><i
                    class="mdi mdi-wallet text-muted font-size-16 align-middle me-1"></i> <span
                    class="align-middle">Balance : <b>$5971.67</b></span></a> --}}
            <a class="dropdown-item" href="#"><span class="badge bg-primary mt-1 float-end">New</span><i
                    class="mdi mdi-cog-outline text-muted font-size-16 align-middle me-1"></i> <span
                    class="align-middle">Settings</span></a>
            <a class="dropdown-item" href="javascript:void();"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                    class="mdi mdi-lock text-muted font-size-16 align-middle me-1"></i> <span
                    class="align-middle">Logout</span></a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

</div>
<!-- Left Sidebar End -->
