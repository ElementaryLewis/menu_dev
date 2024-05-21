<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
	/**
	 * Update the user's password.
	 */
	public function update(Request $request): RedirectResponse
	{
		$validated = $request->validateWithBag('updatePassword', [
			'current_password' => [
				'required',
				'current_password',
				'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[&é(§è!çà)-_^$ù%:;.,?+*<>])[A-Za-z\d&é(§è!çà)-_^$ù%:;.,?+*<>]{8,}$/'
			],
			'password' => [
				'required',
				Password::defaults(),
				'confirmed',
				'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[&é(§è!çà)-_^$ù%:;.,?+*<>])[A-Za-z\d&é(§è!çà)-_^$ù%:;.,?+*<>]{8,}$/'
			],
		]);

		$request->user()->update([
			'password' => Hash::make($validated['password']),
		]);

		return back()->with('status', 'password-updated');
	}
}
