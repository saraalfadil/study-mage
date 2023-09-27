<?php

class Exam extends \Eloquent {

	public static $rules = [];

	protected $fillable = ['name', 'desc'];

	public function topics()
    {
        return $this->hasMany('Topic');
    }

	public function cards()
    {
        return $this->hasMany('Card');
    }

}