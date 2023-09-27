<?php

class ExamsController extends \BaseController {

	/**
	 * Display a listing of exams
	 *
	 * @return Response
	 */
	public function index()
	{
		$exams = Exam::all();

		return View::make('exams.index', compact('exams'));
	}

	/**
	 * Show the form for creating a new exam
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('exams.create');
	}

	/**
	 * Store a newly created exam in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Exam::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		try {
			$exam = Exam::create($data);
		}
		catch(Exception $e) {
			return json_encode(array("success" => false, "message" => "Failed to create Exam", "reason" => $e));
		}

		$cards = Input::get('cards');

		foreach($cards as $card) {
			$question = $card['question'];
			$answer = $card['answer'];

			if(strlen($question) > 0 && strlen($answer) > 0) {
				Card::create([
					'question' => $question,
					'answer' => $answer,
					'topic_id' => '',
					'exam_id' => $exam->id
				]);
			}

		}

		return json_encode(array("success" => true, "message" => "Successfully created exam!"));
	}

	/**
	 * Display the specified exam.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$exam = Exam::findOrFail($id);

		return View::make('exams.show', compact('exam'));
	}

	/**
	 * Show the form for editing the specified exam.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$exam = Exam::find($id);

		$cards = $exam->cards;

		return View::make('exams.edit', compact('exam', 'cards'));
	}

	/**
	 * Update the specified exam in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$exam = Exam::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Exam::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		try {
			$exam = Exam::find($id);
		}
		catch(Exception $e) {
			return json_encode(array("success" => false, "message" => "Failed to update Exam", "reason" => $e));
		}

		$cards = $exam->cards;

		foreach($cards as $card) {
			$question = $card['question'];
			$answer = $card['answer'];

			if(isset($question) && isset($answer)) {
				Card::firstOrCreate([
					'question' => $question,
					'answer' => $answer,
					'topic_id' => 1,
					'exam_id' => $exam->id
				]);
			}

		}

		//$data = Input::all();

		//$exam->update($data);

		//return Redirect::route('exams.index');
	}

	/**
	 * Remove the specified exam from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Exam::destroy($id);

		return Redirect::route('exams.index');
	}

}
