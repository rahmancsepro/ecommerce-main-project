@section('orders')
	active show-sub
@endsection

@section('pending-order')
	active
@endsection
@section('title')
	Pending Order
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">Pending Order</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-12">
	        <div class="card">
	          <h6 class="card-header">Pending Order List</h6>
	          <div class="pd-10 pd-sm-15">
		          <div class="table-wrapper">
		            <table id="datatable1" class="table display responsive nowrap">
		              <thead>
		                <tr>
		                  <th class="wd-5p">SL</th>
		                  <th class="wd-20p">Order Date</th>
		                  <th class="wd-20p">Invoice No</th>
		                  <th class="wd-20p">Transaction Id</th>
		                  <th class="wd-5p">Amount</th>
		                  <th class="wd-5p">Status</th>
		                  <th class="wd-10p">Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              	@foreach($orders as $item)
		              	<tr>
		                  <td>{{$loop->iteration}}</td>
		                  <td>{{$item->order_date}}</td>
		                  <td>{{$item->invoice_no}}</td>
		                  <td>{{$item->transaction_id}}</td>
		                  <td>{{$item->amount}}/=</td>
		                  <td>
		                  	<span class="badge badge-pill badge-danger">{{$item->status}}</span>
		                  </td>
		                  <td>
		                  	<a href="{{route('admin.view-order',$item->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
		                  	<a href="{{route('admin.division.destroy',$item->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
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