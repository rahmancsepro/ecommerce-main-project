@section('categories')
	active show-sub
@endsection

@section('sub-sub-cateogry')
	active
@endsection

@section('title')
	Sub Sub Category
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">Sub Sub Category</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-8">
	        <div class="card">
	          <h6 class="card-header">Sub Sub Category List</h6>
	          <div class="pd-10 pd-sm-15">
		          <div class="table-wrapper">
		            <table id="datatable1" class="table display responsive nowrap">
		              <thead>
		                <tr>
		                  <th class="wd-5p">SL</th>
		                  <th class="wd-20p">Category</th>
		                  <th class="wd-20p">Sub Category</th>
		                  <th class="wd-20p">Sub Sub Category</th>
		                  <th class="wd-15p">Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              	@foreach($subsubcategories as $subsubcategory)
		              	<tr>
		                  <td>{{$loop->iteration}}</td>
		                  <td>{{$subsubcategory->category->category_name_en}}</td>
		                  <td>{{$subsubcategory->subcategory->subcategory_name_en}}</td>
		                  <td>{{$subsubcategory->subsubcategory_name_en}}</td>
		                  <td>
		                  	<a href="{{route('admin.sub-sub-category.edit',$subsubcategory->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
		                  	<a href="{{route('admin.sub-sub-category.destroy',$subsubcategory->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
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
					<form action="{{route('admin.sub-sub-category.store')}}" method="POST">
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
		                  <label class="form-control-label">Select Sub Category: <span class="tx-danger">*</span></label>
		                  <select class="form-control select2-show-search" name="sub_category_id" data-placeholder="Choose one">
			                  <option label="Choose one"></option>
		                </select>
		                  @error('sub_category_id')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">English Sub Sub Category Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="subsubcategory_name_en" value="{{old('subsubcategory_name_en')}}" placeholder="English Category Name">
		                  @error('subsubcategory_name_en')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Bangla Sub Sub Category Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="subsubcategory_name_bn" value="{{old('subsubcategory_name_bn')}}" placeholder="Enter Bangla Brand Name">
		                  @error('subsubcategory_name_bn')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Create Sub Sub Category">
		                </div>
		            </form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="{{asset('admin/lib/jquery/jquery.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('select[name="category_id"]').on('change',function(){
			var category_id = $(this).val();
			if(category_id){
				$.ajax({
					url:"{{url('/admin/sub-category-ajax')}}/"+category_id,
					type:'GET',
					dataType:'json',
					success:function(data){
						var id = $('select[name="sub_category_id"]').empty();
						$.each(data,function(key, value){
							$('select[name="sub_category_id"]').append('<option value="'+value.id+'">'+value.subcategory_name_en+'</option>');
						});
					}
				});
			}
		});
	});
</script>
@endsection
