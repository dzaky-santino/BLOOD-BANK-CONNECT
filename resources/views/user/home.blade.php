@extends('user.layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('user') }}/css/home.css">
    <link rel="stylesheet" href="{{ asset('user') }}/css/navbar.css">
@endsection

@section('container')
    @include('user.layouts.nav')

    {{-- Hero Section --}}
    <div class="container">
        <div class="hero-section mt-5 d-xl-flex justify-content-xl-around align-items-xl-center">
            <div data-aos="fade-right" class="d-flex justify-content-center">
                <img src="{{ asset('user') }}/image/hero-image.png" alt="" class="hero-image">
            </div>

            <div data-aos="fade-left" class="hero-description mt-5">
                <h1 style="font-family: 'Montserrat Alternates', sans-serif"
                    class="text-danger fw-semibold fst-italic fs-3">
                    <span class="fs-1  ">#</span>AYO
                    DONOR
                </h1>
                <p class="" style="text-align: justify">Bersama <span
                        class="text-danger fw-semibold">BloodBankConnect</span>
                    berbagi darah, berbagi kehidupan.
                    Setetes darah Anda, sejuta harapan.
                    Mari menjadi pahlawan bagi sesama,
                    Satu donasi, selamatkan nyawa.
                    Kita peduli, kita berbagi, kita satu keluarga.</p>
                <div class="d-flex flex-col justify-content-center">
                    <a href="{{ route('index_regist_donor') }}" class="btn btn-danger text-white w-50">Donor</a>
                    <a href="{{ route('index_regist_tranfusi') }}" class="btn btn-dark text-white w-50 ms-3 ">Butuh
                        darah?</a>
                </div>
            </div>
        </div>
    </div>
    {{-- Hero Section --}}

    {{-- Stock Section --}}
    <div class="stock-section bg-danger">
        <h2 class="text-center text-white mt-4 ">Stok Darah</h2>

        <div class="row d-flex justify-content-around justify-content-xl-between mt-5 ">
            @foreach ($bankDarah as $bd)
                <div data-aos="fade-up" class="card col-5  bg-white rounded-4 ">
                    <div class="d-flex flex-column justify-content-center align-items-center p-3 py-xl-5">
                        <p class="text-danger">{{ $bd->stok }}</p>
                        <h3>Golongan</h3>
                        <h3>{{ $bd->gol_darah }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- Stock Section --}}

    {{-- Manfaat Section --}}
    <div class="mt-5">
        <h2 class="text-center">Manfaat Donor</h2>

        <div class="manfaat-section d-xl-flex justify-content-xl-around align-items-xl-center mt-3">
            <div class="">
                <div data-aos="fade-right" data-aos-duration="300"
                    class="card bg-danger text-white fw-semibold rounded-4 mb-3 ">
                    <p class="m-0 text-center">Mengurangi penyakit jantung</p>
                </div>

                <div data-aos="fade-right" data-aos-duration="400"
                    class="card bg-danger text-white fw-semibold rounded-4 mb-3 ">
                    <p class="m-0 text-center">Menurunkan resiko kanker</p>
                </div>

                <div data-aos="fade-right" data-aos-duration="500"
                    class="card bg-danger text-white fw-semibold rounded-4 mb-3 ">
                    <p class="m-0 text-center">Meningkatkan produksi darah</p>
                </div>

                <div data-aos="fade-right" data-aos-duration="600"
                    class="card bg-danger text-white fw-semibold rounded-4 mb-3 ">
                    <p class="m-0 text-center">Membuat pikiran lebih stabil</p>
                </div>

                <div data-aos="fade-right" data-aos-duration="700"
                    class="card bg-danger text-white fw-semibold rounded-4 mb-3 ">
                    <p class="m-0 text-center">Melancarkan aliran darah</p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <img src="{{ asset('user') }}/image/doctor-manfaat-donor.png" alt="" class="d-none d-xl-block">
            </div>
        </div>
    </div>
    {{-- Manfaat Section --}}

    {{-- Footer Section --}}
    @include('user.layouts.footer')
    {{-- Footer Section --}}
@endsection
