@extends('layouts.backend.app')

@section('title', 'Time Schedules')


@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">All Time Schedules !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">All Time Schedules</li>
					</ol>
				</div>

			</div>
		</div>
	</div>
	<!-- end page title -->

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center justify-content-between">
						<h4 class="card-title">All Time Schedules <span class="btn btn-success">{{ getStrPad($timeSchedules->count()) }}</span></h4>
						@can('create lab')
							<a class="btn btn-success waves-effect waves-light" href="{{ route('admin.time-schedules.create') }}"><i class="fa fa-plus-circle me-2"></i> Add New Schedules</a>
						@endcan
					</div>
				</div>
				<div class="card-body">
					<table id="datatable" class="table table-bordered dt-responsive nowrap w-100 align-middle">
						<thead>
							<tr>
								<th>#</th>
								<th>Start Class</th>
								<th>End Class</th>
								<th>Creation</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>


						<tbody>
							@foreach ($timeSchedules as $key => $timeSchedule)
								<tr>
									<td>{{ getStrPad($key + 1) }}</td>
									<td>{{ Carbon\Carbon::parse($timeSchedule->start_class)->format('h:i A') }}</td>
									<td>{{ Carbon\Carbon::parse($timeSchedule->end_class)->format('h:i A') }}</td>
									<td>{{ $timeSchedule->user->name }}</td>
									<td>
										@if ($timeSchedule->status == 1)
											<span class="text-success font-size-18"><i class="fas fa-check-square"></i></span>
										@else
											<span class="text-danger font-size-18"><i class="fas fa-window-close"></i></span>
										@endif
									</td>

									<td>
										<div class="d-flex align-items-center gap-1">
											<a href="{{ route('admin.time-schedules.edit', $timeSchedule->id) }}" class="btn btn-success font-size-15 btn-sm"><i class="fa fa-edit "></i></a>

											<form action="{{ route('admin.time-schedules.destroy', $timeSchedule->id) }}" method="POST">
												@csrf
												@method('DELETE')
												<button type="button" class="btn btn-danger font-size-15 btn-sm delete-button"><i class="fa fa-trash"></i></button>
											</form>

										</div>
									</td>

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
