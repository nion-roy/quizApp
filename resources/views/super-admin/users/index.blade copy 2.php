@extends('layouts.backend.app')

@section('title', 'Users')

@section('main_content')
<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0 font-size-18">All Users !</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
          <li class="breadcrumb-item active">All Users</li>
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
        <div class="row align-items-center justify-content-between">
          <div class="col-md-3 d-flex align-items-center gap-2">
            <span class="m-0 w-50">Filter By</span>
            <select name="role" id="role" class="form-select text-capitalize" onchange="filterStatus()">
              <option value="0" selected>All</option>
              @foreach ($roles as $role)
              <option value="{{ $role->id }}" {{ request()->role == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
              @endforeach
            </select>




          </div>
          <div class="col-md-2">
            @can('create role')
            <a class="btn btn-success waves-effect waves-light" href="{{ route('admin.users.create') }}"><i class="fa fa-plus-circle me-2"></i> Add New User</a>
            @endcan
          </div>
        </div>
      </div>

      <div class="card-body">
        <table id="users-table" class="display">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
            </tr>
          </thead>


          <tbody> </tbody>

        </table>
      </div>
    </div>
  </div>
  <!-- end col -->
</div>
<!-- end row -->
@endsection



@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css">
@endpush


@push('js')
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
{{-- <script>
		$(document).ready(function() {
			new DataTable('#users-table', {
				ajax: '/admin/users',
				processing: true,
				serverSide: true,
				columns: [{
						data: 'id',
						name: 'id'
					}, 
					{
						data: 'email',
						name: 'email'
					},
				]
			});
		});
	</script> --}}

<script>
  $(document).ready(function() {
    $('#users-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: '/admin/users',
        data: function(d) {
          d.role = $('#role').val();
        }
      },
      columns: [{
          data: 'id',
          name: 'id'
        },
        {
          data: 'name',
          name: 'name'
        },
        {
          data: 'email',
          name: 'email'
        },
        {
          data: 'role_name',
          name: 'role_name'
        },
        // Add other columns as necessary
      ]
    });

    $('#roleFilter').change(function() {
      $('#users-table').DataTable().draw();
    });
  });
</script>
@endpush


public function index(Request $request)
{
$roleID = $request->role ?? 0;
$roles = Role::all();

if ($request->ajax()) {
$usersQuery = User::join('roles', 'users.role_id', '=', 'roles.id')
->select('users.*', 'roles.name as role_name')
->latest('users.id');

if ($roleID != 0) {
$usersQuery->where('role_id', $roleID);
}

return DataTables::of($usersQuery)->make(true);
}

return view('super-admin.users.index', compact('roles'));
}