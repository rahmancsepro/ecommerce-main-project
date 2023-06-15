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
		<div class="col-md-8">
	        <div class="card">
	          <h6 class="card-header">Coupons List</h6>
	          <div class="pd-10 pd-sm-15">
		          <div class="table-wrapper">
		            <table id="datatable1" class="table display responsive nowrap">
		              <thead>
		                <tr>
		                  <th class="wd-5p">SL</th>
		                  <th class="wd-20p">Name</th>
		                  <th class="wd-20p">Discount ( % )</th>
		                  <th class="wd-15p">Validaty</th>
		                  <th class="wd-15p">Status</th>
		                  <th class="wd-15p">Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              	@foreach($coupons as $coupon)
		              	<tr>
		                  <td>{{$loop->iteration}}</td>
		                  <td>{{$coupon->coupon_name}}</td>
		                  <td>{{$coupon->coupon_discount}} %</td>
		                  <td>{{Carbon\Carbon::parse($coupon->coupon_validaty)->format('D d F Y')}}</td>
		                  <td>
		                  	@if($coupon->coupon_validaty >= Carbon\Carbon::now()->format('Y-m-d'))
		                  	<button class="btn btn-info btn-sm">Valid</button>
		                  	@else
		                  	<button class="btn btn-danger btn-sm">Invalid</button>
		                  	@endif
		                  </td>
		                  <td>
		                  	<a href="{{route('admin.coupon.edit',$coupon->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
		                  	<a href="{{route('admin.coupon.destroy',$coupon->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
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
				<div class="card-header">Add Coupons</div>
				<div class="card-body">
					<form action="{{route('admin.coupon.store')}}" method="POST">
						@csrf
						<div class="form-group">
		                  <label class="form-control-label">Coupon Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="coupon_name" value="{{old('coupon_name')}}" placeholder="Enter Coupon Name">
		                  @error('coupon_name')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Coupon Discount: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="coupon_discount" min="0" max="100" value="{{old('coupon_discount')}}" placeholder="Enter Coupon Discount (%)">
		                  @error('coupon_discount')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Coupon Validate Date: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="date" name="coupon_validaty" min="{{Carbon\Carbon::now()->format('Y-m-d')}}">
		                  @error('coupon_validaty')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit">
		                </div>
		            </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection