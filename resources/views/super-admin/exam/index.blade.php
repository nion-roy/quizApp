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
						<h4 class="card-title">All Exam Questions <span class="btn btn-success">{{ getStrPad($exams->count()) }}</span></h4>
						<a class="btn btn-success waves-effect waves-light" href="{{ route('admin.exams.create') }}"><i class="fa fa-plus-circle me-2"></i> Add Exam Question</a>
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
								<th>Total Attend</th>
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
									<td>{{ $examEndDateTime->format('d F Y') }} - {{ $examEndDateTime->format('H:i A') }}</td>
									<td>{{ getStrPad(getExamAttendCount($exam->id)) }}</td>
									<td>
										@if ($exam->status == 1)
											<span class="text-white bg-success px-2 py-1 rounded">Active</span>
										@elseif ($exam->status == 2)
											<span class="text-white bg-success px-2 py-1 rounded">Complete</span>
										@else
											<span class="texwhtext-white bg-success px-2 py-1 rounded">Inactive</span>
										@endif
									</td>

									<td class="d-flex align-items-center gap-1">
										<a href="{{ route('admin.exams.edit', $exam->id) }}" class="btn btn-danger"><i class="fa fa-edit"></i></a>
										<a href="{{ route('admin.exams.show', $exam->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
										<a href="{{ route('admin.exams.result', $exam->id) }}" class="btn btn-success"><i class="fa fa-plug"></i></a>
										<form action="{{ route('admin.exams.destroy', $exam->id) }}" method="POST">
											@csrf
											@method('DELETE')
											<button type="button" class="btn btn-danger delete-button"><i class="fa fa-trash"></i></button>
										</form>
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
