<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CRUDController extends Controller
{
	public function CRUD_create(MenuRequest $request): RedirectResponse
	{
		$validated = $request->validated();

		Menu::create($validated);

		return redirect()->route('cree_date')->with('status', 'menu_created');
	}

	public function CRUD_update(MenuRequest $request)
	{
		$this->force_fill($request);

		return Redirect::route('modifier_date')
			->with('status', 'menu_modified');
	}

	public function CRUD_read_update(MenuRequest $request)
	{
		$this->force_fill($request);

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

		return Redirect::route('voir_date', [
			'menuPast' => $menuPast,
			'menuPresent' => $menuPresent,
			'menuFuture' => $menuFuture,
		])->with('status', 'menu_modified');
	}

	public function CRUD_read(Request $request)
	{
		$menu = Menu::where('date', $request['date'])
			->where('midi_soir', $request['midi_soir'])
			->get()
			->toArray();

		if (!$menu) {
			return redirect()->back()->with('dontexist', [
				'date' => $request['date'],
				'midi_soir' => $request['midi_soir'],
			]);
		}

		return view('visual_read', [
			'menu' => $menu[0],
		]);
	}

	public function CRUD_delete(Request $request)
	{
		Menu::where('date', $request['date'])
			->where('midi_soir', $request['midi_soir'])
			->delete();

		date_default_timezone_set('Europe/Paris');
		$past = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') - 14, date('Y')));
		$present = date('Y-m-d');
		$future = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 14, date('Y')));

		$menuPast = Menu::select('date', 'midi_soir')
			->whereBetween('date', [$past, $present])
			->orderBy('date', 'asc')
			->orderBy('midi_soir', 'asc')
			->get()
			->toArray();

		$menuPresent = Menu::select('date', 'midi_soir')
			->where('date', $present)
			->get()
			->toArray();

		$menuFuture = Menu::select('date', 'midi_soir')
			->whereBetween('date', [$present, $future])
			->orderBy('date', 'asc')
			->orderBy('midi_soir', 'asc')
			->get()
			->toArray();

		return Redirect::route('voir_date', [
			'menuPast' => $menuPast,
			'menuPresent' => $menuPresent,
			'menuFuture' => $menuFuture,
		])->with('status', 'menu_deleted');
	}

	public function force_fill(MenuRequest $request)
	{
		$validated = $request->validated();

		$menu = Menu::where('date', $validated['date'])
			->where('midi_soir', $validated['midi_soir'])
			->first();

		if ($menu) {
			// Assuming $menu is the model instance you want to update
			$menu->date = $validated['date'];
			$menu->midi_soir = $validated['midi_soir'];

			$menu->entree_1 = $validated['entree_1'];
			$menu->entree_2 = $validated['entree_2'];
			$menu->entree_3 = $validated['entree_3'];
			$menu->entree_4 = $validated['entree_4'];
			$menu->plat_1 = $validated['plat_1'];
			$menu->plat_2 = $validated['plat_2'];
			$menu->plat_3 = $validated['plat_3'];
			$menu->plat_4 = $validated['plat_4'];
			$menu->accomp_1 = $validated['accomp_1'];
			$menu->accomp_2 = $validated['accomp_2'];
			$menu->accomp_3 = $validated['accomp_3'];
			$menu->accomp_4 = $validated['accomp_4'];
			$menu->fromage_1 = $validated['fromage_1'];
			$menu->fromage_2 = $validated['fromage_2'];
			$menu->fromage_3 = $validated['fromage_3'];
			$menu->fromage_4 = $validated['fromage_4'];
			$menu->dessert_1 = $validated['dessert_1'];
			$menu->dessert_2 = $validated['dessert_2'];
			$menu->dessert_3 = $validated['dessert_3'];
			$menu->dessert_4 = $validated['dessert_4'];
			$menu->fruit_1 = $validated['fruit_1'];
			$menu->fruit_2 = $validated['fruit_2'];
			$menu->fruit_3 = $validated['fruit_3'];
			$menu->fruit_4 = $validated['fruit_4'];

			if (isset($validated['ab_entree_1'])) {
				$menu->ab_entree_1 = '1';
			} else {
				$menu->ab_entree_1 = '0';
			}
			if (isset($validated['toque_entree_1'])) {
				$menu->toque_entree_1 = '1';
			} else {
				$menu->toque_entree_1 = '0';
			}
			if (isset($validated['ab_entree_2'])) {
				$menu->ab_entree_2 = '1';
			} else {
				$menu->ab_entree_2 = '0';
			}
			if (isset($validated['toque_entree_2'])) {
				$menu->toque_entree_2 = '1';
			} else {
				$menu->toque_entree_2 = '0';
			}
			if (isset($validated['ab_entree_3'])) {
				$menu->ab_entree_3 = '1';
			} else {
				$menu->ab_entree_3 = '0';
			}
			if (isset($validated['toque_entree_3'])) {
				$menu->toque_entree_3 = '1';
			} else {
				$menu->toque_entree_3 = '0';
			}
			if (isset($validated['ab_entree_4'])) {
				$menu->ab_entree_4 = '1';
			} else {
				$menu->ab_entree_4 = '0';
			}
			if (isset($validated['toque_entree_4'])) {
				$menu->toque_entree_4 = '1';
			} else {
				$menu->toque_entree_4 = '0';
			}

			if (isset($validated['ab_plat_1'])) {
				$menu->ab_plat_1 = '1';
			} else {
				$menu->ab_plat_1 = '0';
			}
			if (isset($validated['toque_plat_1'])) {
				$menu->toque_plat_1 = '1';
			} else {
				$menu->toque_plat_1 = '0';
			}
			if (isset($validated['ab_plat_2'])) {
				$menu->ab_plat_2 = '1';
			} else {
				$menu->ab_plat_2 = '0';
			}
			if (isset($validated['toque_plat_2'])) {
				$menu->toque_plat_2 = '1';
			} else {
				$menu->toque_plat_2 = '0';
			}
			if (isset($validated['ab_plat_3'])) {
				$menu->ab_plat_3 = '1';
			} else {
				$menu->ab_plat_3 = '0';
			}
			if (isset($validated['toque_plat_3'])) {
				$menu->toque_plat_3 = '1';
			} else {
				$menu->toque_plat_3 = '0';
			}
			if (isset($validated['ab_plat_4'])) {
				$menu->ab_plat_4 = '1';
			} else {
				$menu->ab_plat_4 = '0';
			}
			if (isset($validated['toque_plat_4'])) {
				$menu->toque_plat_4 = '1';
			} else {
				$menu->toque_plat_4 = '0';
			}

			if (isset($validated['ab_accomp_1'])) {
				$menu->ab_accomp_1 = '1';
			} else {
				$menu->ab_accomp_1 = '0';
			}
			if (isset($validated['toque_accomp_1'])) {
				$menu->toque_accomp_1 = '1';
			} else {
				$menu->toque_accomp_1 = '0';
			}
			if (isset($validated['ab_accomp_2'])) {
				$menu->ab_accomp_2 = '1';
			} else {
				$menu->ab_accomp_2 = '0';
			}
			if (isset($validated['toque_accomp_2'])) {
				$menu->toque_accomp_2 = '1';
			} else {
				$menu->toque_accomp_2 = '0';
			}
			if (isset($validated['ab_accomp_3'])) {
				$menu->ab_accomp_3 = '1';
			} else {
				$menu->ab_accomp_3 = '0';
			}
			if (isset($validated['toque_accomp_3'])) {
				$menu->toque_accomp_3 = '1';
			} else {
				$menu->toque_accomp_3 = '0';
			}
			if (isset($validated['ab_accomp_4'])) {
				$menu->ab_accomp_4 = '1';
			} else {
				$menu->ab_accomp_4 = '0';
			}
			if (isset($validated['toque_accomp_4'])) {
				$menu->toque_accomp_4 = '1';
			} else {
				$menu->toque_accomp_4 = '0';
			}

			if (isset($validated['ab_fromage_1'])) {
				$menu->ab_fromage_1 = '1';
			} else {
				$menu->ab_fromage_1 = '0';
			}
			if (isset($validated['europe_fromage_1'])) {
				$menu->europe_fromage_1 = '1';
			} else {
				$menu->europe_fromage_1 = '0';
			}
			if (isset($validated['ab_fromage_2'])) {
				$menu->ab_fromage_2 = '1';
			} else {
				$menu->ab_fromage_2 = '0';
			}
			if (isset($validated['europe_fromage_2'])) {
				$menu->europe_fromage_2 = '1';
			} else {
				$menu->europe_fromage_2 = '0';
			}
			if (isset($validated['ab_fromage_3'])) {
				$menu->ab_fromage_3 = '1';
			} else {
				$menu->ab_fromage_3 = '0';
			}
			if (isset($validated['europe_fromage_3'])) {
				$menu->europe_fromage_3 = '1';
			} else {
				$menu->europe_fromage_3 = '0';
			}
			if (isset($validated['ab_fromage_4'])) {
				$menu->ab_fromage_4 = '1';
			} else {
				$menu->ab_fromage_4 = '0';
			}

			if (isset($validated['ab_dessert_1'])) {
				$menu->ab_dessert_1 = '1';
			} else {
				$menu->ab_dessert_1 = '0';
			}
			if (isset($validated['toque_dessert_1'])) {
				$menu->toque_dessert_1 = '1';
			} else {
				$menu->toque_dessert_1 = '0';
			}
			if (isset($validated['ab_dessert_2'])) {
				$menu->ab_dessert_2 = '1';
			} else {
				$menu->ab_dessert_2 = '0';
			}
			if (isset($validated['toque_dessert_2'])) {
				$menu->toque_dessert_2 = '1';
			} else {
				$menu->toque_dessert_2 = '0';
			}
			if (isset($validated['ab_dessert_3'])) {
				$menu->ab_dessert_3 = '1';
			} else {
				$menu->ab_dessert_3 = '0';
			}
			if (isset($validated['toque_dessert_3'])) {
				$menu->toque_dessert_3 = '1';
			} else {
				$menu->toque_dessert_3 = '0';
			}
			if (isset($validated['ab_dessert_4'])) {
				$menu->ab_dessert_4 = '1';
			} else {
				$menu->ab_dessert_4 = '0';
			}
			if (isset($validated['toque_dessert_4'])) {
				$menu->toque_dessert_4 = '1';
			} else {
				$menu->toque_dessert_4 = '0';
			}

			if (isset($validated['ab_fruit_1'])) {
				$menu->ab_fruit_1 = '1';
			} else {
				$menu->ab_fruit_1 = '0';
			}
			if (isset($validated['europe_fruit_1'])) {
				$menu->europe_fruit_1 = '1';
			} else {
				$menu->europe_fruit_1 = '0';
			}
			if (isset($validated['ab_fruit_2'])) {
				$menu->ab_fruit_2 = '1';
			} else {
				$menu->ab_fruit_2 = '0';
			}
			if (isset($validated['europe_fruit_2'])) {
				$menu->europe_fruit_2 = '1';
			} else {
				$menu->europe_fruit_2 = '0';
			}
			if (isset($validated['ab_fruit_3'])) {
				$menu->ab_fruit_3 = '1';
			} else {
				$menu->ab_fruit_3 = '0';
			}
			if (isset($validated['europe_fruit_3'])) {
				$menu->europe_fruit_3 = '1';
			} else {
				$menu->europe_fruit_3 = '0';
			}
			if (isset($validated['ab_fruit_4'])) {
				$menu->ab_fruit_4 = '1';
			} else {
				$menu->ab_fruit_4 = '0';
			}
			if (isset($validated['europe_fruit_4'])) {
				$menu->europe_fruit_4 = '1';
			} else {
				$menu->europe_fruit_4 = '0';
			}

			$menu->save();
		} else {
			return redirect()->back()->withErrors('update_fail');
		}
	}
}
