@extends('layouts.mainlayout')

@section('title', 'Teacher-Detail')

@section('content')
    <h2>Detail Teacher {{$teacher->name}}</h2>
    <table class="table table-bordered">
        <tr>
            <th>Class Homeroom</th>
            <th>Student</th>
        </tr>
        <tr>
            <td>
                @if ($teacher->class)
                    {{$teacher->class['name']}}
                @else
                    Not a Homeroom Teacher
                @endif
            </td>
            <td>
                @if ($teacher->class)
                    @foreach ($teacher->class->students as $item)
                        - {{$item['name']}} <br>
                    @endforeach
                @else
                    -
                @endif
            </td>
        </tr>
    </table>
@endsection