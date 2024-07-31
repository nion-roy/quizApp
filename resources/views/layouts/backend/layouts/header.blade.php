<header id="page-topbar">
	<div class="navbar-header">
		<div class="d-flex">


			@if (!Auth::user()->hasRole('user'))
				<!-- LOGO -->
				<div class="navbar-brand-box">
					<a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
						<span class="logo-sm">
							<img src="{{ asset('backend') }}/assets/images/logo-sm.svg" alt="" height="30">
						</span>
						<span class="logo-lg">
							<img src="{{ asset('backend') }}/assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">QuizApp</span>
						</span>
					</a>

					<a href="{{ route('admin.dashboard') }}" class="logo logo-light">
						<span class="logo-sm">
							<img src="{{ asset('backend') }}/assets/images/logo-sm.svg" alt="" height="30">
						</span>
						<span class="logo-lg">
							<img src="{{ asset('backend') }}/assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">QuizApp</span>
						</span>
					</a>
				</div>
			@else
				<!-- LOGO -->
				<div class="navbar-brand-box">
					<a href="{{ route('user.dashboard') }}" class="logo logo-dark">
						<span class="logo-sm">
							<img src="{{ asset('backend') }}/assets/images/logo-sm.svg" alt="" height="30">
						</span>
						<span class="logo-lg">
							<img src="{{ asset('backend') }}/assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">QuizApp</span>
						</span>
					</a>

					<a href="{{ route('user.dashboard') }}" class="logo logo-light">
						<span class="logo-sm">
							<img src="{{ asset('backend') }}/assets/images/logo-sm.svg" alt="" height="30">
						</span>
						<span class="logo-lg">
							<img src="{{ asset('backend') }}/assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">QuizApp</span>
						</span>
					</a>
				</div>
			@endif


			<button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
				<i class="fa fa-fw fa-bars"></i>
			</button>
		</div>

		<div class="d-flex">



			<div class="dropdown d-none d-sm-inline-block">
				<button type="button" class="btn header-item" id="mode-setting-btn">
					<i data-feather="moon" class="icon-lg layout-mode-dark"></i>
					<i data-feather="sun" class="icon-lg layout-mode-light"></i>
				</button>
			</div>


			<div class="dropdown d-inline-block">
				<button type="button" class="btn header-item right-bar-toggle me-2">
					<i data-feather="settings" class="icon-lg"></i>
				</button>
			</div>

			<div class="dropdown d-inline-block">
				<button type="button" class="btn header-item bg-light-subtle border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img class="rounded-circle header-profile-user" src="{{ asset('backend') }}/assets/images/users/avatar-1.jpg" alt="Header Avatar">
					<span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->username }}</span>
					<i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
				</button>
				<div class="dropdown-menu dropdown-menu-end">
					<!-- item-->
					<a class="dropdown-item" href="apps-contacts-profile.html"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
					<a class="dropdown-item" href="auth-lock-screen.html"><i class="mdi mdi-lock font-size-16 align-middle me-1"></i> Lock screen</a>
					<div class="dropdown-divider"></div>

					@if (!Auth::user()->hasRole('user'))
						<a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
					@else
						<a class="dropdown-item" href="{{ route('user.logout') }}"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
					@endif

				</div>
			</div>

		</div>
	</div>
</header>
