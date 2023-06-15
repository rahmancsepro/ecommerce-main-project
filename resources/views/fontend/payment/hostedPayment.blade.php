@extends('layouts.fontend-master')
@section('title') 
	Cart ::
@endsection

@section('content')

<!-- ============ HEADER : END ======================= -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Hosted Payment</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
					<div class="checkout-progress-sidebar ">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="unicase-checkout-title">Your Amount</h4>
								</div>
								<div class="">
					            @if(Session::has('coupon'))
					            <p><strong>Sub Total : {{$cartSubTotal}}/=</strong></p>
					            <p><strong>Tax : {{$tax}}/=</strong></p>
					            <p><strong>Coupon Name : {{Session::get('coupon')['coupon_name']}}</strong></p>
					            <p><strong>Coupon Discount : {{Session::get('coupon')['coupon_discount']}}%</strong></p>
					            <p><strong>Discount Amount : ( - ) {{Session::get('coupon')['discount_amount']}}/=</strong></p>
					            <p><strong>Grand Total : {{Session::get('coupon')['total_amount']}}/=</strong></p>

					              @else
					              <p><strong>Sub Total : {{$cartSubTotal}}/=</strong></p>
					              <p><strong>Total Tax: {{$tax}}/=</strong></p>
					              <p><strong>Grand Total : {{$total_amount}}/=</strong></p>
					              @endif		
								</div>
							</div>
						</div>
					</div> 	<!-- checkout-progress-sidebar -->
				</div>
				<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
					<div class="checkout-progress-sidebar ">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="unicase-checkout-title">SSL Hosted Payment </h4>
								</div>

								<form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                <input type="hidden" value="{{$total_amount}}" name="amount" id="total_amount" required/>

                <input type="hidden" name="name" value="{{$data['shipping_name']}}">
								<input type="hidden" name="email" value="{{$data['shipping_email']}}">
								<input type="hidden" name="phone" value="{{$data['shipping_phone']}}">
								<input type="hidden" name="notes" value="{{$data['notes']}}">
								<input type="hidden" name="division_id" value="{{$data['division_id']}}">
								<input type="hidden" name="district_id" value="{{$data['district_id']}}">
								<input type="hidden" name="state_id" value="{{$data['state_id']}}">
								<input type="hidden" name="post_code" value="{{$data['post_code']}}">


                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                    <label class="custom-control-label" for="same-address">Shipping address is the same as my billing
                        address</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Save this information for next time</label>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout (Hosted)</button>
            </form>

							</div>
						</div>
					</div> 	<!-- checkout-progress-sidebar -->
				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
</div><!-- /.container -->
</div><!-- /.body-content -->


@endsection