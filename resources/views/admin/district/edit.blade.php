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
		<div class="col-md-6 m-auto">
			<div class="card">
				<div class="card-header">Update District</div>
				<div class="card-body">
					<form action="{{route('admin.district.update',$district->id)}}" method="POST">
						@csrf
						@method('PUT')
						<div class="form-group">
		                  <label class="form-control-label">Select Division Name: <span class="tx-danger">*</span></label>
		                  <select class="form-control select2-show-search" name="division_id" data-placeholder="Choose one">
			                  <option label="Choose one"></option>
			                  @foreach($divisions as $division)
			                  <option {{$division->id == $district->division_id ? 'selected' : ''}} value="{{$division->id}}">{{$division->division_name}}</option>
			                  @endforeach
		                </select>
		                  @error('division_id')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
						<div class="form-group">
		                  <label class="form-control-label">District Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="district_name" value="{{$district->district_name}}">
		                  @error('district_name')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Update District">
		                </div>
		            </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection