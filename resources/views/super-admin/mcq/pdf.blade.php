<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Document</title>


		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


		<style>
			@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

			body {
				font-family: "Roboto", sans-serif;
				font-weight: 400;
			}

			.question {
				font-size: 18px;
				font-weight: 600;
			}

			.correct_answer {
				color: #198754;
			}

			.wrong_answer {
				color: #ff0000;
			}
		</style>

	</head>

	<body>

		<div class="container">

			<div class="mb-3 text-center p-5">
				<div class="logo">
					<!-- Assuming you are using Blade syntax for Laravel -->
					<img src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('backend/assets/images/logo-sm.svg'))) }}">
					{{-- <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents(base_path('public/productimage/' . $data->prod_img))); ?>" width="120"> --}}
					<span class="logo-txt">QuizApp</span>
				</div>
			</div>


			{{-- <div class="mb-3 text-center p-5">
				<div class="logo">
					<img src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('assets/images/logo.png'))) }}">
					<img src="{{ asset('backend') }}/assets/images/logo-sm.svg" alt="" height="34">
					<span class="logo-txt">QuizApp</span>
				</div>
			</div> --}}

			<div class="row">
				<div class="col-6">
					<strong>Total Questions: 20</strong> <br>
					<strong>Right Answers: 20</strong> <br>
					<strong>Wrong Answers: 20</strong>
				</div>
				<div class="col-6">
					<strong>Total Time: 20</strong> <br>
					<strong>Loss Time: 20</strong> <br>
					<strong>Total Mark: 20</strong>
				</div>
			</div>

			<hr>
			@foreach ($questions as $key => $question)
				<div class="mb-3">
					<div class="question">{{ str_pad($key + 1, 2, 0, STR_PAD_LEFT) }}. {{ $question->question_name }}</div>
					@php
						$result = $mcqResults[$key];
						$questionOptions = App\Models\QuestionOption::where('question_id', $question->id)->get();
					@endphp

					<div class="row">
						@foreach ($questionOptions as $optionKey => $option)
							<div class="col-3">
								@if ($option->id == $result->answer_id)
									@if ($question->correct_answer == $option->option)
										<div class="font-size-14 fw-normal correct_answer">{{ chr(65 + $optionKey) }}. {{ $option->option }}</div>
									@else
										<div class="font-size-14 fw-normal wrong_answer">{{ chr(65 + $optionKey) }}. {{ $option->option }}</div>
									@endif
								@else
									<div class="font-size-14 fw-normal">{{ chr(65 + $optionKey) }}. {{ $option->option }}</div>
								@endif
							</div>
						@endforeach
					</div>

					<div class="font-size-14 fw-normal"><strong>Answer:</strong> {{ $question->correct_answer }}</div>
				</div>
			@endforeach
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

	</body>

</html>
