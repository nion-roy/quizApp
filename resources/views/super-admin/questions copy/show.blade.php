@extends('layouts.backend.app')

@section('title', 'Question View')

@push('css')
	<style>
		#questionOptions:last-child {
			margin-bottom: 0 !important;
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

				<div class="card-header">
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
				</div>

				<div class="card-body">

					<div class="row">
						@foreach ($questionOptions as $key => $questionOption)
							<div class="col-md-12 mb-4" id="questionOptions">
								<h4 class="font-size-17 mb-2"> {{ getStrPad($key + 1) }}. {{ $questionOption->question_name }}</h4>
								<div class="row">
									<div class="col-md-3 mb-2">
										<span class="font-size-14">A. {{ $questionOption->option_1 }}</span>
									</div>
									<div class="col-md-3 mb-2">
										<span class="font-size-14">B. {{ $questionOption->option_2 }}</span>
									</div>
									<div class="col-md-3 mb-2">
										<span class="font-size-14">C. {{ $questionOption->option_3 }}</span>
									</div>
									<div class="col-md-3 mb-2">
										<span class="font-size-14">D. {{ $questionOption->option_4 }}</span>
									</div>
									<div class="col-12">
										@if ($questionOption->correct_answer == 1)
											<span class="font-size-14 text-success"><strong class="text-dark">Correct Answer:</strong> {{ $questionOption->option_1 }}</span>
										@elseif ($questionOption->correct_answer == 2)
											<span class="font-size-14 text-success"><strong class="text-dark">Correct Answer:</strong> {{ $questionOption->option_2 }}</span>
										@elseif ($questionOption->correct_answer == 3)
											<span class="font-size-14 text-success"><strong class="text-dark">Correct Answer:</strong> {{ $questionOption->option_3 }}</span>
										@elseif ($questionOption->correct_answer == 4)
											<span class="font-size-14 text-success"><strong class="text-dark">Correct Answer:</strong> {{ $questionOption->option_4 }}</span>
										@endif
									</div>
								</div>
							</div>
						@endforeach
					</div>

				</div>

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
