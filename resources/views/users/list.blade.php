@extends('layout.main')
@section('title', 'Liste des utilisateurs')
@section('titre', 'Liste des utilisateurs')
@section('contenu')
	@if (!empty($utilisateurs))
		<table>
			<tr>
				<th>Prénom</th>
				<th>Nom</th>
				<th>Login</th>
				<th>Password</th>
				<th colspan="3">Actions</th>
			</tr>
			@foreach ($utilisateurs as $utilisateur)
				<tr>
					<td>{{ $utilisateur->prenom }}</td>
					<td>{{ $utilisateur->nom }}</td>
					<td>{{ $utilisateur->login }}</td>
					<td>{{ $utilisateur->password }}</td>
					<td><a class="button" href="/users/{{ $utilisateur->id }}">Consulter</a></td>
					<td><a class="button" href="/users/delete/{{ $utilisateur->id }}" onclick="return confirm('En êtes vous sûr');">Supprimer</a></td>
					<td><a class="button" href="/users/update/{{ $utilisateur->id }}">Modifier</a></td>
				</tr>
			@endforeach	
		</table>
	@else
		<p>La liste des utilisateurs est vide</p>
	@endif
@endsection