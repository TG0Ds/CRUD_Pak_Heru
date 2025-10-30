<?php

namespace App\Http\Controllers;

use App\Models\Jenis_Kamar;
use Illuminate\Http\Request;

class JenisKamar extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis_kamar = Jenis_Kamar::oldest()->get();
        return view('jenis_kamar.index', compact('jenis_kamar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis_kamar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jenis' => ['required','string','max:255','unique:jenis_kamar,nama_jenis'],
            'harga_per_malam' => ['required','integer'],
        ]);

        Jenis_Kamar::create([
            'nama_jenis' => $validated['nama_jenis'],
            'harga_per_malam' => $validated['harga_per_malam'],
        ]);

        return redirect()->route('jenis_kamar.index')
            ->with('message','Jenis Kamar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis_Kamar $jenis_kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis_Kamar $jenis_kamar)
    {
        return view('jenis_kamar.edit', compact('jenis_kamar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jenis_Kamar $jenis_kamar)
    {
        $data = $request->validate([
            'nama_jenis' => ['required','string','max:255','unique:jenis_kamar,nama_jenis,'.$jenis_kamar->id],
            'harga_per_malam' => ['required','numeric', 'min:0'],
        ]);

        $jenis_kamar->update($data);

        return redirect()->route('jenis_kamar.index')
            ->with('message','Jenis Kamar berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis_Kamar $jenis_kamar)
    {
        $jenis_kamar = Jenis_Kamar::findOrFail($jenis_kamar->id);
        $jenis_kamar->delete();

        return redirect()->route('jenis_kamar.index')
            ->with('message','Jenis Kamar berhasil dihapus');
    }
}
