<!DOCTYPE html>
<html lang="fr" class="XXLh-100">
<x-doctype-layout> </x-doctype-layout>
<?php
header('Content-type: text/html; charset=UFT-8');
mb_internal_encoding('UTF-8');
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_fr');

$submittedDate = date('Y-m-d');
if (session('dontexist')) {
    $submittedDate = session('dontexist')['date'];
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
		<!-- BEGINNING : MENU OF THE DAY -->
		<div class="grid XXLw-100 pt1 pb1 bgIce">
			<!-- BEGINNING : TITLE - MENU OF THE DAY -->
			<div id="pageTitle" class="XXLspan-12 pb3">
				<div class="pt1 pb1 XXLw-80 XXLmAuto separator1 bgIce"></div>
				<div id="messages" class="XXLflex XXLflexVerticalAlign XXLh-90">
					<h3 class="XXLcenter XXLflexCenteredXY XXLmAuto XXLh-90">Voir les menus du jour</h3>
					<h5 class="XXLcenter XXLflexCenteredXY XXLmAuto XXLh-90">{{ $formattedDate }}</h6>
						<!-- BEGINNING : MENU MESSAGE -->
						@if (session('status') == 'menu_deleted')
							<div id="errorMessageContainer" class="XXLflexVerticalAlign XXLw-90 XXLmAuto bgWhite XXLbr20">
								<p class="borderBox fcEnvironnement XXLcenter p1 XXLmAuto error-messages XXLflexCenteredXY">
									Le menu a été supprimé.
								</p>
							</div>
						@endif
						@if (session('status') == 'menu_modified')
							<div id="errorMessageContainer" class="XXLflexVerticalAlign XXLw-90 XXLmAuto bgWhite XXLbr20">
								<p class="borderBox fcEnvironnement XXLcenter p1 XXLmAuto error-messages XXLflexCenteredXY">
									Le menu a été modifié.
								</p>
							</div>
						@endif
						<!-- END : MENU MESSAGE -->
						<!-- BEGINNING : ERROR MESSAGE -->
						@if (session('dontexist'))
							<div id="errorMessageContainer" class="XXLflexVerticalAlign XXLw-90 XXLmAuto bgWhite XXLbr20">
								<p class="borderBox fcAgricultureElevage XXLcenter p1 XXLmAuto error-messages XXLflexCenteredXY">
									Le menu du {{ $formattedDate }} - {{ session('dontexist')['midi_soir'] }} n'existe pas ou a été supprimé.<br>
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
				</div>
			</div>
			<!-- END : TITLE - MENU OF THE DAY -->
			<!-- BEGINNING : BUTTONS - MENU OF THE DAY - FOR DESKTOP -->
			@if (!isset($menuPresent[0]) || !isset($menuPresent[1]))
				<div class="XXLspan-12 bgIce pt2 toSeeDeckstopMenu">
					<div class="XXLflex XXLh-90">
						<div id="errorMessageContainer" class="XXLflexVerticalAlign XXLw-90 XXLmAuto bgWhite XXLbr20">
							@if (!isset($menuPresent[0]) && !isset($menuPresent[1]))
								<p class="borderBox fcAgricultureElevage XXLcenter p1 XXLmAuto error-messages XXLflexCenteredXY">
									Le menu d'aujourd'hui n'existe pas.<br>
									Souhaitez-vous le créer ?
								</p>
								<form action="{{ route('cree_menu') }}" method="POST">
									@method('POST')
									@csrf
									<input type="hidden" name="date" id="date" value="{{ date('Y-m-d') }}">
									<input type="hidden" name="midi_soir" id="midi_soir" value="midi">
									<button type="submit" value="Creer le menu" id="openPopup"
										class="btnContainer pb1 XXLw-50 XLw-60 Mw-70 Sw-90 XXLmAuto mt1 mb1">
										<div class="btnText bgAgricultureElevage XXLbr50">Créer le menu du midi</div>
										<div class="btnIcon fcdarkGrey XXLop0">
											<i class="fa-solid fa-pen-to-square"></i>
										</div>
									</button>
								</form>
								<form action="{{ route('cree_menu') }}" method="POST">
									@method('POST')
									@csrf
									<input type="hidden" name="date" id="date" value="{{ date('Y-m-d') }}">
									<input type="hidden" name="midi_soir" id="midi_soir" value="soir">
									<button type="submit" value="Creer le menu" id="openPopup"
										class="btnContainer pb1 XXLw-50 XLw-60 Mw-70 Sw-90 XXLmAuto mt1 mb1">
										<div class="btnText bgAgricultureElevage XXLbr50">Créer le menu du soir</div>
										<div class="btnIcon fcdarkGrey XXLop0">
											<i class="fa-solid fa-pen-to-square"></i>
										</div>
									</button>
								</form>
							@elseif (!isset($menuPresent[1]))
								<p class="borderBox fcAgricultureElevage XXLcenter p1 XXLmAuto error-messages XXLflexCenteredXY">
									Le menu du midi n'existe pas.<br>
									Souhaitez-vous le créer ?
								</p>
								<form action="{{ route('cree_menu') }}" method="POST">
									@method('POST')
									@csrf
									<input type="hidden" name="date" id="date" value="{{ date('Y-m-d') }}">
									<input type="hidden" name="midi_soir" id="midi_soir" value="midi">
									<button type="submit" value="Creer le menu" id="openPopup"
										class="btnContainer pb1 XXLw-50 XLw-60 Mw-70 Sw-90 XXLmAuto mt1 mb1">
										<div class="btnText bgAgricultureElevage XXLbr50">Créer le menu du midi</div>
										<div class="btnIcon fcdarkGrey XXLop0">
											<i class="fa-solid fa-pen-to-square"></i>
										</div>
									</button>
								</form>
							@else
								<p class="borderBox fcAgricultureElevage XXLcenter p1 XXLmAuto error-messages XXLflexCenteredXY">
									Le menu du soir n'existe pas.<br>
									Souhaitez-vous le créer ?
								</p>
								<form action="{{ route('cree_menu') }}" method="POST">
									@method('POST')
									@csrf
									<input type="hidden" name="date" id="date" value="{{ date('Y-m-d') }}">
									<input type="hidden" name="midi_soir" id="midi_soir" value="soir">
									<button type="submit" value="Creer le menu" id="openPopup"
										class="btnContainer pb1 XXLw-50 XLw-60 Mw-70 Sw-90 XXLmAuto mt1 mb1">
										<div class="btnText bgAgricultureElevage XXLbr50">Créer le menu du soir</div>
										<div class="btnIcon fcdarkGrey XXLop0">
											<i class="fa-solid fa-pen-to-square"></i>
										</div>
									</button>
								</form>
							@endif
						</div>
					</div>
				</div>
			@endif
			@foreach ($menuPresent as $menu)
				<div class="XXLspan-12 bgIce pt2 toSeeDeckstopMenu">
					<div class="XXLflex XXLh-100">
						<form action="{{ route('CRUD_read') }}" method="post"
							class="grid XXLw-80 Sw-100 XXLmAuto XXLgap2 Sgap0 userCardContainer">
							@csrf
							<input type="hidden" name="date" id="date" value="{{ $menu['date'] }}">
							<input type="hidden" name="midi_soir" id="midi_soir" value="{{ $menu['midi_soir'] }}">
							<button type="submit" id="menuButton1" class="giantButton XXLsCol4 XXLeCol10 Mspan-12 XXLflexEnd XXLbr20">
								<h5 class="XXLmAuto blur XXLw-100 XXLh-60 XXLflexCenteredXY XXLbrBottom20">Menu du {{ $menu['midi_soir'] }}
								</h5>
							</button>
						</form>
					</div>
				</div>
			@endforeach
		</div>
		<!-- END : BUTTONS - MENU OF THE DAY - FOR DESKTOP -->
		<!-- BEGINNING : BUTTONS - MENU OF THE DAY - FOR MOBILE -->
		@if (!isset($menuPresent[0]) || !isset($menuPresent[1]))
			<div id="errorMessageContainer" class="XXLflexVerticalAlign XXLw-90 XXLmAuto bgWhite XXLbr20 toSeeMobileMenu">
				@if (!isset($menuPresent[0]) && !isset($menuPresent[1]))
					<p class="borderBox fcAgricultureElevage XXLcenter p1 XXLmAuto error-messages XXLflexCenteredXY">
						Le menu d'aujourd'hui n'existe pas.<br>
						Souhaitez-vous le créer ?</p>
					<form action="{{ route('cree_menu') }}" method="POST">
						@method('POST')
						@csrf
						<input type="hidden" name="date" id="date" value="{{ date('Y-m-d') }}">
						<input type="hidden" name="midi_soir" id="midi_soir" value="midi">
						<button type="submit" value="Creer le menu" id="openPopup"
							class="btnContainer pb1 XXLw-50 XLw-60 Mw-70 Sw-90 XXLmAuto mt1 mb1">
							<div class="btnText bgAgricultureElevage XXLbr50">Créer le menu du midi</div>
							<div class="btnIcon fcdarkGrey XXLop0">
								<i class="fa-solid fa-pen-to-square"></i>
							</div>
						</button>
					</form>
					<form action="{{ route('cree_menu') }}" method="POST">
						@method('POST')
						@csrf
						<input type="hidden" name="date" id="date" value="{{ date('Y-m-d') }}">
						<input type="hidden" name="midi_soir" id="midi_soir" value="soir">
						<button type="submit" value="Creer le menu" id="openPopup"
							class="btnContainer pb1 XXLw-50 XLw-60 Mw-70 Sw-90 XXLmAuto mt1 mb1">
							<div class="btnText bgAgricultureElevage XXLbr50">Créer le menu du soir</div>
							<div class="btnIcon fcdarkGrey XXLop0">
								<i class="fa-solid fa-pen-to-square"></i>
							</div>
						</button>
					</form>
				@elseif (!isset($menuPresent[1]))
					<p class="borderBox fcAgricultureElevage XXLcenter p1 XXLmAuto error-messages XXLflexCenteredXY">
						Le menu du soir n'existe pas.<br>
						Souhaitez-vous le créer ?</p>
					<form action="{{ route('cree_menu') }}" method="POST">
						@method('POST')
						@csrf
						<input type="hidden" name="date" id="date" value="{{ date('Y-m-d') }}">
						<input type="hidden" name="midi_soir" id="midi_soir" value="soir">
						<button type="submit" value="Creer le menu" id="openPopup"
							class="btnContainer pb1 XXLw-50 XLw-60 Mw-70 Sw-90 XXLmAuto mt1 mb1">
							<div class="btnText bgAgricultureElevage XXLbr50">Créer le menu du soir</div>
							<div class="btnIcon fcdarkGrey XXLop0">
								<i class="fa-solid fa-pen-to-square"></i>
							</div>
						</button>
					</form>
				@else
					<p class="borderBox fcAgricultureElevage XXLcenter p1 XXLmAuto error-messages XXLflexCenteredXY">
						Le menu du midi n'existe pas.<br>
						Souhaitez-vous le créer ?</p>
					<form action="{{ route('cree_menu') }}" method="POST">
						@method('POST')
						@csrf
						<input type="hidden" name="date" id="date" value="{{ date('Y-m-d') }}">
						<input type="hidden" name="midi_soir" id="midi_soir" value="midi">
						<button type="submit" value="Creer le menu" id="openPopup"
							class="btnContainer pb1 XXLw-50 XLw-60 Mw-70 Sw-90 XXLmAuto mt1 mb1">
							<div class="btnText bgAgricultureElevage XXLbr50">Créer le menu du soir</div>
							<div class="btnIcon fcdarkGrey XXLop0">
								<i class="fa-solid fa-pen-to-square"></i>
							</div>
						</button>
					</form>
				@endif
			</div>
		@endif
		@foreach ($menuPresent as $menu)
			<form action="{{ route('CRUD_read') }}" method="post"
				class="XXLspan-4 Mspan-12 XXLflexCenteredXY pt1 toSeeMobileMenu">
				@csrf
				<input type="hidden" name="date" id="date" value="{{ $menu['date'] }}">
				<input type="hidden" name="midi_soir" id="midi_soir" value="{{ $menu['midi_soir'] }}">
				<button type="submit" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto">
					<div class=" btnText bgAgricultureElevage XXLbr50">Menu du midi
					</div>
					<div class="btnIcon fcdarkGrey XXLop0">
						<i class="fa-solid fa-utensils"></i>
					</div>
				</button>
			</form>
		@endforeach
		<!-- END : BUTTONS - MENU OF THE DAY - FOR MOBILE -->
	</div>
	<!-- END : MENU OF THE DAY -->
	<!-- BEGINNING : PAST MENUS-->
	<div class="grid XXLw-100 pt2 pb2 bgIce">
		<!-- BEGINNING : TITLE - PAST MENUS-->
		<div class="XXLspan-12 pb3">
			<div class="pt1 pb1 XXLw-80 XXLmAuto separator1 bgIce"></div>
			<div class="XXLflex XXLflexCenteredXY XXLh-90">
				<h3 class="XXLcenter XXLflexCenteredXY XXLmAuto XXLh-90">Menus passés</h3>
			</div>
			@if (empty($menuPast))
				<div id="errorMessageContainer" class="pt1 pb1 XXLflexVerticalAlign XXLw-90 XXLmAuto bgWhite XXLbr20">
					<p class="borderBox fcAgricultureElevage XXLcenter p1 XXLmAuto error-messages XXLflexCenteredXY">
						Aucune menu n'a été trouvé durant<br>
						les deux dernière semaines.
					</p>
				</div>
			@endif
		</div>

		<!-- END : TITLE - PAST MENUS-->
		<div class="XXLsCol2 XXLeCol12 grid">
			@foreach ($menuPast as $past)
				<?php
				$submittedDate = $past['date'];
				
				// Create a DateTime object from the submitted date
				$dateTime = new DateTime($submittedDate);
				
				// Create an IntlDateFormatter instance for French with a custom pattern
				$formatter = new IntlDateFormatter(
				    'fr_FR', // Locale
				    IntlDateFormatter::LONG, // Date type
				    IntlDateFormatter::NONE, // Time type
				    'Europe/Paris', // Timezone
				    IntlDateFormatter::GREGORIAN, // Calendar
				    'dd MMMM yyyy', // Custom pattern
				);
				
				// Format the date
				$formattedDate = $formatter->format($dateTime);
				?>
				<!--BEGINNING : MENU -->
				<div class="XXLspan-3 Lspan-4 Mspan-6 Sspan-12 XXLbr20 userCard mt1 mr1 mb2 ml1 ">
					<div class="XXLflexCenteredXY">
						<i class="fa-solid fa-utensils iconUserCard fcWhite darkGrey XXLbr50 p07 XXLcenter"></i>
					</div>
					<div>
						<div class="XXLflexVerticalAlign">
							<h6 class="XXLmAuto pb1">{{ $formattedDate }}</h6>
							<h6 class="XXLmAuto pb1">{{ $past['midi_soir'] }}</h6>
						</div>
					</div>
					<div class="bottomUserCard pt1 pb1 XXLbrBottom20">
						<form action="{{ route('CRUD_read') }}" method="post" class="XXLw-100 toSeeDeckstop">
							@csrf
							<input type="hidden" name="date" id="date" value="{{ $past['date'] }}">
							<input type="hidden" name="midi_soir" id="midi_soir" value="{{ $past['midi_soir'] }}">
							<button type="submit" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto">
								<div class="btnText bgAgricultureElevage XXLbr50">Voir</div>
								<div class="btnIcon fcdarkGrey XXLop0">
									<i class="fa-solid fa-eye"></i>
								</div>
							</button>
						</form>
						<div class="XXLflexHorizontalAlignSB XXLw-80 XXLmAuto pt1">
							<form action="{{ route('CRUD_read') }}" method="post" class="toSeeMobile smallBtnUserCard">
								@csrf
								<input type="hidden" name="date" id="date" value="{{ $past['date'] }}">
								<input type="hidden" name="midi_soir" id="midi_soir" value="{{ $past['midi_soir'] }}">
								<button type="submit" class="cursorP darkGrey XXLbr50 XXLflexCenteredXY">
									<i class="fa-solid fa-eye fcWhite"></i>
								</button>
							</form>
							<form action="{{ route('voir_menu') }}" method="post" class="smallBtnUserCard">
								@csrf
								<input type="hidden" name="date" id="date" value="{{ $past['date'] }}">
								<input type="hidden" name="midi_soir" id="midi_soir" value="{{ $past['midi_soir'] }}">
								<button type="submit" class="cursorP darkGrey XXLbr50 XXLflexCenteredXY">
									<i class="fa-solid fa-pen-to-square fcWhite"></i>
								</button>
							</form>
							<form action="{{ route('CRUD_delete') }}" method="post" class="smallBtnBin smallBtnUserCard">
								@csrf
								<input type="hidden" name="date" id="date" value="{{ $past['date'] }}">
								<input type="hidden" name="midi_soir" id="midi_soir" value="{{ $past['midi_soir'] }}">
								<button type="submit" class="cursorP darkGrey XXLbr50 XXLflexCenteredXY">
									<i class="fa-solid fa-trash-can fcWhite"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
				<!--END : MENU -->
			@endforeach
		</div>
	</div>
	<!--END : MENUS PASSES -->
	<!--BEGINNING : MENUS A VENIR -->
	<div class="grid XXLw-100 pt2 pb2 bgIce">
		<div class="XXLspan-12 pb3">
			<div class="pt1 pb1 XXLw-80 XXLmAuto separator1 bgIce">
			</div>
			<div class="XXLflex XXLflexCenteredXY XXLh-90">
				<h3 class="XXLcenter XXLflexCenteredXY XXLmAuto XXLh-90">Menus à venir</h3>
			</div>
			@if (empty($menuFuture))
				<div id="errorMessageContainer" class="pt1 pb1 XXLflexVerticalAlign XXLw-90 XXLmAuto bgWhite XXLbr20">
					<p class="borderBox fcAgricultureElevage XXLcenter p1 XXLmAuto error-messages XXLflexCenteredXY">
						Aucune menu n'est disponible dans<br>
						les deux prochaine semaines.
					</p>
				</div>
			@endif
		</div>
		<div class="XXLsCol2 XXLeCol12 grid">
			<!--BEGINNING : MENU -->
			@foreach ($menuFuture as $future)
				<?php
				$submittedDate = $future['date'];
				
				// Create a DateTime object from the submitted date
				$dateTime = new DateTime($submittedDate);
				
				// Create an IntlDateFormatter instance for French with a custom pattern
				$formatter = new IntlDateFormatter(
				    'fr_FR', // Locale
				    IntlDateFormatter::LONG, // Date type
				    IntlDateFormatter::NONE, // Time type
				    'Europe/Paris', // Timezone
				    IntlDateFormatter::GREGORIAN, // Calendar
				    'dd MMMM yyyy', // Custom pattern
				);
				
				// Format the date
				$formattedDate = $formatter->format($dateTime);
				?>
				<div class="XXLspan-3 Lspan-4 Mspan-6 Sspan-12 XXLbr20 userCard mt1 mr1 mb2 ml1 ">
					<div class="XXLflexCenteredXY">
						<i class="fa-solid fa-utensils iconUserCard fcWhite darkGrey XXLbr50 p07 XXLcenter"></i>
					</div>
					<div>
						<div class="XXLflexVerticalAlign">
							<h6 class="XXLmAuto pb1">{{ $formattedDate }}</h6>
							<h6 class="XXLmAuto pb1">{{ $future['midi_soir'] }}</h6>
						</div>
					</div>
					<div class="bottomUserCard pt1 pb1 XXLbrBottom20">
						<form action="{{ route('CRUD_read') }}" method="post" class="XXLw-100 toSeeDeckstop">
							@csrf
							<input type="hidden" name="date" id="date" value="{{ $future['date'] }}">
							<input type="hidden" name="midi_soir" id="midi_soir" value="{{ $future['midi_soir'] }}">
							<button type="submit" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 XXLmAuto">
								<div class="btnText bgAgricultureElevage XXLbr50">Voir</div>
								<div class="btnIcon fcdarkGrey XXLop0">
									<i class="fa-solid fa-eye"></i>
								</div>
							</button>
						</form>
						<div class="XXLflexHorizontalAlignSB XXLw-80 XXLmAuto pt1">
							<form action="{{ route('CRUD_read') }}" method="post" class="toSeeMobile smallBtnUserCard">
								@csrf
								<input type="hidden" name="date" id="date" value="{{ $future['date'] }}">
								<input type="hidden" name="midi_soir" id="midi_soir" value="{{ $future['midi_soir'] }}">
								<button type="submit" class="cursorP darkGrey XXLbr50 XXLflexCenteredXY">
									<i class="fa-solid fa-eye fcWhite"></i>
								</button>
							</form>
							<form action="{{ route('voir_menu') }}" method="post" class="smallBtnUserCard">
								@csrf
								<input type="hidden" name="date" id="date" value="{{ $future['date'] }}">
								<input type="hidden" name="midi_soir" id="midi_soir" value="{{ $future['midi_soir'] }}">
								<button type="submit" class="cursorP darkGrey XXLbr50 XXLflexCenteredXY">
									<i class="fa-solid fa-pen-to-square fcWhite"></i>
								</button>
							</form>
							<form action="{{ route('CRUD_delete') }}" method="post" class="smallBtnBin smallBtnUserCard">
								@csrf
								<input type="hidden" name="date" id="date" value="{{ $future['date'] }}">
								<input type="hidden" name="midi_soir" id="midi_soir" value="{{ $future['midi_soir'] }}">
								<button type="submit" class="cursorP darkGrey XXLbr50 XXLflexCenteredXY">
									<i class="fa-solid fa-trash-can fcWhite"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
			@endforeach
			<!--END : MENU -->
		</div>
	</div>
	<div class="XXLflexCenteredXY bgIce pt3">
		<div class="XXLflex XXLflexCenteredXY XXLh-90">
			<h3 class="XXLcenter XXLflexCenteredXY XXLmAuto XXLh-90">Trouver un menu</h3>
		</div>
	</div>
	<!-- BEGINNING : SEARCH FORM -->
	<div class="XXLflexVerticalAlignCenter bgIce pt1 pb2">
		<div class="XXLflex XXLflexVerticalAlignSB XXLh-80 XXLmAuto">
			<form action="{{ route('CRUD_read') }}" method="post" class="grid pt2 pb1">
				@csrf
				<!-- BEGINNING : CHOOSE DATE -->
				<div id="chooseDate" class="XXLspan-6 Mspan-12 XXLflexCenteredXY mb2 grid">
					<label for="selctDate" class="mr2 XXLspan-6">
						<h6 class="XXLmAuto XXLright">Choisir une date:</h6>
					</label>
					<input type="date" name="date" id="date" value="{{ old('date', date('Y-m-d')) }}" class="XXLspan-6" />
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
			@if (session('exist'))
				<div id="errorMessageContainer" class="XXLflexVerticalAlign XXLw-90 XXLmAuto">
					<p class="XXLbr20 borderBox fcAgricultureElevage XXLcenter p1 XXLmAuto bgWhite error-messages XXLflexCenteredXY">
						Le menu que vous recherchez n'existe pas.</p>
				</div>
				<!-- END : ERROR MESSAGE -->
			@endif
		</div>
	</div>
	<!-- END : SEARCH FORM -->
	<div id="injectFooter">
		<x-footer-layout> </x-footer-layout>
	</div>
	</div>
</body>

</html>
