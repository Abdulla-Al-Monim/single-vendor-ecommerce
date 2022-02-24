@extends('layouts.fontend-master')
@section('fontend-content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class="active">Login</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div>
\<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->            
<div class="col-md-6 col-sm-6 sign-in">
    @error('banned')
        <h3 class="text-danger">{{ $message }}</h3>
    @enderror
    <h4 class="">Sign in</h4>
    <p class="">Hello, Welcome to your account.</p>
    <div class="social-sign-in outer-top-xs">
        <a href="{{ route('login.facebook') }}" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
        <a href="{{ route('login.google') }}" class="twitter-sign-in"><i class="fa fa-google"></i> Sign In with google</a>
    </div>
    <form class="register-form outer-top-xs" role="form" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
            <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1">
        </div>
        <div class="radio outer-xs">
            <label>
                <input  name="optionsRadios" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >Remember me!
            </label>
            <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
        </div>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
    </form>                 
</div>
<!-- Sign-in -->
<div class="col-md-6 col-sm-6 create-new-account">
    <h4 class="checkout-subtitle">Create a new account</h4>
    <p class="text title-tag-line">Create your new account.</p>
    <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2" name="email">
             @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="name">
        </div>
        @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="phone">
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
            <input type="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
            <input type="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="password_confirmation" required autocomplete="new-password">
           
        </div>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
    </form>
    
    
</div>

          </div><!-- /.row -->

        </div><!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
<!-- /.logo-slider -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->    </div><!-- /.container -->
</div>
@include('fontend.inc.brand')
@endsection
