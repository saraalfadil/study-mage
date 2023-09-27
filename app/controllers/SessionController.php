<?php

class SessionController extends \BaseController {


	/**
	 * Show the form for creating a new session
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.login');
	}

	/**
	 * Store a newly created session in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $userdata = array(
	        'email'    => Input::get('email'),
	        'password' => Input::get('password')
	    );
	    if(Auth::attempt($userdata)) {
	    	$first_name = Auth::user()->first_name;
		    return Redirect::to('dashboard')->with('message', 'Welcome, '. $first_name.'!');
		} 
		else {
		    return Redirect::to('login')
		        ->with('message', 'Your username/password combination was incorrect')
		        ->withInput();
		}
	}

	/**
	 * Remove the specified session from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::to('/');
	}

}
