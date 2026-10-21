@extends('app')

@section('title', $model->name . ' — Scale Models Expo')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">

                {{-- Навігація --}}
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('model.index') }}" class="text-decoration-none text-secondary">
                                <i class="bi bi-collection me-1"></i>Каталог моделей
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">
                            {{ $model->name }}
                        </li>
                    </ol>
                </nav>

                {{-- Картка моделі --}}
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-4">

                    <div class="card-header bg-dark text-white py-3 px-4 d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-shield-check text-warning fs-4"></i>
                            <div>
                                <h4 class="mb-0 fw-bold text-uppercase tracking-wide">{{ $model->name }}</h4>
                                <small class="text-secondary">Картка моделі #{{ $model->id }}</small>
                            </div>
                        </div>
                        <span class="badge bg-warning text-dark px-3 py-2 fw-bold fs-6 rounded-pill">
                        {{ $model->scale }}
                    </span>
                    </div>

                    <div class="card-body p-4 p-md-5 bg-white">

                        {{-- Номінації --}}
                        <div class="mb-4 pb-3 border-bottom">
                        <span class="text-secondary small fw-bold text-uppercase d-block mb-2">
                            <i class="bi bi-tags-fill me-1 text-warning"></i>Номінації та категорії:
                        </span>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($model->categories as $category)
                                    <span class="badge bg-light text-dark border px-3 py-2 rounded-3 fw-semibold">
                                    <i class="bi bi-check2-circle text-warning me-1"></i>{{ $category }}
                                </span>
                                @endforeach
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-sm-6">
                                <div class="p-3 bg-light rounded-3 border h-100">
                                    <span class="text-secondary small fw-bold text-uppercase d-block">Масштаб</span>
                                    <span class="fs-5 fw-bold text-dark">{{ $model->scale }}</span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="p-3 bg-light rounded-3 border h-100">
                                    <span class="text-secondary small fw-bold text-uppercase d-block">Автор моделі</span>
                                    <div class="d-flex align-items-center gap-2 mt-1">
                                        <i class="bi bi-person-circle text-secondary fs-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Панель кнопок --}}
                    <div class="card-footer bg-light px-4 py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <a href="{{ route('model.index') }}" class="btn btn-outline-secondary px-3 py-2 rounded-3">
                            <i class="bi bi-arrow-left me-1"></i> До списку моделей
                        </a>

                        <div class="d-flex gap-2">
                            <a href="{{ route('model.edit', $model) }}" class="btn btn-warning text-dark fw-bold px-3 py-2 rounded-3 shadow-sm">
                                <i class="bi bi-pencil-square me-1"></i> Редагувати
                            </a>

                            {{-- Безпечна форма видалення з підтвердженням --}}
                            <form method="POST" action="{{ route('model.destroy', $model) }}" onsubmit="return confirm('Ви впевнені, що хочете видалити експонат «{{ addslashes($model->name) }}»?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger px-3 py-2 rounded-3">
                                    <i class="bi bi-trash3-fill me-1"></i> Видалити
                                </button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
