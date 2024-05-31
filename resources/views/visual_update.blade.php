<!DOCTYPE html>
<html lang="fr" class="XXLh-100">
<x-doctype-layout> </x-doctype-layout>

<?php
header('Content-type: text/html; charset=UFT-8');
mb_internal_encoding('UTF-8');
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_fr');

$submittedDate = $_POST['date'];

// Create a DateTime object from the submitted date
$date = new DateTime($submittedDate);

$formatter = new IntlDateFormatter(
    'fr_FR', // Locale
    IntlDateFormatter::LONG, // Date type
    IntlDateFormatter::NONE, // Time type
    'Europe/Paris', // Timezone
    IntlDateFormatter::GREGORIAN, // Calendar
    'dd MMMM yyyy',
); // Custom pattern)

/*	echo 'DB_DATABASE: ' . getenv('DB_DATABASE') . PHP_EOL;
 * echo 'DB_USERNAME: ' . getenv('DB_USERNAME') . PHP_EOL;
 * echo 'DB_PASSWORD: ' . getenv('DB_PASSWORD') . PHP_EOL; */

// Format the date
$formattedDate = $formatter->format($date);
?>

<body>
	<div id="menuContainerEditMode"
		class="grid XXLw-90 XXLbr50 bgGlobalCheval XXLmAuto borderBox XXLflexVerticalAlignCenter">
		<div id="saladeViewMode" class="XXLspan-12 XXLw-90 XXLmAuto pt2 pb2">
			<div class="title XXLw-100 XXLmAuto XXLflexCenteredXY">
				<div class="specialDate hide"></div>
				<h4 id="titleSaladBar" class="XXLflexCenteredXY mb05 XXLcenter fcWhite uc">
					{{ $formattedDate }}<br>
					{{ $_POST['midi_soir'] }}
				</h4>
				<div class="specialDate hide"></div>
			</div>
		</div>
		<div id="saladeViewMode" class="XXLspan-12 XXLw-90 XXLmAuto pt2 pb2">
			<div class="title XXLw-100 XXLmAuto XXLflexCenteredXY">
				<div class="specialDate hide"></div>
				<h4 id="titleSaladBar" class="XXLflexCenteredXY mb05 XXLcenter fcWhite uc">
					Salad'Bar
				</h4>
				<div class="specialDate hide"></div>
			</div>
		</div>
		<div class="sep XXLspan-12 XXLw-80 XXLmAuto pt1 pb1"></div>
		<div id="entreeViewMode" class="XXLspan-12 XXLw-90 XXLmAuto pt1 pb1">
			<div class="title XXLw-100 XXLmAuto XXLflexCenteredXY">
				<div class="imageMeal XXLflexCenteredXY">
					<img class="fcWhite borderBox" src="{{ asset('img/svg/salade.svg') }}" alt="Icône de l'Entrée" />
				</div>
				<h5 class="XXLflexCenteredXY mb03 XXLcenter fcWhite pb1 uc">
					Entrée
				</h5>
			</div>
			<div class="mealContent">
				<div class="mealItem XXLflexCenteredXY">

					<span
						class="labelMeal bioAgri
						@if (isset($_POST['ab_entree_1']) && $_POST['ab_entree_1'] == 1) {{ 'display' }} 
						@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade
						@if (isset($_POST['toque_entree_1']) && $_POST['toque_entree_1'] == 1) {{ 'display' }} 
						@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['entree_1'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_entree_2']) && $_POST['ab_entree_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_entree_2']) && $_POST['toque_entree_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['entree_2'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_entree_3']) && $_POST['ab_entree_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_entree_3']) && $_POST['toque_entree_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['entree_3'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY hide">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_entree_4']) && $_POST['ab_entree_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_entree_4']) && $_POST['toque_entree_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['entree_4'] ?? '' }} </h6>
				</div>
			</div>
		</div>
		<div class="sep XXLspan-12 XXLw-80 XXLmAuto pt1 pb1"></div>
		<div id="platViewMode" class="XXLspan-12 XXLw-90 XXLmAuto pt1 pb1">
			<div class="title XXLw-100 XXLmAuto XXLflexCenteredXY">
				<div class="imageMeal XXLflexCenteredXY">
					<img class="fcWhite borderBox" src="{{ asset('img/svg/plat.svg') }}" alt="Icône du Plat" />
				</div>
				<h5 class="XXLflexCenteredXY mb03 XXLcenter fcWhite pb1 uc">
					Plat
				</h5>
			</div>
			<div class="mealContent">
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_plat_1']) && $_POST['ab_plat_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_plat_1']) && $_POST['toque_plat_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['plat_1'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_plat_2']) && $_POST['ab_plat_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_plat_2']) && $_POST['toque_plat_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['plat_2'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_plat_3']) && $_POST['ab_plat_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_plat_3']) && $_POST['toque_plat_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['plat_3'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY hide">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_plat_4']) && $_POST['ab_plat_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_plat_4']) && $_POST['toque_plat_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['plat_4'] ?? '' }} </h6>
				</div>
			</div>
		</div>
		<div class="sep XXLspan-12 XXLw-80 XXLmAuto pt1 pb1"></div>
		<div id="accompagnementViewMode" class="XXLspan-12 XXLw-90 XXLmAuto pt1 pb1">
			<div class="title XXLw-100 XXLmAuto XXLflexCenteredXY">
				<div class="imageMeal XXLflexCenteredXY">
					<img class="fcWhite borderBox" src="{{ asset('img/svg/accompagnement.svg') }}" alt="Icône de l'Accompagnement" />
				</div>
				<h5 class="XXLflexCenteredXY mb03 XXLcenter fcWhite pb1 uc">
					Accompagnement
				</h5>
			</div>
			<div class="mealContent">
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_accomp_1']) && $_POST['ab_accomp_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_accomp_1']) && $_POST['toque_accomp_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['accomp_1'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_accomp_2']) && $_POST['ab_accomp_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_accomp_2']) && $_POST['toque_accomp_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['accomp_2'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_accomp_3']) && $_POST['ab_accomp_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_accomp_3']) && $_POST['toque_accomp_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['accomp_3'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_accomp_4']) && $_POST['ab_accomp_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_accomp_4']) && $_POST['toque_accomp_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['accomp_4'] ?? '' }} </h6>
				</div>
			</div>
		</div>
		<div class="sep XXLspan-12 XXLw-80 XXLmAuto pt1 pb1"></div>
		<div id="fromageViewMode" class="XXLspan-12 XXLw-90 XXLmAuto pt1 pb1">
			<div class="title XXLw-100 XXLmAuto XXLflexCenteredXY">
				<div class="imageMeal XXLflexCenteredXY">
					<img class="fcWhite borderBox" src="{{ asset('img/svg/fromage.svg') }}" alt="Icône du Fromage" />
				</div>
				<h5 class="XXLflexCenteredXY mb03 XXLcenter fcWhite pb1 uc">
					Fromage
				</h5>
			</div>
			<div class="mealContent">
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_fromage_1']) && $_POST['ab_fromage_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['europe_fromage_1']) && $_POST['europe_fromage_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['fromage_1'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_fromage_2']) && $_POST['ab_fromage_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['europe_fromage_2']) && $_POST['europe_fromage_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['fromage_2'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_fromage_3']) && $_POST['ab_fromage_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['europe_fromage_3']) && $_POST['europe_fromage_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['fromage_3'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY hide">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_fromage_4']) && $_POST['ab_fromage_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['europe_fromage_4']) && $_POST['europe_fromage_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['fromage_4'] ?? '' }} </h6>
				</div>
			</div>
		</div>
		<div class="sep XXLspan-12 XXLw-80 XXLmAuto pt1 pb1"></div>
		<div id="dessertViewMode" class="XXLspan-12 XXLw-90 XXLmAuto pt1 pb1">
			<div class="title XXLw-100 XXLmAuto XXLflexCenteredXY">
				<div class="imageMeal XXLflexCenteredXY">
					<img class="fcWhiteborderBox" src="{{ asset('img/svg/dessert.svg') }}" alt="Icône du Dessert" />
				</div>
				<h5 class="XXLflexCenteredXY mb03 XXLcenter fcWhite pb1 uc">
					Dessert
				</h5>
			</div>
			<div class="mealContent">
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_dessert_1']) && $_POST['ab_dessert_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_dessert_1']) && $_POST['toque_dessert_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['dessert_1'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_dessert_2']) && $_POST['ab_dessert_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_dessert_2']) && $_POST['toque_dessert_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['dessert_2'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_dessert_3']) && $_POST['ab_dessert_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_dessert_3']) && $_POST['toque_dessert_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['dessert_3'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY hide">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_dessert_4']) && $_POST['ab_dessert_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_dessert_4']) && $_POST['toque_dessert_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['dessert_4'] ?? '' }} </h6>
				</div>
			</div>
		</div>
		<div class="sep XXLspan-12 XXLw-80 XXLmAuto pt1 pb1"></div>
		<div id="fruitViewMode" class="XXLspan-12 XXLw-90 XXLmAuto pt1 pb1">
			<div class="title XXLw-100 XXLmAuto XXLflexCenteredXY">
				<div class="imageMeal XXLflexCenteredXY">
					<img class="fcWhite borderBox" src="{{ asset('img/svg/fruit.svg') }}" alt="Icône du Fruit" />
				</div>
				<h5 class="XXLflexCenteredXY mb03 XXLcenter fcWhite pb1 uc">
					Fruit
				</h5>
			</div>
			<div class="mealContent">
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_fruit_1']) && $_POST['ab_fruit_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['europe_fruit_1']) && $_POST['europe_fruit_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['fruit_1'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_fruit_2']) && $_POST['ab_fruit_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['europe_fruit_2']) && $_POST['europe_fruit_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['fruit_2'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_fruit_3']) && $_POST['ab_fruit_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['europe_fruit_3']) && $_POST['europe_fruit_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['fruit_3'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_fruit_4']) && $_POST['ab_fruit_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['europe_fruit_4']) && $_POST['europe_fruit_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['fruit_4'] ?? '' }} </h6>
				</div>
			</div>
		</div>
	</div>
	<!-- BEGINNING : MENU MANAGER BUTTON'S FORM -->
	<div class="menuManager XXLw-100 XXLfixed blur grid">
		<form method="POST" action="{{ route('modifier_menu') }}"
			class="1 XXLflexCenteredXY pt1 pb1 XXLspan-6 Mspan-12">
			@csrf
			@method('POST')
			<?php foreach ($_POST as $key => $value): ?>
			<input type="hidden" name="<?= $key ?>" id="<?= $key ?>" value="<?= $value ?>">
			<?php endforeach ?>
			<button type="submit" id="openPopUp" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto">
				<div class="btnText bgEnseignementGeneral XXLbr50">
					Retour à l'éditeur
				</div>
				<div class="btnIcon fcdarkGrey XXLop0">
					<i class="fa-solid fa-pen-to-square"></i>
				</div>
			</button>
		</form>
		<form method="POST" action="{{ route('CRUD_update') }}"
			class="menuBtn XXLflexCenteredXY pt1 pb1 XXLspan-6 Mspan-12">
			@csrf
			@method('POST')
			<?php foreach ($_POST as $key => $value): ?>
			<input type="hidden" name="<?= $key ?>" id="<?= $key ?>" value="<?= $value ?>">
			<?php endforeach ?>
			<button type="submit" id="seeMenu" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto">
				<div class="btnText bgAgricultureElevage XXLbr50">
					Valider
				</div>
				<div class="btnIcon fcdarkGrey XXLop0">
					<i class="fa-solid fa-circle-check"></i>
				</div>
			</button>
		</form>
	</div>
	<!-- END : MENU MANAGER BUTTON'S FORM -->
	<script src="javascript.js" type="text/javascript"></script>
</body>

</html>
