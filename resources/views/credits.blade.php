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
		<div class="grid XXLgridRow12 XXLh-100vh XXLw-100 bgIce">
			<div class="XXLspan-12 XXLsLine1 XXLeLine2 bgIce">
				<div id="messages" class="XXLflex XXLflexCenteredXY XXLh-100">
					<h3 class="XXLcenter XXLflexCenteredXY XXLmAuto XXLh-100">Crédits</h3>
				</div>
			</div>
			<div id="bodyApp" class="XXLspan-12 XXLsLine2 XXLeLine11 bgIce">
				<div class="XXLflex XXLh-100">
					<div class="XXLw-80 Sw-90 XXLmAuto">
						<div class="XXLw-100 XXLh-100 XXLbr20">
							<h6>Conception de l'application pour l'affichage d'informations sur écrans à destination de
								campagnes de communication
								interne :</h6>
							<ul class="pb2">
								<li>Lewis Plommé Mallet (stagiaire en formation chez Via Formation pour un titre professionnelle
									en développement web & web mobile)
								</li>
								<li>Vincent Sahuc (Chargé de communication du Campus Terre & Avenir 2023 - 2024)
								</li>
								<li>Frédéric Renaud (Chargé du parc informatique et du système réseau)</li>
							</ul>
							<h6>Conception maquettes et wireframes :</h6>
							<ul class="pb2">
								<li>Lewis Plommée Mallet</li>
								<li>Vincent Sahuc</li>
							</ul>
							<h6>Conception et design graphique :</h6>
							<ul class="pb2">
								<li>Vincent Sahuc</li>
							</ul>
							<h6>Développement :</h6>
							<ul class="pb2">
								<li>Développement via PHP et framework Laravel : Lewis Plommée Mallet</li>
								<li>Développement HTML & CSS : Vincent Sahuc</li>
								<li>Développement Javascript : Lewis Plommée Mallet & Vincent Sahuc</li>
							</ul>
							<h6>Gestion des bases de données :</h6>
							<ul class="pb2">
								<li>Lewis Plommée Mallet</li>
								<li>Frédéric Renaud</li>
							</ul>
							<h6>En partenariat avec <a href="https://www.viaformation.fr/">
									<h6>Via Formation</h6>
								</a>, centre de formation d'Alençon.
								<br>
								Le code source est disponible sur <a href="https://github.com/ElementaryLewis">
									<h6>GitHub</h6>
							</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="injectFooter">
			<x-footer-layout> </x-footer-layout>
		</div>
	</div>
</body>

</html>
