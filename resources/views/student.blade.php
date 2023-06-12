@extends('layouts.mainlayout')

@section('title', 'Students')

@section('content')
    <h1>Student List</h1>
    <div class="my-3 ms-1 me-2 d-flex justify-content-between">
        <a href="students-add" class="btn btn-dark">New Student</a>
        <a href="students-deleted" class="btn btn-info">Deleted Data</a>
    </div>
    <div class="my-3 ms-1 me-2">
        <form action="" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="keyword" placeholder="Type here...">
                <button class="input-group-text btn btn-dark">Search</button>
            </div>
        </form>
    </div>

    @if(Session::has('status'))
        <div class="alert alert-success ms-1 my-3" role="alert">
            {{Session::get('message')}}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Gender</th>
                <th>NIM</th>
                <th>Class</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studentList as $item)
            <tr>
                <td>{{$loop->iteration + $studentList->firstItem() - 1}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->gender}}</td>
                <td>{{$item->nim}}</td>
                <td>{{$item->class['name']}}</td>
                <td>
                    <a href="student/{{$item->slug}}">detail</a>
                    <a href="students-edit/{{$item->id}}">edit</a>
                    <a href="students-delete/{{$item->id}}">delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="my-4 ms-2 me-2">
        {{$studentList->withQueryString()->links()}}
    </div>

    <x-alert message='ini student page dek!' type='success' />
@endsection