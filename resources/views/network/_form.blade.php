<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $friend->name ?? '') }}">
    @error('name')
    <p class="text-danger text-xs mt-2">{{ $message }}</p>
    @enderror
</div>
<div class="mb-3">
    <label for="age" class="form-label">Age</label>
    <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $friend->age ?? '') }}">
    @error('age')
    <p class="text-danger text-xs mt-2">{{ $message }}</p>
    @enderror
</div>
<div class="mb-3">
    <label for="age" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username"
        value="{{ old('username', $friend->username ?? '') }}">
    @error('username')
    <p class="text-danger text-xs mt-2">{{ $message }}</p>
    @enderror
</div>
<div class="mb-3">
    <label for="friends" class="form-label">Password</label>
    <input type="text" class="form-control" id="password" name="password"
        value="{{ old('password', $friend->password ?? '') }}">
    @error('password')
    <p class="text-danger text-xs mt-2">{{ $message }}</p>
    @enderror
</div>
<div class="mb-3">
    <label for="friends" class="form-label">Make a Friends</label>
    <select class="form-control js-example-basic-multiple" name="friend_id[]" id="friend_id" multiple="multiple">
        @foreach ($users as $id => $name)
        <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>
    @error('friend_id')
    <p class="text-danger text-xs mt-2">{{ $message }}</p>
    @enderror
</div>
<div class="mb-3">
    <label for="avatar" class="form-label">Avatar</label>
    <input type="file" class="form-control" id="avatar" name="avatar">
    @error('avatar')
    <p class="text-danger text-xs mt-2">{{ $message }}</p>
    @enderror
</div>
<div class="mb-3">
    <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
</div>
