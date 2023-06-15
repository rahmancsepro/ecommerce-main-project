@section('shiping-area')
	active show-sub
@endsection

@section('state')
	active
@endsection

@section('title')
	State
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">State</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Update State</div>
				<div class="card-body">
					<form action="{{route('admin.state.update',$state->id)}}" method="POST">
						@csrf
						@method('PUT')
						<div class="form-group">
		                  <label class="form-control-label">Division Name: <span class="tx-danger">*</span></label>
		                  <select class="form-control select2-show-search" name="division_id" data-placeholder="Choose one">
			                  <option label="Choose one"></option>
			                  @foreach($divisions as $division)
			                  <option {{$division->id == $state->division_id ? 'selected' : ''}} value="{{$division->id}}">{{$division->division_name}}</option>
			                  @endforeach
		                </select>
		                  @error('division_id')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>

		                <div class="form-group">
		                  <label class="form-control-label">District Name: <span class="tx-danger">*</span></label>
		                  <select class="form-control select2-show-search" name="district_id" data-placeholder="Choose one">
			                  <option label="Choose one"></option>
			                  @foreach($districts as $district)
			                  <option {{$district->id == $state->district_id ? 'selected' : ''}} value="{{$district->id}}">{{$district->district_name}}</option>
			                  @endforeach
		                </select>
		                  @error('district_id')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>

						<div class="form-group">
		                  <label class="form-control-label">State Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="state_name" value="{{$state->state_name}}">
		                  @error('state_name')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Update State">
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