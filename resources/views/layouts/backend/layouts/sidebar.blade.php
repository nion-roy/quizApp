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
				<a class="{{ Request::is('admin/branches*') ? 'active' : '' }}" href="{{ route('admin.branches.index') }}">
					<i class="far fa-bookmark"></i>
					<span>Branch</span>
				</a>
			</li>

			<hr class="m-0">

			@can('view department')
				<li class="{{ Request::is('admin/departments*') ? 'mm-active' : '' }}">
					<a class="{{ Request::is('admin/departments*') ? 'active' : '' }}" href="{{ route('admin.departments.index') }}">
						<i class="fas fa-outdent"></i>
						<span>Department</span>
					</a>
				</li>

				<hr class="m-0">
			@endcan

			@can('view subject')
				<li class="{{ Request::is('admin/subjects*') ? 'mm-active' : '' }}">
					<a class="{{ Request::is('admin/subjects*') ? 'active' : '' }}" href="{{ route('admin.subjects.index') }}">
						<i class="far fa-address-book"></i>
						<span>Subject</span>
					</a>
				</li>

				<hr class="m-0">
			@endcan

			<li class="{{ Request::is('admin/batches*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('admin/batches*') ? 'active' : '' }}" href="{{ route('admin.batches.index') }}">
					<i class="fas fa-unlink"></i>
					<span>Batch</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('admin/labs*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('admin/labs*') ? 'active' : '' }}" href="{{ route('admin.labs.index') }}">
					<i class="fab fa-chromecast"></i>
					<span>Lab Room</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('admin/class-routines*') || Request::is('admin/time-schedules*') ? 'mm-active' : '' }}">
				<a href="javascript: void(0);" class="has-arrow {{ Request::is('admin/class-routines*') || Request::is('admin/time-schedules*') ? 'active' : '' }}">
					<i class="fas fa-tasks"></i>
					<span>Class Routines</span>
				</a>
				<ul class="sub-menu" aria-expanded="false">
					<li><a class="{{ Request::is('admin/class-routines*') ? 'active' : '' }}" href="{{ route('admin.class-routines.index') }}">Class Routines</a></li>
					<li><a class="{{ Request::is('admin/time-schedules*') ? 'active' : '' }}" href="{{ route('admin.time-schedules.index') }}">Time Schedules</a></li>
				</ul>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('admin/attendances*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('admin/attendances*') ? 'active' : '' }}" href="{{ route('admin.attendances.index') }}">
					<i class="far fa-newspaper"></i>
					<span>Attendance</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('admin/students*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('admin/students*') ? 'active' : '' }}" href="{{ route('admin.students.index') }}">
					<i class="fas fa-user-graduate"></i>
					<span>Students</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('admin/trainers*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('admin/trainers*') ? 'active' : '' }}" href="{{ route('admin.trainers.index') }}">
					<i class="fas fa-chalkboard-teacher"></i>
					<span>Trainer</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('admin/questions*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('admin/questions*') ? 'active' : '' }}" href="{{ route('admin.questions.index') }}">
					<i class="far fa-question-circle"></i>
					<span>Question Bank</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('admin/exams*') || Request::is('admin/exam-results*') ? 'mm-active' : '' }}">
				<a href="javascript: void(0);" class="has-arrow {{ Request::is('admin/exams*') || Request::is('admin/exam-results*') ? 'active' : '' }}">
					<i class="far fa-clone"></i>
					<span>Exams</span>
				</a>
				<ul class="sub-menu" aria-expanded="false">
					<li><a class="{{ Request::is('admin/exams*') || Request::is('admin/exam-results*') ? 'active' : '' }}" href="{{ route('admin.exams.index') }}">Exam Questions</a></li>
					<li><a href="{{ route('clearCache') }}">Exam Results</a></li>
				</ul>
			</li>

			<hr class="m-0">

			@if (Auth::user()->can('view role') || Auth::user()->can('view permission') || Auth::user()->can('view user'))
				<li class="{{ Request::is('admin/roles*') || Request::is('admin/permissions*') || Request::is('admin/users*') ? 'mm-active' : '' }}">
					<a href="javascript: void(0);" class="has-arrow">
						<i data-feather="users"></i>
						<span>Users</span>
					</a>
					<ul class="sub-menu" aria-expanded="false">
						@can('view role')
							<li><a class="{{ Request::is('admin/roles*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">Roles</a></li>
						@endcan
						@can('view permission')
							<li><a class="{{ Request::is('admin/permissions*') ? 'active' : '' }}" href="{{ route('admin.permissions.index') }}">Permissions</a></li>
						@endcan
						@can('view user')
							<li><a class="{{ Request::is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">All Users</a></li>
						@endcan
					</ul>
				</li>

				<hr class="m-0">
			@endif

			<li>
				<a href="javascript: void(0);" class="has-arrow">
					<i class="fas fa-share-alt"></i>
					<span>Review</span>
				</a>
				<ul class="sub-menu" aria-expanded="false">
					<li><a href="ecommerce-products.html">Company</a></li>
					<li><a href="ecommerce-products.html">Teacher</a></li>
				</ul>
			</li>

			<li>
				<a href="javascript: void(0);" class="has-arrow">
					<i class="fa fa-cog"></i>
					<span>Settings</span>
				</a>
				<ul class="sub-menu" aria-expanded="false">
					<li><a href="ecommerce-products.html">General Setting</a></li>
				</ul>
			</li>

			<hr class="m-0">

			@can('clear cache')
				<li>
					<a href="{{ route('clearCache') }}">
						<i class="fab fa-digital-ocean"></i>
						<span>Cache Clear</span>
					</a>
				</li>
				<hr class="m-0">
			@endcan

			<li>
				<a href="{{ route('admin.logout') }}">
					<i class="fas fa-sign-out-alt"></i>
					<span>Logout</span>
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
					<span>MCQ Practice</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('mcq-practice/result*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('mcq-practice/result*') ? 'active' : '' }}" href="{{ route('user.practice.result') }}">
					<i class="fas fa-question-circle"></i>
					<span>Practice Results</span>
				</a>
			</li>

			<hr class="m-0">


			<li class="{{ Request::is('exams*') || Request::is('exam-question*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('exams*') || Request::is('exam-question*') ? 'active' : '' }}" href="{{ route('user.exams.index') }}">
					<i class="fas fa-question-circle"></i>
					<span>Exam</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('exam-expired*') || Request::is('exam-result*') ? 'mm-active' : '' }}">
				<a class="{{ Request::is('exam-expired*') || Request::is('exam-result*') ? 'active' : '' }}" href="{{ route('user.exams.expired') }}">
					<i class="fas fa-question-circle"></i>
					<span>Exams Expired</span>
				</a>
			</li>

			<hr class="m-0">

			<li class="{{ Request::is('user/teacher-review*') ? 'mm-active' : '' }}">
				<a href="javascript: void(0);" class="has-arrow">
					<i class="far fa-clone"></i>
					<span>Review</span>
				</a>
				<ul class="sub-menu" aria-expanded="false">
					<li><a class="{{ Request::is('user/teacher-review*') ? 'active' : '' }}" href="{{ route('user.teachers.review.index') }}">Teachers</a></li>
					<li><a href="{{ route('clearCache') }}">Company</a></li>
				</ul>
			</li>

			<hr class="m-0">

			@can('clear cache')
				<li>
					<a href="{{ route('clearCache') }}">
						<i class="fab fa-digital-ocean"></i>
						<span>Cache Clear</span>
					</a>
				</li>
				<hr class="m-0">
			@endcan

			<li>
				<a href="{{ route('user.logout') }}">
					<i class="fas fa-sign-out-alt"></i>
					<span>Logout</span>
				</a>
			</li>



	</div>
@endif
