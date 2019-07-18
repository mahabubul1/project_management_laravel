@extends('layouts.master')

@section('content')
<section class="signin" id="signin">
  <div class="container">
    <div class="">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form action="{{ route('login') }}" method="POST" id="signin-form">
                    @csrf
                <h2 class="tab-title text-center">Sign In</h2>
                @if(session('verify_message'))
                    <div class="alert alert-success">
                      {{ session('verify_message') }}
                    </div>
                @endif
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Your email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" value="" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group text-center submit-container">
                <input type="submit" name="signin" id="signin_submit" class="btn btn-lg btn-success" value="Sign in to your account">
                <br>
                <br>
                <a id="signup-tab" href="#profile">Don't have an account yet? Sign up here.</a>
                <br>
                <br>
                <a href="#" class="forgot-password">Forgot your password?</a>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form action="{{ route('register') }}" method="POST" id="signup-form">
                @csrf
              <h2 class="tab-title text-center">Sign Up</h2>
                <br>
                <div class="text-center">
                  <a id="signin-tab" href="#home" >Already have an account? Log in here.</a>
                </div>
              <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="" value="{{ old('first_name') }}">
                @if ($errors->has('first_name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                <label for="last_name">Last name</label>
                <input type="text" name="last_name" id="last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="" value="{{ old('last_name') }}">
                @if ($errors->has('last_name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                <label for="card_email">Email Address</label>
                <input type="email" name="email" id="card_email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                <label for="card_password">Password</label>
                <input type="password" name="password" id="card_password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="" value="">
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                <label for="password-confirm" class=" ">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
              <div class="form-group text-center submit-container">
                <input type="submit" name="signup" id="signup_submit" class="btn btn-lg btn-success" value="Sign Up">
              </div>
            </form>
            
          </div>
        </div>
        </div>
    </div>
</section>
@endsection
