@extends('layouts.backend.app')

@section('title', 'Dashboard')

@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">Welcome To Dashboard !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">Welcome !</li>
					</ol>
				</div>

			</div>
		</div>
	</div>
	<!-- end page title -->

	<div class="row">

		<div class="col-xl-3 col-md-6">
			<div class="card card-h-100">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="flex-grow-1">
							<h4 class="m-0"><span class="counter-value" data-target="{{ $branch }}">0</span></h4>
							<span class="text-muted mt-3 lh-1 d-block text-truncate">Total Branch</span>
						</div>
						<div class="flex-grow-1 text-end">
							<i class="far fa-bookmark fa-3x opacity-50"></i>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-xl-3 col-md-6">
			<div class="card card-h-100">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="flex-grow-1">
							<h4 class="m-0"><span class="counter-value" data-target="{{ $department }}">0</span></h4>
							<span class="text-muted mt-3 lh-1 d-block text-truncate">Total Departments</span>
						</div>
						<div class="flex-grow-1 text-end">
							<i class="fas fa-outdent fa-3x opacity-50"></i>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-xl-3 col-md-6">
			<div class="card card-h-100">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="flex-grow-1">
							<h4 class="m-0"><span class="counter-value" data-target="{{ $subject }}">0</span></h4>
							<span class="text-muted mt-3 lh-1 d-block text-truncate">Total Subjects</span>
						</div>
						<div class="flex-grow-1 text-end">
							<i class="far fa-address-book fa-3x opacity-50"></i>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-xl-3 col-md-6">
			<div class="card card-h-100">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="flex-grow-1">
							<h4 class="m-0"><span class="counter-value" data-target="{{ $lab }}">0</span></h4>
							<span class="text-muted mt-3 lh-1 d-block text-truncate">Total Labs</span>
						</div>
						<div class="flex-grow-1 text-end">
							<i class="fab fa-chromecast fa-3x opacity-50"></i>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-xl-3 col-md-6">
			<div class="card card-h-100">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="flex-grow-1">
							<h4 class="m-0"><span class="counter-value" data-target="{{ $batch }}">0</span></h4>
							<span class="text-muted mt-3 lh-1 d-block text-truncate">Total Batches</span>
						</div>
						<div class="flex-grow-1 text-end">
							<i class="fas fa-unlink fa-3x opacity-50"></i>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-xl-3 col-md-6">
			<div class="card card-h-100">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="flex-grow-1">
							<h4 class="m-0"><span class="counter-value" data-target="{{ $question }}">0</span></h4>
							<span class="text-muted mt-3 lh-1 d-block text-truncate">Total MCQ Questions</span>
						</div>
						<div class="flex-grow-1 text-end">
							<i class="far fa-question-circle fa-3x opacity-50"></i>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-xl-3 col-md-6">
			<div class="card card-h-100">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="flex-grow-1">
							<h4 class="m-0"><span class="counter-value" data-target="{{ $examQuestion }}">0</span></h4>
							<span class="text-muted mt-3 lh-1 d-block text-truncate">Total Exam Questions</span>
						</div>
						<div class="flex-grow-1 text-end">
							<i class="far fa-question-circle fa-3x opacity-50"></i>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-xl-3 col-md-6">
			<div class="card card-h-100">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="flex-grow-1">
							<h4 class="m-0"><span class="counter-value" data-target="{{ $student }}">0</span></h4>
							<span class="text-muted mt-3 lh-1 d-block text-truncate">Total Students</span>
						</div>
						<div class="flex-grow-1 text-end">
							<i class="fas fa-users fa-3x opacity-50"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6">
			<div class="card card-h-100">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="flex-grow-1">
							<h4 class="m-0"><span class="counter-value" data-target="{{ $teacher }}">0</span></h4>
							<span class="text-muted mt-3 lh-1 d-block text-truncate">Total Trainers</span>
						</div>
						<div class="flex-grow-1 text-end">
							<i class="fas fa-chalkboard-teacher fa-3x opacity-50"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6">
			<div class="card card-h-100">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="flex-grow-1">
							<h4 class="m-0"><span class="counter-value" data-target="{{ $teacher }}">0</span></h4>
							<span class="text-muted mt-3 lh-1 d-block text-truncate">Total Coordinators</span>
						</div>
						<div class="flex-grow-1 text-end">
							<i class="fas fa-chalkboard-teacher fa-3x opacity-50"></i>
						</div>
					</div>
				</div>
			</div>
		</div>




	</div><!-- end row-->

	<div class="row">
		<div class="col-lg-12 col-xl-7 col-xxl-8">
			<!-- card -->
			<div class="card">

				<div class="card-header">
					<h5 class="card-title m-0">Top 05 Students</h5>
				</div>

				<div class="card-body">
					@php
						// Define an array of students
						$students = [
						    [
						        'name' => 'Nion Chandra Roy',
						        'contact' => '01761115624',
						        'department' => 'CSE',
						        'marks' => '90',
						        'position' => '1st',
						    ],
						    [
						        'name' => 'Nion Chandra Roy',
						        'contact' => '01761115624',
						        'department' => 'CSE',
						        'marks' => '90',
						        'position' => '1st',
						    ],
						    [
						        'name' => 'Nion Chandra Roy',
						        'contact' => '01761115624',
						        'department' => 'CSE',
						        'marks' => '90',
						        'position' => '1st',
						    ],
						    [
						        'name' => 'Nion Chandra Roy',
						        'contact' => '01761115624',
						        'department' => 'CSE',
						        'marks' => '90',
						        'position' => '1st',
						    ],
						    [
						        'name' => 'Nion Chandra Roy',
						        'contact' => '01761115624',
						        'department' => 'CSE',
						        'marks' => '90',
						        'position' => '1st',
						    ],
						];
					@endphp

					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Contact</th>
								<th>Department</th>
								<th>Marks</th>
								<th>Position</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($students as $key => $student)
								<tr>
									<td>{{ $key + 1 }}</td>
									<td>{{ $student['name'] }}</td>
									<td>{{ $student['contact'] }}</td>
									<td>{{ $student['department'] }}</td>
									<td>{{ $student['marks'] }}</td>
									<td>{{ $student['position'] }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>



				</div>
				<!-- end card -->
			</div>
			<!-- end col -->
		</div>
		<!-- end row-->

		<div class="col-lg-12 col-xl-5 col-xxl-4">
			<div class="card">

				<div class="card-header">
					<h5 class="card-title m-0">Top 05 Teachers</h5>
				</div>


				<!-- card body -->
				<div class="card-body">

					@php
						// Define an array of teachers
						$teachers = [
						    [
						        'name' => 'Nion Chandra Roy',
						        'contact' => '01761115624',
						        'department' => 'CSE',
						    ],
						    [
						        'name' => 'Nion Chandra Roy',
						        'contact' => '01761115624',
						        'department' => 'CSE',
						    ],
						    [
						        'name' => 'Nion Chandra Roy',
						        'contact' => '01761115624',
						        'department' => 'CSE',
						    ],
						    [
						        'name' => 'Nion Chandra Roy',
						        'contact' => '01761115624',
						        'department' => 'CSE',
						    ],
						    [
						        'name' => 'Nion Chandra Roy',
						        'contact' => '01761115624',
						        'department' => 'CSE',
						    ],
						];
					@endphp

					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Contact</th>
								<th>Department</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($teachers as $key => $teacher)
								<tr>
									<td>{{ $key + 1 }}</td>
									<td>{{ $teacher['name'] }}</td>
									<td>{{ $teacher['contact'] }}</td>
									<td>{{ $teacher['department'] }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>



				</div>
				<!-- end card -->
			</div>
		</div>
		<!-- end col -->
	</div>
	<!-- end row-->

@endsection
