@if (isset($trainers) && $trainers->isNotEmpty())
	<option disabled selected>-- Select Trainer --</option>
	@foreach ($trainers as $trainer)
		<option value="{{ $trainer->id }}"> {{ $trainer->name }} - {{ $trainer->id }} </option>
	@endforeach
@else
	<option disabled selected>-- Trainer Not Found --</option>
@endif
