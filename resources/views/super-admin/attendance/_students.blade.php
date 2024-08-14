<form action="{{ route('admin.attendances.store') }}" method="POST">
	@csrf

	@forelse ($students as $key => $student)
		<input type="hidden" name="student_{{ $student->id }}" value="{{ $student->id }}">

		<div class="card">
			<div class="card-body">
				<div class="present__content">
					<div class="row align-items-center">
						<div class="col-md-6">
							<div class="d-flex align-items-center gap-3">
								<span>{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}</span>
								<h4>{{ $student->user->name }}</h4>
							</div>
						</div>
						<div class="col-md-6">
							<div class="d-flex align-items-center justify-content-between">
								<h5>{{ $student->user->number ?? $student->user->email }}</h5>
								<div class="present__status">
									<input class="form-check-input" type="radio" name="present_{{ $student->id }}" id="present_{{ $student->id }}" value="1">
									<label class="form-label" for="present_{{ $student->id }}">Present</label>
									<input class="form-check-input" type="radio" name="present_{{ $student->id }}" id="absent_{{ $student->id }}" value="0">
									<label class="form-label" for="absent_{{ $student->id }}">Absent</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@empty
		<div class="card">
			<div class="card-body">
				<div class="present__content">
					<div class="row">
						<div class="col-12 text-center">
							<h4>No Students Found!</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endforelse

	<button class="btn btn-success waves-effect">Submit Attendance</button>

</form>
