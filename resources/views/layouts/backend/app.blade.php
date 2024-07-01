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

	<body data-topbar="dark" data-sidebar="dark">

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


	</body>

</html>
