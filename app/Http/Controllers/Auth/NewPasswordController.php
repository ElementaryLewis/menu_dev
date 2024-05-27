<?php

namespace App\Http\Controllers\Auth;

use Closure;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
	/**
	 * Display the password reset view.
	 */
	public function create(Request $request): View
	{
		if (Auth::check()) {
			return view('auth.change-password');
		} else {
			return view('auth.reset-password', ['request' => $request]);
		}

	}

	/**
	 * Handle an incoming new password request.
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function store(Request $request): RedirectResponse
	{
		if (Auth::check()) {
			$user = Auth::user();

			$validated = $request->validate([
				'email' => ['required', 'email'],
				'current_password' => [
					'required',
					'string',
					function (string $attribute, mixed $value, Closure $fail) use ($user) {
						if (!Hash::check($value, $user->password)) {
							$fail(__('password'));
						}
					},
				],
				'password' => [
					'required',
					'confirmed',
					Rules\Password::defaults(),
					'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[&é(§è!çà)-_^$ù%:;.,?+*<>])[A-Za-z\d&é(§è!çà)-_^$ù%:;.,?+*<>]{8,}$/'
				],
			], [
				'password.regex' => __('Ensure your password has at least one uppercase, one lowercase, one number and one special character.'),
			]);

			$user->update([
				'password' => Hash::make($validated['password']),
			]);

			//return redirect()->intended(RouteServiceProvider::HOME)->withStatus(__('The password has been changed.'));
			return redirect()->route('profile.view')->with('status', 'password-updated');

		} else {
			$request->validate([
				'token' => ['required'],
				'email' => ['required', 'email'],
				'password' => [
					'required',
					'confirmed',
					Rules\Password::defaults(),
					'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[&é(§è!çà)-_^$ù%:;.,?+*<>])[A-Za-z\d&é(§è!çà)-_^$ù%:;.,?+*<>]{8,}$/'
				],
			]);

			// Here we will attempt to reset the user's password. If it is successful we
			// will update the password on an actual user model and persist it to the
			// database. Otherwise we will parse the error and return the response.
			$status = Password::reset(
				$request->only('email', 'password', 'password_confirmation', 'token'),
				function ($user) use ($request) {
					$user->forceFill([
						'password' => Hash::make($request->password),
						'remember_token' => Str::random(60),
					])->save();

					event(new PasswordReset($user));
				}
			);

			// If the password was successfully reset, we will redirect the user back to
			// the application's home authenticated view. If there is an error we can
			// redirect them back to where they came from with their error message.
			return $status == Password::PASSWORD_RESET
				? redirect()->route('login')->with('status', 'password_reset')
				: back()->withInput($request->only('email'))
					->withErrors(['email' => __($status)]);
		}
	}
}
