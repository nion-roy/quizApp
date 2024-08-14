@extends('layouts.backend.app')

@section('title', 'Routines')


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
				<div class="card-body">

					<form action="{{ route('admin.routines.class-filter') }}" method="get">
						<div class="d-lg-flex align-items-center justify-content-between gap-2">

							<div class="form-group w-100 mb-3 m-lg-0">
								<select name="branch" id="branch" class="form-select" required>
									<option disabled selected>-- Select Branch --</option>
									@foreach (getBranches() as $branch)
										<option value="{{ $branch->id }}" {{ old('branch') == $branch->id ? 'selected' : '' }}>{{ $branch->branch_name }}</option>
									@endforeach
								</select>
								@error('branch')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>



							<div class="form-group w-100 mb-3 m-lg-0">
								<select name="department" id="department" class="form-select department__lists" required>
									<option disabled selected>-- Select Department --</option>
								</select>
								@error('department')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>



							<div class="form-group w-100 mb-3 m-lg-0">
								<select name="batch" id="batch" class="form-select batch__lists">
									<option disabled selected>-- Select Batch --</option>
								</select>
								@error('batch')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>



							<div class="form-group w-100 mb-3 m-lg-0">
								<select name="lab" id="lab" class="form-select lab__lists">
									<option disabled selected>-- Select Lab --</option>
								</select>
								@error('lab')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>

							<div class="form-group w-100 mb-3 m-lg-0">
								<button type="submit" class="btn btn-success waves-effect w-100"><i class="fa fa-filter me-2"></i>Filter Now</button>
							</div>

						</div>
					</form>

				</div>
			</div>
		</div>


		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center justify-content-between">
						<h4 class="card-title">All Routines <span class="btn btn-success">{{ getStrPad($routines->count()) }}</span></h4>
						<a class="btn btn-success waves-effect waves-light" href="{{ route('admin.class-routines.create') }}"><i class="fa fa-plus-circle me-2"></i> Add New Routine</a>
					</div>
				</div>
				<div class="card-body">
					<table id="datatable" class="table table-bordered dt-responsive nowrap w-100 align-middle">
						<thead>
							<tr>
								<th>#</th>
								<th>Branch</th>
								<th>Department</th>
								<th>Batch</th>
								<th>Lab Room</th>
								<th>Trainer</th>
								<th>Day</th>
								<th>Time Schedule</th>
								<th>Action</th>
							</tr>
						</thead>


						<tbody>
							@foreach ($routines as $key => $routine)
								<tr>
									<td>{{ getStrPad($key + 1) }}</td>
									<td>{{ $routine->branch->branch_name }}</td>
									<td>{{ $routine->department->department_name }}</td>
									<td>{{ $routine->batch->batch }}</td>
									<td>{{ $routine->lab->lab_name }}</td>
									<td>{{ $routine->trainer->user->name }}</td>
									<td>{{ $routine->day }}</td>
									<td>{{ Carbon\Carbon::parse($routine->timeSchedule->start_class)->format('h:i A') }} - {{ Carbon\Carbon::parse($routine->timeSchedule->end_class)->format('h:i A') }}</td>

									<td width="5%">
										<div class="btn-group">
											<button type="button" class="btn btn-danger waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
											<div class="dropdown-menu" style="">
												<a href="{{ route('admin.class-routines.edit', $routine->id) }}" class="dropdown-item">Edit</a>
												<form action="{{ route('admin.class-routines.destroy', $routine->id) }}" method="POST">
													@csrf
													@method('DELETE')
													<button type="button" class="dropdown-item delete-button">Delete</button>
												</form>
											</div>
										</div>
									</td>

								</tr>
							@endforeach
						</tbody>

					</table>
				</div>
			</div>
		</div>
		<!-- end col -->
	</div>
@endsection


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
					$('.batch__lists').html('<option disabled selected>-- Select Batch --</option>');
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
					$.ajax({
						type: "GET",
						url: "/admin/branch-to-lab-trainer/" + branchID,
						success: function(response) {
							$('.department__lists').html(response.departments);
							$('.lab__lists').html(response.labs);
						},
						error: function() {
							alert('Failed to load data. Please try again.');
						}
					});
				} else {
					// Reset dropdowns if no branch selected
					$('.department__lists').html('<option disabled selected>-- Select Department --</option>');
					$('.lab__lists').html('<option disabled selected>-- Select Lab --</option>');
				}
			}).trigger('change');
		});
	</script>
@endpush
