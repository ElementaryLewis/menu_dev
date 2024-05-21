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
			<div class="grid XXLgridRow12 XXLh-100vh bgIce">
				<div class="XXLspan-12 XXLsLine2 XXLeLine4">
					<div id="messages" class="XXLflexCenteredXY XXLh-100">
						<h3 class="XXLcenter XXLflexCenteredXY XXLmAuto XXLh-100"><i class="fa-solid fa-user XXLmAuto pr1"></i>
							Profil
						</h3>
					</div>
				</div>
				<div id="bodyApp" class="XXLspan-12 XXLsLine4 XXLeLine11">
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
										<form method="post" action="{{ route('admin.edit') }}">
											@csrf
											<input type="hidden" name="user_id" value="{{ $user->id }}">
											<button type="submit" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto">
												<div class="btnText bgAgricultureElevage XXLbr50">
													Modifier le profil
												</div>
												<div class="btnIcon fcdarkGrey XXLop0">
													<i class="fa-solid fa-pen-to-square"></i>
												</div>
											</button>
										</form>
										<h6 class="XXLmAuto XXLw-70 XLw-80 Mw-90 XXLsepGrey pt1 pb1 XXLcenter mt1">
											Besoin de mettre à jour votre mot de passe ?
										</h6>
										<form method="get" action="{{ route('admin.password') }}">
											@csrf
											<input type="hidden" name="user_id" value="{{ $user->id }}">
											<button type="submit" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto">
												<div class="smallBtnText bgEnseignementGeneral XXLbr50">
													Modifier le mot de passe</div>
												<div class="smallBtnIcon fcdarkGrey XXLop0">
													<i class="fa-solid fa-arrow-right"></i>
												</div>
											</button>
										</form>
										@if ($user->isAdmin())
											<p class="XXLmAuto XXLw-70 XLw-80 Mw-90 fcRed XXLbr50 pt1 pb1 XXLcenter mt1">
												L'administrateur.trice ne peut pas être supprimé!
											</p>
										@else
											<button type="button" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto" onclick="togglePupUp20()">
												<div class="smallBtnText bgRed XXLbr50">
													Supprimer le compte
												</div>
												<div class="smallBtnIcon fcdarkGrey XXLop0">
													<i class="fa-solid fa-skull-crossbones"></i>
												</div>
											</button>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- BEGINNING : POPUP SUPPRIMER COMPTE -->
			<div id="popUp20" class="XXLfixed XXLw-100 XXLflexCenteredXY">
				<div class="popUpContainer XXLw-80">
					<div id="closePopUp20" class="XXLw-90 XXLflexEndRow">
						<a href="javascript:void(0)" class="tdNone fcDarkGrey bgRed XXLBordRed XXLbr50" onclick="togglePupUp20()">
							<h5 class="XXLmAuto">
								<i class="fa-solid fa-circle-xmark"></i>
							</h5>
						</a>
					</div>
					<div class="bgRed XXLbr20 p2 grid">
						<div class="XXLspan-12 mb2">
							<h6 class="XXLmAuto XXLw-100 XXLcenter">
								<i class="fa-solid fa-triangle-exclamation"></i>
								Etes vous sûr de vouloir supprimer ce compte ?
							</h6>
							<h6 class="XXLmAuto XXLw-100 XXLcenter">
								Cette action est <b>IRREVERSIBLE !</b>
							</h6>
						</div>
						<div class="XXLspan-12 grid">
							<form method="post" action="{{ route('admin.destroy') }}" class="XXLspan-6 Mspan-12">
								@csrf
								@method('delete')
								<input name="user_id" id="user_id" type=hidden value="{{ $user->id }}">
								<button type="submit" id="seeMenu" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 Sw-100 XXLmAuto">
									<div class="btnText bgWhite XXLbr50">
										Supprimer le compte
									</div>
									<div class="btnIcon fcdarkGrey XXLop0">
										<i class="fa-solid fa-skull-crossbones"></i>
									</div>
								</button>
							</form>
							<div class="XXLspan-6 Mspan-12">
								<button type="submit" id="seeMenu" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 Sw-100 XXLmAuto"
									onclick="togglePupUp20()">
									<div class="btnText bgWhite XXLbr50">
										Annuler
									</div>
									<div class="btnIcon fcdarkGrey XXLop0">
										<i class="fa-solid fa-xmark"></i>
									</div>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endauth
		<div id="injectFooter">
			<x-footer-layout> </x-footer-layout>
		</div>
	</div>
</body>

</html>
