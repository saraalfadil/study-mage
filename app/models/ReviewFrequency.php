<?php

class ReviewFrequency extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'review_frequencies';

	protected $fillable = ['hours'];

}