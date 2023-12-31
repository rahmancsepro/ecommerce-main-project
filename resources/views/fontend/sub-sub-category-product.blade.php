@extends('layouts.fontend-master')
@section('title')
	
@endsection
@section('content')

<!-- ========================= HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Handbags</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row'>
			<div class='col-md-3 sidebar'>
<!-- ===== TOP NAVIGATION ========= -->
@include('fontend.inc.category')
<!-- ====== TOP NAVIGATION : END ============= -->	 

<div class="sidebar-module-container">           	
	<div class="sidebar-filter">
		<!-- =========== SIDEBAR CATEGORY ================== -->
		<div class="sidebar-widget wow fadeInUp">
			<h3 class="section-title">shop by</h3>
			<div class="widget-header">
				<h4 class="widget-title">Category</h4>
			</div>
			<div class="sidebar-widget-body">
				<div class="accordion">
					@foreach($categories as $category)
			    	<div class="accordion-group">
			            <div class="accordion-heading">
			                <a href="#collapse_{{$category->id}}" data-toggle="collapse" class="accordion-toggle collapsed">
			                @if (session()->get('language') == 'bangla')
			                   {{$category->category_name_bn}}
			                 @else
			                 	{{$category->category_name_bn}}
			                 @endif
			                </a>
			            </div><!-- /.accordion-heading -->

			            <div class="accordion-body collapse" id="collapse_{{$category->id}}" style="height: 0px;">
			                <div class="accordion-inner">
			                    <ul>
			                    	@foreach($category->subcategory as $subcat)
			                        <li>
			                        @if (session()->get('language') == 'bangla')
			                        	<a href="{{url('sub-category/product/'.$subcat->id.'/'.$subcat->subcategory_slug_bn)}}">{{$subcat->subcategory_name_bn}}</a>
						             @else
						                 <a href="{{url('sub-category/product/'.$subcat->id.'/'.$subcat->subcategory_slug_en)}}">{{$subcat->subcategory_name_en}}</a>
						             @endif
			                    	</li>
			                        @endforeach
			                    </ul>
			                </div><!-- /.accordion-inner -->
			            </div><!-- /.accordion-body -->

			        </div><!-- /.accordion-group -->
			        @endforeach
	    		</div><!-- /.accordion -->
			</div><!-- /.sidebar-widget-body -->
		</div><!-- /.sidebar-widget -->
<!-- ===== SIDEBAR CATEGORY : END ==================== -->

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
<img src="{{asset('fontend/images/banners/LHS-banner.jpg')}}" alt="Image">
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
					<span class="lbl">Sort by</span>
					<div class="fld inline">
						<div class="dropdown dropdown-small dropdown-med dropdown-white inline">
							<button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
								Position <span class="caret"></span>
							</button>

							<ul role="menu" class="dropdown-menu">
								<li role="presentation"><a href="#">position</a></li>
								<li role="presentation"><a href="#">Price:Lowest first</a></li>
								<li role="presentation"><a href="#">Price:HIghest first</a></li>
								<li role="presentation"><a href="#">Product Name:A to Z</a></li>
							</ul>
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
				{{ $products->links() }}
			</div><!-- /.text-right -->
		</div><!-- /.filters-container -->
	</div><!-- /.search-result-container -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container -->
</div><!-- /.body-content -->
@endsection