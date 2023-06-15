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
                        <form method="POST" action="{{route('user.update-image')}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                              <div class="form-group">
                                <label for="image">Update Your Image</label> <br>
                                @if(Auth::user()->image == null)
                                  <img class="card-img-top"  style="border-radius: 50%;" src="{{ asset('fontend/media/avatar.jpg') }}" width="20%;" alt="Card image cap">
                                  @else
                                  <img class="card-img-top"  style="border-radius: 50%;" src="{{ asset(Auth::user()->image) }}" width="20%;" alt="Card image cap">
                                  @endif
                                <input type="file" name="image" class="form-control">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update Image</button>
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