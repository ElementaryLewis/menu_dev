<!DOCTYPE html>
<html lang="fr" class="XXLh-100">
<x-doctype-layout> </x-doctype-layout>
<?php
header('Content-type: text/html; charset=UFT-8');
mb_internal_encoding('UTF-8');
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_fr');

$submittedDate = date('Y-m-d');

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
if (session('dontexist')) {
    $searchedDate = new DateTime(session('dontexist')['date']);
    $formattedSearch = $formatter->format($searchedDate);
}
?>

<body class="XXLh-100vh bgIce">
	<div id="mainContainer">
		<div id="injectMenu">
			<x-header-layout>
			</x-header-layout>
		</div>
		<div class="XXLflexbox">
			<div class="grid XXLgridRow12 SgridRow12 XXLw-100 bgIce XXLflexboxChild-1">
				<div class="XXLspan-12 XXLsLine2 XXLeLine4 bgIce">
					<div id="messages" class="XXLflex XXLflexCenteredXY XXLh-100">
						<h3 class="XXLcenter XXLflexCenteredXY XXLmAuto XXLh-100">{{ $formattedDate }}</h3>
					</div>
				</div>
				<div id="bodyApp" class="XXLspan-12 XXLsLine4 XXLeLine12 bgIce">
					<!-- BEGINNING : ERROR MESSAGE -->
					@if (session('dontexist'))
						<div id="errorMessageContainer" class="XXLflexVerticalAlign XXLw-90 XXLmAuto bgWhite XXLbr20">
							<p class="borderBox fcAgricultureElevage XXLcenter p1 XXLmAuto error-messages XXLflexCenteredXY">
								Le menu du {{ $formattedSearch }} - {{ session('dontexist')['midi_soir'] }} n'exite pas ou a été supprimé.<br>
								Souhaitez-vous le créer ?</p>
							<form action="{{ route('cree_menu') }}" method="POST">
								@method('POST')
								@csrf
								<input type="hidden" name="date" id="date" value="{{ session('dontexist')['date'] }}">
								<input type="hidden" name="midi_soir" id="midi_soir" value="{{ session('dontexist')['midi_soir'] }}">
								<button type="submit" value="Creer le menu" id="openPopup"
									class="btnContainer pb1 XXLw-50 XLw-60 Mw-70 Sw-90 XXLmAuto mt1 mb1">
									<div class="btnText bgAgricultureElevage XXLbr50">Créer ce menu</div>
									<div class="btnIcon fcdarkGrey XXLop0">
										<i class="fa-solid fa-pen-to-square"></i>
									</div>
								</button>
							</form>
						</div>
					@endif
					<!-- END : ERROR MESSAGE -->
					<div id="indexNavDeckstop" class="XXLflexCenteredXY">
						<div class="grid XXLw-80 Sw-90 XXLmAuto XXLgap2 Sgap0 XXLh-70 Lh-80 Sh-90 pt5 pb5">
							<button id="indexButton1" class="giantButton XXLspan-4 Lspan-12 XXLflexEnd XXLbr20"
								onclick="window.location.href='{{ route('voir_date') }}';">
								<h5 class="XXLmAuto blur XXLw-100 XXLh-60 XXLflexCenteredXY XXLbrBottom20">
									Voir les menus
								</h5>
							</button>
							<button id="indexButton2" class="giantButton XXLspan-4 Lspan-12 XXLflexEnd XXLbr20"
								onclick="window.location.href='{{ route('cree_date') }}';">
								<h5 class="XXLmAuto blur XXLw-100 XXLh-60 XXLflexCenteredXY XXLbrBottom20">
									Créer un menu
								</h5>
							</button>
							<button id="indexButton3" class="giantButton XXLspan-4 Lspan-12 XXLflexEnd XXLbr20"
								onclick="window.location.href='{{ route('modifier_date') }}';">
								<h5 class="XXLmAuto blur XXLw-100 XXLh-60 XXLflexCenteredXY XXLbrBottom20">
									Modifier un menu
								</h5>
							</button>
						</div>
					</div>
					<div id="indexNavMobile">
						<div class="XXLw-80 Sw-90 XXLmAuto XXLgap2 Sgap0 XXLh-70 Lh-80 Sh-90 pt3 pb3">
							<button type="submit" id="seeMenu" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto mt1 mb1"
								onclick="window.location.href='{{ route('voir_date') }}';">
								<div class="btnText bgAgricultureElevage XXLbr50">Voir le menu</div>
								<div class="btnIcon fcdarkGrey XXLop0">
									<i class="fa-solid fa-eye"></i>
								</div>
							</button>
							<button type="submit" id="seeMenu" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto mt1 mb1"
								onclick="window.location.href='{{ route('cree_date') }}';">
								<div class="btnText bgAgricultureElevage XXLbr50">Créer un menu</div>
								<div class="btnIcon fcdarkGrey XXLop0">
									<i class="fa-solid fa-circle-plus"></i>
								</div>
							</button>
							<button type="submit" id="seeMenu" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto mt1 mb1"
								onclick="window.location.href='{{ route('modifier_date') }}';">
								<div class="btnText bgAgricultureElevage XXLbr50">Modifier un menu</div>
								<div class="btnIcon fcdarkGrey XXLop0">
									<i class="fa-solid fa-pen"></i>
								</div>
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="XXLw-100 bgIce XXLflexboxChild-1">
				<div class="sep bgIce XXLw-80 XXLmAuto"></div>
			</div>
			<!-- BEGINNING : SEARCH FORM -->
			<div class="XXLflexVerticalAlignCenter bgIce pt1 pb2 XXLflexboxChild-1">
				<div class="XXLflex XXLflexVerticalAlignSB XXLh-80 XXLmAuto">
					<form action="{{ route('CRUD_read') }}" method="post" class="grid pt2 pb1">
						@csrf
						<!-- BEGINNING : CHOOSE DATE -->
						<div id="chooseDate" class="XXLspan-6 Mspan-12 XXLflexCenteredXY mb2 grid">
							<label for="selctDate" class="mr2 XXLspan-6">
								<h6 class="XXLmAuto XXLright">Choisir une date:</h6>
							</label>
							<input type="date" name="date" id="date" class="XXLspan-6" />
						</div>
						<!-- END : CHOOSE DATE -->
						<!-- BEGINNING : CHOOSE TIME -->
						<div id="chooseTime" class="XXLspan-6 Mspan-12 XXLflexCenteredXY mb2 grid">
							<label for="choix" class="mr2 XXLspan-6">
								<h6 class="XXLmAuto XXLright">Midi ou soir ? :</h6>
							</label>
							<select name="midi_soir" id="midi_soir" class="XXLspan-6">
								<option value="midi">Midi</option>
								<option value="soir">Soir</option>
							</select>
						</div>
						<!-- END : CHOOSE TIME -->
						<!-- BEGINNING : SEARCH BUTTON -->
						<div class="XXLspan-12">
							<button type="submit" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto">
								<div class="btnText bgEnseignementGeneral XXLbr50">Chercher</div>
								<div class="btnIcon fcdarkGrey XXLop0">
									<i class="fa-solid fa-magnifying-glass"></i>
								</div>
							</button>
						</div>
						<!-- END : SEARCH BUTTON -->
					</form>
					<!-- BEGINNING : ERROR MASSAGE -->
					@if (session('errors') && session('errors')->hasBag('default'))
						<div id="errorMessageContainer" class="XXLflexVerticalAlign XXLw-90 XXLmAuto">
							<p
								class="XXLbr20 borderBox fcAgricultureElevage XXLcenter p1 XXLmAuto bgWhite error-messages XXLflexCenteredXY">
								Le menu que vous recherchez n'existe pas.</p>
						</div>
					@endif
					<!-- END : ERROR MESSAGE -->
				</div>
			</div>
			<!-- END : SEARCH FORM -->
		</div>
		<div id="injectFooter">
			<x-footer-layout> </x-footer-layout>
		</div>
	</div>
</body>

</html>
