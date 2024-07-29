<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;

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
}
