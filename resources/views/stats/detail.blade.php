@extends('app')
@section('title', 'Детальна статистика')
@section('content')
    <div class="container py-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h1 class="h3 fw-bold mb-1 text-dark">
                    <i class="bi bi-list-check text-warning me-2"></i>Детальна статистика
                </h1>
                <div class="d-flex align-items-center gap-2 mt-2">
                    <span class="text-secondary small">Фільтр: {{ $type }}</span>
                    <span class="text-muted">=</span>
                    <span class="text-secondary small">{{ $item }}</span>
                </div>
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
                        <th class="ps-4 py-3" style="width: 25%;">Сторінка</th>
                        <th class="py-3" style="width: 15%;">IP</th>
                        <th class="text-center py-3" style="width: 10%;">Статус</th>
                        <th class="text-center py-3" style="width: 10%;">Метод</th>
                        <th class="py-3" style="width: 20%;">Маршрут (Referer)</th>
                        <th class="pe-4 text-end py-3" style="width: 20%;">Дата і час</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($rows as $row)
                        <tr>
                            <td class="ps-4">
                                <code class="text-dark fw-semibold">{{ $row->page }}</code>
                            </td>

                            <td class="font-monospace text-secondary small">
                                {{ $row->ip }}
                            </td>

                            <td class="text-center">
                                {{--Колір за статусом--}}
                                @php
                                    $statusClass = match(true) {
                                        $row->status >= 200 && $row->status < 300 => 'bg-success',
                                        $row->status >= 300 && $row->status < 400 => 'bg-info text-dark',
                                        $row->status >= 400 && $row->status < 500 => 'bg-warning text-dark',
                                        $row->status >= 500 => 'bg-danger',
                                        default => 'bg-secondary',
                                    };
                                @endphp
                                <span class="badge {{ $statusClass }} rounded-pill px-2 py-1 font-monospace">
                                {{ $row->status }}
                            </span>
                            </td>

                            <td class="text-center">
                                {{--Колір за методом звернення--}}
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
                                {{ $row->visited_at->format('d.m.Y H:i:s') }}
                            </td>
                        </tr>
                    @endforeach
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
