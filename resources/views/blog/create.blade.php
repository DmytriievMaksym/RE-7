@extends('app')
@section('title','Створити блог')

@section('content')
    <h1>Створити блог</h1>
    <form method="POST" action="{{route('model.store')}}">@csrf
        @include('model._form')
        <button type="submit">Зберегти</button>
    </form>
@endsection
