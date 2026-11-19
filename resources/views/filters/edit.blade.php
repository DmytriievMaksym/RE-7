@extends('app')
@section('title','Редагування фільтра')
@section('content')
    <h1>Редагування фільтру</h1>
    <form method="POST" action="{{route('filters.update',$filter->filter_id)}}">@csrf
        @method("PUT")
        @include('filters._form')
        <button type="submit">Зберегти зміни</button>
    </form>
@endsection
