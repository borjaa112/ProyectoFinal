<nav>
    <a href="/">Inicio</a>

    @auth
    <a href=" {{ route('cuenta')}}">Mi cuenta</a>
    @endauth
    @guest
    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

    @if (Route::has('registro'))
        <a href="{{ route('registro') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
    @endif
    @endguest
</nav>
