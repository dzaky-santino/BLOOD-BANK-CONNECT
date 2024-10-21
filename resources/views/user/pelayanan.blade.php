@extends('user.layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('user/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/pelayanan.css') }}">
    <style>
        .scroll-container::-webkit-scrollbar {
            display: none;
        }
    </style>
@endsection

@section('container')
    @include('user.layouts.nav')

    {{-- Layanan Section --}}
    <div class="bg-danger py-3">
        <h2 class="text-center text-white mt-4">Pelayanan Kami</h2>

        <div class="container mt-5">
            <div class="d-flex justify-content-around align-items-center">
                <div class="card-custom bg-white p-3 me-lg-3 rounded-4" style="text-align: justify;">
                    <h3 class="text-danger text-center mb-3">Pelayanan Donor Darah</h3>
                    <p>Donor darah adalah memberikan darah secara sukarela untuk disalurkan kepada yang membutuhkan yang
                        dapat membantu menyelamatkan nyawa orang lain.
                        Blood Bank Connection memiliki 2 pelayanan donor darah. Teman-teman dapat datang langsung ke RS kami
                        secara langsung (buka 24 jam),
                        atau jika teman-teman ingin mengadakan kegiatan donor darah dikantor/lingkungan organisasi,
                        kalian dapat mengundang kami dengan mengirimkan surat permohonan ke email kami di
                        bloodbank@gmail.com</p>
                    <a href="{{ route('index_regist_donor') }}" class="btn btn-danger">Daftar Donor</a>
                </div>

                <img src="{{ asset('images/pelayanan-section.jpg') }}" alt="Pelayanan Donor Darah"
                    class="rounded-4 d-none d-lg-block w-25">

            </div>
        </div>
        <div class="container mt-3">
            <div class="d-flex justify-content-around align-items-center">
                <img src="{{ asset('images/pelayanan-section.jpg') }}" alt="Pelayanan Donor Darah"
                    class="rounded-4 d-none d-lg-block w-25">

                <div class="card-custom bg-white p-3 rounded-4" style="text-align: justify;">
                    <h3 class="text-danger text-center mb-3">Pelayanan Tranfusi Darah</h3>
                    <p>Pelayanan transfusi darah adalah proses krusial dimana darah yang didonorkan disalurkan kepada pasien
                        yang membutuhkan untuk berbagai kondisi medis seperti operasi, kecelakaan, dan penyakit kronis.
                        Donor darah sukarela berperan penting dalam menyelamatkan nyawa dan meningkatkan kualitas hidup
                        pasien, memberikan harapan bagi mereka yang memerlukan perawatan darurat.</p>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('index_regist_tranfusi') }}" class="btn btn-outline-danger">Daftar Tranfusi</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- Layanan Section --}}



    {{-- Syarat Donor Section --}}
    <div class="container-fluid  my-5">
        <h2 class="text-center">Panduan Donor</h2>

        <div class="scroll-container mt-3 overflow-x-auto row flex-row flex-nowrap  px-5">

            <div class="bg-danger rounded-2 p-3 col-6 col-md-3 me-3" style=" text-align: justify">
                <h5 class="text-white">Syarat Donor Darah</h5>
                <hr class="text-white">
                <div class="row align-items-center">
                    <div class="col-1">
                        @include('user.icons.check')
                    </div>
                    <div class="col-10">
                        <p class="m-0 text-white ms-2">Sehat Jasmani dan Rohani</p>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-1">
                        @include('user.icons.check')
                    </div>

                    <div class="col-10">
                        <p class="m-0 text-white ms-2">Usia 17 sampai dengan 65 tahun</p>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-1">
                        @include('user.icons.check')
                    </div>

                    <div class="col-10">
                        <p class="m-0 text-white ms-2">Berat badan minimal 45 kg</p>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-1">
                        @include('user.icons.check')
                    </div>

                    <div class="col-10">
                        <p class="m-0 text-white ms-2">Tekanan Darah</p>
                    </div>

                </div>
                <ul class="ms-4 text-white">
                    <li>Sistole 100 - 70</li>
                    <li>Diastole 70 - 100</li>
                </ul>
                <div class="row align-items-center">
                    <div class="col-1">
                        @include('user.icons.check')

                    </div>
                    <div class="col-11">
                        <p class="m-0 text-white ms-2">Kadar haemoglobin 12,5g% s/
                            d 17,0g%</p>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-1">
                        @include('user.icons.check')
                    </div>
                    <div class="col-11">
                        <p class="m-0 text-white ms-2 flex-grow-1">Interval donor minimal 12 minggu atau 3 bulan sejak
                            donor
                            danar sebelumnya (maksimal 5 kali dalam 2 tahun)</p>
                    </div>
                </div>

            </div>

            <div class="bg-danger rounded-2 p-3 col-6 col-md-3 me-3" style=" text-align: justify">
                <h5 class="text-white">Jangan Donor Jika</h5>
                <hr class="text-white">
                <div class="row align-items-center">
                    <div class="col-1">
                        @include('user.icons.check')
                    </div>
                    <div class="col-10">
                        <p class="m-0 text-white ms-2">Kecanduan minuman beralkohol</p>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-1">
                        @include('user.icons.check')
                    </div>
                    <div class="col-10">
                        <p class="m-0 text-white ms-2">Menderita kanker</p>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-1">
                        @include('user.icons.check')
                    </div>
                    <div class="col-10">
                        <p class="m-0 text-white ms-2">Mempunyai penyakit jantung dan paru-paru</p>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-1">
                        @include('user.icons.check')
                    </div>
                    <div class="col-10">
                        <p class="m-0 text-white ms-2">Menderita tekanan darah tinggi (hipertensi)</p>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-1">
                        @include('user.icons.check')
                    </div>
                    <div class="col-11">
                        <p class="m-0 text-white ms-2">Menderita kencing manis (diabetes militus)</p>
                    </div>
                </div>
                
                <div class="row align-items-center">
                    <div class="col-1">
                        @include('user.icons.check')
                    </div>
                    <div class="col-11">
                        <p class="m-0 text-white ms-2">Memiliki kecenderungan perdarahan abnormal atau kelainan darah lainnya</p>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-1">
                        @include('user.icons.check')
                    </div>
                    <div class="col-11">
                        <p class="m-0 text-white ms-2">Ketergantungan narkoba</p>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-1">
                        @include('user.icons.check')
                    </div>
                    <div class="col-11">
                        <p class="m-0 text-white ms-2">Menderita atau pernah menderita Hepatitis B atau C.</p>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-1">
                        @include('user.icons.check')
                    </div>
                    <div class="col-11">
                        <p class="m-0 text-white ms-2">Mengidap atau beresiko tinggi Terhadap HIV/AIDS</p>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-1">
                        @include('user.icons.check')
                    </div>
                    <div class="col-11">
                        <p class="m-0 text-white ms-2 flex-grow-1">Menderita epilepsi dan sering kejang</p>
                    </div>
                </div>
            </div>

            <div class="bg-danger rounded-2 p-3 col-6 col-md-3 me-3" style=" text-align: justify">
                <h5 class="text-white">Panduan Donor Darah</h5>
                <hr class="text-white">
                <div class="row align-items-center">
                    <div class="col-1">
                        @include('user.icons.check')
                    </div>
                    <div class="col-10">
                        <p class="m-0 text-white ms-2">Kembali bekerja setelah donor darah tidak berbahaya untuk kesehatan</p>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-1">
                        @include('user.icons.check')
                    </div>
                    <div class="col-10">
                        <p class="m-0 text-white ms-2">Makanlah 3 - 4 jam sebelum menyumbangkan darah. Jangan menyumbangkan darah dengan perut kosong.</p>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-1">
                        @include('user.icons.check')
                    </div>
                    <div class="col-10">
                        <p class="m-0 text-white ms-2">Minum lebih banyak dari biasanya pada hari mendonorkan darah (paling sedikit 3 gelas)</p>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-1">
                        @include('user.icons.check')
                    </div>
                    <div class="col-11">
                        <p class="m-0 text-white ms-2 flex-grow-1">Untuk menghindari bengkak di lokasi bekas jarum, hindari mengangkat benda berat selama 12 jam.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- Manfaat Section --}}

    {{-- Footer Section --}}
    @include('user.layouts.footer')
    {{-- Footer Section --}}
@endsection
