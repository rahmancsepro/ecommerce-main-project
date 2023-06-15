@section('coupon')
	active
@endsection
@section('title')
	Coupons
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">Coupons</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-6 m-auto">
			<div class="card">
				<div class="card-header">Update Coupons</div>
				<div class="card-body">
					<form action="{{route('admin.coupon.update',$coupon->id)}}" method="POST">
						@csrf
						@method('PUT')
						<div class="form-group">
		                  <label class="form-control-label">Coupon Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="coupon_name" value="{{$coupon->coupon_name}}" placeholder="Enter Coupon Name">
		                  @error('coupon_name')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Coupon Discount: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="coupon_discount" min="0" max="100" value="{{$coupon->coupon_discount}}" placeholder="Enter Coupon Discount (%)">
		                  @error('coupon_discount')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Coupon Validate Date: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="date" name="coupon_validaty" value="{{$coupon->coupon_validaty}}" min="{{Carbon\Carbon::now()->format('Y-m-d')}}">
		                  @error('coupon_validaty')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Update Coupon">
		                </div>
		            </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection