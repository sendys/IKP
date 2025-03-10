@extends('layouts.admin')
@section('content')

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
                <h4 class="page-title">Karyawan Baru</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    {{-- <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-md-9">
                   <br>
                    <form id="cari-noka">
                        @csrf
                        <div class="form-group row">
                            <label for="nokartu" class="col-3 col-form-label">Mapping Dokter BPJS</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="searchQuery" name="searchQuery" placeholder="Kode mapping dokter">
                                    <div class="input-group-append">
                                        <button type="button" class="btn waves-effect waves-light btn-primary" onclick="cariKodeDokter()">
                                            <i class="mr-1 fa fa-search"></i> Search
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
 --}}
    <div class="col-12">
        <div class="card-box">

            {{-- <h4 class="mb-4 header-title">Horizontal form</h4> --}}
            <form id="pegawaiForm" class="form-horizontal" enctype="multipart/form-data">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-md-2 col-form-label">No. Identitas (KTP)</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="ktp" name="ktp" value="{{ old('ktp') ?? '' }}" placeholder="No. Identitas (KTP)">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword5" class="col-md-2 col-form-label">Nama Karyawan</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror " id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama Karyawan">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword5" class="col-md-2 col-form-label">Tempat Lahir</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control @error('tmp_lahir') is-invalid @enderror " id="tlahir" name="tlahir" value="{{ old('tlahir') }}" placeholder="Tempat lahir">
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
                                value="{{ old('tgllhr') }}"
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
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
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
                            <option value="Banda Aceh">Banda Aceh</option>
                            <option value="Lhokseumawe">Lhokseumawe</option>
                        </select>
                        @error('lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword7" class="col-md-2 col-form-label">Telp/HP</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="telp" name="telp" value="{{ old('telp') ?? '' }}" placeholder="No. Telp/HP">

                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword5" class="col-md-2 col-form-label">Alamat</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') ?? '' }}" placeholder="Alamat">

                    </div>
                </div>

               <div class="form-group row">
                    <label for="inputPassword6" class="col-md-2 col-form-label">Photo</label>
                    <div class="col-md-7">
                        <input type="file" class="filestyle" id="path" name="path" value="{{ old('path') ?? '' }}" data-btnClass="btn-primary" accept="image/*">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('admin/js/pages/form-advanced.init.js') }}"></script>

<script >

    $(document).ready(function () {
    $('#pegawaiForm').on('submit', function (event) {
        event.preventDefault(); // Mencegah submit default

        let formData = new FormData(this); // Gunakan FormData untuk menangani file

        $.ajax({
            url: '{{ route("pegawai.store") }}', // Pastikan rute benar
            method: 'POST',
            data: formData,
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
                    $('#pegawaiForm')[0].reset(); // Reset form setelah berhasil
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

</script>

@endsection
