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
        ])->with('status', 'menu_modified');
    }

    public function CRUD_read(Request $request)
    {
        $menu = Menu::where('date', $request['date'])
            ->where('midi_soir', $request['midi_soir'])
            ->get()
            ->toArray();

        if (! $menu) {
            return redirect()->back()->with('dontexist', [
                'date' => $request['date'],
                'midi_soir' => $request['midi_soir'],
            ]);
        }

        $menu = Menu::where('date', $request['date'])
            ->where('midi_soir', $request['midi_soir'])
            ->get()
            ->toArray();

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

            $menu->entree1 = $validated['entree1'];
            $menu->entree2 = $validated['entree2'];
            $menu->entree3 = $validated['entree3'];
            $menu->entree4 = $validated['entree4'];
            $menu->plat1 = $validated['plat1'];
            $menu->plat2 = $validated['plat2'];
            $menu->plat3 = $validated['plat3'];
            $menu->plat4 = $validated['plat4'];
            $menu->accomp1 = $validated['accomp1'];
            $menu->accomp2 = $validated['accomp2'];
            $menu->accomp3 = $validated['accomp3'];
            $menu->fromage1 = $validated['fromage1'];
            $menu->fromage2 = $validated['fromage2'];
            $menu->fromage3 = $validated['fromage3'];
            $menu->fromage4 = $validated['fromage4'];
            $menu->dessert1 = $validated['dessert1'];
            $menu->dessert2 = $validated['dessert2'];
            $menu->dessert3 = $validated['dessert3'];
            $menu->dessert4 = $validated['dessert4'];
            $menu->fruit1 = $validated['fruit1'];
            $menu->fruit2 = $validated['fruit2'];
            $menu->fruit3 = $validated['fruit3'];
            $menu->fruit4 = $validated['fruit4'];

            if (isset($validated['ab_entree1'])) {
                $menu->ab_entree1 = '1';
            } else {
                $menu->ab_entree1 = '0';
            }
            if (isset($validated['toque_entree1'])) {
                $menu->toque_entree1 = '1';
            } else {
                $menu->toque_entree1 = '0';
            }
            if (isset($validated['ab_entree2'])) {
                $menu->ab_entree2 = '1';
            } else {
                $menu->ab_entree2 = '0';
            }
            if (isset($validated['toque_entree2'])) {
                $menu->toque_entree2 = '1';
            } else {
                $menu->toque_entree2 = '0';
            }
            if (isset($validated['ab_entree3'])) {
                $menu->ab_entree3 = '1';
            } else {
                $menu->ab_entree3 = '0';
            }
            if (isset($validated['toque_entree3'])) {
                $menu->toque_entree3 = '1';
            } else {
                $menu->toque_entree3 = '0';
            }
            if (isset($validated['ab_entree4'])) {
                $menu->ab_entree4 = '1';
            } else {
                $menu->ab_entree4 = '0';
            }
            if (isset($validated['toque_entree4'])) {
                $menu->toque_entree4 = '1';
            } else {
                $menu->toque_entree4 = '0';
            }

            if (isset($validated['ab_plat1'])) {
                $menu->ab_plat1 = '1';
            } else {
                $menu->ab_plat1 = '0';
            }
            if (isset($validated['toque_plat1'])) {
                $menu->toque_plat1 = '1';
            } else {
                $menu->toque_plat1 = '0';
            }
            if (isset($validated['ab_plat2'])) {
                $menu->ab_plat2 = '1';
            } else {
                $menu->ab_plat2 = '0';
            }
            if (isset($validated['toque_plat2'])) {
                $menu->toque_plat2 = '1';
            } else {
                $menu->toque_plat2 = '0';
            }
            if (isset($validated['ab_plat3'])) {
                $menu->ab_plat3 = '1';
            } else {
                $menu->ab_plat3 = '0';
            }
            if (isset($validated['toque_plat3'])) {
                $menu->toque_plat3 = '1';
            } else {
                $menu->toque_plat3 = '0';
            }
            if (isset($validated['ab_plat4'])) {
                $menu->ab_plat4 = '1';
            } else {
                $menu->ab_plat4 = '0';
            }
            if (isset($validated['toque_plat4'])) {
                $menu->toque_plat4 = '1';
            } else {
                $menu->toque_plat4 = '0';
            }

            if (isset($validated['ab_accomp1'])) {
                $menu->ab_accomp1 = '1';
            } else {
                $menu->ab_accomp1 = '0';
            }
            if (isset($validated['toque_accomp1'])) {
                $menu->toque_accomp1 = '1';
            } else {
                $menu->toque_accomp1 = '0';
            }
            if (isset($validated['ab_accomp2'])) {
                $menu->ab_accomp2 = '1';
            } else {
                $menu->ab_accomp2 = '0';
            }
            if (isset($validated['toque_accomp2'])) {
                $menu->toque_accomp2 = '1';
            } else {
                $menu->toque_accomp2 = '0';
            }
            if (isset($validated['ab_accomp3'])) {
                $menu->ab_accomp3 = '1';
            } else {
                $menu->ab_accomp3 = '0';
            }
            if (isset($validated['toque_accomp3'])) {
                $menu->toque_accomp3 = '1';
            } else {
                $menu->toque_accomp3 = '0';
            }

            if (isset($validated['ab_fromage1'])) {
                $menu->ab_fromage1 = '1';
            } else {
                $menu->ab_fromage1 = '0';
            }
            if (isset($validated['europe_fromage1'])) {
                $menu->europe_fromage1 = '1';
            } else {
                $menu->europe_fromage1 = '0';
            }
            if (isset($validated['ab_fromage2'])) {
                $menu->ab_fromage2 = '1';
            } else {
                $menu->ab_fromage2 = '0';
            }
            if (isset($validated['europe_fromage2'])) {
                $menu->europe_fromage2 = '1';
            } else {
                $menu->europe_fromage2 = '0';
            }
            if (isset($validated['ab_fromage3'])) {
                $menu->ab_fromage3 = '1';
            } else {
                $menu->ab_fromage3 = '0';
            }
            if (isset($validated['europe_fromage3'])) {
                $menu->europe_fromage3 = '1';
            } else {
                $menu->europe_fromage3 = '0';
            }
            if (isset($validated['ab_fromage4'])) {
                $menu->ab_fromage4 = '1';
            } else {
                $menu->ab_fromage4 = '0';
            }
            if (isset($validated['europe_dessert4'])) {
                $menu->europe_dessert4 = '1';
            } else {
                $menu->europe_dessert4 = '0';
            }

            if (isset($validated['ab_dessert1'])) {
                $menu->ab_dessert1 = '1';
            } else {
                $menu->ab_dessert1 = '0';
            }
            if (isset($validated['toque_dessert1'])) {
                $menu->toque_dessert1 = '1';
            } else {
                $menu->toque_dessert1 = '0';
            }
            if (isset($validated['europe_dessert1'])) {
                $menu->europe_dessert1 = '1';
            } else {
                $menu->europe_dessert1 = '0';
            }
            if (isset($validated['ab_dessert2'])) {
                $menu->ab_dessert2 = '1';
            } else {
                $menu->ab_dessert2 = '0';
            }
            if (isset($validated['toque_dessert2'])) {
                $menu->toque_dessert2 = '1';
            } else {
                $menu->toque_dessert2 = '0';
            }
            if (isset($validated['europe_dessert2'])) {
                $menu->europe_dessert2 = '1';
            } else {
                $menu->europe_dessert2 = '0';
            }
            if (isset($validated['ab_dessert3'])) {
                $menu->ab_dessert3 = '1';
            } else {
                $menu->ab_dessert3 = '0';
            }
            if (isset($validated['toque_dessert3'])) {
                $menu->toque_dessert3 = '1';
            } else {
                $menu->toque_dessert3 = '0';
            }
            if (isset($validated['europe_dessert3'])) {
                $menu->europe_dessert3 = '1';
            } else {
                $menu->europe_dessert3 = '0';
            }
            if (isset($validated['ab_dessert4'])) {
                $menu->ab_dessert4 = '1';
            } else {
                $menu->ab_dessert4 = '0';
            }
            if (isset($validated['toque_dessert4'])) {
                $menu->toque_dessert4 = '1';
            } else {
                $menu->toque_dessert4 = '0';
            }
            if (isset($validated['europe_dessert4'])) {
                $menu->europe_dessert4 = '1';
            } else {
                $menu->europe_dessert4 = '0';
            }

            if (isset($validated['ab_fruit1'])) {
                $menu->ab_fruit1 = '1';
            } else {
                $menu->ab_fruit1 = '0';
            }
            if (isset($validated['europe_fruit1'])) {
                $menu->europe_fruit1 = '1';
            } else {
                $menu->europe_fruit1 = '0';
            }
            if (isset($validated['ab_fruit2'])) {
                $menu->ab_fruit2 = '1';
            } else {
                $menu->ab_fruit2 = '0';
            }
            if (isset($validated['europe_fruit2'])) {
                $menu->europe_fruit2 = '1';
            } else {
                $menu->europe_fruit2 = '0';
            }
            if (isset($validated['ab_fruit3'])) {
                $menu->ab_fruit3 = '1';
            } else {
                $menu->ab_fruit3 = '0';
            }
            if (isset($validated['europe_fruit3'])) {
                $menu->europe_fruit3 = '1';
            } else {
                $menu->europe_fruit3 = '0';
            }
            if (isset($validated['ab_fruit4'])) {
                $menu->ab_fruit4 = '1';
            } else {
                $menu->ab_fruit4 = '0';
            }
            if (isset($validated['europe_fruit4'])) {
                $menu->europe_fruit4 = '1';
            } else {
                $menu->europe_fruit4 = '0';
            }

            $menu->save();
        } else {
            return redirect()->back()->withErrors('update_fail');
        }
    }
}
