<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>Login | Maccleaning.id</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.ico') }}">
    <link href="{{ asset('admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" /> --}}

    <style>
        /* Centering login container */
        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        /* Card styling */
        .login-card {
            display: flex;
            flex-direction: row;
            border-radius: 8px;
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
        }
        /* Image container styling */
        .image-container {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
        /* Login image styling */
        .login-image {
            width: 80%;
            height: auto;
            object-fit: cover;
            border-radius: 0 0 0 8px;
        }
        /* Logo styling */
        .logo {
            width: 100px; /* Adjust width as necessary */
            margin-bottom: 20px;
        }
        /* Centering the logo */
        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px; /* Space below the logo */
        }
        /* Media query for responsive layout */
        @media (max-width: 768px) {
            .login-card {
                flex-direction: column;
            }
            .image-container {
                display: none;
            }
        }

        #spinner {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.521);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        #spinner img {
            width: 100px; /* Adjust size as needed */
        }

    </style>
</head>

<body class="bg-primary vh-100">

    <div class="container-fluid login-container">
        <div class="bg-white login-card">
            <!-- Left Image Column -->
            <div class="p-0 col-md-6 image-container d-none d-md-flex">
                <img src="{{ asset('admin/images/05.svg') }}" alt="Hospital Image" class="login-image">
            </div>

            <!-- Right Login Form Column -->
            <div class="p-4 col-md-6 mx-auto">
                <div class="text-left">

                   {{--  <!-- Hospital Name -->
                    <h4 class="text-dark fs-1 fw-bold">RS. BHAYANGKARA ACEH</h4>
                    <p class="text-secondary">Sistem Informasi Rumah Sakit</p> --}}

                    <!-- Sign-In Section -->
                    <h5 class="mt-1 text-uppercase text-primary">Sign In</h5>
                    <p class="text-muted">Login UserFront Office</p>
                </div>

                @include('sweetalert::alert')

                <div id="spinner" style="display: none;">
                    <img src="{{ asset('admin/images/spinner_1.gif') }}" alt="Loading...">
                </div>

                <form id="login-form" class="mt-4" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="emailaddress">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Masuk</button>
                </form>

                <div class="mt-4 text-center">
                   {{--  <p class="mb-0 text-muted">Don't have an account? <a href="#" class="text-dark"><b>Sign Up</b></a></p> --}}
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/js/vendor.min.js') }}"></script>
    <script src="{{ asset('admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/sweet-alerts.init.js') }}"></script>
    <script src="{{ asset('admin/js/app.min.js') }}"></script>

    <script>
        document.getElementById('login-form').addEventListener('submit', function () {
            document.getElementById('spinner').style.display = 'flex';

            setTimeout(() => {
                this.submit(); // Submit the form after the delay
            }, 3000);

        });
    </script>

</body>

</html>
