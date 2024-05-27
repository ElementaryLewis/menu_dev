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
		@auth
			@if (!Auth::user()->isAdmin())
				{{ abort(403, 'Erreur 403: Vous n\'avez pas la permission d\'accéder à cette page.') }}
			@endif
			<div class="grid XXLgridRow12 XXLh-100vh XXLw-100 bgIce">
				<div class="XXLspan-12 XXLsLine2 XXLeLine4 bgIce">
					<div id="messages" class="XXLflex XXLflexCenteredXY XXLh-100">
						<h3 class="XXLcenter XXLflexCenteredXY XXLmAuto XXLh-100">Editer le profile</h3>
					</div>
				</div>
				<div id="bodyApp" class="XXLspan-12 XXLsLine4 XXLeLine11 bgIce">
					<div class="XXLflex XXLh-100">
						<div class="XXLw-80 Sw-90 XXLmAuto">
							<div id="userForm" class="XXLw-100 XXLh-100 XXLbr20">
								<form method="post" action="{{ route('admin.update') }}" class="grid XXLh-100">
									@csrf
									@method('patch')
									<input id="user_id" name="user_id" type="hidden" value="{{ $user->id }}" required />
									<ul class="XXLspan-6 Mspan-12 lsNone XXLflexVerticalAlign">
										<div>
											<li class="XXLflexVerticalAlign P1 mb1">
												<label for="firstname" class="XXLw-80 XXLmAuto fcIce uc XXLfw600">
													Prénom
												</label>
												<div class="XXLw-80 XXLmAuto inputArea XXLbr10 bgLightGrey XXLflexHorizontalAlign pr1">
													<input class="XXLw-100 bgLightGrey" id="firstname" name="firstname"
														value="{{ old('firstname', $user->firstname) }}" required
														autocomplete="{{ old('firstname', $user->firstname) }}" />
												</div>
											</li>
											<li class="XXLflexVerticalAlign P1 mb1">
												<label for="surname" class="XXLw-80 XXLmAuto fcIce uc XXLfw600">
													Nom
												</label>
												<div class="XXLw-80 XXLmAuto inputArea XXLbr10 bgLightGrey XXLflexHorizontalAlign pr1">
													<input class="XXLw-100 bgLightGrey" id="surname" name="surname"
														value="{{ old('surname', $user->surname) }}" required
														autocomplete="{{ old('surname', $user->surname) }}" />
												</div>
											</li>
											<li class="XXLflexVerticalAlign P1 mb1">
												<label for="email" class="XXLw-80 XXLmAuto fcIce uc XXLfw600">
													Adresse e-mail
												</label>
												<div class="XXLw-80 XXLmAuto inputArea XXLbr10 bgLightGrey XXLflexHorizontalAlign pr1">
													<input class="XXLw-100" id="email" name="email" type="email"
														value="{{ old('email', $user->email) }}" required autocomplete="{{ old('email', $user->email) }}" />
												</div>
											</li>
										</div>
									</ul>
									<div id="bgBtnUser"
										class="XXLspan-6 Mspan-12 XXLflexVerticalAlignCenter blur5 XXLbrRight20
											MbrBottom20">
										<button type="submit" id="openPopup" class="btnContainer pb1 XXLw-50 XLw-60 Mw-70 Sw-90 XXLmAuto">
											<div class="btnText bgAgricultureElevage XXLbr50">
												Modifier le profil
											</div>
											<div class="btnIcon fcdarkGrey XXLop0">
												<i class="fa-solid fa-circle-check"></i>
											</div>
										</button>
								</form>
								<h6 class="XXLmAuto XXLw-70 XLw-80 Mw-90 XXLsepGrey pt1 pb1 XXLcenter mt1">
									Besoin de mettre à jour le mot de passe ?
								</h6>
								<form method="get" action="{{ route('admin.password') }}">
									@csrf
									<input type="hidden" name="user_id" value="{{ $user->id }}">
									<button type="submit" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto">
										<div class="smallBtnText bgEnseignementGeneral XXLbr50">
											Modifier le mot de passe
										</div>
										<div class="smallBtnIcon fcdarkGrey XXLop0">
											<i class="fa-solid fa-arrow-right"></i>
										</div>
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@error('firstname')
			<div id="errorMessageContainer" class="XXLflexVerticalAlign XXLsCol2 XXLeCol12 XXLsLine11 XXLeLine12 bgIce">
				<p class="XXLbr20 borderBox fcAgricultureElevage XXLcenter p1 XXLmAuto bgWhite error-messages XXLflexCenteredXY">
					Veuillez indiquer un prénom complète</p>
			</div>
		@enderror
		@error('surname')
			<div id="errorMessageContainer" class="XXLflexVerticalAlign XXLsCol2 XXLeCol12 XXLsLine11 XXLeLine12 bgIce">
				<p class="XXLbr20 borderBox fcAgricultureElevage XXLcenter p1 XXLmAuto bgWhite error-messages XXLflexCenteredXY">
					Veuillez indiquer un nom de famille complète</p>
			</div>
		@enderror
		@error('email')
			<div id="errorMessageContainer" class="XXLflexVerticalAlign XXLsCol2 XXLeCol12 XXLsLine11 XXLeLine12 bgIce">
				<p class="XXLbr20 borderBox fcAgricultureElevage XXLcenter p1 XXLmAuto bgWhite error-messages XXLflexCenteredXY">
					Veuillez indiquer une adresse e-mail valide</p>
			</div>
		@enderror
	@endauth
	<div id="injectFooter">
		<x-footer-layout> </x-footer-layout>
	</div>
</body>

</html>
