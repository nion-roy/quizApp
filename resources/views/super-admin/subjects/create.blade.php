@extends('layouts.backend.app')

@section('title', 'New Subject Cerate')


@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">All Subjects !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">All Subjects</li>
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
					<h4 class="card-title m-0">New Subject Create </h4>
				</div>
				<div class="card-body">
					<form action="{{ route('super-admin.subjects.store') }}" method="POST" enctype="multipart/form-data">
						@csrf

						@include('alert-message.alert-message')

						<div class="row justify-content-center">
							<div class="col-md-4">
								<div class="form-group mb-3">
									<label class="form-label" for="deparment_id">Department <span class="text-danger">*</span></label>
									<select name="department_id" id="department_id" class="form-control form-select  @error('department_id') is-invalid @enderror">
										<option disabled selected>-- Selected Department --</option>
										@foreach ($departments as $department)
											<option value="{{ $department->id }}">{{ $department->department_name }}</option>
										@endforeach
									</select>
									@error('department_id')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group mb-3">
									<label class="form-label" for="subject_name">Subject Name <span class="text-danger">*</span></label>
									<input type="text" name="subject_name" class="form-control @error('subject_name') is-invalid @enderror" id="subject_name" placeholder="Enter subject name" value="{{ old('subject_name') }}">
									@error('subject_name')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group mb-3">
									<label class="form-label" for="status">Status<span class="text-danger">*</span></label>
									<select name="status" class="form-control form-select @error('status') is-invalid @enderror">
										<option disabled selected>-- Selected Status --</option>
										<option value="1">Active</option>
										<option value="2">Inactive</option>
									</select>
									@error('status')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 text-end">
								<div class="form-group">
									<a href="{{ route('super-admin.subjects.index') }}" class="btn btn-danger waves-effect waves-light w-md"><i class="fa fa-arrow-left me-2"></i>Back Now</a>
									<button type="submit" class="btn btn-primary waves-effect waves-light w-md"><i class="fas fa-save me-2"></i>Submit Now</button>
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
