@extends('layouts.backend.app')

@section('title', 'Labs')


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
					<div class="d-flex align-items-center justify-content-between">
						<h4 class="card-title">All Labs <span class="btn btn-success">{{ getStrPad($labs->count()) }}</span></h4>
						@can('create lab')
							<a class="btn btn-success waves-effect waves-light" href="{{ route('admin.labs.create') }}"><i class="fa fa-plus-circle me-2"></i> Add New Lab</a>
						@endcan
					</div>
				</div>
				<div class="card-body">
					<table id="datatable" class="table table-bordered dt-responsive nowrap w-100 align-middle">
						<thead>
							<tr>
								<th>#</th>
								<th>Lab Name</th>
								<th>Min Sets</th>
								<th>Max Sets</th>
								@if (Auth::user()->can('update lab') || Auth::user()->can('delete lab'))
									<th>Action</th>
								@endif
							</tr>
						</thead>


						<tbody>
							@foreach ($labs as $key => $lab)
								<tr>
									<td>{{ getStrPad($key + 1) }}</td>
									<td>{{ $lab->lab_name }}</td>
									<td>{{ $lab->min_set }}</td>
									<td>{{ $lab->max_set }}</td>

									@if (Auth::user()->can('update lab') || Auth::user()->can('delete lab'))
										<td>
											<div class="d-flex align-items-center gap-1">
												@can('create lab')
													<a href="{{ route('admin.labs.edit', $lab->id) }}" class="btn btn-success font-size-15 btn-sm"><i class="fa fa-edit "></i></a>
												@endcan
												@can('create lab')
													<form action="{{ route('admin.labs.destroy', $lab->id) }}" method="POST">
														@csrf
														@method('DELETE')
														<button type="button" class="btn btn-danger font-size-15 btn-sm delete-button"><i class="fa fa-trash "></i></button>
													</form>
												@endcan
											</div>
										</td>
									@endif

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
