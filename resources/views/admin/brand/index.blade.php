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
		<div class="col-md-8">
	        <div class="card">
	          <h6 class="card-header">Brands List</h6>
	          <div class="pd-10 pd-sm-15">
		          <div class="table-wrapper">
		            <table id="datatable1" class="table display responsive nowrap">
		              <thead>
		                <tr>
		                  <th class="wd-5p">SL</th>
		                  <th class="wd-20p">Brand Name</th>
		                  <th class="wd-20p">Brand Name</th>
		                  <th class="wd-15p">Image</th>
		                  <th class="wd-15p">Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              	@foreach($brands as $brand)
		              	<tr>
		                  <td>{{$loop->iteration}}</td>
		                  <td>{{$brand->brand_name_en}}</td>
		                  <td>{{$brand->brand_name_bn}}</td>
		                  <td>
		                  	<img src="{{asset($brand->brand_image)}}" style="width:70px;" alt="Icon not found">
		                  </td>
		                  <td>
		                  	<a href="{{route('admin.brand.edit',$brand->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
		                  	<a href="{{route('admin.brand.destroy',$brand->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
		                  </td>
		                </tr>
		              	@endforeach
		              </tbody>
		            </table>
		          </div><!-- table-wrapper -->
	          </div>
	        </div><!-- card -->
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">Add Brands</div>
				<div class="card-body">
					<form action="{{route('admin.brand.store')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
		                  <label class="form-control-label">English Brand Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="brand_name_en" value="{{old('brand_name_en')}}" placeholder="Enter English Brand Name">
		                  @error('brand_name_en')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Bangla Brand Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="brand_name_bn" value="{{old('brand_name_bn')}}" placeholder="Enter Bangla Brand Name">
		                  @error('brand_name_bn')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Brand Image: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="file" name="brand_image">
		                  @error('brand_image')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit">
		                </div>
		            </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection