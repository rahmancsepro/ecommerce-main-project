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
	<style>
	    /**
	 * The CSS shown here will not be introduced in the Quickstart guide, but shows
	 * how you can use CSS to style your Element's container.
	 */
	.StripeElement {
	  box-sizing: border-box;

	  height: 40px;

	  padding: 10px 12px;

	  border: 1px solid transparent;
	  border-radius: 4px;
	  background-color: white;

	  box-shadow: 0 1px 3px 0 #e6ebf1;
	  -webkit-transition: box-shadow 150ms ease;
	  transition: box-shadow 150ms ease;
	}

	.StripeElement--focus {
	  box-shadow: 0 1px 3px 0 #cfd7df;
	}

	.StripeElement--invalid {
	  border-color: #fa755a;
	}

	.StripeElement--webkit-autofill {
	  background-color: #fefde5 !important;}
	</style>
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
									<h4 class="unicase-checkout-title">Payment </h4>
								</div>
								<form action="{{route('user.stripe.order')}}" method="POST" id="payment-form">
									@csrf
				<input type="hidden" name="name" value="{{$data['shipping_name']}}">
				<input type="hidden" name="email" value="{{$data['shipping_email']}}">
				<input type="hidden" name="phone" value="{{$data['shipping_phone']}}">
				<input type="hidden" name="notes" value="{{$data['notes']}}">
				<input type="hidden" name="division_id" value="{{$data['division_id']}}">
				<input type="hidden" name="district_id" value="{{$data['district_id']}}">
				<input type="hidden" name="state_id" value="{{$data['state_id']}}">
				<input type="hidden" name="post_code" value="{{$data['post_code']}}">
								  <div id="card-element">
								    <!-- Elements will create input elements here -->
								  </div>

								  <!-- We'll put the error messages in this element -->
								  <div id="card-errors" role="alert"></div>
								  <br>
								  <button class="btn btn-primary" id="submit">Submit Payment</button>
								</form>
							</div>
						</div>
					</div> 	<!-- checkout-progress-sidebar -->
				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
</div><!-- /.container -->
</div><!-- /.body-content -->

<script type="text/javascript">
    // Create a Stripe client.
var stripe = Stripe('pk_test_51NEz91Hq4jIPr6ki4q9VmWJNUaotfald7ErtynslEknaAK7m0lERJaLfGSByYhoLSQoxLtsOUXCfwthnWeo0gLPo00ZZWt9vgS');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  // form.submit();
  HTMLFormElement.prototype.submit.call(form);
}
</script>

@endsection