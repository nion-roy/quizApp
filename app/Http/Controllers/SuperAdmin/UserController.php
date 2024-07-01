<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    $users = User::latest('id')->get();
    return view('super-admin.users.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('super-admin.users.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $user = new User();
    $user->name = $request->name;
    $user->user_id = Auth::id();
    $user->username = $request->username;
    $user->slug = Str::slug($request->username);
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->role = $request->role;
    $user->status = $request->status;

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

    $user->image = $imageName;
    $user->save();

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
    return view('super-admin.users.edit', compact('user'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->username = $request->username;
    $user->slug = Str::slug($request->username);
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->role = $request->role;
    $user->status = $request->status;

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

    $user->image = $imageName;

    $user->update();
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
