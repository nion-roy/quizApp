@if (isset($labs) && $labs->isNotEmpty())
	<option disabled selected>-- Select Lab --</option>
	@foreach ($labs as $lab)
		<option value="{{ $lab->id }}"> {{ $lab->lab_name }} </option>
	@endforeach
@else
	<option disabled selected>-- Lab Not Found --</option>
@endif
