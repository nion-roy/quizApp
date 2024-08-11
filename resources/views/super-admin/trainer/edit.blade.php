@extends('layouts.backend.app')

@section('title', 'Edit Trainer Informations')


@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">Edit Trainer Informations !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('admin.trainers.index') }}">All Trainer</a></li>
						<li class="breadcrumb-item active">Edit Trainer Informations</li>
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
					<form action="{{ route('admin.trainers.update', $trainer->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')

						@include('alert-message.alert-message')

						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="branch">Branch Name <span class="text-danger">*</span></label>
									<select name="branch" id="branch" class="form-select select2">
										<option disabled selected>-- Selected Branch --</option>
										@foreach (getBranches() as $branch)
											<option value="{{ $branch->id }}" {{ $trainer->user->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->branch_name }}</option>
										@endforeach
									</select>
									@error('branch')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="name">Full Name <span class="text-danger">*</span></label>
									<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter full name" value="{{ old('name') ?? $trainer->user->name }}">
									@error('name')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="designation">Designation <span class="text-danger">*</span></label>
									<input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" id="designation" placeholder="Enter designation" value="{{ old('designation') ?? $trainer->designation }}">
									@error('designation')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="email">Email<span class="text-danger">*</span></label>
									<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" value="{{ old('email') ?? $trainer->user->email }}">
									@error('email')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="short_description">Short Description <span class="text-danger">*</span></label>
									<textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" id="short_description" cols="30" rows="4" placeholder="Enter short description...">{{ old('short_description') ?? $trainer->sort_description }}</textarea>
									@error('short_description')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="marketplace">Earning / Marketplace <span class="text-danger">*</span></label>
									<textarea name="marketplace" class="form-control @error('marketplace') is-invalid @enderror" id="marketplace" cols="30" rows="4" placeholder="Enter earning or marketplace...">{{ old('marketplace') ?? $trainer->marketplace }}</textarea>
									@error('marketplace')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-12">
								<div class="form-group mb-3">
									<label class="form-label" for="about">About Trainer <span class="text-danger">*</span></label>
									<textarea name="about" class="form-control @error('about') is-invalid @enderror" id="about" cols="30" rows="4" placeholder="Enter about trainer...">{{ old('about') ?? $trainer->about }}</textarea>
									@error('about')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="freelancing_1">Freelancing Link 01 <span class="text-danger">*</span></label>
									<input type="text" name="freelancing_1" class="form-control @error('freelancing_1') is-invalid @enderror" id="freelancing_1" placeholder="Enter freelancing link 01" value="{{ old('freelancing_1') ?? $trainer->freelancing_1 }}">
									@error('freelancing_1')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="freelancing_2">Freelancing Link 02 <span class="text-danger">*</span></label>
									<input type="text" name="freelancing_2" class="form-control @error('freelancing_2') is-invalid @enderror" id="freelancing_2" placeholder="Enter freelancing link 01" value="{{ old('freelancing_2') ?? $trainer->freelancing_2 }}">
									@error('freelancing_2')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="freelancing_3">Freelancing Link 03 <span class="text-danger">*</span></label>
									<input type="text" name="freelancing_3" class="form-control @error('freelancing_3') is-invalid @enderror" id="freelancing_3" placeholder="Enter freelancing link 01" value="{{ old('freelancing_3') ?? $trainer->freelancing_3 }}">
									@error('freelancing_3')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-12">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group mb-3">
											<label class="form-label" for="role">Role<span class="text-danger">*</span></label>
											<select name="role" class="form-control form-select @error('role') is-invalid @enderror" id="role">
												<option disabled selected>-- Selected Role --</option>
												@foreach (getRoles() as $role)
													@if ($role->name === 'teacher')
														<option value="{{ $role->id }}" selected>{{ $role->name }}</option>
													@endif
												@endforeach

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
												<option value="1" {{ $trainer->user->status == 1 ? 'selected' : '' }}>Active</option>
												<option value="2" {{ $trainer->user->status == 2 ? 'selected' : '' }}>Pending</option>
												<option value="3" {{ $trainer->user->status == 3 ? 'selected' : '' }}>Suspend</option>
												<option value="4" {{ $trainer->user->status == 4 ? 'selected' : '' }}>Blocked</option>
											</select>
											@error('status')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>
							</div>

							<div class="form-group mb-3">
								<label class="form-label" for="image">User Image</label> <br>
								<div id="imagePreviewContainer"></div>
								<input type="file" name="image" class="@error('image') is-invalid @enderror" id="imageInput">
								@error('image')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>

							<div class="form-group">
								<a href="{{ route('admin.trainers.index') }}" class="btn btn-danger waves-effect waves-light w-md"><i class="fa fa-arrow-left me-2"></i>Back Now</a>
								<button type="submit" class="btn btn-primary waves-effect waves-light w-md"><i class="fas fa-upload me-2"></i>Update Now</button>
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
