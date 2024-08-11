@if (isset($batches) && $batches->isNotEmpty())
	<option disabled selected>-- Selected Batch --</option>
	@foreach ($batches as $batch)
		<option value="{{ $batch->id }}" {{ $studentBatchId == $batch->id ? 'selected' : '' }}>
			{{ $batch->batch }}
		</option>
	@endforeach
@else
	<option disabled selected style="display: none">-- Batch Not Found --</option>
@endif
