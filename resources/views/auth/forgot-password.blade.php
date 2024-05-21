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
		<div class="grid XXLgridRow12 XXLh-100vh XXLw-100 bgIce">
			<div class="XXLspan-12 XXLsLine2 XXLeLine4 bgIce">
				<div id="messages" class="XXLflex XXLflexCenteredXY XXLh-100">
					<h3 class="XXLcenter XXLflexCenteredXY XXLmAuto XXLh-100">Mot de passe oublié</h3>
				</div>
			</div>
			@if (session('status'))
				<div id="errorMessageContainer" class="XXLflexCenteredXY XXLsCol2 XXLeCol12 XXLsLine4 XXLeLine4 pb1">
					<p class="XXLbr20 borderBox fcEnvironnement XXLcenter p1 XXLmAuto bgWhite error-messages XXLflexCenteredXY">
						{{ session('status') }}
					</p>
				</div>
			@endif
			<div id="bodyApp" class="XXLspan-12 XXLsLine5 XXLeLine11 bgIce">
				<div class="XXLflex XXLh-100">
					<div class="XXLw-80 Sw-90 XXLmAuto">
						<div id="userForm" class="XXLw-100 XXLh-100 XXLbr20">
							<form action="{{ route('password.email') }}" method="post" class="grid XXLh-100">
								@csrf
								<ul class="XXLspan-6 Mspan-12 lsNone XXLflexVerticalAlign">
									<div>
										<li class="XXLflexVerticalAlign P1 mb1">
											<label for="email" class="XXLw-80 XXLmAuto fcIce uc XXLfw600">
												Adresse e-mail</label>
											<div class="XXLw-80 XXLmAuto inputArea XXLbr10 bgLightGrey XXLflexHorizontalAlign pr1">
												<input class="XXLw-100" id="email" name="email" type="email" value="{{ old('email') }}" required
													autofocus />
											</div>
										</li>
									</div>
								</ul>
								<div id="bgBtnUser"
									class="XXLspan-6 Mspan-12 XXLflexVerticalAlignCenter blur5 XXLbrRight20
                                        MbrBottom20">
									<p class="XXLmAuto XXLw-50 XLw-60 Mw-70 pt1 pb1 XXLcenter mt1">
										Vous avez oublié votre mot de passe ?<br>
										Veuillez entrer votre adresse e-mail et nous vous enverront un lien pour réinitialiser le mot de passe.<br>
									</p>
									<button type="submit" id="openPopup" class="btnContainer pb1 XXLw-50 XLw-60 Mw-70 Sw-90 XXLmAuto">
										<div class="btnText bgAgricultureElevage XXLbr50">Envoyer</div>
										<div class="btnIcon fcdarkGrey XXLop0">
											<i class="fa-solid fa-circle-check"></i>
										</div>
									</button>
									<p class="XXLmAuto XXLw-50 XLw-60 Mw-70 pt1 pb1 XXLcenter mt1">
										En cas de soucis, veuillez contacter le service informatique.
									</p>
									<button type="button" id="openPopup" class="btnContainer pb1 XXLw-50 XLw-60 Mw-70 Sw-90 XXLmAuto"
										onclick="window.location.href='{{ route('contacts') }}';">
										<div class="btnText bgAgricultureElevage XXLbr50">Contacts
										</div>
										<div class="btnIcon fcdarkGrey XXLop0">
											<i class="fa-solid fa-address-book"></i>
										</div>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			@error('email')
				<div id="errorMessageContainer" class="XXLflexVerticalAlign XXLsCol2 XXLeCol12 XXLsLine11 XXLeLine12 bgIce">
					<p class="XXLbr20 borderBox fcAgricultureElevage XXLcenter p1 XXLmAuto bgWhite error-messages XXLflexCenteredXY">
						Veuillez indiquer une adresse e-mail valide</p>
				</div>
			@enderror
		</div>
	</div>
	<div id="injectFooter">
		<x-footer-layout> </x-footer-layout>
	</div>
	</div>
</body>

</html>
