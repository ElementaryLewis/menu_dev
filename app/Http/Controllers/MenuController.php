<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class MenuController extends Controller
{
	public function index(): View
	{
		return view('index');
	}

	public function credits(): View
	{
		return view('credits');
	}

	public function contacts(): View
	{
		return view('contacts');
	}

	public function choose_create(): View
	{
		return view('choose_create');
	}

	public function choose_read(): View
	{
		date_default_timezone_set('Europe/Paris');
		$past = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') - 14, date('Y')));
		$past_present = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') - 1, date('Y')));
		//$present = date('Y-m-d', mktime(0, 0, 0, 5, 20, 2024));	//for testing
		$present = date('Y-m-d');
		$future = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 14, date('Y')));
		$future_present = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')));

		$menuPast = Menu::select('date', 'midi_soir')
			->whereBetween('date', [$past, $past_present])
			->orderBy('date', 'asc')
			->orderBy('midi_soir', 'asc')
			->get()
			->toArray();

		$menuPresent = Menu::select('date', 'midi_soir')
			->where('date', $present)
			->get()
			->toArray();

		$menuFuture = Menu::select('date', 'midi_soir')
			->whereBetween('date', [$future_present, $future])
			->orderBy('date', 'asc')
			->orderBy('midi_soir', 'asc')
			->get()
			->toArray();

		return view('choose_read', [
			'menuPast' => $menuPast,
			'menuPresent' => $menuPresent,
			'menuFuture' => $menuFuture,
		]);
	}

	public function choose_update(): View
	{
		return view('choose_update');
	}

	public function choose_delete(): View
	{
		return view('choose_update');
	}

	public function fill_create(Request $request)
	{
		$menu = Menu::where('date', $request['date'])->where('midi_soir', $request['midi_soir'])->first();

		if (!$menu) {
			return view('fill_create');
		}

		return redirect()->back()->with('exist', [
			'date' => $menu['date'],
			'midi_soir' => $menu['midi_soir'],
		]);
	}

	public function fill_read(Request $request)
	{
		$menu = Menu::where('date', $request['date'])->where('midi_soir', $request['midi_soir'])->first();

		if ($menu) {
			return view('fill_read', [
				'menu' => $menu,
			]);
		}

		return redirect()->back()->with('dontexist', [
			'date' => $request['date'],
			'midi_soir' => $request['midi_soir'],
		]);
	}

	public function fill_update(Request $request)
	{
		$menu = Menu::where('date', $request['date'])->where('midi_soir', $request['midi_soir'])->first();

		if ($menu) {
			return view('fill_update', [
				'menu' => $menu,
			]);
		}

		return redirect()->back()->with('exist', [
			'date' => $request['date'],
			'midi_soir' => $request['midi_soir'],
		]);
	}

	public function visual_create(MenuRequest $request)
	{
		if (!($request->validate($request->rules()))) {
			return redirect()->back()->withInput($request->input());
		}

		return view('visual_create');
	}

	public function visual_update(MenuRequest $request)
	{
		if (!($request->validate($request->rules()))) {
			return redirect()->back()->withInput($request->input());
		}

		return view('visual_update');
	}
}
