<?php

namespace ApiV1;
use \Exam;
use \Card;
use \Validator;
use \Input;
use \Response;

class ExamCardController extends \BaseController {

	/**
	 * Display the cards for the specifed exam.
	 *
	 * @param  int  $id
	 * @return Response
	 */
 	public function index($id)
    {
        $exam = Exam::findOrFail($id);
        $cards = $exam->cards;

        return Response::json($cards);
    }

    /**
	 * Display the specified card for the specifed exam.
	 *
	 * @param  int  $id
	 * @return Response
	 */
 	public function show($id)
    {
        $card = Card::findOrFail($id);
        return Response::json($card);
    }

    /**
	 * Store a newly created exam card in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
 	public function store($id)
    {

		$validator = Validator::make($data = Input::all(), Card::$rules);

		if ($validator->fails())
		{	
			return Response::json(array("success" => false, "message" => $validator->messages()));
		}

		$exam = Exam::findOrFail($id);
		$question = Input::get('question');
		$answer = Input::get('answer');

		try {
			if(isset($exam) && isset($question) && isset($answer)) {
				$card = Card::create([
					'question' => $question,
					'answer' => $answer,
					'topic_id' => '',
					'exam_id' => $id
				]);

				$card->addCardToExistingCourses();
			}
		}
		catch(Exception $e) {
			return Response::json(array("success" => false, "message" => "Failed to create exam card", "reason" => $e));
		}

		return Response::json(array("success" => true, "message" => "Successfully created exam card!"));
    }
}
