@extends('admin.layouts.app')
@section('konten')

<main id="main" class="main">
    <div class="pagetitle">
        <h1><a href="{{url('admin/dokter')}}"><i class="ri-arrow-left-s-line"></i></a>Tambah Dokter</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Data</li>
                <li class="breadcrumb-item">Dokter</li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Dokter</h5>
                        
                        <!-- Form Tambah Dokter -->
                        <form action="{{ route('dokter.store') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="row mb-3">
                                <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputNama" name="nama" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="inputKontak" class="col-sm-2 col-form-label">Kontak</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputKontak" name="kontak" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="jk" name="jk" required>
                                        <option value="Laki-Laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Gambar Profil</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End Form Tambah Dokter -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection
