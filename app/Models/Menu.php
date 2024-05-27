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
        'entree1',
        'entree2',
        'entree3',
        'entree4',
        'plat1',
        'plat2',
        'plat3',
        'plat4',
        'accomp1',
        'accomp2',
        'accomp3',
        'accomp4',
        'fromage1',
        'fromage2',
        'fromage3',
        'fromage4',
        'dessert1',
        'dessert2',
        'dessert3',
        'dessert4',
        'fruit1',
        'fruit2',
        'fruit3',
        'fruit4',
        'ab_entree1',
        'ab_entree2',
        'ab_entree3',
        'ab_entree4',
        'ab_plat1',
        'ab_plat2',
        'ab_plat3',
        'ab_plat4',
        'ab_accomp1',
        'ab_accomp2',
        'ab_accomp3',
        'ab_accomp4',
        'ab_fromage1',
        'ab_fromage2',
        'ab_fromage3',
        'ab_fromage4',
        'ab_dessert1',
        'ab_dessert2',
        'ab_dessert3',
        'ab_dessert4',
        'ab_fruit1',
        'ab_fruit2',
        'ab_fruit3',
        'ab_fruit4',
        'toque_entree1',
        'toque_entree2',
        'toque_entree3',
        'toque_entree4',
        'toque_plat1',
        'toque_plat2',
        'toque_plat3',
        'toque_plat4',
        'toque_accomp1',
        'toque_accomp2',
        'toque_accomp3',
        'toque_accomp4',
        'toque_dessert1',
        'toque_dessert2',
        'toque_dessert3',
        'toque_dessert4',
        'europe_fromage1',
        'europe_fromage2',
        'europe_fromage3',
        'europe_fromage4',
        'europe_dessert1',
        'europe_dessert2',
        'europe_dessert3',
        'europe_dessert4',
        'europe_fruit1',
        'europe_fruit2',
        'europe_fruit3',
        'europe_fruit4',
    ];

    public function getRouteKeyName(): string
    {
        return 'date'.'midi_soir';
    }

    public function exists(): bool
    {
        return (bool) $this->id;
    }
}
