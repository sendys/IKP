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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Reset Password</a></li>
                        <li class="breadcrumb-item active">Pegawai</li>
                    </ol>
                </div>
                <h4 class="page-title">Reset Password</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="col-12">
        <div class="card-box">

            {{-- <h4 class="mb-4 header-title">Horizontal form</h4> --}}
            <form method="POST" action="{{ route('user.update-password', $pegawai->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="inputEmail3" class="col-md-2 col-form-label">Pegawai ID</label>
                    <div class="col-md-1">
                        <input type="text" class="form-control" id="pegawai_id" name="pegawai_id" value="{{ $pegawai->id }}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-md-2 col-form-label">Nama Lengkap</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $pegawai->nama }}" readonly>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-md-2 col-form-label">Reset Password</label>
                    <div class="col-md-6">
                        <input id="new_password" type="password" class="form-control @error('password') is-invalid @enderror" name="new_password" required autocomplete="new-password" placeholder="Reset Password">
                    </div>
                </div>

                <br>
                <div class="form-group row">
                    <div class="col-md-7 offset-md-2"> <!-- Use offset to align with input field -->
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
