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
	<span class="breadcrumb-item active">Brands</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-8">
	        <div class="card">
	          <h6 class="card-header">Sub Category List</h6>
	          <div class="pd-10 pd-sm-15">
		          <div class="table-wrapper">
		            <table id="datatable1" class="table display responsive nowrap">
		              <thead>
		                <tr>
		                  <th class="wd-5p">SL</th>
		                  <th class="wd-20p">Category</th>
		                  <th class="wd-20p">Sub Category</th>
		                  <th class="wd-15p">Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              	@foreach($subcategories as $subcategory)
		              	<tr>
		                  <td>{{$loop->iteration}}</td>
		                  <td>{{$subcategory->category->category_name_en}}</td>
		                  <td>{{$subcategory->subcategory_name_en}}</td>
		                  <td>
		                  	<a href="{{route('admin.sub-category.edit',$subcategory->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
		                  	<a href="{{route('admin.sub-category.destroy',$subcategory->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
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
				<div class="card-header">Add Sub Category</div>
				<div class="card-body">
					<form action="{{route('admin.sub-category.store')}}" method="POST">
						@csrf
						<div class="form-group">
		                  <label class="form-control-label">Select Category: <span class="tx-danger">*</span></label>
		                  <select class="form-control select2-show-search" name="category_id" data-placeholder="Choose one">
			                  <option label="Choose one"></option>
			                  @foreach($categories as $category)
			                  <option value="{{$category->id}}">{{$category->category_name_en}}</option>
			                  @endforeach
		                </select>
		                  @error('category_id')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">English Sub Category Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="subcategory_name_en" value="{{old('subcategory_name_en')}}" placeholder="English Category Name">
		                  @error('subcategory_name_en')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Bangla Sub Category Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="subcategory_name_bn" value="{{old('subcategory_name_bn')}}" placeholder="Enter Bangla Brand Name">
		                  @error('subcategory_name_bn')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Add Sub Category">
		                </div>
		            </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection