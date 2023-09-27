<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CoursesTableSeeder extends Seeder {

	public function run()
	{
		Course::create([
			'user_id' => 1,
			'exam_id' => 3
		]);
	}

}