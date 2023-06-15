@section('brands')
	active
@endsection
@section('title')
	Slider
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">Sliders</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Update Slider</div>
				<div class="card-body">
					<form action="{{route('admin.slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group">
		                  <label class="form-control-label">English Slider Title: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="title_en" value="{{$slider->title_en}}">
		                  @error('title_en')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Bangla Slider Title: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="title_bn" value="{{$slider->title_bn}}">
		                  @error('title_bn')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">English Slider Description: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="description_en" value="{{$slider->description_en}}">
		                  @error('description_en')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Bangla Slider Description: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="description_bn" value="{{$slider->description_bn}}">
		                  @error('description_bn')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Slider Image: <span class="tx-danger">*</span></label> <br>
		                  <img src="{{asset($slider->image)}}" style="width:100px" alt="image not found">
		                  <br>
		                  <input class="form-control" type="file" name="image">
		                  @error('image')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Update">
		                </div>
		            </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection