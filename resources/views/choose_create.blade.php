<!DOCTYPE html>
<html lang="fr" class="XXLh-100">
<x-doctype-layout> </x-doctype-layout>
<?php
header('Content-type: text/html; charset=UFT-8');
mb_internal_encoding('UTF-8');
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_fr');

$submittedDate = date('Y-m-d');
if (session('exist')) {
    $submittedDate = session('exist')['date'];
}

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
			<x-header-layout>
			</x-header-layout>
		</div>
		<div class="XXLflexbox">
			<div id="pageTitle" class="XXLflexCenteredXY bgIce XXLflexboxChild-1">
				<div id="messages" class="XXLflex XXLflexCenteredXY XXLh-100">
					<h3 class="XXLcenter XXLflexCenteredXY XXLmAuto XXLh-100">Créer un nouveau menu</h3>
				</div>
			</div>
			<!-- BEGINNING : SEARCH FORM -->
			<div class="XXLflexVerticalAlignCenter bgIce XXLflexboxChild-1">
				<div class="XXLflex XXLflexVerticalAlignSB XXLh-80 XXLmAuto">
					<!-- BEGINNING : MENU CREE MESSAGE -->
					@if (session('status'))
						<div id="errorMessageContainer" class="XXLflexVerticalAlign XXLw-90 XXLmAuto bgWhite XXLbr20">
							<p class="borderBox fcEnvironnement XXLcenter p1 XXLmAuto error-messages XXLflexCenteredXY">
								Le menu a été crée avec succès.
							</p>
						</div>
					@endif
					<!-- END : MENU CREE MESSAGE -->
					<!-- BEGINNING : ERROR MESSAGE -->
					@if (session('exist'))
						<div id="errorMessageContainer" class="XXLflexVerticalAlign XXLw-90 XXLmAuto bgWhite XXLbr20">
							<p class="borderBox fcAgricultureElevage XXLcenter p1 XXLmAuto error-messages XXLflexCenteredXY">
								Le menu du {{ $formattedDate }} - {{ session('exist')['midi_soir'] }} existe déjà.<br>
								Souhaitez-vous le modifier ?</p>
							<form action="{{ route('modifier_menu') }}" method="POST">
								@method('POST')
								@csrf
								<input type="hidden" name="date" id="date" value="{{ session('exist')['date'] }}">
								<input type="hidden" name="midi_soir" id="midi_soir" value="{{ session('exist')['midi_soir'] }}">
								<button type="submit" value="Modifier le menu" id="openPopup"
									class="btnContainer pb1 XXLw-50 XLw-60 Mw-70 Sw-90 XXLmAuto mt1 mb1">
									<div class="btnText bgAgricultureElevage XXLbr50">Modifier ce menu</div>
									<div class="btnIcon fcdarkGrey XXLop0">
										<i class="fa-solid fa-pen-to-square"></i>
									</div>
								</button>
							</form>
						</div>
					@endif
					<!-- END : ERROR MESSAGE -->
					<form action="{{ route('cree_menu') }}" method="POST" class="grid pt3">
						@method('POST')
						@csrf
						<!-- BEGINNING : CHOOSE DATE -->
						<div id="chooseDate" class="XXLspan-6 Mspan-12 XXLflexCenteredXY mb2 grid">
							<label for="date" class="mr2 XXLspan-6">
								<h6 class="XXLmAuto XXLright">Choisir une date:</h6>
							</label>
							<input type="date" name="date" id="date" value="{{ old('date') }}" class="XXLspan-6" />
						</div>
						<!-- END : CHOOSE DATE -->
						<!-- BEGINNING : CHOOSE TIME -->
						<div id="chooseTime" class="XXLspan-6 Mspan-12 XXLflexCenteredXY mb2 grid">
							<label for="midi_soir" class="mr2 XXLspan-6">
								<h6 class="XXLmAuto XXLright">Midi ou soir ? :</h6>
							</label>
							<select id="midi_soir" name="midi_soir" class="XXLspan-6">
								<option value="midi">Midi</option>
								<option value="soir">Soir</option>
							</select>
						</div>
						<!-- END : CHOOSE TIME -->
						<!-- BEGINNING : SEARCH BUTTON -->
						<div class="XXLspan-12">
							<button type="submit" value="Creer le menu" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto">
								<div class="btnText bgEnseignementGeneral XXLbr50">Créer le menu</div>
								<div class="btnIcon fcdarkGrey XXLop0">
									<i class="fa-solid fa-circle-plus"></i>
								</div>
							</button>
						</div>
						<!-- END : SEARCH BUTTON -->
					</form>

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
