@extends('layouts.user')
@section('title', 'User Dashboard')

@section('content')
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #77707069;
        //font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif, sans-serif;
    }

    .container {
        text-align: center;

    }

    .logo img {
        cursor: pointer;
        max-width: 100px;
        height: auto;
        margin-bottom: 20px;
    }

    .rating-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 50px;
        margin-top: 20px;
    }

    .rating {
        text-align: center;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .rating img {
        width: 80px;
        height: 80px;
    }

    .rating:hover {
        transform: scale(1.2);
    }

    h1 {
        margin-bottom: 20px;
        color: #333;
    }
</style>

<div class="container mt-4">
  <div class="row">
    <!-- Kolom Kiri: Video/Gambar -->
    <div class="col-md-6 d-flex justify-content-center align-items-center">
      <div class="shadow-lg p-2 rounded" style="background-color: #d9dcdd;">
        <!-- Contoh Video -->
        <video controls class="img-fluid" style="max-width: 100%; height: 400px;">
          <source src="video-sample.mp4" type="video/mp4">
          Browser Anda tidak mendukung video tag.
        </video>
        <!-- Contoh Gambar (alternatif) -->
        <!-- <img src="gambar-sample.jpg" alt="Contoh Gambar" class="img-fluid" style="max-width: 100%; height: auto;"> -->
      </div>
    </div>
    <!-- Kolom Kanan: Indeks Kepuasan -->
    <div class="col-md-6">
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <br>

        <div class="logo" onclick="document.getElementById('logout-form').submit();">
            <img src="{{ asset('image/logo.png') }}" alt="Logo Perusahaan">
        </div>

        <h1>{{ $data->namalabel }}</h1>

        <div class="rating-container">
            @csrf
            <div class="rating" onclick="submitRating(1)" style="cursor: pointer;">
                <img src="{{ asset('image/happy.png') }}" alt="Sangat Puas">
                {{-- <i class="bi bi-emoji-heart-eyes fs-1 text-success"></i> --}}
                <p>Sangat Puas</p>
            </div>
            <div class="rating" onclick="submitRating(2)" style="cursor: pointer;">
                <img src="{{ asset('image/smile.png') }}" alt="Puas">
                {{-- <i class="bi bi-emoji-smile fs-1 text-primary"></i> --}}
                <p>Puas</p>
            </div>
            <div class="rating" onclick="submitRating(3)" style="cursor: pointer;">
                <img src="{{ asset('image/smile_1.png') }}" alt="Tidak Puas">
                {{-- <i class="bi bi-emoji-neutral fs-1 text-secondary"></i> --}}
                <p>Tidak Puas</p>
            </div>
        </div>

      </div>
    </div>
  </div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <!-- Logo Perusahaan -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <div class="logo" onclick="document.getElementById('logout-form').submit();">
            <img src="{{ asset('image/logo.png') }}" alt="Logo Perusahaan">
        </div>

        <h1>{{ $data->namalabel }}</h1>

        <div class="rating-container">
            @csrf
            <div class="rating" onclick="submitRating(1)" style="cursor: pointer;">
                <img src="{{ asset('image/happy.png') }}" alt="Sangat Puas">
                <p>Sangat Puas</p>
            </div>
            <div class="rating" onclick="submitRating(2)" style="cursor: pointer;">
                <img src="{{ asset('image/smile.png') }}" alt="Puas">
                <p>Puas</p>
            </div>
            <div class="rating" onclick="submitRating(3)" style="cursor: pointer;">
                <img src="{{ asset('image/smile_1.png') }}" alt="Tidak Puas">
                <p>Tidak Puas</p>
            </div>
        </div>
    </div>
</div> --}}


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<script>
    function submitRating(value) {

        $.ajax({
            url: '{{ route("penilaian.store") }}', // URL endpoint Laravel
            type: 'POST', // Tipe request
            data: {
                _token: '{{ csrf_token() }}', // Token CSRF Laravel
                rating: value, // Rating yang dikirimkan
            },
            success: function(response) {
                Swal.fire({
                    title: 'Berhasil!',
                    text: response.message,
                    icon: 'success',
                    showConfirmButton: true,
                    timer: 1500,
                    timerProgressBar: true,
                    //confirmButtonText: 'OK'
                });
            },
            error: function(xhr, status, error) {
                // Tampilkan pesan error jika ada
                Swal.fire({
                    title: 'Error!',
                    text: xhr.responseJSON?.message || 'Terjadi kesalahan.',
                    icon: 'error',
                    showConfirmButton: true,
                    //confirmButtonText: 'OK'
                });
            }
        });
    }
</script>

@endsection



