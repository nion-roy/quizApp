@extends('layouts.backend.app')

@section('title', 'Edit Lab')


@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">All Labs !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">All Labs</li>
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
					<h4 class="card-title m-0">Edit Lab Info </h4>
				</div>
				<div class="card-body">
					<form action="{{ route('admin.labs.update', $lab->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')

						@include('alert-message.alert-message')

						<div class="row align-items-end justify-content-center">
							<div class="col-lg-3 mb-3">
								<div class="form-group">
									<label class="form-label" for="lab_name">Lab Name <span class="text-danger">*</span></label>
									<input type="text" name="lab_name" class="form-control @error('lab_name') is-invalid @enderror" id="lab_name" placeholder="Enter lab name" value="{{ old('lab_name') ?? $lab->lab_name }}">
									@error('lab_name')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-lg-3 mb-3">
								<div class="form-group">
									<label class="form-label" for="min_set">Min Sets <span class="text-danger">*</span></label>
									<input type="number" name="min_set" class="form-control @error('min_set') is-invalid @enderror" id="min_set" placeholder="Enter lab name" value="{{ old('min_set') ?? $lab->min_set }}">
									@error('min_set')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-lg-3 mb-3">
								<div class="form-group">
									<label class="form-label" for="max_set">Max Sets <span class="text-danger">*</span></label>
									<input type="number" name="max_set" class="form-control @error('max_set') is-invalid @enderror" id="max_set" placeholder="Enter lab name" value="{{ old('max_set') ?? $lab->max_set }}">
									@error('max_set')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-lg-9 text-end">
								<div class="form-group">
                  <a href="{{ route('admin.labs.index') }}" class="btn btn-danger waves-effect waves-light w-md"><i class="fa fa-arrow-left me-2"></i>Back Now</a>
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
