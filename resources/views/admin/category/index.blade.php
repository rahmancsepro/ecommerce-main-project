@section('categories')
	active show-sub
@endsection

@section('category')
	active
@endsection
@section('title')
	Category
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
		                  <th class="wd-20p">Category En Name</th>
		                  <th class="wd-20p">Category Bn Name</th>
		                  <th class="wd-15p">Category Icon</th>
		                  <th class="wd-15p">Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              	@foreach($categories as $category)
		              	<tr>
		                  <td>{{$loop->iteration}}</td>
		                  <td>{{$category->category_name_en}}</td>
		                  <td>{{$category->category_name_bn}}</td>
		                  <td><i class="fa fa-trash"></i></td>
		                  <td>
		                  	<a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
		                  	<a href="{{route('admin.category.destroy',$category->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
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
				<div class="card-header">Add Category</div>
				<div class="card-body">
					<form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
		                  <label class="form-control-label">English Category Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="category_name_en" value="{{old('category_name_en')}}" placeholder="English Category Name">
		                  @error('category_name_en')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Bangla Category Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="category_name_bn" value="{{old('category_name_bn')}}" placeholder="Enter Bangla Brand Name">
		                  @error('category_name_bn')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Category Icon: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="category_icon" value="{{old('category_icon')}}" placeholder="Enter Bangla Brand Name">
		                  @error('category_icon')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Add Category">
		                </div>
		            </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection