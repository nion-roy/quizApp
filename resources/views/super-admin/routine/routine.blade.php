@extends('layouts.backend.app')

@section('title', 'Report with Class Routine')

@push('css')
	<style>
		@media print {



			.noPrint {
				display: none;
			}

			.card,
			.card-header,
			.card-body,
			table tr>th,
			table tr>td {
				background: none !important;
				box-shadow: none !important;
			}


			table {
				border-collapse: collapse !important;
				box-shadow: none !important;
			}

			table tr>th,
			table tr>td {
				border-color: #000 !important;
				box-shadow: none !important;
			}

			.card-header {
				box-shadow: none !important;
				border: none !important;
			}

		}
	</style>
@endpush

@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">Report with Class Routine !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('admin.class-routines.index') }}">All Routines</a></li>
						<li class="breadcrumb-item active">Report with Class Routine</li>
					</ol>
				</div>

			</div>
		</div>
	</div>
	<!-- end page title -->

	<div class="row">
		<div class="col-md-12">

			<div class="card">
				<div class="card-header">
					<div class="text-center">
						<h4>E-Learning & Earning Ltd.</h4>
						<span class="font-size-16 d-block mb-1">{{ $branchName->branch_name }} Branch</span>
						<span class="font-size-16">Department: {{ $departmentName->department_name }}</span>

						<span class="font-size-16">
							@if (isset($batchName->batch))
								- {{ $batchName->batch }}
							@endif

							@if (isset($labName->lab_name))
								- {{ $labName->lab_name }}
							@endif
						</span>
						<span class="font-size-16 d-block mt-1">Khaja IT Park, 2nd to 7th Floor, Kallyanpur Bus Stop, Mirpur Road, Dhaka-1207.</span>

						<div class="mt-3 noPrint">
							<a class="btn btn-danger waves-effect" href="{{ route('admin.class-routines.index') }}"><i class="fa fa-arrow-left me-2"></i>Back</a>
							<button class="btn btn-success waves-effect" onclick="window.print();"><i class="fa fa-print me-2"></i>Print Now</button>
						</div>

					</div>
				</div>

				<div class="card-body m-2">

					<table class="table table-bordered align-middle text-center">
						<thead>
							<tr>
								<th>Day / Times</th>
								@foreach (getTimeSchedules() as $timeSchedule)
									<th>{{ Carbon\Carbon::parse($timeSchedule->start_class)->format('h:i A') }} to {{ Carbon\Carbon::parse($timeSchedule->end_class)->format('h:i A') }}</th>
								@endforeach
							</tr>
						</thead>

						<tbody>
							@foreach (['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] as $day)
								<tr>
									<td>{{ $day }}</td>
									@foreach (getTimeSchedules() as $timeSchedule)
										@php
											$routine = $routines
											    ->where('day', $day)
											    ->where('time_schedule_id', $timeSchedule->id)
											    ->first();
										@endphp

										@if ($routine)
											<td>
												<span class="d-block">{{ $routine->lab->lab_name }}</span>
												<strong>{{ $routine->trainer->user->name }}</strong>
												<span class="d-block">{{ $routine->batch->batch }}</span>
											</td>
										@else
											<td>
												<span class="d-block">N/A</span>
											</td>
										@endif
									@endforeach
								</tr>
							@endforeach
						</tbody>
					</table>

				</div>
			</div>

		</div>
	</div>
	<!-- end row -->
@endsection
