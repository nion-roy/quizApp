<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">


		<title>@yield('title') | QuizApp</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
		<meta content="Themesbrand" name="author" />
		<!-- App favicon -->
		<link rel="shortcut icon" href="{{ asset('backend') }}/assets/images/favicon.ico">

		<!-- Sweet Alert-->
		<link rel="stylesheet" href="sweetalert2.min.css">

		<!-- DataTables -->
		<link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

		<!-- plugin css -->
		<link href="{{ asset('backend') }}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

		<!-- preloader css -->
		<link rel="stylesheet" href="{{ asset('backend') }}/assets/css/preloader.min.css" type="text/css" />

		<!-- Bootstrap Css -->
		<link href="{{ asset('backend') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
		<!-- Icons Css -->
		<link href="{{ asset('backend') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
		<!-- App Css-->
		<link href="{{ asset('backend') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

		<style>
			.btn:hover,
			.btn:focus {
				box-shadow: none !important;
				border-color: transparent !important;
			}

			.swal2-actions {
				flex-direction: row-reverse;
				gap: 8px;
			}
		</style>


		@stack('css')

	</head>

	<body data-topbar="dark" data-sidebar="dark" data-sidebar-size="lg">

		<!-- <body data-layout="horizontal"> -->

		<!-- Begin page -->
		<div id="layout-wrapper">


			@include('layouts.backend.layouts.header')

			<!-- ========== Left Sidebar Start ========== -->
			<div class="vertical-menu">

				<div data-simplebar class="h-100">

					<!--- Sidemenu -->
					@include('layouts.backend.layouts.sidebar')
					<!-- Sidebar -->
				</div>
			</div>
			<!-- Left Sidebar End -->



			<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->
			<div class="main-content">

				<div class="page-content">
					<div class="container-fluid">

						@yield('main_content')

					</div>
					<!-- container-fluid -->
				</div>
				<!-- End Page-content -->

				@include('layouts.backend.layouts.footer')
			</div>
			<!-- end main content-->

		</div>
		<!-- END layout-wrapper -->



		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="{{ route('super-admin.questionSearch') }}" method="GET">

						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">MCQ Question Pattern</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">

							<div class="row">

								@php
									$departments = App\Models\Department::where('status', true)->get();
								@endphp

								<div class="col-12 mb-3">
									<label class="form-label" for="">Department</label>
									<select name="department_id" class="form-control form-select @error('department_id') is-invalid @enderror" id="department_id">
										<option disabled selected>-- Select Department --</option>
										@foreach ($departments as $department)
											<option value="{{ $department->id }}" @if (old('department_id') == $department->id) selected @endif>{{ $department->department_name }}</option>
										@endforeach
									</select>
								</div>


								@php
									$subjects = App\Models\Subject::where('status', true)->get();
								@endphp

								<div class="col-12 mb-3">
									<label class="form-label" for="">Subject</label>
									<select name="subject_id" class="form-control form-select @error('subject_id') is-invalid @enderror" id="subject_id">
										<option disabled selected>-- Select Subject --</option>
										@foreach ($subjects as $subject)
											<option value="{{ $subject->id }}" @if (old('subject_id') == $subject->id) selected @endif>{{ $subject->subject_name }}</option>
										@endforeach
									</select>
								</div>


								<div class="col-12">
									<label class="form-label" for="">MCQ Value</label>
									<select name="value" class="form-control form-select @error('value') is-invalid @enderror" id="value">
										<option disabled selected>-- Select Value --</option>
										<option value="5">05</option>
										<option value="10">10</option>
										<option value="20">20</option>
										<option value="30">30</option>
									</select>
								</div>

							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success">Continue</button>
						</div>
					</form>
				</div>
			</div>
		</div>


		<!-- Right Sidebar -->
		@include('layouts.backend.layouts.rightbar')
		<!-- /Right-bar -->

		<!-- Right bar overlay-->
		<div class="rightbar-overlay"></div>

		<!-- JAVASCRIPT -->
		<script src="{{ asset('backend') }}/assets/libs/jquery/jquery.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/metismenu/metisMenu.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/simplebar/simplebar.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/node-waves/waves.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/feather-icons/feather.min.js"></script>

		<!-- apexcharts -->
		<script src="{{ asset('backend') }}/assets/libs/apexcharts/apexcharts.min.js"></script>

		<!-- Required datatable js -->
		<script src="{{ asset('backend') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

		<!-- Datatable init js -->
		<script src="{{ asset('backend') }}/assets/js/pages/datatables.init.js"></script>

		<script src="{{ asset('backend') }}/assets/js/pages/allchart.js"></script>

		<!-- dashboard init -->
		<script src="{{ asset('backend') }}/assets/js/pages/dashboard.init.js"></script>

		<!-- Sweet Alerts js -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		<!-- Sweet alert init js-->
		<script src="{{ asset('backend') }}/assets/js/pages/sweetalert.init.js"></script>

		<script src="{{ asset('backend') }}/assets/js/script.js"></script>

		<script src="{{ asset('backend') }}/assets/js/app.js"></script>

		@include('sweetalert::alert')

		@stack('js')


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


	</body>

</html>
