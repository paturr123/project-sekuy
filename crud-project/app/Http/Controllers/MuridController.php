<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\Murid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MuridController extends Controller
{
    public function murid(Request $request){
        $search = $request->input('search');
        $murids = Murid::all();
        $kelas = Kelas::all();

        $murids = Murid::query()
                ->where('nis','like','%'.$search.'%')
                ->orWhere('nama_murid','like','%'.$search.'%')
                ->orWhere('kelas_id','like','%'.$search.'%')
                ->get();
        return view("murid",compact('murids', 'kelas'));
    }

    public function editmurid($id){
        $murids = Murid::find($id);
        $kelas = kelas::all();
        return view('editmurid',compact('murids', 'kelas'));
    }

    public function tambahdata(Request $request){
        Murid::create($request->all());
        return redirect()->route('murid')->with('success', 'Data Berhasil Anda Tambahkan');
    }

    public function updatemurid(Request $request, $id){
        $murids = Murid::find($id);
        $murids->update($request->all());
        return redirect()->route('murid')->with('success', 'Data Berhasil Anda Update');
    }

    public function hapus($id){
        $murids = Murid::find($id);
        $murids->delete();
        return redirect()->route('murid')->with('success', 'Data Berhasil Anda Delete');
    }

    // AJAX
    public function storeAjax(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'nis' => 'required',
            'nama_murid' => 'required',
            'kelas_id' =>  'required|exists:kelas,id',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create post
        $murid = Murid::create([
            'nis' => $request->nis,
            'nama_murid' => $request->nama_murid,
            'kelas_id' => $request->kelas_id,
        ]);

        // Prepare response data
        $response = [
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data' => [
                'id' => $murid->id,
                'nis' => $murid->nis,
                'nama_murid' => $murid->nama_murid,
                'kelas_id' => $murid->kelas->nama_kelas,
                'jurusan' => $murid->kelas->jurusan,
            ],
        ];

        // Return response
        return response()->json($response);
    }

    public function show($id)
    {
        $murid = Murid::find($id);
        return response()->json($murid);
    }


    public function update(Request $request, $id)
    {
        $murid = Murid::findOrFail($id);

        // Update the Murid data
        $murid->nis = $request->input('nis');
        $murid->nama_murid = $request->input('nama_murid');
        $murid->kelas_id = $request->input('kelas_id');
        $murid->save();

        // Muat relasi kelas
        $murid->load('kelas');

        // Fetch related kelas and jurusan
        $kelas = $murid->kelas;
        $response = [
            'id' => $murid->id,
            'nis' => $murid->nis,
            'nama_murid' => $murid->nama_murid,
            'kelas' => [
                'kelas' => $murid->kelas->nama_kelas,
                'jurusan' => $murid->kelas->jurusan,
            ],
        ];

        return response()->json($response);
    }

    public function destroy($id)
    {
        $murid = Murid::findOrFail($id);
        $murid->delete();

        return response()->json(['message' => 'Data deleted successfully']);
    }


}
