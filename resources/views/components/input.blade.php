
<div class="mb-3">
    <label for=name class="form-label">{{$label}}</label>
    <input type={{$type}} name={{$name}} class="form-control " value={{old('name')}}>
    <span class="text-danger">
        {{$integer}}
        @error('name')
            {{ $message }}
        @enderror
    </span>

</div>
