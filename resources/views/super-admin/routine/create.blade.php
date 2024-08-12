@extends('layouts.backend.app')

@section('title', 'New Class Routine Cerate')

@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">All Routines !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">All Routines</li>
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
					<h4 class="card-title m-0">New Class Routine Create </h4>
				</div>
				<div class="card-body">
					<form action="{{ route('admin.routines.store') }}" method="POST" enctype="multipart/form-data">
						@csrf

						@include('alert-message.alert-message')

						<div class="row">

							<div class="col-md-6 mb-3">
								<div class="form-group mb-3">
									<label class="form-label" for="branch">Branch Name <span class="text-danger">*</span></label>
									<select name="branch" id="branch" class="form-select">
										<option disabled selected>-- Select Branch --</option>
										@foreach (getBranches() as $branch)
											<option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
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

							<div class="col-md-6 mb-3">
								<div class="form-group mb-3">
									<label class="form-label" for="day">Days <span class="text-danger">*</span></label>
									<select name="day" id="day" class="form-select">
										<option disabled selected>-- Select Day --</option>
										<option value="saturday">Saturday</option>
										<option value="sunday">Sunday</option>
										<option value="monday">Monday</option>
										<option value="tuesday">Tuesday</option>
										<option value="wednesday">Wednesday</option>
										<option value="thursday">Thursday</option>
										<option value="friday">Friday</option>
									</select>
									@error('day')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>


							<div class="col-12">
								<div class="row">
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="form-label" for="start_class">Class Start <span class="text-danger">*</span></label>
											<input type="time" name="start_class" class="form-control @error('start_class') is-invalid @enderror" id="start_class" placeholder="Enter lab name" value="{{ old('start_class') }}">
											@error('start_class')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="form-label" for="end_class">Class End <span class="text-danger">*</span></label>
											<input type="time" name="end_class" class="form-control @error('end_class') is-invalid @enderror" id="end_class" placeholder="Enter lab name" value="{{ old('end_class') }}">
											@error('end_class')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<a href="{{ route('admin.routines.index') }}" class="btn btn-danger waves-effect waves-light w-md"><i class="fa fa-arrow-left me-2"></i>Back Now</a>
									<button type="submit" class="btn btn-primary waves-effect waves-light w-md"><i class="fas fa-save me-2"></i>Submit Now</button>
								</div>
							</div>
						</div>


						@push('js')
							<script>
								$(document).ready(function() {
									$('#department').on('change', function() {
										var departmentID = $(this).val();
										if (departmentID) {
											$('.batch__lists').html('<option disabled selected>Loading....</option>');
											$.ajax({
												type: "GET",
												url: "/admin/department-to-batch/" + departmentID,
												success: function(response) { 
													$('.batch__lists').html(response.batches);
												},
												error: function() {
													alert('Failed to load data. Please try again.');
												}
											});
										} else {
											// Reset dropdowns if no branch selected
											$('.batch__lists').html('<option disabled selected>-- Select Department --</option>');
										}
									}).trigger('change');
								});
							</script>
							<script>
								$(document).ready(function() {
									$('#branch').on('change', function() {
										var branchID = $(this).val();
										if (branchID) {
											$('.department__lists').html('<option disabled selected>Loading....</option>');
											$('.lab__lists').html('<option disabled selected>Loading....</option>');
											$('.trainer__lists').html('<option disabled selected>Loading....</option>');
											$.ajax({
												type: "GET",
												url: "/admin/branch-to-lab-trainer/" + branchID,
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


					</form>
				</div>
			</div>
		</div>
		<!-- end col -->
	</div>
	<!-- end row -->
@endsection
