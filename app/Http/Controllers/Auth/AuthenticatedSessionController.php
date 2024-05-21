<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{

	public function create(): View
	{
		return view('auth.login');
	}

	/**
	 * Handle an incoming authentication request.
	 */
	public function store(LoginRequest $request): RedirectResponse
	{
		$credentials = $request->validate([
			'email' => ['required', 'email'],
			'password' => [
				'required',
				'string',
				'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[&é(§è!çà)-_^$ù%:;.,?+*<>])[A-Za-z\d&é(§è!çà)-_^$ù%:;.,?+*<>]{8,}$/',
			],
		]);

		if (Auth::attempt($credentials, true)) {
			$request->authenticate();

			$request->session()->regenerate();

			return redirect()->intended(RouteServiceProvider::HOME)->withStatus('Connexion réussie !');
		}

		return back()->withErrors([
			'error' => 'wrong_input.',
		])->onlyInput('email');
	}

	/**
	 * Destroy an authenticated session.
	 */
	public function destroy(Request $request): RedirectResponse
	{
		Auth::guard('web')->logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		//return response()->noContent();
		return redirect()->intended(RouteServiceProvider::HOME);//->withStatus('Déconnexion réussie !');
	}
}
