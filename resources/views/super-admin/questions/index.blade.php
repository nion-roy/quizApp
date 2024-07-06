@extends('layouts.backend.app')

@section('title', 'Questions')


@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">All Questions !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">All Questions</li>
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
						<div>
							<h4 class="card-title m-0">All Questions <span class="btn btn-success p-1">{{ getStrPad($questions->count()) }}</span></h4>
							{{-- <a class="btn btn-danger waves-effect waves-light" href="">Add CSV</a> --}}
						</div>
						<a class="btn btn-success waves-effect waves-light" href="{{ route('super-admin.questions.create') }}"><i class="fa fa-plus-circle me-2"></i> Add New Question</a>
					</div>
				</div>
				<div class="card-body">
					<table id="datatable" class="table table-bordered dt-responsive nowrap w-100 align-middle">
						<thead>
							<tr>
								<th>#</th>
								<th>Question</th>
								<th>Correct Answer</th>
								<th>Department</th>
								<th>Subject</th>
								<th>Creation</th>
								<th>Created</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>


						<tbody>
							@foreach ($questions as $key => $question)
								<tr>
									<td>{{ getStrPad($key + 1) }}</td>
									<td>{{ $question->question_name }}</td>
									<td>{{ $question->correct_answer }}</td>
									<td>{{ $question->department->department_name }}</td>
									<td>{{ $question->subject->subject_name }}</td>
									<td>{{ $question->user->name }}</td>
									<td>{{ $question->created_at->format('d-M-Y') }}</td>
									<td>
										@if ($question->status == 1)
											<span class="text-success font-size-18"><i class="fas fa-check-square"></i></span>
										@else
											<span class="text-danger font-size-18"><i class="fas fa-window-close"></i></span>
										@endif
									</td>

									<td>
										<div class="d-flex align-items-center gap-1">
											<a href="{{ route('super-admin.questions.edit', $question->id) }}" class="btn btn-success font-size-15 btn-sm"><i class="fa fa-edit"></i></a>
											<a href="{{ route('super-admin.questions.show', $question->id) }}" class="btn btn-info font-size-15 btn-sm"><i class="fa fa-eye"></i></a>
											<form action="{{ route('super-admin.questions.destroy', $question->id) }}" method="POST">
												@csrf
												@method('DELETE')
												<button type="button" class="btn btn-danger delete-button font-size-15 btn-sm"><i class="fa fa-trash"></i></button>
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
