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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Edit Data</a></li>
                        <li class="breadcrumb-item active">Pegawai</li>
                    </ol>
                </div>
                <h4 class="page-title">Pegawai Edit</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="col-12">
        <div class="card-box">

            {{-- <h4 class="mb-4 header-title">Horizontal form</h4> --}}

            <form id="pegawaiFormEdit" class="form-horizontal" enctype="multipart/form-data">
               @csrf
               @method('PUT')

                <div class="form-group row">
                    <label for="inputEmail3" class="col-md-2 col-form-label">No. Identitas (KTP)</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control @error('ktp') is-invalid @enderror" id="ktp" name="ktp" value="{{ old('ktp', $pegawai->ktp) }}" placeholder="No. Identitas (KTP)">
                        @error('ktp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword5" class="col-md-2 col-form-label">Nama Pegawai</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror " id="nama" name="nama" value="{{ old('nama', $pegawai->nama) }}" placeholder="nama pegawai">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword5" class="col-md-2 col-form-label">Tempat Lahir</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control @error('tlahir') is-invalid @enderror " id="tlahir" name="tlahir" value="{{ old('tlahir', $pegawai->tlahir) }}" placeholder="tempat lahir">
                        @error('tlahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgllhr" class="col-md-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-md-7">
                        <div class="input-group">
                            <input type="text" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgllhr" id="tgllhr"
                                value="{{ old('tgllhr', $pegawai->tgllhr) }}"
                                data-date-format="yyyy-mm-dd" data-provide="datepicker"
                                data-date-autoclose="true">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                            @error('tgllhr')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-md-7">
                        <select class="form-control @error('jk') is-invalid @enderror" id="jk" name="jk" data-toggle="select2">
                            <option value="">Pilih Kelamin</option>
                            <option value="L" {{ old('jk', $pegawai->jk) == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="P" {{ old('jk', $pegawai->jk) == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Lokasi Kerja</label>
                    <div class="col-md-7">
                        <select class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" data-toggle="select2">
                            <option value="">Pilih Lokasi Kerja</option>
                            <option value="Banda Aceh" {{ old('lokasi', $pegawai->lokasi) == 'Banda Aceh' ? 'selected' : '' }}>Banda Aceh</option>
                            <option value="Lhokseumawe" {{ old('lokasi', $pegawai->lokasi) == 'Lhokseumawe' ? 'selected' : '' }}>Lhokseumawe</option>
                        </select>
                        @error('lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword7" class="col-md-2 col-form-label">Telp/HP</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="telp" name="telp" value="{{ old('telp', $pegawai->telp)}}" placeholder="No. Telp/HP">

                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword5" class="col-md-2 col-form-label">Alamat</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $pegawai->alamat) }}" placeholder="Alamat">
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword6" class="col-md-2 col-form-label">Lokasi Photo</label>
                    <div class="col-md-7">
                        <input type="file" class="filestyle" id="path" name="path" data-btnClass="btn-primary" accept="image/*">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword6" class="col-md-2 col-form-label">Foto Saat Ini</label>
                    <div class="col-md-7">
                        <img src="{{ asset($pegawai->path) }}" alt="Foto Pegawai" style="max-width: 200px; max-height: 200px;">
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

<script>
    $(document).ready(function () {
    $('#pegawaiFormEdit').on('submit', function (event) {
        event.preventDefault(); // Prevent default form submission
        $('#loading').show();

        // Gunakan FormData agar bisa upload file
        let formData = new FormData(this);

        $.ajax({
            url: '{{ route('pegawai.update', $pegawai->id) }}', // Ensure this route is correct
            method: 'POST',
            data: formData, // Gunakan FormData
            processData: false, // Jangan proses data agar FormData berfungsi
            contentType: false, // Jangan set contentType agar FormData berfungsi
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token
            },
            success: function (response) {
                if (response.success) {
                    Swal.fire('Success', response.message, 'success').then(() => {
                        window.location.href = '{{ route("pegawai.index") }}'; // Redirect ke index
                    });
                }
                $('#loading').hide();
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    $.each(errors, function (key, value) {
                        errorMessages += value[0] + '<br>'; // Collect error messages
                    });
                    Swal.fire('Validation Error', errorMessages, 'warning');
                } else {
                    Swal.fire('Error', xhr.responseJSON.message || 'An error occurred. Please try again.', 'error');
                }
                $('#loading').hide();
            }
        });
    });
});

</script>

@endsection
