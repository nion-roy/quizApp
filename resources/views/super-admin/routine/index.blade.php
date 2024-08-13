@extends('layouts.backend.app')

@section('title', 'Routines')


@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">All Routines !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">All Routines</li>
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
						<h4 class="card-title">All Routines <span class="btn btn-success">{{ getStrPad($routines->count()) }}</span></h4>
						<a class="btn btn-success waves-effect waves-light" href="{{ route('admin.class-routines.create') }}"><i class="fa fa-plus-circle me-2"></i> Add New Routine</a>
					</div>
				</div>
				<div class="card-body">
					<table id="datatable" class="table table-bordered dt-responsive nowrap w-100 align-middle">
						<thead>
							<tr>
								<th>#</th>
								<th>Branch</th>
								<th>Department</th>
								<th>Batch</th>
								<th>Lab Room</th>
								<th>Trainer</th>
								<th>Day</th>
								<th>Time Schedule</th>
								<th>Action</th>
							</tr>
						</thead>


						<tbody>
							@foreach ($routines as $key => $routine)
								<tr>
									<td>{{ getStrPad($key + 1) }}</td>
									<td>{{ $routine->branch->branch_name }}</td>
									<td>{{ $routine->department->department_name }}</td>
									<td>{{ $routine->batch->batch }}</td>
									<td>{{ $routine->lab->lab_name }}</td>
									<td>{{ $routine->trainer->user->name }}</td>
									<td>{{ $routine->day }}</td>
									<td>{{ Carbon\Carbon::parse($routine->timeSchedule->start_class)->format('h:i A') }} - {{ Carbon\Carbon::parse($routine->timeSchedule->end_class)->format('h:i A') }}</td>

									<td width="5%">
										<div class="btn-group">
											<button type="button" class="btn btn-danger waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
											<div class="dropdown-menu" style="">
												<a href="{{ route('admin.class-routines.edit', $routine->id) }}" class="dropdown-item">Edit</a>
												<form action="{{ route('admin.class-routines.destroy', $routine->id) }}" method="POST">
													@csrf
													@method('DELETE')
													<button type="button" class="dropdown-item delete-button">Delete</button>
												</form>
											</div>
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
@endsection
