@section('writers')
	active show-sub
@endsection

@section('add-writers')
	active
@endsection

@section('title')
	Update Writers
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="{{route('/')}}">Boiutso</a>
	<span class="breadcrumb-item active">Update Writers </span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Update Writers</div>
				<div class="card-body">
					<form action="{{route('admin.writer.update',$writer->id)}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="row row-sm">
							 <div class="col-md-6">
									<div class="form-group">
		                  <label class="form-control-label">English Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="name_en" value="{{$writer->name_en}}">
		                  @error('name_en')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
					        </div>
			          </div>
			          <div class="col-md-6">
									<div class="form-group">
		                  <label class="form-control-label">Bangla Name: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="name_bn" value="{{$writer->name_bn}}">
		                  @error('name_bn')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
					        </div>
			          </div>

			          <div class="col-md-6">
									<div class="form-group">
	                  <label class="form-control-label">English Phone: <span class="tx-danger">*</span></label>
	                  <input class="form-control" type="text" name="phone_en" value="{{$writer->phone_en}}">
	                  @error('phone_en')
	                  <span class="tx-danger">{{$message}}</span>
	                  @enderror
	                </div>
			           </div>
			           <div class="col-md-6">
					<div class="form-group">
	                  <label class="form-control-label">Bangla Phone: <span class="tx-danger">*</span></label>
	                  <input class="form-control" type="text" name="phone_bn" value="{{$writer->name_bn}}">
	                  @error('phone_bn')
	                  <span class="tx-danger">{{$message}}</span>
	                  @enderror
	                </div>
			           </div>

			           <div class="col-md-6">
											<div class="form-group">
				                  <label class="form-control-label">English DOB: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="dob_en" value="{{$writer->dob_en}}">
				                  @error('dob_en')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            </div>
			            <div class="col-md-6">
											<div class="form-group">
				                  <label class="form-control-label">Bangla DOB: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="dob_bn" value="{{$writer->dob_bn}}">
				                  @error('dob_bn')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            </div>
			            <div class="col-md-6">
												<div class="form-group">
				                  <label class="form-control-label">English DOD: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="dod_en" value="{{$writer->dod_en}}">
				                  @error('dod_en')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            </div>
			            <div class="col-md-6">
												<div class="form-group">
				                  <label class="form-control-label">Bangla DOD: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="dod_bn" value="{{$writer->dod_bn}}">
				                  @error('dod_bn')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            </div>

			           <div class="col-md-12">
											<div class="form-group">
				                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="text" name="email" value="{{$writer->email}}">
				                  @error('email')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				               </div>
			           </div>
			           
			            <div class="col-md-6">
							<div class="form-group">
				                  <label class="form-control-label">English History Of Life: <span class="tx-danger">*</span></label>
				                  <textarea name="history_of_life_en" id="summernote-one" class="form-control">{{$writer->history_of_life_en}}</textarea>
				                  @error('history_of_life_en')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            </div>
			            <div class="col-md-6">
												<div class="form-group">
				                  <label class="form-control-label">Bangla History Of Life: <span class="tx-danger">*</span></label>
				                  <textarea name="history_of_life_bn" id="summernote-two" class="form-control">{{$writer->history_of_life_bn}}</textarea>
				                  @error('history_of_life_bn')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            </div>

			            <div class="col-md-6">
												<div class="form-group">
				                  <label class="form-control-label">English Description: <span class="tx-danger">*</span></label>
				                  <textarea name="description_en" id="summernote-three" class="form-control">{{$writer->description_en}}</textarea>
				                  @error('description_en')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-6">
												<div class="form-group">
				                  <label class="form-control-label">Bangla Description: <span class="tx-danger">*</span></label>
				                  <textarea name="description_bn" id="summernote-four" class="form-control">{{$writer->description_bn}}</textarea>
				                  @error('description_bn')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                </div>
			            	</div>
			            	<div class="col-md-6">
											<div class="form-group">
				                  <label class="form-control-label">Writer Image: <span class="tx-danger">*</span></label>
				                  <input class="form-control" type="file" name="image" onchange="imageUrl(this)">
				                  @error('image')
				                  <span class="tx-danger">{{$message}}</span>
				                  @enderror
				                  <img src="{{asset($writer->image)}}" style="width:100px" id="image">
				                </div>
			            	</div>
		            	</div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Update Writer">
		                </div>
		            </form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="{{asset('admin/lib/jquery/jquery.js')}}"></script>
 <script>
    function imageUrl(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
            $('#image').attr('src',e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
 </script>
@endsection