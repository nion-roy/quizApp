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

						@if ($now->lte($examEndTime) && $examEndTime->gt(0))
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
										@if ($now < $examStartTime)
											<button type="button" class="countdown btn btn-primary font-size-14" data-exam-start="{{ $examStartTime->toIso8601String() }}" data-exam-end="{{ $examEndTime->toIso8601String() }}"></button>
										@elseif ($now >= $examStartTime && $now <= $examEndTime)
											@if (getExamExist($exam->id))
												<button type="button" class="btn btn-success font-size-14">Already Attendant</button>
											@else
												<a href="{{ route('user.exams.create', $exam->slug) }}" class="countdown btn btn-success font-size-14" data-exam-start="{{ $examStartTime->toIso8601String() }}" data-exam-end="{{ $examEndTime->toIso8601String() }}">Exam has started</a>
											@endif
										@else
											<button type="button" class="countdown btn btn-danger font-size-14">Exam has expired</button>
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

@push('js')
	<script src="https://cdn.jsdelivr.net/npm/jquery-countdown@2.2.0/dist/jquery.countdown.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.countdown').each(function() {
				var $countdown = $(this);
				var examStart = new Date($countdown.data('exam-start'));
				var examEnd = new Date($countdown.data('exam-end'));

				function updateCountdown() {
					var now = new Date();
					if (now < examStart) {
						$countdown.countdown(examStart, function(event) {
							$(this).html(event.strftime('%D Days %H Hours %M Minutes %S Seconds'));
						});
					} else if (now >= examStart && now <= examEnd) {
						$countdown.html('Exam has started'); // Modify this message as needed
					} else {
						$countdown.html('Exam has expried'); // Modify this message as needed
					}
				}

				// Update countdown initially
				updateCountdown();

				// Update countdown every second to keep it accurate
				setInterval(updateCountdown, 1000);
			});
		});
	</script>
@endpush
