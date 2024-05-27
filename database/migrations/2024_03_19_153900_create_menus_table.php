<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); //Created_at and Updated_at
            $table->date('date'); //Date du menu
            $table->string('midi_soir'); //"midi" ou "soir" valeur seulement
            //Entrée
            $table->string('entree1');
            $table->tinyInteger('ab_entree1');
            $table->tinyInteger('toque_entree1');
            $table->string('entree2');
            $table->tinyInteger('ab_entree2');
            $table->tinyInteger('toque_entree2');
            $table->string('entree3');
            $table->tinyInteger('ab_entree3');
            $table->tinyInteger('toque_entree3');
            $table->string('entree4');
            $table->tinyInteger('ab_entree4');
            $table->tinyInteger('toque_entree4');
            //Plats
            $table->string('plat1');
            $table->tinyInteger('ab_plat1');
            $table->tinyInteger('toque_plat1');
            $table->string('plat2');
            $table->tinyInteger('ab_plat2');
            $table->tinyInteger('toque_plat2');
            $table->string('plat3');
            $table->tinyInteger('ab_plat3');
            $table->tinyInteger('toque_plat3');
            $table->string('plat4');
            $table->tinyInteger('ab_plat4');
            $table->tinyInteger('toque_plat4');
            //Accompagnements
            $table->string('accomp1');
            $table->tinyInteger('ab_accomp1');
            $table->tinyInteger('toque_accomp1');
            $table->string('accomp2');
            $table->tinyInteger('ab_accomp2');
            $table->tinyInteger('toque_accomp2');
            $table->string('accomp3');
            $table->tinyInteger('ab_accomp3');
            $table->tinyInteger('toque_accomp3');
            //Fromages
            $table->string('fromage1');
            $table->tinyInteger('ab_fromage1');
            $table->tinyInteger('europe_fromage1');
            $table->string('fromage2');
            $table->tinyInteger('ab_fromage2');
            $table->tinyInteger('europe_fromage2');
            $table->string('fromage3');
            $table->tinyInteger('ab_fromage3');
            $table->tinyInteger('europe_fromage3');
            $table->string('fromage4');
            $table->tinyInteger('ab_fromage4');
            $table->tinyInteger('europe_fromage4');
            //Désserts
            $table->string('dessert1');
            $table->tinyInteger('ab_dessert1');
            $table->tinyInteger('toque_dessert1');
            $table->tinyInteger('europe_dessert1');
            $table->string('dessert2');
            $table->tinyInteger('ab_dessert2');
            $table->tinyInteger('toque_dessert2');
            $table->tinyInteger('europe_dessert2');
            $table->string('dessert3');
            $table->tinyInteger('ab_dessert3');
            $table->tinyInteger('toque_dessert3');
            $table->tinyInteger('europe_dessert3');
            $table->string('dessert4');
            $table->tinyInteger('ab_dessert4');
            $table->tinyInteger('toque_dessert4');
            $table->tinyInteger('europe_dessert4');
            //Fruits
            $table->string('fruit1');
            $table->tinyInteger('ab_fruit1');
            $table->tinyInteger('europe_fruit1');
            $table->string('fruit2');
            $table->tinyInteger('ab_fruit2');
            $table->tinyInteger('europe_fruit2');
            $table->string('fruit3');
            $table->tinyInteger('ab_fruit3');
            $table->tinyInteger('europe_fruit3');
            $table->string('fruit4');
            $table->tinyInteger('ab_fruit4');
            $table->tinyInteger('europe_fruit4');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
