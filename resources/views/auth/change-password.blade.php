<!DOCTYPE html>
<html lang="fr" class="XXLh-100">

<x-doctype-layout>

</x-doctype-layout>
<link rel="stylesheet" type="text/css" href="{{ asset('css/user.css') }}" />

<body>
	<div id="mainContainer">
		<div class="grid XXLgridRow12 XXLfixed XXLh-100 XXLw-100 bgIce scrollbarVerti">
			<x-header-layout> </x-header-layout>
			<div class="min-h-full justify-center py-12 sm:px-6 lg:px-8">
				<h4 class="block pl03. center">
					Changer de Mot de Passe
				</h4>
			</div>

			<div class="py-12">
				<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
					<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
						<div class="max-w-xl">
							<section>
								<form action={{ route('password.update') }} method="POST">
									@csrf
									@method('PATCH')
									<div class="flexVerticalAlign">
										<p>Vous pouvez modifier votre mot de passe pour vos futures connexions.</p>
										<div class="flexVerticalAlign">
											<label for="email">Adresse e-mail</label>
											<input name="email" label="Adresse e-mail" type="email" />
											<label for="current_password">Mot de passe actuel</label>
											<input name="current_password" label="Mot de passe actuel" type="password" />
											<label for="password">Nouveau mot de passe</label>
											<input name="password" label="Nouveau mot de passe" type="password" />
											<label for="password_confirmation">Confirmation du nouveau mot de passe</label>
											<input name="password_confirmation" label="Confirmation du nouveau mot de passe" type="password" />

											@if (session('errors') && session('errors')->hasBag('default'))
												@foreach (session('errors')->getBag('default')->getMessages() as $error)
													<p class="fcblack px-6 py-12 shadow sm:rounded-lg sm:px-12">{{ $error[0] }}</p>
												@endforeach
											@endif
											@if (session('status') && session('status')->hasBag('default'))
												@foreach (session('status')->getBag('default')->getMessages() as $message)
													<p class="fcblack px-6 py-12 shadow sm:rounded-lg sm:px-12">{{ $message[0] }}</p>
												@endforeach
											@endif
										</div>
										<div>
											<button type="submit">Modifier</button>
										</div>
									</div>
								</form>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
		<x-footer-layout>
		</x-footer-layout>
	</div>
</body>

</html>
