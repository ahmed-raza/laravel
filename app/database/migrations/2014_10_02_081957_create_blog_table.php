<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blogs', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('read_more');
			$table->string('submitted_by');
			$table->text('content');
			$table->unsignedInteger('comment_count');
			$table->timestamps();
			});
		DB::statement('ALTER TABLE blogs ADD FULLTEXT search(title, content)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('blogs');
	}

}
