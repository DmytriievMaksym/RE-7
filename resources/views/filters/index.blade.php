@extends('layouts.app')
@section('title', 'Фільтри')
@section('content')
    <h1>Фільтри</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Назва</th>
            </tr>
        </thead>
        <tbody>
        @foreach($filters as $filter)
            <tr>
                <td><p>{{$filter->filter_id}}</p></td>
                <td><p>{{$filter->filter_name}}</p></td>
                <td>
                    <a href="{{ route('filters.edit', $filter->filter_id) }}" class="btn btn-sm btn-outline-warning text-dark px-2 py-1 rounded-2 shadow-sm" title="Редагувати фільтр">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
        {{ $filters->links() }}
    </table>

@endsection
