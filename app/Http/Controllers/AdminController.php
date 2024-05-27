<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 */
	public function show(): View
	{
		$users = User::all(); // Retrieve all users
		return view('admin.admin_users', ['users' => $users]);
	}

	public function view(Request $request)
	{
		$selectedUser = $request->input('user_id');

		// Find the user by email
		$user = User::where('id', $selectedUser)->first();

		// Check if the user exists
		if (!$user) {
			// Handle the case where the user is not found
			// For example, redirect back with an error message
			return back()->withErrors(['user_email' => __('User not found.')]);
		}

		// Return the view with the selected user
		return view('admin.admin_view', [
			'user' => $user,
		]);
	}

	public function edit(Request $request)
	{
		// Retrieve the selected user's email from the request
		$selectedUser = $request->input('user_id');

		// Find the user by email
		$user = User::where('id', $selectedUser)->first();

		// Check if the user exists
		if (!$user) {
			// Handle the case where the user is not found
			// For example, redirect back with an error message
			return back()->withErrors(['user_email' => __('User not found.')]);
		}

		// Return the view with the selected user
		return view('admin.admin_edit', [
			'user' => $user,
		]);
	}

	public function password(Request $request)
	{
		// Retrieve the selected user's email from the request
		$selectedUser = $request->input('user_id');

		// Find the user by email
		$user = User::where('id', $selectedUser)->first();

		// Check if the user exists
		if (!$user) {
			// Handle the case where the user is not found
			// For example, redirect back with an error message
			return back()->withErrors(['user_email' => __('User not found.')]);
		}

		// Return the view with the selected user
		return view('admin.admin_password', [
			'user' => $user,
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(ProfileUpdateRequest $request): RedirectResponse
	{
		$selectedUser = $request->input('user_id');
		$user = User::find($selectedUser);

		if (!$user) {
			return back()->withErrors(['user_id' => __('User not found.')]);
		}

		$user->firstname = $request->input('firstname');
		$user->surname = $request->input('surname');
		if ($request->has('email')) {
			$user->email = $request->input('email');
		}

		$user->save();

		$users = User::all();
		return Redirect::route('admin.users', ['users' => $users])
			->with('status', 'profile-updated');
	}

	public function update_password(Request $request): RedirectResponse
	{
		// Retrieve the selected user's email from the request
		$selectedUser = $request->input('user_id');

		// Find the user by email
		$user = User::find($selectedUser);

		if (!$user) {
			// Handle the case where the user is not found
			// For example, redirect back with an error message
			return back()->withErrors(['user_id' => __('User not found.')]);
		}

		$validated = $request->validateWithBag('updatePassword', [
			'user_id' => ['required', 'exists:users,id'],
			'password' => [
				'required',
				Password::defaults(),
				'confirmed',
				'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[&é(§è!çà)-_^$ù%:;.,?+*<>])[A-Za-z\d&é(§è!çà)-_^$ù%:;.,?+*<>]{8,}$/'
			],
		]);

		$user->update([
			'password' => Hash::make($validated['password']),
		]);

		$users = User::all();
		return Redirect::route('admin.users', ['users' => $users])
			->with('status', 'password-updated');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Request $request): RedirectResponse
	{
		$selectedUser = $request->input('user_id');

		$user = User::find($selectedUser);

		if (!$user) {
			return back()->withErrors(['user_id' => __('User not found.')]);
		}

		$user->delete();

		$users = User::all();
		return Redirect::route('admin.users', ['users' => $users])
			->with('status', 'profile-deleted');
	}
}