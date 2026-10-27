@extends('app')
@section('title', 'Статистика відвідувань')
@section('content')
    <div class="container py-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h1 class="h3 fw-bold mb-1 text-dark">
                    <i class="bi bi-fire text-danger me-2"></i>Моделі за популярністю
                </h1>
                <p class="text-secondary small mb-0">Рейтинг переглядів карток експонатів виставки</p>
            </div>

            <a href="{{ route('stats.pages') }}" class="btn btn-outline-secondary rounded-pill px-3 shadow-sm">
                <i class="bi bi-arrow-left me-1"></i>До загальної статистики
            </a>
        </div>

        <div class="card shadow-sm border-0 rounded-4 overflow-hidden bg-white mb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-uppercase small text-secondary">
                    <tr>
                        <th class="ps-4 py-3" style="width: 25%;">ID моделі</th>
                        <th class="text-center py-3" style="width: 35%;">Звернень</th>
                        <th class="pe-4 text-end py-3" style="width: 40%;">Останній візит</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($rows as $row)
                        @php
                            // Витягуємо числовий ID експоната з URL
                            preg_match('/model\/(\d+)/', $row->page, $matches);
                            $modelId = $matches[1] ?? $row->page;
                        @endphp
                        <tr>
                            <td class="ps-4">
                                <a href="{{ route('stats.detail', ['type' => 'page', 'item' => $row->page]) }}"
                                   class="btn btn-sm btn-outline-primary fw-bold font-monospace px-3 rounded-pill">
                                    #{{ $modelId }}
                                    <i class="bi bi-box-arrow-up-right ms-1 small"></i>
                                </a>
                            </td>

                            <td class="text-center">
                            <span class="badge bg-warning text-dark rounded-pill px-3 py-2 fw-bold fs-6">
                                <i class="bi bi-eye-fill me-1"></i>{{ $row->hits }}
                            </span>
                            </td>

                            <td class="pe-4 text-end text-muted small font-monospace">
                                {{ $row->last_visit }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-2 d-block mb-2 text-secondary"></i>
                                Даних ще немає.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            @if($rows->hasPages())
                <div class="card-footer bg-white border-top py-3 px-4 d-flex justify-content-center">
                    {{ $rows->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
