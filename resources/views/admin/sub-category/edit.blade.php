@section('categories')
	active show-sub
@endsection

@section('sub-category')
	active
@endsection

@section('title')
	Sub Category
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">Sub Cateogry</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Update Sub Category</div>
				<div class="card-body">
					<form action="{{route('admin.sub-category.update',$subcategory->id)}}" method="POST">
						@csrf
						@method('PUT')
						<div class="form-group">
		                  <label class="form-control-label">English Sub Category Name: <span class="tx-danger">*</span></label>
		                  <select class="form-control select2-show-search" name="category_id" data-placeholder="Choose one">
			                  <option label="Choose one"></option>
			                  @foreach($categories as $category)
			                  <option {{$category->id == $subcategory->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->category_name_en}}</option>
			                  @endforeach
		                </select>
		                  @error('category_id')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
						<div class="form-group">
		                  <label class="form-control-label">English Sub Category Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="subcategory_name_en" value="{{$subcategory->subcategory_name_en}}">
		                  @error('subcategory_name_en')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Bangla Sub Category Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="subcategory_name_bn" value="{{$subcategory->subcategory_name_bn}}">
		                  @error('subcategory_name_bn')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Update Sub Category">
		                </div>
		            </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection