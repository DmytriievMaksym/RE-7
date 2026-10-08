@extends("app")
@section('title', 'Виставка Стендових Моделей')

@section('content')
    <!-- Головний промо-банер -->
    <section class="hero-banner text-white py-5 shadow-sm">
        <div class="container py-4 text-center">
            <div class="d-inline-flex gap-2 mb-3">
                <span class="badge badge-scale text-warning border border-warning">1:35</span>
                <span class="badge badge-scale text-warning border border-warning">1:48</span>
                <span class="badge badge-scale text-warning border border-warning">1:72</span>
                <span class="badge badge-scale text-warning border border-warning">1:350</span>
                <span class="badge badge-scale text-warning border border-warning">1:700</span>
            </div>
            <h1 class="display-5 fw-bold text-uppercase tracking-wide mb-3">
                Щорічний Кубок Моделістів
            </h1>
            <p class="lead text-light-50 mx-auto" style="max-width: 720px;">
                Експозиція високодеталізованих історичних мініатюр, бронетанкової техніки, авіації, флоту та діорам від майстрів стендового моделізму.
            </p>
            <div class="mt-4 d-flex justify-content-center gap-2 flex-wrap">
                <!-- Кнопка відкриття форми участі -->
                <button type="button" class="btn btn-warning px-4 py-2 fw-bold text-dark shadow-sm" data-bs-toggle="modal" data-bs-target="#registerModal">
                    <i class="bi bi-pencil-square me-1"></i> Взяти участь
                </button>
                <a href="#categories" class="btn btn-outline-light px-4 py-2">Номінації</a>
                <a href="#author" class="btn btn-outline-secondary text-light px-3 py-2">Паспорт проєкту</a>
            </div>
        </div>
    </section>

    <div class="container my-5">
        <!-- Блок номінацій -->
        <div id="categories" class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold border-start border-4 border-warning ps-3 mb-0">Номінації виставки</h2>
                <button type="button" class="btn btn-outline-warning btn-sm d-none d-md-inline-block text-dark border-warning" data-bs-toggle="modal" data-bs-target="#registerModal">
                    Подати модель на конкурс
                </button>
            </div>

            <div class="row g-4">
                <!-- Бронетехніка -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm border-0 bg-white">
                        <div class="card-body d-flex flex-column">
                            <div class="text-warning mb-2"><i class="bi bi-shield-shaded fs-2"></i></div>
                            <h5 class="card-title fw-bold">Бронетехніка (БТТ)</h5>
                            <span class="badge bg-secondary mb-2 align-self-start">1:35, 1:72</span>
                            <p class="card-text text-muted small flex-grow-1">Танки, САУ, бронемашини. Оцінка везерінгу, сколів, фактури броні та деталізації ходової частини.</p>
                        </div>
                    </div>
                </div>

                <!-- Авіація -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm border-0 bg-white">
                        <div class="card-body d-flex flex-column">
                            <div class="text-warning mb-2"><i class="bi bi-airplane-engines fs-2"></i></div>
                            <h5 class="card-title fw-bold">Авіація</h5>
                            <span class="badge bg-secondary mb-2 align-self-start">1:48, 1:72, 1:144</span>
                            <p class="card-text text-muted small flex-grow-1">Військові та цивільні літаки, гелікоптери. Оцінка тонкості розшивки, камуфляжу та кабін.</p>
                        </div>
                    </div>
                </div>

                <!-- Флот (Нова категорія) -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm border-0 bg-white">
                        <div class="card-body d-flex flex-column">
                            <div class="text-warning mb-2"><i class="bi bi-water fs-2"></i></div>
                            <h5 class="card-title fw-bold">Флот та судна</h5>
                            <span class="badge bg-secondary mb-2 align-self-start">1:350, 1:700</span>
                            <p class="card-text text-muted small flex-grow-1">Надводні кораблі, підводні човни та катери. Оцінка фототравлення, такелажу та ватерлінії.</p>
                        </div>
                    </div>
                </div>

                <!-- Діорами -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm border-0 bg-white">
                        <div class="card-body d-flex flex-column">
                            <div class="text-warning mb-2"><i class="bi bi-layers-half fs-2"></i></div>
                            <h5 class="card-title fw-bold">Діорами та віньєтки</h5>
                            <span class="badge bg-secondary mb-2 align-self-start">Вільні масштаби</span>
                            <p class="card-text text-muted small flex-grow-1">Сюжетні композиції, ландшафти, будівлі, розпис мініатюрних фігур та імітація природних середовищ.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Регламент та інформація про автора -->
        <div id="schedule" class="row g-4 mb-5">
            <div class="col-lg-6">
                <div class="p-4 bg-white rounded-3 shadow-sm border h-100">
                    <h4 class="fw-bold mb-3"><i class="bi bi-calendar3 me-2 text-warning"></i>Регламент заходу</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Реєстрація моделей та прийом робіт
                            <span class="badge bg-dark rounded-pill">09:00 – 11:30</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Відкриття зали для відвідувачів
                            <span class="badge bg-dark rounded-pill">12:00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Суддівство та оцінювання експонатів
                            <span class="badge bg-dark rounded-pill">14:00 – 16:00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Оголошення переможців і нагородження
                            <span class="badge bg-warning text-dark rounded-pill">17:00</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6" id="author">
                <div class="p-4 bg-white rounded-3 shadow-sm border h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <i class="bi bi-mortarboard-fill text-warning fs-4"></i>
                            <h4 class="fw-bold mb-0">Лабораторний практикум</h4>
                        </div>
                        <p class="text-muted mb-3">Веб-додаток розроблено на основі фреймворку Laravel у рамках навчального курсу.</p>
                        <div class="alert alert-secondary py-2 mb-0">
                            <p class="mb-1"><strong>Виконав:</strong> Дмитрієв М.А.</p>
                            <p class="mb-0"><strong>Група:</strong> РЕ-51</p>
                        </div>
                    </div>
                    <small class="text-muted mt-3">Фреймворк: Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Модальне вікно "Взяти участь" -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title fw-bold" id="registerModalLabel">
                        <i class="bi bi-card-checklist text-warning me-2"></i>Заявка на участь у виставці
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Закрити"></button>
                </div>
                <div class="modal-body p-4">
                    <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Заявку зареєстровано!'); bootstrap.Modal.getInstance(document.getElementById('registerModal')).hide();">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">ПІБ автора / моделіста</label>
                            <input type="text" class="form-control" placeholder="Іваненко Іван" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Назва моделі / прототипу</label>
                            <input type="text" class="form-control" placeholder="напр., Есмінець «Гетьман Сагайдачний»" required>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Категорія</label>
                                <select class="form-select" required>
                                    <option value="" selected disabled>Оберіть...</option>
                                    <option value="afv">Бронетехніка (БТТ)</option>
                                    <option value="aviation">Авіація</option>
                                    <option value="fleet">Флот та судна</option>
                                    <option value="diorama">Діорами</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Масштаб</label>
                                <input type="text" class="form-control" placeholder="1:350, 1:72..." required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Виробник набору (Kit manufacturer)</label>
                            <input type="text" class="form-control" placeholder="MiniArt, ICM, Tamiya, Trumpeter...">
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-warning fw-bold py-2 text-dark">
                                Надіслати заявку
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

