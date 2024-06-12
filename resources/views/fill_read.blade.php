<!DOCTYPE html>
<html lang="fr" class="XXLh-100">
<x-doctype-layout> </x-doctype-layout>
<?php
header('Content-type: text/html; charset=UFT-8');
mb_internal_encoding('UTF-8');
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_fr');

$datePost = old('date') ?? $_POST['date'];
$submittedDate = $datePost;

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

<body class="XXLh-100vh bgIce">
	<div id="mainContainer">
		<div id="injectMenu">
			<x-headedition-layout>
			</x-headedition-layout>
			<!-- BEGINNING : POPUP RETOUR ANNULER -->
			<div id="popUp" class="XXLfixed XXLw-100 XXLflexCenteredXY">
				<div class="popUpContainer XXLw-80">
					<div id="closePopUp" class="XXLw-90 XXLflexEndRow">
						<a href="javascript:void(0)" class="tdNone fcDarkGrey bgAgricultureElevage XXLBordOrange XXLbr50"
							onclick="togglePupUp()">
							<h5 class="XXLmAuto">
								<i class="fa-solid fa-circle-xmark"></i>
							</h5>
						</a>
					</div>
					<div class="bgAgricultureElevage XXLbr20 p2 grid">
						<div class="XXLspan-12 mb2">
							<h6 class="XXLmAuto XXLw-100 XXLcenter">
								<i class="fa-solid fa-triangle-exclamation"></i>
								Etes vous sûr de vouloir annuler ?
							</h6>
							<p class="XXLmAuto XXLw-100 XXLcenter">
								Toutes les informations que vous avez saisi seront
								perdues.
							</p>
						</div>
						<div class="XXLspan-12 grid">
							<div class="XXLspan-6 Mspan-12">
								<button type="button" id="seeMenu" onclick="window.location.href='{{ route('voir_date') }}';"
									class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 Sw-100 XXLmAuto">
									<div class="btnText bgWhite XXLbr50">
										Annuler
									</div>
									<div class="btnIcon fcdarkGrey XXLop0">
										<i class="fa-solid fa-ban XXLmAuto"></i>
									</div>
								</button>
							</div>
							<div class="XXLspan-6 Mspan-12">
								<button type="submit" id="seeMenu" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 Sw-100 XXLmAuto"
									onclick="togglePupUp()">
									<div class="btnText bgWhite XXLbr50">
										Retour éditeur
									</div>
									<div class="btnIcon fcdarkGrey XXLop0">
										<i class="fa-solid fa-pen-to-square"></i>
									</div>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END : POPUP RETOUR ANNULER -->
		</div>
		<!-- BEGINNING : TITLE PAGE -->
		<div id="pageTitle" class="XXLflexCenteredXY bgIce">
			<div id="messages" class="XXLflex XXLflexVerticalAlignCenter XXLh-100">
				<h3 class="XXLcenter XXLflexCenteredXY XXLmAuto XXLh-100 pb05">
					Modifier un menu
				</h3>
				<h5 class="XXLcenter XXLflexCenteredXY XXLmAuto XXLh-100">
					{{ $formattedDate }}
				</h5>
				<h5 class="XXLcenter XXLflexCenteredXY XXLmAuto XXLh-100">
					<?php
					$timePost = old('midi_soir') ?? $_POST['midi_soir'];
					switch ($timePost) {
					    case 'midi':
					        echo htmlspecialchars('Midi');
					        break;
					    default:
					        echo htmlspecialchars('Soir');
					}
					?>
				</h5>
			</div>
		</div>
		<div class="XXLflexCenteredXY bgIce">
			<p class="XXLbr20 borderBox fcRed XXLcenter p1 XXLmAuto bgWhite error-messages XXLflexCenteredXY">
				ATTENTION! Veuillez ne pas rafraichir la page.
			</p>
			@if (session('errors') && session('errors')->hasBag('default'))
				<p class="XXLbr20 borderBox fcAgricultureElevage XXLcenter p1 XXLmAuto bgWhite error-messages XXLflexCenteredXY">
					Au moins un champ est obligatoires pour chaque catégorie.
				</p>
			@endif
		</div>
		<!-- END : MAIN MENU -->
		<!-- BEGINNING : FORM -->
		<div id="bodyAppCreateMenu" class="XXLspan-12 XXLsLine5 XXLeLine12 bgIce">
			<div id="createMenuForm" class="menuManagerForm m2 XXLh-100">
				<form action="{{ route('CRUD_read_update') }}" method="POST" class="grid XXLh-100">
					@method('POST')
					@csrf
					<input type="hidden" name="date" id="date" value="{{ $datePost }}">
					<input type="hidden" name="midi_soir" id="midi_soir" value="{{ $timePost }}">
					<!-- BEGINNING : MEAL PROMPTS -->
					<div class="menuPromptContainer grid XXLspan-12">
						<!-- BEGINNING : ENTREE -->
						<div id="entree" class="mt1 mr1 mb2 ml1 p1 XXLbr20 blur XXLspan-4 Lspan-6 Mspan-12">
							<!-- BEGINNING : IMAGE TITLE ENTREE -->
							<span id="entreeTitle" class="XXLmAuto XXLw-100 XXLflexCenteredXY">
								<div class="bgGlobalCheval XXLbr50 XXLflexCenteredXY">
									<img src="{{ asset('img/svg/salade.svg') }}" alt="Icône de l'entrée">
								</div>
							</span>
							<!-- END : IMAGE TITLE ENTREE -->
							<!-- BEGINNING : TITLE ENTREE -->
							<h6 class="XXLw-100 XXLcenter XXLmAuto pt1 pb1">
								Entrée
							</h6>
							<!-- END : TITLE ENTREE -->
							<!-- BEGINNING : ENTREE 1 -->
							<div class="menuPrompt pt1">
								<label for="entree_1" class="uc XXLfw600 pl07 mb07">
									Entrée 1
								</label>
								<div>
									<input type="text" name="entree_1" id="entree_1" value="{{ old('entree_1', $menu['entree_1']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_entree_1" name="ab_entree_1" value="1"
											@if ($menu['ab_entree_1'] == 1 || old('ab_entree_1')) checked @endif />
										<span class="iconHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_entree_1" name="toque_entree_1" value="1"
											@if ($menu['toque_entree_1'] == 1 || old('toque_entree_1')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : ENTREE 1 -->
							<!-- BEGINNING : ENTREE 2 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="entree_2" class="uc XXLfw600 pl07 mb07">
									Entrée 2
								</label>
								<div>
									<input type="text" name="entree_2" id="entree_2" value="{{ old('entree_2', $menu['entree_2']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_entree_2" name="ab_entree_2" value="1"
											@if ($menu['ab_entree_2'] == 1 || old('ab_entree_2')) checked @endif />
										<span class="iconHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_entree_2" name="toque_entree_2" value="1"
											@if ($menu['toque_entree_2'] == 1 || old('toque_entree_2')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : ENTREE 2 -->
							<!-- BEGINNING : ENTREE 3 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="entree_3" class="uc XXLfw600 pl07 mb07">
									Entrée 3
								</label>
								<div>
									<input type="text" name="entree_3" id="entree_3" value="{{ old('entree_3', $menu['entree_3']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_entree_3" name="ab_entree_3" value="1"
											@if ($menu['ab_entree_3'] == 1 || old('ab_entree_3')) checked @endif />
										<span class="iconHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_entree_3" name="toque_entree_3" value="1"
											@if ($menu['toque_entree_3'] == 1 || old('toque_entree_3')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : ENTREE 3 -->
							<!-- BEGINNING : ENTREE 4 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="entree_4" class="uc XXLfw600 pl07 mb07">
									Entrée 4
								</label>
								<div>
									<input type="text" name="entree_4" id="entree_4" value="{{ old('entree_4', $menu['entree_4']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_entree_4" name="ab_entree_4" value="1"
											@if ($menu['ab_entree_4'] == 1 || old('ab_entree_4')) checked @endif />
										<span class="iconHandMade XXLbr50 mb1 mr07"></span>
										<input id="toque_entree_4" name="toque_entree_4" value="1" class="checkboxHandMade" type="checkbox"
											@if ($menu['toque_entree_4'] == 1 || old('toque_entree_4')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : ENTREE 4 -->
						</div>
						<!-- END : ENTREE -->
						<!-- BEGINNING : PLAT -->
						<div id="plat" class="p1 mt1 mr1 mb2 ml1 XXLbr20 blur XXLspan-4 Lspan-6 Mspan-12">
							<!-- BEGINNING : IMAGE TITLE PLAT -->
							<span id="platTitle" class="XXLmAuto XXLw-100 XXLflexCenteredXY">
								<div class="bgGlobalCheval XXLbr50 XXLflexCenteredXY">
									<img src="{{ asset('img/svg/plat.svg') }}" alt="Icône du plat">
								</div>
							</span>
							<!-- END : IMAGE TITLE PLAT -->
							<!-- BEGINNING : TITLE PLAT -->
							<h6 class="XXLw-100 XXLcenter XXLmAuto pt1 pb1">
								Plat
							</h6>
							<!-- END : TITLE PLAT -->
							<!-- BEGINNING : PLAT 1 -->
							<div class="menuPrompt pt1">
								<label for="plat_1" class="uc XXLfw600 pl07 mb07">
									Plat 1
								</label>
								<div>
									<input type="text" name="plat_1" id="plat_1" value="{{ old('plat_1', $menu['plat_1']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_plat_1" name="ab_plat_1" value="1"
											@if ($menu['ab_plat_1'] == 1 || old('ab_plat_1')) checked @endif />
										<span class="iconHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_plat_1" name="toque_plat_1" value="1"
											@if ($menu['toque_plat_1'] == 1 || old('toque_plat_1')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END: PLAT 1 -->
							<!-- BEGINNING : PLAT 2 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="plat_2" class="uc XXLfw600 pl07 mb07">
									Plat 2
								</label>
								<div>
									<input type="text" name="plat_2" id="plat_2" value="{{ old('plat_2', $menu['plat_2']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_plat_2" name="ab_plat_2" value="1"
											@if ($menu['ab_plat_2'] == 1 || old('ab_plat_2')) checked @endif />
										<span class="iconHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_plat_2" name="toque_plat_2" value="1"
											@if ($menu['toque_plat_2'] == 1 || old('toque_plat_2')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : PLAT 2 -->
							<!-- BEGINNING : PLAT 3 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="plat_3" class="uc XXLfw600 pl07 mb07">
									Plat 3
								</label>
								<div>
									<input type="text" name="plat_3" id="plat_3" value="{{ old('plat_3', $menu['plat_3']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_plat_3" name="ab_plat_3" value="1"
											@if ($menu['ab_plat_3'] == 1 || old('ab_plat_3')) checked @endif />
										<span class="iconHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_plat_3" name="toque_plat_3" value="1"
											@if ($menu['toque_plat_3'] == 1 || old('toque_plat_3')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : PLAT 3 -->
							<!-- BEGINNING : PLAT 4 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="plat_4" class="uc XXLfw600 pl07 mb07">
									Plat 4
								</label>
								<div>
									<input type="text" name="plat_4" id="plat_4" value="{{ old('plat_4', $menu['plat_4']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_plat_4" name="ab_plat_4" value="1"
											@if ($menu['ab_plat_4'] == 1 || old('ab_plat_4')) checked @endif />
										<span class="iconHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_plat_4" name="toque_plat_4" value="1"
											@if ($menu['toque_plat_4'] == 1 || old('toque_plat_4')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : PLAT 4 -->
						</div>
						<!-- END : PLAT -->
						<!-- BEGINNING : ACCOMPAGNEMENT -->
						<div id="accompagnement" class="p1 mt1 mr1 mb2 ml1 XXLbr20 blur XXLspan-4 Lspan-6 Mspan-12">
							<!-- BEGINNING : IMAGE TITLE ACCOMPAGNEMENT -->
							<span id="accompagnementTitle" class="XXLmAuto XXLw-100 XXLflexCenteredXY">
								<div class="bgGlobalCheval XXLbr50 XXLflexCenteredXY">
									<img src="{{ asset('img/svg/accompagnement.svg') }}" alt="Icône de l'accompagnement">
								</div>
							</span>
							<!-- END : IMAGE TITLE ACCOMPAGNEMENT -->
							<!-- BEGINNING : TITLE ACCOMPAGNEMENT -->
							<h6 class="XXLw-100 XXLcenter XXLmAuto pt1 pb1">
								Accompagnement
							</h6>
							<!-- END : TITLE ACCOMPAGNEMENT -->
							<!-- BEGINNING : ACCOMPAGNEMENT 1 -->
							<div class="menuPrompt pt1">
								<label for="accomp_1" class="uc XXLfw600 pl07 mb07">
									Accompagnement 1
								</label>
								<div>
									<input type="text" name="accomp_1" id="accomp_1" value="{{ old('accomp_1', $menu['accomp_1']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_accomp_1" name="ab_accomp_1" value="1"
											@if ($menu['ab_accomp_1'] == 1 || old('ab_accomp_1')) checked @endif />
										<span class="iconHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_accomp_1" name="toque_accomp_1" value="1"
											@if ($menu['toque_accomp_1'] == 1 || old('toque_accomp_1')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : ACCOMPAGNEMENT 1 -->
							<!-- BEGINNING : ACCOMPAGNEMENT 2 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="accomp_2" class="uc XXLfw600 pl07 mb07">
									Accompagnement 2
								</label>
								<div>
									<input type="text" name="accomp_2" id="accomp_2" value="{{ old('accomp_2', $menu['accomp_2']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_accomp_2" name="ab_accomp_2" value="1"
											@if ($menu['ab_accomp_2'] == 1 || old('ab_accomp_2')) checked @endif />
										<span class="iconHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_accomp_2" name="toque_accomp_2" value="1"
											@if ($menu['toque_accomp_2'] == 1 || old('toque_accomp_2')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : ACCOMPAGNEMENT 2 -->
							<!-- BEGINNING : ACCOMPAGNEMENT 3 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="accomp_3" class="uc XXLfw600 pl07 mb07">
									Accompagnement 3
								</label>
								<div>
									<input type="text" name="accomp_3" id="accomp_3" value="{{ old('accomp_3', $menu['accomp_3']) }}"
										type="text" class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_accomp_3" name="ab_accomp_3" value="1"
											@if ($menu['ab_accomp_3'] == 1 || old('ab_accomp_3')) checked @endif />
										<span class="iconHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_accomp_3" name="toque_accomp_3" value="1"
											@if ($menu['toque_accomp_3'] == 1 || old('toque_accomp_3')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : ACCOMPAGNEMENT 3 -->
							<!-- BEGINNING : ACCOMPAGNEMENT 4 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="accomp_4" class="uc XXLfw600 pl07 mb07">
									Accompagnement 4
								</label>
								<div>
									<input type="text" name="accomp_4" id="accomp_4" value="{{ old('accomp_4', $menu['accomp_4']) }}"
										type="text" class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_accomp_4" name="ab_accomp_4" value="1"
											@if ($menu['ab_accomp_4'] == 1 || old('ab_accomp_4')) checked @endif />
										<span class="iconHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_accomp_4" name="toque_accomp_4" value="1"
											@if ($menu['toque_accomp_4'] == 1 || old('toque_accomp_4')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : ACCOMPAGNEMENT 4 -->
						</div>
						<!-- END : ACCOMPAGNEMENT -->
						<!-- BEGINNING : FROMAGE -->
						<div id="fromage" class="p1 mt1 mr1 mb2 ml1 XXLbr20 blur XXLspan-4 Lspan-6 Mspan-12">
							<!-- BEGINNING : IMAGE TITLE FROMAGE -->
							<span id="fromageTitle" class="XXLmAuto XXLw-100 XXLflexCenteredXY">
								<div class="bgGlobalCheval XXLbr50 XXLflexCenteredXY">
									<img src="{{ asset('img/svg/fromage.svg') }}" alt="Icône du fromage">
								</div>
							</span>
							<!-- END : IMAGE TITLE FROMAGE -->
							<!-- BEGINNING : TITLE FROMAGE -->
							<h6 class="XXLw-100 XXLcenter XXLmAuto pt1 pb1">
								Fromage
							</h6>
							<!-- END : TITLE FROMAGE -->
							<!-- BEGINNING : FROMAGE 1 -->
							<div class="menuPrompt pt1">
								<label for="fromage_1" class="uc XXLfw600 pl07 mb07">
									fromage 1
								</label>
								<div>
									<input type="text" name="fromage_1" id="fromage_1" value="{{ old('fromage_1', $menu['fromage_1']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_fromage_1" name="ab_fromage_1" value="1"
											@if ($menu['ab_fromage_1'] == 1 || old('ab_fromage_1')) checked @endif />
										<span class="iconEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_fromage_1" name="europe_fromage_1"
											value="1" @if ($menu['europe_fromage_1'] == 1 || old('europe_fromage_1')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END: FROMAGE 1 -->
							<!-- BEGINNING : FROMAGE 2 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="fromage_2" class="uc XXLfw600 pl07 mb07">
									fromage 2
								</label>
								<div>
									<input type="text" name="fromage_2" id="fromage_2" value="{{ old('fromage_2', $menu['fromage_2']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_fromage_2" name="ab_fromage_2" value="1"
											@if ($menu['ab_fromage_2'] == 1 || old('ab_fromage_2')) checked @endif />
										<span class="iconEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_fromage_2" name="europe_fromage_2"
											value="1" @if ($menu['europe_fromage_2'] == 1 || old('europe_fromage_2')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END: FROMAGE 2 -->
							<!-- BEGINNING : FROMAGE 3 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="fromage_3" class="uc XXLfw600 pl07 mb07">
									fromage 3
								</label>
								<div>
									<input type="text" name="fromage_3" id="fromage_3" value="{{ old('fromage_3', $menu['fromage_3']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_fromage_3" name="ab_fromage_3" value="1"
											@if ($menu['ab_fromage_3'] == 1 || old('ab_fromage_3')) checked @endif />
										<span class="iconEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_fromage_3" name="europe_fromage_3"
											value="1" @if ($menu['europe_fromage_3'] == 1 || old('europe_fromage_3')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END: FROMAGE 3 -->
							<!-- BEGINNING : FROMAGE 4 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="fromage_4" class="uc XXLfw600 pl07 mb07">
									fromage 4
								</label>
								<div>
									<input type="text" name="fromage_4" id="fromage_4" value="{{ old('fromage_4', $menu['fromage_4']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_fromage_4" name="ab_fromage_4" value="1"
											@if ($menu['ab_fromage_4'] == 1 || old('ab_fromage_4')) checked @endif />
										<span class="iconEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_fromage_4" name="europe_fromage_4"
											value="1" @if ($menu['europe_fromage_4'] == 1 || old('europe_fromage_4')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END: FROMAGE 4 -->
						</div>
						<!-- END : ACCOMPAGNEMENT -->
						<!-- BEGINNING : DESSERT -->
						<div id="dessert" class="p1 mt1 mr1 mb2 ml1 XXLbr20 blur XXLspan-4 Lspan-6 Mspan-12">
							<!-- BEGINNING : IMAGE TITLE DESSERT -->
							<span id="dessertTitle" class="XXLmAuto XXLw-100 XXLflexCenteredXY">
								<div class="bgGlobalCheval XXLbr50 XXLflexCenteredXY">
									<img src="{{ asset('img/svg/dessert.svg') }}" alt="Icône du dessert">
								</div>
							</span>
							<!-- END : IMAGE TITLE DESSERT -->
							<!-- BEGINNING : TITLE DESSERT -->
							<h6 class="XXLw-100 XXLcenter XXLmAuto pt1 pb1">
								Dessert
							</h6>
							<!-- END : TITLE DESSERT -->
							<!-- BEGINNING : DESSERT 1 -->
							<div class="menuPrompt pt1">
								<label for="dessert_1" class="uc XXLfw600 pl07 mb07">
									Dessert 1
								</label>
								<div>
									<input type="text" name="dessert_1" id="dessert_1" value="{{ old('dessert_1', $menu['dessert_1']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_dessert_1" name="ab_dessert_1" value="1"
											@if ($menu['ab_dessert_1'] == 1 || old('ab_dessert_1')) checked @endif />
										<span class="iconHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_dessert_1" name="toque_dessert_1"
											value="1" @if ($menu['toque_dessert_1'] == 1 || old('toque_dessert_1')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : DESSERT 1 -->
							<!-- BEGINNING : DESSERT 2 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="dessert_2" class="uc XXLfw600 pl07 mb07">
									Dessert 2
								</label>
								<div>
									<input type="text" name="dessert_2" id="dessert_2" value="{{ old('dessert_2', $menu['dessert_2']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_dessert_2" name="ab_dessert_2" value="1"
											@if ($menu['ab_dessert_2'] == 1 || old('ab_dessert_2')) checked @endif />
										<span class="iconHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_dessert_2" name="toque_dessert_2"
											value="1" @if ($menu['toque_dessert_2'] == 1 || old('toque_dessert_2')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : DESSERT 2 -->
							<!-- BEGINNING : DESSERT 3 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="dessert_3" class="uc XXLfw600 pl07 mb07">
									Dessert 3
								</label>
								<div>
									<input type="text" name="dessert_3" id="dessert_3" value="{{ old('dessert_3', $menu['dessert_3']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_dessert_3" name="ab_dessert_3" value="1"
											@if ($menu['ab_dessert_3'] == 1 || old('ab_dessert_3')) checked @endif />
										<span class="iconHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_dessert_3" name="toque_dessert_3"
											value="1" @if ($menu['toque_dessert_3'] == 1 || old('toque_dessert_3')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : DESSERT 3 -->
							<!-- BEGINNING : DESSERT 4 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="dessert_4" class="uc XXLfw600 pl07 mb07">
									Dessert 4
								</label>
								<div>
									<input type="text" name="dessert_4" id="dessert_4" value="{{ old('dessert_4', $menu['dessert_4']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_dessert_4" name="ab_dessert_4" value="1"
											@if ($menu['ab_dessert_4'] == 1 || old('ab_dessert_4')) checked @endif />
										<span class="iconHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_dessert_4" name="toque_dessert_4"
											value="1" @if ($menu['toque_dessert_4'] == 1 || old('toque_dessert_4')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : DESSERT 4 -->
						</div>
						<!-- END : DESSERT -->
						<!-- BEGINNING : FRUIT -->
						<div id="fruit" class="p1 mt1 mr1 mb2 ml1 XXLbr20 blur XXLspan-4 Lspan-6 Mspan-12">
							<!-- BEGINNING : IMAGE TITLE FRUIT -->
							<span id="fruitTitle" class="XXLmAuto XXLw-100 XXLflexCenteredXY">
								<div class="bgGlobalCheval XXLbr50 XXLflexCenteredXY">
									<img src="{{ asset('img/svg/fruit.svg') }}" alt="Icône du fruit">
								</div>
							</span>
							<!-- END : IMAGE TITLE FRUIT -->
							<!-- BEGINNING : TITLE FRUIT -->
							<h6 class="XXLw-100 XXLcenter XXLmAuto pt1 pb1">
								Fruit
							</h6>
							<!-- END : TITLE FRUIT -->
							<!-- BEGINNING : FRUIT 1 -->
							<div class="menuPrompt pt1">
								<label for="fruit_1" class="uc XXLfw600 pl07 mb07">
									Fruit 1
								</label>
								<div>
									<input type="text" name="fruit_1" id="fruit_1" value="{{ old('fruit_1', $menu['fruit_1']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_fruit_1" name="ab_fruit_1" value="1"
											@if ($menu['ab_fruit_1'] == 1 || old('ab_fruit_1')) checked @endif />
										<span class="iconEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_fruit_1" name="europe_fruit_1" value="1"
											@if ($menu['europe_fruit_1'] == 1 || old('europe_fruit_1')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : FRUIT 1 -->
							<!-- BEGINNING : FRUIT 2 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="fruit_2" class="uc XXLfw600 pl07 mb07">
									Fruit 2
								</label>
								<div>
									<input type="text" name="fruit_2" id="fruit_2" value="{{ old('fruit_2', $menu['fruit_2']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_fruit_2" name="ab_fruit_2" value="1"
											@if ($menu['ab_fruit_2'] == 1 || old('ab_fruit_2')) checked @endif />
										<span class="iconEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_fruit_2" name="europe_fruit_2" value="1"
											@if ($menu['europe_fruit_2'] == 1 || old('europe_fruit_2')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : FRUIT 2 -->
							<!-- BEGINNING : FRUIT 3 -->
							<div class="menuPrompt pt1">
								<label for="fruit_3" class="uc XXLfw600 pl07 mb07">
									Fruit 1
								</label>
								<div>
									<input type="text" name="fruit_3" id="fruit_3" value="{{ old('fruit_3', $menu['fruit_3']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_fruit_3" name="ab_fruit_3" value="1"
											@if ($menu['ab_fruit_3'] == 1 || old('ab_fruit_3')) checked @endif />
										<span class="iconEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_fruit_3" name="europe_fruit_3" value="1"
											@if ($menu['europe_fruit_3'] == 1 || old('europe_fruit_3')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : FRUIT 3 -->
							<!-- BEGINNING : FRUIT 4 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="fruit_4" class="uc XXLfw600 pl07 mb07">
									Fruit 2
								</label>
								<div>
									<input type="text" name="fruit_4" id="fruit_4" value="{{ old('fruit_4', $menu['fruit_4']) }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="iconAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_fruit_4" name="ab_fruit_4" value="1"
											@if ($menu['ab_fruit_4'] == 1 || old('ab_fruit_4')) checked @endif />
										<span class="iconEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_fruit_4" name="europe_fruit_4" value="1"
											@if ($menu['europe_fruit_4'] == 1 || old('europe_fruit_4')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : FRUIT 4 -->
						</div>
						<!-- END : FRUIT -->
					</div>
					<!-- BEGINNING : MENU MANAGER BUTTON'S FORM -->
					<div class="menuManager XXLw-100 XXLfixed blur grid">
						<div class="1 XXLflexCenteredXY pt1 pb1 XXLspan-6 Mspan-12">
							<button type="button" id="openPopUp" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto"
								onclick="togglePupUp()">
								<div class="btnText bgEnseignementGeneral XXLbr50">Annuler</div>
								<div class="btnIcon fcdarkGrey XXLop0">
									<i class="fa-solid fa-ban"></i>
								</div>
							</button>
						</div>
						<div class="menuBtn XXLflexCenteredXY pt1 pb1 XXLspan-6 Mspan-12">
							<button type="submit" id="seeMenu" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto">
								<div class="btnText bgAgricultureElevage XXLbr50">Modifier le menu</div>
								<div class="btnIcon fcdarkGrey XXLop0">
									<i class="fa-solid fa-eye"></i>
								</div>
							</button>
						</div>
					</div>
					<!-- END : MENU MANAGER BUTTON'S FORM -->
				</form>
				<!-- END : MEAL PROMPTS -->
			</div>
		</div>
		<!-- END : FORM -->
		<div id="injectFooter">
			<x-footer-layout> </x-footer-layout>
		</div>
	</div>
</body>

</html>
