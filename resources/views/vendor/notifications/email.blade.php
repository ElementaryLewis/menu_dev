<!DOCTYPE html>
<html lang="fr">

<head>
	<!-- GENERAL SETTINGS -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Changement de mot de passe</title>
	<!-- CSS -->
	<style>
		.mainContaint,
		.removePassword {
			box-sizing: border-box;
			padding: 20px;
			border-radius: 30px;
		}

		.mainContaint {
			min-width: 190px;
			max-width: 500px;
			margin: 20px auto;
			background-color: #D3ECF3;
			display: flex;
			flex-direction: column;
			flex-wrap: nowrap;
			justify-content: center;
		}

		.removePassword {
			background-color: #DD7B10;
			border: none;
			cursor: pointer;
			display: block;
			color: white;
			text-decoration: none;
		}

		.removePassword:hover {
			background-color: #f0993c;
		}

		.font {
			font-family: Arial, Helvetica, sans-serif;
			text-align: center;
		}

		.w-100 {
			width: 100%;
		}

		.title {
			font-size: 150%;
		}
	</style>
</head>

<body>
	<div class="mainContaint">
		<div>
			<h2 class="font w-100 title">
				Ecran - Menu Self
			</h2>
			<h2 class="font w-100">
				Bonjour
			</h2>
			<h4 class="font w-100">
				Vous recevez cet e-mail car nous avons reçu une demande de réinitialisation de mot de passe
			</h4>
		</div>
		<div>
			<a type="submit" class="removePassword font w-100" href="{{ $actionUrl }}">
				{{-- onclick="window.location.href='{{ $actionUrl }}';"> --}}
				<div>
					<strong> Réinitialiser le mot de passe </strong>
				</div>
			</a>
			<h4 class="font w-100">
				Ce lien de réinitialasation de mot de passe expirera dans 60 minutes.<br>
				Si vous n'avez pas demandé de réinitialisation de mot de passe, veuillez ignorer
				ce message.</br>
				Cordialement</br>
				L'équipe administrative
			</h4>
			<p class="font w-100">
				Si vous avez des difficultés à cliquer sur ce bouton "Réinitialiser mon mot de passe",<br>
				copiez l'adresse URL ci-dessous dans votre navigateur :
			</p>
			<p class="font w-100">
				<a href="{{ $actionUrl }}">
					{{ $displayableActionUrl }}
				</a>
			</p>
		</div>
	</div>
</body>

</html>
{{-- <x-mail::message>
	Greeting
	@if (!empty($greeting))
		# {{ $greeting }}
	@else
		@if ($level === 'error')
			# @lang('Whoops!')
		@else
			# @lang('Hello!')
		@endif
	@endif

	Intro Lines
	@foreach ($introLines as $line)
		{{ $line }}
	@endforeach

	Action Button
	@isset($actionText)
		<?php
		$color = match ($level) {
		    'success', 'error' => $level,
		    default => 'primary',
		};
		?>
		<x-mail::button :url="$actionUrl" :color="$color">
			{{ $actionText }}
		</x-mail::button>
	@endisset

	Outro Lines
	@foreach ($outroLines as $line)
		{{ $line }}
	@endforeach

	Salutation
	@if (!empty($salutation))
		{{ $salutation }}
	@else
		@lang('Regards'),<br>
		{{ config('app.name') }}
	@endif

	Subcopy
	@isset($actionText)
		<x-slot:subcopy>
			@lang("If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n" . 'into your web browser:', [
			    'actionText' => $actionText,
			]) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
		</x-slot:subcopy>
	@endisset
</x-mail::message> --}}
