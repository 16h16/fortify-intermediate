@extends('layouts.app')

@section('style')
    {{URL::asset('css/sign.css')}}
@endsection

@section('title')
    Password confirmation
@endsection

@section('status')
    @if(session('status'))
        <p>{{session('status')}}</p>
    @endif
@endsection

@section('content')
    <div class="container" id="container">
        <form action="{{ route('password.confirm') }}" method="POST">
            @csrf
            <h1> Password confirmation </h1>
            <p>Enter your password and tap the button below to confirm your password.</p>
            <div>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div>
                <button> Confirm password </button>
            </div>
        </form>
    </div>
    <p> Want you to come back ? <a href="{{route('home')}}" id="return"> Return to home</a></p>
@endsection

@section('error')
    @if($errors->any())
        <ul style="list-style-type: none; padding:0px">
            @foreach($errors->all() as $error)
                <li id="error">❌ {{$error}} </li>
            @endforeach
        </ul>
    @endif
@endsection





