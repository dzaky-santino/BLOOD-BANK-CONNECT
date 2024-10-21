@extends('admin.layouts.app')
@section('konten')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Golongan Darah</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="#" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="text" class="form-control" name="gol_darah" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Golongan Darah" style="margin-bottom: 8px">
                  <input type="text" class="form-control" name="stok" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Stok Darah">
                  <div class="modal-footer">
                      <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

<main id="main" class="main">
    <div class="pagetitle">
      <h1><a href="{{url('admin/dashboard')}}"><i class="ri-arrow-left-s-line"></i></a>Bank Darah</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Bank Darah</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="card-title"><a href="" class="btn btn-md btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-square-plus"></i> Tambah Data</a></div>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Golongan Darah</th>
                    <th>Stok Darah</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($bankDarah as $bd)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$bd->gol_darah}}</td>
                        <td>{{$bd->stok}}</td>
                        <td>
                          <a href="{{route('bank_darah.edit', $bd->id)}}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                          
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$bd->id}}"><i class="fa-solid fa-trash-can"></i></button>

                          <!-- Modal -->
                          <div class="modal fade" id="deleteModal{{$bd->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          Apakah Anda Yakin Akan Menghapus Data {{$bd->gol_darah}}?
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                          <form action="{{ route('bank_darah.destroy', $bd->id) }}" method="POST">
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
