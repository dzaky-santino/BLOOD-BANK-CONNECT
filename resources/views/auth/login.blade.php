@extends('user.layouts.main')


@section('container')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black">

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">                        

                        <form style="width: 23rem;" action="{{ route('login') }}" method="POST">
                            @csrf
                            <a href="{{ url('/') }}" style="text-decoration: none; color:black;"><h2 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Blood Bank Connect</h2></a>
                            <h4 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Masuk</h4>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="email">Alamat Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Kata Sandi</label>
                                <div class="password-wrapper position-relative">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <input type="checkbox" id="togglePassword1" onclick="togglePassword('password')"> Show Password
                                    <span class="position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer"
                                        id="togglePassword">
                                    </span>
                                </div>
                            </div>

                            <div class="pt-1 mb-4">
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-lg btn-block"
                                    type="submit">Login</button>
                            </div>

                            <p>Belum punya akun? <a href="{{ route('register') }}" class="link-info">Daftar disini</a></p>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="{{ asset('images/donor-login.jpg') }}" alt="Login image" class="w-100 vh-100"
                        style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>
@section('javascript')
<script src="{{ asset('user')}}/js/show_hide_password.js"></script>
@endsection
@endsection



{{-- @extends('layouts.app') tampilan bawaan laravel

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
