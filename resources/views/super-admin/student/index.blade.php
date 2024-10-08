@extends('layouts.backend.app')

@section('title', 'Students')

@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">All Students !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">All Students</li>
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
						<h4 class="card-title">All Students <span class="btn btn-success">{{ getStrPad($students->count()) }}</span></h4>
						@can('create role')
							<a class="btn btn-success waves-effect waves-light" href="{{ route('admin.students.create') }}"><i class="fa fa-plus-circle me-2"></i> Add New Student</a>
						@endcan
					</div>
				</div>
				<div class="card-body">
					<table id="datatable" class="table table-bordered dt-responsive nowrap w-100 align-middle">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Email</th>
								<th>Father Name</th>
								<th>Mother Name</th>
								<th>Active</th>
								<th>Status</th>
								@if (Auth::user()->can('update user') || Auth::user()->can('delete user'))
									<th>Action</th>
								@endif
							</tr>
						</thead>


						<tbody>
							@foreach ($students as $key => $student)
								<tr>
									<td>{{ getStrPad($key + 1) }}</td>
									<td>

										<div class="user_info">
											@if ($student->image == 'user.png' || $student->image == null)
												<img src="{{ asset('default/user.png') }}" alt="{{ $student->name }}" class="img-fluid rounded-circle img-thumbnail me-2" style="width: 40px; height: 40px;">
											@else
												<img src="{{ asset('storage/students/' . $student->image) }}" alt="{{ $student->name }}" class="img-fluid rounded-circle img-thumbnail me-2" style="width: 40px; height: 40px;">
											@endif

											{{ $student->user->name }}
										</div>

									</td>
									<td>{{ $student->user->email }}</td>
									<td>{{ $student->father_name }}</td>
									<td>{{ $student->mother_name }}</td>
									<td>
										@if (Cache::has('user-is-online-' . $student->user->id))
											<span class="text-success fw-bold">Online</span>
										@else
											@if ($student->user->last_activity)
												{{ Carbon\Carbon::parse($student->user->last_activity)->diffForHumans() }}
											@else
												<span class="text-danger fw-bold">Offline</span>
											@endif
										@endif
									</td>

									<td>
										@if ($student->user->status == 1)
											<span class="btn btn-success btn-sm">Active</span>
										@elseif ($student->user->status == 2)
											<span class="btn btn-info btn-sm">Pending</span>
										@elseif ($student->user->status == 3)
											<span class="btn btn-warning btn-sm">Susspend</span>
										@elseif ($student->user->status == 4)
											<span class="btn btn-danger btn-sm">Blocked</span>
										@endif
									</td>

									@if (Auth::user()->can('update user') || Auth::user()->can('delete user'))
										<td width="5%">
											<div class="btn-group">
												<button type="button" class="btn btn-danger waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
												<div class="dropdown-menu" style="">
													<a href="{{ route('admin.students.edit', $student->id) }}" class="dropdown-item">Edit</a>
													<a href="{{ route('admin.students.edit', $student->id) }}" class="dropdown-item">View</a>
													<form action="{{ route('admin.students.destroy', $student->id) }}" method="POST">
														@csrf
														@method('DELETE')
														<button type="button" class="dropdown-item delete-button">Delete</button>
													</form>
												</div>
											</div>
										</td>
									@endif

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
