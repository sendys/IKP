@extends('layouts.admin')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="m-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Index</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Pegawai</li>
                    </ol>
                </div>
                <h4 class="page-title">Data Pegawai</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-sm-4">
            <a href="{{ route('pegawai.create') }}" class="mb-3 btn btn-primary waves-effect waves-light"><i class="mr-1 fa fa-plus"></i> Tambah Pegawai Baru</a>
            {{-- <button type="button" class="mb-3 btn btn-blue waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="mr-1 fa fa-search"></i> Mapping Dokter</button> --}}
        </div><!-- end col -->

        <div class="col-sm-8">
            <div class="text-right">
                <ul class="float-right mt-0 pagination pagination-split">
                    <form id="filterForm" class="form-inline">
                        <div class="mr-1 form-group">
                            <label for="exampleInputEmail2" class="mr-2">search : </label>
                            <input type="text" class="form-control" id="search" name="search" value="{{ $search }}" placeholder="searching">
                        </div>

                        <div class="mb-0 text-right form-group">
                            <button class="mr-1 btn btn-primary waves-effect waves-light" type="submit">
                                <i class="fe-search"></i>
                            </button>
                        </div>
                    </form>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="table-rep-plugin">
                        <div class="col-sm-2 col-md-2">
                            <div class="dataTables_length d-flex align-items-center">
                                <label class="mb-0 mr-2">Show:</label>
                                <form action="{{ route('pegawai.index') }}" method="GET" id="filterForm">
                                    <select class="custom-select custom-select-sm form-control form-control-sm" name="perPage" id="perPage" onchange="this.form.submit()">
                                        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                                        <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                                        <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                                    </select>
                                </form>
                                <label class="mb-0 mr-2">&nbsp;entries</label>
                            </div>
                        </div>
                        <br>

                        @if($pegawai->isEmpty())
                            <div class="text-center alert alert-warning">
                                No data found.
                            </div>
                        @else
                        <div class="mb-0 table-responsive" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table m-0 table-hover table-actions-bar">
                                {{-- <pre>{{ var_dump($pegawai) }}</pre> --}}
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td ></td>
                                        <td >No. Identitas</td>
                                        <td >Nama Karyawan</td>
                                        <td >Tmp. Lahir</td>
                                        <td >Tgl. Lahir</td>
                                        <td >Jk</td>
                                        <td >Lokasi</td>
                                        <td >Alamat</td>

                                        <td >Aksi</td>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pegawai as $peg)
                                        <tr>
                                            <td>{{ ($pagination['current_page'] - 1) * $pagination['per_page'] + $loop->iteration }}</td> <!-- Auto-numbering -->
                                            <td>
                                                {{-- @if($pegawai->foto)
                                                    <img src="{{ asset($pegawai->foto) }}" alt="Foto Pegawai" width="100">
                                                @else
                                                    <span class="text-muted">Tidak ada foto</span>
                                                @endif
 --}}
                                                @if($peg->path)
                                                <img src="{{ asset($peg->path) }}" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                                @else
                                                <img src="{{ asset('admin/images/users/avatar-10.jpg') }}" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                                @endif
                                            </td>
                                            <td>{{$peg->ktp}}</td>
                                            {{-- <td>{{$peg->nama}}</td> --}}
                                            @if ($peg->user_id)
                                                <td><a href="{{ route('user.reset', $peg->id) }}" style="text-decoration: underline;">{{$peg->nama}}</a></td>
                                            @else
                                                <td>{{$peg->nama}}</td>
                                            @endif

                                            <td>{{$peg->tlahir}}</td>
                                            <td>{{$peg->tgllhr }}</td>
                                            <td>
                                                @if($peg->jk === 'L')
                                                    <span class="badge bg-danger">Laki-Laki</span>
                                                @else
                                                    <span class="badge bg-warning">Perempuan</span>
                                                @endif
                                            </td>
                                            <td>{{$peg->lokasi }}</td>
                                            <td>{{$peg->alamat }}</td>

                                            <td>
                                                {{-- <a href="{{ route('users.create', $peg->id) }}" class="table-action-btn" title="Tambah User"><i class="mdi mdi-plus"></i></a> --}}

                                                @php
                                                    $userExists = \App\Models\User::where('pegawai_id', $peg->id)->exists();
                                                @endphp

                                                <a href="{{ !$userExists ? route('users.create', $peg->id) : '#' }}"
                                                    class="table-action-btn {{ $userExists ? 'disabled' : '' }}"
                                                    title="Tambah User">
                                                     <i class="mdi mdi-plus"></i>
                                                </a>

                                                <!-- Edit button -->
                                                <a href="{{ route('pegawai.edit', $peg->id) }}" class="table-action-btn">
                                                    <i class="mdi mdi-pencil"></i></a>

                                                <!-- Delete button with confirmation -->
                                                <form id="delete-form-{{ $peg->id }}" action="{{ route('pegawai.delete', $peg->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('GET')
                                                    <a href="{{ route('pegawai.delete', $peg->id) }}" onclick="confirmDelete(event, '{{ route('pegawai.delete', $peg->id) }}')" class="table-action-btn">
                                                        <i class="mdi mdi-close"></i>
                                                    </a>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        @endif

                </div>

            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <!-- Previous Page Link -->
                    @if ($pagination['current_page'] > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ route('pegawai.index', array_merge(request()->except('page'), ['page' => $pagination['current_page'] - 1])) }}">
                                {{-- <span aria-hidden="true">&laquo;</span> --}}
                                Previous
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                    @endif

                    <!-- Page Numbers -->
                    @for ($i = 1; $i <= $pagination['last_page']; $i++)
                        <li class="page-item {{ $i == $pagination['current_page'] ? 'active' : '' }}">
                           {{--  <a class="page-link" href="{{ route('pasiens.index', array_merge(request()->except('page'), ['page' => $i])) }}">
                                {{ $i }}
                            </a> --}}
                        </li>
                    @endfor

                    <!-- Next Page Link -->
                    @if ($pagination['current_page'] < $pagination['last_page'])
                        <li class="page-item">
                            <a class="page-link" href="{{ route('pegawai.index', array_merge(request()->except('page'), ['page' => $pagination['current_page'] + 1])) }}">
                                {{-- <span aria-hidden="true">&raquo;</span> --}}
                                Next
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">Next</span>
                        </li>
                    @endif

                </ul>
            </nav>
        </div>
    </div>
    <!-- end row -->

    <script>
        $(document).ready(function () {
            // Search and Filter
            $('#search').on('input', function () {
                const searchVal = $(this).val().trim();
                if (searchVal === "") {
                    window.location.href = '{{ route("pegawai.index") }}';
                } else {
                    loadResults();
                }
            });

            $('#clearSearch').click(function () {
                $('#search').val('');
                window.location.href = '{{ route("pegawai.index") }}';
            });

            function loadResults() {
                // Tampilkan popup loading
                Swal.fire({
                    title: 'Memuat Data...',
                    text: 'Silakan tunggu',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading(); // Menampilkan indikator loading
                    }
                });

                $.ajax({
                    url: '{{ route("pegawai.index") }}',
                    method: 'GET',
                    data: $('#filterForm').serialize(),
                    success: function (response) {
                        Swal.close(); // Menutup popup setelah data diterima
                        $('#results').html(response.length > 0 ? '<p>Data ditemukan.</p>' : '<p>Data tidak ditemukan.</p>');
                    },
                    error: function (xhr) {
                        Swal.close(); // Menutup popup setelah terjadi error
                        $('#results').html(xhr.status === 404 ? '<p>Data tidak ditemukan.</p>' : '<p>Terjadi kesalahan</p>');

                        // Tampilkan pesan kesalahan di dalam popup
                        Swal.fire({
                            title: 'Error',
                            text: xhr.status === 404 ? 'Data tidak ditemukan.' : 'Terjadi kesalahan. Silakan coba lagi.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    </script>
    <script>
        function confirmDelete(event, url) {
                event.preventDefault(); // Mencegah tindakan default
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url; // Redirect ke URL penghapusan
                    }
                });
            }
    </script>
@endsection
