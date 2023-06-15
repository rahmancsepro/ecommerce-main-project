@extends('layouts.fontend-master')

@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Login</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
    <div class="sign-in-page">
        <div class="row">
            <div class="col-md-4 ">
                @include('user.inc.sidebar')
            </div>
            <div class="col-md-8 mt-1">
              <div class="card">
                <h3 class="text-center"> <span class="text-danger">Hi..!</span> <strong class="text-warning">{{ Auth::user()->name }}</strong> Update Your profile</h3>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.store-password')}}">
                            @csrf
                            @method('PUT')
                              <div class="form-group">
                                <label for="password">Enter Old Password</label> <br>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="new_password">Enter New Password</label> <br>
                                <input type="password" name="new_password" class="form-control">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="confirmation_password">Enter Confirmation Password</label> <br>
                                <input type="password" name="confirmation_password" class="form-control">
                                @error('confirmation_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Change Password</button>
                            </div>
                        </form>
                    </div>
              </div>
            </div>
          </div>
    </div>
</div>
</div>
@endsection