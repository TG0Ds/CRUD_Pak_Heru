<?php

namespace App\Http\Controllers;

use App\Models\Nama_Kamar;
use App\Models\Jenis_Kamar;
use Illuminate\Http\Request;

class NamaKamar extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nama_kamar = Nama_Kamar::with('jenisKamar')->oldest()->get();
        return view('nama_kamar.index', compact('nama_kamar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_kamar = Jenis_Kamar::select('id','nama_jenis')
            ->orderBy('nama_jenis')
            ->get();

        return view('nama_kamar.create', compact('jenis_kamar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_kamar' => ['required','string','max:255','unique:nama_kamar,nomor_kamar'],
            'jenis_kamar_id' => ['required','integer','exists:jenis_kamar,id'], 
        ]);

        Nama_Kamar::create([
            'nomor_kamar' => $validated['nomor_kamar'],
            'jenis_kamar_id' => $validated['jenis_kamar_id'],
        ]);

        return redirect()->route('nama_kamar.index')
            ->with('message','Nama Kamar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nama_Kamar $nama_kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nama_Kamar $nama_kamar)
    {

        $jenis_kamar = Jenis_Kamar::select('id','nama_jenis')
            ->orderBy('nama_jenis')
            ->get();

        return view('nama_kamar.edit', compact('nama_kamar', 'jenis_kamar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nama_Kamar $nama_kamar)
    {
        $data = $request->validate([
            'nomor_kamar' => ['required','string','max:255','unique:nama_kamar,nomor_kamar,'.$nama_kamar->id],   
            'jenis_kamar_id' => ['required','integer','exists:jenis_kamar,id'],
        ]);

        $nama_kamar->update($data);

        return redirect()->route('nama_kamar.index')
            ->with('message','Nama Kamar berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nama_Kamar $nama_kamar)
    {
        $nama_kamar = Nama_Kamar::findOrFail($nama_kamar->id);
        $nama_kamar->delete();

        return redirect()->route('nama_kamar.index')
            ->with('message','Nama Kamar berhasil dihapus');    
    }
}
