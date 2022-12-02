@if (Route::has('login'))
    @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button> Logout </button>
        </form>
    @endauth
@endif
