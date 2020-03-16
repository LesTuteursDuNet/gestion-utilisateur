<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function list()
    {
    	$utilisateurs = DB::select('SELECT * FROM Utilisateur');
    	return view('users.list', compact('utilisateurs'));
    }

    public function create()
    {
    	return view('users.create');
    }

    public function store()
    {
	    if (!empty(request('nom')) && !empty(request('prenom')) && !empty(request('login')) && !empty(request('password')))
	    {
		    $utilisateur = DB::select('SELECT * FROM Utilisateur WHERE login = ?', [request('login')]);
		    if (empty($utilisateur)) 
		    {
		    	$requete = 'INSERT INTO Utilisateur(nom, prenom, login, password) VALUES (:nom, :prenom, :login, :password)';
		    	$status = DB::insert($requete, [
		    		'nom' => request('nom'),
		    		'prenom' => request('prenom'),
		    		'login' => request('login'),
		    		'password' => request('password')
		    	]);

		    	if ($status === true)
		    	{
		    		$message = "Ajout effectué avec succès";
		    	}
		    	else
		    	{
		    		$message = "Echec de l'ajout";
		    	}
		    	return redirect('/users/list')->with(['status' => $status, 'message' => $message]);
		    }
		    else
		    {
		    	return back()->withInput()->with('message', 'Erreur : le login existe déjà');
		    }
	    }
	    else
	    {
	    	return back()->withInput()->with('message', 'Erreur : vous devez renseigner toutes les informations');
	    }
    }

    public function delete($id)
    {
    	$affected = DB::delete('DELETE FROM Utilisateur WHERE id = ?', [$id]);

    	if ($affected > 0)
    	{
    		$message = "Suppression effectuée avec succès";
    	}
    	else
    	{
    		$message = "Aucun utilisateur n'a été supprimé";
    	}
    	return redirect('/users/list')->with(['status' => $affected, 'message' => $message]);
    }

    public function edit($id)
    {
    	$utilisateur = DB::select('SELECT * FROM Utilisateur WHERE id = ?', [$id]);
    	if (!empty($utilisateur))
    	{
    		$utilisateur = $utilisateur[0];
    		return view('users.edit', compact('utilisateur'));
    	}
    	else
    	{
    		abort(404);
    	}
    }

    public function update($id)
    {
    	if (!empty(request('nom')) && !empty(request('prenom')) && !empty(request('login')) && !empty(request('password')))
    	{
	    	$requete = 'UPDATE Utilisateur SET nom = :nom, prenom = :prenom, login = :login, password = :password WHERE id = :id';
	    	$affected = DB::update($requete, [
	    		'id' => $id,
	    		'nom' => request('nom'),
	    		'prenom' => request('prenom'),
	    		'login' => request('login'),
	    		'password' => request('password'),
	    	]);

	    	if ($affected > 0)
	    	{
	    		$message = "Modification effectuée avec succès";
	    	}
	    	else
	    	{
	    		$message = "Aucun utilisateur n'a été modifié";
	    	}
	    	return redirect('/users/list')->with(['status' => $affected, 'message' => $message]);
	    }
	    else
	    {
	    	return back()->withInput()->with('message', 'Erreur : vous devez renseigner toutes les informations');
	    }
    }

    public function show($id)
    {
    	$utilisateur = DB::select('SELECT * FROM Utilisateur WHERE id = ?', [$id]);
    	$utilisateur = $utilisateur[0];

    	return view('users.show', compact('utilisateur'));
    }
}
