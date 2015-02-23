<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tasks', function(Blueprint $table)
		{
			$table->create();
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title', 255);
            $table->text('description');
            $table->timestamp('due_date');
            $table->enum('status', array('0', '1'))->default('0');
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
		Schema::table('tasks', function(Blueprint $table)
		{
			Schema::drop('tasks');
		});
	}

}
