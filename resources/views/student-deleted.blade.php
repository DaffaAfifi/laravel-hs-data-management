@extends('layouts.mainlayout')

@section('title', 'Deleted-Students')

@section('content')
    <h4>Deleted students list.</h4>

    <div class="mx-1 my-3">
        <a href="/students" class="btn btn-primary">Back</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Gender</th>
                <th>NIM</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->gender}}</td>
                <td>{{$item->nim}}</td>
                <td>
                    <a href="student/{{$item->id}}/restore">restore</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection