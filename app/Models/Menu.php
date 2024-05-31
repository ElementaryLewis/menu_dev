<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	use HasFactory;

	protected $guarded = ['id', 'created_at', 'updated_at'];

	protected $menu = [
		'date',
		'midi_soir',
		'entree_1',
		'entree_2',
		'entree_3',
		'entree_4',
		'plat_1',
		'plat_2',
		'plat_3',
		'plat_4',
		'accomp_1',
		'accomp_2',
		'accomp_3',
		'accomp_4',
		'fromage_1',
		'fromage_2',
		'fromage_3',
		'fromage_4',
		'dessert_1',
		'dessert_2',
		'dessert_3',
		'dessert_4',
		'fruit_1',
		'fruit_2',
		'fruit_3',
		'fruit_4',
		'ab_entree_1',
		'ab_entree_2',
		'ab_entree_3',
		'ab_entree_4',
		'ab_plat_1',
		'ab_plat_2',
		'ab_plat_3',
		'ab_plat_4',
		'ab_accomp_1',
		'ab_accomp_2',
		'ab_accomp_3',
		'ab_accomp_4',
		'ab_fromage_1',
		'ab_fromage_2',
		'ab_fromage_3',
		'ab_fromage_4',
		'ab_dessert_1',
		'ab_dessert_2',
		'ab_dessert_3',
		'ab_dessert_4',
		'ab_fruit_1',
		'ab_fruit_2',
		'ab_fruit_3',
		'ab_fruit_4',
		'toque_entree_1',
		'toque_entree_2',
		'toque_entree_3',
		'toque_entree_4',
		'toque_plat_1',
		'toque_plat_2',
		'toque_plat_3',
		'toque_plat_4',
		'toque_accomp_1',
		'toque_accomp_2',
		'toque_accomp_3',
		'toque_accomp_4',
		'toque_dessert_1',
		'toque_dessert_2',
		'toque_dessert_3',
		'toque_dessert_4',
		'europe_fromage_1',
		'europe_fromage_2',
		'europe_fromage_3',
		'europe_fromage_4',
		'europe_fruit_1',
		'europe_fruit_2',
		'europe_fruit_3',
		'europe_fruit_4',
	];

	public function getRouteKeyName(): string
	{
		return 'date' . 'midi_soir';
	}

	public function exists(): bool
	{
		return (bool) $this->id;
	}
}
