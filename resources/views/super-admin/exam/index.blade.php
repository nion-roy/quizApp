@extends('layouts.backend.app')

@section('title', 'Subjects')


@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">MCQ Question Pattern !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">MCQ Question Pattern</li>
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
					<div class="d-flex align-items-center justify-content-between">
						<h4 class="card-title">All Exam Questions <span class="btn btn-success p-1"></span></h4>
						<a class="btn btn-success waves-effect waves-light" href="{{ route('super-admin.exams.create') }}"><i class="fa fa-plus-circle me-2"></i> Add Exam Question</a>
					</div>
				</div>

				<div class="card-body">

					<table id="datatable" class="table table-bordered dt-responsive nowrap w-100 align-middle">
						<thead>
							<tr>
								<th>#</th>
								<th>Department Name</th>
								<th>Count</th>
								<th>Creation User</th>
								<th>Created</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>


						<tbody>
							<tr>
								<th>#</th>
								<th>Department Name</th>
								<th>Count</th>
								<th>Creation User</th>
								<th>Created</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</tbody>

					</table>

				</div>

			</div>
		</div>
		<!-- end col -->
	</div>
	<!-- end row -->

@endsection
