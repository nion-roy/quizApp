@if (isset($departments) && $departments->isNotEmpty())
	<option disabled selected>-- Select Department --</option>
	@foreach ($departments as $department)
		<option value="{{ $department->id }}" {{ $departmentID == $department->id ? 'selected' : '' }}> {{ $department->department_name }} </option>
	@endforeach
@else
	<option disabled selected>-- Department Not Found --</option>
@endif
