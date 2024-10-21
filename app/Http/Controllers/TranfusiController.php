<?php

namespace App\Http\Controllers;

use App\Models\BankDarah;
use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\Tranfusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class TranfusiController extends Controller
{
    public function index_regist_tranfusi()
    {
        $bank_darahs = BankDarah::all();
        $jadwals = Jadwal::all();

        return view('user.Regist.regist_tranfusi', compact('bank_darahs', 'jadwals'));
    }

    public function store_regist_tranfusi(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_jadwal' => 'required',
            'nomor_hp' => 'required|min:12',
        ]);

        Tranfusi::create([
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

    public function index_admin_tranfusi()
    {
        $tranfusies = Tranfusi::all();
        $dokters = Dokter::all();
        $bank_darahs = BankDarah::all();
        return view('admin.penerima.index', compact('tranfusies', 'dokters', 'bank_darahs'));
    }

    public function input_doctor(Request $request, $id)
    {
        $request->validate([
            'id_dokter' => 'nullable|exists:dokter,id', // Validasi untuk id_dokter
            'id_bank_darah' => 'nullable|exists:bank_darah,id', // Validasi untuk id_bank_darah
        ]);

        $tranfusi = Tranfusi::findOrFail($id); // Temukan donor berdasarkan $id

        $dataToUpdate = [];
        if ($request->has('id_dokter')) {
            $dataToUpdate['id_dokter'] = $request->id_dokter;
        }
        if ($request->has('id_bank_darah')) {
            $dataToUpdate['id_bank_darah'] = $request->id_bank_darah;
        }

        $tranfusi->update($dataToUpdate);

        Alert::success('Hore!', 'Data berhasil diperbarui');
        return Redirect::back();
    }

    public function delete_tranfusi($id)
    {
        $tranfusi = Tranfusi::findOrFail($id);
        $tranfusi->delete();

        Alert::success('Berhasil!', 'Data donor telah dihapus');
        return Redirect::back();
    }
}
