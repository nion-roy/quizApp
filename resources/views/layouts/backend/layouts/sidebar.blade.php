@if (Auth::user()->role == 'super-admin')
	<div id="sidebar-menu">
		<!-- Left Menu Start -->
		<ul class="metismenu list-unstyled" id="side-menu">
			<li class="menu-title" data-key="t-menu">Menu</li>

			@php
				$user = request()->segment(1);
			@endphp

			<li class="{{ Request::is($user . '/dashboard') ? 'mm-active' : '' }}">
				<a class="{{ Request::is($user . '/dashboard') ? 'active' : '' }}" href="{{ route('super-admin.dashboard') }}">
					<i data-feather="home"></i>
					<span data-key="t-dashboard">Dashboard</span>
				</a>
			</li>

			<li class="menu-title" data-key="t-apps">Apps</li>

			<li class="{{ Request::is($user . '/departments*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is($user . '/departments*') ? 'mm-active' : '' }}" href="{{ route('super-admin.departments.index') }}">
					<i class="fas fa-question-circle"></i>
					<span data-key="t-ecommerce">Department</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is($user . '/subjects*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is($user . '/subjects*') ? 'mm-active' : '' }}" href="{{ route('super-admin.subjects.index') }}">
					<i class="fas fa-question-circle"></i>
					<span data-key="t-ecommerce">Subject</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is($user . '/questions*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is($user . '/questions*') ? 'mm-active' : '' }}" href="{{ route('super-admin.questions.index') }}">
					<i class="fas fa-question-circle"></i>
					<span data-key="t-ecommerce">Question Bank</span>
				</a>
			</li>

			<hr class="m-0">


			<li class="{{ Request::is($user . '/mcq-practice*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is($user . '/mcq-practice*') ? 'active' : '' }}" href="{{ route('super-admin.mcq-practice.index') }}">
					<i class="fas fa-question-circle"></i>
					<span data-key="t-ecommerce">MCQ Practice</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is($user . '/exams*') ? 'mm-active' : '' }}">
				<a href="javascript: void(0);" class="has-arrow">
					<i class="fa fa-cog"></i>
					<span data-key="t-ecommerce">Exams</span>
				</a>
				<ul class="sub-menu" aria-expanded="false">
					<li><a class="{{ Request::is($user . '/exams*') ? 'active' : '' }}" href="{{ route('super-admin.exams.index') }}" key="t-products">Exam Questions</a></li>
					<li><a href="{{ route('super-admin.clearCache') }}" key="t-products">Exam Results</a></li>
				</ul>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is($user . '/users*') ? 'mm-active' : '' }}">
				<a href="javascript: void(0);" class="has-arrow">
					<i data-feather="users"></i>
					<span data-key="t-ecommerce">Users</span>
				</a>
				<ul class="sub-menu" aria-expanded="false">
					<li><a href="{{ route('super-admin.roles.index') }}" key="t-products">Roles</a></li>
					<li><a href="{{ route('super-admin.permissions.index') }}" key="t-products">Permissions</a></li>
					<li><a class="{{ Request::is($user . '/users*') ? 'active' : '' }}" href="{{ route('super-admin.users.index') }}" key="t-products">All Users</a></li>
				</ul>
			</li>

			<hr class="m-0">




			<li>
				<a href="javascript: void(0);" class="has-arrow">
					<i class="fa fa-cog"></i>
					<span data-key="t-ecommerce">Settings</span>
				</a>
				<ul class="sub-menu" aria-expanded="false">
					<li><a href="ecommerce-products.html" key="t-products">General Setting</a></li>
					<li><a href="{{ route('super-admin.clearCache') }}" key="t-products">Cache Clear</a></li>
				</ul>
			</li>

			<hr class="m-0">

			<li>
				<a href="{{ route('super-admin.logout') }}">
					<i class="fas fa-sign-out-alt"></i>
					<span data-key="t-ecommerce">Logout</span>
				</a>
			</li>

	</div>
@else
	<div id="sidebar-menu">
		<!-- Left Menu Start -->
		<ul class="metismenu list-unstyled" id="side-menu">
			<li class="menu-title" data-key="t-menu">Menu</li>

			<li class="{{ Request::is('dashboard') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('user.dashboard') }}">
					<i data-feather="home"></i>
					<span data-key="t-dashboard">Dashboard</span>
				</a>
			</li>

			<li class="menu-title" data-key="t-apps">Apps</li>


			<li class="{{ Request::routeIs('user.practice.index') || Request::is('mcq-practice/success') ? 'mm-active' : '' }}">
				<a class="{{ Request::routeIs('user.practice.index') || Request::is('mcq-practice/success') ? 'active' : '' }}" href="{{ route('user.practice.index') }}">
					<i class="fas fa-question-circle"></i>
					<span data-key="t-ecommerce">MCQ Practice</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('mcq-practice/result*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('mcq-practice/result*') ? 'active' : '' }}" href="{{ route('user.practice.result') }}">
					<i class="fas fa-question-circle"></i>
					<span data-key="t-ecommerce">Practice Results</span>
				</a>
			</li>

			<hr class="m-0">



			<li class="{{ Request::is('exams*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('exams*') ? 'active' : '' }}" href="{{ route('user.exams.index') }}">
					<i class="fas fa-question-circle"></i>
					<span data-key="t-ecommerce">Exams</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('exams*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('exams*') ? 'active' : '' }}" href="{{ route('user.exams.index') }}">
					<i class="fas fa-question-circle"></i>
					<span data-key="t-ecommerce">Exam Results</span>
				</a>
			</li>


			<hr class="m-0">
			<li>
				<a href="{{ route('user.logout') }}">
					<i class="fas fa-sign-out-alt"></i>
					<span data-key="t-ecommerce">Logout</span>
				</a>
			</li>



	</div>
@endif
