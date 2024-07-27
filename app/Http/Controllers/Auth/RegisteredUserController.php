<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
  /**
   * Display the registration view.
   */
  public function create(): View
  {
    return view('auth.register');
  }

  /**
   * Handle an incoming registration request.
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  public function store(Request $request): RedirectResponse
  {
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'username' => ['required', 'string', 'regex:/\w*$/', 'max:10', 'unique:users'],
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
      'password' => ['required'],
      'department_id' => ['required'],
      // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ], [
      'department_id' => 'The department field is required.',
    ]);


    // dd($request->all());

    $user = new User();
    $user->name = $request->name;
    $user->username = $request->username;
    $user->slug = Str::slug($request->username);
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();

    // $user = User::create([
    //   'name' => $request->name, 
    //   'email' => $request->email,
    //   'password' => Hash::make($request->password),
    // ]);

    event(new Registered($user));

    // Auth::login($user);
    Auth::logout();
    return redirect()->route('login')->with('success', 'Your account created successfully.!');

    // return redirect(route('dashboard', absolute: false));
  }
}
