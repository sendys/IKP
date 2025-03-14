@extends('layouts.user')
@section('title', 'User Dashboard')

@section('content')

<style>
    /* Fullscreen Background */
    body {
        background-image: url('{{ asset('image/bg_.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed; /* Keeps background fixed */
        width: 100vw;
        min-height: 100vh; /* Ensures full height */
        margin: 0;
        padding: 0;
        overflow-x: hidden; /* Prevent horizontal scrolling */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Content Styling */
    .content-container {
        max-width: 900px;
        background: rgba(255, 255, 255, 0.9); /* Semi-transparent white */
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    /* Responsive Styling */
    .staff-img {
        max-width: 100%;
        height: auto;
        width: 100%;
        max-height: 500px;
    }

    .rating-img {
        width: 80px;
        height: auto;
    }

    /* Styling dasar untuk elemen rating */
    .rating-item {
        transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
        padding: 15px;
        border-radius: 10px;
    }

    /* Efek hover */
    .rating-item:hover {
        transform: scale(1.1); /* Memperbesar elemen */
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Menambahkan bayangan */
        background-color: #f0f8ff; /* Mengubah warna latar belakang */
    }

    @media (max-width: 768px) {
        .d-flex {
            flex-direction: column;
            gap: 10px;
        }

        .rating-img {
            width: 70px;
        }
    }

    /* Fixed Footer */
    .footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: rgba(207, 207, 207, 0.8); /* Semi-transparent black */
        color: rgb(48, 47, 47);
        text-align: center;
        padding: 10px;
        font-size: 12px;
    }

    /* Justified & Centered Text */
    .footer-text {
        text-align: justify;
        text-align-last: center;
        margin: 0 auto;
        max-width: 90%;
    }

    .animated-bg {
    background-color: #3E8DE3;
    transition: background-color 0.5s ease-in-out;
    }

    .animated-bg:hover {
        background-color: #1e59b3;
    }

</style>

<div class="container my-5">
    <div class="row g-4 align-items-center">
        <!-- Kolom Kiri (Foto Staff) -->
        <div class="col-md-6 col-12 text-center ">
            <img src="{{ asset(Auth::user()->pegawai->path) }}" alt="Azra Syahda" class="img-fluid rounded border shadow mb-2 staff-img">

            <div class="w-100 text-white p-2 text-center animated-bg" style="max-width: auto; margin: 0 auto;">
                <h3 class="mb-0">{{ strtoupper(Auth::user()->pegawai->nama) }}</h3>
                <h5 class="mb-0">{{ Auth::user()->pegawai->telp }}</h5>
            </div>
        </div>

        <!-- Kolom Kanan (Logo dan Emoticon) -->
        <div class="col-md-6 col-12 text-center">
            <h2 class="text-dark mb-0">MAC CLEANING</h2>
            <h5>Be Clean, Be Happy</h5>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <div class="mb-3 cursor-pointer" onclick="document.getElementById('logout-form').submit();">
                <img src="{{ asset('image/logo.png') }}" alt="Logo" class="img-fluid mb-2" style="max-height: 150px;cursor: pointer;">
            </div>

            <h3>{{ $data->namalabel }}</h3>
            <br>

            <div class="d-flex justify-content-center gap-4 flex-wrap">
                <div class="text-center rating-item" onclick="submitRating(1)" style="cursor: pointer;">
                    <img src="{{ asset('image/happy.png') }}" alt="Sangat Puas" class="rating-img">
                    <h5 class="mt-2">SANGAT PUAS</h5>
                </div>

                <div class="text-center rating-item" onclick="submitRating(2)" style="cursor: pointer;">
                    <img src="{{ asset('image/smile.png') }}" alt="Cukup Puas" class="rating-img">
                    <h5 class="mt-2">CUKUP PUAS</h5>
                </div>

                <div class="text-center rating-item" onclick="submitRating(3)" style="cursor: pointer;">
                    <img src="{{ asset('image/smile_1.png') }}" alt="Tidak Puas" class="rating-img">
                    <h5 class="mt-2">TIDAK PUAS</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <h5 class="footer-text">
        Maccleaning {{ Auth::user()->pegawai->lokasi }} | <span id="datetime"></span>
        {{-- <br>
        &copy; 2025 MAC CLEANING - All Rights Reserved | Contact: info@maccleaning.com --}}
    </h5>
</footer>

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
    function updateDateTime() {
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
        document.getElementById('datetime').textContent = now.toLocaleDateString('id-ID', options);
    }

    setInterval(updateDateTime, 1000);
    updateDateTime();

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
                timer: 1000,
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

