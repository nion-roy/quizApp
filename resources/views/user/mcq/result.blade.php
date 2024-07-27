@extends('layouts.backend.app')

@section('title', 'MCQ Practice Result')

@push('css')
	<style>
		#questions:last-child {
			margin: 0 !important;
		}

		.correct_answer {
			background: rgba(25, 135, 84, .05) !important;
			border-color: rgba(25, 135, 84, .4) !important;
		}

		.wrong_answer {
			background: rgba(255, 0, 0, .05) !important;
			border-color: rgba(255, 0, 0, .4) !important;
		}
	</style>
@endpush

@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">MCQ Practice Result !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('user.practice.index') }}">All Results</a></li>
						<li class="breadcrumb-item active">MCQ Practice Result</li>
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
					<div class="row mb-3">
						<div class="col-12 text-center">
							<div class="logo">
								<img src="{{ asset('backend') }}/assets/images/logo-sm.svg" alt="" height="34">
								<span class="logo-txt">QuizApp</span>
							</div>
						</div>
					</div>
					<div class="d-flex align-items-center justify-content-between">
						<h5 class="m-0">Total Mark: </h5>
						<h5 class="m-0">Exam Time: <span id="timer">{{ number_format($mcqTest->total_time, 2) }}</span></h5>
					</div>

					<div class="d-flex align-items-center justify-content-between">
						<h5 class="m-0">Total Correct Answer: <span id="correct-count"></span></h5>
						<h5 class="m-0">Total Wrong Answer: <span id="wrong-count"></span></h5>
						<h5 class="m-0">Total Not Selected Answer: <span id="not-selected-count"></span></h5>
					</div>
				</div>

				<div class="card-body">
					@php
						$correctCount = 0;
						$wrongCount = 0;
						$notSelectedCount = 0;
					@endphp

					@foreach ($results as $resultKey => $result)
						@php
							$resultOptions = App\Models\QuestionOption::where('question_id', $result->question->id)->get();
							$correctAnswer = $result->question->correct_answer;
							$selectedOption = $result->option->option ?? null;

							if ($selectedOption === null) {
							    $notSelectedCount++;
							} elseif ($selectedOption === $correctAnswer) {
							    $correctCount++;
							} else {
							    $wrongCount++;
							}
						@endphp
						<div class="col-12 mb-4" id="questions">
							<h4 class="font-size-17 mb-1">
								{{ str_pad($resultKey + 1, 2, '0', STR_PAD_LEFT) }}. {{ $result->question->question_name }}
								@if ($selectedOption === null)
									<p class="text-warning m-0 font-size-14 fw-bold d-inline-block">(Option not selected)</p>
								@endif
							</h4>

							<div class="row">
								@foreach ($resultOptions as $optionKey => $option)
									<div class="col-md-6 col-lg-6 col-xxl-3">
										<div class="font-size-14 fw-normal border rounded p-3 my-2 options w-100 
                            {{ $option->option === $correctAnswer ? 'correct_answer' : '' }} 
                            @if ($selectedOption === $option->option) {{ $option->option === $correctAnswer ? 'correct_answer' : 'wrong_answer' }} @endif">
											{{ chr(65 + $optionKey) }}. {{ $option->option }}
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
							<a href="{{ route('user.practice.result') }}" class="btn btn-primary waves-effect waves-light w-md" id="submit"> <i class="fas fa-arrow-left me-2"></i>Back Now </a>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
@endsection


@push('js')
	<script>
		document.getElementById('correct-count').innerText = '{{ getStrPad($correctCount) }}';
		document.getElementById('wrong-count').innerText = '{{ getStrPad($wrongCount) }}';
		document.getElementById('not-selected-count').innerText = '{{ getStrPad($notSelectedCount) }}';
	</script>
@endpush
