<div class="border-bottom pb-4 mb-4">
    <div class="mb-3">
        <label for="name" class="form-label fw-semibold">Назва моделі</label>
        <input type="text" id="name" name="name" class="form-control" value="{{old('name',$model->name??'')}}">
        @error('name')
        <p class="error text-danger small mt-1 mb-0">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="scale" class="form-label fw-semibold">Масштаб</label>
        <input type="text" id="scale" name="scale" class="form-control font-monospace" placeholder="1:35" value="{{old('scale',$model->scale??'')}}">
        @error('scale')
        <p class="error text-danger small mt-1 mb-0">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold d-block">
            Номінації та категорії <span class="text-danger">*</span>
            <span class="text-muted fw-normal small">(оберіть одну або декілька)</span>
        </label>

        <div class="row g-2">
            @foreach($categories as $category)
                <div class="col-sm-6">
                    <div class="form-check p-3 border rounded-3 bg-light h-100 d-flex align-items-center gap-2">
                        <input
                            class="form-check-input ms-0 mt-0 flex-shrink-0"
                            type="checkbox"
                            name="categories[]"
                            id="cat_{{ $loop->index }}"
                            value="{{ $category->value }}"
                            {{ in_array($category->value, old('categories', $model->categories ?? [])) ? 'checked' : '' }}
                        >
                        <label class="form-check-label w-100 fw-semibold text-dark cursor-pointer user-select-none" for="cat_{{ $loop->index }}">
                            {{ $category->label() }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>

        @error('categories')
        <div class="text-danger small mt-2">{{ $message }}</div>
        @enderror
        @error('categories.*')
        <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    {{-- ID автора --}}
    <div class="mb-4">
        <label for="author_id" class="form-label fw-semibold">ID автора</label>
        <input type="text" id="author_id" name="author_id" class="form-control font-monospace" value="{{old('author_id'),$model->author_id??''}}">
        @error('author_id')
        <p class="error text-danger small mt-1 mb-0">{{$message}}</p>
        @enderror
    </div>
</div>
