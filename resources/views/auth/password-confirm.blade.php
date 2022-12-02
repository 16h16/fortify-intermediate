<form action="{{ route('password.confirm') }}" method="POST">
    @csrf
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        @error('password')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <button> Confirm password </button>
    </div>
</form>
