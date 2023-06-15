@section('brands')
	active
@endsection

@section('title')
	Category
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">Cateogry</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Update Category</div>
				<div class="card-body">
					<form action="{{route('admin.category.update',$category->id)}}" method="POST">
						@csrf
						@method('PUT')
						<div class="form-group">
		                  <label class="form-control-label">English Category Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="category_name_en" value="{{$category->category_name_en}}">
		                  @error('category_name_en')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Bangla Category Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="category_name_bn" value="{{$category->category_name_bn}}">
		                  @error('category_name_bn')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Bangla Category Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="category_icon" value="{{$category->category_icon}}">
		                  @error('category_icon')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Update Category">
		                </div>
		            </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection