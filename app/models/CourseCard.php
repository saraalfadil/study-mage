<?php

class CourseCard extends \Eloquent {

	public static $rules = [];

	protected $fillable = [];

	protected $table = 'course_cards';

	/**
	 * Determines if card is ready to be studied
	 *
	 * @var bool
	 */
	public function readyToStudy() 
	{

		$next_review = Carbon::createFromFormat('Y-m-d', $this->next_review, 'America/New_York');

		if (Carbon::now(new DateTimeZone('America/New_York'))->gte($next_review) || $this->level == 1) {
			return true;
		}

		return false;

	}

	/**
	 * Calculates remaining hours until card can be reviewed again
	 *
	 * @var int
	 */
	public function timeRemaining() 
	{

		$now = Carbon::now(new DateTimeZone('America/New_York'));

		$next_review = Carbon::createFromFormat('Y-m-d', $this->next_review, 'America/New_York');

		if($this->level > 1) {
			return $now->diffInHours($next_review);
		}
		
	}


}