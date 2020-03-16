<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title', 'Accueil')</title>
	<link rel="stylesheet" type="text/css" href="/css/design.css">
</head>
<body>
	<header>Gestion des utilisateurs</header>
	<nav>
		<ul>
			<li><a href="/">Accueil</a></li>
			<li><a href="/users/list">Lister</a></li>
			<li><a href="/users/create">Ajouter</a></li>
		</ul>
	</nav>
	<section>
		@if (session('message'))
			<div class="alert alert-{{ session('status') ? 'success' : 'danger' }}">
				{{ session('message') }}
			</div>
		@endif
		<h1 id="titre-principal">@yield('titre')</h1>
		@yield('contenu')
	</section>
	<footer>Les Tuteurs Du Net &copy; Mars 2020</footer>
</body>
</html>