@extends('layouts.backend.app')

@section('title', 'New Question Cerate')

@push('css')
	<style>
		#questions:last-child {
			margin: 0 !important;
		}

		.form-check-input {
			display: none;
		}

		.form-check-input:checked~.options {
			border: 1px solid #34c38f !important;
		}
	</style>
@endpush

@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">New Question Create !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">New Question Create</li>
					</ol>
				</div>

			</div>
		</div>
	</div>
	<!-- end page title -->

	<div class="row">
		<div class="col-12">

			<form id="examForm" action="{{ route('user.exams.store') }}" method="POST">
				@csrf
				<input type="hidden" name="exam_id" value="{{ $exam->id }}">

				<div class="card">

					<div class="card-header text-center">
						<h4>E-Learning & Earning Ltd.</h4>
						<h5>Department of {{ $exam->department->department_name }}</h5>
						<h5>{{ $exam->exam_name }}</h5>
						<h5>Course Title: {{ $exam->subject->subject_name }}</h5>

						<div class="d-flex align-items-center justify-content-between">
							<h5>Total Time: <span class="fw-normal" id="timer"></span></h5>
							<h5>Total Marks: <span class="fw-normal">{{ $exam->exam_mark }}</span></h5>
						</div>
					</div>

					<div class="card-body">

						@foreach ($exam->questions as $key => $question)
							<input type="hidden" name="question_id[]" value="{{ $question->id }}">

							<div class="question mb-3">
								<div class="row">
									<div class="col-12">
										<h5>{{ getStrPad($key + 1) }}. {{ $question->question->question_name }}</h5>
									</div>

									@foreach ($question->question->options as $key => $option)
										<div class="col-md-6 col-xl-3">
											<div class="form-check p-0">
												<input id="option_{{ $option->id }}" class="form-check-input font-size-14" type="radio" name="answer[{{ $question->id }}]" value="{{ $option->id }}">
												<label for="option_{{ $option->id }}" class="form-check-label font-size-14 fw-normal border rounded p-3 my-2 options w-100"> {{ chr(65 + $key) }}. {{ $option->option }} </label>
											</div>
										</div>
									@endforeach

								</div>
							</div>
						@endforeach

					</div>

					<div class="card-footer">
						<div class="row">
							<div class="col-md-8">
								<p><strong>Note: </strong> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia voluptate facere quas est veniam laboriosam in voluptas, saepe magnam animi alias nostrum dignissimos suscipit accusantium consequatur ratione sint iste eveniet?</p>
							</div>
							<div class="col-md-4 text-end">
								<button type="submit" class="btn btn-primary waves-effect waves-light w-md" id="submit"> <i class="fas fa-save me-2"></i>Submit Answer </button>
							</div>
						</div>
					</div>

				</div>

			</form>

		</div>
		<!-- end col -->
	</div>
	<!-- end row -->
@endsection


@push('js')
	<script>
		function updateTimer() {
			var currentTime = new Date();
			var examEndTime = new Date('{{ $exam->exam_end }}'); // Assuming $exam->exam_end is correctly formatted

			var difference = examEndTime.getTime() - currentTime.getTime();

			if (difference <= 0) {
				document.getElementById("timer").textContent = "Exam Ended";
				return;
			}

			var days = Math.floor(difference / (1000 * 60 * 60 * 24));
			var hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((difference % (1000 * 60)) / 1000);

			// Ensure minutes and seconds are two digits
			var formattedDays = (days < 10 ? '0' : '') + days;
			var formattedHours = (hours < 10 ? '0' : '') + hours;
			var formattedMinutes = (minutes < 10 ? '0' : '') + minutes;
			var formattedSeconds = (seconds < 10 ? '0' : '') + seconds;

			var timerString = "";
			if (days > 0) {
				timerString += formattedDays + " Days ";
			}
			if (hours > 0 || days > 0) {
				timerString += formattedHours + " Hours ";
			}
			if (hours > 0 || days > 0 || minutes > 0) {
				timerString += formattedMinutes + " Minutes ";
			}
			timerString += formattedSeconds + " Seconds";

			document.getElementById("timer").textContent = timerString;

			setTimeout(updateTimer, 1000);
		}

		updateTimer();
	</script>
@endpush

@push('js')
	<script>
		$(document).ready(function() {
			var currentTime = new Date();
			var remaining_time_in_seconds = new Date('{{ $exam->exam_end }}');

			function updateTimer() {
				var currentTime = new Date();
				var examEndTime = new Date('{{ $exam->exam_end }}');

				var difference = examEndTime.getTime() - currentTime.getTime();

				if (difference <= 0) {
					document.getElementById("timer").textContent = "Exam Ended";
					$('#examForm').submit(); // Submit the form when time is up
					return;
				}

				var days = Math.floor(difference / (1000 * 60 * 60 * 24));
				var hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((difference % (1000 * 60)) / 1000);

				// Ensure minutes and seconds are two digits
				var formattedDays = (days < 10 ? '0' : '') + days;
				var formattedHours = (hours < 10 ? '0' : '') + hours;
				var formattedMinutes = (minutes < 10 ? '0' : '') + minutes;
				var formattedSeconds = (seconds < 10 ? '0' : '') + seconds;

				var timerString = "";
				if (days > 0) {
					timerString += formattedDays + " Days ";
				}
				if (hours > 0 || days > 0) {
					timerString += formattedHours + " Hours ";
				}
				if (hours > 0 || days > 0 || minutes > 0) {
					timerString += formattedMinutes + " Minutes ";
				}
				timerString += formattedSeconds + " Seconds";

				document.getElementById("timer").textContent = timerString;

				setTimeout(updateTimer, 1000);
			}

			updateTimer();

			$('#examForm').on('submit', function(event) {
				event.preventDefault();
				var formData = $(this).serialize();
				var url = $(this).attr('action');
				$.ajax({
					type: "POST",
					url: url,
					data: formData,
					success: function(response) {
						console.log(response);
						// window.location.href = response.url;
					}
				});
			});
		});
	</script>
@endpush



{{-- @push('js')
	<script>
		$(document).ready(function() {

			function updateTimer() {
				var currentTime = new Date();
				var examEndTime = new Date('{{ $exam->exam_end }}');

				var difference = examEndTime.getTime() - currentTime.getTime();

				if (difference <= 0) {
					document.getElementById("timer").textContent = "Exam Ended";
					return;
				}

				var days = Math.floor(difference / (1000 * 60 * 60 * 24));
				var hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((difference % (1000 * 60)) / 1000);

				// Ensure minutes and seconds are two digits
				var formattedDays = (days < 10 ? '0' : '') + days;
				var formattedHours = (hours < 10 ? '0' : '') + hours;
				var formattedMinutes = (minutes < 10 ? '0' : '') + minutes;
				var formattedSeconds = (seconds < 10 ? '0' : '') + seconds;

				var timerString = "";
				if (days > 0) {
					timerString += formattedDays + " Days ";
				}
				if (hours > 0 || days > 0) {
					timerString += formattedHours + " Hours ";
				}
				if (hours > 0 || days > 0 || minutes > 0) {
					timerString += formattedMinutes + " Minutes ";
				}
				timerString += formattedSeconds + " Seconds";

				document.getElementById("timer").textContent = timerString;

				setTimeout(updateTimer, 1000);
			}

			updateTimer();

			if (totalSeconds <= 0) {
				clearInterval(timer);
				// Submit the quiz form when time is up
				$('#examForm').submit();
			}
		}, 1000);

		$('#examForm').on('submit', function(event) {
			event.preventDefault();
			var formData = $(this).serialize();
			var url = $(this).attr('action');
			$.ajax({
				type: "POST",
				url: url,
				data: formData,
				success: function(response) {
					console.log(response);
					// window.location.href = response.url;
				}
			});
		});
	</script>
@endpush --}}
