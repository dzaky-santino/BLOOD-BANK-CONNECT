@extends('user.layouts.main')


@section('container')
    @include('user.layouts.nav')

    <h4 class="text-center my-3">
        Riwayat Donor</h4>

    <div class="container">
        @foreach ($donor->reverse() as $riwayat)
            <div class="border border-2 border-grey  rounded p-4 mt-3">

                <p><span class="text-danger">{{ $riwayat->name }}</span></p>
                <p>{{ $riwayat->created_at }}</p>
                <p>Golongan Darah : @if ($riwayat->id_bank_darah === null)
                        menunggu diinputkan admin
                    @else
                        {{ $riwayat->bankDarah->gol_darah }}
                    @endif
                </p>
                <p>Dokter : @if ($riwayat->id_dokter === null)
                        menunggu diinputkan admin
                    @else
                        {{ $riwayat->dokter->nama }}
                    @endif
                </p>
            </div>
        @endforeach
    </div>
@endsection