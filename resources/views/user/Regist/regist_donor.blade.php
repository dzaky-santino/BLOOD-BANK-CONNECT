@extends('user.layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('user') }}/css/navbar.css">
@endsection

@section('container')
    @include('user.layouts.nav')
    <div class=" vh-100 d-flex justify-content-center align-items-center">
        <div class="">
            <img src="{{ asset('') }}" alt="">
            <div class="bg-danger p-3 rounded-3 text-white">
                <h5 class="text-white">Ayo! Donor Darah</h5>
                <form action="{{ route('store_regist_donor') }}" method="post">
                    @csrf
                    <input type="number" class="d-none" id="id_user" name="id_user" value="{{ Auth::user()->id }}">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ Auth::user()->name }}" required autofocus readonly>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="0" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki - laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_bank_darah" class="form-label">Golongan Darah</label>
                        <select class="form-select" id="id_bank_darah" name="id_bank_darah">
                            <option value="" selected>Pilih Golongan Darah</option>
                            @foreach ($bank_darahs as $bank_darah)
                                <option value="{{ $bank_darah->id }}">{{ $bank_darah->gol_darah }}</option>
                            @endforeach
                        </select>
                        <p class="text-wh mt-2" style="font-size: 12px">*Kosongkan jika tidak tau</p>
                    </div>

                    <div class="mb-3">
                        <label for="id_jadwal" class="form-label">Jadwal Donor</label>
                        <select class="form-select" id="id_jadwal" name="id_jadwal" required>
                            <option value="" selected disabled>Pilih Jadwal Donor</option>
                            @foreach ($jadwals as $jadwal)
                                <option value="{{ $jadwal->id }}">{{ $jadwal->jadwal }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="nomor_hp" class="form-label">Nomor HP</label>
                        <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar Donor</button>
                </form>
            </div>
        </div>

    </div>
@endsection
