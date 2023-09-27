<?php

class Topic extends \Eloquent {

	public static $rules = [];

	protected $fillable = ['name'];

    public function cards()
    {
        return $this->hasManyThrough('Card', 'CourseCard');
    }

}