@extends('layouts.backend.app')

@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">Dashboard</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboards</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>

			</div>
		</div>
	</div>
	<!-- end page title -->



	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">


					<div class="d-flex align-items-center justify-content-between mb-3">
						<h4>User Permissions & Permissions</h4>
						<a href="{{ route('super-admin.permissions.create') }}" class="btn btn-success waves-effect"><i class="fas fa-plus-circle me-2"></i>Add New Permission</a>
					</div>


					@include('alert-message.alert-message')

					<table id="datatable" class="table border table-striped align-middle w-100">
						<thead>
							<tr>
								<th>SL</th>
								<th>Permission Name</th>
								<th>Guard Name</th>
								<th>Create Date</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							@foreach ($permissions as $key => $permission)
								<tr>
									<td>{{ getStrPad($key + 1) }}</td>
									<td>{{ $permission->name }}</td>
									<td>{{ $permission->guard_name }}</td>
									<td>{{ $permission->created_at->format('d-M-Y h:i A') }}</td>

									<td class="d-flex align-items-center gap-2">
										<a href="{{ route('super-admin.permissions.edit', $permission->id) }}" class="btn btn-success btn-sm fa-1x waves-effect"><i class="fas fa-edit"></i></a>
										<form action="{{ route('super-admin.permissions.destroy', $permission->id) }}" method="post">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger btn-sm fa-1x waves-effect"><i class="fas fa-trash"></i></button>
										</form>
									</td>

								</tr>
							@endforeach
						</tbody>

					</table>

				</div>
			</div>
		</div> <!-- end col -->
	</div>
@endsection
