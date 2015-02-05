<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsAndTasksTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->default('');
			$table->string('slug')->default('');
			$table->timestamps();
		});

		Schema::create('tasks', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('project_id')->unsigned()->default(0);
			$table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
			$table->string('name')->default('');
			$table->string('slug')->default('');
			$table->boolean('completed')->default(false);
			$table->text('description')->default('');
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
		Schema::drop('tasks');
		Schema::drop('projects');
	}

}
