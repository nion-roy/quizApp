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

			<div class="card">

				<div class="card-header text-center">
					<h4>E-Learning & Earning Ltd.</h4>
					<h5>Department of {{ $exam->department->department_name }}</h5>
					<h5>{{ $exam->exam_name }}</h5>
					<h5>Course Title: {{ $exam->subject->subject_name }}</h5>

					<div class="d-flex align-items-center justify-content-between">
						<span><strong>Total Time: </strong><span id="timer">{{ $exam->exam_start }}</span></span>
						<span><strong>Total Marks: </strong>{{ $exam->exam_mark }}</span>
					</div>

				</div>

				<div class="card-body">

					@foreach ($examQuestions as $key => $question)
						<div class="question mb-3">
							<div class="row">
								<div class="col-12">
									<h5>{{ getStrPad($key + 1) }}. {{ $question->question->question_name }}</h5>
								</div>

								@php
									$options = App\Models\QuestionOption::where('question_id', $question->question_id)->get();
								@endphp

								@foreach ($options as $key => $option)
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
							<button class="btn btn-success">Answer Submit</button>
						</div>
					</div>
				</div>


			</div>

		</div>
		<!-- end col -->
	</div>
	<!-- end row -->
@endsection


@push('js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.2.0/jquery.countdown.min.js"></script>
	<script>
		$(document).ready(function() {
			// Timer logic
			var totalMinutes = {{ $exam->exam_time }};
			var totalSeconds = totalMinutes * 60;
			var cookieName = 'exam_timer';
			var startTime = $.cookie(cookieName) ? parseInt($.cookie(cookieName)) : totalSeconds;

			function updateTimerDisplay(totalSeconds) {
				var minutes = Math.floor(totalSeconds / 60);
				var seconds = totalSeconds % 60;
				$('#timer').text((minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds);

				var elapsedMinutes = Math.floor((startTime - totalSeconds) / 60);
				var elapsedSeconds = (startTime - totalSeconds) % 60;
				$('#use_time').val((elapsedMinutes < 10 ? '0' : '') + elapsedMinutes + ':' + (elapsedSeconds < 10 ? '0' : '') + elapsedSeconds);
			}

			updateTimerDisplay(startTime);

			var timer = setInterval(function() {
				startTime--;
				$.cookie(cookieName, startTime);
				updateTimerDisplay(startTime);

				if (startTime <= 0) {
					clearInterval(timer);
					// Submit the quiz form when time is up
					$('#quizForm').submit();
				}
			}, 1000);

			$('#quizForm').on('submit', function(event) {
				event.preventDefault();
				clearInterval(timer);
				$.removeCookie(cookieName);
				var formData = $(this).serialize();
				var url = $(this).attr('action');
				$.ajax({
					type: "POST",
					url: url,
					data: formData,
					success: function(response) {
						window.location.href = response.url;
					}
				});
			});
		});
	</script>
@endpush
