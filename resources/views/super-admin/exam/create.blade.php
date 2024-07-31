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

			<form action="{{ route('admin.exams.store') }}" method="POST" enctype="multipart/form-data">
				@csrf

				@include('alert-message.alert-message')

				<div class="row">
					<div class="col-md-7">
						<div class="card">
							<div class="card-body">
								<div class="row">

									<div class="col-md-6">
										<div class="form-group mb-3">
											<label class="form-label" for="department">Department <span class="text-danger">*</span></label>
											<select name="department" class="form-control form-select @error('department') is-invalid @enderror" id="department">
												<option disabled selected>-- Select Department --</option>
												@foreach ($departments as $department)
													<option value="{{ $department->id }}" @if (old('department') == $department->id) selected @endif>{{ $department->department_name }}</option>
												@endforeach
											</select>
											@error('department')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group mb-3">
											<label class="form-label" for="subject">Subject <span class="text-danger">*</span></label>
											<select name="subject" class="form-control form-select @error('subject') is-invalid @enderror" id="subject">
												<option disabled selected>-- Select Subject --</option>
												@foreach ($subjects as $subject)
													<option value="{{ $subject->id }}" @if (old('subject') == $subject->id) selected @endif>{{ $subject->subject_name }}</option>
												@endforeach
											</select>
											@error('subject')
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
											<label class="form-label exam_start" for="exam_start">Start Exam Date & Time <span class="text-danger">*</span></label>
											<input type="text" name="exam_start" class="form-control @error('exam_start') is-invalid @enderror" id="exam_start" placeholder="Enter start exam date & Time" value="{{ old('exam_start') }}">
											@error('exam_start')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group mb-3">
											<label class="form-label exam_end" for="exam_end">End Exam Date & Time <span class="text-danger">*</span></label>
											<input type="text" name="exam_end" class="form-control @error('exam_end') is-invalid @enderror" id="exam_end" placeholder="Enter end exam date & Time" value="{{ old('exam_end') }}">
											@error('exam_end')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div> 

									<div class="col-md-6">
										<div class="form-group mb-3">
											<label class="form-label exam_mark" for="exam_mark">Total Marks <span class="text-danger">*</span></label>
											<input type="text" name="exam_mark" class="form-control @error('exam_mark') is-invalid @enderror" id="exam_mark" placeholder="Enter exam mark" value="{{ old('exam_mark') }}">
											@error('exam_mark')
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


					<div class="col-md-7 text-end mb-3">
						<a href="{{ route('admin.exams.index') }}" class="btn btn-danger waves-effect waves-light w-md"><i class="fa fa-arrow-left me-2"></i>Back Now</a>
						<button type="submit" class="btn btn-primary waves-effect waves-light w-md"><i class="fas fa-save me-2"></i>Submit Now</button>
					</div>

				</div>

			</form>

		</div>
		<!-- end col -->
	</div>
	<!-- end row -->
@endsection

@push('css')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('js')
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script>
		flatpickr('#exam_start, #exam_end', {
			enableTime: true,
			allowInput: true,
			dateFormat: "m/d/Y h:i K",
		});

		// flatpickr('#exam_start', {
		// 	enableTime: true,
		// 	noCalendar: true,
		// 	dateFormat: "h:i K", // K for AM/PM format
		// 	time_24hr: false, // Set to false to use 12-hour format
		// });
	</script>
@endpush




@push('js')
	<script>
		$(document).ready(function() {
			// Handler for subject selection change
			$('#subject').on('change', function() {
				var id = $(this).val();
				var url = "/admin/exam-question-search/" + id;

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
									'<input class="form-check-input question_input" type="checkbox" name="question_id[]" value="' + value.id + '" id="question' + value.id + '">' +
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



@push('js')
	<script>
		$(document).ready(function() {
			// Handling subject change event
			$('#subject').on('change', function() {
				var subject = $(this).val();

				if (subject) {
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

			// Trigger change event on subject initially to set question_type value
			// $('#subject').trigger('change');
		});
	</script>
@endpush

@push('js')
	<script>
		$(document).ready(function() {
			$('#department').on('change', function() {
				var id = $(this).val();
				var url = "/admin/department-wise-subjects/" + id;

				// Clear existing options in subject dropdown
				$('#subject').html('<option disabled selected>-- Loading Subjects --</option>');

				$.ajax({
					type: "GET",
					url: url,
					success: function(response) {
						if (response.length > 0) {
							// Append options to subject dropdown
							$('#subject').html('<option disabled selected>-- Select Subject --</option>');
							$.each(response, function(key, value) {
								$('#subject').append('<option value="' + value.id + '">' + value.subject_name + '</option>');
							});
						} else {
							$('#subject').html('<option disabled selected>-- Subject Not Found --</option>');
						}
					},
				});

			}).trigger('change');

		});
	</script>
@endpush
