@extends('layouts.backend.app')

@section('title', 'Edit Question And Options')


@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">Edit Question And Options !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">Edit Question And Options</li>
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
					<h4 class="card-title m-0">Edit Question And Options </h4>
				</div>
				<div class="card-body">
					<form action="{{ route('super-admin.questions.update', $question->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')

						@include('alert-message.alert-message')

						<div class="row">

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="department_id">Department <span class="text-danger">*</span></label>
									<select name="department_id" class="form-control form-select @error('department_id') is-invalid @enderror" id="department_id">
										<option disabled selected>-- Select Department --</option>
										@foreach ($departments as $department)
											<option value="{{ $department->id }}" @if ($question->department_id == $department->id) selected @endif>{{ $department->department_name }}</option>
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
											<option value="{{ $subject->id }}" @if ($question->subject_id == $subject->id) selected @endif>{{ $subject->subject_name }}</option>
										@endforeach
									</select>
									@error('subject_id')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-12">
								<div class="question">
									<div class="question-row">
										<div class="form-group mb-3">
											<label class="form-label question-label" for="question_name">Question Name <span class="text-danger">*</span></label>
											<input type="text" name="question_name" class="form-control @error('question_name') is-invalid @enderror" id="question_name" placeholder="Enter question name" value="{{ $question->question_name }}">
											@error('question_name')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>

										<div class="row">

											@foreach ($questionOptions as $key => $questionOption)
												<div class="col-md-3">
													<div class="form-group mb-3">
														<label class="form-label" for="option">Option {{ $key + 1 }}<span class="text-danger">*</span></label>
														<input type="text" name="option[]" class="form-control @error('option.' . $key) is-invalid @enderror" id="option_{{ $key }}" placeholder="Enter option {{ $key + 1 }}" value="{{ old('option.' . $key) ?? $questionOption->option }}">
														@error('option.' . $key)
															<div class="text-danger">{{ $message }}</div>
														@enderror
													</div>
												</div>
											@endforeach


											<div class="col-md-6">
												<div class="form-group mb-3">
													<label class="form-label" for="correct_answer">Correct Answer <span class="text-danger">*</span></label>
													<input type="text" name="correct_answer" class="form-control @error('correct_answer') is-invalid @enderror" id="correct_answer" placeholder="Enter currect answer" value="{{ old('correct_answer') ?? $question->correct_answer }}">
													@error('correct_answer')
														<div class="text-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>


											<div class="col-md-6">
												<div class="form-group mb-3">
													<label class="form-label" for="status">Status<span class="text-danger">*</span></label>
													<select name="status" class="form-control form-select @error('status') is-invalid @enderror">
														<option disabled selected>-- Selected Status --</option>
														<option value="1" {{ $question->status == 1 ? 'selected' : '' }}>Active</option>
														<option value="0" {{ $question->status == 0 ? 'selected' : '' }}>Inactive</option>
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

							<div class="form-group">
								<a href="{{ route('super-admin.questions.index') }}" class="btn btn-danger waves-effect waves-light w-md"><i class="fa fa-arrow-left me-2"></i>Back Now</a>
								<button type="submit" class="btn btn-primary waves-effect waves-light w-md"><i class="fas fa-upload me-2"></i>Update Now</button>
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
				var department_id = $(this).val();
				var url = "/super-admin/department-wise-subjects/" + department_id;

				// Clear existing options in subject_id dropdown
				$('#subject_id').empty().append('<option disabled selected>-- Loading Subjects --</option>');

				// Fetch subjects via Ajax
				$.ajax({
					type: "GET",
					url: url,
					success: function(response) {
						$('#subject_id').empty(); // Clear previous options

						if (Array.isArray(response) && response.length > 0) {
							$.each(response, function(key, value) {
								var selected = value.id == '{{ old('subject_id', $question->subject_id) }}' ? 'selected' : '';
								$('#subject_id').append('<option value="' + value.id + '" ' + selected + '>' + value.subject_name + '</option>');
							});
						} else {
							$('#subject_id').append('<option disabled selected>-- Subject Not Found --</option>');
						}
					},
					error: function(xhr, status, error) {
						console.error("Error fetching subjects:", error);
						$('#subject_id').empty().append('<option disabled selected>-- Error Fetching Subjects --</option>');
					}
				});
			}).trigger('change'); // Trigger change event on page load to load subjects if a department is pre-selected
		});
	</script>
@endpush
