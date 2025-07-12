<div class="mb-3">
    <label for="name" class="form-label">Event</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $event->name ?? '') }}">
    @error('name')
    <p class="text-danger text-xs mt-2">{{ $message }}</p>
    @enderror
</div>
<div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $event->date ?? '') }}">
    @error('date')
    <p class="text-danger text-xs mt-2">{{ $message }}</p>
    @enderror
</div>
<div class="mb-3">
    <label for="friends" class="form-label">Guests</label>
    <select class="form-control js-example-basic-multiple" name="friend_id[]" id="friend_id" multiple="multiple">
        @foreach ($friends as $id => $name)
        <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>
    @error('friend_id')
    <p class="text-danger text-xs mt-2">{{ $message }}</p>
    @enderror
</div>
<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" name="description"
        id="description">{{ old('description', $event->description ?? '') }}</textarea>
    @error('description')
    <p class="text-danger text-xs mt-2">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
</div>
