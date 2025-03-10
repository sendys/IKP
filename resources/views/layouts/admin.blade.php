<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>Maccleaning</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('admin/images/favicon.ico') }}">

        <link href="{{ asset('admin/libs/spinkit/spinkit.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('admin/libs/custombox/custombox.min.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('admin/libs/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin/libs/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/libs/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css" />

        {{-- Datepicker --}}
        <link href="{{ asset('admin/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/libs/clockpicker/bootstrap-clockpicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/libs/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- C3 Chart css -->
        <link href="{{ asset('admin/libs/c3/c3.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive Table css -->
        <link href="{{ asset('admin/libs/rwd-table/rwd-table.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/css/app.min.css') }}" rel="stylesheet" type="text/css"  id="app-stylesheet" />

        @livewireStyles
    </head>

    <body class="enlarged" data-keep-enlarged="true">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            @include('layouts.header')
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">


                <div class="content">
                    <div class="container-fluid">
                        @yield('content')

                    </div>
                </div> <!-- end content -->

                <!-- Footer Start -->
                @include('layouts.footer')
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->

        <!-- Vendor js -->
        <script src="{{ asset('admin/js/vendor.min.js') }}"></script>

        <script src="{{ asset('admin/libs/switchery/switchery.min.js') }}"></script>
        <script src="{{ asset('admin/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('admin/libs/select2/select2.min.js') }}"></script>
        {{-- <script src="{{ asset('admin/libs/jquery-mockjax/jquery.mockjax.min.js') }}"></script> --}}
        <script src="{{ asset('admin/libs/custombox/custombox.min.js') }}"></script>
        <script src="{{ asset('admin/libs/autocomplete/jquery.autocomplete.min.js') }}"></script>
        <script src="{{ asset('admin/libs/bootstrap-select/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('admin/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
        <script src="{{ asset('admin/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
        <script src="{{ asset('admin/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js') }}"></script>

        {{-- Datepicker --}}
        <script src="{{ asset('admin/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('admin/libs/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
        <script src="{{ asset('admin/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ asset('admin/libs/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('admin/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

        <!-- Responsive Table js -->
        <script src="{{ asset('admin/libs/rwd-table/rwd-table.min.js') }}"></script>

        <!--C3 Chart-->
        <script src="{{ asset('admin/libs/d3/d3.min.js') }}"></script>
        <script src="{{ asset('admin/libs/c3/c3.min.js') }}"></script>
        <script src="{{ asset('admin/libs/echarts/echarts.min.js') }}"></script>

        {{-- Init Js --}}
        <script src="{{ asset('admin/js/pages/dashboard.init.js') }}"></script>
        <script src="{{ asset('admin/js/pages/responsive-table.init.js') }}"></script>
        <script src="{{ asset('admin/js/pages/form-advanced.init.js') }}"></script>
        <script src="{{ asset('admin/js/pages/form-pickers.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('admin/js/app.min.js') }}"></script>

        @livewireScripts
    </body>
</html>
