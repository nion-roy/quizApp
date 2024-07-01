@extends('layouts.backend.app')

@section('title', 'New User Cerate')


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
					<h4 class="card-title m-0">New User Create </h4>
				</div>
				<div class="card-body">
					<form action="{{ route('super-admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')

						@include('alert-message.alert-message')

						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="name">Full Name <span class="text-danger">*</span></label>
									<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter full name" value="{{ old('name') ?? $user->name }}">
									@error('name')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group mb-3">
									<label class="form-label" for="username">Username<span class="text-danger">*</span></label>
									<input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Enter username" value="{{ old('username') ?? $user->username }}">
									@error('username')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group mb-3">
											<label class="form-label" for="email">Email<span class="text-danger">*</span></label>
											<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" value="{{ old('email') ?? $user->email }}">
											@error('email')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group mb-3">
											<label class="form-label" for="password">Password<span class="text-danger">*</span></label>
											<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter password" value="12345678">
											@error('password')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group mb-3">
											<label class="form-label" for="role">Role<span class="text-danger">*</span></label>
											<select name="role" class="form-control form-select @error('role') is-invalid @enderror" id="role">
												<option disabled selected>-- Selected Role --</option>
												<option value="super-admin" {{ $user->role == 'super-admin' ? 'selected' : '' }}>Super Admin</option>
												<option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
												<option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
											</select>
											@error('role')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group mb-3">
											<label class="form-label" for="status">Status<span class="text-danger">*</span></label>
											<select name="status" class="form-control form-select @error('status') is-invalid @enderror">
												<option disabled selected>-- Selected Status --</option>
												<option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
												<option value="2" {{ $user->status == 2 ? 'selected' : '' }}>Pending</option>
												<option value="3" {{ $user->status == 3 ? 'selected' : '' }}>Suspend</option>
												<option value="4" {{ $user->status == 4 ? 'selected' : '' }}>Blocked</option>
											</select>
											@error('status')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>


								<div class="form-group mb-3">
									<label class="form-label" for="image">User Image</label> <br>
									<div id="imagePreviewContainer">
										@if ($user->image == 'user.png' || $user->image == null)
											<img src="{{ asset('default/user.png') }}" alt="{{ $user->name }}" class="border rounded p-2" style="width: 60px; height: 60px ; margin: 10px 0;">
										@else
											<img src="{{ asset('storage/users/' . $user->image) }}" alt="{{ $user->name }}" class="border rounded p-2" style="width: 60px; height: 60px ; margin: 10px 0;">
										@endif
									</div>
									<input type="file" name="image" class="@error('image') is-invalid @enderror" id="imageInput">
									@error('image')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<a href="{{ route('super-admin.users.index') }}" class="btn btn-danger waves-effect waves-light w-md"><i class="fa fa-arrow-left me-2"></i>Back Now</a>
									<button type="submit" class="btn btn-primary waves-effect waves-light w-md"><i class="fas fa-upload me-2"></i>Update Now</button>
								</div>

							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
		<!-- end col -->
	</div>
	<!-- end row -->
@endsection
