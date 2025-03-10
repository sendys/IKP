@extends('layouts.admin')
@section('content')

<style>
    #loading {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999; /* Pastikan loading berada di depan elemen lain */
}
</style>

<link href="{{ asset('libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />

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

            <div id="loading" style="display: none;">
                <img src="{{ asset('admin/images/loading_color.gif') }}" alt="Loading..."> <!-- Ganti path/to/loading.gif dengan lokasi file GIF Anda -->
            </div>

            {{-- <h4 class="mb-4 header-title">Horizontal form</h4> --}}

            <form id="pegawaiFormEdit" class="form-horizontal">
               {{--  @csrf --}}
               {{--  @method('PUT') --}}

                <div class="form-group row">
                    <label for="inputEmail3" class="col-md-2 col-form-label">No. Identitas (KTP)</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $pegawai->nik) }}" placeholder="No. Identitas (KTP)">
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-md-2 col-form-label">NPWP</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="npwp" name="npwp" value="{{ old('npwp', $pegawai->npwp) }}" style="background-color:aliceblue" placeholder="npwp">
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
                        <input type="text" class="form-control @error('tmp_lahir') is-invalid @enderror " id="tmp_lahir" name="tmp_lahir" value="{{ old('tmp_lahir', $pegawai->tmp_lahir) }}" placeholder="tempat lahir">
                        @error('tmp_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword5" class="col-md-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-md-7">
                        <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $pegawai->tgl_lahir) }}" placeholder="tanggal lahir">
                        @error('tgl_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-md-7">
                        <select class="form-control @error('jk') is-invalid @enderror" id="jk" name="jk" data-toggle="select2">
                            <option value="">Pilih Kelamin</option>
                            <option value="Pria" {{ old('jk', $pegawai->jk) == 'Pria' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Wanita" {{ old('jk', $pegawai->jk) == 'Wanita' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Jabatan</label>
                    <div class="col-md-7">
                        <select class="form-control @error('jbtn') is-invalid @enderror" id="jbtn" name="jbtn" data-toggle="select2">
                            <option value="">Pilih Jabatan</option>
                            <option value="-">--</option>
                            <option value="pns" {{ old('jbtn', $pegawai->jbtn) == 'pns' ? 'selected' : '' }}>PNS</option>
                            <option value="nonpns" {{ old('jbtn', $pegawai->jbtn) == 'nonpns' ? 'selected' : '' }}>Non PNS</option>
                            <option value="dokter" {{ old('jbtn', $pegawai->jbtn) == 'dokter' ? 'selected' : '' }}>Dokter</option>

                        </select>
                        @error('jbtn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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

<script src="{{ asset('libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('#pegawaiFormEdit').on('submit', function (event) {
            event.preventDefault(); // Prevent default form submission
            $('#loading').show();

            $.ajax({
                url: '{{ route('pegawai.update', $pegawai->id) }}', // Ensure this route is correct
                method: 'PUT',
                data: $(this).serialize(), // Serialize form data
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token
                },
                success: function (response) {
                    if (response.success) {
                        Swal.fire('Success', response.message, 'success').then(() => {
                            window.location.href = '{{ route("pegawai.index") }}'; // Redirect to pasien.index
                        });
                        $('#pegawaiFormEdit')[0].reset(); // Reset the form after successful submission
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
