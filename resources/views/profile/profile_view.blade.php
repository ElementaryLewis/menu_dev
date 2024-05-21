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
		<div class="grid XXLgridRow12 XXLh-100vh bgIce">
			<div class="XXLspan-12 XXLsLine2 XXLeLine4">
				<div id="messages" class="XXLflexCenteredXY XXLh-100">
					<h3 class="XXLcenter XXLflexCenteredXY XXLmAuto XXLh-100"><i class="fa-solid fa-user XXLmAuto pr1"></i> Mon profil
					</h3>
				</div>
			</div>
			<div id="bodyApp" class="XXLspan-12 XXLsLine4 XXLeLine11">
				@if (session('status') === 'profile-updated')
					<div id="errorMessageContainer" class="XXLflexCenteredXY XXLsCol2 XXLeCol12 XXLsLine11 XXLeLine13 pb1">
						<p class="XXLbr20 borderBox fcEnvironnement XXLcenter p1 XXLmAuto bgWhite error-messages XXLflexCenteredXY">
							{{ __('Profile has been updated.') }}
						</p>
					</div>
				@endif
				@if (session('status') === 'password-updated')
					<div id="errorMessageContainer" class="XXLflexCenteredXY XXLsCol2 XXLeCol12 XXLsLine11 XXLeLine13 pb1">
						<p class="XXLbr20 borderBox fcEnvironnement XXLcenter p1 XXLmAuto bgWhite error-messages XXLflexCenteredXY">
							{{ __('The password has been changed.') }}
						</p>
					</div>
				@endif
				<div class="XXLflex XXLh-100">
					<div class="XXLw-80 Sw-90 XXLmAuto">
						<div id="userFormLight" class="XXLw-100 XXLh-100 XXLbr20">
							<div class="grid XXLh-100">
								<ul class="XXLspan-6 Mspan-12 lsNone XXLflexVerticalAlign">
									<div>
										<li class="XXLflexVerticalAlign P1 mb1">
											<div class="XXLw-80 XXLmAuto fcBlack uc XXLfw600">
												<h6 class="XXLmAuto"><i class="fa-solid fa-user"></i>
													Prénom
												</h6>
											</div>
											<div class="pl1 XXLw-80 XXLmAuto inputArea pr1 userItem XXLfw800 uc">
												{{ $user->firstname }}
											</div>
										</li>
										<li class="XXLflexVerticalAlign P1 mb1">
											<div class="XXLw-80 XXLmAuto fcBlack uc XXLfw600">
												<h6 class="XXLmAuto"><i class="fa-regular fa-user"></i>
													Nom
												</h6>
											</div>
											<div class="pl1 XXLw-80 XXLmAuto inputArea pr1 userItem XXLfw800 uc">
												{{ $user->surname }}
											</div>
										</li>
										<li class="XXLflexVerticalAlign P1 mb1">
											<div for="newPassword" class="XXLw-80 XXLmAuto fcBlack uc XXLfw600">
												<h6 class="XXLmAuto"><i class="fa-solid fa-envelope"></i>
													Adresse e-mail
												</h6>
											</div>
											<div class="pl1 XXLw-80 XXLmAuto inputArea pr1 userItem XXLfw800 uc">
												{{ $user->email }}
											</div>
										</li>
										<li class="XXLflexVerticalAlign P1">
											<div class="XXLw-80 XXLmAuto fcBlack uc XXLfw600">
												<h6 class="XXLmAuto"><i class="fa-solid fa-lock"></i>
													Mot de passe
												</h6>
											</div>
											<div class="pl1 XXLw-80 XXLmAuto inputArea pr1 userItem XXLfw800 uc">
												********
											</div>
										</li>
									</div>
								</ul>
								<div id="bgBtnUser"
									class="XXLspan-6 Mspan-12 XXLflexVerticalAlignCenter blur5 XXLbrRight20
									MbrBottom20">
									<button type="submit" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto"
										onclick="window.location.href='{{ route('profile.edit') }}';">
										<div class="btnText bgAgricultureElevage XXLbr50">
											Modifier mon profil
										</div>
										<div class="btnIcon fcdarkGrey XXLop0">
											<i class="fa-solid fa-pen-to-square"></i>
										</div>
									</button>
									<h6 class="XXLmAuto XXLw-70 XLw-80 Mw-90 XXLsepGrey pt1 pb1 XXLcenter mt1">
										Besoin de mettre à jour votre mot de passe ?
									</h6>
									<button type="submit" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto"
										onclick="window.location.href='{{ route('profile.password') }}';">
										<div class="smallBtnText bgEnseignementGeneral XXLbr50">
											Modifier mon mot de passe
										</div>
										<div class="smallBtnIcon fcdarkGrey XXLop0">
											<i class="fa-solid fa-arrow-right"></i>
										</div>
									</button>
								</div>
							</div>
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
