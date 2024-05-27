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
            'entree1' => ['required', 'string', 'between:3,255'],
            'entree2' => ['nullable', 'string', 'between:3,255'],
            'entree3' => ['nullable', 'string', 'between:3,255'],
            'entree4' => ['nullable', 'string', 'between:3,255'],
            'plat1' => ['required', 'string', 'between:3,255'],
            'plat2' => ['nullable', 'string', 'between:3,255'],
            'plat3' => ['nullable', 'string', 'between:3,255'],
            'plat4' => ['nullable', 'string', 'between:3,255'],
            'accomp1' => ['nullable', 'string', 'between:3,255'],
            'accomp2' => ['nullable', 'string', 'between:3,255'],
            'accomp3' => ['nullable', 'string', 'between:3,255'],
            'fromage1' => ['nullable', 'string', 'between:3,255'],
            'fromage2' => ['nullable', 'string', 'between:3,255'],
            'fromage3' => ['nullable', 'string', 'between:3,255'],
            'fromage4' => ['nullable', 'string', 'between:3,255'],
            'dessert1' => ['nullable', 'string', 'between:3,255'],
            'dessert2' => ['nullable', 'string', 'between:3,255'],
            'dessert3' => ['nullable', 'string', 'between:3,255'],
            'dessert4' => ['nullable', 'string', 'between:3,255'],
            'fruit1' => ['nullable', 'string', 'between:3,255'],
            'fruit2' => ['nullable', 'string', 'between:3,255'],
            'fruit3' => ['nullable', 'string', 'between:3,255'],
            'fruit4' => ['nullable', 'string', 'between:3,255'],
            'ab_entree1' => ['nullable', 'integer'],
            'ab_entree2' => ['nullable', 'integer'],
            'ab_entree3' => ['nullable', 'integer'],
            'ab_entree4' => ['nullable', 'integer'],
            'ab_plat1' => ['nullable', 'integer'],
            'ab_plat2' => ['nullable', 'integer'],
            'ab_plat3' => ['nullable', 'integer'],
            'ab_plat4' => ['nullable', 'integer'],
            'ab_accomp1' => ['nullable', 'integer'],
            'ab_accomp2' => ['nullable', 'integer'],
            'ab_accomp3' => ['nullable', 'integer'],
            'ab_fromage1' => ['nullable', 'integer'],
            'ab_fromage2' => ['nullable', 'integer'],
            'ab_fromage3' => ['nullable', 'integer'],
            'ab_fromage4' => ['nullable', 'integer'],
            'ab_dessert1' => ['nullable', 'integer'],
            'ab_dessert2' => ['nullable', 'integer'],
            'ab_dessert3' => ['nullable', 'integer'],
            'ab_dessert4' => ['nullable', 'integer'],
            'ab_fruit1' => ['nullable', 'integer'],
            'ab_fruit2' => ['nullable', 'integer'],
            'ab_fruit3' => ['nullable', 'integer'],
            'ab_fruit4' => ['nullable', 'integer'],
            'toque_entree1' => ['nullable', 'integer'],
            'toque_entree2' => ['nullable', 'integer'],
            'toque_entree3' => ['nullable', 'integer'],
            'toque_entree4' => ['nullable', 'integer'],
            'toque_plat1' => ['nullable', 'integer'],
            'toque_plat2' => ['nullable', 'integer'],
            'toque_plat3' => ['nullable', 'integer'],
            'toque_plat4' => ['nullable', 'integer'],
            'toque_accomp1' => ['nullable', 'integer'],
            'toque_accomp2' => ['nullable', 'integer'],
            'toque_accomp3' => ['nullable', 'integer'],
            'toque_dessert1' => ['nullable', 'integer'],
            'toque_dessert2' => ['nullable', 'integer'],
            'toque_dessert3' => ['nullable', 'integer'],
            'toque_dessert4' => ['nullable', 'integer'],
            'europe_fromage1' => ['nullable', 'integer'],
            'europe_fromage2' => ['nullable', 'integer'],
            'europe_fromage3' => ['nullable', 'integer'],
            'europe_fromage4' => ['nullable', 'integer'],
            'europe_dessert1' => ['nullable', 'integer'],
            'europe_dessert2' => ['nullable', 'integer'],
            'europe_dessert3' => ['nullable', 'integer'],
            'europe_dessert4' => ['nullable', 'integer'],
            'europe_fruit1' => ['nullable', 'integer'],
            'europe_fruit2' => ['nullable', 'integer'],
            'europe_fruit3' => ['nullable', 'integer'],
            'europe_fruit4' => ['nullable', 'integer'],
        ];
    }

    public function withValidator()
    {

    }
}
