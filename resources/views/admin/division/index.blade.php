@section('shiping-area')
	active show-sub
@endsection

@section('division')
	active
@endsection
@section('title')
	Division
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">Division</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-8">
	        <div class="card">
	          <h6 class="card-header">Division List</h6>
	          <div class="pd-10 pd-sm-15">
		          <div class="table-wrapper">
		            <table id="datatable1" class="table display responsive nowrap">
		              <thead>
		                <tr>
		                  <th class="wd-5p">SL</th>
		                  <th class="wd-20p">Division Name</th>
		                  <th class="wd-15p">Status</th>
		                  <th class="wd-15p">Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              	@foreach($divisions as $division)
		              	<tr>
		                  <td>{{$loop->iteration}}</td>
		                  <td>{{$division->division_name}}</td>
		                  <td>
		                  	@if($division->status==1)
		                  	<a href="{{route('admin.division.inactive',$division->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
		                  	@else
		                  	<a href="{{route('admin.division.active',$division->id)}}" class="btn btn-info btn-sm"><i class="fa fa-check"></i></a>
		                  	@endif
		                  </td>
		                  <td>
		                  	<a href="{{route('admin.division.edit',$division->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
		                  	<a href="{{route('admin.division.destroy',$division->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
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
				<div class="card-header">Add Division</div>
				<div class="card-body">
					<form action="{{route('admin.division.store')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
		                  <label class="form-control-label">Division Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="division_name" value="{{old('division_name')}}" placeholder="Division Name">
		                  @error('division_name')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Add Division">
		                </div>
		            </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection