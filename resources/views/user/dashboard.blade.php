@extends('layouts.user')
@section('title', 'User Dashboard')

@section('content')

    <style>
        /* Keyframe animations for background effects */
        @keyframes backgroundPulse {

            0%,
            100% {
                filter: brightness(1) contrast(1);
                transform: scale(1);
            }

            50% {
                filter: brightness(1.1) contrast(1.05);
                transform: scale(1.02);
            }
        }

        @keyframes backgroundShift {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        @keyframes floatingParticles {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.3;
            }

            50% {
                transform: translateY(-15px) rotate(180deg);
                opacity: 0.7;
            }
        }

        @keyframes subtleZoom {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.03);
            }
        }

        /* Fullscreen Background */
        body {
            background-image: url('{{ asset('image/bg_.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            width: 100vw;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;

            /* Add subtle animation to the background */
            animation: backgroundPulse 8s ease-in-out infinite;

            /* Alternative animation options - uncomment one at a time:
                    
                    /* Option 1: Subtle zoom effect */
            /* animation: subtleZoom 12s ease-in-out infinite; */

            /* Option 2: No animation (original static background) */
            /* animation: none; */

            */
        }

        /* Add floating particles overlay effect */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.1) 2px, transparent 2px),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 2px, transparent 2px),
                radial-gradient(circle at 40% 40%, rgba(255, 255, 255, 0.08) 1px, transparent 1px),
                radial-gradient(circle at 60% 70%, rgba(255, 255, 255, 0.06) 1px, transparent 1px);
            background-size: 200px 200px, 300px 300px, 150px 150px, 250px 250px;
            animation: floatingParticles 20s ease-in-out infinite;
            pointer-events: none;
            z-index: 1;
        }

        /* Ensure all content stays above animated background */
        .container {
            position: relative;
            z-index: 2;
        }

        .fullscreen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: white;
            /* Sesuaikan */
            z-index: 9999;
            overflow: auto;
            padding: 20px;
        }

        /* Content Styling */
        .content-container {
            width: 100%;
            max-width: 900px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 10px;
        }

        /* Responsive Images */
        .staff-img {
            width: 100%;
            height: auto;
            max-height: 500px;
        }

        .rating-img {
            width: 100px;
            height: auto;
        }

        /* Rating Item */
        .rating-item {
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            padding: 10px;
            border-radius: 10px;
        }

        .rating-item:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            background-color: #f0f8ff;
        }

        /* Fixed Footer */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(207, 207, 207, 0.8);
            color: rgb(48, 47, 47);
            text-align: center;
            padding: 10px;
            font-size: 12px;
            z-index: 10;
        }

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


    <div class="container my-5 ">
        {{--  <div class="row g-4 align-items-center">
            <!-- Kolom Kiri (Foto Staff) -->
            {{-- <div class="col-md-6 col-12 text-center ">
            <img src="{{ asset(Auth::user()->pegawai->path) }}" alt="Azra Syahda" class="img-fluid rounded border shadow mb-2 staff-img">

            <div class="w-100 text-white p-2 text-center animated-bg" style="max-width: auto; margin: 0 auto;">
                <h3 class="mb-0">{{ strtoupper(Auth::user()->pegawai->nama) }}</h3>
                <h5 class="mb-0">{{ Auth::user()->pegawai->telp }}</h5>
            </div>
        </div> --}}

        <!-- Kolom Kanan (Logo dan Emoticon) -->
        <div class="col-12 text-center">
            <h2 class="text-dark mb-0">MAC CLEANING</h2>
            <h5>Be Clean, Be Happy</h5>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <div class="mb-3 cursor-pointer" onclick="document.getElementById('logout-form').submit();">
                <img src="{{ asset('image/logo.png') }}" alt="Logo" class="img-fluid mb-2"
                    style="max-height: 150px;cursor: pointer;">
            </div>


            {{-- <h3>{{ $data->namalabel }}</h3> --}}
            <h3>{{ App\Models\SettingLabel::find(1)->namalabel }}</h3>
            <br>

            <div class="d-flex justify-content-center gap-5 flex-wrap">
                <div class="text-center rating-item" onclick="submitRating(1)" style="cursor: pointer;">
                    <img src="{{ asset('image/happy.png') }}" alt="Sangat Puas" class="rating-img">
                    <h6 class="mt-2">SANGAT PUAS</h6>
                </div>

                <div class="text-center rating-item" onclick="submitRating(2)" style="cursor: pointer;">
                    <img src="{{ asset('image/smile.png') }}" alt="Cukup Puas" class="rating-img">
                    <h6 class="mt-2">CUKUP PUAS</h6>
                </div>

                <div class="text-center rating-item" onclick="submitRating(3)" style="cursor: pointer;">
                    <img src="{{ asset('image/smile_1.png') }}" alt="Tidak Puas" class="rating-img">
                    <h6 class="mt-2">TIDAK PUAS</h6>
                </div>
            </div>
        </div>
    </div>
    </div>

    <footer class="footer">
        <h5 class="footer-text">
            Maccleaning, <span id="datetime"></span>
            {{-- <br>
        &copy; 2025 MAC CLEANING - All Rights Reserved | Contact: info@maccleaning.com --}}
        </h5>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script>
        function updateDateTime() {
            const now = new Date();
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            };
            document.getElementById('datetime').textContent = now.toLocaleDateString('id-ID', options);
        }

        setInterval(updateDateTime, 1000);
        updateDateTime();

        function submitRating(value) {

            $.ajax({
                url: '{{ route('penilaian.store') }}', // URL endpoint Laravel
                type: 'POST', // Tipe request
                data: {
                    _token: '{{ csrf_token() }}', // Token CSRF Laravel
                    rating: value, // Rating yang dikirimkan
                },
                success: function(response) {

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
