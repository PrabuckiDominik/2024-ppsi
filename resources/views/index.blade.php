@auth()
zalogowany jako {{ Auth::user()->email }}
<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit">logout</button>
</form>
@endauth

@guest
guest
<br>
<a href="{{ route('login') }}">login</a>
<br>
<a href="{{ route('register') }}">register</a>
@endguest