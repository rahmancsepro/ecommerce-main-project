@section('products')
	active show-sub
@endsection

@section('add-products')
	active
@endsection

@section('title')
	Add Product
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">Add Products</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Add Product</div>
				<div class="card-body">
					<form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="row row-sm">
							<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Select Writer <span class="tx-danger">*</span></label>
				                  <select class="form-control select2-show-search" name="writer_id" data-placeholder="Choose one">
					                  <option label="Choose one"></option>
					                  @foreach($writers as $writer)
					                  <option value="{{$writer->id}}">{{$writer->name_en}}</option>
					                  @endforeach
				                </select>
				                  @error('writer_id')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			        </div>
			        <div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Select Brand <span class="tx-danger">*</span></label>
				                  <select class="form-control select2-show-search" name="brand_id" data-placeholder="Choose one">
					                  <option label="Choose one"></option>
					                  @foreach($brands as $brand)
					                  <option value="{{$brand->id}}">{{$brand->brand_name_en}}</option>
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
					                  <option value="{{$category->id}}">{{$category->category_name_en}}</option>
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
				                  <input class="form-control" type="text" name="product_name_en">
				                  @error('product_name_en')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Bangla Product Name: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="product_name_bn">
				                  @error('product_name_bn')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="product_code">
				                  @error('product_code')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Product Qty: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="product_qty">
				                  @error('product_qty')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="selling_price">
				                  @error('selling_price')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Discount Price: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="discount_price">
				                  @error('discount_price')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">English Product Tag: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="product_tags_en" data-role="tagsinput">
				                  @error('product_tags_en')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Bangla Product Tag: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="product_tags_bn" data-role="tagsinput">
				                  @error('product_tags_bn')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">English Product Size: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="product_size_en" data-role="tagsinput">
				                  @error('product_size_en')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">Bangla Product Size: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="product_size_bn" data-role="tagsinput">
				                  @error('product_size_bn')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-4">
								<div class="form-group">
				                  <label class="form-control-label">English Product Color: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="product_color_en" data-role="tagsinput">
				                  @error('product_color_en')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-12">
								<div class="form-group">
				                  <label class="form-control-label">Bangla Product Color: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="product_color_bn" data-role="tagsinput">
				                  @error('product_color_bn')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-6">
								<div class="form-group">
				                  <label class="form-control-label">English Short Descption: <span class="tx-danger">*</span></label>
				                  <textarea name="short_descp_en" id="summernote-one" class="form-control"></textarea>
				                  @error('short_descp_en')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-6">
								<div class="form-group">
				                  <label class="form-control-label">Bangla Short Descption: <span class="tx-danger">*</span></label>
				                  <textarea name="short_descp_bn" id="summernote-two" class="form-control"></textarea>
				                  @error('short_descp_bn')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-6">
								<div class="form-group">
				                  <label class="form-control-label">English Long Descption: <span class="tx-danger">*</span></label>
				                  <textarea name="long_descp_en" id="summernote-three" class="form-control"></textarea>
				                  @error('long_descp_en')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-6">
								<div class="form-group">
				                  <label class="form-control-label">Bangla Long Descption: <span class="tx-danger">*</span></label>
				                  <textarea name="long_descp_bn" id="summernote-four" class="form-control"></textarea>
				                  @error('long_descp_bn')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-6">
								<div class="form-group">
				                  <label class="form-control-label">Product Thumbnail: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="file" name="product_thumbnail" onchange="mainThambUrl(this)">
				                  @error('product_thumbnail')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                  <img src="" id="mainThmb">
				                </div>
			            	</div>
			            	<div class="col-md-6">
								<div class="form-group">
				                  <label class="form-control-label">Multiple Image: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="file" name="multipleImage[]" multiple id="multiImg">
				                  @error('multipleImage')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                  <div class="row" id="preview_img" ></div>
				                </div>
			            	</div>
			            	<div class="col-md-3">
								<div class="form-group">
				                  <label class="ckbox">
					                <input type="checkbox" name="hot_deals" value="1"><span>Hot Deals</span>
					              </label>
				                  @error('hot_deals')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-3">
								<div class="form-group">
				                  <label class="ckbox">
					                <input type="checkbox" name="featured" value="1"><span>Featured</span>
					              </label>
				                  @error('featured')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-3">
								<div class="form-group">
				                  <label class="ckbox">
					                <input type="checkbox" name="special_offer" value="1"><span>Special Offer</span>
					              </label>
				                  @error('special_offer')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-3">
								<div class="form-group">
				                  <label class="ckbox">
					                <input type="checkbox" name="special_deals" value="1"><span>Special Deals</span>
					              </label>
				                  @error('special_deals')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
		            	</div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Add Product">
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
                      var img = $('<img style="margin:10px"/>').addClass('thumb').attr('src', e.target.result) .width(80).height(80); //create image element
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
            $('#mainThmb').attr('src',e.target.result).width(80).height(80);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
@endsection