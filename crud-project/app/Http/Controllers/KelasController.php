<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    // AJAX
    public function storeAjax(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required',
            'jurusan' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create post
        $kelas = Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'jurusan' => $request->jurusan
        ]);

        // Fetch the total number of students (assuming a relationship is defined)
        $jumlah_siswa = $kelas->murid()->count(); // Gunakan method count() pada relationship

         // Prepare response data
        $response = [
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data' => [
                'id' => $kelas->id,
                'no' => $kelas->id, // Adjust based on your actual implementation
                'nama_kelas' => $kelas->nama_kelas,
                'jurusan' => $kelas->jurusan,
                'jumlah_siswa' => $jumlah_siswa, // Ensure this is correctly computed
            ],
        ];

        // Return response
        return response()->json($response);
    }
    
}
