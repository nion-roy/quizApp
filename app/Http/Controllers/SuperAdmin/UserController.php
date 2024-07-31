<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $users = DB::table('users')->join('roles', 'users.role_id', '=', 'roles.id')->select('users.*', 'roles.name as role_name')->latest('id')->get();
    $roles = Role::get();
    return view('super-admin.users.index', compact('users', 'roles'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $roles = Role::get();
    $departments = Department::where('status', true)->get();
    return view('super-admin.users.create', compact('roles', 'departments'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {

    $user = new User();

    // user image
    $image = $request->file('image');
    $slug = $user->slug;
    if (isset($image)) {
      // make unique name for image
      $imageName = $slug . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
      // check post dir is exists
      if (!Storage::disk('public')->exists('users')) {
        Storage::disk('public')->makeDirectory('users');
      }
      // resize image for post add upload
      $resizeImage = Image::make($image)->resize(600, 600)->stream();
      Storage::disk('public')->put('users/' . $imageName, $resizeImage);
    } else {
      $imageName = 'user.png';
    }
    // user image

    // Assuming the role name is 'user'
    $role = Role::where('id', $request->role)->first();

    $user->name = $request->name;
    $user->username = $request->username;
    $user->slug = Str::slug($request->username);
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->role_id = $request->role;
    $user->status = $request->status;
    $user->image = $imageName;
    $user->save();

    $user->syncRoles($role->name);

    return redirect()->back()->with('success', 'You have create to user account successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $user = User::find($id);
    $roles = Role::get();
    $departments = Department::where('status', true)->get();
    return view('super-admin.users.edit', compact('user', 'roles', 'departments'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $user = User::findOrFail($id);

    // user image
    $image = $request->file('image');
    $slug = $user->slug;
    if (isset($image)) {
      // make unique name for image
      $imageName = $slug . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
      // check post dir is exists
      if (!Storage::disk('public')->exists('users')) {
        Storage::disk('public')->makeDirectory('users');
      }

      // check old image & delete is exists
      if (Storage::disk('public')->exists('users/' . $user->image)) {
        Storage::disk('public')->delete('users/' . $user->image);
      }

      // resize image for post add upload
      $resizeImage = Image::make($image)->resize(600, 600)->stream();
      Storage::disk('public')->put('users/' . $imageName, $resizeImage);
    } else {
      $imageName = $user->image;
    }
    // user image

    // Assuming the role name is 'user'
    $role = Role::where('id', $request->role)->first();

    $user->name = $request->name;
    $user->username = $request->username;
    $user->slug = Str::slug($request->username);
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->role_id = $request->role;
    $user->status = $request->status;
    $user->image = $imageName;
    $user->update();

    $user->syncRoles($role->name);

    return redirect()->back()->with('success', 'You have update to user account successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $user = User::findOrFail($id);

    if (Storage::disk('public')->exists('users/' . $user->image)) {
      Storage::disk('public')->delete('users/' . $user->image);
    }

    $user->delete();

    return redirect()->back()->with('success', 'You have delete to user account successfully.');
  }
}
