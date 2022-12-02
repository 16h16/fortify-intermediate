<form action="{{route('login')}}" method="POST">
    @csrf
    <input type="text" name="email">
    <input type="password" name="password">
    <button> SIGN IN</button>
</form>
