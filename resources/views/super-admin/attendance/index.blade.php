@extends('layouts.backend.app')

@section('title', 'Attendances')


@push('css')
	<style>
		.present__content {
			position: relative;
		}

		.present__content h4,
		.present__content h5,
		.present__content label {
			margin: 0;
		}

		.present__content span {
			font-size: 22px;
			background: #28a745;
			color: #fff;
			padding: 6px 12px;
			border-radius: 4px;
		}

		.form-check-input {
			display: none;
		}

		/* Style for Present */
		.form-check-input:checked~label[for^="present"] {
			border: 1px solid #28a745 !important;
			background-color: #28a745;
			color: white;
		}

		/* Style for Absent */
		.form-check-input:checked~label[for^="absent"] {
			border: 1px solid #dc3545 !important;
			background-color: #dc3545;
			color: white;
		}

		.form-label {
			border: 1px solid #ced4da;
			/* Default border color */
			padding: 8px 12px;
			font-size: 14px;
			border-radius: 4px;
			cursor: pointer;
			color: black;
			transition: background-color 0.3s ease, border-color 0.3s ease;
		}
	</style>
@endpush


@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">All Attendances !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">All Attendances</li>
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
					<h4 class="card-title m-0">Report By Attendances</h4>
				</div>
				<div class="card-body">
					<div class="row">

						<div class="col-md-3">
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
						</div>

						<div class="col-md-3">
							<div class="form-group w-100 mb-3 m-lg-0">
								<select name="department" id="department" class="form-select department__lists" required>
									<option disabled selected>-- Select Department --</option>
								</select>
								@error('department')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group w-100 mb-3 m-lg-0">
								<select name="batch" id="batch" class="form-select batch__lists">
									<option disabled selected>-- Select Batch --</option>
								</select>
								@error('batch')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group w-100 mb-3 m-lg-0">
								<select name="group" id="group" class="form-select group__lists">
									<option disabled selected>-- Select Group --</option>
									<option value="Group A">Group A</option>
									<option value="Group B">Group B</option>
								</select>
								@error('group')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>

						<div class="col-md-12  mt-3 text-end">
							<a href="{{ route('admin.attendances.index') }}" class="btn btn-danger waves-effect">Reset</a>
							<button class="btn btn-success waves-effect student__filter__btn"><i class="fa fa-filter me-2"></i>Filter Now</button>
						</div>

						@push('js')
							<script>
								$('.student__filter__btn').on('click', function() {
									var branchID = $("#branch").val();
									var departmentID = $("#department").val();
									var batchID = $("#batch").val();
									var groupValue = $("#group").val();

									// alert(branchID + departmentID + batchID + groupValue)


									$.ajax({
										type: "get",
										url: "/admin/attendances-student",
										data: {
											branchID: branchID,
											departmentID: departmentID,
											batchID: batchID,
											groupValue: groupValue,
										},
										success: function(response) {
											// console.log(response);
											$('.student__lists').html(response.students);
										}
									});


								})
							</script>
						@endpush

					</div>
				</div>
			</div>
		</div>

		<div class="col-12 student__lists">

		</div>


	</div>
@endsection


@push('js')
	<script>
		$(document).ready(function() {
			//Branch to department get
			$('#branch').on('change', function() {
				var branchID = $(this).val();
				if (branchID) {
					$('.department__lists').html('<option disabled selected>Loading....</option>');
					$.ajax({
						type: "GET",
						url: "/admin/attendances-branch-to-department/" + branchID,
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
		//Branch to department get


		//Department to batch get
		$('#department').on('change', function() {
			var departmentID = $(this).val();
			if (departmentID) {
				$('.batch__lists').html('<option disabled selected>Loading....</option>');
				$.ajax({
					type: "GET",
					url: "/admin/attendances-department-to-batch/" + departmentID,
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
		//Department to batch get
	</script>
@endpush
