@extends('layouts.backend.app')

@section('title', 'New Student Cerate')


@push('css')
	<style>
		.select2-selection.select2-selection--single.is-invalid {
			border-color: red !important;
		}
	</style>
@endpush

@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">Add New Student !</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('admin.students.index') }}">Students</a></li>
						<li class="breadcrumb-item active">Add New Student</li>
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
					<form action="{{ route('admin.students.store') }}" method="POST" enctype="multipart/form-data">
						@csrf

						@include('alert-message.alert-message')

						<div class="row">

							<div class="col-12">
								<h4>Personal Informations</h4>
							</div>

							<hr>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="branch">Branch Name <span class="text-danger">*</span></label>
									<select name="branch" id="branch" class="form-select active @error('branch') is-invalid @enderror">
										<option disabled selected>-- Selected Branch -- </option>
										@foreach (getBranches() as $branch)
											<option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
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
										@include('super-admin.student._batch')
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
										<option value="Group A">Group A</option>
										<option value="Group B">Group B</option>
									</select>
									@error('group_name')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="student_name">Full Name <span class="text-danger">*</span></label>
									<input type="text" name="student_name" class="form-control @error('student_name') is-invalid @enderror" id="student_name" placeholder="Enter full name" value="{{ old('student_name') }}">
									@error('student_name')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>


							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="number">Contact Number<span class="text-danger">*</span></label>
									<input type="number" name="number" class="form-control @error('number') is-invalid @enderror" id="number" placeholder="Enter contact number" value="{{ old('number') }}">
									@error('number')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="email">Email<span class="text-danger">*</span></label>
									<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" value="{{ old('email') }}">
									@error('email')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>


							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="nid_no">NID No. <span class="text-danger">*</span></label>
									<input type="number" name="nid_no" class="form-control @error('nid_no') is-invalid @enderror" id="nid_no" placeholder="Enter NID number" value="{{ old('nid_no') }}">
									@error('nid_no')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="birth_date">Date Of Birth <span class="text-danger">*</span></label>
									<input type="date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date" placeholder="Enter birth date" value="{{ old('birth_date') }}">
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
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Other">Other</option>
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
										<option value="A+">A+</option>
										<option value="A-">A-</option>
										<option value="B+">B+</option>
										<option value="B-">B-</option>
										<option value="AB+">AB+</option>
										<option value="AB-">AB-</option>
										<option value="O+">O+</option>
										<option value="O-">O-</option>
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
										<option value="basic">Basic</option>
										<option value="intermediate">Intermediate</option>
										<option value="advanced">Advanced</option>
										<option value="programming">Programming</option>
										<option value="database_management">Database Management</option>
										<option value="networking">Networking</option>
										<option value="graphic_design">Graphic Design</option>
										<option value="web_development">Web Development</option>
										<option value="data_analysis">Data Analysis</option>
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
										<option value="doctor">Doctor</option>
										<option value="engineer">Engineer</option>
										<option value="teacher">Teacher</option>
										<option value="lawyer">Lawyer</option>
										<option value="nurse">Nurse</option>
										<option value="accountant">Accountant</option>
										<option value="architect">Architect</option>
										<option value="software_developer">Software Developer</option>
										<option value="graphic_designer">Graphic Designer</option>
										<option value="business_analyst">Business Analyst</option>
										<option value="marketing_specialist">Marketing Specialist</option>
										<option value="writer">Writer</option>
										<option value="photographer">Photographer</option>
										<option value="others">Others</option>
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
										<option value="islam">Islam</option>
										<option value="hinduism">Hinduism</option>
										<option value="others">Others</option>
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
										<option value="1">Yes</option>
										<option value="0">No</option>
									</select>
									@error('disabilities')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="present_address">Present Address<span class="text-danger">*</span></label>
									<input type="text" name="present_address" class="form-control @error('present_address') is-invalid @enderror" id="present_address" placeholder="Enter present address" value="{{ old('present_address') }}">
									@error('present_address')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="permanent_address">Permanent Address<span class="text-danger">*</span></label>
									<input type="text" name="permanent_address" class="form-control @error('permanent_address') is-invalid @enderror" id="permanent_address" placeholder="Enter permanent address" value="{{ old('permanent_address') }}">
									@error('permanent_address')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="computer_skill">Education Qualification <span class="text-danger">*</span></label>
									<select name="education_qualification" id="education_qualification" class="form-select @error('education_qualification') is-invalid @enderror">
										<option value="" disabled selected>-- Select Educational Qualification --</option>
										<option value="psc">PSC (Primary School Certificate)</option>
										<option value="jsc">JSC (Junior School Certificate)</option>
										<option value="ssc">SSC (Secondary School Certificate)</option>
										<option value="hsc">HSC (Higher Secondary Certificate)</option>
										<option value="diploma">Diploma</option>
										<option value="bachelor">Bachelor's Degree</option>
										<option value="masters">Master's Degree</option>
										<option value="mphil">M.Phil</option>
										<option value="phd">Ph.D</option>
										<option value="bmed">Bachelor of Medicine (MBBS)</option>
										<option value="bds">Bachelor of Dental Surgery (BDS)</option>
										<option value="bsc_engineering">B.Sc. in Engineering</option>
										<option value="mba">MBA (Master of Business Administration)</option>
									</select>

									@error('religion')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="pass_year">Passing Year<span class="text-danger">*</span></label>
									<input type="number" name="pass_year" class="form-control @error('pass_year') is-invalid @enderror" id="pass_year" placeholder="Enter passing year" value="{{ old('pass_year') }}">
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
									<input type="text" name="father_name" class="form-control @error('father_name') is-invalid @enderror" id="father_name" placeholder="Enter father name" value="{{ old('father_name') }}">
									@error('father_name')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="father_number">Father Contact Number <span class="text-danger">*</span></label>
									<input type="number" name="father_number" class="form-control @error('father_number') is-invalid @enderror" id="father_number" placeholder="Enter contact number" value="{{ old('father_number') }}">
									@error('father_number')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="mother_name">Mother Name <span class="text-danger">*</span></label>
									<input type="text" name="mother_name" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" placeholder="Enter mother name" value="{{ old('mother_name') }}">
									@error('mother_name')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="mother_number">Mother Contact Number <span class="text-danger">*</span></label>
									<input type="number" name="mother_number" class="form-control @error('mother_number') is-invalid @enderror" id="mother_number" placeholder="Enter contact number" value="{{ old('mother_number') }}">
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
									<textarea name="about" class="form-control @error('about') is-invalid @enderror" id="about" cols="30" rows="4" placeholder="Enter short description...">{{ old('about') }}</textarea>
									@error('about')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="marketplace">Earning / Marketplace <span class="text-danger">*</span></label>
									<textarea name="marketplace" class="form-control @error('marketplace') is-invalid @enderror" id="marketplace" cols="30" rows="4" placeholder="Enter earning or marketplace...">{{ old('marketplace') }}</textarea>
									@error('marketplace')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="linked_in">Linkedin <span class="text-danger">*</span></label>
									<input type="text" name="linked_in" class="form-control @error('linked_in') is-invalid @enderror" id="linked_in" placeholder="Enter linkedin" value="{{ old('linked_in') }}">
									@error('linked_in')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="upwork">Upwork <span class="text-danger">*</span></label>
									<input type="text" name="upwork" class="form-control @error('upwork') is-invalid @enderror" id="upwork" placeholder="Enter upwork" value="{{ old('upwork') }}">
									@error('upwork')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="fiver">Fiver <span class="text-danger">*</span></label>
									<input type="text" name="fiver" class="form-control @error('fiver') is-invalid @enderror" id="fiver" placeholder="Enter fiver" value="{{ old('fiver') }}">
									@error('fiver')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="link_three">Freelancing Link 03 <span class="text-danger">*</span></label>
									<input type="text" name="link_three" class="form-control @error('link_three') is-invalid @enderror" id="link_three" placeholder="Enter freelancing link 03" value="{{ old('link_three') }}">
									@error('link_three')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="form-label" for="link_four">Freelancing Link 04 <span class="text-danger">*</span></label>
									<input type="text" name="link_four" class="form-control @error('link_four') is-invalid @enderror" id="link_four" placeholder="Enter freelancing link 04" value="{{ old('link_four') }}">
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
												<option value="1">Active</option>
												<option value="2">Pending</option>
												<option value="3">Suspend</option>
												<option value="4">Blocked</option>
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
								<a href="{{ route('admin.users.index') }}" class="btn btn-danger waves-effect waves-light w-md"><i class="fa fa-arrow-left me-2"></i>Back Now</a>
								<button type="submit" class="btn btn-primary waves-effect waves-light w-md"><i class="fas fa-save me-2"></i>Submit Now</button>
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
			$('#branch').on('change', function() {
				var branchID = $(this).val();

				// Check if a valid branch is selected
				var url = "/admin/branch-to-batch/" + branchID;

				if (branchID > 0) {

					$('.batch__lists').html('<option>Loading...</option>');

					$.ajax({
						type: "GET",
						url: url,
						success: function(response) {
							$('.batch__lists').html(response);
						},
					});
				}

			}).trigger('change');
		});
	</script>
@endpush
