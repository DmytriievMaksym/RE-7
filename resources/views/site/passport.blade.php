@extends('app')
@section('title', 'Паспорт проєкту | Scale Models Expo')

@section('content')
    <div class="container py-4" style="max-width: 900px;">

        <!--Інформація про подію-->
        <div class="card border-0 shadow-sm bg-white rounded-3 mb-4 overflow-hidden">
            <div class="card-header bg-scale-dark text-white p-4 border-bottom border-warning border-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-warning text-dark p-2 rounded-2 fs-3 lh-1">
                        <i class="bi bi-trophy-fill"></i>
                    </div>
                    <div>
                        <h1 class="h4 fw-bold mb-1 text-uppercase text-light">Кубок Моделістів — Всеукраїнська виставка</h1>
                        <p class="text-secondary small mb-0">Офіційний паспорт виставкового заходу та інформаційної системи</p>
                    </div>
                </div>
            </div>

            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 border h-100 d-flex align-items-center gap-3">
                            <i class="bi bi-calendar-event fs-2 text-warning"></i>
                            <div>
                                <span class="text-muted small d-block">Дати проведення:</span>
                                <strong class="text-dark fs-5">{{ $project['dates'] }}</strong>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 border h-100 d-flex align-items-center gap-3">
                            <i class="bi bi-geo-alt-fill fs-2 text-warning"></i>
                            <div>
                                <span class="text-muted small d-block">Місце проведення:</span>
                                <strong class="text-dark fs-5">{{ $project['location'] }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Інформація про стендове моделювання-->
        <div class="card border-0 shadow-sm bg-white rounded-3 p-4 mb-4">
            <h2 class="h5 fw-bold text-dark border-start border-4 border-warning ps-3 mb-3">
                Світ стендового моделізму: від хобі до інженерного мистецтва
            </h2>

            <p class="text-muted leading-relaxed mb-4">
                <strong>Стендовий моделізм</strong> — це синтез історичної реконструкції, ювелірної збірки та художнього живопису.
                На відміну від іграшок чи радіокерованих моделей (RC), мета стендової мініатюри — стати
                <strong>абсолютно точною копією</strong> реального прототипу у зменшеному масштабі, відтвореною аж до заклепок,
                фактури зварних швів та слідів бойової експлуатації.
            </p>

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="p-3 bg-light rounded-3 border h-100">
                        <div class="d-flex align-items-center gap-2 mb-2 text-warning">
                            <i class="bi bi-rulers fs-4"></i>
                            <h6 class="fw-bold mb-0 text-dark">Що таке масштаб?</h6>
                        </div>
                        <p class="small text-muted mb-0">
                            Позначення <code>1:35</code> означає, що кожен сантиметр на моделі дорівнює 35 сантиметрам
                            справжньої техніки. Масштаб <code>1:72</code> робить модель більш компактною,
                            а <code>1:350</code> у флоті дозволяє помістити 200-метровий лінкор на письмовий стіл.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-3 bg-light rounded-3 border h-100">
                        <div class="d-flex align-items-center gap-2 mb-2 text-warning">
                            <i class="bi bi-puzzle-fill fs-4"></i>
                            <h6 class="fw-bold mb-0 text-dark">Сотні деталей</h6>
                        </div>
                        <p class="small text-muted mb-0">
                            Сучасний набір — це не кілька шматків пластику. Один комплект техніки може містити
                            <strong>від 400 до 1200+ деталей</strong>: литий полістирол, латунне фототравлення
                            товщиною з волосину, точені металеві стволи та гумові елементи.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-3 bg-light rounded-3 border h-100">
                        <div class="d-flex align-items-center gap-2 mb-2 text-warning">
                            <i class="bi bi-brush-fill fs-4"></i>
                            <h6 class="fw-bold mb-0 text-dark">Магія везерінгу</h6>
                        </div>
                        <p class="small text-muted mb-0">
                            Скласти модель — це лише половина справи. Справжнє мистецтво полягає у
                            <em> фарбуванні та везерінгу (weathering)</em> — нанесенні слідів мастила,
                            сколів фарби, нагару порохових газів, пилу доріг та реалістичної іржі за допомогою олійних фарб і сухих пігментів.
                        </p>
                    </div>
                </div>
            </div>

            <!--Етапи створення моделі-->
            <div class="bg-light p-3 rounded-3 border">
                <h6 class="fw-bold text-dark mb-2">
                    <i class="bi bi-gear-wide-connected text-warning me-1"></i> Як народжується експонат на виставку:
                </h6>
                <div class="row g-2 text-muted small">
                    <div class="col-sm-6 col-lg-3">
                        <strong>1. Дослідження:</strong> робота з архівними фото, кресленнями та схемами камуфляжу конкретного прототипу.
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <strong>2. Збірка:</strong> підгонка деталей, шпаклювання, нанесення зварних швів та доопрацювання мікродеталей.
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <strong>3. Базове фарбування:</strong> ґрунтування, нанесення камуфляжу аерографом, техніка світлотіні (модуляція).
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <strong>4. Фінішна обробка:</strong> змивки для об'єму, фільтри, нанесення декалей (маркувань), бруд та лакування.
                    </div>
                </div>
            </div>
        </div>

        <!--Про застосунок-->
        <div class="card border-0 shadow-sm bg-white rounded-3 p-4 mb-4">
            <h2 class="h5 fw-bold text-dark border-start border-4 border-warning ps-3 mb-4">
                Паспорт розробки вебзастосунку
            </h2>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="border rounded-3 p-3 h-100 bg-light">
                        <h3 class="h6 fw-bold text-uppercase text-secondary mb-3">
                            <i class="bi bi-person-badge me-1 text-warning"></i> Відомості про застосунок
                        </h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">
                                <span class="text-muted small d-block">Виконавець:</span>
                                <span class="fw-bold fs-6">{{ $project['author'] }}</span>
                            </li>
                            <li class="mb-2">
                                <span class="text-muted small d-block">Група:</span>
                                <span class="badge bg-dark font-monospace px-2 py-1">{{ $project['group'] }}</span>
                            </li>
                            <li>
                                <span class="text-muted small d-block">Навчальний заклад:</span>
                                <span class="fw-semibold">КПІ ім. Ігоря Сікорського</span>
                            </li>
                            <li class="mb-2 d-flex justify-content-between align-items-center">
                                <span class="text-muted">Мова програмування:</span>
                                <span class="badge bg-secondary font-monospace">PHP {{ $project['phpVersion'] }}</span>
                            </li>
                            <li class="mb-2 d-flex justify-content-between align-items-center">
                                <span class="text-muted">Фреймворк:</span>
                                <span class="badge bg-warning text-dark font-monospace fw-bold">{{ $project['framework'] }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--Кнопка повернення-->
        <div class="text-center">
            <a href="{{ url('/') }}" class="btn btn-outline-secondary px-4 py-2">
                <i class="bi bi-arrow-left me-1"></i> Повернутися на головну
            </a>
        </div>

    </div>
@endsection
