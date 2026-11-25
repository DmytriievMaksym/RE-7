@extends('layouts.app')
@section('title','Створити блог')

@section('content')
    <h1>Створити блог</h1>
    <form method="POST" action="{{route('blog.store')}}">@csrf
        @include('blog._form')
        <button type="submit">Зберегти</button>
    </form>
@endsection
