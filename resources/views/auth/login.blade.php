@extends('layouts.loginform')
@section('content')
<!--form-->
<form id="loginForm" method="POST">
    <div class="login-title mb-3">
        Login
    </div>
     @csrf
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend"><i class="material-icons">account_circle</i></span>
        </div>
        <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{old('email')}}" aria-describedby="inputGroupPrepend" required autocomplete="email" autofocus>
        @error('email')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend"><i class="material-icons">lock</i>
        </div>
        <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" aria-describedby="inputGroupPrepend" required autocomplete="current-password">
        @error('password')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="custom-control custom-checkbox mr-sm-2 mb-1">
        <input name="remember" id="remember" type="checkbox" class="custom-control-input" {{old('remember')?'checked':''}}>
        <label class="custom-control-label" for="remember">Remember Me</label>
    </div>
    @if(Route::has('password.request'))
    <div class="form-group">
        <a href="#" onclick="document.getElementById('loginForm').submit()" class="loginButton mb-1">LOGIN</a>
        <div class="forgot-pass ">
        <h6>Forgot <a href="{{route('password.request')}}">Password?</a></h6>
        </div>
    </div>
    @endif

    <hr>
    <div class="form-group">

        <div class="forgot-pass mt-4">
        <h6>Don't have an account? <a href="{{route('register')}}" class="ml-2">Sign Up Here!</a></h6>
        </div>
    </div>
</form>

@endSection