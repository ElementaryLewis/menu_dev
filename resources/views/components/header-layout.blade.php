<div id="headerNavContainer" class="darkGrey XXLflexHorizontalAlignSB XXLrelative">
	<div id="logoContainer" class="XXLw-10">
		<button type="button" class="XXLw-100 XXLflexCenteredXY" onclick="window.location.href='{{ route('index') }}';">
			<div class="p1 XXLbr50 borderBox XXLBordWhite XXLflexCenteredXY XXLabsolute">
				<img src="{{ asset('img/palmes-blanches-fond-transparent-hd-min.png') }}" alt="" />
			</div>
		</button>
	</div>
	{{-- Hamburger Menu -- Mobile Only --}}
	<div id="hamburgerMenu-btn" class="XXLabsolute">
		<span class="XXLflexEndRow">
			<div class="XXLabsolute XXLflexCenteredXY">
				<i class="fa-solid fa-bars fcWhite"></i>
			</div>
		</span>
	</div>
	{{-- Menu Header -- Mobile Only --}}
	<ul id="item-h-nav-container"
		class="lsNone XXLflexHorizontalAlign @guest XXLw-30 XLw-30 Lw-40 Mw-100 @endguest XXLw-60 XLw-70 Lw-80 Mw-100">
		<li id="homeItem" class="itemNav XXLw-20 Mw-100 blur">
			<button type="button" class="XXLflexVerticalAlignCenter XXLw-100"
				onclick="window.location.href='{{ route('index') }}';">
				<i class="fa-solid fa-house XXLmAuto fcWhite"></i>
				<h6 class="XXLmAuto fcWhite XXLfw400 pt03">Accueil</h6>
			</button>
		</li>
		@guest
			<li id="logIn" class="itemNav XXLw-20 Mw-100 blur">
				<button type="button" class="XXLflexVerticalAlignCenter XXLw-100"
					onclick="window.location.href='{{ route('login') }}';">
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
						<button type="button" class="XXLflexVerticalAlignCenter XXLw-100 widthFluid"
							onclick="window.location.href='{{ route('profile.view') }}';">
							<i class="fa-regular fa-user XXLmAuto fcWhite"></i>
							<h6 class="XXLmAuto fcWhite XXLfw400 pt03">
								Mon compte
							</h6>
						</button>
						<button type="button" class="XXLflexVerticalAlignCenter XXLw-100 widthFluid"
							onclick="window.location.href='{{ route('admin.users') }}';">
							<i class="fa-solid fa-users XXLmAuto fcWhite"></i>
							<h6 class="XXLmAuto fcWhite XXLfw400 pt03">
								Membres
							</h6>
						</button>
						<form action="{{ route('logout') }}" method="post">
							<button type="submit" class="XXLflexVerticalAlignCenter XXLw-100 widthFluid">
								<i class="fa-solid fa-power-off XXLmAuto fcWhite"></i>
								<h6 class="XXLmAuto fcWhite XXLfw400 pt03">
									Déconnexion
								</h6>
								@csrf
							</button>
						</form>
					</span>
				</li>
				<li id="adminSpace" class="itemNav XXLw-20 Mw-100 blur mobileOnly">
					<button type="button" class="XXLflexVerticalAlignCenter XXLw-100"
						onclick="window.location.href='{{ route('profile.view') }}';">
						<i class="fa-regular fa-user XXLmAuto fcWhite"></i>
						<h6 class="XXLmAuto fcWhite XXLfw400 pt03">
							Mon compte
						</h6>
					</button>
				</li>
				<li id="allUsers" class="itemNav XXLw-20 Mw-100 blur mobileOnly">
					<button type="button" class="XXLflexVerticalAlignCenter XXLw-100"
						onclick="window.location.href='{{ route('admin.users') }}';">
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
						<button type=" button" class="XXLflexVerticalAlignCenter XXLw-100 widthFluid"
							onclick="window.location.href='{{ route('profile.view') }}';">
							<i class="fa-regular fa-user XXLmAuto fcWhite"></i>
							<h6 class="XXLmAuto fcWhite XXLfw400 pt03">
								Mon compte
							</h6>
						</button>
						<form action="{{ route('logout') }}" method="post">
							<button type="submit" class="XXLflexVerticalAlignCenter XXLw-100 widthFluid">
								<i class="fa-solid fa-power-off XXLmAuto fcWhite"></i>
								<h6 class="XXLmAuto fcWhite XXLfw400 pt03">
									Déconnexion
								</h6>
							</button>
							@csrf
						</form>
					</span>
				</li>
				<li id="adminSpace" class="itemNav XXLw-20 Mw-100 blur mobileOnly">
					<button type="button" class="XXLflexVerticalAlignCenter XXLw-100"
						onclick="window.location.href='{{ route('profile.view') }}';">
						<i class="fa-solid fa-user XXLmAuto fcWhite"></i>
						<h6 class="XXLmAuto fcWhite XXLfw400 pt03">
							Mon compte
						</h6>
					</button>
				</li>
			@endif
			<li id="menusItem" class="itemNav XXLw-20 Mw-100 blur">
				<button type="button" class="XXLflexVerticalAlignCenter XXLw-100"
					onclick="window.location.href='{{ route('voir_date') }}';">
					<i class="fa-solid fa-eye XXLmAuto fcWhite"></i>
					<h6 class="XXLmAuto fcWhite XXLfw400 pt03">Menus</h6>
				</button>
			</li>
			<li id="createItem" class="itemNav XXLw-20 Mw-100 blur">
				<button type="button" class="XXLflexVerticalAlignCenter XXLw-100"
					onclick="window.location.href='{{ route('cree_date') }}';">
					<i class="fa-solid fa-circle-plus XXLmAuto fcWhite"></i>
					<h6 class="XXLmAuto fcWhite XXLfw400 pt03">Créer</h6>
				</button>
			</li>
			<li id="editItem" class="itemNav XXLw-20 Mw-100 blur">
				<button type="button" class="XXLflexVerticalAlignCenter XXLw-100"
					onclick="window.location.href='{{ route('modifier_date') }}';">
					<i class="fa-solid fa-pen-to-square XXLmAuto fcWhite"></i>
					<h6 class="XXLmAuto fcWhite XXLfw400 pt03">Modifier</h6>
				</button>
			</li>
			<li id="logOut" class="itemNav XXLw-20 Mw-100 blur mobileOnly">
				<form action="{{ route('logout') }}" method="post">
					<button type="submit" class="XXLflexVerticalAlignCenter XXLw-100">
						<i class="fa-solid fa-power-off XXLmAuto fcWhite"></i>
						<h6 class="XXLmAuto fcWhite XXLfw400 pt03">
							Déconnexion
						</h6>
						@csrf
					</button>
				</form>
			</li>
		@endauth
	</ul>
</div>
