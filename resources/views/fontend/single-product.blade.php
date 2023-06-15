@extends('layouts.fontend-master')
@section('title')
	@if (session()->get('language') == 'bangla')
		{{$product->product_name_bn}} ::
	@else
		{{$product->product_name_en}} ::
	@endif
@endsection

@section('meta')
	  <meta property="og:title" content="{{$product->product_name_en}}" />
	  <meta property="og:url" content="{{Request::fullUrl()}}" />
	  <meta property="og:image" content="{{URL::to($product->product_thumbnail)}}" />
	  <meta property="og:description" content="{!! $product->short_descp_en !!}" />
	  <meta property="og:site_name" content="boiutso" />
@endsection
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">Clothing</a></li>
				<li class='active'>Floral Print Buttoned</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
				<div class="home-banner outer-top-n">
	<img src="{{asset('fontend/images/banners/LHS-banner.jpg')}}" alt="Image">
</div>		
  
    
    
<!-- =========== HOT DEALS ================= -->
@include('fontend.inc.hot-deals')
<!-- ================ HOT DEALS: END =================== -->

<!-- =================== NEWSLETTER ====================== -->
<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
	<h3 class="section-title">Newsletters</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<p>Sign Up for Our Newsletter!</p>
        <form role="form">
        	 <div class="form-group">
			    <label class="sr-only" for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
			  </div>
			<button class="btn btn-primary">Subscribe</button>
		</form>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ======= NEWSLETTER: END ================= -->

<!-- ========== Testimonials ================= -->
@include('fontend.inc.testimonial')  
<!-- =============== Testimonials: END ================= -->

				</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">
                
					     <div class="col-xs-12 col-sm-6 col-md-5">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div>
            <a  href="assets/images/products/p13.jpg">
                <img class="img-responsive" alt="" src="{{asset($product->product_thumbnail)}}" />
            </a>
        </div><!-- /.single-product-slider -->

    </div>
    <!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        			
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name">
								@if (session()->get('language') == 'bangla')
									{{$product->product_name_bn}}
								@else
									{{$product->product_name_en}}
								@endif
							</h1>
							
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-3">
										@php
										$avgRating = round($product->productreviews->avg('rating'));
										@endphp

										@for($i=1; $i<=5; $i++)
										<span style="color:red;" class="glyphicon glyphicon-star{{$i <= $avgRating ? '' : '-empty'}}"></span>
										@endfor

									</div>
									<div class="col-sm-8">
										<div class="reviews">
											<a href="#" class="lnk">({{count($product->productreviews)}} Reviews)</a>
										</div>
									</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value">In Stock</span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

							<div class="description-container m-t-20">
								@if (session()->get('language') == 'bangla')
									{!! $product->short_descp_bn !!}
								@else
									{!! $product->short_descp_en !!}
								@endif
							</div><!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-6">
										<div class="price-box">
											@if($product->discount_price != NULL)
												@if (session()->get('language') == 'bangla')
												<span class="price">${{bn_price($product->discount_price)}}</span>
												<span class="price-strike">${{bn_price($product->selling_price)}}</span>
												@else
												<span class="price">${{$product->discount_price}}</span>
												<span class="price-strike">${{$product->selling_price}}</span>
												@endif
											@else
												@if (session()->get('language') == 'bangla')
												<span class="price">${{bn_price($product->selling_price)}}</span>
												@else
												<span class="price">${{$product->selling_price}}</span>
												@endif
											@endif
										</div>
									</div>

									<div class="col-sm-6">
										<div class="favorite-button m-t-10">
											<!-- Social share button -->
											<div class="sharethis-inline-share-buttons" data-href="{{Request::url()}}"></div>
										</div>
									</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->

							<div class="quantity-container info-container">
								<div class="row">
									
									<div class="col-sm-2">
										<span class="label">Qty :</span>
									</div>
									
									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
								                <div class="arrows">
								                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
								                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
								                </div>
								                 <input type="text" value="1" id="qty">
								                <input type="hidden" value="{{$product->id}}" id="pid">
							              </div>
							            </div>
									</div>

									<div class="col-sm-7">
										<button class="btn btn-primary" onclick="addToCart()"> <i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
									</div>
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#review">REVIEW</a></li>
								<li><a data-toggle="tab" href="#comment">COMMENT</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text">{!! $product->long_descp_en !!}</p>
									</div>	
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
									<div class="product-tab">
																				
										<div class="product-reviews">
											@foreach($product->productreviews as $review)
											<h4 class="title">{{$review->user->name}}</h4>
											<div class="reviews">
												<div class="review">
													<div class="review-title"><span class="summary">
														@for($i=1; $i<=5; $i++)
														<span style="color:red;" class="glyphicon glyphicon-star{{$i<=$review->rating ? '' : '-empty'}}"></span>
														@endfor
													</span><span class="date"><i class="fa fa-calendar"></i><span>{{$review->created_at->diffForHumans()}}</span></span></div>
													<div class="text">{{$review->comment}}</div>
												</div><!-- /.reviews -->
											</div><!-- /.product-reviews -->
											@endforeach
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->
							</div><!-- /.tab-content -->
							<div id="comment" class="tab-pane">
                                <div class="product-tag">
                                    <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="10">
                                    </div>
                                </div><!-- /.product-tab -->
                            </div><!-- /.tab-pane -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

<!-- ========== Related PRODUCTS ========================= -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">Related Products</h3>
	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
		@foreach($relatedProducts as $product)
		<div class="item item-carousel">
			<div class="products">	
				<div class="product">		
					<div class="product-image">
						<div class="image">
							@if (session()->get('language') == 'bangla')
            				<a href="{{url('single-product/'.$product->id,$product->product_slug_bn)}}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a>
            				@else
            				<a href="{{url('single-product/'.$product->id,$product->product_slug_en)}}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a>
            				@endif
						</div><!-- /.image -->	
						<div class="tag sale"><span>
							@if($product->discount_price != NULL)
	                			@if (session()->get('language') == 'bangla')
	                				{{bn_price(find_discount($product->selling_price,$product->discount_price))}} %
	                			@else
	                				{{find_discount($product->selling_price,$product->discount_price)}} %
	                			@endif
	            			@else
	                			@if (session()->get('language') == 'bangla')
	                				নতুন
	                			@else
	                				new
	                			@endif
	            			@endif
						</span></div>    
					</div><!-- /.product-image -->
					<div class="product-info text-left">
						<h3 class="name">
							@if (session()->get('language') == 'bangla')
            				<a href="{{url('single-product/'.$product->id,$product->product_slug_bn)}}">
            					{{$product->product_name_bn}}
            				</a>
            				@else
            				<a href="{{url('single-product/'.$product->id,$product->product_slug_en)}}">
            					{{$product->product_name_en}}
            				</a>
            				@endif
						<div class="rating rateit-small"></div>
						<div class="description">
							@if (session()->get('language') == 'bangla')
            					{!!$product->short_descp_bn!!}
            				@else
            					{!!$product->short_descp_en!!}
            				@endif
						</div>
						<div class="product-price">	
							@if($product->discount_price != NULL)
            				<span class="price">৳
            					@if (session()->get('language') == 'bangla')
            					{{bn_price(round($product->discount_price))}}
            					@else
            					{{round($product->discount_price)}}
            					@endif
            				</span>

            				<span class="price-before-discount">৳
            					@if (session()->get('language') == 'bangla')
            						{{bn_price(round($product->selling_price))}}
            					@else
            						{{round($product->selling_price)}}
            					@endif
            				</span>
            				@else
            				<span class="price"> ৳
            					@if (session()->get('language') == 'bangla')
            					{{bn_price(round($product->selling_price))}}
            					@else
            					{{round($product->selling_price)}}
            					@endif
            				</span>
            				@endif	
						</div><!-- /.product-price -->
					</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
						<div class="action">
							<ul class="list-unstyled">
								<li class="add-cart-button btn-group">
        							<button class="btn btn-primary icon" title="Add To Cart" data-toggle="modal" data-target="#exampleModal" type="button" id="{{$product->id}}" onclick="viewProduct(this.id)">
                                        <i class="fa fa-shopping-cart"></i>
                                    </button>
        							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>					
        						</li>
        		                <li class="add-cart-button btn-group">
        							<button class="btn btn-info icon" title="Add To Wishlist" id="{{$product->id}}" onclick="addToWishlist(this.id)">
        								 <i class="icon fa fa-heart"></i>
        							</button>
        						</li>
        						<li class="lnk">
        							@if (session()->get('language') == 'bangla')
			            				<a class="add-to-cart" href="{{url('single-product/'.$product->id,$product->product_slug_bn)}}" title="Details">
	        							    <i class="fa fa-signal" aria-hidden="true"></i>
	        							</a>
			            			@else
			            				<a class="add-to-cart" href="{{url('single-product/'.$product->id,$product->product_slug_en)}}" title="Details">
	        							    <i class="fa fa-signal" aria-hidden="true"></i>
	        							</a>
			            			@endif
        						</li>
							</ul>
						</div><!-- /.action -->
					</div><!-- /.cart -->
				</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
		@endforeach
	</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- =============== Related PRODUCTS : END ===================== -->
			
</div><!-- /.col -->
<div class="clearfix"></div>
</div><!-- /.row -->

</div><!-- /.container -->
</div><!-- /.body-content -->


<!-- // Facebook Comment SDK -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v17.0&appId=792968579118219&autoLogAppEvents=1" nonce="EBEm6jWH"></script>

<!-- // Social Media Share SDK -->

<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=648714076773dd0012e17b8c&product=inline-share-buttons&source=platform" async="async" data-href="{{Request::url()}}"></script>
@endsection