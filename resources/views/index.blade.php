@include('shared.return-message')

@auth
    {{ __('auth.loggedInAs') }} {{ Auth::user()->email }}
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">{{ __('auth.logout') }}</button>
    </form>
    <br>
    <a href="{{ route('leaves.index') }}">{{ __('leaves.leaves') }}</a>
    <br>
    <a href="{{ route('employees.index') }}">{{ __('employees.employees') }}</a>
    <br>
    <a href="{{ route('transactions.index') }}">Transactions</a>
@endauth

@guest
    <br>
    <a href="{{ route('login') }}">{{ __('auth.login') }}</a>
    <br>
    <a href="{{ route('register') }}">{{ __('auth.register') }}</a>
@endguest