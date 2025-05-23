<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fe-airplay"></i>
                        <span class="float-right badge badge-success badge-pill">2</span>
                        <span> Dashboard </span>
                    </a>
                   {{--  <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="index.html">Dashboard 1</a></li>
                        <li> <a href="dashboard-2.html">Dashboard 2</a></li>
                    </ul> --}}
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-sidebar"></i>
                        <span>  Data </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('pegawai.index') }}">Data Karyawan</a></li>
                        <li><a href="{{ route('label.edit', 1) }}">Pengaturan Label</a></li>

                        {{-- <li><a href="">Dokter</a></li>
                        <li><a href="layouts-small-sidebar.html">Small Sidebar</a></li>
                        <li><a href="layouts-boxed.html">Boxed</a></li> --}}
                    </ul>
                </li>

                {{-- <li>
                    <a href="javascript: void(0);">
                        <i class="fe-file-plus"></i>
                        <span> Pelayanan </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="">Rawat Jalan</a></li>
                        <li><a href="#">Pemeriksaan</a></li>
                        <li><a href="">Register Pasien Umum</a></li>
                        <li><a href="page-logout.html">Logout</a></li>
                        <li><a href="page-recoverpw.html">Recover Password</a></li>
                        <li><a href="page-lock-screen.html">Lock Screen</a></li>
                        <li><a href="page-confirm-mail.html">Confirm Mail</a></li>
                        <li><a href="page-404.html">Error 404</a></li>
                        <li><a href="page-404-alt.html">Error 404-alt</a></li>
                        <li><a href="page-500.html">Error 500</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-plus-square"></i>
                        <span> Extra Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="extras-about.html">About Us</a></li>
                        <li><a href="extras-contact.html">Contact</a></li>
                        <li><a href="extras-companies.html">Companies</a></li>
                        <li><a href="extras-members.html">Members</a></li>
                        <li><a href="extras-members-2.html">Members 2</a></li>
                        <li><a href="extras-timeline.html">Timeline</a></li>
                        <li><a href="extras-invoice.html">Invoice</a></li>
                        <li><a href="extras-maintenance.html">Maintenance</a></li>
                        <li><a href="extras-coming-soon.html">Coming Soon</a></li>
                        <li><a href="extras-faq.html">FAQ</a></li>
                        <li><a href="extras-pricing.html">Pricing</a></li>
                        <li><a href="extras-profile.html">Profile</a></li>
                        <li><a href="extras-email-template.html">Email Templates</a></li>
                        <li><a href="extras-search-result.html">Search Results</a></li>
                        <li><a href="extras-sitemap.html">Site Map</a></li>
                    </ul>
                </li>

                <li class="menu-title">Apps</li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-mail"></i>
                        <span> Vclaim </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="">Poliklinik</a></li>
                        <li><a href="">Dokter Layanan</a></li>
                        <li><a href="email-compose.html">Compose Email</a></li>
                    </ul>
                </li>

                <li>
                    <a href="calendar.html">
                        <i class="fe-calendar"></i>
                        <span> Calendar </span>
                    </a>
                </li>

                <li>
                    <a href="tickets.html">
                        <i class="fe-life-buoy"></i>
                        <span> Tickets </span>
                        <span class="float-right badge badge-danger badge-pill">New</span>
                    </a>
                </li>

                <li>
                    <a href="taskboard.html">
                        <i class="fe-file-text"></i>
                        <span> Task Board </span>
                    </a>
                </li>

                <li>
                    <a href="todo.html">
                        <i class="fe-layers"></i>
                        <span> Todo </span>
                    </a>
                </li>

                <li class="menu-title">Components</li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-target"></i>
                        <span> Admin UI </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="admin-grid.html">Grid</a></li>
                        <li><a href="admin-sweet-alert.html">Sweet Alert</a></li>
                        <li><a href="admin-tiles.html">Tiles Box</a></li>
                        <li><a href="admin-nestable.html">Nestable List</a></li>
                        <li><a href="admin-rangeslider.html">Range Slider</a></li>
                        <li><a href="admin-ratings.html">Ratings</a></li>
                        <li><a href="admin-filemanager.html">File Manager</a></li>
                        <li><a href="admin-lightbox.html">Lightbox</a></li>
                        <li><a href="admin-scrollbar.html">Scroll bar</a></li>
                        <li><a href="admin-slider.html">Slider</a></li>
                        <li><a href="admin-treeview.html">Treeview</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-briefcase"></i>
                        <span> UI Kit </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="ui-typography.html">Typography</a></li>
                        <li><a href="ui-cards.html">Cards</a></li>
                        <li><a href="ui-buttons.html">Buttons</a></li>
                        <li><a href="ui-modals.html">Modals</a></li>
                        <li><a href="ui-checkbox-radio.html">Checkboxs-Radios</a></li>
                        <li><a href="ui-spinners.html">Spinners</a></li>
                        <li><a href="ui-ribbons.html">Ribbons</a></li>
                        <li><a href="ui-portlets.html">Portlets</a></li>
                        <li><a href="ui-tabs.html">Tabs</a></li>
                        <li><a href="ui-progressbars.html">Progress Bars</a></li>
                        <li><a href="ui-notifications.html">Notification</a></li>
                        <li><a href="ui-carousel.html">Carousel</a></li>
                        <li><a href="ui-video.html">Video</a></li>
                        <li><a href="ui-tooltips-popovers.html">Tooltips &amp; Popovers</a></li>
                        <li><a href="ui-images.html">Images</a></li>
                        <li><a href="ui-bootstrap.html">Bootstrap UI</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-box"></i>
                        <span>  Icons </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="icons-colored.html">Colored Icons</a></li>
                        <li><a href="icons-materialdesign.html">Material Design</a></li>
                        <li><a href="icons-dripicons.html">Dripicons</a></li>
                        <li><a href="icons-fontawesome.html">Font awesome</a></li>
                        <li><a href="icons-feather.html">Feather Icons</a></li>
                        <li><a href="icons-simple-line.html">Simple line Icons</a></li>
                        <li><a href="icons-flags.html">Flag Icons</a></li>
                        <li><a href="icons-file.html">File Icons</a></li>
                        <li><a href="icons-pe7.html">PE7 Icons</a></li>
                        <li><a href="icons-typicons.html">Typicons</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-bar-chart-2"></i>
                        <span> Graphs </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="chart-flot.html">Flot Chart</a></li>
                        <li><a href="chart-morris.html">Morris Chart</a></li>
                        <li><a href="chart-google.html">Google Chart</a></li>
                        <li><a href="chart-echart.html">Echarts</a></li>
                        <li><a href="chart-chartist.html">Chartist Charts</a></li>
                        <li><a href="chart-chartjs.html">Chartjs Chart</a></li>
                        <li><a href="chart-c3.html">C3 Chart</a></li>
                        <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                        <li><a href="chart-knob.html">Jquery Knob</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-disc"></i>
                        <span class="float-right badge badge-warning badge-pill">12</span>
                        <span> Forms </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="form-elements.html">Form Elements</a></li>
                        <li><a href="form-advanced.html">Form Advanced</a></li>
                        <li><a href="form-layouts.html">Form Layouts</a></li>
                        <li><a href="form-validation.html">Form Validation</a></li>
                        <li><a href="form-pickers.html">Form Pickers</a></li>
                        <li><a href="form-wizard.html">Form Wizard</a></li>
                        <li><a href="form-mask.html">Form Masks</a></li>
                        <li><a href="form-summernote.html">Summernote</a></li>
                        <li><a href="form-quilljs.html">Quilljs Editor</a></li>
                        <li><a href="form-typeahead.html">Typeahead</a></li>
                        <li><a href="form-x-editable.html">X Editable</a></li>
                        <li><a href="form-uploads.html">Multiple File Upload</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-layout"></i>
                        <span> Tables </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="tables-basic.html">Basic Tables</a></li>
                        <li><a href="tables-layouts.html">Tables Layouts</a></li>
                        <li><a href="tables-datatable.html">Data Tables</a></li>
                        <li><a href="tables-foo-tables.html">Foo Tables</a></li>
                        <li><a href="tables-responsive.html">Responsive Table</a></li>
                        <li><a href="tables-tablesaw.html">Tablesaw Tables</a></li>
                        <li><a href="tables-editable.html">Editable Tables</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-map"></i>
                        <span> Maps </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="maps-google.html">Google Maps</a></li>
                        <li><a href="maps-vector.html">Vector Maps</a></li>
                        <li><a href="maps-mapael.html">Mapael Maps</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-folder-plus"></i>
                        <span> Multi Level </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav" aria-expanded="false">
                        <li>
                            <a href="javascript: void(0);">Level 1.1</a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" aria-expanded="false">Level 1.2
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-third-level nav" aria-expanded="false">
                                <li>
                                    <a href="javascript: void(0);">Level 2.1</a>
                                </li>
                                <li>
                                    <a href="javascript: void(0);">Level 2.2</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
