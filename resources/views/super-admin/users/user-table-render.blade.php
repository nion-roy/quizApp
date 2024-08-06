<table class="table table-bordered dt-responsive nowrap w-100 align-middle">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>Create Account</th>
			<th>Active</th>
			<th>Role</th>
			<th>Status</th>
			@if (Auth::user()->can('update user') || Auth::user()->can('delete user'))
				<th>Action</th>
			@endif
		</tr>
	</thead>

	<tbody>
		@foreach ($users as $key => $user)
			<tr>
				<td>{{ getStrPad($key + 1) }}</td>
				<td>
					<div class="user_info">
						@if ($user->image == 'user.png' || $user->image == null)
							<img src="{{ asset('default/user.png') }}" alt="{{ $user->name }}" class="img-fluid rounded-circle img-thumbnail me-2" style="width: 40px; height: 40px;">
						@else
							<img src="{{ asset('storage/users/' . $user->image) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle img-thumbnail me-2" style="width: 40px; height: 40px;">
						@endif

						{{ $user->name }}
					</div>
				</td>
				<td>{{ $user->username }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ Carbon\Carbon::parse($user->created_at)->format('d-M-Y') }} <span class="m-0 font-size-11">{{ Carbon\Carbon::parse($user->created_at)->format('g:i a') }}</span></td>

				<td>
					@if (Cache::has('user-is-online-' . $user->id))
						<span class="text-success fw-bold">Online</span>
					@else
						@if ($user->last_activity)
							{{ Carbon\Carbon::parse($user->last_activity)->diffForHumans() }}
						@else
							<span class="text-danger fw-bold">Offline</span>
						@endif
					@endif
				</td>

				<td> <span class="btn btn-success btn-sm">{{ $user->role_name }} </span> </td>

				<td>
					@if ($user->status == 1)
						<span class="btn btn-success btn-sm">Active</span>
					@elseif ($user->status == 2)
						<span class="btn btn-info btn-sm">Pending</span>
					@elseif ($user->status == 3)
						<span class="btn btn-warning btn-sm">Susspend</span>
					@elseif ($user->status == 4)
						<span class="btn btn-danger btn-sm">Blocked</span>
					@endif
				</td>

				@if (Auth::user()->can('update user') || Auth::user()->can('delete user'))
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
							<div class="dropdown-menu" style="">
								@can('update user')
									<a href="{{ route('admin.users.edit', $user->id) }}" class="dropdown-item">Edit</a>
								@endcan
								@can('delete user')
									<form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
										@csrf
										@method('DELETE')
										<button type="button" class="dropdown-item delete-button">Delete</button>
									</form>
								@endcan
							</div>
						</div>
					</td>
				@endif
			</tr>
		@endforeach
	</tbody>
</table>
