@extends('layouts.loginform')
@section('content')
    <!--form-->
    <form method="POST"> 
                <div class="login-title mb-3">
                    Login
                </div>
                <!-- @csrf -->
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="material-icons">account_circle</i></span>
                    </div>
                    <input type="text" class="form-control" id="validationCustomUsername" placeholder="Email"
                        aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Email
                    </div>
                </div>
                <div class="input-group mb-3 mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="material-icons">lock</i>
                        </div>
                        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Password"
                            aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Password
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline">Remember Me</label>
                    </div>

                <div class="form-group">
                         <a href="#" class="loginButton mb-1">LOGIN</a>
                         <div class="forgot-pass ">
                            <h6>Forgot <a href="#">Password?</a></h6>
                         </div>
                </div>
                <hr>
                <div class="form-group">
                        
                        <div class="forgot-pass mt-4">
                           <h6>Don't have an account? <a href="#" class="ml-2">Sign Up Here!</a></h6>
                        </div>
               </div>
            </form>

@endSection
