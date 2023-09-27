<?php

namespace ApiV1;
use \Exam;
use \Response;

class ExamsController extends \BaseController {

	/**
	 * Display a listing of exams
	 *
	 * @return Response
	 */
	public function index()
	{
		$exams = Exam::all();

		return Response::json(array("success" => true, "data" => $exams));
	}

}
