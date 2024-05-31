<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'date' => ['required', 'date'],
			'midi_soir' => ['required', 'string'],
			'entree_1' => ['required', 'string', 'between:3,255'],
			'entree_2' => ['nullable', 'string', 'between:3,255'],
			'entree_3' => ['nullable', 'string', 'between:3,255'],
			'entree_4' => ['nullable', 'string', 'between:3,255'],
			'plat_1' => ['required', 'string', 'between:3,255'],
			'plat_2' => ['nullable', 'string', 'between:3,255'],
			'plat_3' => ['nullable', 'string', 'between:3,255'],
			'plat_4' => ['nullable', 'string', 'between:3,255'],
			'accomp_1' => ['required', 'string', 'between:3,255'],
			'accomp_2' => ['nullable', 'string', 'between:3,255'],
			'accomp_3' => ['nullable', 'string', 'between:3,255'],
			'accomp_4' => ['nullable', 'string', 'between:3,255'],
			'fromage_1' => ['nullable', 'string', 'between:3,255'],
			'fromage_2' => ['nullable', 'string', 'between:3,255'],
			'fromage_3' => ['nullable', 'string', 'between:3,255'],
			'fromage_4' => ['nullable', 'string', 'between:3,255'],
			'dessert_1' => ['required', 'string', 'between:3,255'],
			'dessert_2' => ['nullable', 'string', 'between:3,255'],
			'dessert_3' => ['nullable', 'string', 'between:3,255'],
			'dessert_4' => ['nullable', 'string', 'between:3,255'],
			'fruit_1' => ['nullable', 'string', 'between:3,255'],
			'fruit_2' => ['nullable', 'string', 'between:3,255'],
			'fruit_3' => ['nullable', 'string', 'between:3,255'],
			'fruit_4' => ['nullable', 'string', 'between:3,255'],
			'ab_entree_1' => ['nullable', 'integer'],
			'ab_entree_2' => ['nullable', 'integer'],
			'ab_entree_3' => ['nullable', 'integer'],
			'ab_entree_4' => ['nullable', 'integer'],
			'ab_plat_1' => ['nullable', 'integer'],
			'ab_plat_2' => ['nullable', 'integer'],
			'ab_plat_3' => ['nullable', 'integer'],
			'ab_plat_4' => ['nullable', 'integer'],
			'ab_accomp_1' => ['nullable', 'integer'],
			'ab_accomp_2' => ['nullable', 'integer'],
			'ab_accomp_3' => ['nullable', 'integer'],
			'ab_accomp_4' => ['nullable', 'integer'],
			'ab_fromage_1' => ['nullable', 'integer'],
			'ab_fromage_2' => ['nullable', 'integer'],
			'ab_fromage_3' => ['nullable', 'integer'],
			'ab_fromage_4' => ['nullable', 'integer'],
			'ab_dessert_1' => ['nullable', 'integer'],
			'ab_dessert_2' => ['nullable', 'integer'],
			'ab_dessert_3' => ['nullable', 'integer'],
			'ab_dessert_4' => ['nullable', 'integer'],
			'ab_fruit_1' => ['nullable', 'integer'],
			'ab_fruit_2' => ['nullable', 'integer'],
			'ab_fruit_3' => ['nullable', 'integer'],
			'ab_fruit_4' => ['nullable', 'integer'],
			'toque_entree_1' => ['nullable', 'integer'],
			'toque_entree_2' => ['nullable', 'integer'],
			'toque_entree_3' => ['nullable', 'integer'],
			'toque_entree_4' => ['nullable', 'integer'],
			'toque_plat_1' => ['nullable', 'integer'],
			'toque_plat_2' => ['nullable', 'integer'],
			'toque_plat_3' => ['nullable', 'integer'],
			'toque_plat_4' => ['nullable', 'integer'],
			'toque_accomp_1' => ['nullable', 'integer'],
			'toque_accomp_2' => ['nullable', 'integer'],
			'toque_accomp_3' => ['nullable', 'integer'],
			'toque_accomp_4' => ['nullable', 'integer'],
			'toque_dessert_1' => ['nullable', 'integer'],
			'toque_dessert_2' => ['nullable', 'integer'],
			'toque_dessert_3' => ['nullable', 'integer'],
			'toque_dessert_4' => ['nullable', 'integer'],
			'europe_fromage_1' => ['nullable', 'integer'],
			'europe_fromage_2' => ['nullable', 'integer'],
			'europe_fromage_3' => ['nullable', 'integer'],
			'europe_fromage_4' => ['nullable', 'integer'],
			'europe_fruit_1' => ['nullable', 'integer'],
			'europe_fruit_2' => ['nullable', 'integer'],
			'europe_fruit_3' => ['nullable', 'integer'],
			'europe_fruit_4' => ['nullable', 'integer'],
		];
	}

	public function withValidator()
	{

	}
}
