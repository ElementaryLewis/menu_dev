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
?>

<body class="XXLh-100vh bgIce">
	<div id="mainContainer">
		<div id="injectMenu">
			<x-header-layout>
			</x-header-layout>
		</div>
		<div class="XXLh-100vh XXLflexCenteredXY">
			<div>
				<div class="grid XXLw-100 bgIce pt3 borderBox">
					<div class="XXLspan-12 XXLsLine2 XXLeLine4 bgIce XXLflexboxChild-1">
						<div id="messages" class="XXLflex XXLflexVerticalAlignCenter XXLh-100">
							<h3 class="XXLcenter XXLflexCenteredXY XXLmAuto XXLh-100 pb2">
								Oups !<br>Il semble qu'il y ait eu une erreur !
							</h3>
							<h6 class="XXLcenter">
								Nous n'arrivons pas à trouver la page que vous cherchez.<br>
								<br>
								Veuillez vous connecter en tant qu'administrateur.trice<br>
								ou vous rapprochez-vous du service informatique pour en savoir plus.
							</h6>
						</div>
					</div>
				</div>
				<div class="XXLw-100 bgIce borderBox">
					<div class="sep bgIce XXLw-80 XXLmAuto"></div>
				</div>
				<div class="XXLspan-12 XXLsLine4 XXLeLine12 bgIce pt3 pb3 borderBox">
					<h6 class="XXLcenter XXLw-100">Contacter un.e administrateur.trice</h6>
					<button type="submit" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto"
						onclick="window.location.href='{{ route('contacts') }}';">
						<div class="btnText bgAgricultureElevage XXLbr50">Contacts
						</div>
						<div class="btnIcon fcdarkGrey XXLop0">
							<i class="fa-solid fa-address-book"></i>
						</div>
					</button>
				</div>
			</div>
		</div>
		<div id="injectFooter">
			<x-footer-layout> </x-footer-layout>
		</div>
	</div>
</body>

</html>
