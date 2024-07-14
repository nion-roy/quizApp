@extends('layouts.backend.app')

@section('title', 'Subjects')


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
					<h4 class="card-title">All Exam Questions <span class="btn btn-success p-1"></span></h4>
				</div>

				<div class="card-body">

					@foreach ($exams as $key => $exam)
						<div class="card shadow-none">
							<div class="card-body border rounded">
								<div class="row align-items-center">
									<div class=" col-md-9 col-xxl-10">
										<h4>{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}. {{ $exam->exam_name }}</h4>
										<div class="countdown" id="countdown-{{ $key }}"></div>
										<input type="hidden" id="exam-date-{{ $key }}" value="{{ $exam->exam_date }} {{ $exam->exam_start }}">
									</div>
									<div class=" col-md-3 col-xxl-2 mt-3 mt-lg-0">
										@php
											$examDateTime = \Carbon\Carbon::parse($exam->exam_date . ' ' . $exam->exam_start);
											$now = \Carbon\Carbon::now();
										@endphp

										@if ($now->gte($examDateTime))
											<a href="#" class="btn btn-success w-100 py-3 font-size-16">Exam Now</a>
										@else
											<button class="btn btn-secondary w-100 py-3 font-size-16">Exam Now</button>
										@endif

									</div>
								</div>
							</div>
						</div>
					@endforeach


					@push('js')
						<script>
							$(document).ready(function() {
								function updateCountdown(elementId, examDate) {
									const countdownElement = document.getElementById(elementId);
									const examTime = new Date(examDate).getTime();

									const interval = setInterval(() => {
										const now = new Date().getTime();
										const distance = examTime - now;

										if (distance < 0) {
											clearInterval(interval);
											countdownElement.innerHTML = "Exam has started";
											return;
										}

										const days = Math.floor(distance / (1000 * 60 * 60 * 24));
										const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
										const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
										const seconds = Math.floor((distance % (1000 * 60)) / 1000);

										countdownElement.innerHTML = `${days} Days ${hours} Hours ${minutes} Minutes ${seconds} Seconds`;
									}, 1000);
								}

								@foreach ($exams as $key => $exam)
									updateCountdown('countdown-{{ $key }}', document.getElementById('exam-date-{{ $key }}').value);
								@endforeach
							});
						</script>
					@endpush


				</div>

			</div>
		</div>
		<!-- end col -->
	</div>
	<!-- end row -->

@endsection
