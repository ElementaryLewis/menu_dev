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
					<img class="borderBox" src="{{ asset('img/svg/salade.svg') }}" alt="Entrée" />
				</div>
				<h5 class="XXLflexCenteredXY mb03 XXLcenter fcWhite pb1 uc">
					Entrée
				</h5>
			</div>
			<div class="mealContent">
				<div class="mealItem XXLflexCenteredXY">

					<span
						class="labelMeal bioAgri
						@if (isset($_POST['ab_entree1']) && $_POST['ab_entree1'] == 1) {{ 'display' }} 
						@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade
						@if (isset($_POST['toque_entree1']) && $_POST['toque_entree1'] == 1) {{ 'display' }} 
						@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['entree1'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_entree2']) && $_POST['ab_entree2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_entree2']) && $_POST['toque_entree2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['entree2'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_entree3']) && $_POST['ab_entree3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_entree3']) && $_POST['toque_entree3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['entree3'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY hide">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_entree4']) && $_POST['ab_entree4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_entree4']) && $_POST['toque_entree4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['entree4'] ?? '' }} </h6>
				</div>
			</div>
		</div>
		<div class="sep XXLspan-12 XXLw-80 XXLmAuto pt1 pb1"></div>
		<div id="platViewMode" class="XXLspan-12 XXLw-90 XXLmAuto pt1 pb1">
			<div class="title XXLw-100 XXLmAuto XXLflexCenteredXY">
				<div class="imageMeal XXLflexCenteredXY">
					<img class="borderBox" src="{{ asset('img/svg/plat.svg') }}" alt="Plat" />
				</div>
				<h5 class="XXLflexCenteredXY mb03 XXLcenter fcWhite pb1 uc">
					Plat
				</h5>
			</div>
			<div class="mealContent">
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_plat1']) && $_POST['ab_plat1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_plat1']) && $_POST['toque_plat1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['plat1'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_plat2']) && $_POST['ab_plat2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_plat2']) && $_POST['toque_plat2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['plat2'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_plat3']) && $_POST['ab_plat3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_plat3']) && $_POST['toque_plat3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['plat3'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY hide">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_plat4']) && $_POST['ab_plat4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_plat4']) && $_POST['toque_plat4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['plat4'] ?? '' }} </h6>
				</div>
			</div>
		</div>
		<div class="sep XXLspan-12 XXLw-80 XXLmAuto pt1 pb1"></div>
		<div id="accompagnementViewMode" class="XXLspan-12 XXLw-90 XXLmAuto pt1 pb1">
			<div class="title XXLw-100 XXLmAuto XXLflexCenteredXY">
				<div class="imageMeal XXLflexCenteredXY">
					<img class="borderBox" src="{{ asset('img/svg/accompagnement.svg') }}" alt="Accompagnement" />
				</div>
				<h5 class="XXLflexCenteredXY mb03 XXLcenter fcWhite pb1 uc">
					Accompagnement
				</h5>
			</div>
			<div class="mealContent">
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_accomp1']) && $_POST['ab_accomp1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_accomp1']) && $_POST['toque_accomp1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['accomp1'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_accomp2']) && $_POST['ab_accomp2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_accomp2']) && $_POST['toque_accomp2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['accomp2'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_accomp3']) && $_POST['ab_accomp3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_accomp3']) && $_POST['toque_accomp3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['accomp3'] ?? '' }} </h6>
				</div>
			</div>
		</div>
		<div class="sep XXLspan-12 XXLw-80 XXLmAuto pt1 pb1"></div>
		<div id="fromageViewMode" class="XXLspan-12 XXLw-90 XXLmAuto pt1 pb1">
			<div class="title XXLw-100 XXLmAuto XXLflexCenteredXY">
				<div class="imageMeal XXLflexCenteredXY">
					<img class="borderBox" src="{{ asset('img/svg/fromage.svg') }}" alt="Fromage" />
				</div>
				<h5 class="XXLflexCenteredXY mb03 XXLcenter fcWhite pb1 uc">
					Fromage
				</h5>
			</div>
			<div class="mealContent">
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_fromage1']) && $_POST['ab_fromage1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['europe_fromage1']) && $_POST['europe_fromage1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['fromage1'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_fromage2']) && $_POST['ab_fromage2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['europe_fromage2']) && $_POST['europe_fromage2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['fromage2'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_fromage3']) && $_POST['ab_fromage3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['europe_fromage3']) && $_POST['europe_fromage3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['fromage3'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY hide">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_fromage4']) && $_POST['ab_fromage4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['europe_fromage4']) && $_POST['europe_fromage4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['fromage4'] ?? '' }} </h6>
				</div>
			</div>
		</div>
		<div class="sep XXLspan-12 XXLw-80 XXLmAuto pt1 pb1"></div>
		<div id="dessertViewMode" class="XXLspan-12 XXLw-90 XXLmAuto pt1 pb1">
			<div class="title XXLw-100 XXLmAuto XXLflexCenteredXY">
				<div class="imageMeal XXLflexCenteredXY">
					<img class="borderBox" src="{{ asset('img/svg/dessert.svg') }}" alt="Dessert" />
				</div>
				<h5 class="XXLflexCenteredXY mb03 XXLcenter fcWhite pb1 uc">
					Dessert
				</h5>
			</div>
			<div class="mealContent">
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_dessert1']) && $_POST['ab_dessert1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_dessert1']) && $_POST['toque_dessert1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['europe_dessert1']) && $_POST['europe_dessert1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['dessert1'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_dessert2']) && $_POST['ab_dessert2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_dessert2']) && $_POST['toque_dessert2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['europe_dessert2']) && $_POST['europe_dessert2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['dessert2'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_dessert3']) && $_POST['ab_dessert3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_dessert3']) && $_POST['toque_dessert3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['europe_dessert3']) && $_POST['europe_dessert3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['dessert3'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY hide">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_dessert4']) && $_POST['ab_dessert4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal HandMade @if (isset($_POST['toque_dessert4']) && $_POST['toque_dessert4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['europe_dessert4']) && $_POST['europe_dessert4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['dessert4'] ?? '' }} </h6>
				</div>
			</div>
		</div>
		<div class="sep XXLspan-12 XXLw-80 XXLmAuto pt1 pb1"></div>
		<div id="fruitViewMode" class="XXLspan-12 XXLw-90 XXLmAuto pt1 pb1">
			<div class="title XXLw-100 XXLmAuto XXLflexCenteredXY">
				<div class="imageMeal XXLflexCenteredXY">
					<img class="borderBox" src="{{ asset('img/svg/fruit.svg') }}" alt="Fruit" />
				</div>
				<h5 class="XXLflexCenteredXY mb03 XXLcenter fcWhite pb1 uc">
					Fruit
				</h5>
			</div>
			<div class="mealContent">
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_fruit1']) && $_POST['ab_fruit1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['toque_fruit1']) && $_POST['toque_fruit1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['fruit1'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_fruit2']) && $_POST['ab_fruit2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['toque_fruit2']) && $_POST['toque_fruit2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['fruit2'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_fruit3']) && $_POST['ab_fruit3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['toque_fruit3']) && $_POST['toque_fruit3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['fruit3'] ?? '' }} </h6>
				</div>
				<div class="mealItem XXLflexCenteredXY">
					<span
						class="labelMeal bioAgri @if (isset($_POST['ab_fruit4']) && $_POST['ab_fruit4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
					<span
						class="labelMeal Europe @if (isset($_POST['toque_fruit4']) && $_POST['toque_fruit4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
					<h6 class="mb07 fcIce"> {{ $_POST['fruit4'] ?? '' }} </h6>
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
