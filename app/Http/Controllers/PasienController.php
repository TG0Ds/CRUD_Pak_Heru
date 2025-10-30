<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien; 
use App\Models\Nama_Kamar;
use App\Models\Jenis_Kamar;

class PasienController extends Controller 
{

    
    public function index()
    {
        $pasien = Pasien::with(['nama_kamar', 'nama_kamar.jenisKamar'])->oldest()->get();
        return view('pasien.index', compact('pasien')); 
    }

public function create()
{
    $nama_kamar = Nama_Kamar::select('id','nomor_kamar')
        ->orderBy('nomor_kamar')
        ->get();

    return view('pasien.create', compact('nama_kamar'));
}




    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'     => ['required','string','max:255'],
            'kamar_id' => ['required','integer','exists:nama_kamar,id'],
            'penyakit' => ['required','string','max:255'], 

        ]);

        Pasien::create([
            'nama'     => $validated['nama'],
            'kamar_id' => $validated['kamar_id'],
            'penyakit' => $validated['penyakit'],

        ]);

        return redirect()->route('pasien.index')
            ->with('message','Pasien berhasil ditambahkan');
    }

    public function show(string $id) { /* optional */ }

public function edit(string $id)
{
    $pasien = Pasien::findOrFail($id);

    $nama_kamar = Nama_Kamar::select('id','nomor_kamar')
        ->orderBy('nomor_kamar')
        ->get();

    return view('pasien.edit', compact('pasien', 'nama_kamar')); 

}



    public function update(Request $request, Pasien $pasien)
    {
        $data = $request->validate([
            'nama'     => ['required','string','max:255'],
            'kamar_id' => ['required','integer','exists:nama_kamar,id'],
            'penyakit' => ['required','string','max:255'],
        ]);

        $pasien->update($data);

        return redirect()->route('pasien.index')
            ->with('message','Pasien berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('pasien.index')
            ->with('message','Pasien berhasil dihapus');
    }
}
