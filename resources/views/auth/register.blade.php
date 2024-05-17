<form action="{{ route('register') }}" method="post">
    @csrf
    email: <input type="email" name="email" id="email">
    @error('csrf')
        {{$message}}
    @enderror
    <br>
    username: <input type="text" name="name" id="name">
    @error('name')
        {{$message}}
    @enderror
    <br>
    password: <input type="password" name="password" id="password">
    @error('password')
        {{$message}}
    @enderror
    <br>
    confirm password: <input type="password" name="password_confirmation" id="password_confirmation">
    @error('password_confirmation')
        {{$message}}
    @enderror
    <br>
    <input type="submit" name = "submit" value="Register">
</form>