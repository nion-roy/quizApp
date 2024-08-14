@if (isset($batches) && $batches->isNotEmpty())
	<option disabled selected>-- Select Batch --</option>
	@foreach ($batches as $batch)
		<option value="{{ $batch->id }}"> {{ $batch->batch }} </option>
	@endforeach
@else
	<option disabled selected>-- Batch Not Found --</option>
@endif
