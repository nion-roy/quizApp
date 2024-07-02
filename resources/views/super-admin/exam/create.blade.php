@extends('layouts.backend.app')

@section('title', 'Question View')

@push('css')
	<style>
		#questions:last-child {
			margin: 0 !important;
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
			<div class="card">

				{{-- <div class="card-header">
					<div class="row mb-3">
						<div class="col-12 text-center">
							<div class="logo">
								<img src="{{ asset('backend') }}/assets/images/logo-sm.svg" alt="" height="34"> <span class="logo-txt">QuizApp</span>
							</div>
							<h4>{{ $question->exam_name }}</h4>
							<h5 class="m-0">Start Exam: {{ $question->exam_date }}</h5>
						</div>
					</div>
					<div class="d-flex align-items-center justify-content-between">
						<h5 class="m-0">Total Mark: 10</h5>
						<h5 class="m-0">Exam Duration: {{ $question->exam_duration }}</h5>
					</div>
				</div> --}}

				<div class="card-body">


					@foreach ($questions as $key => $question)
						<div class="col-12 mb-3" id="questions">
							<h4 class="font-size-17 mb-3">{{ getStrPad($key + 1) }}. {{ $question->question_name }}</h4>

							@php
								$questionOptions = App\Models\QuestionOption::where('question_id', $question->id)->get();
							@endphp

							<div class="row">
								@foreach ($questionOptions as $optionKey => $option)
									<div class="col-sm-6 col-md-3">
										<div class="form-check mb-3">
											<input class="form-check-input font-size-14" type="radio" name="formRadios{{ $key }}" value="{{ $option->option }}">
											<label class="form-check-label font-size-14 fw-normal">{{ $option->option }}</label>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					@endforeach


					<div class="card-footer">
						<div class="row align-items-center">
							<div class="col-md-8">
								<p>
								<h5 class="d-inline-block me-2">Note:</h5> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod assumenda, aut in voluptas blanditiis nulla obcaecati ullam itaque iusto quis ipsa tempora excepturi, harum ut magni sequi! Iusto, sed esse?</p>
							</div>
							<div class="col-md-4 text-end">
								<a href="{{ route('super-admin.questions.index') }}" class="btn btn-danger waves-effect waves-light w-md"><i class="fa fa-arrow-left me-2"></i>Back Now</a>
								{{-- <button type="submit" class="btn btn-primary waves-effect waves-light w-md"><i class="fas fa-save me-2"></i>Submit Now</button> --}}
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- end col -->
		</div>
		<!-- end row -->
	@endsection
