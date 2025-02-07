@extends('layouts.admin')

@section('title')
    Dashboard
@endsection
@section('css')
    <!-- jsvectormap css -->
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/spectrum-colorpicker2/spectrum.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Dashboard</h4>
        </div>
    </div>
</div>
@endsection
@section('body')

    <body data-sidebar="colored">
    @endsection
    @section('content')
        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <i class="ri-loader-line spin-icon"></i>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-md flex-shrink-0">
                                <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                    <i class="uim uim-briefcase"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-4">
                                <p class="text-muted text-truncate font-size-15 mb-2"> Sangat Puas</p>
                                <h3 class="fs-4 flex-grow-1 mb-3"> {{ $totsangatpuas }} <span class="text-muted font-size-16">Record</span>
                                </h3>
                                <p class="text-muted mb-0 text-truncate"><span
                                        class="badge bg-subtle-success text-success font-size-12 fw-normal me-1"><i
                                            class="mdi mdi-arrow-top-right"></i> 2.8% Increase</span> vs last month</p>
                            </div>
                            <div class="flex-shrink-0 align-self-start">
                                <div class="dropdown">
                                    <a class="dropdown-toggle btn-icon border rounded-circle" href="#"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-more-2-fill text-muted font-size-16"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Yearly</a>
                                        <a class="dropdown-item" href="#">Monthly</a>
                                        <a class="dropdown-item" href="#">Weekly</a>
                                        <a class="dropdown-item" href="#">Today</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-md flex-shrink-0">
                                <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                    <i class="uim uim-layer-group"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-4">
                                <p class="text-muted text-truncate font-size-15 mb-2"> Puas</p>
                                <h3 class="fs-4 flex-grow-1 mb-3">{{ $totpuas }} <span class="text-muted font-size-16">Record</span>
                                </h3>
                                <p class="text-muted mb-0 text-truncate"><span
                                        class="badge bg-subtle-danger text-danger font-size-12 fw-normal me-1"><i
                                            class="mdi mdi-arrow-bottom-left"></i> 7.8% Loss</span> vs last month</p>
                            </div>
                            <div class="flex-shrink-0 align-self-start">
                                <div class="dropdown">
                                    <a class="dropdown-toggle btn-icon border rounded-circle" href="#"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-more-2-fill text-muted font-size-16"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Yearly</a>
                                        <a class="dropdown-item" href="#">Monthly</a>
                                        <a class="dropdown-item" href="#">Weekly</a>
                                        <a class="dropdown-item" href="#">Today</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-md flex-shrink-0">
                                <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                    <i class="uim uim-scenery"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-4">
                                <p class="text-muted text-truncate font-size-15 mb-2"> Tidak Puas</p>
                                <h3 class="fs-4 flex-grow-1 mb-3">{{ $tottidakpuas }} <span class="text-muted font-size-16">Record</span>
                                </h3>
                                <p class="text-muted mb-0 text-truncate"><span
                                        class="badge bg-subtle-success text-success font-size-12 fw-normal me-1"><i
                                            class="mdi mdi-arrow-top-right"></i> 4.6% Growth</span> vs last month</p>
                            </div>
                            <div class="flex-shrink-0 align-self-start">
                                <div class="dropdown">
                                    <a class="dropdown-toggle btn-icon border rounded-circle" href="#"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-more-2-fill text-muted font-size-16"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Yearly</a>
                                        <a class="dropdown-item" href="#">Monthly</a>
                                        <a class="dropdown-item" href="#">Weekly</a>
                                        <a class="dropdown-item" href="#">Today</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-md flex-shrink-0">
                                <span class="avatar-title bg-subtle-primary text-primary rounded fs-2">
                                    <i class="uim uim-airplay"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-4">
                                <p class="text-muted text-truncate font-size-15 mb-2"> Total Rating</p>
                                <h3 class="fs-4 flex-grow-1 mb-3">{{ $tot }} <span
                                        class="text-muted font-size-16">Record</span></h3>
                                <p class="text-muted mb-0 text-truncate"><span
                                        class="badge bg-subtle-success text-success font-size-12 fw-normal me-1"><i
                                            class="mdi mdi-arrow-top-right"></i> 23% Increase</span> vs last month</p>
                            </div>
                            <div class="flex-shrink-0 align-self-start">
                                <div class="dropdown">
                                    <a class="dropdown-toggle btn-icon border rounded-circle" href="#"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-more-2-fill text-muted font-size-16"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Yearly</a>
                                        <a class="dropdown-item" href="#">Monthly</a>
                                        <a class="dropdown-item" href="#">Weekly</a>
                                        <a class="dropdown-item" href="#">Today</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END ROW -->

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header border-0 align-items-center d-flex pb-0">
                        <h4 class="card-title mb-0 flex-grow-1">Audiences Metrics</h4>
                        <div>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                ALL
                            </button>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                1M
                            </button>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                6M
                            </button>
                            <button type="button" class="btn btn-soft-primary btn-sm">
                                1Y
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-xl-6 audiences-border">
                               {{--  <div id="column-chart" class="apex-charts"></div> --}}
                               <div id="chart" class="apex-charts" style="width: 500px;height: 322px;"></div>

                            </div>
                           <div class="col-xl-4">
                               {{--  <div id="chart-container" style="width: 800px; height: 342px;"></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header border-0 align-items-center d-flex pb-0">
                        <h4 class="card-title mb-0 flex-grow-1">Source of Audiences</h4>
                        <div>
                            <div class="dropdown">
                                <a class="dropdown-toggle text-reset" href="#" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="fw-semibold">Sort By:</span>
                                    <span class="text-muted">Yearly<i
                                            class="mdi mdi-chevron-down ms-1"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Yearly</a>
                                    <a class="dropdown-item" href="#">Monthly</a>
                                    <a class="dropdown-item" href="#">Weekly</a>
                                    <a class="dropdown-item" href="#">Today</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        {{-- <div id="social-source" class="apex-charts"></div> --}}
                        <div id="chart-container" class="apex-charts" style="height: 300px;"></div>
                        <div class="social-content text-center">
                            <p class="text-uppercase mb-1">Total Rating</p>
                            <h3 class="mb-0">{{ $tot }}</h3>
                        </div>
                        <p class="text-muted text-center w-75 mx-auto mt-4 mb-0">Magnis dis parturient montes
                            nascetur ridiculus tincidunt lobortis.</p>
                        {{-- <div class="row gx-4 mt-1">
                            <div class="col-md-4">
                                <div class="mt-4">
                                    <div class="progress" style="height: 7px;">
                                        <div class="progress-bar bg-primary" role="progressbar"
                                            style="width: 85%" aria-valuenow="85" aria-valuemin="0"
                                            aria-valuemax="85">
                                        </div>
                                    </div>
                                    <p class="text-muted mt-2 pt-2 mb-0 text-uppercase font-size-13 text-truncate">
                                        E-Commerce
                                    </p>
                                    <h4 class="mt-1 mb-0 font-size-20">52,524</h4>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-4">
                                    <div class="progress" style="height: 7px;">
                                        <div class="progress-bar bg-success" role="progressbar"
                                            style="width: 70%" aria-valuenow="70" aria-valuemin="0"
                                            aria-valuemax="70">
                                        </div>
                                    </div>
                                    <p class="text-muted mt-2 pt-2 mb-0 text-uppercase font-size-13 text-truncate">
                                        Facebook
                                    </p>
                                    <h4 class="mt-1 mb-0 font-size-20">48,625</h4>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mt-4">
                                    <div class="progress" style="height: 7px;">
                                        <div class="progress-bar bg-warning" role="progressbar"
                                            style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                            aria-valuemax="60">
                                        </div>
                                    </div>
                                    <p class="text-muted mt-2 pt-2 mb-0 text-uppercase font-size-13 text-truncate">
                                        Instagram
                                    </p>
                                    <h4 class="mt-1 mb-0 font-size-20">85,745</h4>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- END ROW -->

       {{--  <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-0 align-items-center d-flex pb-0 flex-wrap">
                        <h4 class="card-title mb-0 flex-grow-1">Rating Transaction</h4>
                        <div>
                            <form method="GET" id="filterForm">
                                <div class="d-flex justify-content-between">
                                    <div class="input-group me-2">
                                        <input type="text" class="form-control" name="start_date" id="start_date" value="{{ $startDate->format('Y-m-d') }}"
                                            data-date-format="yyyy-m-dd" data-provide="datepicker" data-date-autoclose="true">
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div><!-- input-group -->
                                    <div class="input-group ms-2">
                                        <input type="text" class="form-control" name="end_date" id="end_date" value="{{ $endDate->format('Y-m-d') }}"
                                            data-date-format="yyyy-m-dd" data-provide="datepicker" data-date-autoclose="true">
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div><!-- input-group -->
                                    <div class="input-group ms-3">

                                        <input type="text" class="form-control" id="search" name="search" value="{{ $search }}"
                                        placeholder="Search...">
                                    </div>

                                    <button class="btn btn-primary ms-2" id="filterButton"><i class="ri-search-line align-bottom me-1"></i>Filter</button>
                                    <button class="btn btn-primary ms-1" id="clearButton"><i class="ri-restart-line align-bottom me-1"></i>Reset</button>
                                    <button type="button" class="btn btn-primary ms-1" onclick="generateExportLink()"><i class="ri-file-excel-line align-bottom me-1"></i>Export</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p>

                    <div class="card-body pt-2">
                        <div class="table-responsive">
                            <table id="data-table" class="table align-middle table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Periode</th>
                                        <th>Nama Karyawan</th>
                                        <th class="text-center">Sangat Puas</th>
                                        <th class="text-center">Puas</th>
                                        <th class="text-center">Tidak Puas</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $grandTotal = 0; @endphp
                                    @if($data->isEmpty())
                                        <tr>
                                            <td colspan="7" style="text-align: center;">No data found.</td>
                                        </tr>
                                    @else
                                        @php
                                            $no = 1;
                                        @endphp

                                        @foreach($data as $item)
                                            @php $grandTotal += $item->ctotal; @endphp
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('Y-m') }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td class="text-center">{{ $item->sangat_puas }} </td>
                                                <td class="text-center">{{ $item->puas }} </td>
                                                <td class="text-center">{{ $item->tidak_puas }} </td>
                                                <td class="text-center">{{ $item->ctotal }} </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" class="text-right"><strong>Total:</strong></td>
                                        <td class="text-center"><strong>{{ $grandTotal }}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-0 align-items-center d-flex pb-0 flex-wrap">
                        <h4 class="card-title mb-0 flex-grow-1">Rating Transaction</h4>
                        <div class="w-100 w-md-auto">
                            <br>
                            <form method="GET" id="filterForm">
                                <div class="row g-2">
                                    <div class="col-12 col-md-auto">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="start_date" id="start_date"
                                                value="{{ $startDate->format('Y-m-d') }}"
                                                data-date-format="yyyy-m-dd" data-provide="datepicker"
                                                data-date-autoclose="true">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-auto">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="end_date" id="end_date"
                                                value="{{ $endDate->format('Y-m-d') }}"
                                                data-date-format="yyyy-m-dd" data-provide="datepicker"
                                                data-date-autoclose="true">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-auto">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="search" name="search"
                                                value="{{ $search }}" placeholder="Search...">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-auto d-flex gap-1">
                                        <button class="btn btn-primary btn-sm waves-effect waves-light" id="filterButton"><i class="ri-search-line align-bottom me-1"></i>Filter</button>
                                        <button class="btn btn-primary btn-sm waves-effect waves-light" id="clearButton"><i class="ri-restart-line align-bottom me-1"></i>Reset</button>
                                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" onclick="generateExportLink()">
                                            <i class="ri-file-excel-line align-bottom me-1"></i>Export
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="card-body pt-2">
                        <div class="table-responsive">
                            <table id="data-table" class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Periode</th>
                                        <th>Nama Karyawan</th>
                                        <th class="text-center">Sangat Puas</th>
                                        <th class="text-center">Puas</th>
                                        <th class="text-center">Tidak Puas</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $grandTotal = 0; @endphp
                                    @if($data->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center">No data found.</td>
                                        </tr>
                                    @else
                                        @php $no = 1; @endphp
                                        @foreach($data as $item)
                                            @php $grandTotal += $item->ctotal; @endphp
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('Y-m') }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td class="text-center">{{ $item->sangat_puas }} </td>
                                                <td class="text-center">{{ $item->puas }} </td>
                                                <td class="text-center">{{ $item->tidak_puas }} </td>
                                                <td class="text-center">{{ $item->ctotal }} </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" class="text-right"><strong>Total:</strong></td>
                                        <td class="text-center"><strong>{{ $grandTotal }}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- END ROW -->
    @endsection
    @section('scripts')
        <!-- apexcharts -->
        <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
        <!-- Vector map-->
        <script src="{{ URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/jsvectormap/maps/world-merc.js') }}"></script>

        <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/form-advanced.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@5.5.1/dist/echarts.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>

            var chartDom = document.getElementById('chart');
            var myChart = echarts.init(chartDom);

            var option = {
                //title: { text: 'Penilaian Pelanggan' },
                tooltip: {},
                legend: { data: ['Sangat Puas', 'Puas', 'Tidak Puas'] },
                xAxis: {
                    type: 'category',
                    data: @json($chartData['categories'])
                },
                yAxis: { type: 'value' },
                series: [
                    {
                        name: 'Sangat Puas',
                        type: 'bar',
                        data: @json($chartData['sangat_puas'])
                    },
                    {
                        name: 'Puas',
                        type: 'bar',
                        data: @json($chartData['puas'])
                    },
                    {
                        name: 'Tidak Puas',
                        type: 'bar',
                        data: @json($chartData['tidak_puas'])
                    }
                ]
            };

            myChart.setOption(option);

            //
            $(document).ready(function () {

                $('#start_date, #end_date, #search').on('changeDate', function () {
                    fetchFilteredData();
                });

                function fetchFilteredData() {
                    // Serialize form data
                    let formData = $('#filterForm').serialize();

                    // Send AJAX request
                    $.ajax({
                        url: '/dashboard',
                        method: 'GET',
                        data: formData,
                        beforeSend: function () {
                            console.log('Loading data...');
                        },
                        success: function (response) {
                            // Update the content section
                            $('#content').html(response);
                        },
                        error: function (xhr) {
                            console.error('Error fetching data:', xhr.responseText);
                        }
                    });
                }

                document.getElementById('filterButton').addEventListener('click', function(event) {
                const startDate = new Date(document.getElementById('start_date').value);
                const endDate = new Date(document.getElementById('end_date').value);
                    if (startDate > endDate) {
                        event.preventDefault();
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid Tanggal',
                            text: 'Tanggal awal tidak boleh lebih besar dari tanggal akhir.',
                            confirmButtonText: 'OK'
                        });
                    }
                });

                const today = '{{ \Carbon\Carbon::now()->toDateString() }}';
                var urld = '{{ route('dashboard') }}';

                $('#clearButton').on('click', function() {
                    $('#start_date').val(today);
                    $('#end_date').val(today);
                    $('#search').val('');

                    window.location.href = urld;
                });

            });

            function generateExportLink() {
                var startDate = document.getElementById('start_date').value;
                var endDate = document.getElementById('end_date').value;

                if (startDate && endDate) {
                    var url = '{{ route('export_data') }}?start_date=' + startDate + '&end_date=' + endDate;
                    window.location.href = url;
                } else {
                    alert('Please select both start and end dates.');
                }
            }

            /* Grafik Pie */
            var data = @json($data);
            // Format Data untuk Grafik Pie
            var chartPie = [
                { value: data.reduce((sum, item) => sum + parseFloat(item.sangat_puas), 0), name: 'Sangat Puas' },
                { value: data.reduce((sum, item) => sum + parseFloat(item.puas), 0), name: 'Puas' },
                { value: data.reduce((sum, item) => sum + parseFloat(item.tidak_puas), 0), name: 'Tidak Puas' },
            ];

            document.addEventListener('DOMContentLoaded', function () {
                // Inisialisasi elemen
                var chartDom = document.getElementById('chart-container');
                var myChart = echarts.init(chartDom);

                var option = {
                    tooltip: {
                        trigger: 'item'
                    },
                    legend: {
                        top: '5%',
                        left: 'center'
                    },
                    series: [
                        {
                            name: 'Penilaian',
                            type: 'pie',
                            radius: ['40%', '70%'],
                            center: ['50%', '70%'],
                            startAngle: 180,
                            endAngle: 360,
                            data: chartPie
                        }
                    ]
                };

                myChart.setOption(option);

                // Responsif jika ukuran layar berubah
                window.addEventListener('resize', function () {
                    myChart.resize();
                });
            });

        </script>
    @endsection
