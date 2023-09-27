<?php

class LearnController extends BaseController {
 
    public function index($id)
    {
        $course_cards = Course::find($id)->cards;
        $course = Course::find($id);
        $cards = [];

        foreach ($course_cards as $card) {
            $question = Card::find($card->card_id)->question;
            $answer = Card::find($card->card_id)->answer;
            $hours = (!$card->readyToStudy()) ? $card->timeRemaining() : '';

            $cards[] = array(
               'id' => $card->id,
               'question' => $question,
               'answer' => $answer,
               'level' => $card->level,
               'last_studied' => $card->last_studied,
               'next_review' => $card->next_review,
               'studied' => $card->studied,
               'hours' => $hours
            );
        }

        return View::make('courses.learn')->with(array('cards' => $cards, 'course' => $course));

    }

}