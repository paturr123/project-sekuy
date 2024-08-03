<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MapelController extends Controller
{
    public function mapel(Request $request){
        $search = $request->input('search');
        $mapels = Mapel::all();        
        $kelas = kelas::all();

        $mapels = Mapel::query()
        ->where('mata_pelajaran','like','%'.$search.'%')
        ->orWhere('keterangan','like','%'.$search.'%')
        ->get();

        return view('mapel', compact('mapels', 'kelas'));
    }

    public function tambahmapel(Request $request){
        Mapel::create($request->all());
        return redirect()->route('mapel')->with('success', 'Data Berhasil Anda Tambahkan');
    }

    public function editmapel(Request $request, $id){
        $mapels = Mapel::find($id);
        return view("editmapel",compact("mapels"));        
    }

    public function updatemapel(Request $request, $id){
        $mapels = Mapel::find($id);
        $mapels->update($request->all());
        return redirect()->route('mapel')->with('success', 'Data Berhasil Anda Update');
    }

    public function buang($id){
        $mapels = Mapel::find($id);
        $mapels->delete();
        return redirect()->route('mapel')->with('success', 'Data Berhasil Anda Delete');
    }

    // AJAX

    public function storeAjax(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'mata_pelajaran' => 'required',
            'keterangan' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create post
        $mapel = Mapel::create([
            'mata_pelajaran' => $request->mata_pelajaran,
            'keterangan' => $request->keterangan
        ]);

         // Prepare response data
        $response = [
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data' => [
                'id' => $mapel->id,
                'mata_pelajaran' => $mapel->mata_pelajaran,
                'keterangan' => $mapel->keterangan,
            ],
        ];

        // Return response
        return response()->json($response);
    }

    // public function show($id)
    // {
    //     // Mengambil data Mapel berdasarkan ID
    //     $mapel = Mapel::find($id);

    //     // Memeriksa apakah data ditemukan
    //     if (!$mapel) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Data Tidak Ditemukan!',
    //         ], 404);
    //     }

    //     // Menyiapkan data respons
    //     $response = [
    //         'success' => true,
    //         'data' => [
    //             'id' => $mapel->id,
    //             'mata_pelajaran' => $mapel->mata_pelajaran,
    //             'keterangan' => $mapel->keterangan,
    //         ],
    //     ];

    //     // Mengembalikan respons JSON
    //     return response()->json($response);


    // }

    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        return response()->json($mapel);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mata_pelajaran' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        $mapel = Mapel::findOrFail($id);
        $mapel->mata_pelajaran = $request->mata_pelajaran;
        $mapel->keterangan = $request->keterangan;
        $mapel->save();

        return response()->json(['message' => 'Mapel updated successfully']);
    }


    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return response()->json(['message' => 'Mapel deleted successfully']);
    }



}
