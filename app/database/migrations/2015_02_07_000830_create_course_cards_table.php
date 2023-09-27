<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseCardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{	
		Schema::create('course_cards', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('level');
			$table->integer('course_id')->unsigned();
	        $table->foreign('course_id')->references('id')->on('courses')->onDelete('CASCADE')->onUpdate('CASCADE');
	        $table->integer('card_id')->unsigned();
	        $table->foreign('card_id')->references('id')->on('cards')->onDelete('CASCADE')->onUpdate('CASCADE');
	        $table->date('last_reviewed');
	        $table->date('next_review');
	        $table->boolean('studied');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('course_cards');
	}

}
