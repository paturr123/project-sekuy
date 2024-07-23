<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KelasController extends Controller
{
    public function index(){
        $kelas = Kelas::all();
        return view("index",compact("kelas"));        
    }
    
}
