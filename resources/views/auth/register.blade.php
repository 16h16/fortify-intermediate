<form action="{{ route('register') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        @error('name')
        <p> {{$message}}</p>
        @enderror
    </div>
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
        <label for="password_confirmation">Password confirmation</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
        @error('password')
        <p> {{$message}}</p>
        @enderror
    </div>
    <div>
        <button> SIGN UP </button>
    </div>
</form>
