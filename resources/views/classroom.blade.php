@extends('layouts.mainlayout')

@section('title', 'Class')

@section('content')
    <h1>Class List</h1>
    <div class="my-3 ms-1">
        <a href="" class="btn btn-dark">New Class</a>
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
            @foreach ($classList as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td><a href="classd/{{$item->id}}">detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection