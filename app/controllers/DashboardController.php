<?php

class DashboardController extends \BaseController {

	/**
	 * Display user dashboard
	 *
	 * @return Response
	 */
	public function index()
	{
		$id = Auth::user()->id;
		$exams = Exam::all();
        $courses = Course::where('user_id', '=', $id)->get();

     	return View::make('users.dashboard', array(
        	'exams' => $exams,
        	'courses' => $courses,
        	'id' => $id
        ));
	}

}
