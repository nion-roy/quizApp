@if (!Auth::user()->hasRole('user'))
	<div id="sidebar-menu">
		<!-- Left Menu Start -->
		<ul class="metismenu list-unstyled" id="side-menu">
			<li class="menu-title" data-key="t-menu">Menu</li>

			<li class="{{ Request::is('admin/dashboard') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
					<i data-feather="home"></i>
					<span data-key="t-dashboard">Dashboard</span>
				</a>
			</li>

			<li class="menu-title" data-key="t-apps">Apps</li>

			<li class="{{ Request::is('admin/branches*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('admin/branches*') ? 'mm-active' : '' }}" href="{{ route('admin.branches.index') }}">
					<i class="far fa-bookmark"></i>
					<span data-key="t-ecommerce">Branch</span>
				</a>
			</li>

			<hr class="m-0">

			@can('view department')
				<li class="{{ Request::is('admin/departments*') ? 'mm-active' : '' }}">
					<a class="{{ Request::is('admin/departments*') ? 'mm-active' : '' }}" href="{{ route('admin.departments.index') }}">
						<i class="fas fa-outdent"></i>
						<span data-key="t-ecommerce">Department</span>
					</a>
				</li>

				<hr class="m-0">
			@endcan

			{{-- @can('view subject')
				<li class="{{ Request::is('admin/subjects*') ? 'mm-active' : '' }}">
					<a class="{{ Request::is('admin/subjects*') ? 'mm-active' : '' }}" href="{{ route('admin.subjects.index') }}">
						<i class="far fa-bookmark"></i>
						<span data-key="t-ecommerce">Subject</span>
					</a>
				</li>

				<hr class="m-0">
			@endcan --}}

			<li class="{{ Request::is('admin/batches*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('admin/batches*') ? 'mm-active' : '' }}" href="{{ route('admin.batches.index') }}">
					<i class="far fa-bookmark"></i>
					<span data-key="t-ecommerce">Batch</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('admin/labs*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('admin/labs*') ? 'mm-active' : '' }}" href="{{ route('admin.labs.index') }}">
					<i class="far fa-bookmark"></i>
					<span data-key="t-ecommerce">Lab Room</span>
				</a>
			</li>

			<hr class="m-0">


			<li class="{{ Request::is('admin/routines*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('admin/routines*') ? 'mm-active' : '' }}" href="{{ route('admin.routines.index') }}">
					<i class="far fa-bookmark"></i>
					<span data-key="t-ecommerce">Class Routine</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('admin/labs*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('admin/labs*') ? 'mm-active' : '' }}" href="{{ route('admin.labs.index') }}">
					<i class="far fa-bookmark"></i>
					<span data-key="t-ecommerce">Present</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('admin/subjects*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('admin/subjects*') ? 'mm-active' : '' }}" href="{{ route('admin.subjects.index') }}">
					<i class="far fa-bookmark"></i>
					<span data-key="t-ecommerce">Students</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('admin/subjects*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('admin/subjects*') ? 'mm-active' : '' }}" href="{{ route('admin.subjects.index') }}">
					<i class="far fa-bookmark"></i>
					<span data-key="t-ecommerce">Teachers</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('admin/questions*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('admin/questions*') ? 'mm-active' : '' }}" href="{{ route('admin.questions.index') }}">
					<i class="far fa-question-circle"></i>
					<span data-key="t-ecommerce">Question Bank</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('admin/exams*') ? 'mm-active' : '' }}">
				<a href="javascript: void(0);" class="has-arrow">
					<i class="far fa-clone"></i>
					<span data-key="t-ecommerce">Exams</span>
				</a>
				<ul class="sub-menu" aria-expanded="false">
					<li><a class="{{ Request::is('admin/exams*') ? 'active' : '' }}" href="{{ route('admin.exams.index') }}" key="t-products">Exam Questions</a></li>
					<li><a href="{{ route('clearCache') }}" key="t-products">Exam Results</a></li>
				</ul>
			</li>

			<hr class="m-0">

			@if (Auth::user()->can('view role') || Auth::user()->can('view permission') || Auth::user()->can('view user'))
				<li class="{{ Request::is('admin/roles*') || Request::is('admin/permissions*') || Request::is('admin/users*') ? 'mm-active' : '' }}">
					<a href="javascript: void(0);" class="has-arrow">
						<i data-feather="users"></i>
						<span data-key="t-ecommerce">Users</span>
					</a>
					<ul class="sub-menu" aria-expanded="false">
						@can('view role')
							<li><a class="{{ Request::is('admin/roles*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}" key="t-products">Roles</a></li>
						@endcan
						@can('view permission')
							<li><a class="{{ Request::is('admin/permissions*') ? 'active' : '' }}" href="{{ route('admin.permissions.index') }}" key="t-products">Permissions</a></li>
						@endcan
						@can('view user')
							<li><a class="{{ Request::is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}" key="t-products">All Users</a></li>
						@endcan
					</ul>
				</li>

				<hr class="m-0">
			@endif

			<li>
				<a href="javascript: void(0);" class="has-arrow">
					<i class="fa fa-cog"></i>
					<span data-key="t-ecommerce">Review</span>
				</a>
				<ul class="sub-menu" aria-expanded="false">
					<li><a href="ecommerce-products.html" key="t-products">Company</a></li>
					<li><a href="ecommerce-products.html" key="t-products">Teacher</a></li>
				</ul>
			</li>

			<li>
				<a href="javascript: void(0);" class="has-arrow">
					<i class="fa fa-cog"></i>
					<span data-key="t-ecommerce">Settings</span>
				</a>
				<ul class="sub-menu" aria-expanded="false">
					<li><a href="ecommerce-products.html" key="t-products">General Setting</a></li>
				</ul>
			</li>

			<hr class="m-0">

			@can('clear cache')
				<li>
					<a href="{{ route('clearCache') }}">
						<i class="fab fa-digital-ocean"></i>
						<span data-key="t-ecommerce">Cache Clear</span>
					</a>
				</li>
				<hr class="m-0">
			@endcan

			<li>
				<a href="{{ route('admin.logout') }}">
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


			<li class="{{ Request::is('exams*') || Request::is('exam-question*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('exams*') || Request::is('exam-question*') ? 'active' : '' }}" href="{{ route('user.exams.index') }}">
					<i class="fas fa-question-circle"></i>
					<span data-key="t-ecommerce">Exam</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('exam-expired*') || Request::is('exam-result*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('exam-expired*') || Request::is('exam-result*') ? 'active' : '' }}" href="{{ route('user.exams.expired') }}">
					<i class="fas fa-question-circle"></i>
					<span data-key="t-ecommerce">Exams Expired</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('user/teacher-review*') ? 'mm-active' : '' }}">
				<a href="javascript: void(0);" class="has-arrow">
					<i class="far fa-clone"></i>
					<span data-key="t-ecommerce">Review</span>
				</a>
				<ul class="sub-menu" aria-expanded="false">
					<li><a class="{{ Request::is('user/teacher-review*') ? 'active' : '' }}" href="{{ route('user.teachers.review.index') }}" key="t-products">Teachers</a></li>
					<li><a href="{{ route('clearCache') }}" key="t-products">Company</a></li>
				</ul>
			</li>

			<hr class="m-0">

			@can('clear cache')
				<li>
					<a href="{{ route('clearCache') }}">
						<i class="fab fa-digital-ocean"></i>
						<span data-key="t-ecommerce">Cache Clear</span>
					</a>
				</li>
				<hr class="m-0">
			@endcan

			<li>
				<a href="{{ route('user.logout') }}">
					<i class="fas fa-sign-out-alt"></i>
					<span data-key="t-ecommerce">Logout</span>
				</a>
			</li>



	</div>
@endif
