<?php

class Card extends \Eloquent {

	public static $rules = [];

	protected $fillable = ['question', 'answer', 'topic_id', 'exam_id'];

	public function setTopicIdAttribute($value) {
    	$this->attributes['topic_id'] = $value ? $value : null;
	}

	public function addCardToExistingCourses() {
		$card = $this;

		$exam_id = $card->exam_id;
		$courses = Course::where("exam_id", "=", $exam_id)->get();

		foreach($courses as $course) {
			$course_card = new CourseCard;
			$course_card->course_id = $course->id;
			$course_card->card_id = $card->id;
			$course_card->level = 1;
			$course_card->studied = 0;

			if($course_card->save()) {
				return true;
			}
		}

		return false;
	}

}