@extends('admin.layouts.app')
@section('konten')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1><a href="{{ url('admin/dashboard') }}"><i class="ri-arrow-left-s-line"></i></a>Pendonor</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Data</li>
                    <li class="breadcrumb-item active">Pendonor</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kontak</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Golongan Darah</th>
                                        <th>Jadwal</th>
                                        <th>Dokter</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donors as $pendonor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pendonor->name }}</td>
                                        <td>{{ $pendonor->nomor_hp }}</td>
                                        <td>{{ $pendonor->jenis_kelamin }}</td>
                                        <td>{{ $pendonor->bankDarah ? $pendonor->bankDarah->gol_darah : 'Tidak diketahui' }}</td>
                                        <td>{{ $pendonor->jadwal->jadwal }}</td>
                                        <td>
                                            @if ($pendonor->id_dokter == null)
                                                <p class="text-muted fs-6 ">Belum pilih dokter</p>
                                            @else
                                                Dr. {{ $pendonor->dokter->nama }}
                                            @endif
                                        </td>                                            
                                        <td>
                                            <!-- Button trigger modal for update -->
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#inputDoctor-{{ $pendonor->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>

                                            <!-- Update Modal -->
                                            <div class="modal fade" id="inputDoctor-{{$pendonor->id}}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Dokter/Golongan Darah</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('update_donor', $pendonor->id) }}" method="post">
                                                            @method('patch')
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group mb-2">
                                                                    <label for="id_dokter" class="form-label">Pilih Dokter</label>
                                                                    <select class="form-select" id="id_dokter" name="id_dokter">
                                                                        <option value="" selected disabled>Pilih Dokter</option>
                                                                        @foreach ($dokters as $dokter)
                                                                            <option value="{{ $dokter->id }}" {{ $pendonor->id_dokter == $dokter->id ? 'selected' : '' }}>Dokter {{ $dokter->nama }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <label for="id_bank_darah" class="form-label">Pilih Golongan Darah</label>
                                                                    <select class="form-select" id="id_bank_darah" name="id_bank_darah">
                                                                        <option value="" selected disabled>Pilih Golongan Darah</option>
                                                                        @foreach ($bank_darahs as $bank_darah)
                                                                            <option value="{{ $bank_darah->id }}" {{ $pendonor->id_bank_darah == $bank_darah->id ? 'selected' : '' }}>{{ $bank_darah->gol_darah }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Kirim</button>
                                                            </div>
                                                        </form>                                                            
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Button trigger modal for delete -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteDonor-{{ $pendonor->id }}">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteDonor-{{ $pendonor->id }}" tabindex="-1" aria-labelledby="deleteDonorLabel-{{ $pendonor->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="deleteDonorLabel-{{ $pendonor->id }}">Konfirmasi Hapus</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus data donor ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('delete_donor', $pendonor->id) }}" method="post">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
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
