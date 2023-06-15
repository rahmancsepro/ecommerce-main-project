@section('orders')
	active
@endsection

@section('title')
	View Order
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">View Order</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-12">
	        <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item active text-center">Shipping Information</li>
                            <li class="list-group-item">
                                <strong>Name:</strong> {{ $order->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>Phone:</strong>
                                {{ $order->phone }}
                            </li>
                            <li class="list-group-item">
                                <strong>Email:</strong>
                                {{ $order->email }}
                            </li>
                            <li class="list-group-item">
                                <strong>Division:</strong>
                                {{ $order->division->division_name }}
                            </li>
                            <li class="list-group-item">
                                <strong>District:</strong>
                                {{ $order->district->district_name }}
                            </li>
                            <li class="list-group-item">
                                <strong>State:</strong>
                                {{ $order->state->state_name }}
                            </li>

                                <li class="list-group-item">
                                    <strong>Post Code:</strong>
                                    {{ $order->post_code }}
                                </li>
                            <li class="list-group-item">
                                <strong>Order Date:</strong>
                                {{ $order->order_date }}
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item active text-center">Order Information</li>
                            <li class="list-group-item">
                                <strong>Name:</strong> {{ $order->user->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>Phone:</strong>
                                {{ $order->user->phone }}
                            </li>
                            <li class="list-group-item">
                                <strong>Payment By:</strong>
                                {{ $order->payment_method }}
                            </li>
                            <li class="list-group-item">
                                <strong>TNX Id:</strong>
                                {{ $order->transaction_id }}
                            </li>

                                <li class="list-group-item">
                                    <strong>Invoice No:</strong>
                                    {{ $order->invoice_no }}
                                </li>
                            <li class="list-group-item">
                                <strong>Order Total:</strong>
                                {{ $order->amount }}Tk
                            </li>

                            <li class="list-group-item">
                                <strong>Order Status:</strong>
                                <span class="badge badge-pill badge-primary">{{ $order->status }}</span> <br>

                            </li>

                            <li class="list-group-item">
                                @if($order->status == "Pending")
                                <a href="{{route('admin.pending-to-confirm',$order->id)}}" id="confirm" class="btn btn-info btn-block">Confirm</a>
                                
                                <a href="{{route('admin.pending-to-cancel',$order->id)}}" id="cancel" class="btn btn-info btn-block">Cancel</a>
                                @elseif($order->status == "Confirm")
                                <a href="{{route('admin.confirm-to-processing',$order->id)}}" id="processing" class="btn btn-info btn-block">Processing</a>
                                @elseif($order->status == "Processing")
                                <a href="{{route('admin.processing-to-picked',$order->id)}}" id="picked" class="btn btn-info btn-block">Picked</a>
                                @elseif($order->status == "Picked")
                                <a href="{{route('admin.picked-to-shipped',$order->id)}}" id="shipped" class="btn btn-info btn-block">Shipped</a>
                                @elseif($order->status == "Shipped")
                                <a href="{{route('admin.shipped-to-deliver',$order->id)}}" id="deliver" class="btn btn-info btn-block">Deliver</a>
                                @endif
                            </li>

                        </ul>
                    </div>
                </div>
		</div>
	</div>
	        <div class="row">
	        	<div class="col-md-12">
	        	<div class="table-responsive mt-2">
                  <table class="table">
                  	<tbody>
                          <tr style="background: #E9EBEC;">
                              <td class="col-md-3">
                                  <label for="">Image</label>
                              </td>
                              <td class="col-md-3">
                              <label for="">Poduct Name</label>
                              </td>

                              <td class="col-md-2">
                                  <label for="">Poduct Code</label>
                              </td>

                              <td class="col-md-1">
                                  <label for="">Quantity</label>
                              </td>

                              <td class="col-md-2">
                                  <label for="">Sub Total</label>
                              </td>

                          </tr>

                       @foreach ($order->orderItems as $item)
                          <tr>
                              <td class="col-md-3"><img src="{{ asset($item->product->product_thumbnail) }}" height="50px;" width="50px;" alt="imga"></td>
                              <td class="col-md-3">
                                  <div class="product-name"><strong>{{ $item->product->product_name_en }}</strong>
                                  </div>
                              </td>

                              <td class="col-md-2">
                              <strong>{{ $item->product->product_code }}</strong>
                              </td>

                              <td class="col-md-1">
                              <strong>{{ $item->price }} X {{ $item->qty }}</strong>
                              </td>

                              <td class="col-md-2">
                              <strong>৳ {{ $item->price * $item->qty }}/=</strong>
                            </td>
                          </tr>
                       @endforeach
                      </tbody>
                  </table>
              </div>
             </div>
		</div>
	</div>
</div>
@endsection