@foreach($products as $product)
<div class="col-sm-6 col-md-4 wow fadeInUp">
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
				<div class="tag new"><span>
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
				</h3>
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