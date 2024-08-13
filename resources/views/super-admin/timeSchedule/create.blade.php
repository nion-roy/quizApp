@extends('layouts.backend.app')

@section('title', 'New Time Schedule Cerate')


@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">New Time Schedule Create !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('admin.time-schedules.index') }}">Time Schedules</a></li>
						<li class="breadcrumb-item active">New Time Schedule Create</li>
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
					<h4 class="card-title m-0">New Time Schedule Create </h4>
				</div>
				<div class="card-body">
					<form id="time__schedule__form" action="{{ route('admin.time-schedules.store') }}" method="POST" enctype="multipart/form-data">
						@csrf

						<div class="row justify-content-lg-center">
							<div class="col-12 col-xl-9">
								@include('alert-message.alert-message')
							</div>
						</div>

						<div class="row justify-content-lg-center">
							<div class="col-md-6 col-xl-3 mb-3">
								<div class="form-group">
									<label class="form-label" for="start_class">Class Start <span class="text-danger">*</span></label>
									<input type="time" name="start_class" class="form-control" id="start_class" placeholder="Enter lab name" value="{{ old('start_class') ?? ($startClass ?? null) }}">
									@error('start_class')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6 col-xl-3 mb-3">
								<div class="form-group">
									<label class="form-label" for="end_class">Class End <span class="text-danger">*</span></label>
									<input type="time" name="end_class" class="form-control" id="end_class" placeholder="Enter lab name" value="{{ old('end_class') ?? ($endClass ?? null) }}">
									@error('end_class')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6 col-xl-3 mb-3">
								<div class="form-group mb-3">
									<label class="form-label" for="status">Status <span class="text-danger">*</span></label>
									<select name="status" class="form-select">
										<option value="" disabled {{ old('status') === null ? 'selected' : '' }}>-- Selected Status --</option>
										<option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
										<option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
									</select>
									@error('status')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-12 col-lg-9 text-end">
								<div class="form-group">
									<a href="{{ route('admin.time-schedules.index') }}" class="btn btn-danger waves-effect waves-light w-md"><i class="fa fa-arrow-left me-2"></i>Back Now</a>
									<button type="submit" class="btn btn-primary waves-effect waves-light w-md time__schedule_btn"><i class="fas fa-save me-2"></i>Submit Now</button>
								</div>
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


{{-- @push('js')
	<script>
		$('.time__schedule_btn').on('click', function() {
			var formData = new FormData($('#time__schedule__form')[0]);

			// Clear previous error messages
			$(".is-invalid").removeClass("is-invalid");
			$(".invalid-feedback").remove();
			$('.alert-danger').remove();

			$.ajax({
				url: "{{ route('admin.time-schedules.store') }}",
				type: "POST",
				data: formData,
				contentType: false,
				processData: false,
				success: function(response) {
					if (response.success) {
						window.location.href = "{{ route('admin.time-schedules.create') }}";
					} else if (response.error) {
						$('#time__schedule__form').before('<div class="alert alert-danger alert-dismissible fade show"> <strong>Error! </strong>' + response.error + '</div>');
					}
				},
				error: function(xhr, status, error) {
					var errors = xhr.responseJSON.errors;
					$.each(errors, function(key, value) {
						var inputElement = $("#" + key);
						inputElement.addClass("is-invalid");
						inputElement.after('<span class="invalid-feedback text-danger font-size-12">' + value[0] + '</span>');
					});
				},
			});

		});
	</script>
@endpush --}}
