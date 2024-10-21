<?php

namespace App\Http\Controllers;

use App\Models\BankDarah;
use App\Models\Dokter;
use App\Models\Donor;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class DonorController extends Controller
{
    public function index_regist_donor()
    {
        $bank_darahs = BankDarah::all();
        $jadwals = Jadwal::all();

        return view('user.Regist.regist_donor', compact('bank_darahs', 'jadwals'));
    }

    public function store_regist_donor(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_jadwal' => 'required',
            'nomor_hp' => 'required|min:12',
            'id_bank_darah' => 'nullable|exists:bank_darah,id', // Validasi untuk id_bank_darah
        ]);

        Donor::create([
            'id_user' => $request->id_user,
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_bank_darah' => $request->id_bank_darah,
            'id_jadwal' => $request->id_jadwal,
            'nomor_hp' => $request->nomor_hp,
            'id_dokter' => $request->id_dokter,
        ]);

        Alert::success('Hore!', 'Kamu berhasil mendaftar');
        return Redirect::back();
    }

    public function input_doctor(Request $request, $id)
    {
        $request->validate([
            'id_dokter' => 'nullable|exists:dokter,id', // Validasi untuk id_dokter
            'id_bank_darah' => 'nullable|exists:bank_darah,id', // Validasi untuk id_bank_darah
        ]);

        $donor = Donor::findOrFail($id); // Temukan donor berdasarkan $id

        $dataToUpdate = [];
        if ($request->has('id_dokter')) {
            $dataToUpdate['id_dokter'] = $request->id_dokter;
        }
        if ($request->has('id_bank_darah')) {
            $dataToUpdate['id_bank_darah'] = $request->id_bank_darah;
        }

        $donor->update($dataToUpdate);

        Alert::success('Hore!', 'Data berhasil diperbarui');
        return Redirect::back();
    }

    public function index_admin_pendonor()
    {
        $donors = Donor::all();
        $dokters = Dokter::all();
        $bank_darahs = BankDarah::all();
        return view('admin.pendonor.index', compact('donors', 'dokters', 'bank_darahs'));
    }

    public function delete_donor($id)
    {
        $donor = Donor::findOrFail($id);
        $donor->delete();

        Alert::success('Berhasil!', 'Data donor telah dihapus');
        return Redirect::back();
    }
}
