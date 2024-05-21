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
								<button type="button" id="seeMenu" onclick="window.location.href='{{ route('cree_date') }}';"
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
					Créer un menu
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
		</div>
		<div class="XXLflexCenteredXY bgIce">
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
				<form action="{{ route('visual_create') }}" method="POST" class="grid XXLh-100">
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
									<img src="{{ asset('img/svg/salade.svg') }}" alt="entree">
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
								<label for="entree1" class="uc XXLfw600 pl07 mb07">
									Entrée 1
								</label>
								<div>
									<input type="text" name="entree1" id="entree1"
										value="{{ isset($_POST['entree1']) ? old('entree1', $_POST['entree1']) : old('entree1') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_entree1" name="ab_entree1" value="1"
											@if ((isset($_POST['ab_entree1']) && $_POST['ab_entree1'] == 1) || old('ab_entree1')) checked @endif />
										<span class="checkboxHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_entree1" name="toque_entree1" value="1"
											@if ((isset($_POST['toque_entree1']) && $_POST['toque_entree1'] == 1) || old('toque_entree1')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : ENTREE 1 -->
							<!-- BEGINNING : ENTREE 2 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="entree2" class="uc XXLfw600 pl07 mb07">
									Entrée 2
								</label>
								<div>
									<input type="text" name="entree2" id="entree2"
										value="{{ isset($_POST['entree2']) ? old('entree2', $_POST['entree2']) : old('entree2') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_entree2" name="ab_entree2" value="1"
											@if ((isset($_POST['ab_entree2']) && $_POST['ab_entree2'] == 1) || old('ab_entree2')) checked @endif />
										<span class="checkboxHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_entree2" name="toque_entree2" value="1"
											@if ((isset($_POST['toque_entree2']) && $_POST['toque_entree2'] == 1) || old('toque_entree2')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : ENTREE 2 -->
							<!-- BEGINNING : ENTREE 3 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="entree3" class="uc XXLfw600 pl07 mb07">
									Entrée 3
								</label>
								<div>
									<input type="text" name="entree3" id="entree3"
										value="{{ isset($_POST['entree3']) ? old('entree3', $_POST['entree3']) : old('entree3') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_entree3" name="ab_entree3" value="1"
											@if ((isset($_POST['ab_entree3']) && $_POST['ab_entree3'] == 1) || old('ab_entree3')) checked @endif />
										<span class="checkboxHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_entree3" name="toque_entree3" value="1"
											@if ((isset($_POST['toque_entree3']) && $_POST['toque_entree3'] == 1) || old('toque_entree3')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : ENTREE 3 -->
							<!-- BEGINNING : ENTREE 4 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="entree4" class="uc XXLfw600 pl07 mb07">
									Entrée 4
								</label>
								<div>
									<input type="text" name="entree4" id="entree4"
										value="{{ isset($_POST['entree4']) ? old('entree4', $_POST['entree4']) : old('entree4') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_entree4" name="ab_entree4" value="1"
											@if ((isset($_POST['ab_entree4']) && $_POST['ab_entree4'] == 1) || old('ab_entree4')) checked @endif />
										<span class="checkboxHandMade XXLbr50 mb1 mr07"></span>
										<input id="toque_entree4" name="toque_entree4" value="1" class="checkboxHandMade" type="checkbox"
											@if ((isset($_POST['toque_entree4']) && $_POST['toque_entree4'] == 1) || old('toque_entree4')) checked @endif />
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
									<img src="{{ asset('img/svg/plat.svg') }}" alt="plat">
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
								<label for="plat1" class="uc XXLfw600 pl07 mb07">
									Plat 1
								</label>
								<div>
									<input type="text" name="plat1" id="plat1"
										value="{{ isset($_POST['plat1']) ? old('plat1', $_POST['plat1']) : old('plat1') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_plat1" name="ab_plat1" value="1"
											@if ((isset($_POST['ab_plat1']) && $_POST['ab_plat1'] == 1) || old('ab_plat1')) checked @endif />
										<span class="checkboxHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_plat1" name="toque_plat1" value="1"
											@if ((isset($_POST['toque_plat1']) && $_POST['toque_plat1'] == 1) || old('toque_plat1')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END: PLAT 1 -->
							<!-- BEGINNING : PLAT 2 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="plat2" class="uc XXLfw600 pl07 mb07">
									Plat 2
								</label>
								<div>
									<input type="text" name="plat2" id="plat2"
										value="{{ isset($_POST['plat2']) ? old('plat2', $_POST['plat2']) : old('plat2') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_plat2" name="ab_plat2" value="1"
											@if ((isset($_POST['ab_plat2']) && $_POST['ab_plat2'] == 1) || old('ab_plat2')) checked @endif />
										<span class="checkboxHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_plat2" name="toque_plat2" value="1"
											@if ((isset($_POST['toque_plat2']) && $_POST['toque_plat2'] == 1) || old('toque_plat2')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : PLAT 2 -->
							<!-- BEGINNING : PLAT 3 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="plat3" class="uc XXLfw600 pl07 mb07">
									Plat 3
								</label>
								<div>
									<input type="text" name="plat3" id="plat3"
										value="{{ isset($_POST['plat3']) ? old('plat3', $_POST['plat3']) : old('plat3') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_plat3" name="ab_plat3" value="1"
											@if ((isset($_POST['ab_plat3']) && $_POST['ab_plat3'] == 1) || old('ab_plat3')) checked @endif />
										<span class="checkboxHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_plat3" name="toque_plat3" value="1"
											@if ((isset($_POST['toque_plat3']) && $_POST['toque_plat3'] == 1) || old('toque_plat3')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : PLAT 3 -->
							<!-- BEGINNING : PLAT 4 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="plat4" class="uc XXLfw600 pl07 mb07">
									Plat 4
								</label>
								<div>
									<input type="text" name="plat4" id="plat4"
										value="{{ isset($_POST['plat4']) ? old('plat4', $_POST['plat4']) : old('plat4') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_plat4" name="ab_plat4" value="1"
											@if ((isset($_POST['ab_plat4']) && $_POST['ab_plat4'] == 1) || old('ab_plat4')) checked @endif />
										<span class="checkboxHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_plat4" name="toque_plat4" value="1"
											@if ((isset($_POST['toque_plat4']) && $_POST['toque_plat4'] == 1) || old('toque_plat4')) checked @endif />
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
									<img src="{{ asset('img/svg/accompagnement.svg') }}" alt="accompagnement">
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
								<label for="accomp1" class="uc XXLfw600 pl07 mb07">
									Accompagnement 1
								</label>
								<div>
									<input type="text" name="accomp1" id="accomp1"
										value="{{ isset($_POST['accomp1']) ? old('accomp1', $_POST['accomp1']) : old('accomp1') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_accomp1" name="ab_accomp1" value="1"
											@if ((isset($_POST['ab_accomp1']) && $_POST['ab_accomp1'] == 1) || old('ab_accomp1')) checked @endif />
										<span class="checkboxHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_accomp1" name="toque_accomp1" value="1"
											@if ((isset($_POST['toque_accomp1']) && $_POST['toque_accomp1'] == 1) || old('toque_accomp1')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : ACCOMPAGNEMENT 1 -->
							<!-- BEGINNING : ACCOMPAGNEMENT 2 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="accomp2" class="uc XXLfw600 pl07 mb07">
									Accompagnement 2
								</label>
								<div>
									<input type="text" name="accomp2" id="accomp2"
										value="{{ isset($_POST['accomp2']) ? old('accomp2', $_POST['accomp2']) : old('accomp2') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_accomp2" name="ab_accomp2" value="1"
											@if ((isset($_POST['ab_accomp2']) && $_POST['ab_accomp2'] == 1) || old('ab_accomp2')) checked @endif />
										<span class="checkboxHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_accomp2" name="toque_accomp2" value="1"
											@if ((isset($_POST['toque_accomp2']) && $_POST['toque_accomp2'] == 1) || old('toque_accomp2')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : ACCOMPAGNEMENT 2 -->
							<!-- BEGINNING : ACCOMPAGNEMENT 3 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="accomp3" class="uc XXLfw600 pl07 mb07">
									Accompagnement 3
								</label>
								<div>
									<input type="text" name="accomp3" id="accomp3"
										value="{{ isset($_POST['accomp3']) ? old('accomp3', $_POST['accomp3']) : old('accomp3') }}" type="text"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_accomp3" name="ab_accomp3" value="1"
											@if ((isset($_POST['ab_accomp3']) && $_POST['ab_accomp3'] == 1) || old('ab_accomp3')) checked @endif />
										<span class="checkboxHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_accomp3" name="toque_accomp3" value="1"
											@if ((isset($_POST['toque_accomp3']) && $_POST['toque_accomp3'] == 1) || old('toque_accomp3')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : ACCOMPAGNEMENT 3 -->
						</div>
						<!-- END : ACCOMPAGNEMENT -->
						<!-- BEGINNING : FROMAGE -->
						<div id="fromage" class="p1 mt1 mr1 mb2 ml1 XXLbr20 blur XXLspan-4 Lspan-6 Mspan-12">
							<!-- BEGINNING : IMAGE TITLE FROMAGE -->
							<span id="fromageTitle" class="XXLmAuto XXLw-100 XXLflexCenteredXY">
								<div class="bgGlobalCheval XXLbr50 XXLflexCenteredXY">
									<img src="{{ asset('img/svg/fromage.svg') }}" alt="fromage">
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
								<label for="fromage1" class="uc XXLfw600 pl07 mb07">
									fromage 1
								</label>
								<div>
									<input type="text" name="fromage1" id="fromage1"
										value="{{ isset($_POST['fromage1']) ? old('fromage1', $_POST['fromage1']) : old('fromage1') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_fromage1" name="ab_fromage1" value="1"
											@if ((isset($_POST['ab_fromage1']) && $_POST['ab_fromage1'] == 1) || old('ab_fromage1')) checked @endif />
										<span class="checkboxEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_fromage1" name="europe_fromage1" value="1"
											@if ((isset($_POST['europe_fromage1']) && $_POST['europe_fromage1'] == 1) || old('europe_fromage1')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END: FROMAGE 1 -->
							<!-- BEGINNING : FROMAGE 2 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="fromage2" class="uc XXLfw600 pl07 mb07">
									fromage 2
								</label>
								<div>
									<input type="text" name="fromage2" id="fromage2"
										value="{{ isset($_POST['fromage2']) ? old('fromage2', $_POST['fromage2']) : old('fromage2') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_fromage2" name="ab_fromage2" value="1"
											@if ((isset($_POST['ab_fromage2']) && $_POST['ab_fromage2'] == 1) || old('ab_fromage2')) checked @endif />
										<span class="checkboxEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_fromage2" name="europe_fromage2" value="1"
											@if ((isset($_POST['europe_fromage2']) && $_POST['europe_fromage2'] == 1) || old('europe_fromage2')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END: FROMAGE 2 -->
							<!-- BEGINNING : FROMAGE 3 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="fromage3" class="uc XXLfw600 pl07 mb07">
									fromage 3
								</label>
								<div>
									<input type="text" name="fromage3" id="fromage3"
										value="{{ isset($_POST['fromage3']) ? old('fromage3', $_POST['fromage3']) : old('fromage3') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_fromage3" name="ab_fromage3" value="1"
											@if ((isset($_POST['ab_fromage3']) && $_POST['ab_fromage3'] == 1) || old('ab_fromage3')) checked @endif />
										<span class="checkboxEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_fromage3" name="europe_fromage3" value="1"
											@if ((isset($_POST['europe_fromage3']) && $_POST['europe_fromage3'] == 1) || old('europe_fromage3')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END: FROMAGE 3 -->
							<!-- BEGINNING : FROMAGE 4 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="fromage4" class="uc XXLfw600 pl07 mb07">
									fromage 4
								</label>
								<div>
									<input type="text" name="fromage4" id="fromage4"
										value="{{ isset($_POST['fromage4']) ? old('fromage4', $_POST['fromage4']) : old('fromage4') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_fromage4" name="ab_fromage4" value="1"
											@if ((isset($_POST['ab_fromage4']) && $_POST['ab_fromage4'] == 1) || old('ab_fromage4')) checked @endif />
										<span class="checkboxEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_fromage4" name="europe_fromage4" value="1"
											@if ((isset($_POST['europe_fromage4']) && $_POST['europe_fromage4'] == 1) || old('europe_fromage4')) checked @endif />
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
									<img src="{{ asset('img/svg/dessert.svg') }}" alt="dessert">
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
								<label for="dessert1" class="uc XXLfw600 pl07 mb07">
									Dessert 1
								</label>
								<div>
									<input type="text" name="dessert1" id="dessert1"
										value="{{ isset($_POST['dessert1']) ? old('dessert1', $_POST['dessert1']) : old('dessert1') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_dessert1" name="ab_dessert1" value="1"
											@if ((isset($_POST['ab_dessert1']) && $_POST['ab_dessert1'] == 1) || old('ab_dessert1')) checked @endif />
										<span class="checkboxHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_dessert1" name="toque_dessert1" value="1"
											@if ((isset($_POST['toque_dessert1']) && $_POST['toque_dessert1'] == 1) || old('toque_dessert1')) checked @endif />
										<span class="checkboxEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_dessert1" name="europe_dessert1" value="1"
											@if ((isset($_POST['europe_dessert1']) && $_POST['europe_dessert1'] == 1) || old('europe_dessert1')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : DESSERT 1 -->
							<!-- BEGINNING : DESSERT 2 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="dessert2" class="uc XXLfw600 pl07 mb07">
									Dessert 2
								</label>
								<div>
									<input type="text" name="dessert2" id="dessert2"
										value="{{ isset($_POST['dessert2']) ? old('dessert2', $_POST['dessert2']) : old('dessert2') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_dessert2" name="ab_dessert2" value="1"
											@if ((isset($_POST['ab_dessert2']) && $_POST['ab_dessert2'] == 1) || old('ab_dessert2')) checked @endif />
										<span class="checkboxHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_dessert2" name="toque_dessert2" value="1"
											@if ((isset($_POST['toque_dessert2']) && $_POST['toque_dessert2'] == 1) || old('toque_dessert2')) checked @endif />
										<span class="checkboxEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_dessert2" name="europe_dessert2" value="1"
											@if ((isset($_POST['europe_dessert2']) && $_POST['europe_dessert2'] == 1) || old('europe_dessert2')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : DESSERT 2 -->
							<!-- BEGINNING : DESSERT 3 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="dessert3" class="uc XXLfw600 pl07 mb07">
									Dessert 3
								</label>
								<div>
									<input type="text" name="dessert3" id="dessert3"
										value="{{ isset($_POST['dessert3']) ? old('dessert3', $_POST['dessert3']) : old('dessert3') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_dessert3" name="ab_dessert3" value="1"
											@if ((isset($_POST['ab_dessert3']) && $_POST['ab_dessert3'] == 1) || old('ab_dessert3')) checked @endif />
										<span class="checkboxHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_dessert3" name="toque_dessert3" value="1"
											@if ((isset($_POST['toque_dessert3']) && $_POST['toque_dessert3'] == 1) || old('toque_dessert3')) checked @endif />
										<span class="checkboxEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_dessert3" name="europe_dessert3" value="1"
											@if ((isset($_POST['europe_dessert3']) && $_POST['europe_dessert3'] == 1) || old('europe_dessert3')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : DESSERT 3 -->
							<!-- BEGINNING : DESSERT 4 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="dessert4" class="uc XXLfw600 pl07 mb07">
									Dessert 4
								</label>
								<div>
									<input type="text" name="dessert4" id="dessert4"
										value="{{ isset($_POST['dessert4']) ? old('dessert4', $_POST['dessert4']) : old('dessert4') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_dessert4" name="ab_dessert4" value="1"
											@if ((isset($_POST['ab_dessert4']) && $_POST['ab_dessert4'] == 1) || old('ab_dessert4')) checked @endif />
										<span class="checkboxHandMade XXLbr50 mb1 mr07"></span>
										<input class="checkboxHandMade" type="checkbox" id="toque_dessert4" name="toque_dessert4" value="1"
											@if ((isset($_POST['toque_dessert4']) && $_POST['toque_dessert4'] == 1) || old('toque_dessert4')) checked @endif />
										<span class="checkboxEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_dessert4" name="europe_dessert4" value="1"
											@if ((isset($_POST['europe_dessert4']) && $_POST['europe_dessert4'] == 1) || old('europe_dessert4')) checked @endif />
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
									<img src="{{ asset('img/svg/fruit.svg') }}" alt="fruit">
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
								<label for="fruit1" class="uc XXLfw600 pl07 mb07">
									Fruit 1
								</label>
								<div>
									<input type="text" name="fruit1" id="fruit1"
										value="{{ isset($_POST['fruit1']) ? old('fruit1', $_POST['fruit1']) : old('fruit1') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_fruit1" name="ab_fruit1" value="1"
											@if ((isset($_POST['ab_fruit1']) && $_POST['ab_fruit1'] == 1) || old('ab_fruit1')) checked @endif />
										<span class="checkboxEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_fruit1" name="europe_fruit1" value="1"
											@if ((isset($_POST['europe_fruit1']) && $_POST['europe_fruit1'] == 1) || old('europe_fruit1')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : FRUIT 1 -->
							<!-- BEGINNING : FRUIT 2 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="fruit2" class="uc XXLfw600 pl07 mb07">
									Fruit 2
								</label>
								<div>
									<input type="text" name="fruit2" id="fruit2"
										value="{{ isset($_POST['fruit2']) ? old('fruit2', $_POST['fruit2']) : old('fruit2') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_fruit2" name="ab_fruit2" value="1"
											@if ((isset($_POST['ab_fruit2']) && $_POST['ab_fruit2'] == 1) || old('ab_fruit2')) checked @endif />
										<span class="checkboxEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_fruit2" name="europe_fruit2" value="1"
											@if ((isset($_POST['europe_fruit2']) && $_POST['europe_fruit2'] == 1) || old('europe_fruit2')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : FRUIT 2 -->
							<!-- BEGINNING : FRUIT 3 -->
							<div class="menuPrompt pt1">
								<label for="fruit3" class="uc XXLfw600 pl07 mb07">
									Fruit 1
								</label>
								<div>
									<input type="text" name="fruit3" id="fruit3"
										value="{{ isset($_POST['fruit3']) ? old('fruit3', $_POST['fruit3']) : old('fruit3') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_fruit3" name="ab_fruit3" value="1"
											@if ((isset($_POST['ab_fruit3']) && $_POST['ab_fruit3'] == 1) || old('ab_fruit3')) checked @endif />
										<span class="checkboxEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_fruit3" name="europe_fruit3" value="1"
											@if ((isset($_POST['europe_fruit3']) && $_POST['europe_fruit3'] == 1) || old('europe_fruit3')) checked @endif />
									</div>
								</div>
							</div>
							<!-- END : FRUIT 3 -->
							<!-- BEGINNING : FRUIT 4 -->
							<div class="menuPrompt XXLsepIce80 pt1">
								<label for="fruit4" class="uc XXLfw600 pl07 mb07">
									Fruit 2
								</label>
								<div>
									<input type="text" name="fruit4" id="fruit4"
										value="{{ isset($_POST['fruit4']) ? old('fruit4', $_POST['fruit4']) : old('fruit4') }}"
										class="XXLw-100 pr1 borderBox XXLBordNone XXLbr20 textMenu mb1">
									<div class="mb1">
										<span class="checkboxAB XXLbr50 mb1 mr07"></span>
										<input class="checkboxAB" type="checkbox" id="ab_fruit4" name="ab_fruit4" value="1"
											@if ((isset($_POST['ab_fruit4']) && $_POST['ab_fruit4'] == 1) || old('ab_fruit4')) checked @endif />
										<span class="checkboxEurope XXLbr50 mb1 mr07"></span>
										<input class="checkboxEurope" type="checkbox" id="europe_fruit4" name="europe_fruit4" value="1"
											@if ((isset($_POST['europe_fruit4']) && $_POST['europe_fruit4'] == 1) || old('europe_fruit4')) checked @endif />
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
								<div class="btnText bgAgricultureElevage XXLbr50">Voir le menu</div>
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
