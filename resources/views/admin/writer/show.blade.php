@section('products')
	active show-sub
@endsection

@section('add-products')
	active
@endsection

@section('title')
	Details Product
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">Details Products</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Details Product</div>
				<div class="card-body">
						<div class="row row-sm">
							<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Brand Name</label>
				                  <input class="form-control"  readonly value="{{optional($product->brand)->brand_name_en}}">
				            </div>
			           </div>
			                <div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Category Name</label>
				                  <input class="form-control"  readonly value="{{optional($product->category)->category_name_en}}">
				                </div>
			                </div>
			                <div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Sub Category Name</label>
				                  <input class="form-control"  readonly value="{{optional($product->subcategory)->subcategory_name_en}}">
				                </div>
			                </div>
			                <div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Sub Sub Category Name</label>
				                  <input class="form-control"  readonly value="{{optional($product->subsubcategory)->subsubcategory_name_en}}">
				                </div>
			                </div>
			                <div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">English Product Name</label>
				                  <input class="form-control" readonly value="{{$product->product_name_en}}">
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Bangla Product Name</label>
				                  <input class="form-control" readonly value="{{$product->product_name_bn}}">
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Product Code</label>
				                  <input class="form-control" readonly value="{{$product->product_name_en}}">
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Product Qty</label>
				                  <input class="form-control" readonly value="{{$product->product_qty}}">
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Selling Price</label>
				                  <input class="form-control" readonly value="{{$product->selling_price}}">
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Discount Price</label>
				                  <input class="form-control" readonly value="{{$product->discount_price}}">
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">English Product Tag</label>
				                  <input class="form-control" readonly data-role="tagsinput" value="{{$product->product_tags_en}}">
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Bangla Product Tag</label>
				                  <input class="form-control" readonly data-role="tagsinput" value="{{$product->product_tags_bn}}">
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">English Product Size</label>
				                  <input class="form-control" readonly data-role="tagsinput" value="{{$product->product_size_en}}">
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Bangla Product Size</label>
				                  <input class="form-control" readonly data-role="tagsinput" value="{{$product->product_size_bn}}">
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">English Product Color</label>
				                  <input class="form-control" readonly data-role="tagsinput" value="{{$product->product_color_en}}">
				                </div>
			            	</div>
			            	<div class="col-md-12">
								<div class="form-group">
				                  <label class="form-control-label">Bangla Product Color</label>
				                  <input class="form-control" readonly data-role="tagsinput" value="{{$product->product_color_bn}}">
				                </div>
			            	</div>
			            	<div class="col-md-6">
								<div class="form-group">
				                  <label class="form-control-label">English Short Descption</label>
				                  <textarea id="summernote-one" class="form-control">{{$product->short_descp_en}}</textarea>
				                </div>
			            	</div>
			            	<div class="col-md-6">
								<div class="form-group">
				                  <label class="form-control-label">Bangla Short Descption</label>
				                  <textarea  id="summernote-two" class="form-control">{{$product->short_descp_bn}}</textarea>
				                </div>
			            	</div>
			            	<div class="col-md-6">
								<div class="form-group">
				                  <label class="form-control-label">English Long Descption</label>
				                  <textarea id="summernote-three" class="form-control">{{$product->long_descp_en}}</textarea>
				                </div>
			            	</div>
			            	<div class="col-md-6">
								<div class="form-group">
				                  <label class="form-control-label">Bangla Long Descption</label>
				                  <textarea id="summernote-four" class="form-control">{{$product->long_descp_bn}}</textarea>
				                </div>
			            	</div>
			            	<div class="col-md-3">
								<div class="form-group">
				                  <label class="ckbox">
					                <input type="checkbox" value="1" {{$product->hot_deals == 1 ? 'checked' : ''}}><span>Hot Deals</span>
					              </label>
				                </div>
			            	</div>
			            	<div class="col-md-3">
								<div class="form-group">
				                  <label class="ckbox">
					                <input type="checkbox"  value="1" {{$product->featured == 1 ? 'checked' : ''}}><span>Featured</span>
					              </label>
				                </div>
			            	</div>
			            	<div class="col-md-3">
								<div class="form-group">
				                  <label class="ckbox">
					                <input type="checkbox"  value="1" {{$product->special_offer == 1 ? 'checked' : ''}}><span>Special Offer</span>
					              </label>
				                </div>
			            	</div>
			            	<div class="col-md-3">
								<div class="form-group">
				                  <label class="ckbox">
					                <input type="checkbox"  value="1" {{$product->special_deals == 1 ? 'checked' : ''}}><span>Special Deals</span>
					              </label>
				                </div>
			            	</div>
		            	</div>
            <hr>
            	<h2 class="text-center text-dark">Product Thumbnail</h2>
            <hr>
		        <div class="row row-sm">
					<div class="col-md-3">
						<div class="card">
						  <img class="card-img-top" src="{{asset($product->product_thumbnail)}}" alt="Card image cap" id="mainThmb">
						</div>
            		</div>
			      </div>
			      <hr>
            	<h2 class="text-center text-dark">Product Image</h2>
            <hr>
		        <div class="row row-sm">
		        	@foreach($product->productimage as $proimage)
				<div class="col-md-3">
					<div class="card">
					  <img class="card-img-top" src="{{asset($proimage->product_image)}}" alt="Card image cap" id="mainThmb">
					</div>
            	</div>
            	@endforeach
			      </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection