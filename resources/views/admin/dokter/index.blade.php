@extends('admin.layouts.app')
@section('konten')

<main id="main" class="main">
    <div class="pagetitle">
      <h1><a href="{{url('admin/dashboard')}}"><i class="ri-arrow-left-s-line"></i></a>Dokter</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Dokter</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                <a href="{{route('dokter.create')}}" class="btn btn-md btn-danger">
                  <i class="fa-solid fa-square-plus"></i> Tambah Dokter
                </a>
              </div>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kontak</th>
                    <th>Jenis Kelamin</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($dokter as $d)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>Dr. {{$d->nama}}</td>
                        <td>{{$d->kontak}}</td>
                        <td>{{$d->jk}}</td>
                        <td>
                            <img src="{{ asset('admin/image/' . ($d->image ?? 'no_photo.jpg')) }}" alt="Profile Image" width="50">
                        </td>
                        <td>
                          <a href="{{route('dokter.edit', $d->id)}}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                          
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$d->id}}"><i class="fa-solid fa-trash-can"></i></button>

                          <!-- Modal -->
                          <div class="modal fade" id="deleteModal{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          Apakah Anda Yakin Akan Menghapus Data {{$d->nama}}?
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                          <form action="{{ route('dokter.destroy', $d->id) }}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-danger">Delete</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
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
