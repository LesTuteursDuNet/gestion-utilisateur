@extends('layout.main')
@section('title', 'Modification d\'un utilisateur')
@section('titre', 'Modification d\'un utilisateur')
@section('contenu')
	<form class="main" method="post" action="/users/update/{{ $utilisateur->id }}">
		@csrf
		<div class="formItem">
			<label>Prénom</label>
			<input type="text" name="prenom" value="{{ $utilisateur->prenom }}">
		</div>
		<div class="formItem">
			<label>Nom</label>
			<input type="text" name="nom" value="{{ $utilisateur->nom }}">
		</div>
		<div class="formItem">
			<label>Login</label>
			<input type="text" name="login" value="{{ $utilisateur->login }}">
		</div>
		<div class="formItem">
			<label>Password</label>
			<input type="password" name="password" value="{{ $utilisateur->password }}">
		</div>
		<div class="formItem">
			<input type="submit" value="Modifier">
		</div>
	</form>
@endsection