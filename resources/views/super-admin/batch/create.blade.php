@extends('layouts.backend.app')

@section('title', 'New Batch Cerate')


@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">All Batches !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">All Batches</li>
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
					<h4 class="card-title m-0">New Batch Create </h4>
				</div>
				<div class="card-body">
					<form action="{{ route('admin.batches.store') }}" method="POST" enctype="multipart/form-data">
						@csrf

						@include('alert-message.alert-message')

						<div class="row justify-content-center">

							<div class="col-md-3">
								<div class="form-group mb-3">
									<label class="form-label" for="branch">Branch Name <span class="text-danger">*</span></label>
									<select name="branch" id="branch" class="form-select">
										<option disabled selected>-- Selected Branch --</option>
										@foreach (getBranches() as $branch)
											<option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
										@endforeach
									</select>
									@error('branch')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group mb-3">
									<label class="form-label" for="department">Department <span class="text-danger">*</span></label>
									<select name="department" id="department" class="form-select department__lists">
										<option disabled selected>-- Selected Department --</option>
									</select>
									@error('department')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group mb-3">
									<label class="form-label" for="batch">Batch Name <span class="text-danger">*</span></label>
									<input type="text" name="batch" class="form-control @error('batch') is-invalid @enderror" id="batch" placeholder="Enter batch name" value="{{ old('batch') }}">
									@error('batch')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group mb-3">
									<label class="form-label" for="status">Status<span class="text-danger">*</span></label>
									<select name="status" class="form-control form-select @error('status') is-invalid @enderror">
										<option value="" disabled {{ old('status') === null ? 'selected' : '' }}>-- Selected Status --</option>
										<option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
										<option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
									</select>
									@error('status')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-12 text-end">
								<div class="form-group">
									<a href="{{ route('admin.batches.index') }}" class="btn btn-danger waves-effect waves-light w-md"><i class="fa fa-arrow-left me-2"></i>Back Now</a>
									<button type="submit" class="btn btn-primary waves-effect waves-light w-md"><i class="fas fa-save me-2"></i>Submit Now</button>
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


@push('js')
	<script>
		$(document).ready(function() {
			$('#branch').on('change', function() {
				var branchID = $(this).val();
				if (branchID) {
					$('.department__lists').html('<option disabled selected>Loading....</option>');
					$.ajax({
						type: "GET",
						url: "/admin/branch-to-department/" + branchID,
						success: function(response) {
							$('.department__lists').html(response.departments);
						},
						error: function() {
							alert('Failed to load data. Please try again.');
						}
					});
				} else {
					// Reset dropdowns if no branch selected
					$('.department__lists').html('<option disabled selected>-- Select Department --</option>');
				}
			}).trigger('change');
		});
	</script>
@endpush
