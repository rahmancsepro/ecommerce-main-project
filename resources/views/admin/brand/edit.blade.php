@section('brands')
	active
@endsection
@section('title')
	Brands
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">Brands</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-6 m-auto">
			<div class="card">
				<div class="card-header">Update Brands</div>
				<div class="card-body">
					<form action="{{route('admin.brand.update',$brand->id)}}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group">
		                  <label class="form-control-label">English Brand Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="brand_name_en" value="{{$brand->brand_name_en}}">
		                  @error('brand_name_en')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Bangla Brand Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="brand_name_bn" value="{{$brand->brand_name_bn}}">
		                  @error('brand_name_bn')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Brand Image: <span class="tx-danger">*</span></label> <br>
		                  <img src="{{asset($brand->brand_image)}}" style="width:100px" alt="image not found">
		                  <br>
		                  <input class="form-control" type="file" name="brand_image">
		                  @error('brand_image')
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