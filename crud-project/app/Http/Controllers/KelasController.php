<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KelasController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');
        $kelas = Kelas::all();        

        $kelas = Kelas::query()
                ->where('nama_kelas','like','%'.$search.'%')
                ->orWhere('jurusan','like','%'.$search.'%')
                ->get();
        return view('index', compact('kelas'));
    }

    public function insertdata(Request $request){
        Kelas::create($request->all());
        return redirect()->route('index')->with('success', 'Data Berhasil Anda Tambahkan');
    }

    public function tampildata($id){
        $kelas = Kelas::find($id);        
        return view('tampildata', compact('kelas'));
    }

    public function updatedata(Request $request, $id){
        $kelas = Kelas::find($id);
        $kelas->update($request->all());
        return redirect()->route('index')->with('success', 'Data Berhasil Anda Update');
    }

    public function delete($id){
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect()->route('index')->with('success', 'Data Berhasil Anda Delete');
    }  
    
}
