@extends('layouts.backend.app')

@section('title', 'Question View')

@section('main_content')


	<div class="container">

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
						<h4 class="card-title">All Result Questions <span class="btn btn-success p-1"></span></h4>
					</div>

					<div class="card-body">

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


							<tbody>
								@foreach ($results as $key => $result)
									<tr>
										<td>{{ getStrPad($key + 1) }}</td>
										<td>{{ $result->created_at->format('d-M-Y') }}</td>
										<td>{{ $result->total_time }}:00 Minutes</td>
										<td>{{ $result->use_time }} Minutes</td>
										<td>
											<a href="{{ route('user.practice.result.show', $result->id) }}" class="btn btn-success">Results</a>
											<a href="" class="btn btn-danger">Delete</a>
										</td>
									</tr>
								@endforeach
							</tbody>

						</table>

					</div>

				</div>
			</div>
			<!-- end col -->
		</div>
		<!-- end row -->

	</div>

@endsection
