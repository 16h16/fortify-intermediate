@extends('layouts.app')

@section('style')
    {{URL::asset('css/sign.css')}}
@endsection

@section('title')
    Password creation
@endsection

@section('status')
    @if(session('status'))
        <p>{{session('status')}}</p>
    @endif
@endsection

@section('content')
    <div class="container" id="container">
        <form action="{{ route('password.creation') }}" method="POST">
            @csrf
            <h1> Password creation </h1>
            <p> Enter a password and tap the button below to create your password. </p>
            <input type="hidden" name="email" value="{{ $email }}" required>
            <div>
                <input type="email" value="{{ $email }}" disabled required>
            </div>

            <div>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div>
                <input type="password" name="password_confirmation" placeholder="Password confirmation" required>
            </div>

            <div>
                <button> Create your password </button>
            </div>
        </form>
    </div>
    <p>Want you to come back ? <a href="{{route('login')}}" id="return"> Return to sign form</a></p>
@endsection

@section('error')
    @if($errors->any())
        <ul style="list-style-type: none; padding:0px">
            @foreach($errors->all() as $error)
                @if($error == "This password reset token is invalid.")
                    <li id="error">❌ Time elapsed ! Please send a new reset link. </li>
                @else
                    <li id="error">❌ {{$error}} </li>
                @endif
            @endforeach
        </ul>
    @endif
@endsection




