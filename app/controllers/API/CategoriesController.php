<?php

namespace ApiV1;
use \Category;
use \Response;

class CategoriesController extends \BaseController {

	/**
	 * Display a listing of exam categories
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::all();

		return Response::json(array("success" => true, "data" => $categories));
	}

}
