<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCmsosccmsUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cmsosc.cms_users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->string('email')->unique('cms_users_email_unique');
			$table->string('password');
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('cmsosc.cms_users');
	}

}
