@extends('layouts.backend.app')

@section('title', 'Departments')


@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">All Departments !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">All Departments</li>
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
						<h4 class="card-title">All Departments <span class="btn btn-success">{{ getStrPad($departments->count()) }}</span></h4>
						<a class="btn btn-success waves-effect waves-light" href="{{ route('super-admin.departments.create') }}"><i class="fa fa-plus-circle me-2"></i> Add New Department</a>
					</div>
				</div>
				<div class="card-body">
					<table id="datatable" class="table table-bordered dt-responsive nowrap w-100 align-middle">
						<thead>
							<tr>
								<th>#</th>
								<th>Department Name</th>
								<th>Count</th>
								<th>Creation User</th>
								<th>Created</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>


						<tbody>
							@foreach ($departments as $key => $department)
								<tr>
									<td>{{ getStrPad($key + 1) }}</td>
									<td>{{ $department->department_name }}</td>
									<td>00</td>
									<td>{{ $department->user->name }}</td>
									<td>{{ $department->created_at->format('d-M-Y') }}</td>
									<td>
										@if ($department->status == 1)
											<span class="btn btn-soft-success btn-sm"><i class="fas fa-check"></i></span>
										@else
											<span class="btn btn-soft-danger btn-sm"><i class="fas fa-times"></i></span>
										@endif
									</td>

									<td>
										<div class="d-flex align-items-center gap-1">
											<a href="{{ route('super-admin.departments.edit', $department->id) }}" class="btn btn-success"><i class="fa fa-edit "></i></a>
											<form action="{{ route('super-admin.departments.destroy', $department->id) }}" method="POST">
												@csrf
												@method('DELETE')
												<button type="button" class="btn btn-danger delete-button"><i class="fa fa-trash "></i></button>
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
