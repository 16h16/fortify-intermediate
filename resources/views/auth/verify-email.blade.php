@if(session('status'))
    <p>{{session('status')}}</p>
@endif
<p> You must verify your email </p>
<form action="{{ route('verification.send') }}" method="POST">
    @csrf
    <div>
        <button name="login"> Verify my email </button>
    </div>
</form>
