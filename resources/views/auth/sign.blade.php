@extends('layouts.app')

@section('title')
    Sign
@endsection

@section('style')
    {{URL::asset('css/sign.css')}}
@endsection

@section('status')
    @if(session('status')=="Your password has been reset!")
        <p id="status">✔ Your password has been successfully reset</p>
    @endif
@endsection

@section('content')
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="{{route('login.google')}}" class="social"><img width="25" height="auto" src="{{URL::asset('image/google_logo.png')}}"></a>
                    <a href="{{route('login.github')}}" class="social"><img width="25" height="auto" src="{{URL::asset('image/github_logo.png')}}"></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" name="name" required />
                <input type="email" placeholder="Email" name="email" required />
                <input type="password" placeholder="Password" name="password" required />
                <input type="password" placeholder="Password confirmation" name="password_confirmation" required />
                <button>Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="{{route('login.google')}}" class="social"><img width="25" height="auto" src="{{URL::asset('image/google_logo.png')}}"></a>
                    <a href="{{route('login.github')}}" class="social"><img width="25" height="auto" src="{{URL::asset('image/github_logo.png')}}"></a>
                </div>
                <span>or use your account</span>

                <input type="email" placeholder="Email" name="email" @if(Cookie::has('email')) value="{{Cookie::get('email')}}" @endif required/>
                <input type="password" placeholder="Password" name="password" @if(Cookie::has('password')) value="{{Cookie::get('password')}}" @endif required/>
                <label style="font-size: 0.8em" for="rememberme">Remember me</label>
                <input type="checkbox" name="rememberme" id="rememberme" @if(Cookie::has('email')) checked @endif>
                <a href="{{route('password.request')}}">Forgot your password?</a>
                <button>Sign In</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Already have an account ?</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Don't have an account ?</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
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

@section('script')
    <script src="{{URL::asset('js/sign.script')}}"></script>
@endsection




