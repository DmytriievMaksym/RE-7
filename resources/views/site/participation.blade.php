 @extends('app')
    @section('title','Заявка на участь')
    @section('content')
        <div class="container py-4" style="max-width: 650px;">
            <h1 class="h3 fw-bold mb-4 text-uppercase border-start border-4 border-warning ps-3">Форма введення даних</h1>

            <!--Перелічення полів форми-->
            <div class="card border-0 shadow-sm bg-white p-4 rounded-3">
                <form method="POST" action="{{route('participation.store')}}">@csrf
                    <div class="mb-3">
                        <label for="author" class="form-label fw-semibold">Ім'я автора</label>
                        <input type="text" id="author" name="author" class="form-control" value="{{old('author')}}">
                        @error('author')
                        <p class="error text-danger small mt-1 mb-0">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="text" id="email" name="email" class="form-control" value="{{old('email')}}">
                        @error('email')
                        <p class="error text-danger small mt-1 mb-0">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label fw-semibold">Номер телефону (не обов'язково)</label>
                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="0991234567" value="{{old('phone')}}">
                        @error('phone')
                        <p class="error text-danger small mt-1 mb-0">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="model" class="form-label fw-semibold">Модель</label>
                        <input type="text" id="model" name="model" class="form-control" value="{{old('model')}}">
                        @error('model')
                        <p class="error text-danger small mt-1 mb-0">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label fw-semibold">Категорія</label>
                        <select name="category" id="category" class="form-select">
                            <option value="" disabled {{ old('category') ? '' : 'selected' }}>Оберіть категорію...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->value }}" {{ old('category') == $category->value ? 'selected' : '' }}>
                                    {{ $category->label() }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                        <p class="error text-danger small mt-1 mb-0">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="scale" class="form-label fw-semibold">Масштаб</label>
                        <input type="text" id="scale" name="scale" class="form-control font-monospace" placeholder="1:35" value="{{old('scale')}}">
                        @error('scale')
                        <p class="error text-danger small mt-1 mb-0">{{$message}}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-warning fw-bold text-dark px-4 py-2 w-100 shadow-sm">Надіслати</button>
                </form>
            </div>
        </div>
    @endsection
