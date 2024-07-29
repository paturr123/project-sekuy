<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

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
}
