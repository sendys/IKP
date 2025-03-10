@extends('layouts.admin')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="m-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Adminox</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">

        <div class="col-xl-3 col-sm-6">
            <div class="card-box widget-box-two widget-two-custom">
                <div class="media">
                    <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                        <i class="text-white mdi mdi-account-multiple avatar-title font-30"></i>
                    </div>

                    <div class="wigdet-two-content media-body">
                        <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Sangat Puas</p>
                        <h3 class="my-2 font-weight-medium"><span data-plugin="counterup">{{ $totsangatpuas }}</span></h3>
                        <p class="m-0">Response Count</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-sm-6">
            <div class="card-box widget-box-two widget-two-custom ">
                <div class="media">
                    <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                        <i class="text-white mdi mdi-account-multiple avatar-title font-30"></i>
                    </div>

                    <div class="wigdet-two-content media-body">
                        <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Puas</p>
                        <h3 class="my-2 font-weight-medium"> <span data-plugin="counterup">{{ $totpuas }}</span></h3>
                        <p class="m-0">Response Count</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-sm-6">
            <div class="card-box widget-box-two widget-two-custom ">
                <div class="media">
                    <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                        <i class="text-white mdi mdi-account-multiple avatar-title font-30"></i>
                    </div>

                    <div class="wigdet-two-content media-body">
                        <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Tidak Puas</p>
                        <h3 class="my-2 font-weight-medium"><span data-plugin="counterup">{{ $tottidakpuas }}</span></h3>
                        <p class="m-0">Response Count</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-sm-6">
            <div class="card-box widget-box-two widget-two-custom ">
                <div class="media">
                    <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                        <i class="text-white mdi mdi-auto-fix avatar-title font-30"></i>
                    </div>

                    <div class="wigdet-two-content media-body">
                        <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total Rate</p>
                        <h3 class="my-2 font-weight-medium"><span data-plugin="counterup">{{ $tot }}</span></h3>
                        <p class="m-0">Response Total</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-xl-6 col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Recent Candidates</h4>
                <p class="sub-header">
                    Your awesome text goes here.
                </p>
                <form method="GET" id="filterForm">
                    <div class="row g-2">
                        <div class="col-3 col-md-3">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-sm" name="start_date" id="start_date"
                                    value="{{ $startDate->format('Y-m-d') }}"
                                    data-date-format="yyyy-mm-dd" data-provide="datepicker"
                                    data-date-autoclose="true">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="col-3 col-md-3">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-sm" name="end_date" id="end_date"
                                    value="{{ $endDate->format('Y-m-d') }}"
                                    data-date-format="yyyy-mm-dd" data-provide="datepicker"
                                    data-date-autoclose="true">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="col-3 col-md-3">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-sm" id="search" name="search"
                                    value="{{ $search }}" placeholder="Search...">
                            </div>
                        </div>
                        <div class="col-12 col-md-auto">
                            <button class="btn btn-icon waves-effect btn-primary btn-sm" id="filterButton"> <i class="fas fa-filter"></i> </button>
                            <button class="btn btn-icon waves-effect btn-danger btn-sm" id="clearButton"> <i class="fas fa-redo-alt"></i> </button>
                            <button type="button" class="btn btn-icon waves-effect btn-secondary btn-sm" onclick="generateExportLink()"> <i class="fas fa-file-excel"></i> </button>
                        </div>
                        {{-- <div class="col-12 col-md-auto d-flex gap-1">
                            <button class="btn btn-primary btn-sm " id="filterButton"><i class="ri-search-line me-1"></i></button>
                            <button class="btn btn-danger btn-sm " id="clearButton"><i class="ri-restart-line me-1"></i>Reset</button>
                            <button type="button" class="btn btn-warning btn-sm " onclick="generateExportLink()">
                                <i class="ri-file-excel-line me-1"></i>Export
                            </button>
                        </div> --}}

                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-hover m-0 table-actions-bar">

                        <thead style="background-color: #76cfbd;">
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

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- end col -->

        <div class="col-xl-3 col-lg-6">
            <div class="card-box">
                <h4 class="header-title mb-4">Total Unique Visitors</h4>

                <div class="widget-chart text-center" dir="ltr">

                    <div id="donut-chart" style="height: 280px;"></div>

                    <div class="row text-center mt-4">
                        <div class="col-6">
                            <h3 data-plugin="counterup">1,507</h3>
                            <p class="text-muted mb-0">Visitors Male</p>
                        </div>
                        <div class="col-6">
                            <h3 data-plugin="counterup">854</h3>
                            <p class="text-muted mb-1">Visitors Female</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-3 col-lg-6">
            <div class="card-box">
                <h4 class="header-title mb-4">Number of Transactions</h4>

                <div class="widget-chart text-center" dir="ltr">
                    <div id="chart-container" style="height: 280px;"></div>

                    <div class="row text-center mt-4">
                        <div class="col-6">
                            <h3 data-plugin="counterup">2,854</h3>
                            <p class="text-muted mb-0">Payment Done</p>
                        </div>
                        <div class="col-6">
                            <h3 data-plugin="counterup">22</h3>
                            <p class="text-muted mb-1">Payment Due</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--- end row -->
    <script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@5.5.1/dist/echarts.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
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

        document.addEventListener('DOMContentLoaded', function () {
        var chart = echarts.init(document.getElementById('chart-container'));

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
                    name: 'Transactions',
                    type: 'pie',
                    radius: '50%',
                    data: [
                        { value: 2854, name: 'Payment Done' },
                        { value: 22, name: 'Payment Due' }
                    ],
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }
            ]
        };

        chart.setOption(option);
    });

    </script>
@endsection
