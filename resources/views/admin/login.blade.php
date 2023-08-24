<h1>admin login form</h1>

<form method="POST" action="{{ route('admin.authenticate') }}">
    @csrf

    <label for="username">username</label>
    <input type="text" id="username" name="username">
    @error('username')
        <span>{{ $message }}</span>
    @enderror
    <br>

    <label for="password">password</label>
    <input type="text" id="password" name="password">
    @error('password')
        <span>{{ $message }}</span>
    @enderror
    <br>

    <button type="submit">login</button>
</form>
