@section('reviews')
	active
@endsection
@section('title')
	Product Reviews
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">Product Reviews</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-12">
	        <div class="card">
	          <h6 class="card-header">Product Reviews List</h6>
	          <div class="pd-10 pd-sm-15">
		          <div class="table-wrapper">
		            <table id="datatable1" class="table display responsive nowrap">
		              <thead>
		                <tr>
		                  <th class="wd-5p">SL</th>
		                  <th class="wd-20p">User Name</th>
		                  <th class="wd-20p">Product Name</th>
		                  <th class="wd-30p">Comments</th>
		                  <th class="wd-5p">Rating</th>
		                  <th class="wd-10p">Status</th>
		                  <th class="wd-10p">Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              	@foreach($reviews as $review)
		              	<tr>
		                  <td>{{$loop->iteration}}</td>
		                  <td>{{$review->user->name}}</td>
		                  <td>{{$review->product->product_name_en}}</td>
		                  <td>{{$review->comment}}</td>
		                  <td>{{$review->rating}}</td>
		                  <td>
		                  	@if($review->status == "pending")
		                  	<a href="{{route('admin.review.approve',$review->id)}}" class="btn btn-success btn-sm" id="review"><i class="fa fa-check"></i></a>
		                  	@else
		                  	<a href="{{route('admin.review.pending',$review->id)}}" class="btn btn-danger btn-sm" id="review"><i class="fa fa-times"></i></a>
		                  	@endif
		                  	</td>
		                  <td>
		                  	<a href="{{route('admin.review.destroy',$review->id)}}" class="btn btn-primary btn-sm" id="delete"><i class="fa fa-trash"></i></a>
		                  </td>
		                </tr>
		              	@endforeach
		              </tbody>
		            </table>
		          </div><!-- table-wrapper -->
	          </div>
	        </div><!-- card -->
		</div>
	</div>
</div>
@endsection