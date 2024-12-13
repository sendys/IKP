@extends('layouts.admin')
@section('title')
   Create User
@endsection
@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Edit Password</h4>
            </div>
        </div>
    </div>
@endsection
@section('body')

<body data-sidebar="colored">
    @endsection
    @section('content')

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{ route('user.update-password', $user->id) }}">
                            @csrf
                            @method('PUT')

                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Username</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="validationCustom02" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="validationCustom04" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="new_password" name="new_password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                {{-- <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="validationCustom03" class="form-label">Role</label>
                                        <select class="form-select" id="role" name="role" value="{{ old('role') }}" aria-label="Default select example">
                                            <option selected>Pilih Role</option>
                                            <option value="admin">admin</option>
                                            <option value="user">user</option>
                                          </select>

                                    </div>
                                </div> --}}

                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary me-1">Simpan</button>
                                <!-- Back Button -->
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    @endsection
    @section('scripts')
        <script src="{{ URL::asset('build/libs/parsleyjs/parsley.min.js') }}"></script>

        <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
