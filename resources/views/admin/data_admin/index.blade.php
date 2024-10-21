@extends('admin.layouts.app')
@section('konten')

<main id="main" class="main">
    <div class="pagetitle">
      <h1><a href="{{url('admin/dashboard')}}"><i class="ri-arrow-left-s-line"></i></a>Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Admin</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                <a href="{{route('admin.create')}}" class="btn btn-md btn-danger">
                  <i class="fa-solid fa-square-plus"></i> Tambah Admin
                </a>
              </div>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Dibuat</th>
                    <th>Foto</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>Admin {{$admin->name}}</td>
                        <td>{{$admin->email}}</td>
                        <td>{{$admin->created_at}}</td>
                        <td>
                            <img src="{{ asset('admin/image/' . ($admin->image ?? 'no_photo.jpg')) }}" alt="Profile Image" width="50">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with stripped rows -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection
