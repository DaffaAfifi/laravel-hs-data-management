@extends('layouts.mainlayout')

@section('title', 'New Students')

@section('content')
    <h2>Edit student data here.</h2>
    <div class="mt-3 col-3 ms-2">
        <form action="/student/{{$student->id}}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$student->name}}" required>
            </div>
            <div class="mb-2">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="{{$student->gender}}">{{$student->gender}}</option>
                    @if ($student->gender == 'L')
                        <option value="P">P</option>
                    @else
                    <option value="L">L</option>
                    @endif
                </select>
            </div>
            <div class="mb-2">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="{{$student->nim}}" required>
            </div>
            <div class="mb-4    ">
                <label for="class">Class Room</label>
                <select name="class_id" id="class" class="form-control" required>
                    <option value="{{$student->class->id}}">{{$student->class->name}}</option>
                    @foreach ($class as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection