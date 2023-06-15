@section('writers')
	active show-sub
@endsection

@section('all-writers')
	active
@endsection
@section('title')
	All Writers
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">Writers</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-12">
	        <div class="card">
	          <h6 class="card-header">Writers List</h6>
	          <div class="pd-10 pd-sm-15">
		          <div class="table-wrapper">
		            <table id="datatable1" class="table display responsive nowrap">
		              <thead>
		                <tr>
		                  <th class="wd-5p">SL</th>
		                  <th class="wd-20p">Image</th>
		                  <th class="wd-20p">Name</th>
		                  <th class="wd-10p">Phone</th>
		                  <th class="wd-10p">Email</th>
		                  <th class="wd-10p">DOB</th>
		                  <th class="wd-10p">Status</th>
		                  <th class="wd-15p">Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              	@foreach($writers as $writer)
		              	<tr>
		                  <td>{{$loop->iteration}}</td>
		                  <td><img src="{{ asset($writer->image)}}" style="width: 70px;"></td>
		                  <td>{{$writer->name_en}}</td>
		                  <td>{{$writer->phone_en}}</td>
		                  <td>{{$writer->email}}</td>
		                  <td>{{$writer->dob_en}}</td>
		                  <td>
		                  	@if($writer->status==1)
		                  	<a href="{{route('admin.writer.inactive',$writer->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
		                  	@else
		                  	<a href="{{route('admin.writer.active',$writer->id)}}" class="btn btn-info btn-sm"><i class="fa fa-check"></i></a>
		                  	@endif
		                  </td>
		                  
		                  <td>
		                  	<a href="{{route('admin.writer.edit',$writer->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
		                  	<a href="{{route('admin.writer.destroy',$writer->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
		                  </td>
		                </tr>
		              	@endforeach
		              </tbody>
		            </table>
		          </div><!-- table-wrapper -->
	          </div>
	        </div><!-- card -->
		</div>
	</div>
</div>
@endsection