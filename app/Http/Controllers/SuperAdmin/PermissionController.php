<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PermissionController extends Controller implements HasMiddleware
{

  public static function middleware(): array
  {
    return [
      new Middleware('permission:view permission', only: ['index']),
      new Middleware('permission:create permission', only: ['create']),
      new Middleware('permission:update permission', only: ['edit']),
      new Middleware('permission:delete permission', only: ['destroy']),
    ];
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $permissions = Permission::latest('id')->get();
    return view('super-admin.permissions.index', compact('permissions'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('super-admin.permissions.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {

    $request->validate([
      'name' => 'required|unique:permissions'
    ]);

    // Create the new permission
    $permission = new Permission();
    $permission->name = $request->name;
    $permission->save();

    return redirect()->back()->with('success', 'You have to create permission successfully.');
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
    $permission = Permission::findOrFail($id);
    return view('super-admin.permissions.edit', compact('permission'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $request->validate([
      'name' => 'required|unique:permissions,name,' . $id
    ]);

    $permission = Permission::findOrFail($id);
    $permission->name = $request->name;
    $permission->update();
    return redirect()->back()->with('success', 'You have to update permission successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Permission::findOrFail($id)->delete();
    return redirect()->back()->with('success', 'You have to delete permission successfully.');
  }
}
