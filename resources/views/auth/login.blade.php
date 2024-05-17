<form action="{{ route('login') }}" method="post">
    @csrf
    username: <input type="text" name="name" id="name">
    <br>
    password: <input type="password" name="password" id="password">
    <br>
    <input type="submit" value="Login">
</form>