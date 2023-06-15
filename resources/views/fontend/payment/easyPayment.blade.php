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
									<h4 class="unicase-checkout-title">SSL Easy Payment </h4>
								</div>

				<form  method="POST" class="needs-validation" novalidate>
                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                <input type="hidden" id="total_amount" value="{{$total_amount}}" name="amount"  required/>

                <input type="hidden" id="name" name="name" value="{{$data['shipping_name']}}">
				<input type="hidden" id="email" name="email" value="{{$data['shipping_email']}}">
				<input type="hidden" id="phone" name="phone" value="{{$data['shipping_phone']}}">
				<input type="hidden" id="notes" name="notes" value="{{$data['notes']}}">
				<input type="hidden" id="division_id" name="division_id" value="{{$data['division_id']}}">
				<input type="hidden" id="district_id" name="district_id" value="{{$data['district_id']}}">
				<input type="hidden" id="state_id" name="state_id" value="{{$data['state_id']}}">
				<input type="hidden" id="post_code" name="post_code" value="{{$data['post_code']}}">


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
                 <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                </button>
            </form>

							</div>
						</div>
					</div> 	<!-- checkout-progress-sidebar -->
				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
</div><!-- /.container -->
</div><!-- /.body-content -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


<!-- If you want to use the popup integration, -->
<script>
    var obj = {};
    obj.cus_name = $('#name').val();
    obj.cus_phone = $('#phone').val();
    obj.cus_email = $('#email').val();
    obj.notes = $('#notes').val();
    obj.division_id = $('#division_id').val();
    obj.district_id = $('#district_id').val();
    obj.state_id = $('#state_id').val();
    obj.post_code = $('#post_code').val();
    obj.amount = $('#total_amount').val();

    $('#sslczPayBtn').prop('postdata', obj);

    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>

@endsection