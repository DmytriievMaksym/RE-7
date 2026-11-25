<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Scale Models Expo')</title>
    @vite(['resources/js/app.js','resources/css/app.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --model-primary: #1f2937;
            --model-accent: #d97706;
        }
        .bg-scale-dark {
            background-color: #111827;
        }
        .badge-scale {
            background-color: #374151;
            font-family: monospace;
            font-size: 0.85rem;
            letter-spacing: 1px;
        }
        .hero-banner {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
            border-bottom: 3px solid var(--model-accent);
        }
        .hover-warning:hover {
            color: #ffc107 !important;
            text-decoration: underline !important;
        }

        .table > :not(caption) > * > * {
            padding: 0.85rem 0.75rem;
        }
        .pagination .page-item.active .page-link {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
            font-weight: 600;
        }

        .pagination .page-link {
            color: #212529;
        }

        .pagination .page-link:hover {
            color: #000;
            background-color: #f8f9fa;
            border-color: #dee2e6;
        }

        .pagination .page-link:focus {
            box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);
        }

        {{--Прибрав напис пагінації--}}
        .pagination-wrapper p,
        .card-footer p.small {
            display: none !important;
        }

        .pagination-wrapper .pagination,
        .card-footer .pagination {
            margin-bottom: 0 !important;
            justify-content: center;
        }
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
            margin: 24px 0;
        }
        .blog-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .blog-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        }
        .blog-card-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .blog-card-body {
            padding: 16px;
        }
        .blog-category {
            font-size: 13px;
            color: #2563eb;
        }
        .blog-meta {
            font-size: 13px;
            color: #666;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100 bg-light text-dark">

<!-- Навігація -->
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-scale-dark border-bottom border-secondary">
        <div class="container">
            <a class="navbar-brand fw-bold text-uppercase d-flex align-items-center gap-2" href="/">
                <i class="bi bi-box-seam text-warning"></i>
                <span>Scale Models Expo</span>
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="/">Головна</a>
                <a class="nav-link" href="#categories">Номінації</a>
                <a class="nav-link" href="#schedule">Розклад</a>
                <a class="nav-link" href="{{ route('country.index') }}">Країни</a>
                @auth
                    <a class="nav-link" href="{{ route('blog.admin') }}">
                        Керування блогом
                    </a>
                    <a class="nav-link" href="{{ route('stats.pages') }}">Статистика</a>
                    <a class="nav-link" href="{{ route('users.index') }}">
                        Користувачі
                    </a>
                    <a class="nav-link" href="{{ route('profile.edit') }}">
                        Мій профіль
                    </a>
                    <form method="POST"
                          action="{{ route('logout') }}">
                        @csrf
                        <button class="nav-link" type="submit">
                            Вийти ({{ auth()->user()->name }})
                        </button>
                    </form>
                @endauth
                @guest
                    <a class="nav-link" href="{{ route('login') }}">Увійти</a>
                    <a class="nav-link" href="{{ route('register') }}">
                        Реєстрація
                    </a>
                @endguest
            </div>
        </div>
    </nav>
</header>

<!-- Тіло сторінки -->
<main class="flex-grow-1">
    @yield('content')
</main>

<!-- Футер -->
<footer class="bg-scale-dark text-secondary py-4 border-top border-secondary mt-5">
    <div class="container text-center">
        <p class="mb-1 text-light">© {{ date('Y') }} Всеукраїнська виставка стендового моделізму | КПІ ім. Ігоря Сікорського</p>
        <small class="text-secondary">Дмитрієв Максим РЕ-51</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
