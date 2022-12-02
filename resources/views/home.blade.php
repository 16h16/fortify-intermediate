@if (Route::has('login'))
    @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button> Logout </button>
        </form>
    @else
        <p><a href="{{route('login')}}">Sign-in</a></p>
        <p><a href="{{route('register')}}">Sign-up</a></p>
    @endauth
@endif
