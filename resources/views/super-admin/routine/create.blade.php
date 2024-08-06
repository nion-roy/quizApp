@extends('layouts.backend.app')

@section('title', 'New Routine Cerate')


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
					<h4 class="card-title m-0">New Routine Create </h4>
				</div>
				<div class="card-body">
					<form action="{{ route('admin.routines.store') }}" method="POST" enctype="multipart/form-data">
						@csrf

						@include('alert-message.alert-message')

						<div class="row">

							<div class="col-md-6 mb-3">
								<div class="form-group mb-3">
									<label class="form-label" for="branch">Branch Name <span class="text-danger">*</span></label>
									<select name="branch" id="branch" class="form-select select2">
										<option disabled selected>-- Selected Branch --</option>
										@foreach (getBranches() as $branch)
											<option value="{{ $branch->id }}">{{ $branch->branch }}</option>
										@endforeach
									</select>
									@error('branch')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6 mb-3">
								<div class="form-group">
									<label class="form-label" for="lab_name">Teacher <span class="text-danger">*</span></label>
									<select name="teacher" id="teacher" class="form-select select2">
										<option disabled selected>-- Selected Teacher --</option>
										@foreach ($teachers as $teacher)
											<option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
										@endforeach
									</select>
									@error('lab_name')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6 mb-3">
								<div class="form-group">
									<label class="form-label" for="min_set">Class Start <span class="text-danger">*</span></label>
									<input type="time" name="min_set" class="form-control @error('min_set') is-invalid @enderror" id="min_set" placeholder="Enter lab name" value="{{ old('min_set') }}">
									@error('min_set')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6 mb-3">
								<div class="form-group">
									<label class="form-label" for="min_set">Class End <span class="text-danger">*</span></label>
									<input type="time" name="min_set" class="form-control @error('min_set') is-invalid @enderror" id="min_set" placeholder="Enter lab name" value="{{ old('min_set') }}">
									@error('min_set')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6 mb-3">
								<div class="form-group">
									<label class="form-label" for="lab_name">Lab Room <span class="text-danger">*</span></label>
									<select name="lab" id="lab" class="form-select select2">
										<option disabled selected>-- Selected Lab --</option>
										@foreach ($labs as $lab)
											<option value="{{ $lab->id }}">{{ $lab->lab_name }}</option>
										@endforeach
									</select>
									@error('lab_name')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<a href="{{ route('admin.routines.index') }}" class="btn btn-danger waves-effect waves-light w-md"><i class="fa fa-arrow-left me-2"></i>Back Now</a>
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
