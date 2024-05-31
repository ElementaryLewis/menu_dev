<!DOCTYPE html>
<html lang="fr" class="XXLh-100">
<x-doctype-layout> </x-doctype-layout>
<?php
header('Content-type: text/html; charset=UFT-8');
mb_internal_encoding('UTF-8');
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_fr');

$submittedDate = $menu['date'];

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

<body class="XXLh-100vh">
	<div id="mainContainer">
		<div id="injectMenu">
			<x-header-layout>
			</x-header-layout>
		</div>
		<div id="menuContainerEditMode"
			class="grid XXLw-90 XXLbr50 bgGlobalCheval XXLmAuto borderBox XXLflexVerticalAlignCenter">
			<div id="saladeViewMode" class="XXLspan-12 XXLw-90 XXLmAuto pt2 pb2">
				<div class="title XXLw-100 XXLmAuto XXLflexCenteredXY">
					<div class="specialDate hide"></div>
					<h4 id="titleSaladBar" class="XXLflexCenteredXY mb05 XXLcenter fcWhite uc">
						{{ $formattedDate }}<br>
						{{ $menu['midi_soir'] }}
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
						@if (isset($menu['ab_entree_1']) && $menu['ab_entree_1'] == 1) {{ 'display' }} 
						@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal HandMade
						@if (isset($menu['toque_entree_1']) && $menu['toque_entree_1'] == 1) {{ 'display' }} 
						@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<h6 class="mb07 fcIce"> {{ $menu['entree_1'] ?? '' }} </h6>
					</div>
					<div class="mealItem XXLflexCenteredXY">
						<span
							class="labelMeal bioAgri @if (isset($menu['ab_entree_2']) && $menu['ab_entree_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal HandMade @if (isset($menu['toque_entree_2']) && $menu['toque_entree_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<h6 class="mb07 fcIce"> {{ $menu['entree_2'] ?? '' }} </h6>
					</div>
					<div class="mealItem XXLflexCenteredXY">
						<span
							class="labelMeal bioAgri @if (isset($menu['ab_entree_3']) && $menu['ab_entree_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal HandMade @if (isset($menu['toque_entree_3']) && $menu['toque_entree_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<h6 class="mb07 fcIce"> {{ $menu['entree_3'] ?? '' }} </h6>
					</div>
					<div class="mealItem XXLflexCenteredXY hide">
						<span
							class="labelMeal bioAgri @if (isset($menu['ab_entree_4']) && $menu['ab_entree_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal HandMade @if (isset($menu['toque_entree_4']) && $menu['toque_entree_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<h6 class="mb07 fcIce"> {{ $menu['entree_4'] ?? '' }} </h6>
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
							class="labelMeal bioAgri @if (isset($menu['ab_plat_1']) && $menu['ab_plat_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal HandMade @if (isset($menu['toque_plat_1']) && $menu['toque_plat_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<h6 class="mb07 fcIce"> {{ $menu['plat_1'] ?? '' }} </h6>
					</div>
					<div class="mealItem XXLflexCenteredXY">
						<span
							class="labelMeal bioAgri @if (isset($menu['ab_plat_2']) && $menu['ab_plat_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal HandMade @if (isset($menu['toque_plat_2']) && $menu['toque_plat_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<h6 class="mb07 fcIce"> {{ $menu['plat_2'] ?? '' }} </h6>
					</div>
					<div class="mealItem XXLflexCenteredXY">
						<span
							class="labelMeal bioAgri @if (isset($menu['ab_plat_3']) && $menu['ab_plat_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal HandMade @if (isset($menu['toque_plat_3']) && $menu['toque_plat_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<h6 class="mb07 fcIce"> {{ $menu['plat_3'] ?? '' }} </h6>
					</div>
					<div class="mealItem XXLflexCenteredXY hide">
						<span
							class="labelMeal bioAgri @if (isset($menu['ab_plat_4']) && $menu['ab_plat_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal HandMade @if (isset($menu['toque_plat_4']) && $menu['toque_plat_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<h6 class="mb07 fcIce"> {{ $menu['plat_4'] ?? '' }} </h6>
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
							class="labelMeal bioAgri @if (isset($menu['ab_accomp_1']) && $menu['ab_accomp_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal HandMade @if (isset($menu['toque_accomp_1']) && $menu['toque_accomp_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<h6 class="mb07 fcIce"> {{ $menu['accomp_1'] ?? '' }} </h6>
					</div>
					<div class="mealItem XXLflexCenteredXY">
						<span
							class="labelMeal bioAgri @if (isset($menu['ab_accomp_2']) && $menu['ab_accomp_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal HandMade @if (isset($menu['toque_accomp_2']) && $menu['toque_accomp_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<h6 class="mb07 fcIce"> {{ $menu['accomp_2'] ?? '' }} </h6>
					</div>
					<div class="mealItem XXLflexCenteredXY">
						<span
							class="labelMeal bioAgri @if (isset($menu['ab_accomp_3']) && $menu['ab_accomp_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal HandMade @if (isset($menu['toque_accomp_3']) && $menu['toque_accomp_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<h6 class="mb07 fcIce"> {{ $menu['accomp_3'] ?? '' }} </h6>
					</div>
					<div class="mealItem XXLflexCenteredXY">
						<span
							class="labelMeal bioAgri @if (isset($menu['ab_accomp_4']) && $menu['ab_accomp_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal HandMade @if (isset($menu['toque_accomp_4']) && $menu['toque_accomp_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<h6 class="mb07 fcIce"> {{ $menu['accomp_4'] ?? '' }} </h6>
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
							class="labelMeal bioAgri @if (isset($menu['ab_fromage_1']) && $menu['ab_fromage_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal Europe @if (isset($menu['europe_fromage_1']) && $menu['europe_fromage_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
						<h6 class="mb07 fcIce"> {{ $menu['fromage_1'] ?? '' }} </h6>
					</div>
					<div class="mealItem XXLflexCenteredXY">
						<span
							class="labelMeal bioAgri @if (isset($menu['ab_fromage_2']) && $menu['ab_fromage_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal Europe @if (isset($menu['europe_fromage_2']) && $menu['europe_fromage_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
						<h6 class="mb07 fcIce"> {{ $menu['fromage_2'] ?? '' }} </h6>
					</div>
					<div class="mealItem XXLflexCenteredXY">
						<span
							class="labelMeal bioAgri @if (isset($menu['ab_fromage_3']) && $menu['ab_fromage_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal Europe @if (isset($menu['europe_fromage_3']) && $menu['europe_fromage_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
						<h6 class="mb07 fcIce"> {{ $menu['fromage_3'] ?? '' }} </h6>
					</div>
					<div class="mealItem XXLflexCenteredXY hide">
						<span
							class="labelMeal bioAgri @if (isset($menu['ab_fromage_4']) && $menu['ab_fromage_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal Europe @if (isset($menu['europe_fromage_4']) && $menu['europe_fromage_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
						<h6 class="mb07 fcIce"> {{ $menu['fromage_4'] ?? '' }} </h6>
					</div>
				</div>
			</div>
			<div class="sep XXLspan-12 XXLw-80 XXLmAuto pt1 pb1"></div>
			<div id="dessertViewMode" class="XXLspan-12 XXLw-90 XXLmAuto pt1 pb1">
				<div class="title XXLw-100 XXLmAuto XXLflexCenteredXY">
					<div class="imageMeal XXLflexCenteredXY">
						<img class="fcWhite borderBox" src="{{ asset('img/svg/dessert.svg') }}" alt="Icône du Dessert" />
					</div>
					<h5 class="XXLflexCenteredXY mb03 XXLcenter fcWhite pb1 uc">
						Dessert
					</h5>
				</div>
				<div class="mealContent">
					<div class="mealItem XXLflexCenteredXY">
						<span
							class="labelMeal bioAgri @if (isset($menu['ab_dessert_1']) && $menu['ab_dessert_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal HandMade @if (isset($menu['toque_dessert_1']) && $menu['toque_dessert_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<h6 class="mb07 fcIce"> {{ $menu['dessert_1'] ?? '' }} </h6>
					</div>
					<div class="mealItem XXLflexCenteredXY">
						<span
							class="labelMeal bioAgri @if (isset($menu['ab_dessert_2']) && $menu['ab_dessert_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal HandMade @if (isset($menu['toque_dessert_2']) && $menu['toque_dessert_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<h6 class="mb07 fcIce"> {{ $menu['dessert_2'] ?? '' }} </h6>
					</div>
					<div class="mealItem XXLflexCenteredXY">
						<span
							class="labelMeal bioAgri @if (isset($menu['ab_dessert_3']) && $menu['ab_dessert_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal HandMade @if (isset($menu['toque_dessert_3']) && $menu['toque_dessert_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<h6 class="mb07 fcIce"> {{ $menu['dessert_3'] ?? '' }} </h6>
					</div>
					<div class="mealItem XXLflexCenteredXY hide">
						<span
							class="labelMeal bioAgri @if (isset($menu['ab_dessert_4']) && $menu['ab_dessert_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal HandMade @if (isset($menu['toque_dessert_4']) && $menu['toque_dessert_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<h6 class="mb07 fcIce"> {{ $menu['dessert_4'] ?? '' }} </h6>
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
							class="labelMeal bioAgri @if (isset($menu['ab_fruit_1']) && $menu['ab_fruit_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal Europe @if (isset($menu['europe_fruit_1']) && $menu['europe_fruit_1'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
						<h6 class="mb07 fcIce"> {{ $menu['fruit_1'] ?? '' }} </h6>
					</div>
					<div class="mealItem XXLflexCenteredXY">
						<span
							class="labelMeal bioAgri @if (isset($menu['ab_fruit_2']) && $menu['ab_fruit_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal Europe @if (isset($menu['europe_fruit_2']) && $menu['europe_fruit_2'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
						<h6 class="mb07 fcIce"> {{ $menu['fruit_2'] ?? '' }} </h6>
					</div>
					<div class="mealItem XXLflexCenteredXY">
						<span
							class="labelMeal bioAgri @if (isset($menu['ab_fruit_3']) && $menu['ab_fruit_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal Europe @if (isset($menu['europe_fruit_3']) && $menu['europe_fruit_3'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
						<h6 class="mb07 fcIce"> {{ $menu['fruit_3'] ?? '' }} </h6>
					</div>
					<div class="mealItem XXLflexCenteredXY">
						<span
							class="labelMeal bioAgri @if (isset($menu['ab_fruit_4']) && $menu['ab_fruit_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr07"></span>
						<span
							class="labelMeal Europe @if (isset($menu['europe_fruit_4']) && $menu['europe_fruit_4'] == 1) {{ 'display' }} 
					@else {{ 'hide' }} @endif XXLbr50 mb1 mr05"></span>
						<h6 class="mb07 fcIce"> {{ $menu['fruit_4'] ?? '' }} </h6>
					</div>
				</div>
			</div>
		</div>
		<div>
			<div class="XXLflexVerticalAlign XXLw-90 XXLmAuto XXLbr20">
				<form action="{{ route('CRUD_delete') }}" method="post">
					@csrf
					<input type="hidden" name="date" id="date" value="{{ $menu['date'] }}">
					<input type="hidden" name="midi_soir" id="midi_soir" value="{{ $menu['midi_soir'] }}">
					<button type="submit" id="openPopup" class="btnContainer pb1 XXLw-50 XLw-60 Mw-70 Sw-90 XXLmAuto mt1 mb1">
						<div class="btnText bgRed XXLbr50">Supprimer le menu</div>
						<div class="btnIcon fcdarkGrey XXLop0">
							<i class="fa-solid fa-trash-can fcBlack"></i>
						</div>
					</button>
				</form>
			</div>
		</div>
		<!-- BEGINNING : MENU MANAGER BUTTON'S FORM -->
		<div class="menuManager XXLw-100 XXLfixed blur grid">
			<form method="GET" action="{{ route('voir_date') }}" class="XXLflexCenteredXY pt1 pb1 XXLspan-6 Mspan-12">
				@csrf
				<button type="submit" id="openPopUp" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto">
					<div class="btnText bgEnseignementGeneral XXLbr50">
						Retour aux menus
					</div>
					<div class="btnIcon fcdarkGrey XXLop0">
						<i class="fa-solid fa-pen-to-square"></i>
					</div>
				</button>
			</form>
			<form method="POST" action="{{ route('voir_menu') }}"
				class="menuBtn XXLflexCenteredXY pt1 pb1 XXLspan-6 Mspan-12">
				@csrf
				@method('POST')
				<input type="hidden" name="date" id="date" value="{{ $menu['date'] }}" />
				<input type="hidden" name="midi_soir" id="midi_soir" value="{{ $menu['midi_soir'] }}" />
				<button type="submit" id="seeMenu" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto">
					<div class="btnText bgAgricultureElevage XXLbr50">
						Modifier
					</div>
					<div class="btnIcon fcdarkGrey XXLop0">
						<i class="fa-solid fa-circle-check"></i>
					</div>
				</button>
			</form>
		</div>
		<!-- END : MENU MANAGER BUTTON'S FORM -->
		<script src="javascript.js" type="text/javascript"></script>
		<div id="injectFooter">
			<x-footer-layout> </x-footer-layout>
		</div>
	</div>
</body>

</html>
