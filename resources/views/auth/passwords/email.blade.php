@extends('layouts.fontend-master')

@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Reset Password</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->            
<div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 sign-in">
    <h4 class="">Reset Password</h4>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form class="register-form outer-top-xs" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group">
            <label class="info-title" for="email">Email Address <span>*</span></label>
            <input type="email" name="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" id="email" autocomplete="email" autofocus >
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>
        <a href="{{route('login')}}" class="btn-upper btn btn-primary checkout-page-button">Return To Login</a>
    </form>                 
</div>
<!-- Sign-in --> 
<!-- create a new account -->          
</div><!-- /.row -->
</div><!-- /.sigin-in-->

@endsection
