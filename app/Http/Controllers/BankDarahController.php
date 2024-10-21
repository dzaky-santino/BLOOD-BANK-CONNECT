<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankDarah;
use Alert;

class BankDarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bankDarah = BankDarah::All();
        return view('admin.bank_darah.index', compact('bankDarah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'gol_darah' => 'required|string|max:255',
            'stok' => 'required|numeric',
        ],
        [
            'stok.numeric' => 'Stok Harus Angka' 
        ]
    );
    
        // Simpan data ke database
        $bankDarah = new BankDarah();
        $bankDarah->gol_darah = $request->gol_darah;
        $bankDarah->stok = $request->stok;
        $bankDarah->save();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('bank_darah.index')->with('success', 'Data Berhasil Ditambahkan');
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
    public function edit(string $id)
    {
        //
        $bankDarah = BankDarah::findOrFail($id);
        return view('admin.bank_darah.edit', compact('bankDarah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'gol_darah' => 'required|string|max:255',
            'stok' => 'required|integer',
        ]);
    
        $bankDarah = BankDarah::findOrFail($id);
        $bankDarah->gol_darah = $request->gol_darah;
        $bankDarah->stok = $request->stok;
        $bankDarah->save();
    
        return redirect()->route('bank_darah.index')->with('success', 'Data Berhasil Diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bankDarah = BankDarah::findOrFail($id);
        $bankDarah->delete();
    
        return redirect()->route('bank_darah.index')->with('success', 'Data Berhasil Dihapus');
    }
    
}
