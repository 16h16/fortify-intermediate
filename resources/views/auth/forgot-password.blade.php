@if(session('status'))
    <p>{{session('status')}}</p>
@endif
<form action="{{ route('password.request') }}" method="POST">
    @csrf
    <div>
        <input type="email" name="email" placeholder="email">
        @error('email')
        <p> {{$message}}</p>
        @enderror
    </div>
    <div>
        <button> Reset password </button>
    </div>
</form>
