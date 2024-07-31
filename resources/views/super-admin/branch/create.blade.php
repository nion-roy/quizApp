@extends('layouts.backend.app')

@section('title', 'New Bathc Cerate')


@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">All Bathces !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">All Bathces</li>
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
					<h4 class="card-title m-0">New Bathc Create </h4>
				</div>
				<div class="card-body">
					<form action="{{ route('admin.bathces.store') }}" method="POST" enctype="multipart/form-data">
						@csrf

						@include('alert-message.alert-message')

						<div class="row justify-content-center">
							<div class="col-md-3">
								<div class="form-group mb-3">
									<label class="form-label" for="bathc">Bathc Name <span class="text-danger">*</span></label>
									<input type="text" name="bathc" class="form-control @error('bathc') is-invalid @enderror" id="bathc" placeholder="Enter bathc name" value="{{ old('bathc') }}">
									@error('bathc')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group mb-3">
									<label class="form-label" for="status">Status<span class="text-danger">*</span></label>
									<select name="status" class="form-control form-select @error('status') is-invalid @enderror">
										<option value="" disabled {{ old('status') === null ? 'selected' : '' }}>-- Selected Status --</option>
										<option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
										<option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
									</select>
									@error('status')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-9 text-end">
								<div class="form-group">
									<a href="{{ route('admin.bathces.index') }}" class="btn btn-danger waves-effect waves-light w-md"><i class="fa fa-arrow-left me-2"></i>Back Now</a>
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
