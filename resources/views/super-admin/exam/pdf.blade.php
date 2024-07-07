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
		</style>

		<style>
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

			hr {
				border-top: 1px solid red !important;
			}

			table {
				width: 100%;
			}

			table tr>td {
				display: block;
				border: none !important;
				padding: 0 !important;
				clear: both;
			}

			.question {
				margin-bottom: 2px !important;
				font-size: 14px !important;
			}

			.options {
				width: 25% !important;
				float: left !important;
				font-size: 12px !important;
				margin-bottom: 4px !important;
			}
		</style>

	</head>

	<body>

		<div class="container-fluid">

			<div class="text-center py-3">
				<div class="logo">
					<!-- Assuming you are using Blade syntax for Laravel -->
					<img src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('backend/assets/images/logo-sm.svg'))) }}">
					{{-- <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents(base_path('public/productimage/' . $data->prod_img))); ?>" width="120"> --}}
					<span class="logo-txt">QuizApp</span>
				</div>
			</div>

			<hr>

			<table class="table">
				<tbody>

					@php
						$questions = App\Models\ExamQuestion::where('exam_id', $exam->id)->get();
					@endphp

					{{-- @dd($questions) --}}

					@foreach ($questions as $key => $question)
						<tr>

							@php
								$questionOptions = App\Models\QuestionOption::where('question_id', $question->question_id)->get();
							@endphp

							<td>
								<div class="question">{{ str_pad($key + 1, 2, 0, STR_PAD_LEFT) }}. {{ $question->question->question_name }}</div>
							</td>

							<td style="margin-bottom: 1.5rem !important">
								@foreach ($questionOptions as $key => $option)
									<div class="options">{{ chr(65 + $key) }}. {{ $option->option }}</div>
								@endforeach
							</td>

						</tr>
					@endforeach
				</tbody>
			</table>

		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

	</body>

</html>
