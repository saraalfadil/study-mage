<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TopicsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 40) as $index)
		{
			Topic::create([
				'name' => $faker->sentence(2),
				'exam_id' => rand(1, 10)
			]);

		}

		Topic::create([
			'id' => 201,
			'name' => 'Creational patterns',
			'exam_id' => 100
		]);

		Topic::create([
			'id' => 202,
			'name' => 'Structural patterns',
			'exam_id' => 100
		]);

		Topic::create([
			'id' => 203,
			'name' => 'Behavioral patterns',
			'exam_id' => 100
		]);
	}

}