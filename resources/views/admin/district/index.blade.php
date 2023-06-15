@section('shiping-area')
	active show-sub
@endsection

@section('district')
	active
@endsection

@section('title')
	District
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">District</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-8">
	        <div class="card">
	          <h6 class="card-header">District List</h6>
	          <div class="pd-10 pd-sm-15">
		          <div class="table-wrapper">
		            <table id="datatable1" class="table display responsive nowrap">
		              <thead>
		                <tr>
		                  <th class="wd-5p">SL</th>
		                  <th class="wd-20p">Division</th>
		                  <th class="wd-20p">District</th>
		                  <th class="wd-20p">Status</th>
		                  <th class="wd-15p">Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              	@foreach($districts as $district)
		              	<tr>
		                  <td>{{$loop->iteration}}</td>
		                  <td>{{$district->division->division_name}}</td>
		                  <td>{{$district->district_name}}</td>
		                  <td>
		                  	@if($district->status==1)
		                  	<a href="{{route('admin.district.inactive',$district->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
		                  	@else
		                  	<a href="{{route('admin.district.active',$district->id)}}" class="btn btn-info btn-sm"><i class="fa fa-check"></i></a>
		                  	@endif
		                  </td>
		                  <td>
		                  	<a href="{{route('admin.district.edit',$district->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
		                  	<a href="{{route('admin.district.destroy',$district->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
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
				<div class="card-header">Add District</div>
				<div class="card-body">
					<form action="{{route('admin.district.store')}}" method="POST">
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
		                  <label class="form-control-label">District Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="district_name" value="{{old('district_name')}}" placeholder="District Name">
		                  @error('district_name')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Add Disctrict">
		                </div>
		            </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection