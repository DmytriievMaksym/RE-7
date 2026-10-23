@extends('app')

@section('title', 'Редагування моделі — Scale Models Expo')

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
                            Редагування моделі #{{ $model->id }}
                        </li>
                    </ol>
                </nav>

                {{-- Головна картка форми --}}
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                    {{-- Шапка картки --}}
                    <div class="card-header bg-dark text-white py-3 px-4 d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-pencil-square text-warning fs-5"></i>
                            <h5 class="mb-0 fw-bold text-uppercase tracking-wide">
                                Редагування моделі
                            </h5>
                        </div>
                        <span class="badge bg-warning text-dark px-3 py-2 fw-semibold rounded-pill">
                        {{ $model->scale ?? 'Експонат' }}
                    </span>
                    </div>

                    {{-- Тіло картки --}}
                    <div class="card-body p-4 p-md-5 bg-white">
                        <form method="POST" action="{{ route('model.update', $model) }}">
                            @csrf
                            @method("PUT")

                            {{-- Підключення форми з полями --}}
                            <div class="mb-4">
                                @include('model.form')
                            </div>

                            {{-- Кнопки --}}
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 pt-3 border-top">
                                <a href="{{ route('model.index') }}" class="btn btn-outline-secondary px-4 py-2 rounded-3">
                                    <i class="bi bi-arrow-left me-1"></i> Повернутися до списку моделей
                                </a>

                                <form method="POST" action="{{ route('model.destroy', $model) }}" onsubmit="return confirm('Ви впевнені, що хочете видалити експонат «{{ addslashes($model->name) }}»?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger px-3 py-2 rounded-3">
                                        <i class="bi bi-trash3-fill me-1"></i> Видалити
                                    </button>
                                </form>

                                <button type="submit" class="btn btn-warning text-dark fw-bold px-4 py-2 rounded-3 shadow-sm">
                                    <i class="bi bi-check-circle-fill me-1"></i> Зберегти зміни
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
