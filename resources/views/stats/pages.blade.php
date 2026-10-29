@extends('app')
@section('title', 'Статистика відвідувань')
@section('content')
    <div class="container py-4">
        {{-- Заголовок сторінки --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h1 class="h3 fw-bold mb-1 text-dark">
                    <i class="bi bi-bar-chart-line-fill text-warning me-2"></i>Статистика відвідувань
                </h1>
                <p class="text-secondary small mb-0">Зведена аналітика активності та переглядів сайту</p>
            </div>

            <div class="btn-group shadow-sm rounded-pill p-1 bg-white border" role="group" aria-label="Фільтри статистики">
                <a href="{{ route('stats.pages', ['type' => 'page']) }}"
                   class="btn btn-sm rounded-pill px-3 fw-semibold {{ $type === 'page' ? 'btn-warning text-dark' : 'btn-light text-secondary' }}">
                    <i class="bi bi-file-earmark-text me-1"></i>За сторінками
                </a>
                <a href="{{ route('stats.pages', ['type' => 'ip']) }}"
                   class="btn btn-sm rounded-pill px-3 fw-semibold {{ $type === 'ip' ? 'btn-warning text-dark' : 'btn-light text-secondary' }}">
                    <i class="bi bi-hdd-network me-1"></i>За IP-адресами
                </a>
                <a href="{{ route('stats.popular') }}"
                   class="btn btn-sm rounded-pill px-3 fw-semibold btn-light text-secondary">
                    <i class="bi bi-fire text-danger me-1"></i>Моделі за популярністю
                </a>
            </div>
        </div>

        <div class="card shadow-sm border-0 rounded-4 overflow-hidden bg-white">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-uppercase small text-secondary">
                    <tr>
                        <th class="ps-4 py-3" style="width: 25%;">{{ $type === 'page' ? 'Сторінка' : 'IP-адреса' }}</th>
                        <th class="text-center py-3" style="width: 15%;">Звернень</th>
                        <th class="text-center py-3" style="width: 15%;">Тип звернення</th>
                        <th class="py-3" style="width: 25%;">Маршрут (Referer)</th>
                        <th class="pe-4 text-end py-3" style="width: 20%;">Останній візит</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($rows as $row)
                        <tr>
                            <td class="ps-4">
                                <a href="{{ route('stats.detail', ['type' => $type, 'item' => $row->{$type}]) }}"
                                   class="text-decoration-none fw-semibold font-monospace text-primary">
                                    {{ $row->{$type} }}
                                    <i class="bi bi-box-arrow-up-right ms-1 small text-muted"></i>
                                </a>
                            </td>

                            <td class="text-center">
                            <span class="badge bg-warning text-dark rounded-pill px-3 py-2 fw-bold fs-6">
                                <i class="bi bi-eye-fill me-1"></i>{{ $row->hits }}
                            </span>
                            </td>

                            <td class="text-center">
                                {{--Колір тексту в залежності від методу--}}
                                @php
                                    $methodClass = match($row->method) {
                                        'POST' => 'bg-primary',
                                        'PUT', 'PATCH' => 'bg-info text-dark',
                                        'DELETE' => 'bg-danger',
                                        default => 'bg-secondary',
                                    };
                                @endphp
                                <span class="badge {{ $methodClass }} font-monospace px-2 py-1">
                                {{ $row->method ?? 'GET' }}
                            </span>
                            </td>

                            <td>
                                @if($row->referer)
                                    <span class="text-truncate d-inline-block text-secondary small" style="max-width: 220px;" title="{{ $row->referer }}">
                                    <i class="bi bi-link-45deg me-1"></i>{{ $row->referer }}
                                </span>
                                @else
                                    <span class="badge bg-light text-muted border">—</span>
                                @endif
                            </td>
                            <td class="pe-4 text-end text-muted small font-monospace">
                                {{ $row->last_visit }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-2 d-block mb-2 text-secondary"></i>
                                Даних ще немає.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
