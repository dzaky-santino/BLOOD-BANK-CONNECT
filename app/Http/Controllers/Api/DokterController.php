<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DokterController extends Controller
{
    // Menampilkan semua data dokter
    public function index()
    {
        $doctors = Dokter::all();
        return response()->json($doctors);
    }

    // Menambahkan data dokter baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kontak' => 'required',
            'jk' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        try {
            $dokter = Dokter::create([
                'nama' => $request->nama,
                'kontak' => $request->kontak,
                'jk' => $request->jk,
                'image' => $request->file('image') ? $request->file('image')->store('images', 'public') : null
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Data Dokter Berhasil Ditambahkan',
                'data' => $dokter
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Menampilkan data dokter berdasarkan ID
    public function show($id)
    {
        $doctor = Dokter::find($id);
        if (is_null($doctor)) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }
        return response()->json($doctor);
    }

    // Mengupdate data dokter berdasarkan ID
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kontak' => 'required',
            'jk' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
            ]);
            if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
         $dokter = Dokter::whereId($id);
         $dokter->update([
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'jk' => $request->jk,
            'image' => $request->file('image') ? $request->file('image')->store('images', 'public') : null
            ]);
          return response()->json([
              'success' => true,
              'message' => 'Data Dokter Berhasil Diubah',
              'data' => $dokter->get()
          ], 200);          
    }

    // Menghapus data dokter berdasarkan ID
    public function destroy($id)
    {
        $doctor = Dokter::find($id);
        if (is_null($doctor)) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }
        $doctor->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Dokter Berhasil Dihapus',
            'data' => $doctor
        ], 200);
    }
}
