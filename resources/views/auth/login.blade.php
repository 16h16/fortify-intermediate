<form action="{{ route('login') }}" method="POST">
    @csrf
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        @error('email')
        <p> {{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        @error('password')
        <p> {{$message}}</p>
        @enderror
    </div>
    <div>
        <button> SIGN IN </button>
    </div>
    <div>
        <p>Don't have an account? <a href="{{route('register')}}">Sign up</a></p>
    </div>
</form>
