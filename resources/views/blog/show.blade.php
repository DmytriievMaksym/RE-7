@extends('layouts.app')

@section('title',$blog->title)
@section('content')
    <h1>{{$blog->title}}</h1>
    <p><strong>ID:</strong>{{$blog->blog_id}}</p>
    <p><strong>Опис:</strong>{{$blog->description}}</p>
    <p><strong>Текст:</strong>{{$blog->text}}</p>
    <p><strong>Категорія:</strong>{{$blog->category?->category_name}}</p>
    <p><strong>Автор:</strong>{{$blog->author?->name ?? 'Редакція'}}</p>
    <p><strong>Опубліковано:</strong>{{$blog->dt_created->format('d.m.Y H:i')}}</p>
    <div class="tags">
        @forelse ($blog->filters as $filter)
            <span class="tag">
            {{ $filter->filter_name }}
            </span>
        @empty
            <span>Міток немає.</span>
        @endforelse
    </div>
    <p><a href="{{route('blog.edit',$blog)}}">Редагувати</a></p>
    <p><a href="{{route('blog.index')}}">Повернутися до списку</a></p>
    <form method="POST" action="{{route('blog.destroy',$blog)}}">@csrf
        @method('DELETE')
        <button type="submit">Видалити</button>
    </form>
@endsection
