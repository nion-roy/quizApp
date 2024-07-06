@extends('layouts.backend.app')

@section('title', 'New Question Cerate')


@push('css')
	<style>
		.question {
			overflow-x: hidden;
		}

		.question_input {
			display: none;
		}

		.question_input:checked~.question_label {
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

			<form action="{{ route('super-admin.questions.store') }}" method="POST" enctype="multipart/form-data">
				@csrf

				@include('alert-message.alert-message')


				<div class="row">
					<div class="col-md-7">
						<div class="card">
							<div class="card-body">
								<div class="row">

									<div class="col-md-6">
										<div class="form-group mb-3">
											<label class="form-label" for="department_id">Department <span class="text-danger">*</span></label>
											<select name="department_id" class="form-control form-select @error('department_id') is-invalid @enderror" id="department_id">
												<option disabled selected>-- Select Department --</option>
												@foreach ($departments as $department)
													<option value="{{ $department->id }}" @if (old('department_id') == $department->id) selected @endif>{{ $department->department_name }}</option>
												@endforeach
											</select>
											@error('department_id')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group mb-3">
											<label class="form-label" for="subject_id">Subject <span class="text-danger">*</span></label>
											<select name="subject_id" class="form-control form-select @error('subject_id') is-invalid @enderror" id="subject_id">
												<option disabled selected>-- Select Subject --</option>
												@foreach ($subjects as $subject)
													<option value="{{ $subject->id }}" @if (old('subject_id') == $subject->id) selected @endif>{{ $subject->subject_name }}</option>
												@endforeach
											</select>
											@error('subject_id')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<div class="col-12">
										<div class="form-group mb-3">
											<label class="form-label exam_name" for="exam_name">Exam Name <span class="text-danger">*</span></label>
											<input type="text" name="exam_name" class="form-control @error('exam_name') is-invalid @enderror" id="exam_name" placeholder="Enter exam name" value="{{ old('exam_name') }}">
											@error('exam_name')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group mb-3">
											<label class="form-label start_exam" for="start_exam">Start Date Exam <span class="text-danger">*</span></label>
											<input type="text" name="start_exam" class="form-control @error('start_exam') is-invalid @enderror" id="start_exam" placeholder="Enter start exam" value="{{ old('start_exam') }}">
											@error('start_exam')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group mb-3">
											<label class="form-label end_exam" for="end_exam">Start Time Exam <span class="text-danger">*</span></label>
											<input type="text" name="end_exam" class="form-control @error('end_exam') is-invalid @enderror" id="end_exam" placeholder="Enter end exam" value="{{ old('end_exam') }}">
											@error('end_exam')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group mb-3">
											<label class="form-label exam_mark" for="exam_mark">Total Marks <span class="text-danger">*</span></label>
											<input type="text" name="exam_mark" class="form-control @error('exam_mark') is-invalid @enderror" id="exam_mark" placeholder="Enter start exam" value="{{ old('exam_mark') }}">
											@error('exam_mark')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group mb-3">
											<label class="form-label exam_time" for="exam_time">Total Times <span class="text-danger">*</span></label>
											<input type="text" name="exam_time" class="form-control @error('exam_time') is-invalid @enderror" id="exam_time" placeholder="Enter end exam" value="{{ old('exam_time') }}">
											@error('exam_time')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group mb-3">
											<label class="form-label" for="question_type">Question Select Type<span class="text-danger">*</span></label>
											<select name="question_type" id="question_type" class="form-control form-select question_type @error('question_type') is-invalid @enderror">
												<option disabled selected>-- Select Question Type --</option>
												<option value="1" {{ old('question_type') == '1' ? 'selected' : '' }}>Random</option>
												<option value="0" {{ old('question_type') == '0' ? 'selected' : '' }}>Selected</option>
											</select>
											@error('question_type')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group mb-3">
											<label class="form-label" for="status">Status<span class="text-danger">*</span></label>
											<select name="status" class="form-control form-select @error('status') is-invalid @enderror">
												<option disabled selected>-- Select Status --</option>
												<option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
												<option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
											</select>
											@error('status')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="col-md-5" id="question_wrap" style="display: none">
						<div class="card">
							<div class="card-body">
								<div class="font-size-16 mb-3" id="question_count">Total Question Selections: <span id="selectionQuestion">0</span></div>
								<div class="question"></div>
							</div>
						</div>
					</div>

					@push('js')
						<script>
							$(document).ready(function() {
								// Handler for subject selection change
								$('#subject_id').on('change', function() {
									var id = $(this).val();
									var url = "/super-admin/exam-question-search/" + id;

									// Clear previous content and reset total count
									$('.question').empty();
									$('#selectionQuestion').text('0');

									// Ajax request to fetch questions
									$.ajax({
										type: "GET",
										url: url,
										success: function(response) {

											if (response.length > 0) {
												$.each(response, function(index, value) {
													// Append each checkbox option
													var serialNumber = index + 1;
													$('.question').append(
														'<div class="form-check p-0">' +
														'<input class="form-check-input question_input" type="checkbox" value="' + value.id + '" id="question' + value.id + '">' +
														'<label class="form-check-label font-size-14 w-100 border rounded p-3 my-1 question_label" for="question' + value.id + '">' +
														serialNumber + '. ' + value.question_name +
														'</label>' +
														'</div>'
													);
												});

												// Update total count of checkboxes
												updateCheckboxCount();
												$("#question_wrap").css("display", "block");
												$(".question").css("height", "360px");
												$("#question_count").css("display", "block");
											} else {
												// If no questions found
												$('.question').empty().append('<span class="bg-danger text-white p-3 rounded w-100 d-block text-center m-0 font-size-14">Question Not Found!</span>');
												$("#question_wrap").css("display", "block");
												$("#question_count").css("display", "none");
												$(".question").css("height", "auto");
											}
										}
									});
								});

								// Function to update checked checkbox count
								function updateCheckboxCount() {
									var checkedCount = $('.question_input:checked').length;
									$('#selectionQuestion').text(checkedCount);
								}

								// Event listener for checkbox change
								$(document).on('change', '.question_input', function() {
									updateCheckboxCount();
								});
							});
						</script>
					@endpush


					<div class="col-12 text-center mb-3">
						<a href="{{ route('super-admin.questions.index') }}" class="btn btn-danger waves-effect waves-light w-md"><i class="fa fa-arrow-left me-2"></i>Back Now</a>
						<button type="submit" class="btn btn-primary waves-effect waves-light w-md"><i class="fas fa-save me-2"></i>Submit Now</button>
					</div>

				</div>

			</form>

		</div>
		<!-- end col -->
	</div>
	<!-- end row -->
@endsection

@push('js')
	<script>
		$(document).ready(function() {
			// Handling subject_id change event
			$('#subject_id').on('change', function() {
				var subject_id = $(this).val();

				if (subject_id) {
					$('.question_type').val('0'); // Select Random
				} else {
					$('.question_type').val('1'); // Select Selected
				}

				// Trigger change event on question_type after setting its value
				$('.question_type').trigger('change');
			});

			// Handling question_type change event
			$('.question_type').on('change', function() {
				var value = $(this).val();

				if (value == 0) {
					$("#question_wrap").css("display", "block");
				} else {
					$("#question_wrap").css("display", "none");
				}
			});

			// Trigger change event on subject_id initially to set question_type value
			// $('#subject_id').trigger('change');
		});
	</script>
@endpush

@push('js')
	<script>
		$(document).ready(function() {
			$('#department_id').on('change', function() {
				var id = $(this).val();
				var url = "/super-admin/department-wise-subjects/" + id;

				// Clear existing options in subject_id dropdown
				$('#subject_id').empty().append('<option disabled selected>-- Loading Subjects --</option>');

				$.ajax({
					type: "GET",
					url: url,
					success: function(response) {
						if (response.length > 0) {
							// Append options to subject_id dropdown
							$('#subject_id').empty().append('<option disabled selected>-- Select Subject --</option>');
							$.each(response, function(key, value) {
								$('#subject_id').append('<option value="' + value.id + '">' + value.subject_name + '</option>');
							});
						} else {
							$('#subject_id').empty().append('<option disabled selected>-- Subject Not Found --</option>');
						}
					},
				});

			}).trigger('change');

		});
	</script>
@endpush
