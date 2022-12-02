@error('recovery_code')
<p>{{ $message }}</p>
@enderror
<p> Enter 6 digit</p>
<form action="{{ route('two-factor.login') }}" method="POST">
    @csrf
    <input type="text" name="code" placeholder="code">
    @error('code')
    <p>{{ $message }}</p>
    @enderror
    <button> Authentication </button>
</form>

<p><a href="{{route('two.factor.recovery')}}"> Recovery </a></p>
