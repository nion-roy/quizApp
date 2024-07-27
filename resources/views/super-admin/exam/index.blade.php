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
								<th>Exam Name</th>
								<th>Department</th>
								<th>Subject</th>
								<th>Exam Start</th>
								<th>Exam End</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>


						<tbody>
							@foreach ($exams as $key => $exam)
								@php
									$examStartDateTime = \Carbon\Carbon::parse($exam->exam_start);
									$examEndDateTime = \Carbon\Carbon::parse($exam->exam_end);
								@endphp

								<tr>
									<td>{{ getStrPad($key + 1) }}</td>
									<td>{{ $exam->exam_name }}</td>
									<td>{{ $exam->department->department_name }}</td>
									<td>{{ $exam->subject->subject_name }}</td>
									<td>{{ $examStartDateTime->format('d F Y') }} - {{ $examStartDateTime->format('H:s A') }}</td>
									<td>{{ $examEndDateTime->format('d F Y') }} - {{ $examEndDateTime->format('H:s A') }}</td>
									<td>
										@if ($exam->status == 1)
											<span class="text-white bg-success px-2 py-1 rounded">Active</span>
										@elseif ($exam->status == 2)
											<span class="text-white bg-success px-2 py-1 rounded">Complete</span>
										@else
											<span class="texwhtext-white bg-success px-2 py-1 rounded">Inactive</span>
										@endif
									</td>

									<td>
										<div class="btn-group">
											<button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
											<div class="dropdown-menu" style="">
												<a href="{{ route('super-admin.exams.edit', $exam->id) }}" class="dropdown-item">Edit</a>
												<a href="{{ route('super-admin.exams.show', $exam->id) }}" class="dropdown-item">View</a>

												<form action="{{ route('super-admin.exams.destroy', $exam->id) }}" method="POST">
													@csrf
													@method('DELETE')
													<button type="button" class="dropdown-item delete-button">Delete</button>
												</form>
											</div>
										</div>
									</td>

								</tr>
							@endforeach
						</tbody>

					</table>

				</div>

			</div>
		</div>
	</div>
	<!-- end row -->

@endsection
