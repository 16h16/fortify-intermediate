@extends('layouts.app')

@section('style')
    {{URL::asset('css/sign.css')}}
@endsection

@section('title')
    Two factor authentication
@endsection

@section('status')
    @if(session('status')=="two-factor-authentication-enabled")
        <p id="status">✔ Two factor authentication successfully enabled</p>
    @endif
    @if(session('status')=="two-factor-authentication-disabled")
        <p id="status">✔ Two factor authentication successfully disabled</p>
    @endif
    @if(session('status')=="two-factor-authentication-confirmed")
        <p id="status">✔ Two factor authentication successfully confirmed</p>
    @endif
@endsection

@section('content')
    <div class="container" id="container">
        @if(!auth()->user()->two_factor_secret)
            <form action="{{ route('two-factor.enable') }}" method="POST">
                @csrf
                <h1>Two factor authentication</h1>
                <p> Tap the button below to enable two factor authentication. </p>
                <div>
                    <button> Enable </button>
                </div>
            </form>
        @elseif(is_null(auth()->user()->two_factor_confirmed_at))
                    <form action="{{ route('two-factor.confirm') }}" method="POST">
                        @csrf
                        <h1>Two factor authentication</h1>
                        <p> Please scan the following QR Code and confirm the 6 digits code. </p>
                        <div>
                            {!! auth()->user()->twoFactorQrCodeSvg() !!}
                        </div>
                        <div>
                            <input type="text" name="code" placeholder="Confirmation code" required>
                        </div>
                        <div>
                            <button> Confirm </button>
                        </div>
                    </form>
        @else
            <form action="{{ route('two-factor.disable') }}" method="POST">
                @csrf
                @method('DELETE')
                <h1>Two factor authentication</h1>

                <div>
                    <p> Please store these recovery codes in a secure location. </p>
                    <ul style="list-style-type: none; padding:0px">
                        @foreach(json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $recoveryCode)
                            <li> {{ $recoveryCode }} </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h2>Disable two factor authentication</h2>
                    <p> Tap the button below to disable two factor authentication. </p>
                    <div>
                        <button> Disable 2FA </button>
                    </div>
                </div>
            </form>
        @endif
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




