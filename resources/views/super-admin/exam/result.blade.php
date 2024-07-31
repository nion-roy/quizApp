@extends('layouts.backend.app')

@section('title', 'New Question Cerate')

@push('css')
	<style>
		.correct_answer {
			border-color: #19875465 !important;
			color: #198754;
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

					<a href="{{ route('admin.exam-question.download', $exam->id) }}" class="btn btn-success my-2">Question Download</a>

					<div class="d-flex align-items-center justify-content-between">
						<span><strong>Total Time: </strong>{{ $exam->exam_time }} mins</span>
						<span><strong>Total Marks: </strong>{{ $exam->exam_mark }}</span>
					</div>

				</div>

				<div class="card-body">

					@php
						$examOptions = App\Models\ExamQuestion::where('exam_id', $exam->id)->get();
					@endphp

					@foreach ($examOptions as $key => $question)
						<div class="question mb-3">
							<div class="row">
								<div class="col-12">
									<h5>{{ getStrPad($key + 1) }}. {{ $question->question->question_name }}</h5>
								</div>

								@php
									$options = App\Models\QuestionOption::where('question_id', $question->question_id)->get();
								@endphp

								@foreach ($options as $key => $option)
									<div class="col-lg-3 col-md-6"><span class="d-block p-3 border rounded mb-1 m-lg-0 {{ $question->question->correct_answer == $option->option ? 'correct_answer' : '' }}">{{ chr(65 + $key) }}. {{ $option->option }}</span></div>
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
