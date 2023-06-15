@section('reports')
	active
@endsection
@section('title')
	Order Reports
@endsection

@extends('layouts.admin-master')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">Boiutso</a>
	<span class="breadcrumb-item active">Order Reports</span>
</nav>

<div class="sl-pagebody">
	<div class="row row-sm">
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">Search By Date</div>
				<div class="card-body">
					<form action="{{route('admin.order-date')}}" method="GET">
						<div class="form-group">
		                  <label class="form-control-label">Select Date: <span class="tx-danger">*</span></label>
		                  <input class="form-control" type="date" name="order_date">
		                  @error('order_date')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>
		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Search">
		                </div>
		            </form>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">Search By Month</div>
				<div class="card-body">
					<form action="{{route('admin.order-month')}}" method="GET">
						<div class="form-group">
		                  <label class="form-control-label">Select Month: <span class="tx-danger">*</span></label>
		                  <select class="form-control select2-show-search" name="order_month" data-placeholder="Choose one">
			                  <option label="Choose one"></option>
			                  <option value="January">January</option>
			                  <option value="February">February</option>
			                  <option value="March">March</option>
			                  <option value="April">April</option>
			                  <option value="May">May</option>
			                  <option value="June">June</option>
			                  <option value="July">July</option>
			                  <option value="August">August</option>
			                  <option value="September">September</option>
			                  <option value="October">October</option>
			                  <option value="November">November</option>
			                  <option value="December">December</option>
		                </select>
		                  @error('order_month')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>

		                <div class="form-group">
		                  <label class="form-control-label">Select Year: <span class="tx-danger">*</span></label>
		                  <select class="form-control select2-show-search" name="order_year" data-placeholder="Choose one">
			                  <option label="Choose one"></option>
			                  <option value="2029">2029</option>
			                  <option value="2028">2028</option>
			                  <option value="2027">2027</option>
			                  <option value="2026">2026</option>
			                  <option value="2025">2025</option>
			                  <option value="2024">2024</option>
			                  <option value="2023">2023</option>
			                  <option value="2022">2022</option>
		                </select>
		                  @error('order_year')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>

		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Search">
		                </div>
		            </form>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">Search By Year</div>
				<div class="card-body">
					<form action="{{route('admin.order-year')}}" method="GET">
						<div class="form-group">
		                  <label class="form-control-label">Select Year: <span class="tx-danger">*</span></label>
		                  <select class="form-control select2-show-search" name="order_year" data-placeholder="Choose one">
			                  <option label="Choose one"></option>
			                  <option value="2029">2029</option>
			                  <option value="2028">2028</option>
			                  <option value="2027">2027</option>
			                  <option value="2026">2026</option>
			                  <option value="2025">2025</option>
			                  <option value="2024">2024</option>
			                  <option value="2023">2023</option>
			                  <option value="2022">2022</option>
		                </select>
		                  @error('order_year')
		                  <span class="tx-danger">{{$message}}</span>
		                  @enderror
		                </div>

		                <div class="form-group">
		                  <input class="btn btn-info" type="submit" value="Search">
		                </div>
		            </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection