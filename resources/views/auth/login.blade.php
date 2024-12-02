@extends('layouts.app')

@section('content')
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p class="text-muted">MACCLEANING.ID</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="username">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email" required autocomplete="email" autofocus>
                                    </div>

                                    <div class="mb-3">
                                       {{--  <div class="float-end">
                                            <a href="auth-recoverpw" class="text-muted">Forgot password?</a>
                                        </div> --}}
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"  placeholder="Enter password" required autocomplete="current-password">
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                    </div>

                                    <div class="mt-3 text-end">
                                        <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log
                                            In</button>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection
