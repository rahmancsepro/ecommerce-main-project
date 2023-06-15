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
		<div class="col-md-6 m-auto">
			<div class="card">
				<div class="card-header">Update Division</div>
				<div class="card-body">
					<form action="{{route('admin.division.update',$division->id)}}" method="POST">
						@csrf
						@method('PUT')
						<div class="form-group">
		                  <label class="form-control-label">Division Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="division_name" value="{{$division->division_name}}">
		                  @error('division_name')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Update Division">
		                </div>
		            </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection