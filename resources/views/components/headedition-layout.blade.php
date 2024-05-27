<div id="headerNavContainer" class="darkGrey XXLflexHorizontalAlignSB XXLrelative">
	<div id="logoContainer" class="XXLw-10">
		<button type="button" class="XXLw-100 XXLflexCenteredXY" onclick="togglePupUp2()">
			<div class="p1 XXLbr50 borderBox XXLBordWhite XXLflexCenteredXY XXLabsolute">
				<img class="fcWhite" src="{{ asset('img/palmes-blanches-fond-transparent-hd-min.png') }}"
					alt="Logo. Lien vers la page d'acuceil." />
			</div>
		</button>
	</div>
	<div id="hamburgerMenu-btn" class="XXLabsolute">
		<span class="XXLflexEndRow">
			<div class="XXLabsolute XXLflexCenteredXY">
				<i class="fa-solid fa-bars fcWhite"></i>
			</div>
		</span>
	</div>
	<ul id="item-h-nav-container" class="lsNone XXLflexHorizontalAlign XXLw-60 XLw-70 Lw-80 Mw-100">
		<li id="homeItem" class="itemNav XXLw-20 Mw-100 blur">
			<button type="button" class="XXLflexVerticalAlignCenter XXLw-100" onclick="togglePupUp2()">
				<i class="fa-solid fa-house XXLmAuto fcWhite"></i>
				<h6 class="XXLmAuto fcWhite XXLfw400 pt03">Accueil</h6>
			</button>
		</li>
		@guest
			<li id="logIn" class="itemNav XXLw-20 Mw-100 blur">
				<button type="button" class="XXLflexVerticalAlignCenter XXLw-100" onclick="togglePupUp14()">
					<i class="fa-solid fa-power-off XXLmAuto fcWhite"></i>
					<h6 class="XXLmAuto fcWhite XXLfw400 pt03">
						Connexion
					</h6>
				</button>
			</li>
		@endguest
		@auth
			@if (Auth::user()->isAdmin())
				<li id="userItem" class="itemNav XXLw-20 Mw-100 blur deckstopOnly">
					<button id="adminMenuBTN" type="button" class="XXLflexVerticalAlignCenter XXLw-100">
						<i class="fa-solid fa-gear XXLmAuto fcWhite"></i>
						<h6 class="XXLmAuto fcWhite XXLfw400 pt03">Admin</h6>
					</button>
					<span id="adminItems" class="XXLabsolute darkGrey widthFluid">
						<button type="button" class="XXLflexVerticalAlignCenter XXLw-100 widthFluid" onclick="togglePupUp3()">
							<i class="fa-regular fa-user XXLmAuto fcWhite"></i>
							<h6 class="XXLmAuto fcWhite XXLfw400 pt03">
								Mon compte
							</h6>
						</button>
						<button type="button" class="XXLflexVerticalAlignCenter XXLw-100 widthFluid" onclick="togglePupUp12()">
							<i class="fa-solid fa-users XXLmAuto fcWhite"></i>
							<h6 class="XXLmAuto fcWhite XXLfw400 pt03">
								Membres
							</h6>
						</button>
						<button type="button" class="XXLflexVerticalAlignCenter XXLw-100 widthFluid" onclick="togglePupUp13()">
							<i class="fa-solid fa-power-off XXLmAuto fcWhite"></i>
							<h6 class="XXLmAuto fcWhite XXLfw400 pt03">
								Déconnexion
							</h6>
						</button>
					</span>
				</li>
				<li id="adminSpace" class="itemNav XXLw-20 Mw-100 blur mobileOnly">
					<button type="button" class="XXLflexVerticalAlignCenter XXLw-100" onclick="togglePupUp3()">
						<i class="fa-regular fa-user XXLmAuto fcWhite"></i>
						<h6 class="XXLmAuto fcWhite XXLfw400 pt03">
							Mon compte
						</h6>
					</button>
				</li>
				<li id="allUsers" class="itemNav XXLw-20 Mw-100 blur mobileOnly">
					<button type="button" class="XXLflexVerticalAlignCenter XXLw-100" onclick="togglePupUp12()">
						<i class="fa-solid fa-users XXLmAuto fcWhite"></i>
						<h6 class="XXLmAuto fcWhite XXLfw400 pt03">Membres</h6>
					</button>
				</li>
			@else
				<li id="userItem" class="itemNav XXLw-20 Mw-100 blur deckstopOnly">
					<button id="adminMenuBTN" type="button" class="XXLflexVerticalAlignCenter XXLw-100">
						<i class="fa-solid fa-user XXLmAuto fcWhite"></i>
						<h6 class="XXLmAuto fcWhite XXLfw400 pt03">Utilisateur</h6>
					</button>
					<span id="adminItems" class="XXLabsolute darkGrey widthFluid">
						<button type=" button" class="XXLflexVerticalAlignCenter XXLw-100 widthFluid" onclick="togglePupUp3()">
							<i class="fa-regular fa-user XXLmAuto fcWhite"></i>
							<h6 class="XXLmAuto fcWhite XXLfw400 pt03">
								Mon compte
							</h6>
						</button>
						<button type="button" class="XXLflexVerticalAlignCenter XXLw-100 widthFluid" onclick="togglePupUp13()">
							<i class="fa-solid fa-power-off XXLmAuto fcWhite"></i>
							<h6 class="XXLmAuto fcWhite XXLfw400 pt03">
								Déconnexion
							</h6>
						</button>
					</span>
				</li>
				<li id="adminSpace" class="itemNav XXLw-20 Mw-100 blur mobileOnly">
					<button type="button" class="XXLflexVerticalAlignCenter XXLw-100" onclick="togglePupUp3()">
						<i class="fa-regular fa-user XXLmAuto fcWhite"></i>
						<h6 class="XXLmAuto fcWhite XXLfw400 pt03">
							Mon compte
						</h6>
					</button>
				</li>
			@endif
			<li id="menusItem" class="itemNav XXLw-20 Mw-100 blur">
				<button type="button" class="XXLflexVerticalAlignCenter XXLw-100" onclick="togglePupUp4()">
					<i class="fa-solid fa-eye XXLmAuto fcWhite"></i>
					<h6 class="XXLmAuto fcWhite XXLfw400 pt03">Menus</h6>
				</button>
			</li>
			<li id="createItem" class="itemNav XXLw-20 Mw-100 blur">
				<button type="button" class="XXLflexVerticalAlignCenter XXLw-100" onclick="togglePupUp6()">
					<i class="fa-solid fa-circle-plus XXLmAuto fcWhite"></i>
					<h6 class="XXLmAuto fcWhite XXLfw400 pt03">Créer</h6>
				</button>
			</li>
			<li id="editItem" class="itemNav XXLw-20 Mw-100 blur">
				<button type="button" class="XXLflexVerticalAlignCenter XXLw-100" onclick="togglePupUp5()">
					<i class="fa-solid fa-pen-to-square XXLmAuto fcWhite"></i>
					<h6 class="XXLmAuto fcWhite XXLfw400 pt03">Modifier</h6>
				</button>
			</li>
			<li id="logOut" class="itemNav XXLw-20 Mw-100 blur mobileOnly">
				<button type="submit" class="XXLflexVerticalAlignCenter XXLw-100" onclick="togglePupUp13()">
					<i class="fa-solid fa-power-off XXLmAuto fcWhite"></i>
					<h6 class="XXLmAuto fcWhite XXLfw400 pt03">
						Déconnexion
					</h6>
				</button>
			</li>
		@endauth
	</ul>
</div>
<!-- BEGINNING : POPUP RETOUR ANNULER -->
<div id="popUp2" class="XXLfixed XXLw-100 XXLflexCenteredXY">
	<div class="popUpContainer XXLw-80">
		<div id="closePopUp2" class="XXLw-90 XXLflexEndRow">
			<a href="javascript:void(0)" class="tdNone fcDarkGrey bgAgricultureElevage XXLBordOrange XXLbr50"
				onclick="togglePupUp2()">
				<h5 class="XXLmAuto">
					<i class="fa-solid fa-circle-xmark"></i>
				</h5>
			</a>
		</div>
		<div class="bgAgricultureElevage XXLbr20 p2 grid">
			<div class="XXLspan-12 mb2">
				<h6 class="XXLmAuto XXLw-100 XXLcenter">
					<i class="fa-solid fa-triangle-exclamation"></i>
					Etes vous sûr de vouloir changer de page ?
				</h6>
				<p class="XXLmAuto XXLw-100 XXLcenter">
					Toutes les informations que vous avez saisi seront
					perdues.
				</p>
			</div>
			<div class="XXLspan-12 grid">
				<div class="XXLspan-6 Mspan-12">
					<button type="button" id="seeMenu" onclick="window.location.href='{{ route('index') }}';"
						class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 Sw-100 XXLmAuto">
						<div class="btnText bgWhite XXLbr50">
							Retour accueil
						</div>
						<div class="btnIcon fcdarkGrey XXLop0">
							<i class="fa-solid fa-house XXLmAuto"></i>
						</div>
					</button>
				</div>
				<div class="XXLspan-6 Mspan-12">
					<button type="submit" id="seeMenu" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 Sw-100 XXLmAuto"
						onclick="togglePupUp2()">
						<div class="btnText bgWhite XXLbr50">
							Retour éditeur
						</div>
						<div class="btnIcon fcdarkGrey XXLop0">
							<i class="fa-solid fa-pen-to-square"></i>
						</div>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END : POPUP RETOUR ACCUEIL -->
<!-- BEGINNING : POPUP RETOUR PROFILE -->
<div id="popUp3" class="XXLfixed XXLw-100 XXLflexCenteredXY">
	<div class="popUpContainer XXLw-80">
		<div id="closePopUp3" class="XXLw-90 XXLflexEndRow">
			<a href="javascript:void(0)" class="tdNone fcDarkGrey bgAgricultureElevage XXLBordOrange XXLbr50"
				onclick="togglePupUp3()">
				<h5 class="XXLmAuto">
					<i class="fa-solid fa-circle-xmark"></i>
				</h5>
			</a>
		</div>
		<div class="bgAgricultureElevage XXLbr20 p2 grid">
			<div class="XXLspan-12 mb2">
				<h6 class="XXLmAuto XXLw-100 XXLcenter">
					<i class="fa-solid fa-triangle-exclamation"></i>
					Etes vous sûr de vouloir changer de page ?
				</h6>
				<p class="XXLmAuto XXLw-100 XXLcenter">
					Toutes les informations que vous avez saisi seront
					perdues.
				</p>
			</div>
			<div class="XXLspan-12 grid">
				<div class="XXLspan-6 Mspan-12">
					<button type="button" id="seeMenu" onclick="window.location.href='{{ route('profile.view') }}';"
						class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 Sw-100 XXLmAuto">
						<div class="btnText bgWhite XXLbr50">
							Retour profile
						</div>
						<div class="btnIcon fcdarkGrey XXLop0">
							<i class="fa-solid fa-user XXLmAuto"></i>
						</div>
					</button>
				</div>
				<div class="XXLspan-6 Mspan-12">
					<button type="submit" id="seeMenu" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 Sw-100 XXLmAuto"
						onclick="togglePupUp3()">
						<div class="btnText bgWhite XXLbr50">
							Retour éditeur
						</div>
						<div class="btnIcon fcdarkGrey XXLop0">
							<i class="fa-solid fa-pen-to-square"></i>
						</div>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END : POPUP RETOUR PROFIL -->
<!-- BEGINNING : POPUP RETOUR MENUS -->
<div id="popUp4" class="XXLfixed XXLw-100 XXLflexCenteredXY">
	<div class="popUpContainer XXLw-80">
		<div id="closePopUp4" class="XXLw-90 XXLflexEndRow">
			<a href="javascript:void(0)" class="tdNone fcDarkGrey bgAgricultureElevage XXLBordOrange XXLbr50"
				onclick="togglePupUp4()">
				<h5 class="XXLmAuto">
					<i class="fa-solid fa-circle-xmark"></i>
				</h5>
			</a>
		</div>
		<div class="bgAgricultureElevage XXLbr20 p2 grid">
			<div class="XXLspan-12 mb2">
				<h6 class="XXLmAuto XXLw-100 XXLcenter">
					<i class="fa-solid fa-triangle-exclamation"></i>
					Etes vous sûr de vouloir changer de page ?
				</h6>
				<p class="XXLmAuto XXLw-100 XXLcenter">
					Toutes les informations que vous avez saisi seront
					perdues.
				</p>
			</div>
			<div class="XXLspan-12 grid">
				<div class="XXLspan-6 Mspan-12">
					<button type="button" id="seeMenu" onclick="window.location.href='{{ route('voir_date') }}';"
						class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 Sw-100 XXLmAuto">
						<div class="btnText bgWhite XXLbr50">
							Tous les menus
						</div>
						<div class="btnIcon fcdarkGrey XXLop0">
							<i class="fa-solid fa-eye XXLmAuto"></i>
						</div>
					</button>
				</div>
				<div class="XXLspan-6 Mspan-12">
					<button type="submit" id="seeMenu" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 Sw-100 XXLmAuto"
						onclick="togglePupUp4()">
						<div class="btnText bgWhite XXLbr50">
							Retour éditeur
						</div>
						<div class="btnIcon fcdarkGrey XXLop0">
							<i class="fa-solid fa-pen-to-square"></i>
						</div>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END : POPUP RETOUR MENUS -->
<!-- BEGINNING : POPUP RETOUR MODIFIER MENU -->
<div id="popUp5" class="XXLfixed XXLw-100 XXLflexCenteredXY">
	<div class="popUpContainer XXLw-80">
		<div id="closePopUp5" class="XXLw-90 XXLflexEndRow">
			<a href="javascript:void(0)" class="tdNone fcDarkGrey bgAgricultureElevage XXLBordOrange XXLbr50"
				onclick="togglePupUp5()">
				<h5 class="XXLmAuto">
					<i class="fa-solid fa-circle-xmark"></i>
				</h5>
			</a>
		</div>
		<div class="bgAgricultureElevage XXLbr20 p2 grid">
			<div class="XXLspan-12 mb2">
				<h6 class="XXLmAuto XXLw-100 XXLcenter">
					<i class="fa-solid fa-triangle-exclamation"></i>
					Etes vous sûr de vouloir changer de page ?
				</h6>
				<p class="XXLmAuto XXLw-100 XXLcenter">
					Toutes les informations que vous avez saisi seront
					perdues.
				</p>
			</div>
			<div class="XXLspan-12 grid">
				<div class="XXLspan-6 Mspan-12">
					<button type="button" id="seeMenu" onclick="window.location.href='{{ route('modifier_date') }}';"
						class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 Sw-100 XXLmAuto">
						<div class="btnText bgWhite XXLbr50">
							Modifier un menu
						</div>
						<div class="btnIcon fcdarkGrey XXLop0">
							<i class="fa-solid fa-pen-to-square XXLmAuto"></i>
						</div>
					</button>
				</div>
				<div class="XXLspan-6 Mspan-12">
					<button type="submit" id="seeMenu" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 Sw-100 XXLmAuto"
						onclick="togglePupUp5()">
						<div class="btnText bgWhite XXLbr50">
							Retour éditeur
						</div>
						<div class="btnIcon fcdarkGrey XXLop0">
							<i class="fa-solid fa-pen-to-square"></i>
						</div>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END : POPUP RETOUR MODIFIER MENU -->
<!-- BEGINNING : POPUP RETOUR CREER MENU -->
<div id="popUp6" class="XXLfixed XXLw-100 XXLflexCenteredXY">
	<div class="popUpContainer XXLw-80">
		<div id="closePopUp6" class="XXLw-90 XXLflexEndRow">
			<a href="javascript:void(0)" class="tdNone fcDarkGrey bgAgricultureElevage XXLBordOrange XXLbr50"
				onclick="togglePupUp6()">
				<h5 class="XXLmAuto">
					<i class="fa-solid fa-circle-xmark"></i>
				</h5>
			</a>
		</div>
		<div class="bgAgricultureElevage XXLbr20 p2 grid">
			<div class="XXLspan-12 mb2">
				<h6 class="XXLmAuto XXLw-100 XXLcenter">
					<i class="fa-solid fa-triangle-exclamation"></i>
					Etes vous sûr de vouloir changer de page ?
				</h6>
				<p class="XXLmAuto XXLw-100 XXLcenter">
					Toutes les informations que vous avez saisi seront
					perdues.
				</p>
			</div>
			<div class="XXLspan-12 grid">
				<div class="XXLspan-6 Mspan-12">
					<button type="button" id="seeMenu" onclick="window.location.href='{{ route('cree_date') }}';"
						class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 Sw-100 XXLmAuto">
						<div class="btnText bgWhite XXLbr50">
							Créer un menu
						</div>
						<div class="btnIcon fcdarkGrey XXLop0">
							<i class="fa-solid fa-circle-plus XXLmAuto"></i>
						</div>
					</button>
				</div>
				<div class="XXLspan-6 Mspan-12">
					<button type="submit" id="seeMenu" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 Sw-100 XXLmAuto"
						onclick="togglePupUp6()">
						<div class="btnText bgWhite XXLbr50">
							Retour éditeur
						</div>
						<div class="btnIcon fcdarkGrey XXLop0">
							<i class="fa-solid fa-pen-to-square"></i>
						</div>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END : POPUP RETOUR CREER MENU -->
<!-- BEGINNING : POPUP RETOUR PROFILE -->
<div id="popUp12" class="XXLfixed XXLw-100 XXLflexCenteredXY">
	<div class="popUpContainer XXLw-80">
		<div id="closePopUp12" class="XXLw-90 XXLflexEndRow">
			<a href="javascript:void(0)" class="tdNone fcDarkGrey bgAgricultureElevage XXLBordOrange XXLbr50"
				onclick="togglePupUp12()">
				<h5 class="XXLmAuto">
					<i class="fa-solid fa-circle-xmark"></i>
				</h5>
			</a>
		</div>
		<div class="bgAgricultureElevage XXLbr20 p2 grid">
			<div class="XXLspan-12 mb2">
				<h6 class="XXLmAuto XXLw-100 XXLcenter">
					<i class="fa-solid fa-triangle-exclamation"></i>
					Etes vous sûr de vouloir changer de page ?
				</h6>
				<p class="XXLmAuto XXLw-100 XXLcenter">
					Toutes les informations que vous avez saisi seront
					perdues.
				</p>
			</div>
			<div class="XXLspan-12 grid">
				<div class="XXLspan-6 Mspan-12">
					<button type="button" id="seeMenu" onclick="window.location.href='{{ route('admin.users') }}';"
						class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 Sw-100 XXLmAuto">
						<div class="btnText bgWhite XXLbr50">
							Membres
						</div>
						<div class="btnIcon fcdarkGrey XXLop0">
							<i class="fa-solid fa-users"></i>
						</div>
					</button>
				</div>
				<div class="XXLspan-6 Mspan-12">
					<button type="submit" id="seeMenu" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 Sw-100 XXLmAuto"
						onclick="togglePupUp12()">
						<div class="btnText bgWhite XXLbr50">
							Retour éditeur
						</div>
						<div class="btnIcon fcdarkGrey XXLop0">
							<i class="fa-solid fa-pen-to-square"></i>
						</div>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END : POPUP RETOUR PROFIL -->
<!-- BEGINNING : POPUP RETOUR PROFILE -->
<div id="popUp13" class="XXLfixed XXLw-100 XXLflexCenteredXY">
	<div class="popUpContainer XXLw-80">
		<div id="closePopUp13" class="XXLw-90 XXLflexEndRow">
			<a href="javascript:void(0)" class="tdNone fcDarkGrey bgAgricultureElevage XXLBordOrange XXLbr50"
				onclick="togglePupUp13()">
				<h5 class="XXLmAuto">
					<i class="fa-solid fa-circle-xmark"></i>
				</h5>
			</a>
		</div>
		<div class="bgAgricultureElevage XXLbr20 p2 grid">
			<div class="XXLspan-12 mb2">
				<h6 class="XXLmAuto XXLw-100 XXLcenter">
					<i class="fa-solid fa-triangle-exclamation"></i>
					Etes vous sûr de vouloir déconnecter ?
				</h6>
				<p class="XXLmAuto XXLw-100 XXLcenter">
					Toutes les informations que vous avez saisi seront
					perdues.
				</p>
			</div>
			<div class="XXLspan-12 grid">
				<div class="XXLspan-6 Mspan-12">
					<form action="{{ route('logout') }}" method="post">
						<button type="submit" id="seeMenu" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 Sw-100 XXLmAuto">
							<div class="btnText bgWhite XXLbr50">
								Déconnexion
							</div>
							<div class="btnIcon fcdarkGrey XXLop0">
								<i class="fa-solid fa-power-off"></i>
							</div>
						</button>
						@csrf
					</form>
				</div>
				<div class="XXLspan-6 Mspan-12">
					<button type="submit" id="seeMenu" class="btnContainer pb1 XXLw-70 XLw-80 Mw-90 Sw-100 XXLmAuto"
						onclick="togglePupUp13()">
						<div class="btnText bgWhite XXLbr50">
							Retour éditeur
						</div>
						<div class="btnIcon fcdarkGrey XXLop0">
							<i class="fa-solid fa-pen-to-square"></i>
						</div>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END : POPUP RETOUR PROFIL -->
