<div>
    <label for="filter_name">Назва фільтру</label>
    <input id="filter_name" name="filter_name" type="text" maxlength="100" value="{{old('filter_name',$filter->filter_name ?? '')}}">
    @error('filter_name')
    <p class="error">{{$message}}</p>
    @enderror
</div>
