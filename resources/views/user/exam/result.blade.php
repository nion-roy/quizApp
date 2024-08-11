@extends('layouts.backend.app')

@section('title', 'New Question Cerate')

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
				<h4 class="mb-sm-0 font-size-18">Exam Result !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">Exam Result</li>
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

					<br>

					<div class="d-flex align-items-center justify-content-between">
						<h5 class="m-0">Correct Answer: <span id="correct-count"></span></h5>
						<h5 class="m-0">Wrong Answer: <span id="wrong-count"></span></h5>
						<h5 class="m-0">Not Selected Answer: <span id="not-selected-count"></span></h5>
					</div>

				</div>


				<div class="card-body">
					@php
						$results = App\Models\ExamResult::where('exam_id', $exam->id)
						    ->where('user_id', auth()->id())
						    ->get();
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
			</div>

		</div>
		<!-- end col -->
	</div>
	<!-- end row -->
@endsection


@push('js')
	<script>
		document.getElementById('correct-count').innerText = '{{ getStrPad($correctCount) }}';
		document.getElementById('wrong-count').innerText = '{{ getStrPad($wrongCount) }}';
		document.getElementById('not-selected-count').innerText = '{{ getStrPad($notSelectedCount) }}';
	</script>
@endpush
