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
        <label for="nominations-select" class="form-label fw-semibold d-block">
            Номінації та категорії <span class="text-danger">*</span>
            <span class="text-muted fw-normal small">(почніть вводити назву для пошуку)</span>
        </label>

        <select id="nominations-select" name="nominations[]" multiple>
            @foreach($nominations as $nomination)
                <option value="{{ $nomination->key }}"
                        data-description="{{ $nomination->description }}"
                    @selected(in_array($nomination->key, old('nominations', $selectedNominations ?? (isset($model) ? $model->nominations->pluck('key')->toArray() : []))))>
                    {{ $nomination->name }}
                </option>
            @endforeach
        </select>

        @error('nominations')
        <div class="text-danger small mt-2">{{ $message }}</div>
        @enderror
        @error('nominations.*')
        <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>


    {{-- ID автора --}}
    <div class="mb-4">
        <label for="author_id" class="form-label fw-semibold">ID автора</label>
        <input type="text" id="author_id" name="author_id" class="form-control font-monospace" value="{{old('author_id',$model->author_id??'')}}">
        @error('author_id')
        <p class="error text-danger small mt-1 mb-0">{{$message}}</p>
        @enderror
    </div>
</div>
