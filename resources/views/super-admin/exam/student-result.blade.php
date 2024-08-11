@extends('layouts.backend.app')

@section('title', 'Exam Results')

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

					<div class="d-flex align-items-center justify-content-between">
						<a href="{{ route('admin.exams.index') }}" class="btn btn-danger my-2"> <i class="fa fa-arrow-left me-2"></i>Back</a>
						<button type="button" class="btn btn-success my-2"> <i class="fa fa-print me-2" onclick="window.print()"></i>Print</button>
					</div>

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
								$key = 1;
							@endphp
							@foreach ($answers as $userId => $results)
								<tr>
									<td>{{ getStrPad($key++) }}</td>
									<td>{{ $results->first()->user->name }}</td>
									<td>{{ $results->first()->user->number ?? $results->first()->user->email }}</td>
									<td>{{ getStrPad($userCorrectCounts[$userId]) }}</td>
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


@push('js')
	<script>
		function printFun() {
			alert('ok')
		}
	</script>
@endpush
