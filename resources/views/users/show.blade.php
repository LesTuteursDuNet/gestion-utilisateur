@extends('layout.main')
@section('title', 'Affichage d\'un utilisateur')
@section('titre', 'Profil de l\'utilisateur'.$utilisateur->id)
@section('contenu')
	<table>
		<tr>
			<th>Caractéristiques</th>
			<th>Valeur</th>
		</tr>
		<tr>
			<td>ID</td>
			<td>{{ $utilisateur->id }}</td>
		</tr>
		<tr>
			<td>Nom</td>
			<td>{{ $utilisateur->nom }}</td>
		</tr>
		<tr>
			<td>Prénom</td>
			<td>{{ $utilisateur->prenom }}</td>
		</tr>
		<tr>
			<td>Login</td>
			<td>{{ $utilisateur->login }}</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>{{ $utilisateur->password }}</td>
		</tr>
	</table>
@endsection