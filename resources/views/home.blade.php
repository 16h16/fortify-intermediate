        @if(session('status'))
            <p>{{session('status')}}</p>
        @endif

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button> Logout </button>
        </form>

        <p><a href="{{route('two.factor')}}">Two factor authentication</a></p>

    <p> Welcome {{auth()->user()->name}}</p>
