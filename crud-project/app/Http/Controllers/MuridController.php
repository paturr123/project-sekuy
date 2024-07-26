<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\Murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    public function murid(){
        $murids = Murid::all();
        $kelas = Kelas::all();
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
}
