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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tambah Data</a></li>
                        <li class="breadcrumb-item active">Pegawai</li>
                    </ol>
                </div>
                <h4 class="page-title">User Baru</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="col-12">
        <div class="card-box">

            {{-- <h4 class="mb-4 header-title">Horizontal form</h4> --}}
            <form id="userForm" class="form-horizontal" action="{{ route('users.store') }}" method="POST">
                @csrf
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
                    <label for="inputEmail3" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control @error('name') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-md-2 col-form-label">Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control @error('name') is-invalid @enderror" id="password" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Role</label>
                    <div class="col-md-6">
                        <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" data-toggle="select2">
                            <option value="">Pilih Role</option>
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                        </select>

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

{{-- <script >

    $(document).ready(function () {
    $('#userForm').on('submit', function (event) {
        event.preventDefault(); // Mencegah submit default

        //let formData = new FormData(this); // Gunakan FormData untuk menangani file

        $.ajax({
            url: '{{ route("users.store") }}', // Pastikan rute benar
            method: 'POST',
            data: $(this).serialize(),
            processData: false, // Jangan memproses data secara otomatis
            contentType: false, // Jangan atur tipe konten secara otomatis
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Tambahkan CSRF token
            },
            success: function (response) {
                if (response.success) {
                    Swal.fire('Success', response.message, 'success').then(() => {
                        window.location.href = '{{ route("pegawai.index") }}'; // Redirect ke halaman pegawai
                    });
                    $('#userForm')[0].reset(); // Reset form setelah berhasil
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    $.each(errors, function (key, value) {
                        errorMessages += value[0] + '<br>'; // Ambil semua pesan error
                    });
                    Swal.fire('Validation Error', errorMessages, 'warning');
                } else {
                    Swal.fire('Error', xhr.responseJSON.message || 'An error occurred. Please try again.', 'error');
                }
            }
        });
        });
    });

</script> --}}

@endsection
