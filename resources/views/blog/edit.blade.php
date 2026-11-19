@extends('app')
@section('title','Редагування блогу')

@section('content')
    <h1>Редагування блогу</h1>
    <form method="POST" action="{{route('blog.update',$blog)}}">@csrf
        @method("PUT")
        @include('blog._form')
        <button type="submit">Зберегти зміни</button>
    </form>
@endsection
