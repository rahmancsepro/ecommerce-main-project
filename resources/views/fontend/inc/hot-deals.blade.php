<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
	<h3 class="section-title">hot deals</h3>
	<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
		@foreach($hot_deals as $hot_deal)
		<div class="item">
			<div class="products">
				<div class="hot-deal-wrapper">
					<div class="image">
						@if (session()->get('language') == 'bangla')
        				<a href="{{url('single-product/'.$hot_deal->id,$hot_deal->product_slug_bn)}}"><img  src="{{asset($hot_deal->product_thumbnail)}}" alt=""></a>
        				@else
        				<a href="{{url('single-product/'.$hot_deal->id,$hot_deal->product_slug_en)}}"><img  src="{{asset($hot_deal->product_thumbnail)}}" alt=""></a>
        				@endif
					</div>
					@if($hot_deal->discount_price != NULL)
					<div class="sale-offer-tag"><span>
                			@if (session()->get('language') == 'bangla')
                				{{bn_price(find_discount($hot_deal->selling_price,$hot_deal->discount_price))}} %
                			@else
                				{{find_discount($hot_deal->selling_price,$hot_deal->discount_price)}} %
                			@endif
						<br>off</span>
					</div>
					@endif
					<div class="timing-wrapper">
						<div class="box-wrapper">
							<div class="date box">
								<span class="key">120</span>
								<span class="value">DAYS</span>
							</div>
						</div>
		                
		                <div class="box-wrapper">
							<div class="hour box">
								<span class="key">20</span>
								<span class="value">HRS</span>
							</div>
						</div>

		                <div class="box-wrapper">
							<div class="minutes box">
								<span class="key">36</span>
								<span class="value">MINS</span>
							</div>
						</div>

		                <div class="box-wrapper hidden-md">
							<div class="seconds box">
								<span class="key">60</span>
								<span class="value">SEC</span>
							</div>
						</div>
					</div>
				</div><!-- /.hot-deal-wrapper -->

				<div class="product-info text-left m-t-20">
					<h3 class="name">
						@if (session()->get('language') == 'bangla')
        				<a href="{{url('single-product/'.$hot_deal->id,$hot_deal->product_slug_bn)}}">
                    		{{$hot_deal->product_name_bn}}</a>
                    	@else
                    	<a href="{{url('single-product/'.$hot_deal->id,$hot_deal->product_slug_en)}}">
                    		{{$hot_deal->product_name_en}}</a>
                    	@endif
					</h3>
					<div class="rating rateit-small"></div>

					<div class="product-price">	
						@if($hot_deal->discount_price != NULL)
        				<span class="price">৳
        					@if (session()->get('language') == 'bangla')
        						{{bn_price(round($hot_deal->discount_price))}}
        					@else
        						{{round($hot_deal->discount_price)}}
        					@endif
        				</span>
        				<span class="price-before-discount">৳ 
        					@if (session()->get('language') == 'bangla')
        					{{bn_price(round($hot_deal->selling_price))}}
        					@else
        					{{round($hot_deal->selling_price)}}
        					@endif
        				</span>
        				@else
        				<span class="price"> ৳
        					@if (session()->get('language') == 'bangla')
        						{{bn_price(round($hot_deal->selling_price))}}
        					@else
        						{{round($hot_deal->selling_price)}}
        					@endif
        				</span>
        				@endif	
					</div><!-- /.product-price -->
					
				</div><!-- /.product-info -->

				<div class="cart clearfix animate-effect">
					<div class="action">
						
						<div class="add-cart-button btn-group">
							<button class="btn btn-primary icon" title="Add To Cart" data-toggle="modal" data-target="#exampleModal" type="button" id="{{$hot_deal->id}}" onclick="viewProduct(this.id)" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" title="Add To Cart" data-toggle="modal" data-target="#exampleModal" type="button" id="{{$hot_deal->id}}" onclick="viewProduct(this.id)" type="button">Add to cart</button>
													
						</div>
						
					</div><!-- /.action -->
				</div><!-- /.cart -->
			</div>	
		</div>
		@endforeach
    </div><!-- /.sidebar-widget -->
</div>