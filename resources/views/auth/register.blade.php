@extends('user.layouts.main')
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/register.css') }}"> --}}
@endsection
@section('container')
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="{{ asset('images/donor-login.jpg') }}" alt="Login image" class="w-100 vh-100"
                        style="object-fit: cover; object-position: left;">
                </div>
                <div class="col-sm-6 text-black">

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        <form style="width: 23rem;" action="{{ route('register') }}" method="POST">
                            @csrf

                            {{-- <a href="{{ url('/') }}" style="text-decoration: none; color:black;"><h2 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Blood Bank Connect</h2></a> --}}
                            <h4 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Daftar</h4>

                            <div data-mdb-input-init class="form-outline mb-3">
                                <label class="form-label" for="form2Example18">Nama</label>
                                <i class="bi bi-2-circle bg-danger"></i>
                                <input id="name" class="form-control form-control-lg" name="name" />
                            </div>

                            <div data-mdb-input-init class="form-outline mb-3">
                                <label class="form-label" for="form2Example18">Alamat Email</label>
                                <input type="email" id="form2Example18" class="form-control form-control-lg"
                                    name="email" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Kata Sandi</label>
                                <div class="password-wrapper position-relative">
                                    <input type="password" id="password" class="form-control form-control-lg"
                                        name="password" required />
                                    <input type="checkbox" id="togglePassword1" onclick="togglePassword('password')"> Show
                                    Password
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="password_confirmation">Konfirmasi Kata Sandi</label>
                                <div class="password-wrapper position-relative">
                                    <input type="password" id="password_confirmation" class="form-control form-control-lg"
                                        name="password_confirmation" required />
                                    <input type="checkbox" id="togglePassword2"
                                        onclick="togglePassword('password_confirmation')"> Show Password
                                </div>
                            </div>

                            <div class="pt-1 mb-4">
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-lg btn-block"
                                    type="submit">Daftar</button>
                            </div>
                            <p>Sudah punya akun? <a href="{{ route('login') }}" class="link-info">Masuk disini</a>
                            </p>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </section>
@section('javascript')
    <script src="{{ asset('user') }}/js/show_hide_password.js"></script>
@endsection
@endsection

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
