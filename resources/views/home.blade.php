@if (Route::has('login'))
    @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button> Logout </button>
        </form>
    @else
        <p><a href="{{route('login')}}">register</a></p>
        <p><a href="{{route('register')}}">register</a></p>
    @endauth
@endif
