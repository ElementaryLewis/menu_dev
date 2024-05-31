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
		<!--BEGINNING : TILTE PAGE -->
		<div class="XXLflexbox">
			<div id="pageTitle" class="XXLflexCenteredXY bgIce XXLflexboxChild-1">
				<div id="messages" class="XXLflex XXLflexCenteredXY XXLh-100">
					<h3 class="XXLcenter XXLflexCenteredXY XXLmAuto XXLh-100">Contacts</h3>
				</div>
			</div>
			<!-- END : TILTE PAGE -->
			<div class="grid XXLw-100 pt2 pb3 bgIce">
				<div class="XXLsCol2 XXLeCol12 grid">
					<!--BEGINNING : USER CONTACT-->
					<div class="XXLspan-3 Lspan-4 Mspan-6 Sspan-12 XXLbr20 userCard mt1 mr1 mb2 ml1 ">
						<div class="XXLflexCenteredXY">
							<i class="fa-solid fa-user iconUserCard fcWhite darkGrey XXLbr50 p07 XXLcenter"></i>
						</div>
						<div>
							<div class="XXLflexVerticalAlign">
								<h6 class="XXLmAuto pb05">Frédéric</h6>
								<h6 class="XXLmAuto pb05">Renault</h6>
								<p class="XXLmAuto XXLw-90 XXLcenter pt05 pb05 bgLightGrey XXLbr50 fcDarkGrey mb1">
									Administrateur<br>
									Chargé du parc informatique et du système réseau
								</p>
							</div>
						</div>
						<div class="bottomUserCard pt1 pb1 XXLbrBottom20">
							<div class="XXLflexVerticalAlign">
								<img class="XXLmAuto pb1" src=" {{ asset('img\png\contact\contact3.png') }}">
							</div>
						</div>
					</div>
					<!--END : USER CONTACT-->
					<!--BEGINNING : USER CONTACT-->
					<div class="XXLspan-3 Lspan-4 Mspan-6 Sspan-12 XXLbr20 userCard mt1 mr1 mb2 ml1 ">
						<div class="XXLflexCenteredXY">
							<i class="fa-solid fa-user iconUserCard fcWhite darkGrey XXLbr50 p07 XXLcenter"></i>
						</div>
						<div>
							<div class="XXLflexVerticalAlign">
								<h6 class="XXLmAuto pb05">Vincent</h6>
								<h6 class="XXLmAuto pb05">Sahuc</h6>
								<p class="XXLmAuto XXLw-90 XXLcenter pt05 pb05 bgLightGrey XXLbr50 fcDarkGrey mb1">
									Administrateur<br>
									Chargé de communication du Campus Terre & Avenir (2023 - 2024)
								</p>
							</div>
						</div>
						<div class="bottomUserCard pt1 pb1 XXLbrBottom20">
							<div class="XXLflexVerticalAlign">
								<img class="XXLmAuto pb1" src=" {{ asset('img\png\contact\contact2.png') }}">
							</div>
						</div>
					</div>
					<!--END : USER CONTACT-->
					<!--BEGINNING : USER CONTACT-->
					<div class="XXLspan-3 Lspan-4 Mspan-6 Sspan-12 XXLbr20 userCard mt1 mr1 mb2 ml1 ">
						<div class="XXLflexCenteredXY">
							<i class="fa-solid fa-user iconUserCard fcWhite darkGrey XXLbr50 p07 XXLcenter"></i>
						</div>
						<div>
							<div class="XXLflexVerticalAlign">
								<h6 class="XXLmAuto pb05">Lewis</h6>
								<h6 class="XXLmAuto pb05">Plommée Mallett</h6>
								<p class="XXLmAuto XXLw-90 XXLcenter pt05 pb05 bgLightGrey XXLbr50 fcDarkGrey mb1">
									Stagiaire<br>
									Concepteur et développeur d'application web et web mobile</p>
							</div>
						</div>
						<div class="bottomUserCard pt1 pb1 XXLbrBottom20">
							<div class="XXLflexVerticalAlign">
								<img class="XXLmAuto pb1" src=" {{ asset('img\png\contact\contact1.png') }}">
							</div>
						</div>
					</div>
					<!--END : USER CONTACT-->
				</div>
			</div>
		</div>
		<div id="injectFooter">
			<x-footer-layout> </x-footer-layout>
		</div>
	</div>
</body>

</html>
