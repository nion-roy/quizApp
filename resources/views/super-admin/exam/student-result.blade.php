@extends('layouts.backend.app')

@section('title', 'New Question Cerate')

@push('css')
	<style>
		#questions:last-child {
			margin: 0 !important;
		}

		.correct_answer {
			background: rgba(25, 135, 84, .05) !important;
			border-color: rgba(25, 135, 84, .4) !important;
		}

		.wrong_answer {
			background: rgba(255, 0, 0, .05) !important;
			border-color: rgba(255, 0, 0, .4) !important;
		}
	</style>
@endpush

@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">Exam Result !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">Exam Result</li>
					</ol>
				</div>

			</div>
		</div>
	</div>
	<!-- end page title -->

	<div class="row">
		<div class="col-12">


			<div class="card">
				<div class="card-header text-center">
					<h4>E-Learning & Earning Ltd.</h4>
					<h5>Department of {{ $exam->department->department_name }}</h5>
					<h5>{{ $exam->exam_name }}</h5>
					<h5>Course Title: {{ $exam->subject->subject_name }}</h5>
				</div>


				<div class="card-body">

					<table class="table table-striped table-bordered align-middle">
						<thead>
							<tr>
								<th width="5%">#</th>
								<th>Name</th>
								<th>Contact</th>
								<th>Mark</th>
							</tr>
						</thead>


						<tbody>

							@php
								$a = 1;
							@endphp
							@foreach ($results as $result)
								<tr>
									<td>{{ $a++ }}</td> 
									<td>{{ $a++ }}</td> 
									<td>{{ $a++ }}</td> 
									<td>{{ $a++ }}</td> 
								</tr>
							@endforeach


						</tbody>
					</table>



				</div>
			</div>

		</div>
		<!-- end col -->
	</div>
	<!-- end row -->
@endsection
