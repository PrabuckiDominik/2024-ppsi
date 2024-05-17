@auth()
zalogowany jako {{ Auth::user()->email }}
@endauth

@guest
guest
@endguest