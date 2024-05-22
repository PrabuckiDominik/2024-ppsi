<form action="{{ route('register') }}" method="post">
    @csrf
    {{ __('auth.emailInput') }}: <input type="email" name="email" id="email">
    @error('email')
        {{$message}}
    @enderror
    <br>
    {{ __('auth.usernameInput') }}: <input type="text" name="name" id="name">
    @error('name')
        {{$message}}
    @enderror
    <br>
    {{ __('auth.passwordInput') }}: <input type="password" name="password" id="password">
    @error('password')
        {{$message}}
    @enderror
    <br>
    {{ __('auth.confirmPasswordInput') }}: <input type="password" name="password_confirmation" id="password_confirmation">
    @error('password_confirmation')
        {{$message}}
    @enderror
    <br>
    <input type="submit" name = "submit" value="Register">
</form>