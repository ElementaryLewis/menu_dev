<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class HomeController extends Controller
{
	public function index(): RedirectResponse
	{
		return Redirect::route('home');
	}

	public function home(): View
	{
		return view('home');
	}
}
