@extends('admin.layouts.app')
@section('konten')

<main id="main" class="main">
    
    <div class="pagetitle">
        <h1><a href="{{url('admin/dokter')}}"><i class="ri-arrow-left-s-line"></i></a>Profil</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Data</li>
                <li class="breadcrumb-item">Dokter</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="{{ asset('admin/image/' . ($dokter->image ?? 'no_photo.jpg')) }}" alt="Profile">
                        <h2>Dr. {{$dokter->nama}}</h2>
                        <h3>{{$dokter->kontak}}</h3>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Detail</button>
                            </li>
                            
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profil</button>
                            </li>
                        </ul>
                        
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Detail Profil</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                                    <div class="col-lg-9 col-md-8">{{$dokter->nama}}</div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Kontak</div>
                                    <div class="col-lg-9 col-md-8">{{$dokter->kontak}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                                    <div class="col-lg-9 col-md-8">{{$dokter->jk}}</div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->
                                <form method="POST" action="{{route('dokter.update', $dokter->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Gambar Profil</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{ asset('admin/image/' . ($dokter->image ?? 'no_photo.jpg')) }}" alt="Profile">
                                            <div class="pt-2">
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                        </div>
                                    </div>                                                                       

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nama" type="text" class="form-control" id="nama" value="{{ $dokter->nama }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Kontak</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="kontak" type="text" class="form-control" id="kontak" value="{{$dokter->kontak}}">
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label for="jk" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="jk" id="jk" class="form-control" required>
                                                <option value="Laki-laki" {{ old('jk', $dokter->jk) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="Perempuan" {{ old('jk', $dokter->jk) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                                    </div>                
                                </form><!-- End Profile Edit Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
