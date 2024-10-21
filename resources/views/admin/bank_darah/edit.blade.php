@extends('admin.layouts.app')
@section('konten')

<main id="main" class="main">
    <div class="pagetitle">
      <h1><a href="{{url('admin/bank_darah')}}"><i class="ri-arrow-left-s-line"></i></a>Edit Bank Darah</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Edit Bank Darah</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Bank Darah</h5>

              <!-- Vertical Form -->
              <form action="{{ route('bank_darah.update', $bankDarah->id) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-12">
                  <label for="gol_darah" class="form-label">Golongan Darah</label>
                  <input type="text" class="form-control" id="gol_darah" name="gol_darah" value="{{ $bankDarah->gol_darah }}">
                </div>
                <div class="col-12">
                  <label for="stok" class="form-label">Stok Darah</label>
                  <input type="text" class="form-control" id="stok" name="stok" value="{{ $bankDarah->stok }}">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
        </div>
      </div>
    </section>
</main>
@endsection
