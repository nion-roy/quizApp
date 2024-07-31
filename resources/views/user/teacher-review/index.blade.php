@extends('layouts.backend.app')

@section('title', 'MCQ Practice Results')

@section('main_content')


	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">MCQ Practice Results !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">MCQ Practice Results</li>
					</ol>
				</div>

			</div>
		</div>
	</div>
	<!-- end page title -->

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">All Result Questions <span class="btn btn-success p-1"></span></h4>
				</div>

				<div class="card-body">

					@include('alert-message.alert-message')

					<table id="datatable" class="table table-bordered dt-responsive nowrap w-100 align-middle">
						<thead>
							<tr>
								<th>#</th>
								<th>Practice Date</th>
								<th>Total Time</th>
								<th>Using Time</th>
								<th>Action</th>
							</tr>
						</thead>

					</table>

				</div>

			</div>
		</div>
	</div>
	<!-- end row -->
@endsection
