@extends('layout.main')
@section('title', 'Ajout d\'un utilisateur')
@section('titre', 'Ajout d\'un utilisateur')
@section('contenu')
	<form class="main" method="post" action="/users/create">
		@csrf
		<div class="formItem">
			<label>Prénom</label>
			<input type="text" name="prenom" value="{{ old('prenom') }}">
		</div>
		<div class="formItem">
			<label>Nom</label>
			<input type="text" name="nom" value="{{ old('nom') }}">
		</div>
		<div class="formItem">
			<label>Login</label>
			<input type="text" name="login" value="{{ old('login') }}">
		</div>
		<div class="formItem">
			<label>Password</label>
			<input type="password" name="password" value="{{ old('password') }}">
		</div>
		<div class="formItem">
			<input type="submit" value="Ajouter">
		</div>
	</form>
@endsection