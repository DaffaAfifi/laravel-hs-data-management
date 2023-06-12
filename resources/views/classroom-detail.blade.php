@extends('layouts.mainlayout')

@section('title', 'Class-Detail')

@section('content')
    <h2>Detail Kelas {{$class->name}}</h2>
    <table class="table table-bordered">
        <tr>
            <th>Homeroom Teacher</th>
            <th>Student</th>
        </tr>
        <tr>
            <td>{{$class->teachers['name']}}</td>
            <td>
                @foreach ($class->students as $item)
                    - {{$item['name']}} <br>
                @endforeach
            </td>
        </tr>
    </table>
@endsection