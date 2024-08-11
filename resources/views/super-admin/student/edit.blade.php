@extends('layouts.backend.app')

@section('title', 'Edit Student')


@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">Edit Student !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('admin.students.index') }}">Students</a></li>
						<li class="breadcrumb-item active">Edit Student</li>
					</ol>
				</div>

			</div>
		</div>
	</div>
	<!-- end page title -->

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title m-0">New Student Create </h4>
				</div>
				<div class="card-body">
					<form action="{{ route('admin.students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')

						@include('alert-message.alert-message')

						<div class="row">

							<div class="col-12">
								<h4>Personal Informations</h4>
							</div>

							<hr>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="branch">Branch Name <span class="text-danger">*</span></label>
									<select name="branch" id="branch" class="form-select @error('branch') is-invalid @enderror">
										<option disabled selected>-- Selected Branch -- </option>
										@foreach (getBranches() as $branch)
											<option value="{{ $branch->id }}" {{ $student->user->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->branch_name }}</option>
										@endforeach
									</select>
									@error('branch')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="batch">Branch Batch <span class="text-danger">*</span></label>
									<select name="batch" id="batch" class="form-select batch__lists @error('batch') is-invalid @enderror">
										@if (isset($batches) && $batches->isNotEmpty())
											<option disabled selected>-- Select Batch --</option>
											@foreach ($batches as $batch)
												<option value="{{ $batch->id }}" {{ $student->batch_id == $batch->id ? 'selected' : '' }}>
													{{ $batch->batch }}
												</option>
											@endforeach
										@else
											<option disabled selected style="display: none">-- Batch Not Found --</option>
										@endif
									</select>
									@error('batch')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="group_name">Group Name <span class="text-danger">*</span></label>
									<select name="group_name" id="group_name" class="form-select @error('group_name') is-invalid @enderror">
										<option disabled selected>-- Selected Group --</option>
										<option value="Group A" {{ $student->group_name == 'Group A' ? 'selected' : '' }}>Group A</option>
										<option value="Group B" {{ $student->group_name == 'Group B' ? 'selected' : '' }}>Group B</option>
									</select>
									@error('group_name')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="student_name">Full Name <span class="text-danger">*</span></label>
									<input type="text" name="student_name" class="form-control @error('student_name') is-invalid @enderror" id="student_name" placeholder="Enter full name" value="{{ old('student_name') ?? $student->user->name }}">
									@error('student_name')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>


							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="number">Contact Number<span class="text-danger">*</span></label>
									<input type="number" name="number" class="form-control @error('number') is-invalid @enderror" id="number" placeholder="Enter contact number" value="{{ old('number') ?? $student->user->number }}">
									@error('number')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="email">Email<span class="text-danger">*</span></label>
									<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" value="{{ old('email') ?? $student->user->email }}">
									@error('email')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>


							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="nid_no">NID No. <span class="text-danger">*</span></label>
									<input type="number" name="nid_no" class="form-control @error('nid_no') is-invalid @enderror" id="nid_no" placeholder="Enter NID number" value="{{ old('nid_no') ?? $student->nid_no }}">
									@error('nid_no')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="birth_date">Date Of Birth <span class="text-danger">*</span></label>
									<input type="date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date" placeholder="Enter birth date" value="{{ old('birth_date') ?? $student->birth_date }}">
									@error('birth_date')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="gender">Gender <span class="text-danger">*</span></label>
									<select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror">
										<option disabled selected>-- Selected Gender --</option>
										<option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
										<option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
										<option value="Other" {{ $student->gender == 'Other' ? 'selected' : '' }}>Other</option>
									</select>
									@error('gender')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>


							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="blood_group">Blood Group <span class="text-danger">*</span></label>
									<select name="blood_group" id="blood_group" class="form-select  @error('gender') is-invalid @enderror">
										<option value="" disabled selected>-- Select Blood Group --</option>
										<option value="A+" {{ $student->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
										<option value="A-" {{ $student->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
										<option value="B+" {{ $student->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
										<option value="B-" {{ $student->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
										<option value="AB+" {{ $student->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
										<option value="AB-" {{ $student->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
										<option value="O+" {{ $student->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
										<option value="O-" {{ $student->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
									</select>

									@error('blood_group')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="computer_skill">Computer Skills <span class="text-danger">*</span></label>
									<select name="computer_skill" id="computer_skill" class="form-select @error('computer_skill') is-invalid @enderror">
										<option value="" disabled selected>-- Select Computer Skill --</option>
										<option value="basic" {{ $student->computer_skill == 'basic' ? 'selected' : '' }}>Basic</option>
										<option value="intermediate" {{ $student->computer_skill == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
										<option value="advanced" {{ $student->computer_skill == 'advanced' ? 'selected' : '' }}>Advanced</option>
									</select>
									@error('computer_skill')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="profession">Profession <span class="text-danger">*</span></label>
									<select name="profession" id="profession" class="form-select @error('profession') is-invalid @enderror">
										<option value="" disabled selected>-- Select Profession --</option>
										<option value="student" {{ $student->profession == 'student' ? 'selected' : '' }}>Student</option>
										<option value="farmer" {{ $student->profession == 'farmer' ? 'selected' : '' }}>Farmer</option>
										<option value="doctor" {{ $student->profession == 'doctor' ? 'selected' : '' }}>Doctor</option>
										<option value="engineer" {{ $student->profession == 'engineer' ? 'selected' : '' }}>Engineer</option>
										<option value="teacher" {{ $student->profession == 'teacher' ? 'selected' : '' }}>Teacher</option>
										<option value="lawyer" {{ $student->profession == 'lawyer' ? 'selected' : '' }}>Lawyer</option>
										<option value="nurse" {{ $student->profession == 'nurse' ? 'selected' : '' }}>Nurse</option>
										<option value="accountant" {{ $student->profession == 'accountant' ? 'selected' : '' }}>Accountant</option>
										<option value="architect" {{ $student->profession == 'architect' ? 'selected' : '' }}>Architect</option>
										<option value="software_developer" {{ $student->profession == 'software_developer' ? 'selected' : '' }}>Software Developer</option>
										<option value="graphic_designer" {{ $student->profession == 'graphic_designer' ? 'selected' : '' }}>Graphic Designer</option>
										<option value="business_analyst" {{ $student->profession == 'business_analyst' ? 'selected' : '' }}>Business Analyst</option>
										<option value="marketing_specialist" {{ $student->profession == 'marketing_specialist' ? 'selected' : '' }}>Marketing Specialist</option>
										<option value="writer" {{ $student->profession == 'writer' ? 'selected' : '' }}>Writer</option>
										<option value="photographer" {{ $student->profession == 'photographer' ? 'selected' : '' }}>Photographer</option>
										<option value="others" {{ $student->profession == 'others' ? 'selected' : '' }}>Others</option>
									</select>
									@error('profession')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="religion">Religion <span class="text-danger">*</span></label>
									<select name="religion" id="religion" class="form-select @error('religion') is-invalid @enderror">
										<option value="" disabled selected>-- Select Religion --</option>
										<option value="Islam" {{ $student->religion == 'Islam' ? 'selected' : '' }}>Islam</option>
										<option value="Hinduism" {{ $student->religion == 'Hinduism' ? 'selected' : '' }}>Hinduism</option>
										<option value="Others" {{ $student->religion == 'Others' ? 'selected' : '' }}>Others</option>
									</select>
									@error('religion')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="disabilities">Disabilities <span class="text-danger">*</span></label>
									<select name="disabilities" id="disabilities" class="form-select @error('disabilities') is-invalid @enderror">
										<option value="" disabled selected>-- Select Disabilities --</option>
										<option value="1" {{ $student->disabilities == true ? 'selected' : '' }}>Yes</option>
										<option value="0" {{ $student->disabilities == false ? 'selected' : '' }}>No</option>
									</select>
									@error('disabilities')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="present_address">Present Address<span class="text-danger">*</span></label>
									<input type="text" name="present_address" class="form-control @error('present_address') is-invalid @enderror" id="present_address" placeholder="Enter present address" value="{{ old('present_address') ?? $student->present_address }}">
									@error('present_address')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="permanent_address">Permanent Address<span class="text-danger">*</span></label>
									<input type="text" name="permanent_address" class="form-control @error('permanent_address') is-invalid @enderror" id="permanent_address" placeholder="Enter permanent address" value="{{ old('permanent_address') ?? $student->permanent_address }}">
									@error('permanent_address')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="education_qualification">Education Qualification <span class="text-danger">*</span></label>
									<select name="education_qualification" id="education_qualification" class="form-select @error('education_qualification') is-invalid @enderror">
										<option value="" disabled selected>-- Select Educational Qualification --</option>
										<option value="psc" {{ $student->education_qualification == 'psc' ? 'selected' : '' }}>PSC (Primary School Certificate)</option>
										<option value="jsc" {{ $student->education_qualification == 'jsc' ? 'selected' : '' }}>JSC (Junior School Certificate)</option>
										<option value="ssc" {{ $student->education_qualification == 'ssc' ? 'selected' : '' }}>SSC (Secondary School Certificate)</option>
										<option value="hsc" {{ $student->education_qualification == 'hsc' ? 'selected' : '' }}>HSC (Higher Secondary Certificate)</option>
										<option value="diploma" {{ $student->education_qualification == 'diploma' ? 'selected' : '' }}>Diploma</option>
										<option value="bachelor" {{ $student->education_qualification == 'bachelor' ? 'selected' : '' }}>Bachelor's Degree</option>
										<option value="masters" {{ $student->education_qualification == 'masters' ? 'selected' : '' }}>Master's Degree</option>
										<option value="mphil" {{ $student->education_qualification == 'mphil' ? 'selected' : '' }}>M.Phil</option>
										<option value="phd" {{ $student->education_qualification == 'phd' ? 'selected' : '' }}>Ph.D</option>
										<option value="bmed" {{ $student->education_qualification == 'bmed' ? 'selected' : '' }}>Bachelor of Medicine (MBBS)</option>
										<option value="bds" {{ $student->education_qualification == 'bds' ? 'selected' : '' }}>Bachelor of Dental Surgery (BDS)</option>
										<option value="bsc_engineering" {{ $student->education_qualification == 'bsc_engineering' ? 'selected' : '' }}>B.Sc. in Engineering</option>
										<option value="mba" {{ $student->education_qualification == 'mba' ? 'selected' : '' }}>MBA (Master of Business Administration)</option>
									</select>

									@error('religion')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="pass_year">Passing Year<span class="text-danger">*</span></label>
									<input type="number" name="pass_year" class="form-control @error('pass_year') is-invalid @enderror" id="pass_year" placeholder="Enter passing year" value="{{ old('pass_year') ?? $student->pass_year }}">
									@error('pass_year')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-12 mt-5">
								<h4>Guardian Informations</h4>
							</div>

							<hr>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="father_name">Father Name <span class="text-danger">*</span></label>
									<input type="text" name="father_name" class="form-control @error('father_name') is-invalid @enderror" id="father_name" placeholder="Enter father name" value="{{ old('father_name') ?? $student->father_name }}">
									@error('father_name')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="father_number">Father Contact Number <span class="text-danger">*</span></label>
									<input type="number" name="father_number" class="form-control @error('father_number') is-invalid @enderror" id="father_number" placeholder="Enter contact number" value="{{ old('father_number') ?? $student->father_number }}">
									@error('father_number')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="mother_name">Mother Name <span class="text-danger">*</span></label>
									<input type="text" name="mother_name" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" placeholder="Enter mother name" value="{{ old('mother_name') ?? $student->mother_name }}">
									@error('mother_name')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="mother_number">Mother Contact Number <span class="text-danger">*</span></label>
									<input type="number" name="mother_number" class="form-control @error('mother_number') is-invalid @enderror" id="mother_number" placeholder="Enter contact number" value="{{ old('mother_number') ?? $student->mother_number }}">
									@error('mother_number')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>



							<div class="col-12 mt-5">
								<h4>Other Informations</h4>
							</div>

							<hr>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="about">About Us <span class="text-danger">*</span></label>
									<textarea name="about" class="form-control @error('about') is-invalid @enderror" id="about" cols="30" rows="4" placeholder="Enter short description...">{{ old('about') ?? $student->about }}</textarea>
									@error('about')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="marketplace">Earning / Marketplace <span class="text-danger">*</span></label>
									<textarea name="marketplace" class="form-control @error('marketplace') is-invalid @enderror" id="marketplace" cols="30" rows="4" placeholder="Enter earning or marketplace...">{{ old('marketplace') ?? $student->marketplace }}</textarea>
									@error('marketplace')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="linked_in">Linkedin <span class="text-danger">*</span></label>
									<input type="text" name="linked_in" class="form-control @error('linked_in') is-invalid @enderror" id="linked_in" placeholder="Enter linkedin" value="{{ old('linked_in') ?? $student->linked_in }}">
									@error('linked_in')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="upwork">Upwork <span class="text-danger">*</span></label>
									<input type="text" name="upwork" class="form-control @error('upwork') is-invalid @enderror" id="upwork" placeholder="Enter upwork" value="{{ old('upwork') ?? $student->upwork }}">
									@error('upwork')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="fiver">Fiver <span class="text-danger">*</span></label>
									<input type="text" name="fiver" class="form-control @error('fiver') is-invalid @enderror" id="fiver" placeholder="Enter fiver" value="{{ old('fiver') ?? $student->fiver }}">
									@error('fiver')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="link_three">Freelancing Link 03 <span class="text-danger">*</span></label>
									<input type="text" name="link_three" class="form-control @error('link_three') is-invalid @enderror" id="link_three" placeholder="Enter freelancing link 03" value="{{ old('link_three') ?? $student->link_three }}">
									@error('link_three')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="link_four">Freelancing Link 04 <span class="text-danger">*</span></label>
									<input type="text" name="link_four" class="form-control @error('link_four') is-invalid @enderror" id="link_four" placeholder="Enter freelancing link 04" value="{{ old('link_four') ?? $student->link_four }}">
									@error('link_four')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-12">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group mb-3">
											<label class="form-label" for="role">Role<span class="text-danger">*</span></label>
											<select name="role" class="form-control form-select @error('role') is-invalid @enderror" id="role">
												<option disabled selected>-- Selected Role --</option>
												@foreach (getRoles() as $role)
													@if ($role->name === 'user')
														<option value="{{ $role->id }}" selected>{{ $role->name }}</option>
													@endif
												@endforeach

											</select>
											@error('role')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group mb-3">
											<label class="form-label" for="status">Status<span class="text-danger">*</span></label>
											<select name="status" class="form-control form-select @error('status') is-invalid @enderror">
												<option disabled selected>-- Selected Status --</option>
												<option value="1" {{ $student->user->status == 1 ? 'selected' : '' }}>Active</option>
												<option value="2" {{ $student->user->status == 2 ? 'selected' : '' }}>Pending</option>
												<option value="3" {{ $student->user->status == 3 ? 'selected' : '' }}>Suspend</option>
												<option value="4" {{ $student->user->status == 4 ? 'selected' : '' }}>Blocked</option>
											</select>
											@error('status')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>
							</div>

							<div class="form-group mb-3">
								<label class="form-label" for="image">User Image</label> <br>
								<div id="imagePreviewContainer"></div>
								<input type="file" name="image" class="@error('image') is-invalid @enderror" id="imageInput">
								@error('image')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>

							<div class="form-group">
								<a href="{{ route('admin.students.index') }}" class="btn btn-danger waves-effect waves-light w-md"><i class="fa fa-arrow-left me-2"></i>Back Now</a>
								<button type="submit" class="btn btn-success waves-effect waves-light w-md"><i class="fas fa-upload me-2"></i>Update Now</button>
							</div>

						</div>

					</form>
				</div>
			</div>
		</div>
		<!-- end col -->
	</div>
	<!-- end row -->
@endsection


@push('js')
	<script>
		$(document).ready(function() {
			// Trigger AJAX on branch change
			$('#branch').on('change', function() {
				var branchID = $(this).val();
				var studentBatchID = "{{ $student->batch_id }}"; // Pass the student's batch ID to the script

				if (branchID > 0) {
					$('.batch__lists').html('<option>Loading...</option>');

					$.ajax({
						type: "GET",
						url: "/admin/branch-to-batch/" + branchID,
						data: {
							student_batch_id: studentBatchID
						},
						success: function(response) {
							$('.batch__lists').html(response);
						},
					});
				}
			}).trigger('change'); // Trigger the change event on page load to load the batches automatically
		});
	</script>
@endpush
