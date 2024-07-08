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
					<h4 class="card-title">All Exam Questions <span class="btn btn-success p-1"></span></h4>
				</div>

				<div class="card-body">

					<table id="datatable" class="table table-bordered dt-responsive nowrap w-100 align-middle">
						<thead>
							<tr>
								<th>#</th>
								<th>Exam Name</th>
								<th>Department</th>
								<th>Subject</th>
								<th>Exam Date</th>
								<th>Start Time</th>
								<th>Exam Time</th>
								<th>Action</th>
							</tr>
						</thead>


						<tbody>
							@foreach ($exams as $key => $exam)
								<tr>
									<td>{{ getStrPad($key + 1) }}</td>
									<td>{{ $exam->exam_name }}</td>
									<td>{{ $exam->department->department_name }}</td>
									<td>{{ $exam->subject->subject_name }}</td>
									<td>{{ $exam->exam_date }}</td>
									<td>{{ $exam->exam_start }}</td>
									<td>{{ $exam->exam_time }}</td>
									<td>
										<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Start Exam</button>
										<a href="" class="btn btn-success">Results</a>
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

	<!-- Modal -->
	@if (isset($exam))
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
						<a href="{{ route('user.exams.show', $exam->slug) }}" type="button" class="btn btn-success">Continue</a>
					</div>
				</div>
			</div>
		</div>
	@endif


@endsection
