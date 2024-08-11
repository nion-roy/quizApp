@if (isset($batches))
	@forelse ($batches as $batch)
		<option value="{{ $batch->id }}">{{ $batch->batch }}</option>
	@empty
		<option disabled selected>-- Batch Not Found --</option>
	@endforelse
@else
	<option disabled selected>-- Selected Batch --</option>
@endif
