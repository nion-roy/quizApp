@extends('layouts.backend.app')

@section('title', 'Users')


@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">All Users !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">All Users</li>
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
						<h4 class="card-title">All Users <span class="btn btn-success">{{ getStrPad($users->count()) }}</span></h4>
						<a class="btn btn-success waves-effect waves-light" href="{{ route('super-admin.users.create') }}"><i class="fa fa-plus-circle me-2"></i> Add New User</a>
					</div>
				</div>
				<div class="card-body">
					<table id="datatable" class="table table-bordered dt-responsive nowrap w-100 align-middle">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Username</th>
								<th>Email</th>
								<th>Create Account</th>
								<th>Role</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>


						<tbody>
							@foreach ($users as $key => $user)
								<tr>
									<td>{{ getStrPad($key + 1) }}</td>
									<td>

										@if ($user->image == 'user.png' || $user->image == null)
											<img src="{{ asset('default/user.png') }}" alt="{{ $user->name }}" class="img-fluid rounded-circle img-thumbnail me-2" style="width: 40px; height: 40px;">
										@else
											<img src="{{ asset('storage/users/' . $user->image) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle img-thumbnail me-2" style="width: 40px; height: 40px;">
										@endif

										{{ $user->name }}

									</td>
									<td>{{ $user->username }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->created_at->format('d-M-Y') }}</td>
									<td> <span class="btn btn-success btn-sm">{{ $user->role }}</span> </td>
									<td>
										@if ($user->status == 1)
											<span class="btn btn-success btn-sm">Active</span>
										@elseif ($user->status == 2)
											<span class="btn btn-info btn-sm">Pending</span>
										@elseif ($user->status == 3)
											<span class="btn btn-warning btn-sm">Susspend</span>
										@elseif ($user->status == 4)
											<span class="btn btn-danger btn-sm">Blocked</span>
										@endif
									</td>

									<td>
										<div class="btn-group">
											<button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
											<div class="dropdown-menu" style="">
												<a href="{{ route('super-admin.users.edit', $user->id) }}" class="dropdown-item">Edit</a>
												<a href="" class="dropdown-item">View</a>

												<form action="{{ route('super-admin.users.destroy', $user->id) }}" method="POST">
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
	<!-- end row -->
@endsection
