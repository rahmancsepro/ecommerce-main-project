@section('categories')
	active show-sub
@endsection

@section('sub-category')
	active
@endsection

@section('title')
	Sub Sub Category
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">Sub Sub Cateogry</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Update Sub Sub Category</div>
				<div class="card-body">
					<form action="{{route('admin.sub-sub-category.update',$subsubcategory->id)}}" method="POST">
						@csrf
						@method('PUT')
						<div class="form-group">
		                  <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
		                  <select class="form-control select2-show-search" name="category_id" data-placeholder="Choose one">
			                  <option label="Choose one"></option>
			                  @foreach($categories as $category)
			                  <option {{$category->id == $subsubcategory->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->category_name_en}}</option>
			                  @endforeach
		                </select>
		                  @error('category_id')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>

		                <div class="form-group">
		                  <label class="form-control-label">Sub Category Name: <span class="tx-danger">*</span></label>
		                  <select class="form-control select2-show-search" name="sub_category_id" data-placeholder="Choose one">
			                  <option label="Choose one"></option>
			                  @foreach($subcategories as $subcategory)
			                  <option {{$subcategory->id == $subsubcategory->sub_category_id ? 'selected' : ''}} value="{{$subcategory->id}}">{{$subcategory->subcategory_name_en}}</option>
			                  @endforeach
		                </select>
		                  @error('sub_category_id')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>

						<div class="form-group">
		                  <label class="form-control-label">English Sub Sub Category Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="subsubcategory_name_en" value="{{$subsubcategory->subsubcategory_name_en}}">
		                  @error('subsubcategory_name_en')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Bangla Sub Sub Category Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="subsubcategory_name_bn" value="{{$subsubcategory->subsubcategory_name_bn}}">
		                  @error('subsubcategory_name_bn')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Update Sub Sub Category">
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