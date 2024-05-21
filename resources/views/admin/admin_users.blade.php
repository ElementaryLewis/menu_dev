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
			<!--BEGINNING : TILTE PAGE -->
			<div id="pageTitle" class="XXLflexCenteredXY bgIce">
				<div id="messages" class="XXLflex XXLflexCenteredXY XXLh-100">
					<h3 class="XXLcenter XXLflexCenteredXY XXLmAuto XXLh-100">Utilisateurs</h3>
				</div>
			</div>
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
			@if (session('status') === 'profile-deleted')
				<div id="errorMessageContainer" class="XXLflexCenteredXY XXLsCol2 XXLeCol12 XXLsLine11 XXLeLine13 pb1">
					<p class="XXLbr20 borderBox fcRed XXLcenter p1 XXLmAuto bgWhite error-messages XXLflexCenteredXY">
						{{ __('Profile has been deleted.') }}
					</p>
				</div>
			@endif
			<!-- END : TILTE PAGE -->
			<div class="grid XXLw-100 pt2 pb3 bgIce">
				<div class="XXLsCol2 XXLeCol12 grid">
					<!--BEGINNING : CREATE PROFILE -->
					<div class="XXLspan-3 Lspan-4 Mspan-6 Sspan-12 XXLbr20 newUserCard mt1 mr1 mb2 ml1 XXLflexVerticalAlignSB ">
						<div class="XXLflexCenteredXY">
							<i class="fa-solid fa-user iconNewUserCard fcWhite darkGrey XXLbr50 p07 XXLcenter"></i>
						</div>
						<div>
							<div class="XXLflexVerticalAlign">
								<h6 class="XXLmAuto pb1">Créer</h6>
								<h6 class="XXLmAuto pb1">un profil</h6>
							</div>
						</div>
						<div class="bottomNewUserCard pt1 pb1 XXLbrBottom20">
							<div class="XXLw-100">
								<button type="button" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto"
									onclick="window.location.href='{{ route('register') }}';">
									<div class=" btnText bgWhite XXLbr50">Créer
									</div>
									<div class="btnIcon fcdarkGrey XXLop0">
										<i class="fa-solid fa-circle-plus"></i>
									</div>
								</button>
							</div>
						</div>
					</div>
					<!--END : CREATE PROFILE -->
					<!--BEGINNING : USER CARD-->
					@foreach ($users as $userOption)
						<div class="XXLspan-3 Lspan-4 Mspan-6 Sspan-12 XXLbr20 userCard mt1 mr1 mb2 ml1 ">
							<div class="XXLflexCenteredXY">
								<i class="fa-solid fa-user iconUserCard fcWhite darkGrey XXLbr50 p07 XXLcenter"></i>
							</div>
							<div>
								<div class="XXLflexVerticalAlign">
									<h6 class="XXLmAuto pb1">{{ $userOption->firstname }}</h6>
									<h6 class="XXLmAuto pb1">{{ $userOption->surname }}</h6>
								</div>
							</div>
							<div class="bottomUserCard pt1 pb1 XXLbrBottom20">
								<form method="get" action="{{ route('admin.view') }}" class="XXLw-100 toSeeDeckstop">
									@csrf
									<input name="user_id" id="user_id" type=hidden value="{{ $userOption->id }}">
									</input>
									<button type="submit" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto">
										<div class="btnText bgAgricultureElevage XXLbr50">Voir</div>
										<div class="btnIcon fcdarkGrey XXLop0">
											<i class="fa-solid fa-eye"></i>
										</div>
									</button>
								</form>
								<div class="XXLflexHorizontalAlignSB XXLw-80 XXLmAuto pt1">
									<!-- READ : USER CARD-->
									<form method="get" action="{{ route('admin.view') }}" class="toSeeMobile smallBtnUserCard">
										@csrf
										<input name="user_id" id="user_id" type=hidden value="{{ $userOption->id }}">
										</input>
										<button type="submit" class="cursorP darkGrey XXLbr50 XXLflexCenteredXY">
											<i class="fa-solid fa-eye fcWhite"></i>
										</button>
									</form>
									<!-- UPDATE : USER CARD-->
									<form method="post" action="{{ route('admin.edit') }}" class="smallBtnUserCard">
										@csrf
										<input name="user_id" id="user_id" type=hidden value="{{ $userOption->id }}">
										</input>
										<button type="submit" class="cursorP darkGrey XXLbr50 XXLflexCenteredXY">
											<i class="fa-solid fa-pen-to-square fcWhite"></i>
										</button>
									</form>
									<!-- DELETE : USER CARD-->
									@if (!$userOption->isAdmin())
										<div class="smallBtnUserCard">
											<button type="button" class="cursorP darkGrey XXLbr50 XXLflexCenteredXY" onclick="togglePupUp20()">
												<i class="fa-solid fa-trash-can fcWhite"></i>
											</button>
										</div>
									@endif
								</div>
							</div>
						</div>
					@endforeach
					<!--END : USER CARD-->
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
								<input name="user_id" id="user_id" type=hidden value="{{ $userOption->id }}">
								</input>
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
			<!-- END : POPUP SUPPRIMER COMPTE -->
		@endauth
		<div id="injectFooter">
			<x-footer-layout> </x-footer-layout>
		</div>
	</div>
</body>

</html>
