@extends('layouts.backend.app')

@section('title', 'Question View')

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


@section('main_content')

	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">MCQ Practice Result !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">MCQ Practice Result</li>
					</ol>
				</div>

			</div>
		</div>
	</div>
	<!-- end page title -->


	@php
		// Count of MCQ tests taken by the user
		$mcqTest = App\Models\MCQTest::where('user_id', Auth::id())->latest()->first();

		// Fetch questions with their options and user's answers
$mcqTestResults = App\Models\MCQTestResult::where('mcq_test_id', $mcqTest->id)->get();

// Initialize counters for correct, wrong, and unanswered answers
$mcqTestResultCount = $mcqTestResults->count();
$correctCount = 0;
$wrongCount = 0;
$notSelectedCount = 0;

foreach ($mcqTestResults as $key => $result) {
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
		}
	@endphp



	<div class="row">
		<div class="col-8 mx-auto">
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
										<span> {{ getStrPad($mcqTestResultCount) }} </span>
									</div>

									<div class="d-flex align-items-center justify-content-between mb-1 gap-2 font-size-16">
										<h5 class="text-success">Correct Answers:</h5>
										<span> {{ getStrPad($correctCount) }} </span>
									</div>

									<div class="d-flex align-items-center justify-content-between mb-1 gap-2 font-size-16">
										<h5 class="text-danger">Wrong Answers:</h5>
										<span> {{ getStrPad($wrongCount + $notSelectedCount) }} </span>
									</div>
								</div>
							</div>

							<div class="offset-2 col-5 rounded">
								<div class="bg-white p-3 rounded">
									<div class="d-flex align-items-center justify-content-between mb-1 gap-2 font-size-16">
										<h5 class="text-info">Total Times:</h5>
										<span> {{ $mcqTest->total_time }}.00 Minutes </span>
									</div>

									<div class="d-flex align-items-center justify-content-between mb-1 gap-2 font-size-16">
										<h5 class="text-success">Uses Times:</h5>
										<span> {{ $mcqTest->use_time }} Minutes </span>
									</div>

									<div class="d-flex align-items-center justify-content-between mb-1 gap-2 font-size-16">
										<h5 class="text-danger">Total Marks:</h5>
										<span> {{ getStrPad(getPercentage($correctCount, $mcqTestResultCount)) }}% </span>
									</div>
								</div>
							</div>

							<div class="col-12 mt-2">
								<a href="{{ route('user.practice.result') }}" class="btn btn-danger mt-3">Close Now</a>
								<a href="{{ route('user.practice.index') }}" class="btn btn-success mt-3">Start New</a>
							</div>

						</div>

					</div>

				</div>

			</div>
		</div>
	</div>
	<!-- end row -->
@endsection
