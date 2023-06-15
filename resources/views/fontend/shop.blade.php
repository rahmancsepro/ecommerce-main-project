@extends('layouts.fontend-master')
@section('title')
	shop page
@endsection
@section('content')

<!-- ========================= HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Shop</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<form action="{{route('shop.filter')}}" method="POST">
			@csrf
		<div class='row'>
			<div class='col-md-3 sidebar'>
<!-- ===== TOP NAVIGATION ========= -->
@include('fontend.inc.category')
<!-- ====== TOP NAVIGATION : END ============= -->	 

<div class="sidebar-module-container">           	
	<div class="sidebar-filter">
<!-- =========== SIDEBAR CATEGORY ================== -->
		<div class="sidebar-widget wow fadeInUp">
			<h3 class="section-title">Shop by category</h3>
			<div class="sidebar-widget-body">
				<div class="accordion">
					@php
					if(!empty($_GET['category'])){
						$filterCat = explode(',',$_GET['category']);
					}
					@endphp
					@foreach($categories as $category)
			    	<div class="accordion-group">
			            <div class="accordion-heading">
			            	<label class="form-check-label">
			            		<input type="checkbox" class="form-check-input" name="category[]" value="{{$category->category_slug_en}}" onchange="this.form.submit()" @if(!empty($filterCat) && in_array($category->category_slug_en,$filterCat)) checked @endif>
			            		@if (session()->get('language') == 'bangla')
				                   {{$category->category_name_bn}}
				                 @else
				                 	{{$category->category_name_bn}}
				                 @endif
			            	</label>
			            </div><!-- /.accordion-heading -->
			        </div><!-- /.accordion-group -->
			        @endforeach
	    		</div><!-- /.accordion -->
			</div><!-- /.sidebar-widget-body -->
		</div><!-- /.sidebar-widget -->
<!-- ===== SIDEBAR CATEGORY : END ==================== -->

<!-- =========== SIDEBAR BRANDS ================== -->
		<div class="sidebar-widget wow fadeInUp">
			<h3 class="section-title">Shop by brand</h3>
			<div class="sidebar-widget-body">
				<div class="accordion">
					@php
					if(!empty($_GET['brand'])){
						$brandCat = explode(',',$_GET['brand']);
					}
					@endphp
					@foreach($brands as $brand)
			    	<div class="accordion-group">
			            <div class="accordion-heading">
			            	<label class="form-check-label">
			            		<input type="checkbox" class="form-check-input" name="brand[]" value="{{$brand->brand_slug_en}}" onchange="this.form.submit()" @if(!empty($brandCat) && in_array($brand->brand_slug_en,$brandCat)) checked @endif>
			            		@if (session()->get('language') == 'bangla')
				                   {{$brand->brand_name_bn}}
				                 @else
				                 	{{$brand->brand_name_bn}}
				                 @endif
			            	</label>
			            </div><!-- /.accordion-heading -->
			        </div><!-- /.accordion-group -->
			        @endforeach
	    		</div><!-- /.accordion -->
			</div><!-- /.sidebar-widget-body -->
		</div><!-- /.sidebar-widget -->
<!-- ===== SIDEBAR BRANDS : END ==================== -->

<!-- ========= PRICE SILDER ==================== -->
		<div class="sidebar-widget wow fadeInUp">
			<div class="widget-header">
				<h4 class="widget-title">Price Slider</h4>
			</div>
			<div class="sidebar-widget-body m-t-10">
				<div class="price-range-holder">
		      	    <div id="slider-range" class="price-filter-range" data-min="{{Helper::minPrice()}}" data-max="{{Helper::maxPrice()}}"></div>

		      	    <input type="hidden" id="price_range" name="price_range" value="@if(!empty($_GET['price'])) {{$_GET['price']}} @endif">
		      	    <br>
		      	    @if(!empty($_GET['price']))
		      	    	@php
			            	$price = explode('-',$_GET['price']);
			            @endphp
			        @endif
		      	    <input type="text" id="amount" value="@if(!empty($_GET['price']))TK {{$price[0]}} @else TK {{Helper::minPrice()}} @endif- @if(!empty($_GET['price']))TK {{$price[1]}} @else TK {{Helper::maxPrice()}} @endif"  class="form-control" readonly>
		        </div><!-- /.price-range-holder -->

		        <button type="submit" class="lnk btn btn-primary">Show Now</button>

			</div><!-- /.sidebar-widget-body -->
		</div><!-- /.sidebar-widget -->
<!-- ========= PRICE SILDER : END ================== -->
<!-- ===================== MANUFACTURES ============= -->
		<div class="sidebar-widget wow fadeInUp">
			<div class="widget-header">
				<h4 class="widget-title">Manufactures</h4>
			</div>
			<div class="sidebar-widget-body">
				<ul class="list">
		            <li><a href="#">Forever 18</a></li>
		            <li><a href="#">Nike</a></li>
		            <li><a href="#">Dolce & Gabbana</a></li>
		            <li><a href="#">Alluare</a></li>
		            <li><a href="#">Chanel</a></li>
		            <li><a href="#">Other Brand</a></li>
		          </ul>
		        <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
			</div><!-- /.sidebar-widget-body -->
		</div><!-- /.sidebar-widget -->
<!-- ============== MANUFACTURES: END ================ -->
<!-- ============ COLOR ================= -->
		<div class="sidebar-widget wow fadeInUp">
			<div class="widget-header">
				<h4 class="widget-title">Colors</h4>
			</div>
			<div class="sidebar-widget-body">
				<ul class="list">
		            <li><a href="#">Red</a></li>
		            <li><a href="#">Blue</a></li>
		            <li><a href="#">Yellow</a></li>
		            <li><a href="#">Pink</a></li>
		            <li><a href="#">Brown</a></li>
		            <li><a href="#">Teal</a></li>
		          </ul>
			</div><!-- /.sidebar-widget-body -->
		</div><!-- /.sidebar-widget -->
<!-- ========= COLOR: END ================== -->

<!-- ========= COMPARE ================== -->
		<div class="sidebar-widget wow fadeInUp outer-top-vs">
		    <h3 class="section-title">Compare products</h3>
			<div class="sidebar-widget-body">
				<div class="compare-report">
					<p>You have no <span>item(s)</span> to compare</p>
				</div><!-- /.compare-report -->
			</div><!-- /.sidebar-widget-body -->
		</div><!-- /.sidebar-widget -->
<!-- ======  COMPARE: END ================== -->

<!-- =========== PRODUCT TAGS ====================== -->
@include('fontend.inc.product-tags')
<!-- ======= PRODUCT TAGS : END ===================== -->	

<!-- =======Testimonials ================== -->
@include('fontend.inc.testimonial')    
<!-- =========== Testimonials: END ================== -->

<div class="home-banner">
<img src="assets/images/banners/LHS-banner.jpg" alt="Image">
</div> 

	            	</div><!-- /.sidebar-filter -->
	            </div><!-- /.sidebar-module-container -->
            </div><!-- /.sidebar -->

<div class='col-md-9'>
<!-- ===== SECTION – HERO =============== -->

	<div id="category" class="category-carousel hidden-xs">
		<div class="item">	
			<div class="image">
				<img src="{{asset('fontend/images/banners/cat-banner-1.jpg')}}" alt="" class="img-responsive">
			</div>
			<div class="container-fluid">
				<div class="caption vertical-top text-left">
					<div class="big-text">
						Big Sale
					</div>

					<div class="excerpt hidden-sm hidden-md">
						Save up to 49% off
					</div>
                    <div class="excerpt-normal hidden-sm hidden-md">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit
					</div>
					
				</div><!-- /.caption -->
			</div><!-- /.container-fluid -->
		</div>
	</div>

		

			
<!-- ===== SECTION – HERO : END ======================== -->
	<div class="clearfix filters-container m-t-10">
	<div class="row">
		<div class="col col-sm-6 col-md-2">
			<div class="filter-tabs">
				<ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
					<li class="active">
						<a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a>
					</li>
					<li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
				</ul>
			</div><!-- /.filter-tabs -->
		</div><!-- /.col -->
		<div class="col col-sm-12 col-md-6">
			<div class="col col-sm-3 col-md-6 no-padding">
				<div class="lbl-cnt">
					<div class="fld inline">
						<div class="dropdown dropdown-small dropdown-med dropdown-white inline">
							<select class="form-control" name="sort" id="sortBy" onchange="this.form.submit()">
								<option value="">Sort By Products</option>
								<option value="priceHighToLow">Price: High To Low</option>
								<option value="priceLowToHigh">Price: Low To High</option>
								<option value="nameAtoZ">Product Name: A To Z</option>
								<option value="nameZtoA">Product Name: Z To A</option>
							</select>
						</div>
					</div><!-- /.fld -->
				</div><!-- /.lbl-cnt -->
			</div><!-- /.col -->
			<div class="col col-sm-3 col-md-6 no-padding">
				<div class="lbl-cnt">
					<span class="lbl">Show</span>
					<div class="fld inline">
						<div class="dropdown dropdown-small dropdown-med dropdown-white inline">
							<button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
								1 <span class="caret"></span>
							</button>
							<ul role="menu" class="dropdown-menu">
								<li role="presentation"><a href="#">1</a></li>
								<li role="presentation"><a href="#">2</a></li>
								<li role="presentation"><a href="#">3</a></li>
								<li role="presentation"><a href="#">4</a></li>
								<li role="presentation"><a href="#">5</a></li>
								<li role="presentation"><a href="#">6</a></li>
								<li role="presentation"><a href="#">7</a></li>
								<li role="presentation"><a href="#">8</a></li>
								<li role="presentation"><a href="#">9</a></li>
								<li role="presentation"><a href="#">10</a></li>
							</ul>
						</div>
					</div><!-- /.fld -->
				</div><!-- /.lbl-cnt -->
			</div><!-- /.col -->
		</div><!-- /.col -->
		<div class="col col-sm-6 col-md-4 text-right">

		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
		<div class="search-result-container ">
			<div id="myTabContent" class="tab-content category-list">
				<div class="tab-pane active " id="grid-container">
					<div class="category-product">
						<div class="row">	
						@include('fontend.inc.grid_view_product')
						</div><!-- /.row -->
					</div><!-- /.category-product -->			
				</div><!-- /.tab-pane -->
								
			<div class="tab-pane "  id="list-container">
				<div class="category-product">	
				@include('fontend.inc.list_view_product')
				</div><!-- /.category-product -->
			</div><!-- /.tab-pane #list-container -->
		</div><!-- /.tab-content -->
		<div class="clearfix filters-container">
								
			<div class="text-right">
				{{ $products->appends($_GET)->links() }}
			</div><!-- /.text-right -->
		</div><!-- /.filters-container -->
	</div><!-- /.search-result-container -->
</div><!-- /.col -->
</div><!-- /.row -->
</form>
</div><!-- /.container -->
</div><!-- /.body-content -->
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		if($('#slider-range').length > 0){
			const min_price = parseInt($('#slider-range').data('min'));
			const max_price = parseInt($('#slider-range').data('max'));
			let price_range = min_price+"-"+max_price;

			if ($('#price_range').length > 0 && $('#price_range').val()) {
				price_range = $('#price_range').val().trim();
			}

			let price = price_range.split('-');

			$("#slider-range").slider({
			  range: true,
			  min: min_price,
			  max: max_price,
			  values: price,

			  slide: function (event, ui) {
			    $("#amount").val('TK '+ui.values[0] +' - '+ 'TK '+ui.values[1]);
			    $("#price_range").val(ui.values[0]+'-'+ui.values[1]);
			  }

			});

		}
	});
</script>
@endsection