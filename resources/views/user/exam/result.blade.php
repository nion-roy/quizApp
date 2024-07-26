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
						<h5>Total Time: <span class="fw-normal" id="timer"></span></h5>
						<h5>Total Marks: <span class="fw-normal">{{ $exam->exam_mark }}</span></h5>
					</div>
				</div>

				<div class="card-body">

					@foreach ($exam->question as $key => $question)

						<div class="question mb-3">
							<div class="row">
								<div class="col-12">
									<h5>{{ getStrPad($key + 1) }}. {{ $question->question_name ?? null }}</h5>
								</div> 

                @foreach ($exam->examAnswer as $answer)
                    <span>{{ $answer->option_id }}</span>
                @endforeach

								@foreach ($question->options as $key => $option)
									<div class="col-md-6 col-xl-3">
										<div class="form-check p-0">
											<label class="form-check-label font-size-14 fw-normal border rounded p-3 my-2 options w-100"> {{ chr(65 + $key) }}. {{ $option->option }} </label>
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
							<a href="{{ route('user.exams.expired') }}" class="btn btn-danger waves-effect waves-light w-md"> <i class="fas fa-arrow-left me-2"></i>Back Now </a>
						</div>
					</div>
				</div>

			</div>


		</div>
		<!-- end col -->
	</div>
	<!-- end row -->
@endsection
