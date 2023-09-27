<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ExamsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Exam::create([
				'name' => $faker->company, 
			]);
		}

		Exam::create([
			'id' => 100,
			'name' => 'Design Patterns', 
			'category_id' => 1
		]);
	}

}