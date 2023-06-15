@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="index.html">Boiutso</a>
<span class="breadcrumb-item active">Profile</span>
</nav>

<div class="sl-pagebody">
  <div class="row row-sm">
    <div class="col-md-4 ">
        @include('admin.profile.inc.sidebar')
    </div>
    <div class="col-md-8 mt-1">
      <div class="card">
        <h3 class="text-center"></h3>
            <div class="card-body">
                <form  method="POST" action="{{route('admin.profile.update')}}">
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
  </div><!-- row -->
</div><!-- sl-pagebody -->


@endsection