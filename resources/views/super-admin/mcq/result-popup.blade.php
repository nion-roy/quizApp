@php
	// Count of MCQ tests taken by the user
	$mcqCount = App\Models\MCQTest::where('user_id', Auth::id())->count();

	// Fetch questions with their options and user's answers
$mcqTests = App\Models\MCQTest::where('user_id', Auth::id())
    ->with(['question', 'answer'])
	    ->get();

	// Initialize counters for correct and wrong answers
	$correctAnswersCount = 0;
	$wrongAnswersCount = 0;

	foreach ($mcqTests as $test) {
	    if ($test->question->correct_answer == $test->answer->option) {
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
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div id="pointModal" class="p-4 js-container">
					<div class="icon">
						<i class="fas fa-check"></i>
					</div>
					<h2>Congratulations!</h2>
					<p>You are all set. Well done!</p>

					<div class="d-flex align-items-center justify-content-center mb-1 gap-2 font-size-16">
						<h5 class="text-info">Total Question:</h5>
						<span> {{ getStrPad($mcqCount) }} </span>
					</div>

					<div class="d-flex align-items-center justify-content-center mb-1 gap-2 font-size-16">
						<h5 class="text-success">Correct Answer:</h5>
						<span>{{ getStrPad($correctAnswersCount) }} </span>
					</div>

					<div class="d-flex align-items-center justify-content-center mb-1 gap-2 font-size-16">
						<h5 class="text-danger">Wrong Answer:</h5>
						<span>{{ getStrPad($wrongAnswersCount) }} </span>
					</div>

					<button class="btn btn-danger mt-3" id="success_complete">Close Now</button>

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

@push('css')
	<style>
		@keyframes confetti-slow {
			0% {
				transform: translate3d(0, 0, 0) rotateX(0) rotateY(0);
			}

			100% {
				transform: translate3d(25px, 105vh, 0) rotateX(360deg) rotateY(180deg);
			}
		}

		@keyframes confetti-medium {
			0% {
				transform: translate3d(0, 0, 0) rotateX(0) rotateY(0);
			}

			100% {
				transform: translate3d(100px, 105vh, 0) rotateX(100deg) rotateY(360deg);
			}
		}

		@keyframes confetti-fast {
			0% {
				transform: translate3d(0, 0, 0) rotateX(0) rotateY(0);
			}

			100% {
				transform: translate3d(-50px, 105vh, 0) rotateX(10deg) rotateY(250deg);
			}
		}

		.confetti-container {
			perspective: 700px;
			position: absolute;
			overflow: hidden;
			top: 0;
			right: 0;
			bottom: 60px;
			left: 0;
		}

		.confetti {
			position: absolute;
			z-index: 1;
			top: -10px;
			border-radius: 0%;
		}

		.confetti--animation-slow {
			animation: confetti-slow 2.25s linear 1 forwards;
		}

		.confetti--animation-medium {
			animation: confetti-medium 1.75s linear 1 forwards;
		}

		.confetti--animation-fast {
			animation: confetti-fast 1.25s linear 1 forwards;
		}

		/* Checkmark */
		.checkmark-circle {
			width: 150px;
			height: 150px;
			position: relative;
			display: inline-block;
			vertical-align: top;
			margin-left: auto;
			margin-right: auto;
		}

		.checkmark-circle .background {
			width: 150px;
			height: 150px;
			border-radius: 50%;
			background: #00C09D;
			position: absolute;
		}

		.checkmark-circle .checkmark {
			border-radius: 5px;
		}

		.checkmark-circle .checkmark.draw:after {
			-webkit-animation-delay: 100ms;
			-moz-animation-delay: 100ms;
			animation-delay: 100ms;
			-webkit-animation-duration: 3s;
			-moz-animation-duration: 3s;
			animation-duration: 3s;
			-webkit-animation-timing-function: ease;
			-moz-animation-timing-function: ease;
			animation-timing-function: ease;
			-webkit-animation-name: checkmark;
			-moz-animation-name: checkmark;
			animation-name: checkmark;
			-webkit-transform: scaleX(-1) rotate(135deg);
			-moz-transform: scaleX(-1) rotate(135deg);
			-ms-transform: scaleX(-1) rotate(135deg);
			-o-transform: scaleX(-1) rotate(135deg);
			transform: scaleX(-1) rotate(135deg);
			-webkit-animation-fill-mode: forwards;
			-moz-animation-fill-mode: forwards;
			animation-fill-mode: forwards;
		}

		.checkmark-circle .checkmark:after {
			opacity: 1;
			height: 75px;
			width: 37.5px;
			-webkit-transform-origin: left top;
			-moz-transform-origin: left top;
			-ms-transform-origin: left top;
			-o-transform-origin: left top;
			transform-origin: left top;
			border-right: 15px solid white;
			border-top: 15px solid white;
			border-radius: 2.5px !important;
			content: "";
			left: 25px;
			top: 75px;
			position: absolute;
		}

		@-webkit-keyframes checkmark {
			0% {
				height: 0;
				width: 0;
				opacity: 1;
			}

			20% {
				height: 0;
				width: 37.5px;
				opacity: 1;
			}

			40% {
				height: 75px;
				width: 37.5px;
				opacity: 1;
			}

			100% {
				height: 75px;
				width: 37.5px;
				opacity: 1;
			}
		}

		@-moz-keyframes checkmark {
			0% {
				height: 0;
				width: 0;
				opacity: 1;
			}

			20% {
				height: 0;
				width: 37.5px;
				opacity: 1;
			}

			40% {
				height: 75px;
				width: 37.5px;
				opacity: 1;
			}

			100% {
				height: 75px;
				width: 37.5px;
				opacity: 1;
			}
		}

		@keyframes checkmark {
			0% {
				height: 0;
				width: 0;
				opacity: 1;
			}

			20% {
				height: 0;
				width: 37.5px;
				opacity: 1;
			}

			40% {
				height: 75px;
				width: 37.5px;
				opacity: 1;
			}

			100% {
				height: 75px;
				width: 37.5px;
				opacity: 1;
			}
		}

		.submit-btn {
			height: 45px;
			width: 200px;
			font-size: 15px;
			background-color: #00c09d;
			border: 1px solid #00ab8c;
			color: #fff;
			border-radius: 5px;
			box-shadow: 0 2px 4px 0 rgba(87, 71, 81, 0.2);
			cursor: pointer;
			transition: all 2s ease-out;
			transition: all 0.2s ease-out;
		}

		.submit-btn:hover {
			background-color: #2ca893;
			transition: all 0.2s ease-out;
		}
	</style>
@endpush


@push('js')
	<script>
		const Confettiful = function(el) {
			this.el = el;
			this.containerEl = null;

			this.confettiFrequency = 3;
			this.confettiColors = ['#EF2964', '#00C09D', '#2D87B0', '#48485E', '#EFFF1D'];
			this.confettiAnimations = ['slow', 'medium', 'fast'];

			this._setupElements();
			this._renderConfetti();
		};

		Confettiful.prototype._setupElements = function() {
			const containerEl = document.createElement('div');
			const elPosition = this.el.style.position;

			if (elPosition !== 'relative' || elPosition !== 'absolute') {
				this.el.style.position = 'relative';
			}

			containerEl.classList.add('confetti-container');

			this.el.appendChild(containerEl);

			this.containerEl = containerEl;
		};

		Confettiful.prototype._renderConfetti = function() {
			this.confettiInterval = setInterval(() => {
				const confettiEl = document.createElement('div');
				const confettiSize = (Math.floor(Math.random() * 3) + 7) + 'px';
				const confettiBackground = this.confettiColors[Math.floor(Math.random() * this.confettiColors.length)];
				const confettiLeft = (Math.floor(Math.random() * this.el.offsetWidth)) + 'px';
				const confettiAnimation = this.confettiAnimations[Math.floor(Math.random() * this.confettiAnimations.length)];

				confettiEl.classList.add('confetti', 'confetti--animation-' + confettiAnimation);
				confettiEl.style.left = confettiLeft;
				confettiEl.style.width = confettiSize;
				confettiEl.style.height = confettiSize;
				confettiEl.style.backgroundColor = confettiBackground;

				confettiEl.removeTimeout = setTimeout(function() {
					confettiEl.parentNode.removeChild(confettiEl);
				}, 3000);

				this.containerEl.appendChild(confettiEl);
			}, 25);
		};

		window.confettiful = new Confettiful(document.querySelector('.js-container'));
	</script>
@endpush
