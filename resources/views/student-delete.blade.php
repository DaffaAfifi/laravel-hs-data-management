@extends('layouts.mainlayout')

@section('title', 'Students-Delete')

@section('content')
    <h4>Are you sure to delete {{$student->name}} data ?</h4>
    <div class="mx-2 my-3">
        <form action="/students-destroy/{{$student->id}}" method="post" style="display: inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="/students" class="btn btn-primary">Cancel</a>
    </div>
@endsection