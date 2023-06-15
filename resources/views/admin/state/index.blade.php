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
		<div class="col-md-8">
	        <div class="card">
	          <h6 class="card-header">State List</h6>
	          <div class="pd-10 pd-sm-15">
		          <div class="table-wrapper">
		            <table id="datatable1" class="table display responsive nowrap">
		              <thead>
		                <tr>
		                  <th class="wd-5p">SL</th>
		                  <th class="wd-20p">Division</th>
		                  <th class="wd-20p">District</th>
		                  <th class="wd-20p">State</th>
		                  <th class="wd-15p">Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              	@foreach($states as $state)
		              	<tr>
		                  <td>{{$loop->iteration}}</td>
		                  <td>{{$state->division->division_name}}</td>
		                  <td>{{$state->district->district_name}}</td>
		                  <td>{{$state->state_name}}</td>
		                  <td>
		                  	<a href="{{route('admin.state.edit',$state->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
		                  	<a href="{{route('admin.state.destroy',$state->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
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
				<div class="card-header">Add State</div>
				<div class="card-body">
					<form action="{{route('admin.state.store')}}" method="POST">
						@csrf
						<div class="form-group">
		                  <label class="form-control-label">Select Division: <span class="tx-danger">*</span></label>
		                  <select class="form-control select2-show-search" name="division_id" data-placeholder="Choose one">
			                  <option label="Choose one"></option>
			                  @foreach($divisions as $division)
			                  <option value="{{$division->id}}">{{$division->division_name}}</option>
			                  @endforeach
		                </select>
		                  @error('division_id')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Select District: <span class="tx-danger">*</span></label>
		                  <select class="form-control select2-show-search" name="district_id" data-placeholder="Choose one">
			                  <option label="Choose one"></option>
		                </select>
		                  @error('district_id')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">State Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="state_name" value="{{old('state_name')}}" placeholder="State Name">
		                  @error('state_name')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Add State">
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
		$('select[name="division_id"]').on('change',function(){
			var division_id = $(this).val();
			if(division_id){
				$.ajax({
					url:"{{url('/admin/district-ajax')}}/"+division_id,
					type:'GET',
					dataType:'json',
					success:function(data){
						var id = $('select[name="district_id"]').empty();
						$.each(data,function(key, value){
							$('select[name="district_id"]').append('<option value="'+value.id+'">'+value.district_name+'</option>');
						});
					}
				});
			}
		});
	});
</script>
@endsection
