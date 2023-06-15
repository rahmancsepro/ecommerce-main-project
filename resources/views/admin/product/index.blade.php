@section('products')
	active show-sub
@endsection

@section('all-product')
	active
@endsection
@section('title')
	All Products
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">Products</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-12">
	        <div class="card">
	          <h6 class="card-header">Products List</h6>
	          <div class="pd-10 pd-sm-15">
		          <div class="table-wrapper">
		            <table id="datatable1" class="table display responsive nowrap">
		              <thead>
		                <tr>
		                  <th class="wd-5p">SL</th>
		                  <th class="wd-20p">Thumbnail</th>
		                  <th class="wd-20p">English Name</th>
		                  <th class="wd-10p">Code</th>
		                  <th class="wd-10p">Quntity</th>
		                  <th class="wd-10p">Discount</th>
		                  <th class="wd-10p">Status</th>
		                  <th class="wd-15p">Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              	@foreach($products as $product)
		              	<tr>
		                  <td>{{$loop->iteration}}</td>
		                  <td><img src="{{ asset($product->product_thumbnail)}}" style="width: 70px;"></td>
		                  <td>{{$product->product_name_en}}</td>
		                  <td>{{$product->product_code}}</td>
		                  <td>{{$product->product_qty}}</td>
		                  <td>
		                  	 @if ($product->discount_price == NULL)
                          	<span class="badge badge-pill badge-danger">No</span>
                          @else
                          @php
                             $amount = $product->selling_price - $product->discount_price;
                             $discount =  ( $amount/$product->selling_price) * 100;
                          @endphp
                             <span class="badge badge-pill badge-danger">{{ round($discount) }}%</span>
                          @endif
		                  </td>
		                  <td>
		                  	@if($product->status==1)
		                  	<a href="{{route('admin.product.inactive',$product->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
		                  	@else
		                  	<a href="{{route('admin.product.active',$product->id)}}" class="btn btn-info btn-sm"><i class="fa fa-check"></i></a>
		                  	@endif
		                  </td>
		                  
		                  <td>
		                  	<a href="{{route('admin.product.edit',$product->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
		                  	<a href="{{route('admin.product.show',$product->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
		                  	<a href="{{route('admin.product.destroy',$product->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
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