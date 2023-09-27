<?php

namespace ApiV1;
use \CourseCard;
use \Course;
use \Card;
use \ReviewFrequency;
use \Carbon;
use \Validator;
use \Input;
use \Response;

class CourseCardController extends \BaseController {

	/**
	 * Display a listing of cards that belong to a course
	 *
	 * @return Response
	 */
	public function index($id)
    {
        $course_cards = Course::find($id)->cards;
        $cards = [];

        $review = Input::get("review");

        foreach($course_cards as $card) {

        	if($card->level == 1 || $card->readyToStudy() && $review) {
	        	$question = Card::find($card->card_id)->question;
	            $answer = Card::find($card->card_id)->answer;

	            $cards[] = array(
	               'id' => $card->id,
	               'question' => $question,
	               'answer' => $answer,
	               'level' => $card->level,
	               'last_studied' => $card->last_studied,
	               'next_review' => $card->next_review,
	               'studied' => $card->studied
	            );	
        	}

        }

        shuffle($cards);

        return Response::json($cards);

	}

	/**
	 * Display the specified card.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($course_id, $card_id)
	{	
		$card = CourseCard::findOrFail($card_id);

		return Response::json($card);
	}

	/**
	 * Update the specified card.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($course_id, $card_id)
	{	
		$correct = Input::get('correct');
		$card = CourseCard::findOrFail($card_id);
		
		if($correct) {
			$card->level++;	
		}
		else {
			if($card->level > 1) {
				$card->level--;	
			}
		}

		$level = $card->level;
		$hours = ReviewFrequency::find($level)->hours;
		$card->next_review = Carbon::now()->addHours($hours);
		$card->studied = 1;	
		$card->save();

		return Response::json($card);
	}


}
