@extends('layouts.mainlayout')

@section('title', 'Teachers')

@section('content')
    <h1>Teacher List</h1>
    <div class="my-3 ms-1">
        <a href="" class="btn btn-dark">New Teacher</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teacherList as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td><a href="teacherd/{{$item->id}}">detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection