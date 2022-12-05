@extends('layouts.app')

@section('style')
    {{URL::asset('css/sign.css')}}
@endsection

@section('title')
    Reset password
@endsection

@section('content')
    <div class="container" id="container">
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <h1> Reset password </h1>
            <p> Enter a new password and tap the button below to reset your actual password. </p>
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <input type="hidden" name="email" value="{{ $request->email }}">
            <div>
                <input type="email" value="{{ $request->email }}" disabled>
            </div>

            <div>
                <input type="password" name="password" placeholder="Password">
            </div>

            <div>
                <input type="password" name="password_confirmation" placeholder="Password confirmation">
            </div>

            <div>
                <button> Reset your password </button>
            </div>
        </form>
    </div>
    <p>Want you to come back ? <a href="{{route('login')}}" id="return"> Return to sign form</a></p>
    @error('email')
    @if($message=="This password reset token is invalid.")
        <p id="error">❌ Time elapsed ! </p>
    @else
        <p id="error">❌ {{$message}}</p>
    @endif
    @enderror
    @error('password')
        @if($message=="This password reset token is invalid.")
            <p id="error">❌Timeout </p>
        @else
            <p id="error">❌ {{$message}}</p>
        @endif
    @enderror
    @if(session('status'))
        <p>{{session('status')}}</p>
    @endif
@endsection




