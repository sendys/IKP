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
        background-color: #ffffff69;
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

<div class="container">
    <div class="row justify-content-center">
        <!-- Logo Perusahaan -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <div class="logo" onclick="document.getElementById('logout-form').submit();">
            <img src="{{ asset('image/logo.png') }}" alt="Logo Perusahaan">
        </div>

        <!-- Judul -->
        <h1>Berikan Penilaian Kepada Kami.</h1>

        <!-- Pilihan Kepuasan -->
        <div class="rating-container">
            @csrf
            {{-- <input type="hidden" id="ratingInput" name="rating" value=""> --}}
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
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function submitRating(value) {
        // Set nilai ke input tersembunyi
        document.getElementById('ratingInput').value = value;

        // Tampilkan alert (opsional)
        alert('Anda memilih: ' + value);

        // Kirim form
        document.getElementById('ratingForm').submit();
    }
</script> --}}

