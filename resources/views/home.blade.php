
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button> Logout </button>
        </form>

        <p><a href="{{route('password.confirm')}}"> Password confirmation</a></p>
        <p><a href="{{route('password.confirmation')}}"> Password confirmation status</a></p>


