@extends('layouts.app')

@section('style')
    {{URL::asset('css/sign.css')}}
@endsection

@section('title')
    Two factor authentication recovery
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
            <h1> Two factor authentication recovery </h1>
            <p>Use one of your recovery codes and tap the button below to recover your account.</p>
            <div>
                <input type="text" name="recovery_code" placeholder="Recovery code" required>
            </div>
            <div>
                <button> Recover </button>
            </div>
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





