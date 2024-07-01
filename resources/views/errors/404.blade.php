<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>404 Page Not Found | QuizApp </title>

		<!-- App favicon -->
		<link rel="shortcut icon" href="{{ asset('backend') }}/assets/images/favicon.ico">

		<!-- preloader css -->
		<link rel="stylesheet" href="{{ asset('backend') }}/assets/css/preloader.min.css" type="text/css" />

		<!-- Bootstrap Css -->
		<link href="{{ asset('backend') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
		<!-- Icons Css -->
		<link href="{{ asset('backend') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
		<!-- App Css-->
		<link href="{{ asset('backend') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

	</head>

	<body data-topbar="dark">

		<div class="my-5 pt-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="text-center mb-5 pt-5">
							<h1 class="error-title mt-5"><span>404!</span></h1>
							<h4 class="text-uppercase mt-5">Sorry, page not found</h4>
							<p class="font-size-15 mx-auto text-muted w-50 mt-4">It will be as simple as Occidental in fact, it will Occidental to an English person</p>
							<div class="mt-5 text-center">
								<a class="btn btn-primary waves-effect waves-light" href="{{ url()->previous() }}">Back to Home</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end container -->
		</div>
		<!-- end content -->


		<!-- Right bar overlay-->
		<div class="rightbar-overlay"></div>
		<!-- JAVASCRIPT -->
		<script src="{{ asset('backend') }}/assets/libs/jquery/jquery.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/metismenu/metisMenu.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/simplebar/simplebar.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/node-waves/waves.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/feather-icons/feather.min.js"></script>
		<!-- pace js -->
		<script src="{{ asset('backend') }}/assets/libs/pace-js/pace.min.js"></script>

	</body>

</html>
