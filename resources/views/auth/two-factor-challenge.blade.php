@extends('layouts.app')

@section('style')
    {{URL::asset('css/sign.css')}}
@endsection

@section('title')
    Two factor authentication challenge
@endsection

@section('status')
    @if(session('status'))
        <p>{{session('status')}}</p>
    @endif
@endsection

@section('content')
    <div class="container" id="container">
        <form action="{{ route('two-factor.login') }}" method="POST">
            @csrf
            <h1> Two factor authentication </h1>
            <p>Enter your 6 digits code and tap the button below to sign in.</p>
            <div>
                <input type="text" name="code" placeholder="6 digits code" required>
            </div>
            <div>
                <button> Authenticate </button>
            </div>
            <p>Lost your two factor authenticaton ? <a href="{{route('two.factor.recovery')}}" id="return"> Recovery codes </a></p>
        </form>
    </div>
    <p> Want you to come back ? <a href="{{route('home')}}" id="return"> Return to sign form</a></p>
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





