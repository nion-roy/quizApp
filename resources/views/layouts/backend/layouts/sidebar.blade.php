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

		{{-- <li class="{{ Request::is($user . '/subjects*') || Request::is($user . '/departments*') ? 'mm-active' : '' }}">
			<a href="javascript: void(0);" class="has-arrow">
				<i class="fa fa-cog"></i>
				<span data-key="t-ecommerce">Main Data</span>
			</a>
			<ul class="sub-menu" aria-expanded="false">
				<li><a class="{{ Request::is($user . '/subjects*') ? 'active' : '' }}" href="{{ route('super-admin.subjects.index') }}">Subject</a></li>
				<li><a class="{{ Request::is($user . '/departments*') ? 'active' : '' }}" href="{{ route('super-admin.departments.index') }}">Department</a></li>
			</ul>
		</li>

		<hr class="m-0"> --}}

		<li class="{{ Request::is($user . '/subjects*') ? 'mm-active' : '' }}">
			<a class="{{ Request::is($user . '/subjects*') ? 'mm-active' : '' }}" href="{{ route('super-admin.subjects.index') }}">
				<i class="fas fa-question-circle"></i>
				<span data-key="t-ecommerce">Subject</span>
			</a>
		</li>

		<hr class="m-0">

		<li class="{{ Request::is($user . '/departments*') ? 'mm-active' : '' }}">
			<a class="{{ Request::is($user . '/departments*') ? 'mm-active' : '' }}" href="{{ route('super-admin.departments.index') }}">
				<i class="fas fa-question-circle"></i>
				<span data-key="t-ecommerce">Department</span>
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


		<li>
			<a href="{{ route('super-admin.users.index') }}">
				<i class="fas fa-question-circle"></i>
				<span data-key="t-ecommerce">Exam Result</span>
			</a>
		</li>

		<hr class="m-0">

		<li class="{{ Request::is($user . '/users*') ? 'mm-active' : '' }}">
			<a class="{{ Request::is($user . '/users*') ? 'active' : '' }}" href="{{ route('super-admin.users.index') }}">
				<i class="fas fa-users"></i>
				<span data-key="t-ecommerce">Users</span>
			</a>
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


		{{-- <li>
			<a href="javascript: void(0);" class="has-arrow">
				<i data-feather="shopping-cart"></i>
				<span data-key="t-ecommerce">Users</span>
			</a>
			<ul class="sub-menu" aria-expanded="false">
				<li><a href="ecommerce-products.html" key="t-products">A</a></li>
			</ul>
		</li>

		<hr class="m-0"> --}}



</div>
