<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cards', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('question');
			$table->text('answer');
			$table->integer('topic_id')->nullable()->unsigned();
	        $table->foreign('topic_id')->references('id')->on('topics')->onDelete('CASCADE')->onUpdate('CASCADE');
	        $table->integer('exam_id')->unsigned();
	        $table->foreign('exam_id')->references('id')->on('exams')->onDelete('CASCADE')->onUpdate('CASCADE');
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
		Schema::drop('cards');
	}

}
