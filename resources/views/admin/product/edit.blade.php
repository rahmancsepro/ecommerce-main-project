@section('products')
	active show-sub
@endsection

@section('add-products')
	active
@endsection

@section('title')
	Update Product
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">Update Products</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Update Product</div>
				<div class="card-body">
					<form action="{{route('admin.product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="row row-sm">
							<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Select Brand <span class="tx-danger">*</span></label>
				                  <select class="form-control select2-show-search" name="brand_id" data-placeholder="Choose one">
					                  <option label="Choose one"></option>
					                  @foreach($brands as $brand)
					                  <option {{$brand->id == $product->brand_id ? "selected" : ""}} value="{{$brand->id}}">{{$brand->brand_name_en}}</option>
					                  @endforeach
				                </select>
				                  @error('brand_id')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				            </div>
			           </div>
			                <div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Select Category <span class="tx-danger">*</span></label>
				                  <select class="form-control select2-show-search" name="category_id" data-placeholder="Choose one">
					                  <option label="Choose one"></option>
					                  @foreach($categories as $category)
					                  <option {{$category->id == $product->category_id ? "selected" : ""}} value="{{$category->id}}">{{$category->category_name_en}}</option>
					                  @endforeach
				                </select>
				                  @error('category_id')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			                </div>
			                <div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Select Sub Category <span class="tx-danger">*</span></label>
				                  <select class="form-control select2-show-search" name="sub_category_id" data-placeholder="Choose one">
					                  <option label="Choose one"></option>
				                </select>
				                  @error('sub_category_id')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			                </div>
			                <div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Select Sub Sub Category <span class="tx-danger">*</span></label>
				                  <select class="form-control select2-show-search" name="sub_sub_category_id" data-placeholder="Choose one">
					                  <option label="Choose one"></option>
				                </select>
				                  @error('sub_sub_category_id')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			                </div>
			                <div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">English Product Name: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="product_name_en" value="{{$product->product_name_en}}">
				                  @error('product_name_en')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Bangla Product Name: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="product_name_bn" value="{{$product->product_name_bn}}">
				                  @error('product_name_bn')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="product_code" value="{{$product->product_code}}">
				                  @error('product_code')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Product Qty: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="product_qty" value="{{$product->product_qty}}">
				                  @error('product_qty')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="selling_price" value="{{$product->selling_price}}">
				                  @error('selling_price')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Discount Price: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="discount_price" value="{{$product->discount_price}}">
				                  @error('discount_price')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">English Product Tag: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="product_tags_en" data-role="tagsinput" value="{{$product->product_tags_en}}">
				                  @error('product_tags_en')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Bangla Product Tag: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="product_tags_bn" data-role="tagsinput" value="{{$product->product_tags_bn}}">
				                  @error('product_tags_bn')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">English Product Size: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="product_size_en" data-role="tagsinput" value="{{$product->product_size_en}}">
				                  @error('product_size_en')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Bangla Product Size: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="product_size_bn" data-role="tagsinput" value="{{$product->product_size_bn}}">
				                  @error('product_size_bn')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">English Product Color: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="product_color_en" data-role="tagsinput" value="{{$product->product_color_en}}">
				                  @error('product_color_en')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-12">
								<div class="form-group">
				                  <label class="form-control-label">Bangla Product Color: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="product_color_bn" data-role="tagsinput" value="{{$product->product_color_bn}}">
				                  @error('product_color_bn')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-6">
								<div class="form-group">
				                  <label class="form-control-label">English Short Descption: <span class="tx-danger">*</span></label>
				                  <textarea name="short_descp_en" id="summernote-one" class="form-control">{{$product->short_descp_en}}</textarea>
				                  @error('short_descp_en')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-6">
								<div class="form-group">
				                  <label class="form-control-label">Bangla Short Descption: <span class="tx-danger">*</span></label>
				                  <textarea name="short_descp_bn" id="summernote-two" class="form-control">{{$product->short_descp_bn}}</textarea>
				                  @error('short_descp_bn')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-6">
								<div class="form-group">
				                  <label class="form-control-label">English Long Descption: <span class="tx-danger">*</span></label>
				                  <textarea name="long_descp_en" id="summernote-three" class="form-control">{{$product->long_descp_en}}</textarea>
				                  @error('long_descp_en')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-6">
												<div class="form-group">
				                  <label class="form-control-label">Bangla Long Descption: <span class="tx-danger">*</span></label>
				                  <textarea name="long_descp_bn" id="summernote-four" class="form-control">{{$product->long_descp_bn}}</textarea>
				                  @error('long_descp_bn')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-3">
								<div class="form-group">
				                  <label class="ckbox">
					                <input type="checkbox" name="hot_deals" value="1" {{$product->hot_deals == 1 ? 'checked' : ''}}><span>Hot Deals</span>
					              </label>
				                  @error('hot_deals')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-3">
								<div class="form-group">
				                  <label class="ckbox">
					                <input type="checkbox" name="featured" value="1" {{$product->featured == 1 ? 'checked' : ''}}><span>Featured</span>
					              </label>
				                  @error('featured')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-3">
								<div class="form-group">
				                  <label class="ckbox">
					                <input type="checkbox" name="special_offer" value="1" {{$product->special_offer == 1 ? 'checked' : ''}}><span>Special Offer</span>
					              </label>
				                  @error('special_offer')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-3">
								<div class="form-group">
				                  <label class="ckbox">
					                <input type="checkbox" name="special_deals" value="1" {{$product->special_deals == 1 ? 'checked' : ''}}><span>Special Deals</span>
					              </label>
				                  @error('special_deals')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
		            	</div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Update Product">
		                </div>
		            </form>
            <hr>
            	<h2 class="text-center text-dark">Update Product Thumbnail</h2>
            <hr>
            <form action="{{route('admin.product.thumbnail.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            	@csrf
		        <div class="row row-sm">
							<div class="col-md-3">
								<div class="card">
								  <img class="card-img-top" src="{{asset($product->product_thumbnail)}}" alt="Card image cap" id="mainThmb">
								  <div class="card-body">
								    <label class="form-control-label">Product Thumbnail: <span class="tx-danger">*</span></label>
			                  <input class="form-control" type="file" name="product_thumbnail" onchange="mainThambUrl(this)">
			                  @error('product_thumbnail')
			                  <span class="tx-danger">{{$message}}</span>
			                  @enderror
			                  <img src="" >
								  </div>
								</div>
            	</div>
			      </div>
			      <div class="form-group">
              <input class="btn btn-info" type="submit" value="Update Product Thumbnail">
            </div>
			      </form>
			      <hr>
            	<h2 class="text-center text-dark">Update Product Image</h2>
            <hr>
            <form action="{{route('admin.product.image.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            	@csrf
		        <div class="row row-sm">
		        	@foreach($product->productimage as $proimage)
							<div class="col-md-3">
								<div class="card">
								  <img class="card-img-top" src="{{asset($proimage->product_image)}}" alt="Card image cap" id="mainThmb">
								  <div class="card-body">
								    <a href="{{route('admin.product.image.delete',$proimage->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a> <br>

								    <label class="form-control-label">Product Image: <span class="tx-danger">*</span></label>
			                  <input class="form-control" type="file" name="product_image[{{$proimage->id}}]">
			                  @error('product_image')
			                  <span class="tx-danger">{{$message}}</span>
			                  @enderror
			                  <!-- <div class="row" id="preview_img" ></div> -->
								  </div>
								</div>
            	</div>
            	@endforeach
			      </div>
			      <div class="form-group">
              <input class="btn btn-info" type="submit" value="Update Product Image">
            </div>
			      </form>
			      <form action="{{route('admin.product.image.add')}}" method="POST" enctype="multipart/form-data">
			      	@csrf
                <label class="form-control-label">Add Image: <span class="tx-danger">*</span></label> <br>
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input class="btn btn-sm" type="file" name="multipleImage[]" multiple id="multiImg">
                <br>
                @error('multipleImage')
                <span class="tx-danger">{{$message}}</span>
                @enderror
                <div class="row" id="preview_img" ></div>
                <div class="form-group">
		              <input class="btn btn-info" type="submit" value="Add Product Image">
		            </div>
			      </form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="{{asset('admin/lib/jquery/jquery.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('select[name="category_id"]').on('change',function(){
			var category_id = $(this).val();
			if(category_id){
				$.ajax({
					url:"{{url('/admin/sub-category-ajax')}}/"+category_id,
					type:'GET',
					dataType:'json',
					success:function(data){
						$('select[name="sub_sub_category_id"]').html('');
						var id = $('select[name="sub_category_id"]').empty();
						$.each(data,function(key, value){
							$('select[name="sub_category_id"]').append('<option value="'+value.id+'">'+value.subcategory_name_en+'</option>');
						});
					}
				});
			}
		});

		$('select[name="sub_category_id"]').on('change',function(){
			var sub_category_id = $(this).val();
			if(sub_category_id){
				$.ajax({
					url:"{{url('/admin/sub-sub-category-ajax')}}/"+sub_category_id,
					type:'GET',
					dataType:'json',
					success:function(data){
						var id = $('select[name="sub_sub_category_id"]').empty();
						$.each(data,function(key, value){
							$('select[name="sub_sub_category_id"]').append('<option value="'+value.id+'">'+value.subsubcategory_name_en+'</option>');
						});
					}
				});
			}
		});
	});
</script>
<script>
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img style="margin:10px"/>').addClass('thumb').attr('src', e.target.result) .width(100).height(100); //create image element
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
  </script>
  <script>
    function mainThambUrl(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
            $('#mainThmb').attr('src',e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
@endsection