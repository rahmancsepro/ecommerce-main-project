
<!DOCTYPE html>
<html lang="en">
	
<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="csrf-token" content="{{csrf_token()}}">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">
	    @yield('meta')

	    <title>@yield("title") boiutso.com</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="{{asset('fontend/css/bootstrap.min.css')}}">
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="{{asset('fontend/css/main.css')}}">
	    <link rel="stylesheet" href="{{asset('fontend/css/blue.css')}}">
	    <link rel="stylesheet" href="{{asset('fontend/css/owl.carousel.css')}}">
		<link rel="stylesheet" href="{{asset('fontend/css/owl.transitions.css')}}">
		<link rel="stylesheet" href="{{asset('fontend/css/animate.min.css')}}">
		<link rel="stylesheet" href="{{asset('fontend/css/rateit.css')}}">
		<link rel="stylesheet" href="{{asset('fontend/css/bootstrap-select.min.css')}}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css"
        media="all" />

		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="{{asset('fontend/css/font-awesome.css')}}">
		<link rel="stylesheet" href="{{asset('fontend/css/Ionicons/css/ionicons.css')}}">
		<!-- Toastr -->
	    <link rel="stylesheet" type="text/css" href="{{asset('admin/lib/toastr/toastr.min.css')}}">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

        <link href="{{asset('fontend/css/jquery.dataTables.css')}}" rel="stylesheet">

        <script src="https://js.stripe.com/v3/"></script>

        <style>
	        .search-area {
	            position: relative;
	        }

	        #suggestProduct {
	            position: absolute;
	            top: 100%;
	            left: 0;
	            width: 100%;
	            background: #fff;
	            z-index: 999;
	            border-radius: 4px;
	            margin-top: 2px;
	        }
	    </style>

	</head>
    <body class="cnt-home">
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<div class="top-bar animate-dropdown">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled">
					<li><a href="{{route('user.dashboard')}}"><i class="icon fa fa-user"></i>My Account</a></li>
					<li><a href="{{route('user.wishlist')}}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
					<li><a href="{{route('user.cart')}}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
					<li><a href="{{route('checkout')}}"><i class="icon fa fa-check"></i>Checkout</a></li>
					<li>
						@auth
						<a href="{{ route('logout') }}" onclick="event.preventDefault();
	                    document.getElementById('logout-form').submit();"><i class="icon ion-power"></i> Sign Out</a>
	                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
	                        @csrf
	                    </form>
						@else
						<a href="{{route('login')}}"><i class="icon fa fa-lock"></i>Login/Register</a>
						@endauth
					</li>
				</ul>
			</div><!-- /.cnt-account -->

			<div class="cnt-block">
				<ul class="list-unstyled list-inline">
					<li class="dropdown dropdown-small">
						<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="modal" data-target="#trackorder"><span class="value">Track your order </span></a>
					</li>

					<li class="dropdown dropdown-small">
						<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">
							 @if (session()->get('language') == 'bangla')
	                            ভাষা পরিবর্তন করুন 
	                         @else
	                         	Language
	                         @endif
						</span><b class="caret"></b></a>
						<ul class="dropdown-menu">
							@if (session()->get('language') == 'bangla')
							<li><a href="{{ route('english.language') }}">English</a></li>
							@else
							<li><a href="{{ route('bangla.language') }}">বাংলা</a></li>
							@endif
						</ul>
					</li>
				</ul><!-- /.list-unstyled -->
			</div><!-- /.cnt-cart -->
			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->
<!-- =========== TOP MENU : END ==================== -->
	<div class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
<!-- =============== LOGO =========================== -->
<div class="logo">
	<a href="{{route('/')}}">
		
		<img src="{{asset('fontend/images/logo.png')}}" style="width: 150px;" alt="logo">

	</a>
</div><!-- /.logo -->
<!-- ==================== LOGO : END ================== -->				
</div><!-- /.logo-holder -->

				<div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
					<!-- /.contact-row -->
<!-- ============================================================= SEARCH AREA ============================================================= -->
<div class="search-area">
    <form action="{{route('search.product')}}" method="GET">
        <div class="control-group">
            <input class="search-field" name="search_name" id="search" onfocus="showProductResult()" onblur="hideProductResult()" placeholder="Search here..." />
            <button class="search-button"></button>    
        </div>
    </form>
    <div id="suggestProduct"></div>
</div><!-- /.search-area -->
<!-- ============================================================= SEARCH AREA : END ============================================================= -->				</div><!-- /.top-search-holder -->

	<div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
<!-- =========== SHOPPING CART DROPDOWN ====================== -->

	<div class="dropdown dropdown-cart">
		<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
			<div class="items-cart-inner">
	            <div class="basket">
						<i class="glyphicon glyphicon-shopping-cart"></i>
				</div>
				<div class="basket-item-count"><span class="count" id="cartQty">0</span></div>
				<div class="total-price-basket">
					<span class="lbl">cart -</span>
					<span class="total-price">
						<span class="sign">TK </span><span class="value" id="cartSubTotal"> 00</span>
					</span>
				</div>
		    </div>
		</a>
		<ul class="dropdown-menu">
			<li>
				<!-- mini cart start -->
				<div id="miniCart"></div>
				<!-- mini cart end -->
		
				<div class="clearfix cart-total">
					<div class="pull-right">
						<span class="text">Sub Total:</span><span class='price' id="cartSubTotal"> 00</span>
					</div>
					<div class="clearfix"></div>
						
					<a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>	
				</div><!-- /.cart-total-->	
			</li>
		</ul><!-- /.dropdown-menu-->
	</div><!-- /.dropdown-cart -->

<!-- ================ SHOPPING CART DROPDOWN : END ======================== -->				</div><!-- /.top-cart-row -->
			</div><!-- /.row -->

		</div><!-- /.container -->

	</div><!-- /.main-header -->

<!-- ========= NAVBAR =================== -->
<div class="header-nav animate-dropdown">
	<div class="container">
	    <div class="yamm navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
	     <div class="nav-bg-class">
			<div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
				<div class="nav-outer">
					<ul class="nav navbar-nav">
						<li class="active dropdown yamm-fw">
							<a href="{{route('/')}}">
								@if(session()->get('language') == 'bangla')
                                	হোম
                                @else
                                	Home
                                @endif
							</a>
							
						</li>
				@php
                  $categories = App\Models\Category::with(['subcategory'])->orderBy('category_name_en', 'ASC')->get();
                @endphp
                @foreach ($categories as $category)
						<li class="dropdown yamm mega-menu">
							 @if (session()->get('language') == 'bangla')
							<a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{$category->category_name_bn}}</a>
							@else
							<a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{$category->category_name_en}}</a>
							@endif
						    <ul class="dropdown-menu container">
								<li>
						            <div class="yamm-content ">
						            	<div class="row">
						            	@foreach ($category->subcategory as $subcat)
							               <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
							               	 @if (session()->get('language') == 'bangla')
							                    <h2 class="title">{{$subcat->subcategory_name_bn}}</h2>
							                  @else
							                  	<h2 class="title">{{$subcat->subcategory_name_en}}</h2>
							                  @endif
							                    <ul class="links">
							                    @foreach ($subcat->subsubcategory as $subsubcat)
							                        <li>
							                        @if(session()->get('language') == 'bangla')
							                        	<a href="{{url('sub/sub-category/product/'.$subsubcat->id.'/'.$subsubcat->subsubcategory_slug_bn)}}">{{$subsubcat->subsubcategory_name_bn}}</a>
							                        @else
							                        	<a href="{{url('sub/sub-category/product/'.$subsubcat->id.'/'.$subsubcat->subsubcategory_slug_en)}}">{{$subsubcat->subsubcategory_name_en}}</a>
							                        @endif
							                        </li>
							                    @endforeach
							                    </ul>
										    </div><!-- /.col -->
										 @endforeach  					
										</div>
									</div>
								</li>
							</ul>	
						</li>
				@endforeach
						<li class="dropdown yamm-fw">
							<a href="{{route('shop')}}">Shop</a>
						</li>

			             <li class="dropdown  navbar-right special-menu">
							<a href="#">Todays offer</a>
						</li>
					</ul><!-- /.navbar-nav -->
					<div class="clearfix"></div>				
				</div><!-- /.nav-outer -->
			</div><!-- /.navbar-collapse -->
	    </div><!-- /.nav-bg-class -->
	  </div><!-- /.navbar-default -->
	</div><!-- /.container-class -->
</div><!-- /.header-nav -->
<!-- ========== NAVBAR : END ==================== -->

</header>

<!-- ============== HEADER : END =================== -->
@yield('content')
<!-- ============== BRANDS CAROUSEL ====================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
			@php
              $brands = App\Models\Brand::where('status','1')->orderBy('id', 'DESC')->get();
            @endphp
            @foreach($brands as $brand)
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="{{asset($brand->brand_image)}}" src="{{asset($brand->brand_image)}}" alt="brand">
					</a>	
				</div><!--/.item-->
			@endforeach

		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ========= BRANDS CAROUSEL : END =============== -->
	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->




<!-- ============= FOOTER =================== -->
<footer id="footer" class="footer color-bg">


    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Contact Us</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
        <ul class="toggle-footer" style="">
            <li class="media">
                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                            <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <p>ThemesGround, 789 Main rd, Anytown, CA 12345 USA</p>
                </div>
            </li>

              <li class="media">
                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                      <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <p>+(888) 123-4567<br>+(888) 456-7890</p>
                </div>
            </li>

              <li class="media">
                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                      <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <span><a href="#">info@boiutso.com</a></span>
                </div>
            </li>
              
            </ul>
    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Customer Service</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="Contact us">My Account</a></li>
                <li><a href="#" title="About us">Order History</a></li>
                <li><a href="#" title="faq">FAQ</a></li>
                <li><a href="#" title="Popular Searches">Specials</a></li>
                <li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Corporation</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                          <li class="first"><a title="Your Account" href="#">About us</a></li>
                <li><a title="Information" href="#">Customer Service</a></li>
                <li><a title="Addresses" href="#">Company</a></li>
                <li><a title="Addresses" href="#">Investor Relations</a></li>
                <li class="last"><a title="Orders History" href="#">Advanced Search</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Why Choose Us</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="About us">Shopping Guide</a></li>
                <li><a href="#" title="Blog">Blog</a></li>
                <li><a href="#" title="Company">Company</a></li>
                <li><a href="#" title="Investor Relations">Investor Relations</a></li>
                <li class=" last"><a href="contact-us.html" title="Suppliers">Contact Us</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding social">
                <ul class="link">
                  <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
                  <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
                  <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
                  <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
                  <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a></li>
                  <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
                  <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 no-padding">
                <div class="clearfix payment-methods">
                    <ul>
                        <li><img src="{{asset('fontend/images/payments/1.png')}}" alt=""></li>
                        <li><img src="{{asset('fontend/images/payments/2.png')}}" alt=""></li>
                        <li><img src="{{asset('fontend/images/payments/3.png')}}" alt=""></li>
                        <li><img src="{{asset('fontend/images/payments/4.png')}}" alt=""></li>
                        <li><img src="{{asset('fontend/images/payments/5.png')}}" alt=""></li>
                    </ul>
                </div><!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>
<!-- ========== FOOTER : END ===================== -->

<!-- Track Modal Start -->
<!-- Modal -->
<div class="modal fade" id="trackorder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tracking Your Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('order.track')}}" method="GET">
		  <div class="form-group">
		    <label for="invoice-no">Invoice No</label>
		    <input type="text" name="invoice_no" class="form-control" id="invoice-no" placeholder="Invoice number">
		  </div>
		  <button type="submit" class="btn btn-primary">Track Order</button>
		</form>
      </div>
    </div>
  </div>
</div>
<!-- Track Modal End -->

 <!-- Add to card modal start -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span id="pname">name</span></h5>
        <button type="button" id="closeModal"  class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-md-6">
      			<div class="card">
      				<img src="" class="card-img-top" alt="Image not found" id="pimage" style="width:100%;">
      			</div>
      		</div>
      		<div class="col-md-6">
      			<ul class="list-group">
      				<input type="hidden" id="pid">
				  <li class="list-group-item">Price :  TK <strong id="pprice"></strong> <del id="oldprice"></del></li>
				  <li class="list-group-item">Product Code : <strong id="pcode"></strong></li>
				  <li class="list-group-item">Category : <strong id="pcategory"></strong></li>
				  <li class="list-group-item">Brand : <strong id="pbrand"></strong></li>
				  <li class="list-group-item">Stock : 
				  	<span class="badge badge-pill badge-sucess" id="available" style="background:green;color: white;"></span>
				  	<span class="badge badge-pill badge-danger" id="stockout" style="background:red;color:white;"></span>
				  </li>
				</ul>
				 <div class="form-group">
				    <label for="qty"></label>
				    <input type="number" class="form-control" id="qty" value="1">
				  </div>
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="closeModal" onclick="addToCart()">Add To Cart</button>
      </div>
    </div>
  </div>
</div>
 <!-- Add to card modal end -->


	<script src="{{asset('fontend/js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{asset('fontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('fontend/js/bootstrap-hover-dropdown.min.js')}}"></script>
	<script src="{{asset('fontend/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('fontend/js/echo.min.js')}}"></script>
	<script src="{{asset('fontend/js/jquery.easing-1.3.min.js')}}"></script>
	<script src="{{asset('fontend/js/bootstrap-slider.min.js')}}"></script>
    <script src="{{asset('fontend/js/jquery.rateit.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('fontend/js/lightbox.min.js')}}"></script>
    <script src="{{asset('fontend/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('fontend/js/wow.min.js')}}"></script>
	<script src="{{asset('fontend/js/scripts.js')}}"></script>
	<script src="{{asset('fontend/js/sweetalert2@8.js')}}"></script>
	<script src="{{asset('common/jquery.form-validator.min.js')}}"></script>
	<script src="{{asset('fontend/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('fontend/js/dataTables.responsive.js')}}"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript">
    </script>

    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        // $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>

	<script type="text/javascript">
		$.validate({
			lang:'en'
		});
	</script>
	<!-- Toastr -->
	 <script src="{{asset('admin/lib/toastr/toastr.min.js')}}"></script>

	<script>
		  @if(Session::has('message'))
		  toastr.options ={
						  	"closeButton" : true,
						  	"progressBar" : true
						  }
		  toastr.success("{{ session('message') }}");
		  @endif

		  @if(Session::has('error'))
		  toastr.options ={
						  	"closeButton" : true,
						  	"progressBar" : true
						  }
		  toastr.error("{{ session('error') }}");
		  @endif

		  @if(Session::has('info'))
		  toastr.options ={
						  	"closeButton" : true,
						  	"progressBar" : true
						  }
		  toastr.info("{{ session('info') }}");
		  @endif

		  @if(Session::has('warning'))
		  toastr.options ={
						  	"closeButton" : true,
						  	"progressBar" : true
						  }
		  toastr.warning("{{ session('warning') }}");
		  @endif

		  
	</script>
<!-- Add to cart start-->
	<script>
		$.ajaxSetup({
			headers:{
				'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content'),
			}
		});

		function viewProduct(productId){
			$.ajax({
				type:"GET",
				url:"/product/view/modal/"+productId,
				dataType:'json',
				success:function(res){
					$('#pname').text(res.product.product_name_en);
					$('#pid').val(res.product.id);
					if(res.product.discount_price == null){
						$('#pprice').text('');
						$('#oldprice').text('');
						$('#pprice').text(res.product.selling_price);
					}else{
						$('#pprice').text(res.product.discount_price);
						$('#oldprice').text(res.product.selling_price);
					}
					
					$('#pcode').text(res.product.product_code);
					$('#pcategory').text(res.product.category.category_name_en);
					$('#pbrand').text(res.product.brand.brand_name_en);

					if(res.product.product_qty <= 0){
						$('#available').text('');
						$('#stockout').text('');
						$('#stockout').text('Stockout');
					}else{
						$('#available').text('');
						$('#stockout').text('');
						$('#available').text('Available');
					}

					$('#pstock').text(res.product.product_qty);
					$('#pimage').attr('src','/'+res.product.product_thumbnail);
					
				},
				error:function(err){}
			});
		}

		function addToCart() {
			var pid = $('#pid').val();
			var qty = $('#qty').val();
			$.ajax({
				type:'POST',
				url:"/cart/data/store/"+pid,
				data : {id:pid,product_qty:qty},
				dataType:'json',
				success:function(res){
					miniCart();
					couponCalculatin();
					$('#closeModal').click();
					//  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(res.error)) {
                        Toast.fire({
                            type: 'success',
                            title: res.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: res.error
                        })
                    }
                    //  end message
				},
				error:function(err){}
			});
		}
	</script>
<!-- Add to cart end-->
<!-- Mini Cart Start -->
<script type="text/javascript">
		function miniCart(){
			$.ajax({
				type:"GET",
				url:"/product/mini/cart",
				dataType:'json',
				success:function(res){
					$("span[id='cartSubTotal']").text(res.cartSubTotal);
					$("#cartQty").text(res.cartQty);
					var miniCart = "";
					$.each(res.carts,function(key, value){
						miniCart+=`<div class="cart-item product-summary">
								<div class="row">
									<div class="col-xs-4">
										<div class="image">
											<a href="detail.html"><img src="/${value.options.image}" alt=""></a>
										</div>
									</div>
									<div class="col-xs-7">
										
										<h3 class="name"><a href="index8a95.html?page-detail">${value.name}</a></h3>
										<div class="price">${value.qty} * ${value.price} = ${value.subtotal}</div>
									</div>
									<div class="col-xs-1 action">
										<button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button>
									</div>
								</div>
							</div><!-- /.cart-item -->
							<div class="clearfix"></div> <hr/>`;
					});
					$('#miniCart').html(miniCart);
				}
			})
		}
		miniCart();

		function miniCartRemove(rowId){
			$.ajax({
				type:"GET",
				url:"/mini/cart/remove/"+rowId,
				dataType:'json',
				success:function(res){
					miniCart();
					couponCalculatin();
					//  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(res.error)) {
                        Toast.fire({
                            type: 'success',
                            title: res.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: res.error
                        })
                    }
                    //  end message
				}
			});	
		}
	</script>
<!-- Mini Cart End -->

<!-- Wishlist Start -->
	<script type="text/javascript">
		function addToWishlist(product_id) {
			$.ajax({
				type:"POST",
				url:"/add-to-wishlist/"+product_id,
				dataType:'json',
				success:function(res){
					miniCart();
					//  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(res.error)) {
                        Toast.fire({
                            type: 'success',
                            title: res.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: res.error
                        })
                    }
                    //  end message
				}
			});
		}

		function getWishlist(){
			$.ajax({
				type:"GET",
				url:"{{url('/user/get/wishlist/product')}}",
				dataType:'json',
				success:function(res){
					var rows = "";
					$.each(res,function(key, value){
						rows+=`<tr>
									<td class="col-md-2"><img src="/${value.product.product_thumbnail}" alt="imga"></td>
									<td class="col-md-7">
										<div class="product-name"><a href="#">${value.product.product_name_en}</a></div>
										<div class="rating">
											<i class="fa fa-star rate"></i>
											<i class="fa fa-star rate"></i>
											<i class="fa fa-star rate"></i>
											<i class="fa fa-star rate"></i>
											<i class="fa fa-star non-rate"></i>
											<span class="review">( 06 Reviews )</span>
										</div>
										<div class="price">$ ${value.product.discount_price == null 
												? `${value.product.selling_price}` 
												: `${value.product.discount_price}  <span>$ ${value.product.selling_price}</span>`
											}
										</div>
									</td>
									<td class="col-md-2">
										<button class="btn-upper btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="${value.product.id}" onclick="viewProduct(this.id)">Add to cart</button>
									</td>
									<td class="col-md-1 close-btn">
										<button class="" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>
									</td>
								</tr>`;
					});
					$('#wishlist').html(rows);
				}
			})
		}
		getWishlist();

		function wishlistRemove(wishlistId){
			$.ajax({
				type:"GET",
				url:"{{url('/user/wishlist/remove/')}}/"+wishlistId,
				dataType:'json',
				success:function(res){
					getWishlist();
					//  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(res.error)) {
                        Toast.fire({
                            type: 'success',
                            title: res.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: res.error
                        })
                    }
                    //  end message
				}
			});	
		}
	</script>
<!-- Wishlist End -->

<!-- Cart Page Start -->
	<script type="text/javascript">

		function cart(){
			$.ajax({
				type:"GET",
				url:"{{url('/cart/product')}}",
				dataType:'json',
				success:function(res){
					var rows = "";
					$.each(res.carts,function(key, value){
						rows+=`<tr>
					<td class="cart-image">
						<a class="entry-thumbnail" href="detail.html">
						    <img src="/${value.options.image}" alt="">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="detail.html">${value.name}</a></h4>
						<div class="row">
							<div class="col-sm-4">
								<div class="rating rateit-small"></div>
							</div>
							<div class="col-sm-8">
								<div class="reviews">
									(06 Reviews)
								</div>
							</div>
						</div><!-- /.row -->
					</td>
					<td class="cart-product-quantity">
					${value.qty > 1 
					? `<button type="submit" id="${value.rowId}" onclick="cartDecrement(this.id)" class="btn btn-primary btn-sm">-</button>`
					:`<button type="submit" class="btn btn-primary btn-sm" disabled>-</button>`
					}
					<input type="text" value="${value.qty}" disabled style="width: 20px;">
			         <button type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)" class="btn btn-primary btn-sm">+</button>
		            </td>
					<td class="cart-product-sub-total"><span class="cart-sub-total-price">$ ${value.price}</span></td>
					<td class="cart-product-grand-total"><span class="cart-grand-total-price">$ ${value.subtotal}</span></td>
					<td class="romove-item">
						<button type="submit" id="${value.rowId}" onclick="cartRemove(this.id)" title="Remove Cart" class="icon"><i class="fa fa-trash-o"></i></button>
					</td>
				</tr>`;
					});
					$('#cartPage').html(rows);
				}
			})
		}
		cart();

		function cartRemove(rowId){
			$.ajax({
				type:"GET",
				url:"{{url('/cart/remove/')}}/"+rowId,
				dataType:'json',
				success:function(res){
					cart();
					miniCart();
					couponCalculatin();
					//  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(res.error)) {
                        Toast.fire({
                            type: 'success',
                            title: res.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: res.error
                        })
                    }
                    //  end message
				}
			});	
		}
		function cartDecrement(rowId) {
			$.ajax({
				type:"GET",
				url:"{{url('/cart/decrement/')}}/"+rowId,
				dataType:'json',
				success:function(res){
					cart();
					miniCart();
					couponCalculatin();
					//  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(res.error)) {
                        Toast.fire({
                            type: 'success',
                            title: res.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: res.error
                        })
                    }
                    //  end message
				}
			});
		}
		function cartIncrement(rowId) {
			$.ajax({
				type:"GET",
				url:"{{url('/cart/increment/')}}/"+rowId,
				dataType:'json',
				success:function(res){
					cart();
					miniCart();
					couponCalculatin();
					//  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(res.error)) {
                        Toast.fire({
                            type: 'success',
                            title: res.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: res.error
                        })
                    }
                    //  end message
				}
			});
		}
	</script>
<!-- Cart Page End -->
<!-- Coupon Start -->
<script type="text/javascript">
	function applyCoupon() {
		var coupon_name = $('#coupon_name').val();
		$.ajax({
			type:'POST',
			url:"/coupon-apply",
			data : {coupon_name:coupon_name},
			dataType:'json',
			success:function(res){
				$('#coupon_name').val('');
				//  start message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })

                if ($.isEmptyObject(res.error)) {
                	$('#addCouponBtn').css("display", "none");
					couponCalculatin();
                    Toast.fire({
                        type: 'success',
                        title: res.success
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        title: res.error
                    })
                }
                //  end message
			},
			error:function(err){}
		});

	}

	function couponCalculatin() {
		$.ajax({
			type:'GET',
			url:"/coupon-calculation",
			dataType:'json',
			success:function(res){
				if(res.total){
					$('#couponCalField').html(`<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md">$ ${res.subtotal}</span>
					</div>
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">$ ${res.total}</span>
					</div>
				</th>
			</tr>`);
				}else{
					$('#couponCalField').html(`<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md">$ ${res.subtotal}</span>
					</div>
					<div class="cart-sub-total">
						Coupon Name<span class="inner-left-md">${res.coupon_name}</span>
					</div>
					<div class="cart-sub-total">
						Coupon Discount<span class="inner-left-md">$ ${res.coupon_discount}%</span>
					</div>
					<div class="cart-sub-total">
						Discount Amount<span class="inner-left-md">$ ${res.discount_amount}</span>
					</div>
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">$ ${res.total_amount}</span>
					</div>
					<hr>
					<div class="cart-grand-total">
						<span class="inner-left-md">
							<button type="submit" class="btn btn-primary" onclick="removeCoupon()">Click For Remove Coupon</button>
						</span>
					</div>
				</th>
			</tr>`);
				}
			}
		})
	}
	couponCalculatin();
</script>

<script type="text/javascript">
	function removeCoupon() {
		$.ajax({
				type:"GET",
				url:"{{url('/remove-coupon')}}",
				dataType:'json',
				success:function(res){
					$('#addCouponBtn').css("display", "block");
					couponCalculatin();
					//  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(res.error)) {
                        Toast.fire({
                            type: 'success',
                            title: res.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: res.error
                        })
                    }
                    //  end message
				}
			});
	}
</script>
<!-- Coupon End -->

<!-- Auto Complete start -->
<script type="text/javascript">
	$("body").on("keyup","#search",function(){
		var searchData = $('#search').val();
		if(searchData.length > 0){
			$.ajax({
				type:"POST",
				url:"{{url('/product/search/auto-complete')}}",
				data:{search:searchData},
				success:function(res){
					$('#suggestProduct').html(res);
				}
			});
		}

		if(searchData.length < 1){$('#suggestProduct').html('');}
	});
</script>

<script type="text/javascript">
	function showProductResult() {
		$('#suggestProduct').slideDown();
	}
	function hideProductResult() {
		$('#suggestProduct').slideUp();
	}
</script>
<!-- Auto Complete end -->

<!-- Short By Product -->
@yield('script')


</body>

</html>