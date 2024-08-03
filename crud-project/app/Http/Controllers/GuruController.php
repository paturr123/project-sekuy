<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    public function guru(Request $request){
        $search = $request->input('search');
        $gurus = Guru::all();

        $gurus = Guru::query()
        ->where('nama','like','%'.$search.'%')
        ->orWhere('nomor_induk','like','%'.$search.'%')
        ->orWhere('alamat','like','%'.$search.'%')
        ->orWhere('nomor_telephone','like','%'.$search.'%')
        ->get();
        return view('guru', compact('gurus'));
    }

    public function tambahguru(Request $request){
        Guru::create($request->all());
        return redirect()->route('guru')->with('success', 'Data Berhasil Anda Tambahkan');
    }

    public function editguru(Request $request, $id){
        $gurus = Guru::find($id);
        return view('editguru', compact('gurus'));
    }

    public function updateguru(Request $request, $id){
        $gurus = Guru::find($id);
        $gurus->update($request->all());
        return redirect()->route('guru')->with('success', 'Data Berhasil Anda Update');
    }

    public function hapusguru($id){
        $gurus = Guru::find($id);
        $gurus->delete();
        return redirect()->route('guru')->with('success', 'Data Berhasil Anda Delete');
    }


    // AJAX
    public function storeAjax(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nomor_induk' => 'required',
            'alamat' =>  'required',
            'nomor_telephone' =>  'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create post
        $guru = Guru::create([
            'nama' => $request->nama,
            'nomor_induk' => $request->nomor_induk,
            'alamat' => $request->alamat,
            'nomor_telephone' => $request->nomor_telephone
        ]);

         // Prepare response data
        $response = [
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data' => [
                'id' => $guru->id,
                'nama' => $guru->nama,
                'nomor_induk' => $guru->nomor_induk,
                'alamat' => $guru->alamat,
                'nomor_telephone' => $guru->nomor_telephone
            ],
        ];

        // Return response
        return response()->json($response);
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return response()->json($guru);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_induk' => 'required|integer',
            'alamat' => 'required|string|max:255',
            'nomor_telephone' => 'required|string|max:255',
        ]);

        $mapel = Guru::findOrFail($id);
        $mapel->nama = $request->nama;
        $mapel->nomor_induk = $request->nomor_induk;
        $mapel->alamat = $request->alamat;
        $mapel->nomor_telephone = $request->nomor_telephone;
        $mapel->save();

        return response()->json(['message' => 'Guru updated successfully']);
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return response()->json(['message' => 'Guru deleted successfully']);
    }


}
