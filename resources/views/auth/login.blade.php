<form action="{{ route('login') }}" method="post">
    @csrf
    {{ __('auth.emailInput') }}: <input type="text" name="email" id="email">
    @error('email')
        {{$message}}
    @enderror
    <br>
    {{ __('auth.passwordInput') }}: <input type="password" name="password" id="password">
    @error('password')
        {{$message}}
    @enderror
    <br>
    <input type="submit" value="Login">
</form>