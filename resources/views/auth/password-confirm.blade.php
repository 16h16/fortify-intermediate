@extends('layouts.app')

@section('style')
    {{URL::asset('css/sign.css')}}
@endsection

@section('title')
    Password confirmation
@endsection

@section('content')
    <div class="container" id="container">
        <form action="{{ route('password.confirm') }}" method="POST">
            @csrf
            <h1> Password confirmation </h1>
            <div>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div>
                <button> Confirm password </button>
            </div>
        </form>
    </div>

    @error('password')
    <p id="error">❌ {{$message}}</p>
    @enderror
    @if(session('status'))
        <p>{{session('status')}}</p>
    @endif
    <p> Want you to come back ? <a href="{{route('home')}}" id="return"> Return to home</a></p>
@endsection





