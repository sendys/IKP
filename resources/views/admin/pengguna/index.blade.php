@extends('layouts.admin')
@section('title')
    Users List
@endsection
@section('page-title')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">User List</h4>
        </div>
    </div>
</div>
@endsection
@section('body')
<body data-sidebar="colored">
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-inline float-md-start mb-3">
                                    <form method="GET" action="{{ route('users.index') }}">
                                        <div class="d-flex align-items-center">
                                            <!-- Dropdown -->
                                            <div class="me-2">
                                                <select name="per_page" id="per_page" class="form-select" name="perPage" id="perPage" onchange="this.form.submit()">
                                                    <option value="10" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                                                    <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                                                    <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                                                    <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                                                </select>
                                            </div>

                                            <!-- Search Box -->
                                            <div class="search-box position-relative">
                                                <input type="text" class="form-control" name="search" value="{{ $search }}" placeholder="Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 float-end">
                                    <a href="{{ route('users.create') }}" class="btn btn-primary" >
                                        <i class="mdi mdi-plus me-1"></i> Add User
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        @if($users->isEmpty())
                            <div class="alert alert-warning text-center">
                                No data found.
                            </div>
                        @else
                        <div class="table-responsive mb-4">
                            <table class="table table-hover table-nowrap align-middle mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col" style="width: 50px;">
                                            <div class="form-check font-size-16">
                                                <input type="checkbox" class="form-check-input" id="contacusercheck">
                                                <label class="form-check-label" for="contacusercheck"></label>
                                            </div>
                                        </th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col" style="width: 200px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check font-size-16">
                                                    <input type="checkbox" class="form-check-input" id="contacusercheck5">
                                                    <label class="form-check-label" for="contacusercheck5"></label>
                                                </div>
                                            </th>
                                            <td>
                                                <div class="avatar-xs d-inline-block me-2">
                                                    <div class="avatar-title bg-primary rounded-circle">
                                                        <i class="mdi mdi-account-circle"></i>
                                                    </div>
                                                </div>
                                                <a href="{{ route('users.edit', $user->id) }}" class="text-body">{{$user->name}}</a>
                                            </td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->role }}</td>

                                            <td>

                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning btn-rounded">Edit</a>
                                                <a href="{{ route('users.reset', $user->id) }}" class="btn btn-sm btn-secondary btn-rounded">Reset password</a>

                                                <!-- Delete button with confirmation -->
                                                <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button onclick="confirmDelete({{ $user->id }})" class="btn btn-sm btn-danger btn-rounded">Delete</button>
                                                </form>

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif

                        <div class="row mt-4">
                            <div class="col-sm-6">
                                <div>
                                    <p class="mb-sm-0">Showing {{ $page }} - {{ $perPage }} dari {{ $total }} entries</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-sm-end">
                                    <ul class="pagination mb-sm-0">
                                        <!-- Previous Page Link -->
                                        @if ($pagination['current_page'] > 1)
                                            <li class="page-item">
                                                <a class="page-link" href="{{ route('users.index', array_merge(request()->except('page'), ['page' => $pagination['current_page'] - 1])) }}" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <span class="page-link">&laquo;</span>
                                            </li>
                                        @endif

                                        <!-- Page Numbers -->
                                        @for ($i = 1; $i <= $pagination['last_page']; $i++)
                                            <li class="page-item {{ $i == $pagination['current_page'] ? 'active' : '' }}">
                                                <a class="page-link" href="{{ route('users.index', array_merge(request()->except('page'), ['page' => $i])) }}">
                                                    {{ $i }}
                                                </a>
                                            </li>
                                        @endfor

                                        <!-- Next Page Link -->
                                        @if ($pagination['current_page'] < $pagination['last_page'])
                                            <li class="page-item">
                                                <a class="page-link" href="{{ route('users.index', array_merge(request()->except('page'), ['page' => $pagination['current_page'] + 1])) }}" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <span class="page-link">&raquo;</span>
                                            </li>
                                        @endif

                                        {{-- <li class="page-item disabled">
                                            <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item active">
                                            <a href="#" class="page-link">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="#" class="page-link">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="#" class="page-link">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <!-- Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- end modalheader -->
                    <div class="modal-body p-4">
                        <div>
                            <div class="mb-3">
                                <label for="addcontact-name-input" class="form-label">Name</label>
                                <input type="text" class="form-control" id="addcontact-name-input"
                                    placeholder="Enter Name">
                            </div>
                            <div class="mb-3">
                                <label for="addcontact-designation-input" class="form-label">Designation</label>
                                <input type="text" class="form-control" id="addcontact-designation-input"
                                    placeholder="Enter Designation">
                            </div>
                            <div class="mb-3">
                                <label for="addcontact-file-input" class="form-label">User Image</label>
                                <input type="file" class="form-control" id="addcontact-file-input">
                            </div>

                            <div class="mb-3">
                                <label for="addcontact-email-input" class="form-label">Email</label>
                                <input type="email" class="form-control" id="addcontact-email-input"
                                    placeholder="Enter Email">
                            </div>
                        </div>
                    </div>
                    <!-- end modalbody -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary w-sm">Add</button>
                    </div>
                    <!-- end modalfooter -->
                </div><!-- end content -->
            </div>
        </div>
        <!-- end modal -->
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
