<?php

class Category extends \Eloquent {

	public static $rules = [];

	protected $table = 'categories';

	protected $fillable = ['name'];

}