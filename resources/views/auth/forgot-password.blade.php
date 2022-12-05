@extends('layouts.app')

@section('style')
    {{URL::asset('css/sign.css')}}
@endsection

@section('title')
    Forgot password
@endsection

@section('content')
    <div class="container" id="container">
        <form action="{{ route('password.request') }}" method="POST">
            @csrf
            <h1> Forgot password </h1>
            <p> Enter your email address and tap the button below to send a reset link. </p>
            <div>
                <input type="email" name="email" placeholder="email">
            </div>
            <div>
                <button> Send link </button>
            </div>
        </form>
    </div>
    <p> Want you to come back ? <a href="{{route('login')}}" id="return"> Return to sign form</a></p>
    @error('email')
    <p id="error">❌ {{$message}}</p>
    @enderror
    @if(session('status')=="We have emailed your password reset link!")
        <p id="status">✔ Password reset link sent successfully</p>
    @endif
@endsection




