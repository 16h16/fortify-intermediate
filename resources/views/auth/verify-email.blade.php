@extends('layouts.app')

@section('style')
    {{URL::asset('css/sign.css')}}
@endsection

@section('title')
    Email verification
@endsection

@section('content')
    <div class="container" id="container">
            <form action="{{ route('verification.send') }}" method="POST">
                @csrf
                <h1> Email verification </h1>
                <p> Tap the button below to verify your email address. </p>
                <div>
                    <button name="login"> Verify your email </button>
                </div>
            </form>
    </div>
    @if(session('status')=="verification-link-sent")
        <p id="status">✔ verification link sent successfully</p>
    @endif
@endsection

@section('script')
@endsection




