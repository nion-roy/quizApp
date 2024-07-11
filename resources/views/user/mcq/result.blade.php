@extends('layouts.backend.app')


@section('title', 'Question View')


@php
	// Count of MCQ tests taken by the user
	$mcqCount = App\Models\MCQTest::where('user_id', Auth::id())->count();
	$mcqTimes = App\Models\MCQTest::where('user_id', Auth::id())->first();

	// Fetch questions with their options and user's answers
$mcqTests = App\Models\MCQTest::where('user_id', Auth::id())
    ->with(['question', 'answer'])
	    ->get();

	// Initialize counters for correct, wrong, and unanswered answers
	$correctAnswersCount = 0;
	$wrongAnswersCount = 0;
	$unansweredCount = 0;

	foreach ($mcqTests as $test) {
	    if ($test->answer === null) {
	        $unansweredCount++;
	    } elseif ($test->question->correct_answer == $test->answer->option) {
	        $correctAnswersCount++;
	    } else {
	        $wrongAnswersCount++;
	    }
	}
@endphp



@section('main_content')


	<div class="container">
		<div class="card">
			<div class="card-body">
				<div id="pointModal" class="p-4 js-container">
					<div class="row">

						<div class="col-12">
							<div class="icon">
								<i class="fas fa-check"></i>
							</div>
							<h2>Finished to Quiz!</h2>
						</div>

						<hr class="mt-4 mb-4">

						<div class="col-5 rounded">
							<div class="bg-white p-3 rounded">
								<div class="d-flex align-items-center justify-content-between mb-1 gap-2 font-size-16">
									<h5 class="text-info">Total Questions:</h5>
									<span> {{ getStrPad($mcqCount) }} </span>
								</div>

								<div class="d-flex align-items-center justify-content-between mb-1 gap-2 font-size-16">
									<h5 class="text-success">Correct Answers:</h5>
									<span> {{ getStrPad($correctAnswersCount) }} </span>
								</div>

								<div class="d-flex align-items-center justify-content-between mb-1 gap-2 font-size-16">
									<h5 class="text-danger">Wrong Answers:</h5>
									<span> {{ getStrPad($wrongAnswersCount + $unansweredCount) }} </span>
								</div>
							</div>
						</div>

						<div class="offset-2 col-5 rounded">
							<div class="bg-white p-3 rounded">
								<div class="d-flex align-items-center justify-content-between mb-1 gap-2 font-size-16">
									<h5 class="text-info">Total Times:</h5>
									<span> {{ getStrPad($mcqTimes->total_time ?? null) }}.00 </span>
								</div>

								<div class="d-flex align-items-center justify-content-between mb-1 gap-2 font-size-16">
									<h5 class="text-success">Uses Times:</h5>
									<span> {{ $mcqTimes->use_time ?? null }} </span>
								</div>

								<div class="d-flex align-items-center justify-content-between mb-1 gap-2 font-size-16">
									<h5 class="text-danger">Total Marks:</h5>
									<span> {{ getStrPad($correctAnswersCount * 2) }} </span>
								</div>
							</div>
						</div>

						<div class="col-12 mt-2">
							<button class="btn btn-danger mt-3" id="success_complete">Close Now</button>
							<a href="{{ route('super-admin.mcq-practice.download') }}" class="btn btn-success mt-3">Download</a>
						</div>

					</div>

				</div>
			</div>
		</div>

		{{-- @dd($questions) --}}

		{{-- <div class="row">
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
		</div> --}}

	</div>

@endsection

@push('js')
	<script>
		$(document).ready(function() {
			$('#success_complete').on('click', function() {
				var userID = {{ Auth::id() }};
				var url = "/super-admin/mcq-practice/" + userID;
				$.ajax({
					type: "DELETE",
					url: url,
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					success: function(response) {
						$('#staticBackdrop').modal('hide');
					},
				});
			});
		});
	</script>
@endpush

@push('css')
	<style>
		hr {
			border-color: #006842;
		}

		#pointModal {
			text-align: center;
		}

		#pointModal h5 {
			margin: 0;
		}

		#pointModal .icon i {
			font-size: 36px;
			background: #34c38f;
			color: #fff;
			border-radius: 50px;
			padding: 12px;
			margin-bottom: 12px;
		}
	</style>
@endpush
