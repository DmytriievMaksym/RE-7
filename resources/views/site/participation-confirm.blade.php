@extends('app')
@section('title','Заявку надіслано')
@section('content')
    <div class="container py-4" style="max-width: 650px;">
        <h1 class="h3 fw-bold mb-2 text-uppercase border-start border-4 border-warning ps-3">Дані надіслано</h1>
        <p class="text-muted mb-4">Ви ввели такі дані:</p>

        <!--Перелічення даних користувача-->
        <div class="card border-0 shadow-sm bg-white p-4 rounded-3 mb-4">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
                    <span class="text-secondary fw-semibold">Ім'я</span>
                    <span class="fw-bold text-dark">{{$author}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
                    <span class="text-secondary fw-semibold">Email</span>
                    <span class="fw-bold text-dark">{{$email}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
                    <span class="text-secondary fw-semibold">Номер телефону</span>
                    <span class="fw-bold text-dark">{{$phone}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
                    <span class="text-secondary fw-semibold">Модель</span>
                    <span class="fw-bold text-dark">{{$model}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
                    <span class="text-secondary fw-semibold">Категорія</span>
                    <span class="badge bg-dark text-warning">{{$category}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
                    <span class="text-secondary fw-semibold">Масштаб</span>
                    <span class="badge bg-secondary font-monospace">{{$scale}}</span>
                </li>
            </ul>
        </div>

        <button type="button" class="btn btn-warning fw-bold text-dark px-4 py-2 w-100 shadow-sm">
            <a href="{{route('main')}}" class="text-dark text-decoration-none d-block">Повернутися на головну</a>
        </button>
    </div>
@endsection
