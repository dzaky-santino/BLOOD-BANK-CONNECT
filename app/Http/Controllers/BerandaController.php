<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\Tranfusi;
use Illuminate\Http\Request;
use App\Models\BankDarah;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    //
    public function index()
    {
        $bankDarah = BankDarah::All();
        return view('user.home', compact('bankDarah'));
    }

    public function pelayanan()
    {
        return view('user.pelayanan');
    }

    public function tentang_kami()
    {
        return view('user.tentang_kami');
    }
    public function riwayat_donor()
    {
        $user = Auth::user();

        $donor = Donor::where('id_user', $user->id)->get();

        return view('user.Riwayat.riwayat_donor', compact('donor'));
    }
    public function riwayat_tranfusi()
    {
        $user = Auth::user();

        $tranfusi = Tranfusi::where('id_user', $user->id)->get();

        return view('user.Riwayat.riwayat_tranfusi', compact('tranfusi'));
    }
}
