<?php

class CardsController extends \BaseController {

	/**
	 * Display a listing of cards
	 *
	 * @return Response
	 */
	public function index()
	{
		$cards = Card::all();

		return Response::json($cards);
	}

	/**
	 * Display the specified card.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$card = Card::findOrFail($id);

		return Response::json($card);
	}

}
