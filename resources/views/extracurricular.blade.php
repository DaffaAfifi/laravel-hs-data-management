@extends('layouts.mainlayout')

@section('title', 'Extracurricular')

@section('content')
    <h1>Extracurricular List</h1>
    <div class="my-3 ms-1">
        <a href="" class="btn btn-dark">New Extracurricular</a>
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
            @foreach ($ekskulList as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td><a href="ekskuld/{{$item->id}}">detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection