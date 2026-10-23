@extends('app')

@section('title', 'Таблиця затверджених моделей — Scale Models Expo')

@section('content')
    <div class="container py-4">

        {{-- Верхня панель --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h2 class="fw-bold text-dark mb-1 text-uppercase tracking-wide">
                    <i class="bi bi-collection-fill text-warning me-2"></i>Затверджені моделі
                </h2>
                <p class="text-secondary small mb-0">
                    Реєстр зареєстрованих моделей
                </p>
            </div>
            <a href="{{ route('model.create') }}" class="btn btn-warning text-dark fw-bold px-4 py-2 rounded-3 shadow-sm">
                <i class="bi bi-plus-circle-fill me-1"></i> Додати модель
            </a>
        </div>


        {{--Фільтри--}}
        <div class="card shadow-sm border-0 rounded-4 mb-4">
            <div class="card-body p-3 bg-white">
                <form method="GET" action="{{ route('model.index') }}" id="filterForm" onchange="this.submit()">
                    <div class="row g-3">
                        {{--Масштаб--}}
                        <div class="col-md-3">
                            <label for="scaleFilter" class="form-label fw-semibold text-secondary small text-uppercase">
                                Масштаб:
                            </label>
                            <select name="scale" id="scaleFilter" class="form-select form-select-sm">
                                <option value="">Всі масштаби</option>
                                @foreach($scales as $scaleOption)
                                    <option value="{{ $scaleOption }}" {{ request('scale') === $scaleOption ? 'selected' : '' }}>
                                        {{ $scaleOption }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{--Категорії--}}
                        <div class="col-md-9">
                            <label class="form-label fw-semibold text-secondary small text-uppercase d-block">
                                Категорії:
                            </label>

                            <div class="d-flex flex-wrap gap-2">
                                @foreach($categories as $category)
                                    @php
                                        $catVal = is_object($category) && isset($category->value) ? $category->value : (string)$category;
                                        $label = method_exists($category, 'label') ? $category->label() : $catVal;
                                        $selected = (array) request('categories', []);
                                        $isChecked = in_array($catVal, $selected);
                                    @endphp

                                    <div class="form-check form-check-inline m-0">
                                        <input
                                            class="btn-check"
                                            type="checkbox"
                                            name="categories[]"
                                            id="filter_cat_{{ $loop->index }}"
                                            value="{{ $catVal }}"
                                            {{ $isChecked ? 'checked' : '' }}
                                        >
                                        <label class="btn btn-sm {{ $isChecked ? 'btn-warning text-dark fw-bold' : 'btn-outline-secondary' }} rounded-pill px-3" for="filter_cat_{{ $loop->index }}">
                                            {{ $label }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-4">
            <div class="card-header bg-dark text-white py-3 px-4 d-flex justify-content-between align-items-center">
                <span class="fw-semibold text-uppercase small text-light">Список моделей</span>
                <span class="badge bg-warning text-dark px-3 py-1 fw-bold rounded-pill">
                Усього: {{ $models->total()}}
                </span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light border-bottom">
                    <tr class="text-secondary small text-uppercase">
                        <th scope="col" class="ps-4" style="width: 70px;">ID</th>
                        <th scope="col">Назва / Прототип</th>
                        <th scope="col" style="width: 110px;">Масштаб</th>
                        <th scope="col">Номінації та категорії</th>
                        <th scope="col" style="width: 140px;">ID автора</th>
                        <th scope="col" class="text-end pe-4" style="width: 60px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($models as $model)
                        <tr>
                            <td class="ps-4 fw-semibold text-muted">
                                #{{ $model->id }}
                            </td>

                            <td>
                                <a href="{{ route('model.show', $model) }}" class="text-decoration-none fw-bold text-dark hover-warning">
                                    {{ $model->name }}
                                </a>
                            </td>

                            <td>
                                <span class="badge bg-secondary-subtle text-dark border px-2 py-1 rounded-2">
                                    {{ $model->scale }}
                                </span>
                            </td>

                            <td>
                                <div class="d-flex flex-wrap gap-1">
                                    @foreach($model->categories as $category)
                                        <span class="badge bg-light text-dark border px-2 py-1 rounded-pill small">
                                            <i class="bi bi-tag text-warning me-1"></i>{{ $category }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>

                            <td>
                                <span class="badge bg-light text-secondary border px-2 py-1">
                                    <i class="bi bi-person me-1"></i>{{ $model->author_id }}
                                </span>
                            </td>

                            <td class="text-end pe-4">
                                <a href="{{ route('model.edit', $model) }}" class="btn btn-sm btn-outline-warning text-dark px-2 py-1 rounded-2 shadow-sm" title="Редагувати модель">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Пагінація --}}
            <div class="card-footer bg-white border-top py-3 px-4 d-flex justify-content-center pagination-wrapper">
                {{ $models->links() }}
            </div>
        </div>
    </div>
@endsection
