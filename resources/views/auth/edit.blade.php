@extends('layouts.app')

@section('style')
    {{URL::asset('css/sign.css')}}
@endsection

@section('title')
    Edit profile
@endsection

@section('status')
    @if(session('status')=="profile-information-updated")
        <p id="status">✔ Profile informations successfully updated</p>
    @endif
@endsection

@section('content')
    <div class="container" id="container">
        <form action="{{ route('user-profile-information.update') }}" method="POST">
            @method('PUT')
            @csrf

            <h1> Edit your profile </h1>
            <p> Enter your new name and email address and tap the button below to register. </p>
            <input type="text" placeholder="Name" name="name" required />
            <input type="email" placeholder="Email" name="email" required />
            <div>
                <button> Update Profile </button>
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




