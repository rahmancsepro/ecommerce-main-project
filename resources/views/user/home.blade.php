@extends('layouts.fontend-master')

@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Dashboard</li>
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
                        <form  method="POST" action="{{route('user.update-profile')}}">
                            @csrf
                            @method('PUT')
                              <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" value="{{ Auth::user()->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{ Auth::user()->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" aria-describedby="emailHelp" value="{{ Auth::user()->phone }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update</button>
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