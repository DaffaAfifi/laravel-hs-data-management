<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassRoom;

class ClassController extends Controller
{
    public function index(){
        // join nested 3 tabel
        // $class = ClassRoom::with('students','teachers')->get();
        $class = ClassRoom::get();
        return view('classroom', ['classList' => $class]);
    }

    public function show($id){
        $class = ClassRoom::with('students','teachers')->findOrFail($id);
        return view('classroom-detail', ['class' => $class]);
    }
}
