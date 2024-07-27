<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

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

		<!-- <body data-layout="horizontal"> -->
		<div class="auth-page">
			<div class="container-fluid p-0">
				<div class="row g-0">

					<div class="col-xxl-9 col-lg-8 col-md-7">
						<div class="auth-bg pt-md-5 p-4 d-flex">
							<div class="bg-overlay"></div>
							<ul class="bg-bubbles">
								<li></li>
								<li></li>
								<li></li>
								<li></li>
								<li></li>
								<li></li>
								<li></li>
								<li></li>
								<li></li>
								<li></li>
							</ul>
							<!-- end bubble effect -->
							<div class="row justify-content-center align-items-end">
								<div class="col-xl-7">
									<div class="p-0 p-sm-4 px-xl-0">
										<div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
											<div class="carousel-indicators auth-carousel carousel-indicators-rounded justify-content-center mb-0">
												<button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
													<img src="{{ asset('backend') }}/assets/images/users/avatar-1.jpg" class="avatar-md img-fluid rounded-circle d-block" alt="...">
												</button>
												<button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2">
													<img src="{{ asset('backend') }}/assets/images/users/avatar-2.jpg" class="avatar-md img-fluid rounded-circle d-block" alt="...">
												</button>
												<button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3">
													<img src="{{ asset('backend') }}/assets/images/users/avatar-3.jpg" class="avatar-md img-fluid rounded-circle d-block" alt="...">
												</button>
											</div>
											<!-- end carouselIndicators -->
											<div class="carousel-inner">
												<div class="carousel-item active">
													<div class="testi-contain text-center text-white">
														<i class="bx bxs-quote-alt-left text-success display-6"></i>
														<h4 class="mt-4 fw-medium lh-base text-white">“I feel confident
															imposing change
															on myself. It's a lot more progressing fun than looking back.
															That's why
															I ultricies enim
															at malesuada nibh diam on tortor neaded to throw curve balls.”
														</h4>
														<div class="mt-4 pt-1 pb-5 mb-5">
															<h5 class="font-size-16 text-white">Richard Drews
															</h5>
															<p class="mb-0 text-white-50">Web Designer</p>
														</div>
													</div>
												</div>

												<div class="carousel-item">
													<div class="testi-contain text-center text-white">
														<i class="bx bxs-quote-alt-left text-success display-6"></i>
														<h4 class="mt-4 fw-medium lh-base text-white">“Our task must be to
															free ourselves by widening our circle of compassion to embrace
															all living
															creatures and
															the whole of quis consectetur nunc sit amet semper justo. nature
															and its beauty.”</h4>
														<div class="mt-4 pt-1 pb-5 mb-5">
															<h5 class="font-size-16 text-white">Rosanna French
															</h5>
															<p class="mb-0 text-white-50">Web Developer</p>
														</div>
													</div>
												</div>

												<div class="carousel-item">
													<div class="testi-contain text-center text-white">
														<i class="bx bxs-quote-alt-left text-success display-6"></i>
														<h4 class="mt-4 fw-medium lh-base text-white">“I've learned that
															people will forget what you said, people will forget what you
															did,
															but people will never forget
															how donec in efficitur lectus, nec lobortis metus you made them
															feel.”</h4>
														<div class="mt-4 pt-1 pb-5 mb-5">
															<h5 class="font-size-16 text-white">Ilse R. Eaton</h5>
															<p class="mb-0 text-white-50">Manager
															</p>
														</div>
													</div>
												</div>
											</div>
											<!-- end carousel-inner -->
										</div>
										<!-- end review carousel -->
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end col -->

					<div class="col-xxl-3 col-lg-4 col-md-5">
						<div class="auth-full-page-content d-flex p-sm-5 p-4">
							<div class="w-100">
								<div class="d-flex flex-column h-100">
									<div class="mb-4 mb-md-5 text-center">
										<a href="index.html" class="d-block auth-logo">
											<img src="{{ asset('backend') }}/assets/images/logo-sm.svg" alt="" height="28"> <span class="logo-txt">Dason</span>
										</a>
									</div>
									<div class="auth-content my-auto">
										<div class="text-center">
											<h5 class="mb-0">Register Account</h5>
											<p class="text-muted mt-2">Get your free Dason account now.</p>
										</div>
										<form class="mt-4 pt-2" method="POST" action="{{ route('register') }}">
											@csrf

											<div class="form-group mb-4">
												<select class="form-control form-select py-3 @error('department_id') is-invalid @enderror" name="department_id">
													<option disabled selected>-- Selected Department --</option>
													@foreach (getDepartments() as $department)
														<option value="{{ $department->id }}">{{ $department->department_name }}</option>
													@endforeach
												</select>
												@error('department_id')
													<div class="text-danger">{{ $message }}</div>
												@enderror
											</div>

											<div class="form-group mb-4">
												<input type="text" name="name" class="form-control py-3 @error('name') is-invalid @enderror" id="name" placeholder="Enter Full Name" value="{{ old('name') }}">
												@error('name')
													<div class="text-danger">{{ $message }}</div>
												@enderror
											</div>

											<div class="form-group mb-4">
												<input type="text" name="username" class="form-control py-3 @error('username') is-invalid @enderror" id="username" placeholder="Enter User Name" value="{{ old('username') }}">
												@error('username')
													<div class="text-danger">{{ $message }}</div>
												@enderror
											</div>

											<div class="form-group mb-4">
												<input type="email" name="email" class="form-control py-3 @error('email') is-invalid @enderror" id="email" placeholder="Enter Email" value="{{ old('email') }}">
												@error('email')
													<div class="text-danger">{{ $message }}</div>
												@enderror
											</div>

											<div class="form-group mb-4">
												<input type="password" name="password" class="form-control py-3 @error('password') is-invalid @enderror" id="password" placeholder="Enter Password">
												@error('password')
													<div class="text-danger">{{ $message }}</div>
												@enderror
											</div>

											<div class="mb-4">
												<p class="mb-0">By registering you agree to the Dason <a href="#" class="text-primary">Terms of Use</a></p>
											</div>
											<div class="mb-3">
												<button class="btn btn-primary w-100 waves-effect waves-light py-3" type="submit">Register</button>
											</div>
										</form>

										<div class="mt-5 text-center">
											<p class="text-muted mb-0">Already have an account ? <a href="{{ route('login') }}" class="text-primary fw-semibold"> Login </a> </p>
										</div>
									</div>
									<div class="mt-4 mt-md-5 text-center">
										<p class="mb-0">© {{ date('Y') }} Dason . Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
										</p>
									</div>
								</div>
							</div>
						</div>
						<!-- end auth full page content -->
					</div>
					<!-- end col -->
				</div>
				<!-- end row -->
			</div>
			<!-- end container fluid -->
		</div>

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

		<!-- validation init -->
		<script src="{{ asset('backend') }}/assets/js/pages/validation.init.js"></script>

		<script src="{{ asset('backend') }}/assets/js/pages/feather-icon.init.js"></script>

	</body>

</html>
