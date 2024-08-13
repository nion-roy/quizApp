@extends('layouts.backend.app')

@section('title', 'Routines')


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
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center justify-content-between">
						<h4 class="card-title">All Routines <span class="btn btn-success"></span></h4>
						@can('create lab')
							<a class="btn btn-success waves-effect waves-light" href="{{ route('admin.routines.create') }}"><i class="fa fa-plus-circle me-2"></i> Add New Routine</a>
						@endcan
					</div>
				</div>
				<div class="card-body">
					<div class="row align-items-center justify-content-center">
						<div class="col-md-3">
							<div class="form-group">
								<select name="branch" id="branch" class="form-select">
									<option disabled selected>-- Selected Branch --</option>
									@foreach (getBranches() as $branch)
										<option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-gorup">
								<select name="day" id="day" class="form-select">
									<option disabled selected>-- Select Day --</option>
									<option value="saturday" {{ old('day') == 'saturday' ? 'selected' : '' }}>Saturday</option>
									<option value="sunday" {{ old('day') == 'sunday' ? 'selected' : '' }}>Sunday</option>
									<option value="monday" {{ old('day') == 'monday ' ? 'selected' : '' }}>Monday</option>
									<option value="tuesday" {{ old('day') == 'tuesday' ? 'selected' : '' }}>Tuesday</option>
									<option value="wednesday" {{ old('day') == 'wednesday' ? 'selected' : '' }}>Wednesday</option>
									<option value="thursday" {{ old('day') == 'thursday' ? 'selected' : '' }}>Thursday</option>
									<option value="friday" {{ old('day') == 'friday' ? 'selected' : '' }}>Friday</option>
								</select>
							</div>
						</div>
						<div class="col-md-1">
							<button class="btn btn-success waves-effect d-block"><i class="fa fa-filter me-1"></i>Filter Now</button>
						</div>
					</div>
				</div>
			</div>
		</div>




		<!-- end col -->
	</div>
	<!-- end row -->
@endsection
