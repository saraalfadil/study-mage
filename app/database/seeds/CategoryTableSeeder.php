<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		Category::create([
			'id' => 1,
			'name' => 'Technology'
		]);

		Category::create([
			'id' => 2,
			'name' => 'Mathematics'
		]);

		Category::create([
			'id' => 3,
			'name' => 'Philosophy'
		]);
	}

}