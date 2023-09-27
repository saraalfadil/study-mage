<?php

class ReviewFrequencyTableSeeder extends Seeder {

	public function run()
	{
		ReviewFrequency::create(['hours' => 12]);
		ReviewFrequency::create(['hours' => 24]);
		ReviewFrequency::create(['hours' => 48]);
		ReviewFrequency::create(['hours' => 72]);
		ReviewFrequency::create(['hours' => 96]);
	}

}