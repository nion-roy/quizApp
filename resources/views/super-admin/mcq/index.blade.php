@extends('layouts.backend.app')

@section('title', 'Subjects')

@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">MCQ Question Pattern !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">MCQ Question Pattern</li>
					</ol>
				</div>

			</div>
		</div>
	</div>
	<!-- end page title -->


	@include('super-admin.mcq.result-popup')


	<div class="row">
		<div class="col-6 mx-auto">
			<div class="card">
				<div class="card-body">
					<div id="pointModal" class="p-4 js-container">
						<div class="icon">
							<i class="fas fa-check"></i>
						</div>
						<h2>Congratulations!</h2>
						<hr>

						<div class="d-flex align-items-center justify-content-center mb-1 gap-2 font-size-16">
							<h5 class="text-info">Total Question:</h5>
							<span> 10 </span>
						</div>

						<div class="d-flex align-items-center justify-content-center mb-1 gap-2 font-size-16">
							<h5 class="text-success">Correct Answer:</h5>
							<span>08 </span>
						</div>

						<div class="d-flex align-items-center justify-content-center mb-1 gap-2 font-size-16">
							<h5 class="text-danger">Wrong Answer:</h5>
							<span>02 </span>
						</div>

						<button class="btn btn-danger mt-3" id="success_complete">Close Now</button>
						<a href="{{ route('super-admin.mcq-practice.download') }}" class="btn btn-success mt-3">Download</a>

					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title m-0">MCQ Question Pattern</h4>
				</div>
				<div class="card-body">

					@include('alert-message.alert-message')

					<form action="{{ route('super-admin.mcq-practice.create') }}" method="GET">

						<div class="row justify-content-center">
							<div class="col-md-6 mb-3">
								<div class="row">

									@php
										$departments = App\Models\Department::where('status', true)->get();
									@endphp

									<div class="col-12 mb-3">
										<label class="form-label" for="">Department<span class="text-danger">*</span></label>
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


									@php
										$subjects = App\Models\Subject::where('status', true)->get();
									@endphp

									<div class="col-12 mb-3">
										<label class="form-label" for="">Subject<span class="text-danger">*</span></label>
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


									{{-- <div class="col-12">
										<label class="form-label" for="">MCQ Value<span class="text-danger">*</span></label>
										<select name="mcq" class="form-control form-select @error('value') is-invalid @enderror" id="value">
											<option disabled selected>-- Select Value --</option>
											<option value="5">05</option>
											<option value="10">10</option>
											<option value="20">20</option>
											<option value="30">30</option>
										</select>
									</div> --}}

								</div>
							</div>

							<div class="col-12 text-center">
								<button type="button" class="btn btn-secondary px-5" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-success px-5">Continue</button>
							</div>

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
