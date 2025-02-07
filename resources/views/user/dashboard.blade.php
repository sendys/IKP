@extends('layouts.user')
@section('title', 'User Dashboard')

@section('content')

<style>
    body {
        background-image: url('{{ asset('image/bg_.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        width: 100vw;
        height: 100vh;
        margin: 0;
        padding: 0;
        overflow-x: hidden; /* Prevent horizontal scrolling */
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .content-container {
      max-width: 900px;
      background: rgba(255, 255, 255, 0.9); /* Semi-transparent white */
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

  </style>

<div class="container my-5">
    <div class="row g-4 align-items-center">
        <!-- Kolom Kiri (Foto Staff) -->
        <div class="col-md-6 text-center">
            <img src="{{ asset('image/staff.png') }}" alt="Azra Syahda" class="img-fluid rounded border shadow mb-3" style="width: 500px; height: 400px;">

            <div class="w-100 text-white p-2" style="background-color: #606aff; max-width: 500px; margin: 0 auto;">
                <h3 class="mb-0">{{ strtoupper(Auth::user()->name) }}</h3>
                <h5 class="mb-0">01202311212</h5>
            </div>

        </div>

        <!-- Kolom Kanan (Logo dan Emoticon) -->
        <div class="col-md-6 text-center">
            <h2 class="text-dark mb-0">MAC CLEANING</h2>
            <h5>Be Clean, Be Happy</h5>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <div class="mb-3 cursor-pointer" onclick="document.getElementById('logout-form').submit();" style="cursor: pointer;">
                <img src="{{ asset('image/logo.png') }}" alt="Logo" class="img-fluid mb-2" style="max-height: 150px;">
            </div>

            <h3>{{ $data->namalabel }}</h3>
            <br>

            <div class="d-flex justify-content-center gap-5">
                <div class="text-center" onclick="submitRating(1)" style="cursor: pointer;">
                    <img src="{{ asset('image/happy.png') }}" alt="Sangat Puas" style="width: 100px; height: 100px;">
                    <h5 class="mt-2">SANGAT PUAS</h5>
                </div>

                <div class="text-center" onclick="submitRating(2)" style="cursor: pointer;">
                    <img src="{{ asset('image/smile.png') }}" alt="Cukup Puas" style="width: 100px; height: 100px;">
                    <h5 class="mt-2">CUKUP PUAS</h5>
                </div>

                <div class="text-center" onclick="submitRating(3)" style="cursor: pointer;">
                    <img src="{{ asset('image/smile_1.png') }}" alt="Tidak Puas" style="width: 100px; height: 100px;">
                    <h5 class="mt-2">TIDAK PUAS</h5>
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
                /* Swal.fire({
                    title: 'Berhasil!',
                    text: response.message,
                    icon: 'success',
                    showConfirmButton: true,
                    timer: 1500,
                    timerProgressBar: true,
                    //confirmButtonText: 'OK'
                }); */
                let timerInterval;
                Swal.fire({
                title: "Terima kasih.!",
                html: "I will close in <b></b> milliseconds.",
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector("b");
                    timerInterval = setInterval(() => {
                    timer.textContent = `${Swal.getTimerLeft()}`;
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
                }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log("I was closed by the timer");
                }
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

