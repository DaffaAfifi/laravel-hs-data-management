<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StudentCreateRequest;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        // join nested 3 tabel
        // $student = Student::with(['class.teachers', 'extracurriculars'])->get();
        $keyword = $request->keyword;

        $student = Student::with('class')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('gender', $keyword)
            ->orWhere('nim', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('class', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->paginate(15);
        return view('student', ['studentList' => $student]);
    }

    public function show($slug)
    {
        $student = Student::with(['class.teachers', 'extracurriculars'])->where('slug', $slug)->first();
        return view('student-detail', ['student' => $student]);
    }

    // public function massUpdate(){
    //     $student = Student::whereNull('slug')->get();
    //     collect($student)->map(function($item){
    //         $item->slug = Str::slug($item->name, '-');
    //         $item->save();
    //     });
    // }

    public function create()
    {
        $class = ClassRoom::select('id', 'name')->get();
        return view('student-add', ['class' => $class]);
    }

    public function store(StudentCreateRequest $request)
    {
        // internal validate
        // $validated = $request->validate([
        //     'nim' => 'unique:students|max:10|required',
        //     'name' => 'max:50|required',
        //     'gender' => 'required',
        //     'class_id' => 'required'
        // ]);

        // eksternal validate on line 29

        $studentm = new Student;

        // $studentm->name = $request->name;
        // $studentm->gender = $request->gender;
        // $studentm->nim = $request->nim;
        // $studentm->class_id = $request->class_id;
        // $studentm->save();

        //mass asignment
        $newName = '';
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('images', $newName);
        }

        $request['image'] = $newName;
        // $request['slug'] = $slug = Str::slug($request->name, '-');
        $studentm->create($request->all());
        if ($studentm) {
            Session::flash('status', 'success');
            Session::flash('message', 'add new student success!');
        }
        return redirect('/students');
    }

    public function edit(Request $request, $id)
    {
        $student = Student::with('class')->findOrFail($id);
        $class = ClassRoom::where('id', '!=', $student->class_id)->get(['id', 'name']);
        return view('students-edit', ['student' => $student, 'class' => $class]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nim = $request->nim;
        // $student->class_id = $request->class_id;
        // $student->save();

        $student->update($request->all());
        return redirect('/students');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('student-delete', ['student' => $student]);
    }

    public function destroy($id)
    {
        // querybuilder
        // $delete = DB::table('students')->where('id', $id)->delete();

        // eloquent
        $delete = Student::findOrFail($id);
        $delete->delete();

        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'delete student succes.');
        }

        return redirect('/students');
    }

    public function deleted()
    {
        $student = Student::onlyTrashed()->get();
        return view('student-deleted', ['student' => $student]);
    }

    public function restore($id)
    {
        $student = Student::withTrashed()->where('id', $id)->restore();

        if ($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'restore student succes.');
        }

        return redirect('/students');
    }
}
