<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extracurricular;

class ExtracurricularController extends Controller
{
    public function index(){
        // join 2 tabel
        // $ekskul = Extracurricular::with('students')->get();
        $ekskul = Extracurricular::get();
        return view('extracurricular', ['ekskulList' => $ekskul]);
    } 

    public function show($id){
        $ekskul = Extracurricular::with('students')->findOrFail($id);
        return view('extracurricular-detail', ['ekskul' => $ekskul]);
    }
}
