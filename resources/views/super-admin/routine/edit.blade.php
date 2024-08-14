@extends('layouts.backend.app')

@section('title', 'Edit Routine')

@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">Edit Routine !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('admin.class-routines.index') }}">Class Routines</a></li>
						<li class="breadcrumb-item active">Class Routine Update</li>
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
					<h4 class="card-title m-0">Edit Routine </h4>
				</div>
				<div class="card-body">
					<form id="trainer__form" action="{{ route('admin.class-routines.update', $classRoutine->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')


						@include('alert-message.alert-message')

						<div class="row">

							<div class="col-md-6 mb-3">
								<div class="form-group mb-3">
									<label class="form-label" for="branch">Branch Name <span class="text-danger">*</span></label>
									<select name="branch" id="branch" class="form-select">
										<option disabled selected>-- Select Branch --</option>
										@foreach (getBranches() as $branch)
											<option value="{{ $branch->id }}" {{ $classRoutine->branch_id == $branch->id ? 'selected' : '' }}>
												{{ $branch->branch_name }}
											</option>
										@endforeach
									</select>
									@error('branch')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6 mb-3">
								<div class="form-group">
									<label class="form-label" for="department">Department <span class="text-danger">*</span></label>
									<select name="department" id="department" class="form-select department__lists">
										<option disabled selected>-- Select Department --</option>
									</select>
									@error('department')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6 mb-3">
								<div class="form-group">
									<label class="form-label" for="batch">Batch <span class="text-danger">*</span></label>
									<select name="batch" id="batch" class="form-select batch__lists">
										<option disabled selected>-- Select Batch --</option>
									</select>
									@error('batch')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6 mb-3">
								<div class="form-group">
									<label class="form-label" for="lab">Lab Room <span class="text-danger">*</span></label>
									<select name="lab" id="lab" class="form-select lab__lists">
										<option disabled selected>-- Select Lab --</option>
									</select>
									@error('lab')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6 mb-3">
								<div class="form-group">
									<label class="form-label" for="trainer">Trainer <span class="text-danger">*</span></label>
									<select name="trainer" id="trainer" class="form-select trainer__lists">
										<option disabled selected>-- Select Trainer --</option>
									</select>
									@error('trainer')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-12">
								<div class="row">
									<div class="col-md-6 mb-3">
										<div class="form-group mb-3">
											<label class="form-label" for="day">Days <span class="text-danger">*</span></label>
											<select name="day" id="day" class="form-select">
												<option disabled selected>-- Select Day --</option>
												<option value="saturday" {{ $classRoutine->day == 'saturday' ? 'selected' : '' }}>Saturday</option>
												<option value="sunday" {{ $classRoutine->day == 'sunday' ? 'selected' : '' }}>Sunday</option>
												<option value="monday" {{ $classRoutine->day == 'monday ' ? 'selected' : '' }}>Monday</option>
												<option value="tuesday" {{ $classRoutine->day == 'tuesday' ? 'selected' : '' }}>Tuesday</option>
												<option value="wednesday" {{ $classRoutine->day == 'wednesday' ? 'selected' : '' }}>Wednesday</option>
												<option value="thursday" {{ $classRoutine->day == 'thursday' ? 'selected' : '' }}>Thursday</option>
												<option value="friday" {{ $classRoutine->day == 'friday' ? 'selected' : '' }}>Friday</option>
											</select>
											@error('day')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="form-label" for="time_schedule">Time Schedule <span class="text-danger">*</span></label>
											<select name="time_schedule" id="time_schedule" class="form-select">
												<option value="">-- Select Time Schedule --</option>
												@foreach (getTimeSchedules() as $timeSchedule)
													<option value="{{ $timeSchedule->id }}" {{ $classRoutine->time_schedule_id == $timeSchedule->id ? 'selected' : '' }}>{{ Carbon\Carbon::parse($timeSchedule->start_class)->format('h:i A') }} To {{ Carbon\Carbon::parse($timeSchedule->end_class)->format('h:i A') }}</option>
												@endforeach
											</select>
											@error('time_schedule')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 text-end">
								<div class="form-group">
									<a href="{{ route('admin.class-routines.index') }}" class="btn btn-danger waves-effect waves-light w-md"><i class="fa fa-arrow-left me-2"></i>Back Now</a>
									<button type="submit" class="btn btn-success waves-effect waves-light w-md update__btn"><i class="fas fa-upload me-2"></i>Update Now</button>
								</div>
							</div>
						</div>
					</form>

					@push('js')
						<script>
							$(document).ready(function() {
								$('.update__btn').on('click', function(e) {
									e.preventDefault();

									var formData = new FormData($('#trainer__form')[0]);

									$(".is-invalid").removeClass("is-invalid");
									$(".invalid-feedback").remove();
									$('.alert-danger').remove();

									var routineID = "{{ $classRoutine->id }}";
									var url = "/admin/class-routines/".routineID.
									"/update/";

									$.ajax({
										url: url,
										type: "POST",
										data: formData,
										contentType: false,
										processData: false,
										success: function(response) {
											if (response.success) {
												window.location.href = url;
											} else if (response.error) {
												$('#trainer__form').before('<div class="alert alert-danger alert-dismissible fade show"> <strong>Error! </strong>' + response.error + '</div>');
											}
										},
										error: function(xhr, status, error) {
											var errors = xhr.responseJSON.errors;
											$.each(errors, function(key, value) {
												var inputElement = $("#" + key);
												inputElement.addClass("is-invalid");
												inputElement.after('<span class="invalid-feedback text-danger">' + value[0] + '</span>');
											});
										},
									});
								});
							});
						</script>
					@endpush

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

			$('#branch').on('change', function() {
				var branchID = $(this).val();
				var departmentID = "{{ $classRoutine->department_id }}";
				var labID = "{{ $classRoutine->lab_id }}";
				var trainerID = "{{ $classRoutine->trainer_id }}";

				if (branchID) {
					$('.department__lists').html('<option disabled selected>Loading....</option>');
					$('.lab__lists').html('<option disabled selected>Loading....</option>');
					$('.trainer__lists').html('<option disabled selected>Loading....</option>');
					$.ajax({
						type: "GET",
						url: "/admin/branch-to-lab-trainer/" + branchID,
						data: {
							branch_department_id: departmentID,
							branch_lab_id: labID,
							branch_trainer_id: trainerID
						},
						success: function(response) {
							$('.department__lists').html(response.departments);
							$('.lab__lists').html(response.labs);
							$('.trainer__lists').html(response.trainers);
						},
						error: function() {
							alert('Failed to load data. Please try again.');
						}
					});
				} else {
					// Reset dropdowns if no branch selected
					$('.department__lists').html('<option disabled selected>-- Select Department --</option>');
					$('.lab__lists').html('<option disabled selected>-- Select Lab --</option>');
					$('.trainer__lists').html('<option disabled selected>-- Select Trainer --</option>');
				}
			}).trigger('change');
		});
	</script>
@endpush


@push('js')
	<script>
		$('#department').on('change', function() {
			var departmentID = $(this).val();
			var batchID = "{{ $classRoutine->batch_id }}";

			if (departmentID) {
				$('.batch__lists').html('<option disabled selected>Loading....</option>');
				$.ajax({
					type: "GET",
					url: "/admin/department-to-batch/" + departmentID,
					data: {
						department_batch_id: batchID,
					},
					success: function(response) {
						$('.batch__lists').html(response.batches);
					},
					error: function() {
						alert('Failed to load data. Please try again.');
					}
				});
			} else {
				// Reset dropdowns if no branch selected
				$('.batch__lists').html('<option disabled selected>-- Select Batch --</option>');
			}
		}).trigger('change');
	</script>
@endpush
