<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="{{ asset('js/bootstrap.js') }}" defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:500" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	
</head>
<body>
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top py-3">
			<div class="container">
				<a class="navbar-brand" href="/">
					<span id="nav-title"><h4>{{ config('app.name', 'Laravel') }}</h4></span>
				</a>

				@guest
					{{-- no button --}}
				@else
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
						<span class="navbar-toggler-icon"></span>
					</button>
				@endguest

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">
						@guest
							{{-- nothing to show --}}
						@else
							@if(Auth::user()->is_admin == 1)
								<li class="nav-item dropdown custom-link">
									<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Devices
										<span class="caret"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown" id="dropdown-menu-bg">
										<a class="dropdown-item custom-dropdown-item" href="/assets">Manage</a>
										<a class="dropdown-item custom-dropdown-item" href="/assets/create">Add Item</a>
									</div>
								</li>
								<li class="nav-item dropdown custom-link">
									<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Users
										<span class="caret"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown" id="dropdown-menu-bg">
										<a class="dropdown-item custom-dropdown-item" href="/users">List</a>
										<a class="dropdown-item custom-dropdown-item" href="/users/create">Add User</a>
									</div>
								</li>
							@else
								<li class="nav-item custom-link">
									<a class="nav-link" href="/assets">Assets</a>
								</li>
							@endif
							<li class="nav-item custom-link">
								<a class="nav-link" href="/requests">Requests</a>
							</li>

							<li class="nav-item custom-link">
								<a class="nav-link" href="/transactions">Transactions</a>
							</li>
						@endif
					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Authentication Links -->
						@guest
							{{-- nothing to show --}}
						@else
							<li class="nav-item">
								<h6 class="nav-link" id="nav-user">{{ Auth::user()->name }}</h6>
							</li>
							<li class="nav-item">
								<a class="nav-link fas fa-sign-out-alt" href="{{ route('logout') }}"
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="bottom" title="Logout">
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>

		<main>
			@yield('content')
		</main>
	</div>
</body>
</html>
