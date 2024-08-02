@extends('layouts.backend.app')

@section('title', 'New Department Cerate')


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
					<h4 class="card-title m-0">Edit Department </h4>
				</div>
				<div class="card-body">
					<form action="{{ route('admin.departments.update', $department->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')

						@include('alert-message.alert-message')

						<div class="row justify-content-center">

							<div class="col-md-3">
								<div class="form-group mb-3">
									<label class="form-label" for="branch">Branch Name <span class="text-danger">*</span></label>
									<select name="branch" id="branch" class="form-select select2">
										<option disabled selected>-- Selected Branch --</option>
										@foreach ($branches as $branch)
											<option value="{{ $branch->id }}">{{ $branch->branch }}</option>
										@endforeach
									</select>
									@error('branch')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group mb-3">
									<label class="form-label" for="department_name">Department Name <span class="text-danger">*</span></label>
									<input type="text" name="department_name" class="form-control @error('department_name') is-invalid @enderror" id="department_name" placeholder="Enter department name" value="{{ old('department_name') ?? $department->department_name }}">
									@error('department_name')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group mb-3">
									<label class="form-label" for="status">Status<span class="text-danger">*</span></label>
									<select name="status" class="form-control form-select @error('status') is-invalid @enderror">
										<option disabled selected>-- Selected Status --</option>
										<option value="1" {{ $department->status == 1 ? 'selected' : '' }}>Active</option>
										<option value="2" {{ $department->status == 2 ? 'selected' : '' }}>Inactive</option>
									</select>
									@error('status')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-9 text-end">
								<div class="form-group">
									<a href="{{ route('admin.departments.index') }}" class="btn btn-danger waves-effect waves-light w-md"><i class="fa fa-arrow-left me-2"></i>Back Now</a>
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
