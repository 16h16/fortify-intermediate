
        @if(session('status'))
            <p>{{session('status')}}</p>
        @endif

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button> Logout </button>
        </form>

        <p><a href="{{route('password.confirm')}}"> Password confirmation</a></p>
        <p><a href="{{route('password.confirmation')}}"> Password confirmation status</a></p>

        <p><a href="{{route('two.factor')}}">Two factor authenticationn</a></p>

