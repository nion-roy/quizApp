@php
	// Count of MCQ tests taken by the user
	$mcqCount = App\Models\MCQTest::where('user_id', Auth::id())->count();
	$mcqTimes = App\Models\MCQTest::where('user_id', Auth::id())->first();

	// Fetch questions with their options and user's answers
$mcqTests = App\Models\MCQTest::where('user_id', Auth::id())
    ->with(['question', 'answer'])
	    ->get();

	// Initialize counters for correct, wrong, and unanswered answers
	$correctAnswersCount = 0;
	$wrongAnswersCount = 0;
	$unansweredCount = 0;

	foreach ($mcqTests as $test) {
	    if ($test->answer === null) {
	        $unansweredCount++;
	    } elseif ($test->question->correct_answer == $test->answer->option) {
	        $correctAnswersCount++;
	    } else {
	        $wrongAnswersCount++;
	    }
	}
@endphp



@push('js')
	<script>
		$(document).ready(function() {
			var mcqTestsCount = {{ $mcqTests->count() }};

			if (mcqTestsCount > 0) {
				$('#staticBackdrop').modal('show');
			}
		});
	</script>
@endpush


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-body">
				<div id="pointModal" class="p-4 js-container">
					<div class="row">

						<div class="col-12">
							<div class="icon">
								<i class="fas fa-check"></i>
							</div>
							<h2>Finished to Quiz!</h2>
						</div>

						<hr class="mt-4 mb-4">

						<div class="col-5 rounded">
							<div class="bg-white p-3 rounded">
								<div class="d-flex align-items-center justify-content-between mb-1 gap-2 font-size-16">
									<h5 class="text-info">Total Questions:</h5>
									<span> {{ getStrPad($mcqCount) }} </span>
								</div>

								<div class="d-flex align-items-center justify-content-between mb-1 gap-2 font-size-16">
									<h5 class="text-success">Correct Answers:</h5>
									<span> {{ getStrPad($correctAnswersCount) }} </span>
								</div>

								<div class="d-flex align-items-center justify-content-between mb-1 gap-2 font-size-16">
									<h5 class="text-danger">Wrong Answers:</h5>
									<span> {{ getStrPad($wrongAnswersCount + $unansweredCount) }} </span>
								</div>
							</div>
						</div>

						<div class="offset-2 col-5 rounded">
							<div class="bg-white p-3 rounded">
								<div class="d-flex align-items-center justify-content-between mb-1 gap-2 font-size-16">
									<h5 class="text-info">Total Times:</h5>
									<span> {{ getStrPad($mcqTimes->total_time ?? null) }}.00 </span>
								</div>

								<div class="d-flex align-items-center justify-content-between mb-1 gap-2 font-size-16">
									<h5 class="text-success">Uses Times:</h5>
									<span> {{ $mcqTimes->use_time ?? null }} </span>
								</div>

								<div class="d-flex align-items-center justify-content-between mb-1 gap-2 font-size-16">
									<h5 class="text-danger">Total Marks:</h5>
									<span> {{ getStrPad($correctAnswersCount * 2) }} </span>
								</div>
							</div>
						</div>

						<div class="col-12 mt-2">
							<button class="btn btn-danger mt-3" id="success_complete">Close Now</button>
							<a href="{{ route('super-admin.mcq-practice.download') }}" class="btn btn-success mt-3">Download</a>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>


@push('js')
	<script>
		$(document).ready(function() {
			$('#success_complete').on('click', function() {
				var userID = {{ Auth::id() }};
				var url = "/super-admin/mcq-practice/" + userID;
				$.ajax({
					type: "DELETE",
					url: url,
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					success: function(response) {
						$('#staticBackdrop').modal('hide');
					},
				});
			});
		});
	</script>
@endpush

@push('css')
	<style>
		hr {
			border-color: #006842;
		}

		#pointModal {
			text-align: center;
		}

		#pointModal h5 {
			margin: 0;
		}

		#pointModal .icon i {
			font-size: 36px;
			background: #34c38f;
			color: #fff;
			border-radius: 50px;
			padding: 12px;
			margin-bottom: 12px;
		}
	</style>
@endpush
