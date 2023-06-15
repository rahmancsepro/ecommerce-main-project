@section('sliders')
	active
@endsection
@section('title')
	Sliders
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">Sliders</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-8">
	        <div class="card">
	          <h6 class="card-header">Sliders List</h6>
	          <div class="pd-10 pd-sm-15">
		          <div class="table-wrapper">
		            <table id="datatable1" class="table display responsive nowrap">
		              <thead>
		                <tr>
		                  <th class="wd-5p">SL</th>
		                  <th class="wd-25p">Title</th>
		                  <th class="wd-35p">Description</th>
		                  <th class="wd-15p">Image</th>
		                  <th class="wd-5p">Status</th>
		                  <th class="wd-15p">Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              	@foreach($sliders as $slider)
		              	<tr>
		                  <td>{{$loop->iteration}}</td>
		                  <td>{{$slider->title_en}}</td>
		                  <td>{{$slider->description_en}}</td>
		                  <td>
		                  	<img src="{{asset($slider->image)}}" style="width:100px;" alt="Icon not found">
		                  </td>
		                  <td>
		                  	@if($slider->status==1)
		                  	<a href="{{route('admin.slider.inactive',$slider->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
		                  	@else
		                  	<a href="{{route('admin.slider.active',$slider->id)}}" class="btn btn-info btn-sm"><i class="fa fa-check"></i></a>
		                  	@endif
		                  </td>
		                  <td>
		                  	<a href="{{route('admin.slider.edit',$slider->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
		                  	<a href="{{route('admin.slider.destroy',$slider->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
		                  </td>
		                </tr>
		              	@endforeach
		              </tbody>
		            </table>
		          </div><!-- table-wrapper -->
	          </div>
	        </div><!-- card -->
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">Add Slider</div>
				<div class="card-body">
					<form action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
		                  <label class="form-control-label">English Slider Title: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="title_en" value="{{old('title_en')}}" placeholder="Enter English Brand Name">
		                  @error('title_en')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Bangla Slider Title: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="title_bn" value="{{old('title_bn')}}" placeholder="Enter Bangla Brand Name">
		                  @error('title_bn')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">English Slider Description: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="description_en" value="{{old('description_en')}}" placeholder="Enter Bangla Brand Name">
		                  @error('description_en')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Bangla Slider Description: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="text" name="description_bn" value="{{old('description_bn')}}" placeholder="Enter Bangla Brand Name">
		                  @error('description_bn')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <label class="form-control-label">Slider Image: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="file" name="image" onchange="Slider(this)">
		                  @error('image')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                  <img src="" id="sliderimg">
		                </div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Add Slider">
		                </div>
		            </form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="{{asset('admin/lib/jquery/jquery.js')}}"></script>
<script type="text/javascript">
	function Slider(input) {
		if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
            $('#sliderimg').attr('src',e.target.result).width(100).height(100);
        };
        reader.readAsDataURL(input.files[0]);
      }
	}
</script>
@endsection