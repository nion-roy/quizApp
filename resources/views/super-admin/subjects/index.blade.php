@extends('layouts.backend.app')

@section('title', 'Subjects')


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
					<div class="d-flex align-items-center justify-content-between">
						<h4 class="card-title">All Subjects <span class="btn btn-success">{{ getStrPad($subjects->count()) }}</span></h4>
						<a class="btn btn-success waves-effect waves-light" href="{{ route('super-admin.subjects.create') }}"><i class="fa fa-plus-circle me-2"></i> Add New Subject</a>
					</div>
				</div>
				<div class="card-body">
					<table id="datatable" class="table table-bordered dt-responsive nowrap w-100 align-middle">
						<thead>
							<tr>
								<th>#</th>
								<th>Department</th>
								<th>Subject Name</th>
								<th>Count</th>
								<th>Creation User</th>
								<th>Created</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>


						<tbody>
							@foreach ($subjects as $key => $subject)
								<tr>
									<td>{{ getStrPad($key + 1) }}</td>
									<td>{{ $subject->department->department_name }}</td>
									<td>{{ $subject->subject_name }}</td>
									<td>00</td>
									<td>{{ $subject->user->name }}</td>
									<td>{{ $subject->created_at->format('d-M-Y') }}</td>
									<td>
										@if ($subject->status == 1)
											<span class="text-success font-size-18"><i class="fas fa-check-square"></i></span>
										@else
											<span class="text-danger font-size-18"><i class="fas fa-window-close"></i></span>
										@endif
									</td>

									<td>
										<div class="d-flex align-items-center gap-1">
											<a href="{{ route('super-admin.subjects.edit', $subject->id) }}" class="btn btn-success font-size-15 btn-sm"><i class="fa fa-edit "></i></a>
											<form action="{{ route('super-admin.subjects.destroy', $subject->id) }}" method="POST">
												@csrf
												@method('DELETE')
												<button type="button" class="btn btn-danger delete-button font-size-15 btn-sm"><i class="fa fa-trash "></i></button>
											</form>
										</div>
									</td>

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


{{-- @push('js') 

	<script>
		$(document).ready(function() {
			new DataTable('#datatable', {
				ajax: 'http://127.0.0.1:8000/super-admin/questions',
				processing: true,
				serverSide: true
			});
		});
	</script>
@endpush --}}
