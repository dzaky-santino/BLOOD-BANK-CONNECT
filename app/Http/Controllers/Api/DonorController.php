<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonorController extends Controller
{
    public function index()
    {
        $donor = Donor::all();
        return response()->json($donor);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'id_jadwal' => 'required',
            'nomor_hp' => 'required|min:12',
            'id_bank_darah' => 'nullable|exists:bank_darah,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        try {
            $donor = Donor::create([
                'name' => $request->name,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_bank_darah' => $request->id_bank_darah,
                'id_jadwal' => $request->id_jadwal,
                'nomor_hp' => $request->nomor_hp,
                'id_dokter' => $request->id_dokter,
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Data Pendonor Berhasil Ditambahkan',
                'data' => $donor
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $donor = Donor::find($id);
        if (is_null($donor)) {
            return response()->json(['message' => 'Pendonor not found'], 404);
        }
        return response()->json($donor);
    }

    public function destroy($id)
    {
        $donor = Donor::find($id);
        if (is_null($donor)) {
            return response()->json(['message' => 'Pendonor not found'], 404);
        }
        $donor->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Pendonor Berhasil Dihapus',
            'data' => $donor
        ], 200);
    }
}
