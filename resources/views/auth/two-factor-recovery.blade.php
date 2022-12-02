@if(session('status'))
    <p> {{ session('status') }}</p>
@endif

<p> Recovery code </p>
<form action="{{ route('two-factor.login') }}" method="POST">
    @csrf
    <input type="text" name="recovery_code" placeholder="recovery code">
    <button> Authentication </button>
</form>
