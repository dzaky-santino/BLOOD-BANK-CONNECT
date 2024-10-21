<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use Alert; // use RealRashid\SweetAlert\Facades\Alert;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dokter = Dokter::All();
        return view('admin.dokter.index', compact('dokter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $dokter = Dokter::All();
        return view('admin.dokter.create', compact('dokter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kontak' => 'required',
            'jk' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);
    
        $fileName = 'no_photo.jpg'; // Default image
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/image'), $fileName); 
        }
    
        Dokter::create([
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'jk' => $request->jk,
            'image' => $fileName,
        ]);
    
        // Alert::success('Success Title', 'Success Message');
        return redirect()->route('dokter.index')->with('success', 'Data Dokter Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $dokter = Dokter::findOrFail($id);
        return view('admin.dokter.edit', compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kontak' => 'required',
            'jk' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ],
        [
            'image.max'=> 'Foto Maksimal Berukuran 2MB',
            'image.mimes' => 'File Hanya Bisa Berekstensi jpg,png,jpeg',
            'image.image' => 'File Harus Berbentuk Image'
        ]
    );
    
        $dokter = Dokter::findOrFail($id);
        $fileName = $dokter->image;
    
        if ($request->hasFile('image')) {
            if ($dokter->image && $dokter->image !== 'no_photo.jpg' && file_exists(public_path('admin/image/' . $dokter->image))) {
                unlink(public_path('admin/image/' . $dokter->image)); // Delete the existing image file
            }
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/image'), $fileName); 
        }
    
        $dokter->update([
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'jk' => $request->jk,
            'image' => $fileName,
        ]);
    
        // Alert::success('Ubah Data', 'Data Dokter Berhasil Diubah');
        return redirect()->route('dokter.index')->with('success', 'Data Dokter Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        
        // Hapus foto jika bukan foto default dan jika ada di direktori public/admin/image
        if ($dokter->image !== 'no_photo.jpg' && file_exists(public_path('admin/image/' . $dokter->image))) {
            unlink(public_path('admin/image/' . $dokter->image));
        }
    
        $dokter->delete();
    
        return redirect()->route('dokter.index')->with('success', 'Data Dokter Berhasil Dihapus');
    }
}
