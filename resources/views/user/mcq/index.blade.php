@extends('layouts.backend.app')

@section('title', 'Question View')

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
				<h4 class="mb-sm-0 font-size-18">Question View !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">Question View</li>
					</ol>
				</div>

			</div>
		</div>
	</div>
	<!-- end page title -->

	<div class="row">
		<div class="col-12">
			<form id="quizForm" action="{{ route('user.practice.store') }}" method="POST">
				@csrf

				<div class="card">
					<div class="card-header">
						<div class="row mb-3">
							<div class="col-12 text-center">
								<div class="logo">
									<img src="{{ asset('backend') }}/assets/images/logo-sm.svg" alt="" height="34">
									<span class="logo-txt">QuizApp</span>
								</div>
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-between">
							<h5 class="m-0">Total Mark: {{ $questions->count() * 1 }}</h5>
							<h5 class="m-0">Exam Time: <span id="timer">{{ getStrPad($questions->count() * 1) }}:00</span></h5>
						</div>
					</div>

					<div class="card-body">
						@foreach ($questions as $key => $question)
							<div class="col-12 mb-3" id="questions">
								<h4 class="font-size-17 mb-1">{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}. {{ $question->question_name }}</h4>
								<input type="hidden" name="question_id[]" value="{{ $question->id }}">

								@php
									$questionOptions = App\Models\QuestionOption::where('question_id', $question->id)->get();
								@endphp
								<div class="row">
									@foreach ($questionOptions as $optionKey => $option)
										<div class="col-md-6 col-xl-3">
											<div class="form-check p-0">
												<input id="option_{{ $option->id }}" class="form-check-input font-size-14" type="radio" name="answer[{{ $question->id }}]" value="{{ $option->id }}">
												<label for="option_{{ $option->id }}" class="form-check-label font-size-14 fw-normal border rounded p-3 my-2 options w-100"> {{ chr(65 + $optionKey) }}. {{ $option->option }} </label>
											</div>
										</div>
									@endforeach
								</div>
							</div>
						@endforeach
					</div>

					<div class="card-footer">
						<div class="row align-items-center">
							<div class="col-md-8">
								<p>
								<h5 class="d-inline-block me-2">Note:</h5>
								Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod assumenda, aut in voluptas blanditiis nulla obcaecati ullam itaque iusto quis ipsa tempora excepturi, harum ut magni sequi! Iusto, sed esse?
								</p>
							</div>
							<div class="col-md-4 text-end">
								<button type="submit" class="btn btn-primary waves-effect waves-light w-md" id="submit">
									<i class="fas fa-save me-2"></i>Submit Answer
								</button>
							</div>
						</div>
					</div>
				</div>

				<!-- Hidden fields to store total time and total questions -->
				<input type="hidden" name="total_time" value="{{ $questions->count() * 1 }}">
				<input type="hidden" id="use_time" name="use_time">
				<input type="hidden" name="total_questions" value="{{ $questions->count() }}">

			</form>
		</div>
	</div>
@endsection


@push('js')
	<script>
		$(document).ready(function() {

			// Timer logic
			var totalMinutes = {{ $questions->count() * 1 }};
			var totalSeconds = totalMinutes * 60;
			var startTime = totalSeconds;

			var timer = setInterval(function() {
				totalSeconds--;
				var minutes = Math.floor(totalSeconds / 60);
				var seconds = totalSeconds % 60;
				$('#timer').text((minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds);

				var elapsedMinutes = Math.floor((startTime - totalSeconds) / 60);
				var elapsedSeconds = (startTime - totalSeconds) % 60;
				$('#use_time').val((elapsedMinutes < 10 ? '0' : '') + elapsedMinutes + ':' + (elapsedSeconds < 10 ? '0' : '') + elapsedSeconds);

				if (totalSeconds <= 0) {
					clearInterval(timer);
					// Submit the quiz form when time is up
					$('#quizForm').submit();
				}
			}, 1000);

			$('#quizForm').on('submit', function(event) {
				event.preventDefault();
				var formData = $(this).serialize();
				var url = $(this).attr('action');
				$.ajax({
					type: "POST",
					url: url,
					data: formData,
					success: function(response) {
						window.location.href = response.url;
						window.reload();
					}
				});
			});
		});
	</script>
@endpush

@push('js')
	<script>
		$(document).ready(function() {
			// Reset form fields on page load
			$('#quizForm')[0].reset();

			// Apply styles to options next to checked checkboxes
			$('input.form-check-input:checked').next('.options').css('border', 'none !important');

			// Handle form reset on page refresh
			$(window).on('beforeunload', function() {
				$('#quizForm')[0].reset();
			});
		});
	</script>
@endpush
