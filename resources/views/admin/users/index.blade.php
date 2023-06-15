@section('users')
	active
@endsection

@section('title')
	User List
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">User List ()</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-12">
	        <div class="card">
	          <h6 class="card-header">User List 
	          	<span class="badge badge-pill badge-info">Total User ({{count($users)}})</span>
	          	@php $active_user = 0; @endphp
	          	@foreach($users as $user)
	          		@php
	          		if($user->userIsOnline()){
	          			$active_user = $active_user + 1;
	          		}
	          		@endphp
	          	@endforeach
	          	<span class="badge badge-pill badge-success">Active User ({{$active_user}})</span>
	          </h6>
	          <div class="pd-10 pd-sm-15">
		          <div class="table-wrapper">
		            <table id="datatable1" class="table display responsive nowrap">
		              <thead>
		                <tr>
		                  <th class="wd-5p">SL</th>
		                  <th class="wd-15p">Image</th>
		                  <th class="wd-15p">Name</th>
		                  <th class="wd-20p">Email</th>
		                  <th class="wd-15p">Phone</th>
		                  <th class="wd-5p">Account</th>
		                  <th class="wd-5p">Active</th>
		                  <th class="wd-10p">Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              	@foreach($users as $user)
		              	<tr>
		                  <td>{{$loop->iteration}}</td>
		                  <td>
		                  	<img src="{{asset($user->image)}}" style="width:70px;">
		                  </td>
		                  <td>{{$user->name}}</td>
		                  <td>{{$user->email}}</td>
		                  <td>{{$user->phone}}</td>
		                  <td>
		                  	@if($user->isban == '0')
		                  	<span class="badge badge-pill badge-info">Unbanned</span>
		                  	@else
		                  	<span class="badge badge-pill badge-danger">Banned</span>
		                  	@endif
		                  </td>
		                  <td>
		                  	@if($user->userIsOnline())
		                  	<span class="badge badge-pill badge-success">Actve Now</span>
		                  	@else
		                  	<span class="badge badge-pill badge-danger">{{Carbon\Carbon::parse($user->last_seen)->diffForHumans()}}</span>
		                  	@endif
		                  </td>
		                  <td>
		                  	@if($user->isban == 0)
		                  	<a href="{{route('admin.user-banned',$user->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-lock"></i></a>
		                  	@else
		                  	<a href="{{route('admin.user-unbanned',$user->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-unlock"></i></a>
		                  	@endif
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