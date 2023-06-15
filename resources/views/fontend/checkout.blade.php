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
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-7">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
						<div class="panel panel-default checkout-step-01">
							<div class="panel-collapse collapse in">

								<!-- panel-body  -->
							    <div class="panel-body">
									<div class="row">
										<!-- already-registered-login -->
										<h1 class="checkout-subtitle"><strong>Shiping Addres</strong></h1>
										<form class="register-form" action="{{route('user.checkout.store')}}" method="POST">
											@csrf
										<div class="col-md-6 col-sm-6 already-registered-login">
											<div class="form-group">
							                  <label class="form-control-label">Name <span class="tx-danger">*</span></label>
							                  <input class="form-control" type="text" value="{{auth()->user()->name}}" name="shipping_name" data-validation="required">
							                  @error('shipping_name')
							                  <span class="tx-danger">{{$message}}</span>
							                  @enderror
							                </div>
							                <div class="form-group">
							                  <label class="form-control-label">E-mail <span class="tx-danger">*</span></label>
							                  <input class="form-control" type="email" value="{{auth()->user()->email}}" name="shipping_email" data-validation="required">
							                  @error('shipping_email')
							                  <span class="tx-danger">{{$message}}</span>
							                  @enderror
							                </div>
							                <div class="form-group">
							                  <label class="form-control-label">Phone <span class="tx-danger">*</span></label>
							                  <input class="form-control" type="text" name="shipping_phone" value="{{auth()->user()->phone}}" data-validation="required">
							                  @error('shipping_phone')
							                  <span class="tx-danger">{{$message}}</span>
							                  @enderror
							                </div>
							                <div class="form-group">
							                  <label class="form-control-label">Note <span class="tx-danger">*</span></label>
							                  <textarea class="form-control" name="note" data-validation="required" style="width:100%; height: 100px;resize:'none';" ></textarea>
							                  @error('note')
							                  <span class="tx-danger">{{$message}}</span>
							                  @enderror
							                </div>
										</div>
										<div class="col-md-6 col-sm-6 already-registered-login">

											<div class="form-group">
							                  <label class="form-control-label">Select Division <span class="tx-danger">*</span></label>
							                  <select class="form-control select2-show-search" name="division_id" data-placeholder="Choose one" data-validation="required">
								                  <option label="Choose one"></option>
								                  @foreach($divisions as $division)
								                  <option value="{{$division->id}}">{{$division->division_name}}</option>
								                  @endforeach
							                </select>
							                  @error('division_id')
							                  <span class="tx-danger">{{$message}}</span>
							                  @enderror
							                </div>

							                <div class="form-group">
							                  <label class="form-control-label">Select District <span class="tx-danger">*</span></label>
							                  <select class="form-control select2-show-search" name="district_id" data-placeholder="Choose one" data-validation="required">
								                  <option label="Choose one"></option>
							                </select>
							                  @error('district_id')
							                  <span class="tx-danger">{{$message}}</span>
							                  @enderror
							                </div>

							                <div class="form-group">
							                  <label class="form-control-label">Select State <span class="tx-danger">*</span></label>
							                  <select class="form-control select2-show-search" name="state_id" data-placeholder="Choose one" data-validation="required">
								                  <option label="Choose one"></option>
							                </select>
							                  @error('state_id')
							                  <span class="tx-danger">{{$message}}</span>
							                  @enderror
							                </div>

							                <div class="form-group">
							                  <label class="form-control-label">Post Code <span class="tx-danger">*</span></label>
							                  <input class="form-control" type="text" name="post_code" data-validation="required">
							                  @error('post_code')
							                  <span class="tx-danger">{{$message}}</span>
							                  @enderror
							                </div>

							                <div class="form-group">
							                	<label class="form-control-label">Select Payment Method <span class="tx-danger">*</span></label>
							                	<br>
							                <input type="radio" value="stripe" name="payment_method">
							                  <label class="form-control-label">Stripe</label>
							                  <br>
							                  <input type="radio" value="sslHosted" name="payment_method">
							                  <label class="form-control-label">Hosted Payment</label>
							                  <br>
							                  <input type="radio" value="sslEasy" name="payment_method">
							                  <label class="form-control-label">Easy Payment</label> <br>

							                  @error('payment_method')
							                  <span class="tx-danger">{{$message}}</span>
							                  @enderror
							                </div>

											  <button type="submit" class="btn-upper btn btn-primary checkout-page-button btn-block">Paymetn Step</button>
										</div>
										</form>
										<!-- already-registered-login -->		

									</div>			
								</div>
								<!-- panel-body  -->

							</div><!-- row -->
						</div>
						<!-- checkout-step-01  -->
					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-5">
					<!-- checkout-progress-sidebar -->
					<div class="checkout-progress-sidebar ">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
								</div>
								<div class="">
					            <table id="datatable1" class="table display responsive nowrap">
					              <thead>
					                <tr>
					                  <th class="wd-5p">SL</th>
					                  <th class="wd-45p">Name</th>
					                  <th class="wd-35p">Price & Qty</th>
					                  <th class="wd-15p">Sub Total</th>
					                </tr>
					              	@foreach($carts as $cart)
					              	<tr>
					                  <th class="wd-5p">{{$loop->iteration}}</th>
					                  <th class="wd-45p">{{$cart->name}}</th>
					                  <th class="wd-35p">{{$cart->price}} * {{$cart->qty}}</th>
					                  <th class="wd-15p">{{$cart->subtotal}}/=</th>
					                </tr>
					                @endforeach
					              </thead>
					            </table>
					            <h4>Product Calculation</h4>
					            <hr>
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
					              <p><strong>Grand Total : {{$total}}/=</strong></p>
					              @endif		
								</div>
							</div>
						</div>
					</div> 	<!-- checkout-progress-sidebar -->
				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
</div><!-- /.container -->
</div><!-- /.body-content -->

<script src="{{asset('admin/lib/jquery/jquery.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('select[name="division_id"]').on('change',function(){
			var division_id = $(this).val();
			if(division_id){
				$.ajax({
					url:"{{url('/user/district-ajax')}}/"+division_id,
					type:'GET',
					dataType:'json',
					success:function(data){
						$('select[name="district_id"]').html('');
						$('select[name="district_id"]').empty();
						$('select[name="state_id"]').empty();
						$.each(data,function(key, value){
							$('select[name="district_id"]').append('<option value="'+value.id+'">'+value.district_name+'</option>');
						});
					}
				});
			}
		});

		$('select[name="district_id"]').on('change',function(){
			var district_id = $(this).val();
			if(district_id){
				$.ajax({
					url:"{{url('/user/state-ajax')}}/"+district_id,
					type:'GET',
					dataType:'json',
					success:function(data){
						$('select[name="state_id"]').empty();
						$.each(data,function(key, value){
							$('select[name="state_id"]').append('<option value="'+value.id+'">'+value.state_name+'</option>');
						});
					}
				});
			}
		});
	});
</script>

@endsection