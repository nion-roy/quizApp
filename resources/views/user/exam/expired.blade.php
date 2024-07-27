@extends('layouts.backend.app')

@section('title', 'Subjects')


@push('css')
	<style>
		.border.p-3.rounded.shadow.mb-3:last-child {
			margin-bottom: 0 !important;
		}
	</style>
@endpush

@section('main_content')





	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">Exam Schedules !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">Exam Schedules</li>
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
					<h4 class="card-title">All Exam Schedules </h4>
				</div>

				<div class="card-body">

					@php
						$date1 = \Carbon\Carbon::today()->toDateString();
						$date2 = \Carbon\Carbon::today()->toDateString();
					@endphp

					@php
						$counter = 1;
						$examFound = false;
					@endphp

					@foreach ($exams as $exam)
						@php
							$examStartTime = \Carbon\Carbon::parse($exam->exam_start);
							$examEndTime = \Carbon\Carbon::parse($exam->exam_end);
							$now = \Carbon\Carbon::now();
						@endphp

						@if ($now->gt($examEndTime) && $examEndTime->lte(0))
							@php $examFound = true; @endphp
							<div class="border p-3 rounded shadow mb-3">
								<div class="row align-items-center">
									<div class="col-md-9 col-xxl-9">
										<div class="d-flex align-items-center gap-2">
											<div class="bg-success text-white fw-bold p-3 rounded">{{ getStrPad($counter++) }}</div>
											<div>
												<h4 class="mb-1">{{ $exam->exam_name }}</h4>
												<span class="me-3"><strong>Department:</strong> {{ $exam->department->department_name }} </span>
												<span class="me-3"><strong>Subject:</strong> {{ $exam->subject->subject_name }} </span>
												<span class="me-3"><strong>Total Marks:</strong> {{ $exam->exam_mark }} </span>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-xxl-3 mt-3 mt-lg-0 text-end">

										@if (getExamExist($exam->id))
											<a href="{{ route('user.exams.result', $exam->id) }}" class="btn btn-success font-size-14"><i class="fas fa-poll me-2"></i>Result</a>
										@else
											<button type="button" class="btn btn-danger font-size-14">No Attendanted</button>
										@endif

									</div>
								</div>
							</div>
						@endif
					@endforeach

					@if (!$examFound)
						<div class="alert alert-warning m-0 text-center">No exams found within the specified timeframe.</div>
					@endif


				</div>
			</div>
		</div>
		<!-- end col -->
	</div>
	<!-- end row -->

@endsection
