@extends('layouts.backend.app')

@section('title', 'New Question Cerate')


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
				<div class="card-header">
					<h4 class="card-title m-0">New Question Create </h4>
				</div>
				<div class="card-body">
					<form action="{{ route('super-admin.questions.store') }}" method="POST" enctype="multipart/form-data">
						@csrf

						@include('alert-message.alert-message')

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


							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="exam_name">Exam Name <span class="text-danger">*</span></label>
									<input type="text" name="exam_name" class="form-control @error('exam_name') is-invalid @enderror" id="exam_name" placeholder="Enter exam name" value="{{ old('exam_name') }}">
									@error('exam_name')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="exam_date">Start Exam Date <span class="text-danger">*</span></label>
									<input type="text" name="exam_date" class="form-control @error('exam_date') is-invalid @enderror" id="exam_date" placeholder="Enter start exam date" value="{{ old('exam_date') }}">
									@error('exam_date')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="exam_duration">Exam Duration <span class="text-danger">*</span></label>
									<input type="number" min="0" name="exam_duration" class="form-control @error('exam_duration') is-invalid @enderror" id="exam_duration" placeholder="Enter exam duration" value="{{ old('exam_duration') }}">
									@error('exam_duration')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-12">
								<div class="question">
									<div class="question-row">
										<div class="form-group mb-3">
											<div class="d-flex align-items-center justify-content-between mb-2">
												<label class="form-label question-label" for="question_name">Question Name 1 <span class="text-danger">*</span></label>
												<button type="button" class="btn btn-success btn-sm font-size-14 add-row-question">Add Row</button>
											</div>
											<input type="text" name="question_name[]" class="form-control" id="question_name" placeholder="Enter question name" required>
										</div>

										<div class="row">
											<div class="col-md-3">
												<div class="form-group mb-3">
													<label class="form-label" for="option_1">Option 01 <span class="text-danger">*</span></label>
													<input type="text" name="option_1[]" class="form-control" id="option_1" placeholder="Enter option 01" required>
												</div>
											</div>

											<div class="col-md-3">
												<div class="form-group mb-3">
													<label class="form-label" for="option_2">Option 02 <span class="text-danger">*</span></label>
													<input type="text" name="option_2[]" class="form-control" id="option_2" placeholder="Enter option 02" required>
												</div>
											</div>

											<div class="col-md-3">
												<div class="form-group mb-3">
													<label class="form-label" for="option_3">Option 03 <span class="text-danger">*</span></label>
													<input type="text" name="option_3[]" class="form-control" id="option_3" placeholder="Enter option 03" required>
												</div>
											</div>

											<div class="col-md-3">
												<div class="form-group mb-3">
													<label class="form-label" for="option_4">Option 04 <span class="text-danger">*</span></label>
													<input type="text" name="option_4[]" class="form-control" id="option_4" placeholder="Enter option 04" required>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group mb-3">
													<label class="form-label" for="correct_answer">Correct Answer <span class="text-danger">*</span></label>
													<select name="correct_answer[]" class="form-control form-select @error('correct_answer') is-invalid @enderror">
														<option disabled selected>-- Selected Correct Answer --</option>
														<option value="1">Option 01</option>
														<option value="2">Option 02</option>
														<option value="3">Option 03</option>
														<option value="4">Option 04</option>
													</select>
													@error('correct_answer')
														<div class="text-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>

										</div>
									</div>
								</div>

								@push('js')
									<script>
										$(document).ready(function() {
											function updateQuestionNumbers() {
												$('.question-row').each(function(index) {
													var questionNumber = index + 1;
													$(this).find('.question-label').html('Question Name ' + questionNumber + ' <span class="text-danger">*</span>');
													$(this).find('input[name="question_name[]"]').attr('placeholder', 'Enter question name ' + questionNumber);
												});
											}

											// Add Row Question
											$(document).on('click', '.add-row-question', function() {
												var newRow = '<div class="question-row">' +
													'<div class="form-group mb-3">' +
													'<div class="d-flex align-items-center justify-content-between mb-2">' +
													'<label class="form-label question-label" for="question_name">Question Name <span class="text-danger">*</span></label>' +
													'<div>' +
													'<button type="button" class="btn btn-danger btn-sm font-size-14 me-1 remove-row-question">Remove</button>' +
													'<button type="button" class="btn btn-success btn-sm font-size-14 add-row-question">Add Row</button>' +
													'</div>' +
													'</div>' +
													'<input type="text" name="question_name[]" class="form-control" placeholder="Enter question name" required>' +
													'</div>' +
													'<div class="row">' +
													'<div class="col-md-3">' +
													'<div class="form-group mb-3">' +
													'<label class="form-label" for="option_1">Option 01 <span class="text-danger">*</span></label>' +
													'<input type="text" name="option_1[]" class="form-control" placeholder="Enter option 01" required>' +
													'</div>' +
													'</div>' +
													'<div class="col-md-3">' +
													'<div class="form-group mb-3">' +
													'<label class="form-label" for="option_2">Option 02 <span class="text-danger">*</span></label>' +
													'<input type="text" name="option_2[]" class="form-control" placeholder="Enter option 02" required>' +
													'</div>' +
													'</div>' +
													'<div class="col-md-3">' +
													'<div class="form-group mb-3">' +
													'<label class="form-label" for="option_3">Option 03 <span class="text-danger">*</span></label>' +
													'<input type="text" name="option_3[]" class="form-control" placeholder="Enter option 03" required>' +
													'</div>' +
													'</div>' +
													'<div class="col-md-3">' +
													'<div class="form-group mb-3">' +
													'<label class="form-label" for="option_4">Option 04 <span class="text-danger">*</span></label>' +
													'<input type="text" name="option_4[]" class="form-control" placeholder="Enter option 04" required>' +
													'</div>' +
													'</div>' +
													'<div class="col-md-6">' +
													'<div class="form-group mb-3">' +
													'<label class="form-label" for="correct_answer">Correct Answer <span class="text-danger">*</span></label>' +
													'<select name="correct_answer[]" class="form-control form-select">' +
													'<option disabled selected>-- Selected Correct Answer --</option>' +
													'<option value="1">Option 01</option>' +
													'<option value="2">Option 02</option>' +
													'<option value="3">Option 03</option>' +
													'<option value="4">Option 04</option>' +
													'</select>' +
													'</div>' +
													'</div>' +
													'</div>' +
													'</div>';
												$(".question").append(newRow);
												updateQuestionNumbers();
											});

											// Remove Row Question
											$(document).on('click', '.remove-row-question', function() {
												$(this).closest('.question-row').remove();
												updateQuestionNumbers();
											});

											// Initial call to set question numbers
											updateQuestionNumbers();
										});
									</script>
								@endpush
							</div>


							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="status">Status<span class="text-danger">*</span></label>
									<select name="status" class="form-control form-select @error('status') is-invalid @enderror">
										<option disabled selected>-- Selected Status --</option>
										<option value="1">Active</option>
										<option value="0">Inactive</option>
									</select>
									@error('status')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>


							<div class="form-group">
								<a href="{{ route('super-admin.questions.index') }}" class="btn btn-danger waves-effect waves-light w-md"><i class="fa fa-arrow-left me-2"></i>Back Now</a>
								<button type="submit" class="btn btn-primary waves-effect waves-light w-md"><i class="fas fa-save me-2"></i>Submit Now</button>
							</div>

					</form>
				</div>
			</div>
		</div>
		<!-- end col -->
	</div>
	<!-- end row -->
@endsection


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
			}).trigger('change'); // Trigger change event on page load to load subjects if a department is pre-selected
		});
	</script>
@endpush


@push('css')
	<!-- datepicker css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.7/themes/airbnb.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" />
@endpush

@push('js')
	<!-- datepicker js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.7/plugins/rangePlugin.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.7/flatpickr.min.js"></script>

	<script>
		flatpickr('#exam_date', {
			// enableTime: true,
			allowInput: true,
			dateFormat: "m/d/Y",
		});
		flatpickr('#endDate', {
			// enableTime: true,
			allowInput: true,
			dateFormat: "m/d/Y",
			// noCalendar: true, // Disable calendar for time picker
			// dateFormat: "m/d/Y h:iK",
		});
	</script>
@endpush
