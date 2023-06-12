@extends('layouts.mainlayout')

@section('title', 'Ekstracurricular-Detail')

@section('content')
    <h2>Detail Extracurricular {{$ekskul->name}}</h2>
    <table class="table table-bordered">
        <tr>
            <th>Extracurricular</th>
            <th>Student</th>
        </tr>
        <tr>
            <td>{{$ekskul->name}}</td>
            <td>
                @foreach ($ekskul->students as $item)
                    - {{$item['name']}} <br>
                @endforeach
            </td>
        </tr>
    </table>
@endsection