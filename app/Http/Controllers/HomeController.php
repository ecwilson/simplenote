<?php namespace App\Http\Controllers;

use App\User;
use Auth;

class HomeController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user_collections = User::find(Auth::User()->id)->collections;
		$public_collections = array();
		$private_collections = array();

		for ($i=0; $i < count($user_collections); $i++) { 
			if ($user_collections[$i]->is_public)
			{
				array_push($public_collections, $user_collections[$i]);
			}
			else
			{
				array_push($private_collections, $user_collections[$i]);
			}
		}

		$user_notes = User::find(Auth::User()->id)->notes;
		$public_notes = array();
		$private_notes = array();

		for ($i=0; $i < count($user_notes); $i++) { 
			if ($user_notes[$i]->is_public)
			{
				array_push($public_notes, $user_notes[$i]);
			}
			else
			{
				array_push($private_notes, $user_notes[$i]);
			}
		}

		$collections = ['public' => $public_collections, 'private' => $private_collections];
		$notes = ['public' => $public_notes, 'private' => $private_notes];
		return view('home', compact('collections', 'notes'));
	}

}
