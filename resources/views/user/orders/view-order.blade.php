@extends('layouts.fontend-master')

@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Orders</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
         <div class="row">
            <div class="col-md-3 ">
                @include('user.inc.sidebar')
            </div>
            <div class="col-md-9 mt-2">
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

                            @if ($order->return_reason != NULL)
                            <li class="list-group-item text-center">
                                <strong>Return :</strong>
                                <span class="badge badge-pill badge-warning" style="background: red; text:white;">You Have Send a Return Request</span>
                                <br>
                            </li>
                            @endif

                        </ul>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 m-auto">
                          <div class="table-responsive">
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
                                          @if ($order->status == 'Deliver')
                                          <td class="col-md-1">
                                              <label for="">Review</label>
                                          </td>
                                        @endif

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
                                        @if ($order->status == 'Deliver')
                                          <td class="col-md-1">
                                            <a href="{{ url('user/review-create/'.$item->product_id) }}" class="btn btn-info btn-sm">Review</a>
                                          </td>
                                        @endif

                                      </tr>
                                   @endforeach
                                  </tbody>
                              </table>
                          </div>
                        </div>
                    </div>
                    @if($order->status == "Deliver" && $order->return_date == NULL)
                    <form action="{{route('user.send-return-order',$order->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="label">Do You want To Return This Order?:</label>
                            <textarea name="return_reason" id="label"  class="form-control" cols="30" rows="05" placeholder="Return Reason"></textarea>
                        </div>
                        @error('return_reason')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>
                        <button type="submit" class="btn btn-sm btn-danger">Submit</button>
                    </form>
                    @endif
            </div>
          </div>
    </div>
</div>
</div>
@endsection